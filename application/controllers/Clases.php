<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clases extends CI_Controller {
    
	public function index(){

        if($this->session->userdata('username')){
            echo "nueva clase";
        }else{
            redirect('login');
        }

        
    }

    public function nuevaClase($grupo = null){
        if($this->session->userdata('username')){
            if($grupo!=null){
                $this->load->model('profesor');
                $this->load->model('cursos');
                $this->load->model('listas_Asistencias');
                $this->load->model('listas_Matriculas');
                $this->load->model('estudiantes');
                $profe = $this->profesor->obtenerProfesor($_SESSION['username'])[0];
                $curso = $this->cursos->obtenerCurso($grupo)[0];
                if($this->input->post('fecha')){
                    
                    if($this->listas_Asistencias->existeFecha($this->input->post('fecha'), $curso->codigo_curso)){
                        
                        redirect(base_url().'grupos/info/'.$curso->codigo_curso);
                    }else{
                        
                        if($curso!=null){
                            $matriculas = $this->listas_Matriculas->ListasMatriculasPorCurso($curso->codigo_curso);
                            $estudiantes = array();
                            if($matriculas!=null){
                                
                                foreach($matriculas as $matricula){
                                    $estudiante = $this->estudiantes->obtenerEstudiante($matricula->id_estudiante);
                                    $estudiante->contrasenia = ' ';
                                    array_push($estudiantes, $estudiante);
                                }
                            }
                            
                            $datos = array();
                            $datos['estudiantes'] = $estudiantes;
                            $datos['grupo'] = $curso;
                            $datos['profesor'] = $profe;
                            $datos['fecha'] = $this->input->post('fecha');
                            $datos['tema'] = $this->input->post('tema');
                            $this->load->view('nuevaclase', $datos);
                        }else redirect('grupos');
                    }
                    
                }
            }else{
                redirect ('grupos');
            }
        }else{
            redirect('login');
        }
    }

    public function crearClase(){

        if($this->input->is_ajax_request()){
            $c = $this->input->post('grupo');
            $tema = $this->input->post('tema');
            $fecha = $this->input->post('fecha');
            $n_Asistencias = $this->input->post('n_Asistencias');
            $this->load->model('listas_Asistencias');
            if($this->listas_Asistencias->existefecha($fecha, $c)==null){
                $this->listas_Asistencias->inserclase($c, $tema, $fecha, $n_Asistencias);
                $estudiantes = json_decode($this->input->post('estudiantes'));
                $this->load->model('asistencia');
                $this->load->model('estudiantes');
                $lista = $this->listas_Asistencias->existefecha($fecha, $c)[0]->id_lista_asistencia;
                foreach($estudiantes as $estudiante){
                    $this->asistencia->inserasistencia($lista, $estudiante->id_estudiante, $estudiante->estado);
                    $this->load->library('email');

                    if($estudiante->estado=="1"){
                        $cuerpo = "La clase del curso ha finalizado.
                        Tema de clase: ".$tema."
                        Fecha: ".$fecha."
                        Usted asistio a la clase";
                    }else{
                        $cuerpo = "La clase del curso ha finalizado.
                    Tema de clase: ".$tema."
                    Fecha: ".$fecha."
                    Usted falto a la clase";
                    }

                    $config = array();
                    $config['protocol'] = 'smtp';
                    $config['smtp_host'] = 'smtp.stackmail.com';
                    $config['smtp_user'] = 'soporte.asistencias@robinquintero.co';
                    $config['smtp_pass'] = 'asistencias1';
                    $config['smtp_port'] = 587;
                    $this->email->initialize($config);
                    
                    $this->email->set_newline("\r\n");
                    $this->email->from('soporte.asistencias@robinquintero.co');
                    $this->email->to($estudiante->email);
                    $this->email->subject("Clase finalizada");
                    $this->email->message($cuerpo);
                    $this->email->send();
                }
                echo "si";
            }else{
                echo "la fecha ya existe";
            }
            

        }

    }

    public function hayclase(){

    }

    public function info(){
        if($this->input->is_ajax_request()){
            $id_clase = $this->input->post('id_lista');
            if($id_clase!=null){
                $this->load->model('listas_Asistencias');
                $lista = $this->listas_Asistencias->obtenerListaAsistencias($id_clase)[0];
                $this->load->model('asistencia');
                $this->load->model('estudiantes');
                $asistencias = $this->asistencia->obtenerAsistencia($lista->id_lista_asistencia);
                $estudiantes = array();
                foreach($asistencias as $asistencia){
                    $estudiante = $this->estudiantes->obtenerEstudiante($asistencia->id_estudiante);
                    $estudiante->estado = $asistencia->estado;
                    $estudiante->contrasenia = ' ';
                    array_push($estudiantes, $estudiante);
                }
                $datos = array();
                $datos['lista'] = $lista;
                $datos['estudiantes'] = $estudiantes;
                echo json_encode($datos);
            }
        }else{
            redirect(base_url()."grupos");
        }
    }
    


}
