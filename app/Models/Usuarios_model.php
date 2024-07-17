<?php

namespace App\Models;
use CodeIgniter\Model;

class Usuarios_model extends Model {

    protected $table = 'usuarios';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'password', 'rol_id', 'estado'];

    public function getUsuarios()
    {
        return $this->select("usuarios.*,roles.nombre as rol")
               //$this->db->from("usuarios u");
                ->join("roles","usuaris.rol_id = roles.id")
                ->where("usuarios.estado","1")
                ->findAll();
    }

    public function getUsuario($id)
    {
        return $this->select("usuarios.*,roles.nombre as rol")
        // $this->db->from("usuarios u");
                ->join("roles","usuarios.rol_id = roles.id")
                ->where("usuarios.id",$id)
                ->where("usuarios.estado","1")
                ->first();
    } 

    public function getRoles()
    {
        return $this->db->table('roles')
                        ->select('*')
                        ->limit(4,1)
                        ->get()
                        ->getResultArray();
        
    }

    public function login($username, $password)
    {
        return $this->where("username", $username)
                    ->where("password", $password)
                    ->first();
    }
}
