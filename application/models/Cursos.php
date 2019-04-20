<?php 
if ( !defined('BASEPATH')) exit('No direct script access allowed');

class Cursos extends CI_Model {


    public function obtenerCurso($codigo_curso){
        $this->db->select('*');
        $this->db->where('codigo_curso',$codigo_curso);
        $r = $this->db->get('Cursos');

        if($r->num_rows()>0){
            return $r->result();
        }
    }

    public function obtenerCursosPorProfesor($id_profesor_asignado){
        $this->db->select('*');
        $this->db->where('id_profesor_asignado',$id_profesor_asignado);
        $r = $this->db->get('Cursos');

        if($r->num_rows()>0){
            return $r->result();
        }
    }

    public function obtenerCursos(){
        $this->db->select('*');
        $r = $this->db->get('Cursos');

        if($r->num_rows()>0){
            return $r->result(); 
        }
    }

    public function borraCursosPorProfesor($id_profesor_asignado){
        $consulta=$this->db->query("DELETE FROM Cursos WHERE id_profesor_asignado=$id_profesor_asignado");
        if($consulta==true){
            return true;
        }else{
            return false;
        } 
    }

    public function borraCursosPorCodigo($codigo_curso){
        $consulta=$this->db->query("DELETE FROM Cursos WHERE codigo_curso=$codigo_curso");
        if($consulta==true){
            return true;
        }else{
            return false;
        } 
    }
}