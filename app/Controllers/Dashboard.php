<?php
//defined('BASEPATH') OR exit('No direct script access allowed');
namespace App\Controllers;


class Dashboard extends baseController {

    //private $permisos;
    
    // public function __construct()
    // {
    //     parent::__construct();
    //     if (!$this->session->userdata("login")) {
    //         redirect(base_url());
    //     }
    //    // $this->permisos = $this->backend_lib->control();
    //     //$this->load->model("Producciones_model");
    // }

    public function index()
	{
       /* $data = array(
            'permisos' => $this->permisos,
            'cantProducciones' => $this->Backend_model->rowCount("producciones"),
            'cantProdutosCatalogos' => $this->Backend_model->rowCount("productos_catalogo"),
            'cantMateriasPrimasInsumos' => $this->Backend_model->rowCount("materiasprimas_insumos"),
            'cantControlMpi' => $this->Backend_model->rowCount("bodega_principal")
        );*/
        echo view('layouts/header');
        echo view('layouts/aside');
        echo view('admin/dashboard');
        echo view('layouts/footer');

        
    }

}

