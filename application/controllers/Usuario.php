<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

    public function index(){
        if($this->session->userdata('username')){
            $this->load->model('profesor');
            $profe = $this->profesor->obtenerProfesor($_SESSION['username'])[0];
            $datos = array();
            $datos['profesor'] = $profe;
            $this->load->view('perfil', $datos);
        }
    }
    public  function cambiarcontrasena(){
        $this->load->model('profesor');
        if($this->input->is_ajax_request()){
            $data1 =$this->input->post('contrasena1');
            $data = $this->input->post('contrasena3');
            $mail = $this->input->post('email');
            if($this->profesor->obtenerProfesor($mail)[0]->contrasenia == $this->input->post('contrasena3')){
                $this->profesor->actualizarcontrasena($data1,$mail);
            }else{
                echo $this->profesor->obtenerProfesor($mail)[0]->contrasenia;
            }
        }
    }
}