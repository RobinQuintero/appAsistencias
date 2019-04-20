<?php
                        //extendemos CI_Controller
class Estudiantes extends CI_Controller{
    public function __construct() {
        //llamamos al constructor de la clase padre
        parent::__construct();
         
        //llamo al helper url
        $this->load->helper("url"); 
         
        //llamo o incluyo el modelo
        $this->load->model("CrudEstudiantes");
         
        //cargo la libreria de sesiones
        $this->load->library("session");
    }
     
    //controlador por defecto
    public function index(){
        
        if($this->session->userdata('user')){
            //array asociativo con la llamada al metodo del modelo
            $usuarios["ver"]=$this->CrudEstudiantes->ver();
            
            //cargo la vista y le paso los datos
            $this->load->view("crudEstudiantes",$usuarios);
        }else{
            redirect('login');
        }
    }
     
    //controlador para añadir
    public function add(){
         
        //compruebo si se a enviado submit
        if($this->input->post("submit")){
         
        //llamo al metodo add
        $add=$this->CrudEstudiantes->add(
            $this->input->post("nombre"),
            $this->input->post("apellido"),
            $this->input->post("codigo"),
            $this->input->post("genero"),
            $this->input->post("email"),
            $this->input->post("password"),
            $this->input->post("estado")
                );
        }
        if($add==true){
            //Sesion de una sola ejecución
            $this->session->set_flashdata('correcto', 'Usuario añadido correctamente');
        }else{
            $this->session->set_flashdata('incorrecto', 'Usuario añadido correctamente');
        }
         
        //redirecciono la pagina a la url por defecto
        redirect("Estudiantes");
    }
     
    //controlador para modificar al que
    //le paso por la url un parametro
    public function mod($id_estudiante){
        if(is_numeric($id_estudiante)){
          $datos["mod"]=$this->CrudEstudiantes->mod($id_estudiante);
          $this->load->view("modificar",$datos);
          if($this->input->post("submit")){
            $mod=$this->CrudEstudiantes->mod(
                $id_estudiante,
                $this->input->post("submit"),
                $this->input->post("nombre"),
                $this->input->post("apellido"),
                $this->input->post("codigo"),
                $this->input->post("genero"),
                $this->input->post("email"),
                $this->input->post("password"),
                $this->input->post("estado")
                );
                redirect('Estudiantes');
            }
        }else{
            redirect('Estudiantes');
        }
    }
     
    //Controlador para eliminar
    public function eliminar($id_estudiante){
        if(is_numeric($id_estudiante)){
          $eliminar=$this->CrudEstudiantes->eliminar($id_estudiante);
          if($eliminar==true){
              $this->session->set_flashdata('correcto', 'Usuario eliminado correctamente');
          }else{
              $this->session->set_flashdata('incorrecto', 'Usuario eliminado correctamente');
          }
          redirect('Estudiantes');
        }else{
          redirect('Estudiantes');
        }
    }
}
?>