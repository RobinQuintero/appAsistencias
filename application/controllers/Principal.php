<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Principal extends CI_Controller {

    function __construct()
	{
        parent::__construct();
    }
    
	public function index()
	{
		if($this->session->userdata('username')){
            $this->load->model('profesor');
            $this->load->model('cursos');
            $this->load->model('listas_Asistencias');
            $profe = $this->profesor->obtenerProfesor($_SESSION['username'])[0];
            $grupos = $this->cursos->obtenerCursosPorProfesor($profe->id_profesor);
            $promedios = array();
            foreach($grupos as $grupo){
                $asistencias = $this->listas_Asistencias->obtenerListaAsistenciasGrupo($grupo->codigo_curso);
                if($asistencias!=null){
                    $sumatoria = 0;
                    $n_Asistencias=0;
                    $promedio = 0;
                    foreach($asistencias as $asistencia){
                        $sumatoria+=$asistencia->n_asistentes;
                        $n_Asistencias+=1;
                    }
                    $promedio = $sumatoria/$n_Asistencias;
                    array_push($promedios, $promedio);
                }
            }
            $datos = array();
            $datos['grupos'] = $grupos;
            $datos['profesor'] = $profe;
            $datos['promedios'] = $promedios;
            
            $this->load->view('index', $datos);
        }else{
            redirect('login');
        } 
    }

}