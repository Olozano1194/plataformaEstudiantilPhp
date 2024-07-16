<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Actividades extends CI_Controller {

    
    public function __construct()   {
        parent::__construct();
        $this->load->model("Actividades_model");
    }

    public function index(){

        $data = array(
            
            'actividades' => $this->Actividades_model->getActividades(),
        );
        $this->load->view('layouts/header');
        $this->load->view('layouts/aside',$data);
        $this->load->view('admin/actividades/list',$data);
        $this->load->view('layouts/footer');
    }


    public function add() {
        
        $data = array(
            
            'docente' => $this->Actividades_model->getDocentes(),
            'material' => $this->Actividades_model->getMateriales(),
        );
    

        $this->load->view('layouts/header');
        $this->load->view('layouts/aside');
        $this->load->view('admin/actividades/add',$data);
        $this->load->view('layouts/footer');
    }    

    public function store()  {

        $nombre = $this->input->post("nombre");
        $descripcion = $this->input->post("descripcion");
		$archivo_adjunto = $this->input->post("archivo_adjunto");
		$fecha_inicio = $this->input->post("fecha_inicio");
        $fecha_fin = $this->input->post("fecha_fin");
        $material = $this->input->post("material");
        $docente_id = $this->input->post("docente");
        

        $this->form_validation->set_rules("nombre","Nombre Completo","required");
        $this->form_validation->set_rules("descripcion","Descripción","required");
     //   $this->form_validation->set_rules("archivo_adjunto","Seleccionar el Archivo adjunto","required");
        $this->form_validation->set_rules("fecha_inicio","Fecha de Inicio","required");
        $this->form_validation->set_rules("fecha_fin","Fecha Final","required");
        $this->form_validation->set_rules("material","Material de Apoyo","required");
        $this->form_validation->set_rules("docente","Selecione el Docente","required");
       

        if ($this->form_validation->run()) {

            $data = array(

                'nombre' => $nombre,
                'descripcion' => $descripcion,
                'archivo_adjunto' => $archivo_adjunto,
                'fecha_inicio' => $fecha_inicio,
                'fecha_fin' => $fecha_fin,
                'materialapoyo_id' => $material,
                'docente_id' => $docente_id,
                'estado' => "1"
                );

            if ($this->Actividades_model->save($data)) {
             
                redirect(base_url()."Actividades/Actividades");
            }
            else {

                $this->session->set_flashdata("Error","No se pudo guardar la informacion");
                redirect(base_url()."Actividades/actividades/add");
            }
        } else {
            $this->add();
        }
    } 

    public function edit($id) {

        $data  = array(
            
            'actividades' => $this->Actividades_model->getActividad($id),
            'docente' => $this->Actividades_model->getDocentes(),
            'material' => $this->Actividades_model->getMateriales(),
        );
        
        $this->load->view("layouts/header");
        $this->load->view("layouts/aside");
        $this->load->view("admin/actividades/edit",$data);
        $this->load->view("layouts/footer");
    }

    public function update() {

        $idActividad = $this->input->post("idActividad");
        $nombre = $this->input->post("nombre");
        $descripcion = $this->input->post("descripcion");
        $archivo_adjunto = $this->input->post("archivo_adjunto");
        $fecha_inicio = $this->input->post("fecha_inicio");
        $fecha_fin = $this->input->post("fecha_fin");
        $material = $this->input->post("material");
        $docente_id = $this->input->post("docente");

     //   $materiaActual = $this->Materias_model->getMateria($idMateria);

        $this->form_validation->set_rules("nombre","Nombre Completo","required");
        $this->form_validation->set_rules("descripcion","Descripción","required");
     //   $this->form_validation->set_rules("archivo_adjunto","Seleccionar el Archivo adjunto","required");
        $this->form_validation->set_rules("fecha_inicio","Fecha de Inicio","required");
        $this->form_validation->set_rules("fecha_fin","Fecha Final","required");
        $this->form_validation->set_rules("material","Material de Apoyo","required");
        $this->form_validation->set_rules("docente","Selecione el Docente","required");

         if ($this->form_validation->run()) {

        $data = array(

                'nombre' => $nombre,
                'descripcion' => $descripcion,
                'archivo_adjunto' => $archivo_adjunto,
                'fecha_inicio' => $fecha_inicio,
                'fecha_fin' => $fecha_fin,
                'materialapoyo_id' => $material,
                'docente_id' => $docente_id,

            );

        if ($this->Actividades_model->update($idActividad,$data)) {

            redirect(base_url()."Actividades/Actividades");
            
        } else{

             $this->session->set_flashdata("Error","No se pudo actualizar la informacion");
                redirect(base_url()."Actividades/actividades/edit/".$idActividad);

        } 

    } else {

            $this->edit($idactividad);
        }


    }

     public function delete($id)   {

        $data = array(
            'estado' => "0" ,
        );
         
        $this->Actividades_model->update($id,$data);
        echo "Actividades/actividades";
    }            
      
} 