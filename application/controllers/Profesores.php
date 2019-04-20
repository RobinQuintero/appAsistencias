<?php 

class Profesores extends CI_Controller {
    public function __construct() {
        //llamamos al constructor de la clase padre
        parent::__construct();
         
        //llamo al helper url
        $this->load->helper("url"); 
         
        //llamo o incluyo el modelo
        $this->load->model("CrudProfesores");
         
        //cargo la libreria de sesiones
        $this->load->library("session");
    }

    //controlador por defecto
    public function index(){
        
        if($this->session->userdata('user')){
            //array asociativo con la llamada al metodo del modelo
            $usuarios["ver"]=$this->CrudProfesores->ver();
            
            //cargo la vista y le paso los datos
            $this->load->view("CrudProfesores",$usuarios);
        }else{
            redirect('login');
        }
        
    }
    
    //controlador para añadir
    public function add(){
         
        //compruebo si se a enviado submit
        if($this->input->post("submit")){
         
        
            //llamo al metodo add
        $add=$this->CrudProfesores->add(
            $this->input->post("nombre"),
            $this->input->post("apellido"),
            $this->input->post("email"),
            $this->input->post("password"),
            $this->input->post("estado"),
            $this->input->post("imagen_perfil")
                );
        }
        if($add==true){
            //Sesion de una sola ejecución
            $this->session->set_flashdata('correcto', 'Usuario añadido correctamente');
        }else{
            $this->session->set_flashdata('incorrecto', 'Usuario añadido correctamente');
        }
         
        //redirecciono la pagina a la url por defecto
        redirect("Profesores");
    }

    public function mod($id_profesor){
        if(is_numeric($id_profesor)){
          $datos["mod"]=$this->CrudProfesores->mod($id_profesor);
          $this->load->view("modificar2",$datos);
          if($this->input->post("submit")){
            $mod=$this->CrudProfesores->mod(
                $id_profesor,
                $this->input->post("submit"),
                $this->input->post("nombre"),
                $this->input->post("apellido"),
                $this->input->post("email"),
                $this->input->post("password"),
                $this->input->post("estado"),
                $this->input->post("imagen_perfil")
                );
                redirect('Profesores');
            }
        }else{
            redirect('Profesores');
        }
    }

    //Controlador para eliminar
    public function eliminar($id_profesor){
        if(is_numeric($id_profesor)){
          $eliminar=$this->CrudProfesores->eliminar($id_profesor);
          if($eliminar==true){
              $this->session->set_flashdata('correcto', 'Usuario eliminado correctamente');
          }else{
              $this->session->set_flashdata('incorrecto', 'Usuario eliminado correctamente');
          }
          redirect('profesores');
        }else{
          redirect('profesores');
        }
    }
}