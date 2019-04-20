<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');

class Asistencia extends CI_Model {


    public function obtenerAsistencia($id_lista_asistencia){
        $this->db->select('*');
        $this->db->where('id_lista_asistencia',$id_lista_asistencia);
        $r = $this->db->get('Asistencias');

        if($r->num_rows()>0){
            return $r->result(); 
        }
    }

    public function obtenerAsistencias(){
        $this->db->select('*');
        $r = $this->db->get('Asistencias');

        if($r->num_rows()>0){
            return $r->result();
        } 
    }

    public function obtenerAsistenciasEstudiante($id_estudiante){
        $this->db->select('*');
        $this->db->where('id_estudiante',$id_estudiante);
        $r = $this->db->get('Asistencias');

        if($r->num_rows()>0){
            return $r->result();
        }
    }

    public function obtenerAsistenciasEstudianteLista($id_estudiante, $lista){
        $this->db->select('*');
        $this->db->where('id_estudiante',$id_estudiante);
        $this->db->where('id_lista_asistencia',$lista);
        $r = $this->db->get('Asistencias');

        if($r->num_rows()>0){
            return $r->result();
        }
    }


    public function inserasistencia($idlistaasitencia,$idestudiante, $estado){
        $this->db->insert('Asistencias',array('id_lista_asistencia'=>$idlistaasitencia,'id_estudiante'=>$idestudiante,'estado'=>$estado));
    }

    public function borraAsistencia($id_lista_asistencia){
        $consulta=$this->db->query("DELETE FROM Asistencias WHERE id_lista_asistencia=$id_lista_asistencia");
        if($consulta==true){
            return true;
        }else{
            return false;
        }
    }
}