<?php 

class Cursos extends CI_Controller {
    public function __construct() {
        //llamamos al constructor de la clase padre
        parent::__construct();
         
        //llamo al helper url
        $this->load->helper("url"); 
         
        //llamo o incluyo el modelo
        $this->load->model("CrudCursos");
         
        //cargo la libreria de sesiones
        $this->load->library("session");
    }
    
	public function index()
	{        
        if($this->session->userdata('user')){
            //array asociativo con la llamada al metodo del modelo
            $usuarios["ver"]=$this->CrudCursos->ver();
            
            //cargo la vista y le paso los datos
            $this->load->view("CrudCursos",$usuarios);
        }else{
            redirect('login');
        }
    }

    public function add(){
         
        //compruebo si se a enviado submit
        if($this->input->post("submit")){
         
        
            //llamo al metodo add
        $add=$this->CrudCursos->add(
            $this->input->post("numero"),
            $this->input->post("nombre"),
            $this->input->post("descripcion"),
            $this->input->post("capacidad"),
            $this->input->post("numero_estudiantes_asignados"),
            $this->input->post("id_profesor_asignado"),
            $this->input->post("horario")
                );
        }
        if($add==true){
            //Sesion de una sola ejecución
            $this->session->set_flashdata('correcto', 'Usuario añadido correctamente');
        }else{
            $this->session->set_flashdata('incorrecto', 'Usuario añadido correctamente');
        }
         
        //redirecciono la pagina a la url por defecto
        redirect("Cursos");
    }

    public function mod($codigo_curso){
        if(is_numeric($codigo_curso)){
          $datos["mod"]=$this->CrudCursos->mod($codigo_curso);
          $this->load->view("modificar3",$datos);
          if($this->input->post("submit")){
            $mod=$this->CrudCursos->mod(
                $codigo_curso,
                $this->input->post("submit"),
                $this->input->post("numero"),
                $this->input->post("nombre"),
                $this->input->post("descripcion"),
                $this->input->post("capacidad"),
                $this->input->post("numero_estudiantes_asignados"),
                $this->input->post("id_profesor_asignado"),
                $this->input->post("horario")
                );
                redirect('Cursos');
            }
        }else{
            redirect('Cursos');
        }
    }

    public function eliminar($codigo_curso){
        if(is_numeric($codigo_curso)){
          $eliminar=$this->CrudCursos->eliminar($codigo_curso);
          if($eliminar==true){
              $this->session->set_flashdata('correcto', 'Usuario eliminado correctamente');
          }else{
              $this->session->set_flashdata('incorrecto', 'Usuario eliminado correctamente');
          }
          redirect('Cursos');
        }else{
          redirect('Cursos');
        }
    }
}