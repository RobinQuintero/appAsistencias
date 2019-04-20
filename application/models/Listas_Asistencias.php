<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');

class Listas_Asistencias extends CI_Model {


    public function obtenerListaAsistencias($id_lista_asistencia){
        $this->db->select('*');
        $this->db->where('id_lista_asistencia',$id_lista_asistencia);
        $r = $this->db->get('Listas_Asistencias');

        if($r->num_rows()>0){
            return $r->result();
        }
    }

    public function obtenerListaAsistenciasGrupo($codigo_grupo){
        $this->db->select('*');
        $this->db->where('codigo_curso',$codigo_grupo);
        $r = $this->db->get('Listas_Asistencias');

        if($r->num_rows()>0){
            return $r->result();
        }
    }

    public function existeFecha($fecha, $codigo_curso){
        $this->db->select('*');
        $this->db->where('codigo_curso',$codigo_curso);
        $this->db->where('fecha_asistencia', $fecha);
        $r = $this->db->get('Listas_Asistencias');

        if($r->num_rows()>0){
            return $r->result();
        }else{
            return null;
        } 
    }

    public function obtenerListaAsistenciasEstudiante($id_estudiante){
        $this->db->select('*');
        $this->db->where('id_estudiante',$id_estudiante);
        $r = $this->db->get('Listas_Asistencias');

        if($r->num_rows()>0){
            return $r->result();
        }
    }

    public function obtenerListasAsistencias(){
        $this->db->select('*');
        $r = $this->db->get('Listas_Asistencias');

        if($r->num_rows()>0){
            return $r->result();
        }
    }

    public function inserclase($codigocurso, $temaclase, $fechasistencia, $n_Asistencias){
        $this->db->insert('Listas_Asistencias',array('codigo_curso'=>$codigocurso,'tema_clase'=>$temaclase,'fecha_asistencia'=>$fechasistencia, 'n_asistentes'=>$n_Asistencias));
    }

    public function BorraListaAsistenciasGrupo($codigo_curso){
        $consulta=$this->db->query("DELETE FROM Listas_Asistencias WHERE codigo_curso=$codigo_curso");
        if($consulta==true){
            return true;
        }else{
            return false;
        }        
    }
}