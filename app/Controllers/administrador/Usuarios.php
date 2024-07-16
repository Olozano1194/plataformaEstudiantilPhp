<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

    private $permisos;
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata("login")) {
            redirect(base_url());
        }
        $this->permisos = $this->backend_lib->control();
        $this->load->model("Usuarios_model");
    }

    public function index()
	{
        $data = array(
            'permisos' => $this->permisos,
            'usuarios' => $this->Usuarios_model->getUsuarios(),
        );

        $this->load->view('layouts/header');
        $this->load->view('layouts/aside',$data);
        $this->load->view('admin/usuarios/list',$data);
        $this->load->view('layouts/footer');
    }

    public function add()
	{
        $data = array(
            'permisos' => $this->permisos,
            'roles' => $this->Usuarios_model->getRoles(),
        );
        $this->load->view('layouts/header');
        $this->load->view('layouts/aside',$data);
        $this->load->view('admin/usuarios/add',$data);
        $this->load->view('layouts/footer');
    }

    public function store()
    {
        $nombres = $this->input->post("nombres");
        $apellidos = $this->input->post("apellidos");
        $telefono = $this->input->post("telefono");
        $email = $this->input->post("email");
        $username = $this->input->post("username");
        $password = $this->input->post("password");
        $rol = $this->input->post("rol");

        $this->form_validation->set_rules("nombres","Nombres","required");
        $this->form_validation->set_rules("apellidos","Apellidos","required");
        $this->form_validation->set_rules("telefono","Telefono","required");
        $this->form_validation->set_rules("email","Email","required|is_unique[usuarios.email]");
        $this->form_validation->set_rules("username","Usuario","required|is_unique[usuarios.username]");
        $this->form_validation->set_rules("password","Contraseña","required");
        $this->form_validation->set_rules("rol","Seleccionar Rol","required");

        if ($this->form_validation->run()) {
            $data = array(
                'nombres' => $nombres,
                'apellidos' => $apellidos,
                'telefono' => $telefono,
                'email' => $email,
                'username' => $username,
                'password' => sha1($password),
                'rol_id' => $rol,
                'estado' => "1"
            );
    
            if ($this->Usuarios_model->save($data)) {
                $this->session->set_flashdata("Registrado","La Información se Guardo Exitosamente");
                redirect(base_url()."administrador/usuarios");
            }
            else {
                $this->session->set_flashdata("Error","No se pudo guardar la informacion");
                redirect(base_url()."administrador/usuarios/add");
            }   
        } else {
            $this->add();
        }     
    }

    public function view()
    {
        $idusuario = $this->input->post("idusuario");
        $data = array(
            'usuario' => $this->Usuarios_model->getUsuario($idusuario)
        );
        $this->load->view("admin/usuarios/view",$data);
    }

    public function edit($id)
	{
        $data = array(
            'permisos' => $this->permisos,
            'roles' => $this->Usuarios_model->getRoles(),
            'usuario' => $this->Usuarios_model->getUsuario($id)
        );
        $this->load->view('layouts/header');
        $this->load->view('layouts/aside',$data);
        $this->load->view('admin/usuarios/edit',$data);
        $this->load->view('layouts/footer');
    }

    public function update()
    {
        $idusuario = $this->input->post("idusuario");
        $nombres = $this->input->post("nombres");
        $apellidos = $this->input->post("apellidos");
        $telefono = $this->input->post("telefono");
        $email = $this->input->post("email");
        $username = $this->input->post("username");
        $rol = $this->input->post("rol");

        $usuarioActual = $this->Usuarios_model->getUsuario($idusuario);

        $this->form_validation->set_rules("nombres","Nombres","required");
        $this->form_validation->set_rules("apellidos","Apellidos","required");
        $this->form_validation->set_rules("telefono","Telefono","required");
        if ($email == $usuarioActual->email) {
            $is_unique = '';
        }
        else {
            $is_unique = "|is_unique[usuarios.email]";  
        }
        $this->form_validation->set_rules("email","Email","required".$is_unique);
        if ($username == $usuarioActual->username) {
            $is_unique = '';
        }
        else {
            $is_unique = "|is_unique[usuarios.username]";  
        }
        $this->form_validation->set_rules("username","Usuario","required".$is_unique);
        $this->form_validation->set_rules("rol","Seleccionar Rol","required");

        if ($this->form_validation->run()) {
            $data = array(
                'nombres' => $nombres,
                'apellidos' => $apellidos,
                'telefono' => $telefono,
                'email' => $email,
                'username' => $username,
                'rol_id' => $rol
            );
    
            if ($this->Usuarios_model->update($idusuario,$data)) {
                $this->session->set_flashdata("Actualizado","La Información se Actualizo Exitosamente");
                redirect(base_url()."administrador/usuarios");
            }
            else {
                $this->session->set_flashdata("Error","No se pudo guardar la informacion");
                redirect(base_url()."administrador/usuarios/edit".$idusuario);
            }      
        } else {
            $this->edit($idusuario);
        }
    }

    public function delete($id)
    {
        $data = array(
            'estado' => "0" ,
         );         
         $this->Usuarios_model->update($id,$data);
         echo "administrador/usuarios";
    }

    public function editPassword($id)
	{
        $data = array(
            'permisos' => $this->permisos,
            'usuario' => $this->Usuarios_model->getUsuario($id)
        );
        $this->load->view('layouts/header');
        $this->load->view('layouts/aside',$data);
        $this->load->view('admin/usuarios/editPassword',$data);
        $this->load->view('layouts/footer');
    }
    
    public function updatePassword()
    {
        $idusuario = $this->input->post("idusuario");
        $passwordActual = $this->input->post("passwordActual");
        $nuevoPassword = $this->input->post("nuevoPassword");
        $repetirPassword = $this->input->post("repetirPassword");

        $usuarioActual = $this->Usuarios_model->getUsuario($idusuario);
        $hash =  $usuarioActual->password;

        if (sha1($passwordActual) == $hash) {
            $matches = '';
        } else {
            $matches = '|matches[password de la BD]';
        }
        $this->form_validation->set_rules('passwordActual', 'Contraseña Actual', 'trim|required'.$matches);
        $this->form_validation->set_rules("nuevoPassword","Nueva Contraseña","required");
        $this->form_validation->set_rules('repetirPassword', 'Repetir Contraseña', 'trim|required|matches[nuevoPassword]');
        
       
        if ($this->form_validation->run()) {
            $data = array(
                'password' => sha1($repetirPassword),
            );
    
            if ($this->Usuarios_model->update($idusuario,$data)) {
                $this->session->set_flashdata("Actualizado","La Contraseña se Actualizo Exitosamente");
                redirect(base_url()."administrador/usuarios");
            }
            else {
                $this->session->set_flashdata("Error","No se pudo guardar la informacion");
                redirect(base_url()."administrador/usuarios/editPassword".$idusuario);
            }      
        } else {
            $this->editPassword($idusuario);
        }    
    }
}