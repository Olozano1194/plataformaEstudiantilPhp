<?php

namespace App\Models;
use CodeIgniter\Model;

class Alumnos_model extends Model {
  protected $table = 'estudiantes';
  protected $primaryKey = 'id';
  // protected $allowedFields = ['tipodocumento_id', 'num_documento', 'nombres', 'fecha_nacimiento', 'genero_id', 'email', 'celular', 'direccion', 'gruposanguineo'];

 
  public function getAlumnos()
    {
      return $this->select("estudiantes.*,
                            generos.nombre as genero, 
                            tipo_documento.sigla as tipoDocumentoSigla, 
                            tipo_documento.nombre as tipoDocumentoNombre, 
                            acudiente.nombres as nomAcudiente, 
                            acudiente.celular as celAcudiente, 
                            usuarios.username as usuario, 
                            usuarios.password as contraseña")
        
                  ->join("generos", "estudiantes.genero_id = generos.id")
                  ->join("tipo_documento", "estudiantes.tipodocumento_id = tipo_documento.id")
                  ->join("acudiente", "estudiantes.acudiente_id = acudiente.id")
                  ->join("usuarios", "estudiantes.usuario_id = usuarios.id")
                  ->where("estudiantes.estado","1")
                  ->asObject()
                  ->findAll();
    }

    public function getGeneros()
    {
      return $this->db->table("generos")
                      ->get()
                      ->getResultArray();
				
    }
    
    public function getTipoDocumentos()
    {
      return $this->db->table("tipo_documento")
                      ->get()
                      ->getResultArray();
		
    }

    public function getAcudientes()
    {
      return $this->db->table("acudiente")
                      ->get()
                      ->getResultArray();
		
    }

    public function getGrupoSanguineo()
    {
      return $this->db->table("grupo_sanguineo")
                      ->get()
                      ->getResultArray();
		
    }
  
    public function saveUsuario($data)
    {
      $this->db->table("usuarios")->insert($data);
              
    }

    public function lastID()
    {
      $this->db->table("usuarios")
                ->select("id")
                ->orderBy("id", "desc")
                ->limit(1)
                ->get()
                ->getResultArray();
              
    }

    public function saveEstudiante($data)
    {
      $this->db->table("estudiante")->insert($data);
              
    }

    public function getAlumno($id)
    {
      return $this->db->table("estudiante e")
                      ->select("e.*,g.nombre as genero, 
                                td.sigla as tipoDocumentoSigla, 
                                td.nombre as tipoDocumentoNombre, 
                                a.nombres as nomAcudiente, 
                                a.celular as celAcudiente, 
                                u.username as usuario, 
                                u.password as contraseña")
                      ->join("generos g", "e.genero_id = g.id")
                      ->join("tipo_documento td", "e.tipodocumento_id = td.id")
                      ->join("acudiente a  ", "e.acudiente_id = a.id")
                      ->join("usuarios u  ", "e.usuario_id = u.id")
                      ->where("e.id",$id)
                      ->where("e.estado","1")
                      ->get()
                      ->getRow();
    }

    public function updateUsuario($id,$data)
    {
      return $this->db->table("usuarios")
                      ->where('id', $id)
                      ->update($data);
    }

    public function updateEstudiante($id,$data)
    {
      return $this->db->table("estudiante")
                      ->where('id', $id)
                      ->update($data);
		
    }
}