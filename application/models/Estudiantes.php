<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');

class Estudiantes extends CI_Model {


    public function obtenerEstudiante($id_estudiantes){
        $this->db->select('*');
        $this->db->where('id_estudiante',$id_estudiantes);
        $r = $this->db->get('Estudiantes');

        if($r->num_rows()>0){
            return $r->result()[0];
        }
    }
    
    public function obtenerEstudianteCod($codigo){
        $this->db->select('*');
        $this->db->where('codigo',$codigo);
        $r = $this->db->get('Estudiantes');

        if($r->num_rows()>0){
            return $r->result()[0];
        }
    }

    public function obtenerEstudiantes(){
        $this->db->select('*');
        $r = $this->db->get('Estudiantes');

        if($r->num_rows()>0){
            return $r->result();
        }
    }

}