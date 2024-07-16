<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Materias extends CI_Controller {

    
    public function __construct()   {
        parent::__construct();
        $this->load->model("Materias_model");
    }

    public function index(){

        $data = array(
            
            'materias' => $this->Materias_model->getMaterias(),
        );
        $this->load->view('layouts/header');
        $this->load->view('layouts/aside',$data);
        $this->load->view('admin/materias/list',$data);
        $this->load->view('layouts/footer');
    }


    public function add() {
        
        $data = array(
            
            'grados' => $this->Materias_model->getGrados(),
        );
    

        $this->load->view('layouts/header');
        $this->load->view('layouts/aside');
        $this->load->view('admin/materias/add',$data);
        $this->load->view('layouts/footer');
    }    

    public function store()  {

        $Area = $this->input->post("Area");
        $espacio_academico = $this->input->post("espacio_academico");
		$Inten_Hora_Sema = $this->input->post("Inten_Hora_Sema");
		$grado_id = $this->input->post("grados");
        

        $this->form_validation->set_rules("Area","Area","required");
        $this->form_validation->set_rules("espacio_academico","Espacio Academico","required");
        $this->form_validation->set_rules("Inten_Hora_Sema","Seleccionar La Cantidad Horaria Semanal","required");
        $this->form_validation->set_rules("grados","Grados Estudiantes","required");
       

        if ($this->form_validation->run()) {

            $data = array(

                'Area' => $Area,
                'espacio_academico' => $espacio_academico,
                'Inten_Hora_Sema' => $Inten_Hora_Sema,
                'grado_id' => $grado_id,
                'estado' => "1"
                );

            if ($this->Materias_model->save($data)) {
             
                redirect(base_url()."Materias/Materias");
            }
            else {

                $this->session->set_flashdata("Error","No se pudo guardar la informacion");
                redirect(base_url()."Materias/materias/add");
            }
        } else {
            $this->add();
        }
    } 

    public function edit($id) {

        $data  = array(
            
            'materias' => $this->Materias_model->getMateria($id),
            'grados' => $this->Materias_model->getGrados()
        );
        
        $this->load->view("layouts/header");
        $this->load->view("layouts/aside");
        $this->load->view("admin/materias/edit",$data);
        $this->load->view("layouts/footer");
    }

    public function update() {

        $idMateria = $this->input->post("idMateria");
        $Area = $this->input->post("Area");
        $espacio_academico = $this->input->post("espacio_academico");
        $Inten_Hora_Sema = $this->input->post("Inten_Hora_Sema");
        $grado_id = $this->input->post("grados");

     //   $materiaActual = $this->Materias_model->getMateria($idMateria);

        $this->form_validation->set_rules("Area","Area","required");
        $this->form_validation->set_rules("espacio_academico","Espacio Academico","required");
        $this->form_validation->set_rules("Inten_Hora_Sema","Seleccionar La Cantidad Horaria Semanal","required");
        $this->form_validation->set_rules("grados","Grados Estudiantes","required");

         if ($this->form_validation->run()) {

        $data = array(

                'Area' => $Area,
                'espacio_academico' => $espacio_academico,
                'Inten_Hora_Sema' => $Inten_Hora_Sema,
                'grado_id' => $grado_id,

            );

        if ($this->Materias_model->update($idMateria,$data)) {

            redirect(base_url()."Materias/Materias");
            
        } else{

             $this->session->set_flashdata("Error","No se pudo actualizar la informacion");
                redirect(base_url()."Materias/materias/edit/".$idMateria);

        } 

    } else {

            $this->edit($idMateria);
        }


    }

     public function delete($id)   {

        $data = array(
            'estado' => "0" ,
        );
         
        $this->Materias_model->update($id,$data);
        echo "Materias/materias";
    }            
      
} 


   /* protected function saveEstudiante($Area,$espacio_academico,$Inten_Hora_Sema,$grado_id)  { 
        $data  = array(

            'Area' => $Area,
            'espacio_academico' => $espacio_academico,
            'Inten_Hora_Sema' => $Inten_Hora_Sema,
            'grado_id' => $grado_id,
            
                
        );

        $this->Materias_model->save($data); 
    } */

   


/*    public function update() {

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
    }  */

/*    public function delete($id)   {

        $data = array(
            'estado' => "0" ,
        );
         
        $this->Alumnos_model->updateEstudiante($id,$data);
        echo "registrar/alumnos";
    }  */

 /*   public function disable($usuario_id)
    {
        $data = array(
            'estado' => "0" ,
        );
         
        $this->Alumnos_model->updateUsuario($usuario_id,$data);
        echo "registrar/alumnos";
    } */ 
