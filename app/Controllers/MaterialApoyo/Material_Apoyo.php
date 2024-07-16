<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Material_Apoyo extends CI_Controller {

    
    public function __construct()   {
        parent::__construct();
        $this->load->model("MaterialApoyo_model");
    }

    public function index(){

        $data = array(
            
            'material' => $this->MaterialApoyo_model->getMateriales(),
        );
        $this->load->view('layouts/header');
        $this->load->view('layouts/aside',$data);
        $this->load->view('admin/materialapoyo/list',$data);
        $this->load->view('layouts/footer');
    }


    public function add() {
        
          

        $this->load->view('layouts/header');
        $this->load->view('layouts/aside');
        $this->load->view('admin/materialapoyo/add');
        $this->load->view('layouts/footer');
    }    

    public function store()  {

        $nombre = $this->input->post("nombre");
        $descripcion = $this->input->post("descripcion");
		$archivo_adjunto = $this->input->post("archivo_adjunto");
		
        

        $this->form_validation->set_rules("nombre","Nombre","required");
        $this->form_validation->set_rules("descripcion","Descripción","required");
     //   $this->form_validation->set_rules("archivo_adjunto","Seleccionar el Archivo Adjunto","required");
       
       

        if ($this->form_validation->run()) {

            $data = array(

                'nombre' => $nombre,
                'descripcion' => $descripcion,
                'archivo_adjunto' => $archivo_adjunto,
                'estado' => "1"
                );

            if ($this->MaterialApoyo_model->save($data)) {
             
                redirect(base_url()."MaterialApoyo/Material_Apoyo");
            }
            else {

                $this->session->set_flashdata("Error","No se pudo guardar la informacion");
                redirect(base_url()."MaterialApoyo/materialapoyo/add");
            }
        } else {
            $this->add();
        }
    } 

    public function edit($id) {

        $data  = array(
            
            'material' => $this->MaterialApoyo_model->getMaterial($id),
            
        );
        
        $this->load->view("layouts/header");
        $this->load->view("layouts/aside");
        $this->load->view("admin/materialapoyo/edit",$data);
        $this->load->view("layouts/footer");
    }

    public function update() {

        $idMaterial = $this->input->post("idMaterial");
        $nombre = $this->input->post("nombre");
        $descripcion = $this->input->post("descripcion");
        $archivo_adjunto = $this->input->post("archivo_adjunto");

     //   $materiaActual = $this->Materias_model->getMateria($idMateria);

         $this->form_validation->set_rules("nombre","Nombre","required");
        $this->form_validation->set_rules("descripcion","Descripción","required");

         if ($this->form_validation->run()) {

        $data = array(

                'nombre' => $nombre,
                'descripcion' => $descripcion,
                'archivo_adjunto' => $archivo_adjunto,

            );

        if ($this->MaterialApoyo_model->update($idMaterial,$data)) {

            redirect(base_url()."MaterialApoyo/Material_Apoyo");
            
        } else{

             $this->session->set_flashdata("Error","No se pudo actualizar la informacion");
                redirect(base_url()."MaterialApoyo/materialapoyo/edit/".$idMaterial);

        } 

    } else {

            $this->edit($idMaterial);
        }


    }

     public function delete($id)   {

        $data = array(
            'estado' => "0" ,
        );
         
        $this->MaterialApoyo_model->update($id,$data);
        echo "MaterialApoyo/Material_Apoyo";
    }            
      
} 