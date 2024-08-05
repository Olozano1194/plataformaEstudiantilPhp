<?php
namespace App\Models;
use CodeIgniter\Model;

class Acudientes_model extends Model {
  protected $table = 'acudiente';
  protected $primaryKey = 'id';
  protected $allowedFields = ['nombres', 'profesion', 'email', 'celular', 'direccion', 'foto', 'estado', 'genero_id', 'usuario_id'];
  

    public function getAcudientes()
    {
      $builder = $this->db->table('acudiente a');
      $builder ->select("a.*, g.nombre as genero, u.username as usuario, u.password as contraseña");
      $builder ->join('generos g', 'a.genero_id = g.id');
      $builder ->join('usuarios u', 'a.usuario_id = u.id');
      $builder ->where('a.estado', 1);
      $query = $builder->get();
      return $query->getResult();
            
    }

    public function getGeneros()
    {
      $builder = $this->db->table('generos');
      $resultados = $builder->get();
      return $resultados->getResult();
		
    }
    
    public function saveUsuario($data)
    {
      $builder = $this->db->table('usuarios');
      $builder = $builder->insert($data);
      return $builder;
        
    }

    public function lastID()
    {
      return $this->db->insertID();
              
    }

    public function saveAcudiente($data)
    {
      $builder = $this->db->table('acudiente');
      $builder = $builder->insert($data);
      return $builder;
       
    }

    public function getAcudiente($id)
    {
      $builder = $this->db->table('acudiente a');
      $builder ->select("a.*, g.nombre as genero, u.username as username, u.password as contraseña");
      $builder->join('generos g', 'a.genero_id
      = g.id');
      $builder ->join('usuarios u', 'a.usuario_id= u.id');
      $builder->where('a.id', $id);
      $builder->where('a.estado', '1');
      $resultados = $builder->get();

      //  // Depuración: Verifica la consulta y los resultados
      // echo $this->db->getLastQuery(); // Muestra la última consulta SQL ejecutada
      // var_dump($resultados->getResult()); // Muestra todos los resultados
      // die();

      // $acudiente = $resultados->getRow();
      // return $acudiente;
      
    }

    public function updateUsuario($id,$data)
    {
      $builder = $this->db->table('usuarios');
      $builder->where('id', $id);
      
      return $builder->update($data);
		
    }

    public function updateAcudiente($id,$data)
    {
      $builder = $this->db->table('acudiente');
      $builder->where('id', $id);
      return $builder->update($data);

    }
  
}