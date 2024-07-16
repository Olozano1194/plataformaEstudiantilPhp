<?php
//defined('BASEPATH') OR exit('No direct script access allowed');
namespace App\Controllers;

use App\Models\Usuarios_model;

class Auth extends BaseController {
    
    // protected $usersModel;
    // public function __construct()
    // {
    //     // parent::__construct();
    //     // $this->load->model('Usuarios_model');
    //     $this->usersModel = new Usuarios_model();
    // }

	public function index()
	{
        if (session()->get('login')) {
            return redirect()->to(base_url('dashboard'));
        }else {
            return view("admin/login");
        }
           
    }
    
    public function login()
    {
        $username = $this->request->getPost("username");
        $password = $this->request->getPost("password");

        if (empty($username) || empty($password)) {
            session()->setFlashdata('Error', 'Ambos campos son obligatorios');
            return redirect()->to(base_url());
        }

        $model = new Usuarios_model();
        $res = $model->login($username, sha1($password));
        if (!$res) {
            session()->setFlashdata("Error", "El usuario y/o contraseña son incorrectos");
            return redirect()->to(base_url());
        }
        else{
            $data = [
                'id' => $res['id'],
                'username' => $res['username'],
                'rol' => $res['rol_id'],
                'login' => TRUE

            ];               
            session()->set($data);
            return redirect()->to(base_url()."dashboard");
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url());
    }
}
