<?php
//defined('BASEPATH') OR exit('No direct script access allowed');
namespace App\Models;

use CodeIgniter\Model;

class Usuarios_model extends Model {

    protected $table = 'usuarios';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'password', 'rol_id', 'estado'];

    public function getUsuarios()
    {
        return $this->select("u.*,r.nombre as rol")
               //$this->db->from("usuarios u");
                ->join("roles r","u.rol_id = r.id")
                ->where("u.estado","1")
                ->findAll();
    }

    public function getUsuario($id)
    {
        return $this->select("u.*,r.nombre as rol")
        // $this->db->from("usuarios u");
                ->join("roles r","u.rol_id = r.id")
                ->where("u.id",$id)
                ->where("u.estado","1")
                ->first();
    } 

    public function getRoles()
    {
        return $this->db->table('roles')
                    ->limit(4,1)
                    ->get()
                    ->getResultArray();

        // $this->db->select("r.*");
        // $this->db->from("roles r");
        // $this->db->limit("4","1");
        // $resultados = $this->db->get();
        // return $resultados->result();
    }

    // public function save($data)
    // {
    //     return $this->save($data);
    // }

    // public function update($id=null,$data=null): bool
    // {
	// 	//$this->db->where("id",$id);
	// 	return $this->update($id,$data);
	// }

    public function login($username, $password)
    {
        return $this->where("username", $username)
                    ->where("password", $password)
                    ->first();
    }
}
