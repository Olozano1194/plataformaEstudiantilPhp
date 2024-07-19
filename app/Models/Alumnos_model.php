<?php
namespace App\Models;
use CodeIgniter\Model;

class Alumnos_model extends Model {
  protected $table = 'estudiantes';
  protected $primaryKey = 'id';
  protected $allowedFields = ['nombres', 'tipoDocumento', 'num_documento', 'genero', 'grupoSanguineo', 'fecha_nacimiento', 'email', 'celular', 'direccion', 'acudiente', 'username', 'password' ];


    public function getAlumnos()
    {
      $builder = $this->db->table('estudiantes e');
      $builder->select("e.*, g.nombre as genero, td.sigla as tipoDocumentoSigla, td.nombre as tipoDocumentoNombre, a.nombres as nomAcudiente, a.celular as celAcudiente, u.username as usuario, u.password as contraseña");
      $builder->join("generos g", "e.genero_id = g.id");
      $builder->join("tipo_documento td", "e.tipodocumento_id = td.id");
      $builder->join("acudiente a", "e.acudiente_id = a.id");
      $builder->join("usuarios u", "e.usuario_id = u.id");
      $builder->where("e.estado", "1");

      $resultados = $builder->get();
      return $resultados->getResult();
    }

    public function getGeneros()
    {
      $builder = $this->db->table('generos');
      $resultados = $builder->get();
      return $resultados->getResult();
		
    }
    
    public function getTipoDocumentos()
    {
      $builder = $this->db->table('tipo_documento');
      $resultados = $builder->get();
      return $resultados->getResult();
		
    }

    public function getAcudientes()
    {
      $builder = $this->db->table('acudiente');
      $resultados = $builder->get();
      return $resultados->getResult();
		
    }

    public function getGrupoSanguineo()
    {
      $builder = $this->db->table('grupo_sanguineo');
      $resultados = $builder->get();
      return $resultados->getResult();
		
    }
  
    public function saveUsuario($data)
    {
       $builder = $this->db->table('usuarios');
       return $builder->insert($data);
    }

    public function lastID()
    {
      return $this->db->insertID();
        
    }

    public function saveEstudiante($data)
    {
        $builder = $this->db->table('estudiantes');
        return $builder->insert($data);
    }

    public function getAlumno($id)
    {
      $builder = $this->db->table('estudiantes e');
      $builder->select("e.*, g.nombre as genero, td.sigla as tipoDocumentoSigla, td.nombre as tipoDocumentoNombre, a.nombres as nomAcudiente, a.celular as celAcudiente, u.username as usuario, u.password as contraseña");
      $builder->join("generos g", "e.genero_id = g.id");
      $builder->join("tipo_documento td", "e.tipodocumento_id = td.id");
      $builder->join("acudiente a", "e.acudiente_id = a.id");
      $builder->join("usuarios u", "e.usuario_id = u.id");
      $builder->where("e.id", $id);
      $builder->where("e.estado", "1");
      
      $resultado = $builder->get();
      return $resultado->getRow();
        
    }

    public function updateUsuario($id,$data)
    {
      $builder = $this->db->table('usuarios');
      $builder->where("id", $id);
      return $builder->update($data);

    }

    public function updateEstudiante($id,$data)
    {
      $builder = $this->db->table('estudiantes');
      $builder->where("id", $id);
      return $builder->update($data);
		
    }
}