<?php
//defined('BASEPATH') OR exit('No direct script access allowed');
namespace App\Controllers\Registrar;

use App\Models\Alumnos_model;
use CodeIgniter\Controller;

class Alumnos extends Controller {
   
    public function index()
	{
        $alumnosModel = new Alumnos_model();

        $data['alumnos'] = $alumnosModel->getAlumnos();

        if (empty($data['alumnos'])) {
            $data['alumnos'] = [];
        }

        //depuracion
        // echo "<pre>";
        // print_r($data['alumnos']);
        // echo "</pre>";
        // exit;
               
                
        echo view('layouts/header');
        echo view('layouts/aside', $data);
        echo view('admin/alumnos/list', $data);
        echo view('layouts/footer');
    }

    // public function add()
    // {
    //     $alumnosModel = new Alumnos_model();

    //     $fechaIngreso = date('Y-m-d');
    //     $data = [
    //         'genero' => $this->Alumnos_model->getGeneros(),
    //         'tipoDocumento' => $this->Alumnos_model->getTipoDocumentos(),
    //         'acudiente' => $this->Alumnos_model->getAcudientes(),
    //         'grupoSanguineo' => $this->Alumnos_model->getGrupoSanguineo(),
    //         'fechaIngreso' => $fechaIngreso
    //     ];
        
    //     echo view('layouts/header');
    //     echo view('layouts/aside',$data);
    //     echo view('admin/alumnos/add',$data);
    //     echo view('layouts/footer');
    // }    

    // public function store()
    // {
    //     $alumnosModel = new Alumnos_model();

    //     $nombres = $this->request->getPost("nombres");
	// 	$tipoDocumento = $this->request->getPost("tipoDocumento");
	// 	$num_documento = $this->request->getPost("num_documento");
    //     $genero = $this->request->getPost("genero");
    //     $grupoSanguineo = $this->request->getPost("grupoSanguineo");
    //     $fecha_nacimiento = $this->request->getPost("fecha_nacimiento");
    //     $email = $this->request->getPost("email");
    //     $celular = $this->request->getPost("celular");
    //     $direccion = $this->request->getPost("direccion");
    //     $acudiente = $this->request->getPost("acudiente");

    //     $username = $this->request->getPost("username");
    //     $password = $this->request->getPost("password");
    //     $fechaIngreso = $this->request->getPost("fechaIngreso");

    //     //validacion del formulario
    //     $validation = \Config\Services::validation();

    //     $validation -> setRules([
    //         'nombres' => 'required',
    //         'tipoDocumento' => 'required',
    //         'num_documento' => 'required',
    //         'genero' => 'required',
    //         'grupoSanguineo' => 'required',
    //         'fecha_nacimiento' => 'required',
    //         'email' => 'required',
    //         'celular' => 'required',
    //         'direccion' => 'required',
    //         'acudiente' => 'required',
    //         'username' => 'required',
    //         'password' => 'required',

    //     ]);
      

    //     if ($validation->withRequest($this->request)->run())
    //     {
    //         $data = [
    //                 'username' => $username,
    //                 'password' => sha1($password),
    //                 'dia_ingreso' => $fechaIngreso,
    //                 'rol_id' => "4" ,
    //                 'estado' => "1"                 
    //             ];

    //             if ($alumnosModel->saveUsuario($data)) {
    //             $idUsuario = $alumnosModel->insertID();
    //             $this->saveEstudiante($idUsuario,$tipoDocumento,$num_documento,$nombres,$fecha_nacimiento,$genero,$email,$celular,$direccion,$grupoSanguineo,$acudiente);
    //             session()->setFlashdata("Registrado","La información se guardo exitosamente");
    //             return redirect()->to(base_url()."registrar/alumnos");
    //         }
    //         else {
    //             //session()->setFlashdata("Error","No se pudo guardar la informacion");
    //             //si la validacion falla, vuelve a la vista de agregar con errores
    //             return redirect()->back()->withInput()->with('validation', $validation);
    //         }
    //     }
    //     else {
    //         $this->add();
    //     }       
    // }

    // protected function saveEstudiante($idUsuario,$tipoDocumento,$num_documento,$nombres,$fecha_nacimiento,$genero,$email,$celular,$direccion,$grupoSanguineo,$acudiente)
    // { 
    //     $alumnosModel = new Alumnos_model();

    //     $data  = [
    //             'tipodocumento_id' => $tipoDocumento,
    //             'num_documento' => $num_documento,
    //             'nombres' => $nombres, 
    //             'fecha_nacimiento' => $fecha_nacimiento,
    //             'genero_id' => $genero,
    //             'email' => $email,
    //             'celular' => $celular,
    //             'direccion' => $direccion,
    //             'gruposanguineo_id' => $grupoSanguineo,
    //             'estado' => "1" ,
    //             'acudiente_id' => $acudiente,
    //             'usuario_id' => $idUsuario,
    //     ];
    //     $alumnosModel->save($data); 
    // }
   
