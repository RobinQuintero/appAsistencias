<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');

class Profesor extends CI_Model {

	public function login($username,$password)
	{
        $this->db->select('*');
        $this->db->where('email',$username);
        $this->db->where('contrasenia',$password);
        $q = $this->db->get('Profesores');
        if($q->num_rows()>0){
            return true;
        }else{
            return false;
        }
    }

    public function obtenerProfesor($mail){
        $this->db->select('*');
        $this->db->where('email',$mail);
        $r = $this->db->get('Profesores');

        if($r->num_rows()>0){
            return $r->result();
        }
    }
    public function obtenerProfesorcontra($mail){
        $this->db->select('*');
        $this->db->where('email',$mail);
        $r = $this->db->get('Profesores');

        if($r->num_rows()>0){
            return $r->result();
        }
    }


    public function obtenerProfesores(){
        $this->db->select('*');
        $r = $this->db->get('Profesores');

        if($r->num_rows()>0){
            return $r->result();
        }
    }

    public function clavesecreta($clavesecreta){
        $this->db->select('*');
        $this->db->where('clavesecreta',$clavesecreta);
        $r = $this->db->get('Profesores');

        if($r->num_rows()>0){
            return $r->result();
        }
    }

    public function actualizarcontrasena($nuevacontrasena, $email){
        $clase = substr(md5(rand()),0,7);
        $data = array(
            'contrasenia' => $nuevacontrasena,
            'clavesecreta' => $clase
        );
        $this->db->where('email',$email);
        $query = $this->db->update('Profesores',$data);
    }

    public function borraProfesor($id_profesor){
        $consulta=$this->db->query("DELETE FROM Profesores WHERE id_profesor=$id_profesor");
        if($consulta==true){
            return true;
        }else{
            return false;
        }
    }
}

