<?php
namespace App\Controllers\Registrar;
use App\Models\Acudientes_model;
use CodeIgniter\Controller;



class Acudientes extends Controller {
    protected $AcudientesModel;

    
    public function __construct()
    {
                
        $this->AcudientesModel = new Acudientes_model();
    }

    public function index()
	{
        $acudientesModel = new Acudientes_model();
        $data = [
            
            'acudientes' => $acudientesModel->getAcudientes(),
        ];

        echo view('layouts/header');
        echo view('layouts/aside',$data);
        echo view('admin/acudientes/list',$data);
        echo view('layouts/footer');
    }

    public function add()
    {
        $AcudientesModel = new Acudientes_model();

        $fechaIngreso = date('Y-m-d');

        $data = [
            'genero' => $AcudientesModel->getGeneros(),
            'fechaIngreso' => $fechaIngreso
        ];

        echo view('layouts/header');
        echo view('layouts/aside',$data);
        echo view('admin/acudientes/add',$data);
        echo view('layouts/footer');
    }    

    public function store()
    {
        $AcudientesModel = new Acudientes_model();

        $nombres = $this->request->getPost("nombres");
        $genero = $this->request->getPost("genero");
        $profesion = $this->request->getPost("profesion");
        $email = $this->request->getPost("email");
        $celular = $this->request->getPost("celular");
        $direccion = $this->request->getPost("direccion");
        $fechaIngreso = $this->request->getPost("fechaIngreso");
        

        $username = $this->request->getPost("username");
        $password = $this->request->getPost("password");

         // Validación del formulario
         $validation = \Config\Services::validation();
         $validation->setRules([
            'nombres' => 'required',
            'genero' => 'required',
            'profesion' => 'required',
            'email' => 'required|valid_email',
            'celular' => 'required',
            'direccion' => 'required',
            'username' => 'required',
            'password' => 'required'
         ]);

        if ($validation->withRequest($this->request)->run()) {

            $dataUsuario = [
                'username' => $username,
                'password' => sha1($password),
                'dia_ingreso' => $fechaIngreso,
                'rol_id' => "3" ,
                'estado' => "1"                 
            ];

            // Guardar usuario y obtener ID
            if ($AcudientesModel->saveUsuario($dataUsuario)) {
                $idUsuario = $AcudientesModel->lastID();

                // Guardar estudiante
                $this->saveAcudiente($idUsuario, $nombres, $genero, $email, $celular, $direccion, $profesion);

                // Mostrar mensaje de éxito y redirigir
                session()->setFlashdata("success", "La información se guardó exitosamente");
                return redirect()->to(base_url("registrar/acudientes"));
            }else {
                // Mostrar mensaje de error si no se pudo guardar el usuario
                session()->setFlashdata("error", "No se pudo guardar la información del acudiente");
                return redirect()->to(base_url("registrar/acudientes/add"));
            }
        } else {
            // Mostrar vista de formulario con errores de validación
            return $this->add();
        }   
         
    }
    protected function saveAcudiente($idUsuario,$nombres,$genero,$email,$celular,$direccion,$profesion)
    { 
        $acudientesModel = new Acudientes_model();
        $data  = [

            'nombres' => $nombres, 
            'profesion' => $profesion,
            'email' => $email,
            'celular' => $celular,
            'direccion' => $direccion,
            'estado' => "1" ,
            'genero_id' => $genero,    
            'usuario_id' => $idUsuario
                
        ];

        return $acudientesModel->saveAcudiente($data); 
    }

    public function edit($id)
    {
        try {
            $acudientesModel = new Acudientes_model();
            $validation = \Config\Services::validation();
    
            
            $data = [
                'acudiente' => $acudientesModel->getAcudiente($id),
                'genero' => $acudientesModel->getGeneros(),
                'validation' => $validation
            ];

            // var_dump($id);
            // var_dump($data['acudiente']);
            // die();
    
            echo view("layouts/header");
            echo view("layouts/aside", $data);
            echo view("admin/acudientes/edit", $data);
            echo view("layouts/footer");
        } catch (\Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function update()
    {
            // Iniciar el modelo
        $acudientesModel = new Acudientes_model();

        // Obtener datos del POST
        $idAcudiente = $this->request->getPost("idAcudiente");
        $idUsuario = $this->request->getPost("idUsuario");
        $nombres = $this->request->getPost("nombres");
        $genero = $this->request->getPost("genero");
        $profesion = $this->request->getPost("profesion");
        $email = $this->request->getPost("email");
        $celular = $this->request->getPost("celular");
        $direccion = $this->request->getPost("direccion");
        $fechaIngreso = $this->request->getPost("fechaIngreso");
        $username = $this->request->getPost("username");
        $password = $this->request->getPost("password");

        // Obtener el acudiente actual
        $acudienteActual = $acudientesModel->getAcudiente($idAcudiente);

        // Configurar reglas de validación
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nombres' => 'required',
            'genero' => 'required',
            'profesion' => 'required',
            'email' => 'required' . ($email != $acudienteActual->email ? '|is_unique[estudiantes.email]' : ''),
            'celular' => 'required',
            'direccion' => 'required',
            'username' => 'required' . ($username != $acudienteActual->username ? '|is_unique[usuarios.username]' : ''),
            'password' => 'required'
        ]);

        // Ejecutar la validación
        if ($validation->withRequest($this->request)->run()) {
            // Preparar datos para actualizar usuario
            $data = [
                'username' => $username,
                'password' => sha1($password),
            ];

            // Actualizar usuario en la base de datos
            if ($acudientesModel->updateUsuario($idUsuario, $data)) {
                // Actualizar estudiante
                $acudientesModel->updateAcudiente($idAcudiente, $nombres, $genero, $profesion, $email, $celular, $direccion);

                // Mostrar mensaje de éxito y redirigir
                session()->setFlashdata("actualizado", "La información se actualizó exitosamente");
                return redirect()->to(base_url("registrar/acudientes"));
            } else {
                // Mostrar mensaje de error si no se pudo actualizar el usuario
                session()->setFlashdata("error", "No se pudo actualizar la información del usuario");
                return redirect()->to(base_url("registrar/acudientes/edit/" . $idAcudiente));
            }
        } else {
            // Mostrar vista de edición con errores de validación
            return $this->edit($idAcudiente);
        }
       		
    }

    protected function updateAcudiente($idAcudiente,$nombres,$genero,$profesion,$email,$celular,$direccion)
    {
        $acudientesModel = new AcudientesModel();

        $data  = [
            'nombres' => $nombres,
            'genero_id' => $genero,
            'profesion' => $profesion,
            'email' =>$email,
            'celular' => $celular,
            'direccion' => $direccion
            
        ];

        return $acudientesModel->updateAcudiente($idAcudiente,$data); 
    }

    public function delete($id)
    {
        $acudientesModel = new AcudientesModel();

        $data = [
            'estado' => "0" ,
        ];

         //Actualiza el estado del estudiante
         $alumnosModel->updateEstudiante($id,$data);

         //Redirecciona a la lista de alumnos
         return redirect()->to(base_url("registrar/acudientes"));
    }    
        

    public function disable($usuario_id)
    {
        $acudientesModel = new AcudientesModel();

        $data = [
            'estado' => "0" ,
        ];

         //Actualiza el estado del estudiante
         $alumnosModel->updateEstudiante($usuario_id,$data);

         //Redirecciona a la lista de alumnos
         return redirect()->to(base_url("registrar/acudientes"));
         
        
    } 

}