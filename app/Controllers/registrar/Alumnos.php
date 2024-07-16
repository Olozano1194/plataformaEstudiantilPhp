<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alumnos extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Alumnos_model");
    }

    public function index()
	{
        $data = array(
            
            'alumnos' => $this->Alumnos_model->getAlumnos(),
        );
        $this->load->view('layouts/header');
        $this->load->view('layouts/aside',$data);
        $this->load->view('admin/alumnos/list',$data);
        $this->load->view('layouts/footer');
    }

    public function add()
    {
        $fechaIngreso = date('Y-m-d');
        $data = array(
            'genero' => $this->Alumnos_model->getGeneros(),
            'tipoDocumento' => $this->Alumnos_model->getTipoDocumentos(),
            'acudiente' => $this->Alumnos_model->getAcudientes(),
            'grupoSanguineo' => $this->Alumnos_model->getGrupoSanguineo(),
            'fechaIngreso' => $fechaIngreso
        );

        $this->load->view('layouts/header');
        $this->load->view('layouts/aside',$data);
        $this->load->view('admin/alumnos/add',$data);
        $this->load->view('layouts/footer');
    }    

    public function store()
    {
        $nombres = $this->input->post("nombres");
		$tipoDocumento = $this->input->post("tipoDocumento");
		$num_documento = $this->input->post("num_documento");
        $genero = $this->input->post("genero");
        $grupoSanguineo = $this->input->post("grupoSanguineo");
        $fecha_nacimiento = $this->input->post("fecha_nacimiento");
        $email = $this->input->post("email");
        $celular = $this->input->post("celular");
        $direccion = $this->input->post("direccion");
        $acudiente = $this->input->post("acudiente");

        $username = $this->input->post("username");
        $password = $this->input->post("password");
        $fechaIngreso = $this->input->post("fechaIngreso");

        $this->form_validation->set_rules("nombres","Nombre Completo","required");
        $this->form_validation->set_rules("tipoDocumento","Seleccionar Tipo de Documento","required");
        $this->form_validation->set_rules("num_documento","Numero de Documento","required|is_unique[estudiantes.num_documento]");
        $this->form_validation->set_rules("genero","Seleccionar Genero","required");
        $this->form_validation->set_rules("grupoSanguineo","Seleccionar Grupo Sanguineo","required");
        $this->form_validation->set_rules("fecha_nacimiento","Fecha Nacimiento","required");
        $this->form_validation->set_rules("email","Email","required|is_unique[estudiantes.email]");
        $this->form_validation->set_rules("celular","Celular","required");
        $this->form_validation->set_rules("direccion","Direccion","required");
        $this->form_validation->set_rules("acudiente","Seleccionar Acudiente","required");
        $this->form_validation->set_rules("username","Username","required");
        $this->form_validation->set_rules("password","Password","required");

        if ($this->form_validation->run())
        {
            $data = array(
                'username' => $username,
                'password' => sha1($password),
                'dia_ingreso' => $fechaIngreso,
                'rol_id' => "4" ,
                'estado' => "1"                 
            );
            if ($this->Alumnos_model->saveUsuario($data)) {
                $idUsuario = $this->Alumnos_model->lastID();
                $this->saveEstudiante($idUsuario,$tipoDocumento,$num_documento,$nombres,$fecha_nacimiento,$genero,$email,$celular,$direccion,$grupoSanguineo,$acudiente);
                $this->session->set_flashdata("Registrado","La información se guardo exitosamente");
                redirect(base_url()."registrar/alumnos");
            }
            else {
                $this->session->set_flashdata("Error","No se pudo guardar la informacion");
                redirect(base_url()."registrar/alumnos/add");
            }
        }
        else {
            $this->add();
        }       
    }
    protected function saveEstudiante($idUsuario,$tipoDocumento,$num_documento,$nombres,$fecha_nacimiento,$genero,$email,$celular,$direccion,$grupoSanguineo,$acudiente)
    { 
        $data  = array(

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
                
        );

        $this->Alumnos_model->saveEstudiante($data); 
    }
   
    public function edit($id)
    {
		$data  = array(
            'alumno' => $this->Alumnos_model->getAlumno($id),
            'genero' => $this->Alumnos_model->getGeneros(),
            'tipoDocumento' => $this->Alumnos_model->getTipoDocumentos(),
            'acudiente' => $this->Alumnos_model->getAcudientes(),
            'grupoSanguineo' => $this->Alumnos_model->getGrupoSanguineo(),
        );
        
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside",$data);
		$this->load->view("admin/alumnos/edit",$data);
		$this->load->view("layouts/footer");
    }

    public function update()
    {
        $idAlumno = $this->input->post("idAlumno");
        $idUsuario = $this->input->post("idUsuario");
        $nombres = $this->input->post("nombres");
		$tipoDocumento = $this->input->post("tipoDocumento");
		$num_documento = $this->input->post("num_documento");
        $genero = $this->input->post("genero");
        $grupoSanguineo = $this->input->post("grupoSanguineo");
        $fecha_nacimiento = $this->input->post("fecha_nacimiento");
        $email = $this->input->post("email");
        $celular = $this->input->post("celular");
        $direccion = $this->input->post("direccion");
        $acudiente = $this->input->post("acudiente");

        $username = $this->input->post("username");
        $password = $this->input->post("password");
        $fechaIngreso = $this->input->post("fechaIngreso");

        $alumnoActual = $this->Alumnos_model->getAlumno($idAlumno);

        $this->form_validation->set_rules("nombres","Nombre Completo","required");
        $this->form_validation->set_rules("tipoDocumento","Seleccionar Tipo de Documento","required");
        if ($num_documento == $alumnoActual->num_documento) {
            $is_unique = '';
        }
        else {
            $is_unique = "|is_unique[estudiantes.num_documento]";
            
        }
        $this->form_validation->set_rules("genero","Seleccionar Genero","required");
        $this->form_validation->set_rules("grupoSanguineo","Seleccionar Grupo Sanguineo","required");
        $this->form_validation->set_rules("fecha_nacimiento","Fecha Nacimiento","required");
        if ($email == $alumnoActual->email) {
            $is_unique = '';
        }
        else {
            $is_unique = "|is_unique[estudiantes.email]";
        }
        $this->form_validation->set_rules("celular","Celular","required");
        $this->form_validation->set_rules("direccion","Direccion","required");
        $this->form_validation->set_rules("acudiente","Seleccionar Acudiente","required");
        if ($username == $alumnoActual->usuario) {
            $is_unique = '';
        }
        else {
            $is_unique = "|is_unique[estudiantes.usuario]";
        }
        $this->form_validation->set_rules("password","Password","required");

        if ($this->form_validation->run())
        {
            $data = array(
                'username' => $username,
                'password' => sha1($password),  
            );
    
            if ($this->Alumnos_model->updateUsuario($idUsuario,$data)) {
                $this->updateEstudiante($idAlumno,$tipoDocumento,$num_documento,$nombres,$fecha_nacimiento,$genero,$email,$celular,$direccion,$grupoSanguineo,$acudiente);
                $this->session->set_flashdata("Actualizado","La información se actualizo exitosamente");
                redirect(base_url()."registrar/alumnos");
            }
            else{
                $this->session->set_flashdata("Error","No se pudo actualizar la informacion");
                redirect(base_url()."registrar/alumnos/edit/".$idAlumno);
            }
        }
        else {
            $this->edit($idAlumno);
        }		
    }

    protected function updateEstudiante($idAlumno,$tipoDocumento,$num_documento,$nombres,$fecha_nacimiento,$genero,$email,$celular,$direccion,$grupoSanguineo,$acudiente)
    { 
        $data  = array(

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
        );

        $this->Alumnos_model->updateEstudiante($idAlumno,$data); 
    }

    public function delete($id)
    {
        $data = array(
            'estado' => "0" ,
        );
         
        $this->Alumnos_model->updateEstudiante($id,$data);
        echo "registrar/alumnos";
    } 

    public function disable($usuario_id)
    {
        $data = array(
            'estado' => "0" ,
        );
         
        $this->Alumnos_model->updateUsuario($usuario_id,$data);
        echo "registrar/alumnos";
    } 
}