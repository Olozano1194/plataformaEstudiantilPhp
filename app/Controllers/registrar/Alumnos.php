<?php
namespace App\Controllers\Registrar;

use App\Models\Alumnos_model;
use CodeIgniter\Controller;

class Alumnos extends Controller {
    protected $alumnosModel;

    
    public function __construct()
    {
        $this->alumnosModel = new Alumnos_model();
    }

    public function index()
	{
        $alumnosModel = new Alumnos_model();
        $data = [
            'alumnos' => $alumnosModel->getAlumnos(),

        ];
              
        echo view('layouts/header');
        echo view('layouts/aside', $data);
        echo view('admin/alumnos/list', $data);
        echo view('layouts/footer');
    }

    public function add()
    {
        $alumnosModel = new Alumnos_model();
        $fechaIngreso = date('Y-m-d');
        $data = [
            'genero' => $alumnosModel->getGeneros(),
            'tipoDocumento' => $alumnosModel->getTipoDocumentos(),
            'acudiente' => $alumnosModel->getAcudientes(),
            'grupoSanguineo' => $alumnosModel->getGrupoSanguineo(),
            'fechaIngreso' => $fechaIngreso
        ];

        echo view('layouts/header');
        echo view('layouts/aside',$data);
        echo view('admin/alumnos/add',$data);
        echo view('layouts/footer');
    }    

