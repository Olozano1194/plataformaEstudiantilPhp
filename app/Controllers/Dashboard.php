<?php
//defined('BASEPATH') OR exit('No direct script access allowed');
namespace App\Controllers;

use CodeIgniter\Controller;

class Dashboard extends Controller {

    protected $helpers = ['session'];
   
    public function index()
	{
        if (!session()->get('login')) {
            return redirect()->to(base_url('login'));
        }
       
        echo view('layouts/header');
        echo view('layouts/aside');
        echo view('admin/dashboard');
        echo view('layouts/footer');

        
    }

}

