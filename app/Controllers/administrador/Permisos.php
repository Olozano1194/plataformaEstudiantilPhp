<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permisos extends CI_Controller {

  //  private $permisos;
    public function __construct() {
        parent::__construct();
    //    if (!$this->session->userdata("login")) {
    //        redirect(base_url());
   //     }
    //    $this->permisos = $this->backend_lib->control();
        $this->load->model("Permisos_model");
    //   $this->load->model("Usuarios_model");
    }

    public function index(){

        $data = array(

           // 'permisos' => $this->permisos,
            'getPermisos' => $this->Permisos_model->getPermisos(),
        );
        $this->load->view('layouts/header');
        $this->load->view('layouts/aside',$data);
        $this->load->view('admin/permisos/list',$data);
        $this->load->view('layouts/footer');
    }

    public function add()   {

        $data = array(

           
            'roles' => $this->Permisos_model->getRoles(),
            'menus' => $this->Permisos_model->getMenus(),
        );
        $this->load->view('layouts/header');
        $this->load->view('layouts/aside',$data);
        $this->load->view('admin/permisos/add',$data);
        $this->load->view('layouts/footer');
    }  

   public function store(){

        $menu = $this->input->post("menu");
		$rol = $this->input->post("rol");
		$insertar = $this->input->post("insertar");
		$leer = $this->input->post("leer");
		$actualizar = $this->input->post("actualizar");
        $eliminar = $this->input->post("eliminar");

        $this->form_validation->set_rules("menu","Seleccione Menu","required");
        $this->form_validation->set_rules("rol","Seleccione Rol","required");
       
        if ($this->form_validation->run()) {
            
            $data = array(
                'menu_id' => $menu, 
                'rol_id' => $rol,
                'leer' => $leer,
                'insertar' => $insertar,
                'actualizar' => $actualizar,
                'eliminar' => $eliminar, 
            );

            if ($this->Permisos_model->save($data)) {
            redirect(base_url()."administrador/permisos");
            }
            else {
                $this->session->set_flashdata("Error","No se pudo guardar la informacion");
                redirect(base_url()."administrador/permisos/add");
            }  
        } else {
            $this->add();
        }             
    }  

   public function edit($id)  {

        $data = array(
           
            'roles' => $this->Permisos_model->getRoles(),
            'menus' => $this->Permisos_model->getMenus(),
            'permiso' => $this->Permisos_model->getPermiso($id)
        );
        $this->load->view('layouts/header');
        $this->load->view('layouts/aside',$data);
        $this->load->view('admin/permisos/edit',$data);
        $this->load->view('layouts/footer');
    }  

/*    public function update()
    {
        $idpermiso = $this->input->post("idpermiso");
        $menu = $this->input->post("menu");
		$rol = $this->input->post("rol");
		$insert = $this->input->post("insert");
		$read = $this->input->post("read");
		$update = $this->input->post("update");
        $delete = $this->input->post("delete");
       
        $data = array(
            'read' => $read,
            'insert' => $insert,
            'update' => $update,
            'delete' => $delete, 
        );

        if ($this->Permisos_model->update($idpermiso,$data)) {
        redirect(base_url()."administrador/permisos");
        }
        else {
            $this->session->set_flashdata("Error","No se pudo guardar la informacion");
            redirect(base_url()."administrador/permisos/edit/".$idpermiso);
        }              
    }  */

/*    public function delete($id)
    {
        $this->Permisos_model->delete($id);
        redirect(base_url()."administrador/permisos");
    }   */
}