    public function store()
    {
        $alumnosModel = new Alumnos_model();
        // Obtener datos del formulario
        $nombres = $this->request->getPost("nombres");
        $tipoDocumento = $this->request->getPost("tipoDocumento");
        $num_documento = $this->request->getPost("num_documento");
        $genero = $this->request->getPost("genero");
        $grupoSanguineo = $this->request->getPost("grupoSanguineo");
        $fecha_nacimiento = $this->request->getPost("fecha_nacimiento");
        $email = $this->request->getPost("email");
        $celular = $this->request->getPost("celular");
        $direccion = $this->request->getPost("direccion");
        $acudiente = $this->request->getPost("acudiente");
        $username = $this->request->getPost("username");
        $password = $this->request->getPost("password");
        $fechaIngreso = $this->request->getPost("fechaIngreso");

        // Validación del formulario
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nombres' => 'required',
            'tipoDocumento' => 'required',
            'num_documento' => 'required|is_unique[estudiantes.num_documento]',
            'genero' => 'required',
            'grupoSanguineo' => 'required',
            'fecha_nacimiento' => 'required',
            'email' => 'required|is_unique[estudiantes.email]',
            'celular' => 'required',
            'direccion' => 'required',
            'acudiente' => 'required',
            'username' => 'required',
            'password' => 'required',
        ]);

        if ($validation->withRequest($this->request)->run()) {
            // Preparar datos para el modelo
            $dataUsuario = [
                'username' => $username,
                'password' => sha1($password),
                'dia_ingreso' => $fechaIngreso,
                'rol_id' => "4",
                'estado' => "1"
            ];

            // Guardar usuario y obtener ID
            if ($alumnosModel->saveUsuario($dataUsuario)) {
                $idUsuario = $alumnosModel->lastID();

                // Guardar estudiante
                $this->saveEstudiante($idUsuario, $tipoDocumento, $num_documento, $nombres, $fecha_nacimiento, $genero, $email, $celular, $direccion, $grupoSanguineo, $acudiente);

                // Mostrar mensaje de éxito y redirigir
                session()->setFlashdata("success", "La información se guardó exitosamente");
                return redirect()->to(base_url("registrar/alumnos"));
            } else {
                // Mostrar mensaje de error si no se pudo guardar el usuario
                session()->setFlashdata("error", "No se pudo guardar la información del usuario");
                return redirect()->to(base_url("registrar/alumnos/add"));
            }
        } else {
            // Mostrar vista de formulario con errores de validación
            return $this->add();
        }     
    }
    
    protected function saveEstudiante($idUsuario,$tipoDocumento,$num_documento,$nombres,$fecha_nacimiento,$genero,$email,$celular,$direccion,$grupoSanguineo,$acudiente)
    {
        $alumnosModel = new Alumnos_model(); 
        $data  = [

            'tipodocumento_id' => $tipoDocumento,
            'num_documento' => $num_documento,
            'nombres' => $nombres, 
            'fecha_nacimiento' => $fecha_nacimiento,
            'genero_id' => $genero,
            'email' => $email,
            'celular' => $celular,
            'direccion' => $direccion,
            'gruposanguineo_id' => $grupoSanguineo,
            'estado' => "1" ,
            'acudiente_id' => $acudiente,
            'usuario_id' => $idUsuario
                
        ];

        return $alumnosModel->saveEstudiante($data); 
    }
   
    public function edit($id)
    {
        $alumnosModel = new Alumnos_model();
		$data  = [
            'alumno' => $alumnosModel->getAlumno($id),
            'genero' => $alumnosModel->getGeneros(),
            'tipoDocumento' => $alumnosModel->getTipoDocumentos(),
            'acudiente' => $alumnosModel->getAcudientes(),
            'grupoSanguineo' => $alumnosModel->getGrupoSanguineo(),
        ];
        
		echo view("layouts/header");
		echo view("layouts/aside",$data);
		echo view("admin/alumnos/edit",$data);
		echo view("layouts/footer");
    }

    public function update()
    {
        $idAlumno = $this->request->getPost("idAlumno");
        $idUsuario = $this->request->getPost("idUsuario");
        $nombres = $this->request->getPost("nombres");
		$tipoDocumento = $this->request->getPost("tipoDocumento");
		$num_documento = $this->request->getPost("num_documento");
        $genero = $this->request->getPost("genero");
        $grupoSanguineo = $this->request->getPost("grupoSanguineo");
        $fecha_nacimiento = $this->request->getPost("fecha_nacimiento");
        $email = $this->request->getPost("email");
        $celular = $this->request->getPost("celular");
        $direccion = $this->request->getPost("direccion");
        $acudiente = $this->request->getPost("acudiente");

        $username = $this->request->getPost("username");
        $password = $this->request->getPost("password");
        $fechaIngreso = $this->request->getPost("fechaIngreso");

        //iniciar el modelo
        $alumnosModel = new Alumnos_model();

        //obtener el alumno actual
        $alumnoActual = $alumnosModel->getAlumno($idAlumno);

        //Configurar reglas de validación
        $validation = \Config\Services::validation();

        $validation->setRules([
            'nombres' => 'required',
            'tipoDocumento' => 'required',
            'num_documento' => 'required' . ($num_documento != $alumnoActual->num_documento ? '|is_unique[estudiantes.num_documento]' : ''),
            'genero' => 'required',
            'grupoSanguineo' => 'required',
            'fecha_nacimiento' => 'required',
            'email' => 'required' . ($email != $alumnoActual->email ? '|is_unique[estudiantes.email]' : ''),
            'celular' => 'required',
            'direccion' => 'required',
            'acudiente' => 'required',
            'username' => 'required' . ($username != $alumnoActual->username ? '|is_unique[estudiantes.username]' : ''),
            'password' => 'required',
        ]);

        //Ejecutar la validación
        if ($validation->withRequest($this->request)->run()) {
            // Preparar datos para actualizar usuario
            $dataUsuario = [
                'username' => $username,
                'password' => sha1($password),
            ];

            //Actualizar usuario en la base de datos
            if ($alumnosModel->updateUsuario($idUsuario, $dataUsuario)) {
                // Actualizar estudiante
                $alumnosModel->updateEstudiante($idAlumno, $tipoDocumento, $num_documento, $nombres, $fecha_nacimiento, $genero, $email, $celular, $direccion, $grupoSanguineo, $acudiente);
    
                // Mostrar mensaje de éxito y redirigir
                $this->session->setFlashdata("success", "La información se actualizó exitosamente");
                return redirect()->to(base_url("registrar/alumnos"));
            }else {
                // Mostrar mensaje de error si no se pudo actualizar el usuario
                $this->session->setFlashdata("error", "No se pudo actualizar la información del usuario");
                return redirect()->to(base_url("registrar/alumnos/edit/" . $idAlumno));
            }
                
        } else {
            // Mostrar vista de edición con errores de validación
            return $this->edit($idAlumno);
        }
    }

    protected function updateEstudiante($idAlumno,$tipoDocumento,$num_documento,$nombres,$fecha_nacimiento,$genero,$email,$celular,$direccion,$grupoSanguineo,$acudiente)
    { 
        $alumnosModel = new AlumnosModel();
        $data  = [

            'tipodocumento_id' => $tipoDocumento,
            'num_documento' => $num_documento,
            'nombres' => $nombres, 
            'fecha_nacimiento' => $fecha_nacimiento,
            'genero_id' => $genero,
            'email' => $email,
            'celular' => $celular,
            'direccion' => $direccion,
            'gruposanguineo_id' => $grupoSanguineo,
            'acudiente_id' => $acudiente                
        ];

        return $alumnosModel->updateEstudiante($idAlumno,$data); 
    }

    public function delete($id)
    {
        $alumnosModel = new AlumnosModel();
        $data = [
            'estado' => "0" ,
        ];
        
        //Actualiza el estado del estudiante
        $alumnosModel->updateEstudiante($id,$data);

        //Redirecciona a la lista de alumnos
        return redirect()->to(base_url("registrar/alumnos"));
    } 

    public function disable($usuario_id)
    {
        $alumnosModel = new AlumnosModel();
        $data = [
            'estado' => "0" ,
        ];
         
        $alumnosModel->updateUsuario($usuario_id,$data);

        //Redirecciona a la lista de alumnos
        return redirect()->to(base_url("registrar/alumnos"));
    } 
}