<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Docentes extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Docentes_model");
    }

    public function index()
	{
        $data = array(
            
            'docentes' => $this->Docentes_model->getDocentes(),
        );
        $this->load->view('layouts/header');
        $this->load->view('layouts/aside',$data);
        $this->load->view('admin/docentes/list',$data);
        $this->load->view('layouts/footer');
    }

    public function add()
    {
        $fechaIngreso = date('Y-m-d');
        $data = array(
            'genero' => $this->Docentes_model->getGeneros(),
            'tipoDocumento' => $this->Docentes_model->getTipoDocumentos(),
            'fechaIngreso' => $fechaIngreso
        );

        $this->load->view('layouts/header');
        $this->load->view('layouts/aside',$data);
        $this->load->view('admin/docentes/add',$data);
        $this->load->view('layouts/footer');
    }    

    public function store()
    {
        $nombres = $this->input->post("nombres");
		$tipoDocumento = $this->input->post("tipoDocumento");
		$num_documento = $this->input->post("num_documento");
        $genero = $this->input->post("genero");
        $profesion = $this->input->post("profesion");
        $salario = $this->input->post("salario");
        $fecha_nacimiento = $this->input->post("fecha_nacimiento");
        $email = $this->input->post("email");
        $celular = $this->input->post("celular");
        $direccion = $this->input->post("direccion");
        $fechaIngreso = $this->input->post("fechaIngreso");
        

        $username = $this->input->post("username");
        $password = $this->input->post("password");

        $this->form_validation->set_rules("nombres","Nombre Completo","required");
        $this->form_validation->set_rules("tipoDocumento","Seleccionar Tipo de Documento","required");
        $this->form_validation->set_rules("num_documento","Numero de Documento","required|is_unique[estudiantes.num_documento]");
        $this->form_validation->set_rules("genero","Seleccionar Genero","required");
        $this->form_validation->set_rules("profesion","Profesion","required");
        $this->form_validation->set_rules("salario","Salario","required");
        $this->form_validation->set_rules("fecha_nacimiento","Fecha Nacimiento","required");
        $this->form_validation->set_rules("email","Email","required|is_unique[estudiantes.email]");
        $this->form_validation->set_rules("celular","Celular","required");
        $this->form_validation->set_rules("direccion","Direccion","required");
        $this->form_validation->set_rules("username","Username","required");
        $this->form_validation->set_rules("password","Password","required");

        if ($this->form_validation->run())
        {
            $data = array(
                'username' => $username,
                'password' => sha1($password),
                'dia_ingreso' => $fechaIngreso,
                'rol_id' => "2" ,
                'estado' => "1"                 
            );
            if ($this->Docentes_model->saveUsuario($data)) {
                $idUsuario = $this->Docentes_model->lastID();
                $this->savedocente($idUsuario,$tipoDocumento,$num_documento,$nombres,$fecha_nacimiento,$genero,$email,$celular,$direccion,$fechaIngreso,$salario,$profesion);
                $this->session->set_flashdata("Registrado","La información se guardo exitosamente");
                redirect(base_url()."registrar/docentes");
            }
            else {
                $this->session->set_flashdata("Error","No se pudo guardar la informacion");
                redirect(base_url()."registrar/docentes/add");
            }
        }
        else {
            $this->add();
        }       
    }
    protected function saveDocente($idUsuario,$tipoDocumento,$num_documento,$nombres,$fecha_nacimiento,$genero,$email,$celular,$direccion,$fechaIngreso,$salario,$profesion)
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
            'dia_ingreso' => $fechaIngreso,
            'salario' => $salario,
            'estado' => "1" ,
            'profesion' => $profesion,
            'usuario_id' => $idUsuario
                
        );

        $this->Docentes_model->saveDocente($data); 
    }

    public function edit($id)
    {
		$data  = array(
            'docente' => $this->Docentes_model->getDocente($id),
            'genero' => $this->Docentes_model->getGeneros(),
            'tipoDocumento' => $this->Docentes_model->getTipoDocumentos(),
        );
        
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside",$data);
		$this->load->view("admin/docentes/edit",$data);
		$this->load->view("layouts/footer");
    }

    public function update()
    {
        $idDocente = $this->input->post("idDocente");
        $idUsuario = $this->input->post("idUsuario");
        $nombres = $this->input->post("nombres");
		$tipoDocumento = $this->input->post("tipoDocumento");
		$num_documento = $this->input->post("num_documento");
        $genero = $this->input->post("genero");
        $profesion = $this->input->post("profesion");
        $salario = $this->input->post("salario");
        $fecha_nacimiento = $this->input->post("fecha_nacimiento");
        $email = $this->input->post("email");
        $celular = $this->input->post("celular");
        $direccion = $this->input->post("direccion");
                
        $username = $this->input->post("username");
        $password = $this->input->post("password");

        $docenteActual = $this->Docentes_model->getDocente($idDocente);

        $this->form_validation->set_rules("nombres","Nombre Completo","required");
        $this->form_validation->set_rules("tipoDocumento","Seleccionar Tipo de Documento","required");
        if ($num_documento == $docenteActual->num_documento) {
            $is_unique = '';
        }
        else {
            $is_unique = "|is_unique[estudiantes.num_documento]";
            
        }
        $this->form_validation->set_rules("genero","Seleccionar Genero","required");
        $this->form_validation->set_rules("profesion","Profesion","required");
        $this->form_validation->set_rules("salario","Salario","required");
        $this->form_validation->set_rules("fecha_nacimiento","Fecha Nacimiento","required");
        if ($email == $docenteActual->email) {
            $is_unique = '';
        }
        else {
            $is_unique = "|is_unique[estudiantes.email]";
        }
        $this->form_validation->set_rules("celular","Celular","required");
        $this->form_validation->set_rules("direccion","Direccion","required");
        if ($username == $docenteActual->usuario) {
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
    
            if ($this->Docentes_model->updateUsuario($idUsuario,$data)) {
                $this->updateDocente($idDocente,$nombres,$tipoDocumento,$num_documento,$genero,$profesion,$salario,$fecha_nacimiento,$email,$celular,$direccion);
                $this->session->set_flashdata("Actualizado","La información se actualizo exitosamente");
                redirect(base_url()."registrar/docentes");
            }
            else{
                $this->session->set_flashdata("Error","No se pudo actualizar la informacion");
                redirect(base_url()."registrar/docentes/edit/".$idDocente);
            }
        }
        else {
            $this->edit($idDocente);
        }		
    }

    protected function updateDocente($idDocente,$nombres,$tipoDocumento,$num_documento,$genero,$profesion,$salario,$fecha_nacimiento,$email,$celular,$direccion)
    { 
        $data  = array(
            'nombres' => $nombres,
            'tipodocumento_id' => $tipoDocumento,
            'num_documento' => $num_documento,
            'genero_id' => $genero,
            'profesion' => $profesion,
            'salario' => $salario,
            'fecha_nacimiento' => $fecha_nacimiento,
            'email' =>$email,
            'celular' => $celular,
            'direccion' => $direccion
            
        );

        $this->Docentes_model->updateDocente($idDocente,$data); 
    }

    public function delete($id)
    {
        $data = array(
            'estado' => "0" ,
        );
         
        $this->Docentes_model->updateDocente($id,$data);
        echo "registrar/docentes";
    } 

    public function disable($usuario_id)
    {
        $data = array(
            'estado' => "0" ,
        );
         
        $this->Docentes_model->updateUsuario($usuario_id,$data);
        echo "registrar/docentes";
    } 

}