    // public function edit($id)
    // {
    //     $alumnosModel = new Alumnos_model();

	// 	$data  = [
    //         'alumno' => $this-> $alumnosModel->getAlumno($id),
    //         'genero' => $this-> $alumnosModel->getGeneros(),
    //         'tipoDocumento' => $this-> $alumnosModel->getTipoDocumentos(),
    //         'acudiente' => $this-> $alumnosModel->getAcudientes(),
    //         'grupoSanguineo' => $this-> $alumnosModel->getGrupoSanguineo(),
    //     ];
        
	// 	echo view("layouts/header");
	// 	echo view("layouts/aside",$data);
	// 	echo view("admin/alumnos/edit",$data);
	// 	echo view("layouts/footer");
    // }

    // public function update()
    // {
    //     $alumnosModel = new Alumnos_model();

    //     $idAlumno = $this->request->getPost("idAlumno");
    //     $idUsuario = $this->request->getPost("idUsuario");
    //     $nombres = $this->request->getPost("nombres");
	// 	$tipoDocumento = $this->request->getPost("tipoDocumento");
	// 	$num_documento = $this->request->getPost("num_documento");
    //     $genero = $this->request->getPost("genero");
    //     $grupoSanguineo = $this->request->getPost("grupoSanguineo");
    //     $fecha_nacimiento = $this->request->getPost("fecha_nacimiento");
    //     $email = $this->request->getPost("email");
    //     $celular = $this->request->getPost("celular");
    //     $direccion = $this->request->getPost("direccion");
    //     $acudiente = $this->request->getPost("acudiente");

    //     $username = $this->request->getPost("username");
    //     $password = $this->request->getPost("password");
    //     $fechaIngreso = $this->request->getPost("fechaIngreso");

    //     $alumnoActual = $alumnosModel->getAlumno($idAlumno);

    //     $validation=[
    //         'nombres' => 'required',
    //         'tipoDocumento' => 'required',
    //         'genero' => 'required',
    //         'grupoSanguineo' => 'required',
    //         'fecha_nacimiento' => 'required',
    //         'celular' => 'required',
    //         'direccion' => 'required',
    //         'acudiente' => 'required',
    //         'password' => 'required',

    //     ];
        
    //     if ($num_documento != $alumnoActual['num_documento']) {
    //         $validationRules['num_documento'] = 'required|is_unique[estudiantes.num_documento]';
    //     }
    //     if ($email != $alumnoActual['email']) {
    //         $validationRules['email'] = 'required|is_unique[estudiantes.email]';
    //     }
    //     if ($username != $alumnoActual['username']) {
    //         $validationRules['username'] = 'required|is_unique[estudiantes.username]';
    //     }
    //     if ($this->validate($validationRules)) {
    //         $alumno = [
    //             'username' => $username,
    //             'password' => password_hash($password, PASSWORD_DEFAULT),
                
    //         ];

    //         if ($alumnosModel->updateUsuario($idUsuario, $dataUsuario)) {
    //             $this->updateEstudiante($idAlumno, $tipoDocumento, $num_documento, $nombres, $fecha_nacimiento, $genero, $email, $celular, $direccion, $grupoSanguineo, $acudiente);
    //             session()->setFlashdata('Actualizado', 'La información se actualizó exitosamente');
    //             return redirect()->to(base_url('registrar/alumnos'));
                
    //         }else {
    //             session()->setFlashdata('Error', 'No se pudo actualizar la información');
    //             return redirect()->to(base_url('registrar/alumnos', $idAlumno));
    //         }
    //     }
    // }

    // private function updateEstudiante($idAlumno,$tipoDocumento,$num_documento,$nombres,$fecha_nacimiento,$genero,$email,$celular,$direccion,$grupoSanguineo,$acudiente)
    // { 
    //     $alumnosModel = new Alumnos_model();

    //     $data  = [
    //         'tipodocumento_id' => $tipoDocumento,
    //         'num_documento' => $num_documento,
    //         'nombres' => $nombres, 
    //         'fecha_nacimiento' => $fecha_nacimiento,
    //         'genero_id' => $genero,
    //         'email' => $email,
    //         'celular' => $celular,
    //         'direccion' => $direccion,
    //         'gruposanguineo_id' => $grupoSanguineo,
    //         'acudiente_id' => $acudiente                
        
    //     ];

            

    //     $alumnosModel->updateEstudiante($idAlumno,$data); 
    // }

    // public function delete($id)
    // {
    //     $alumnosModel = new Alumnos_model();

    //     $data = [
    //         'estado' => "0" ,
    //     ];
         
    //     $alumnosModel->updateEstudiante($id,$data);
    //     echo "registrar/alumnos";
    // } 

    // public function disable($usuario_id)
    // {
    //     $alumnosModel = new Alumnos_model();

    //     $data = [
    //         'estado' => "0" ,
    //     ];
         
    //     $alumnosModel->updateUsuario($usuario_id,$data);
    //     echo "registrar/alumnos";
    // } 
}
