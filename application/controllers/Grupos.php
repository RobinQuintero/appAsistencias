<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grupos extends CI_Controller {
    
	public function index(){

        if($this->session->userdata('username')){
            $this->load->model('profesor');
            $this->load->model('cursos');
            $profe = $this->profesor->obtenerProfesor($_SESSION['username'])[0];
            $grupos = $this->cursos->obtenerCursosPorProfesor($profe->id_profesor);
            $datos = array();
            $datos['grupos'] = $grupos;
            $datos['profesor'] = $profe;
		    $this->load->view('grupos', $datos);
        }else{
            redirect('login');
        }

        
    }

    public function info($grupo = null){
        if($this->session->userdata('username')){
            $this->load->model('profesor');
            $profe = $this->profesor->obtenerProfesor($_SESSION['username'])[0];

            $this->load->model('cursos');
            $curso = $this->cursos->obtenerCurso($grupo)[0];

            $this->load->model('listas_Matriculas');
            $asistencias = array();
            $matriculas = $this->listas_Matriculas->ListasMatriculasPorCurso($curso->codigo_curso);
            $this->load->model('listas_Asistencias');
            $estudiantes=null;
            if($matriculas!=null){
                $this->load->model('estudiantes');
                $estudiantes = array();
                $this->load->model('asistencia');
                foreach($matriculas as $matricula){
                    
                    $estudiante = $this->estudiantes->obtenerEstudiante($matricula->id_estudiante);
                    if($estudiante!=null){
                        $estudiante->fallas=0;
                    $listas_asistencias = $this->listas_Asistencias->obtenerListaAsistenciasGrupo($curso->codigo_curso);
                    if($listas_asistencias!=null){
                        foreach($listas_asistencias as $lista){
                            $asistencias = $this->asistencia->obtenerAsistenciasEstudianteLista($matricula->id_estudiante, $lista->id_lista_asistencia);
                            if($asistencias!=null){
                                if($asistencias[0]->estado=="0") $estudiante->fallas++;
                            }
                        }
                    }
                    array_push($estudiantes, $estudiante);
                    }
                }
                
                $asistencias = $this->listas_Asistencias->obtenerListaAsistenciasGrupo($curso->codigo_curso);
            }else echo "no hay registros";
            
            $datos = array(); 
                $datos['estudiantes'] = $estudiantes;
            
            $datos['grupo'] = $curso;
            $datos['profesor'] = $profe;
            $datos['asistencias'] = $asistencias;

		    $this->load->view('infogrupo', $datos);
        }else{
            redirect('login');
        }
    }

    public function nuevaClase($grupo = null){
        if($grupo==null){
            redirect('grupos');
        }else{
            redirect('clases/nuevaclase/'.$grupo);
        }
    }

    public function infoEstudiante(){
        if($this->input->is_ajax_request()){
            $codigo = $this->input->post('codigo');
            $this->load->model("estudiantes");
            $this->load->model("asistencia");
            $this->load->model("listas_Asistencias");
            $estudiante = $this->estudiantes->obtenerEstudianteCod($codigo);
            $as = $this->asistencia->obtenerAsistenciasEstudiante($estudiante->id_estudiante);
            $asistencias = array();
            if($as!=null){
                foreach($as as $asistencia){
                    $clase = $this->listas_Asistencias->obtenerListaAsistencias($asistencia->id_lista_asistencia)[0];
                    $asistencia->fecha_asistencia = $clase->fecha_asistencia;
                    $asistencia->tema_clase = $clase->tema_clase;

                    array_push($asistencias, $asistencia);
                }
            }
            $datos = array();
            $datos['estudiante'] = $estudiante;
            $datos['asistencias'] = $asistencias;
            echo json_encode($datos);
        }else{

        }
    }

}



