<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');

class Listas_Matriculas extends CI_Model {


    public function ListaMatricula($id_estudiante){
        $this->db->select('*');
        $this->db->where('id_estudiante',$id_estudiante);
        $r = $this->db->get('Listas_Matriculas');

        if($r->num_rows()>0){
            return $r->result();
        }
    }

    public function ListasMatriculas(){
        $this->db->select('*');
        $r = $this->db->get('Listas_Matriculas');

        if($r->num_rows()>0){
            return $r->result();
        }
    }

    public function ListasMatriculasPorCurso($codigo_curso){
        $this->db->select('*');
        $this->db->where('codigo_curso', $codigo_curso);
        $r = $this->db->get('Listas_Matriculas');

        if($r->num_rows()>0){
            return $r->result();
        }
    }

    public function obtenerFallas($id_estudiante, $codigo_curso){
        $this->db->select('*');
        $this->db->where('id_estudiante',$id_estudiante);
        $this->db->where('codigo_curso', $codigo_curso);
        $r = $this->db->get('Listas_Matriculas');

        if($r->num_rows()>0){
            return $r->result()[0]->fallas;
        }
    }

    public function borraListasMatriculasPorCurso($codigo_curso){
        $consulta=$this->db->query("DELETE FROM Listas_Matriculas WHERE codigo_curso=$codigo_curso");
        if($consulta==true){
            return true;
        }else{
            return false;
        } 
    }
}