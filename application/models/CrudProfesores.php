<?php
               //extendemos CI_Model
class CrudProfesores extends CI_Model{
    public function __construct() {
        //llamamos al constructor de la clase padre
        parent::__construct();
         
        //cargamos la base de datos
        $this->load->database();
    }
     
    public function ver(){
        //Hacemos una consulta
        $consulta=$this->db->query("SELECT * FROM Profesores;");
         
        //Devolvemos el resultado de la consulta
        return $consulta->result();
    }
     
    public function add($nombre,$apellido,$email,$contrasenia,$estado,$imagen_perfil){
        $consulta=$this->db->query("SELECT email FROM Profesores WHERE email LIKE '$email'");
        if($consulta->num_rows()==0){
            $consulta=$this->db->query("INSERT INTO Profesores VALUES(null,'$nombre','$apellido','$email',
            '$contrasenia','$estado','$imagen_perfil','hgfdj');");
            if($consulta==true){
              return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
     
    public function mod($id_profesor,$modificar="null",$nombre="null",$apellido="null",
    $email="null",$contrasenia="null",$estado="null",$imagen_perfil="null",$clavesecreta="null"){
        if($modificar=="null"){
            $consulta=$this->db->query("SELECT * FROM Profesores WHERE id_profesor=$id_profesor");
            return $consulta->result();
        }else{
          $consulta=$this->db->query("
              UPDATE Profesores SET nombre='$nombre', apellido='$apellido', email='$email', 
              contrasenia='$contrasenia', estado='$estado', imagen_perfil='$imagen_perfil' WHERE id_profesor=$id_profesor;
                  ");
          if($consulta==true){
              return true;
          }else{
              return false;
          }
        }
    }
     
    public function eliminar($id_profesor){
        $this->load->model('cursos');
        $this->load->model('Profesor');
        $this->load->model('Asistencia');
        $this->load->model('Listas_Asistencias');
        $this->load->model('Listas_Matriculas');
        $this->load->model('Cursos');
        $cursoprofesor = $this->cursos->obtenerCursosPorProfesor($id_profesor);
        if($cursoprofesor!=null){
            foreach($cursoprofesor as $curso){
                $listasasistencias = $this->Listas_Asistencias->obtenerListaAsistenciasGrupo($curso->codigo_curso);
                if($listasasistencias!=null){
                    foreach($listasasistencias as $lista){
                        $consulta=$this->Asistencias->borraAsistencia($lista->id_lista_asistencia);
                    }
                    $consulta=$this->Listas_Asistencias->BorraListaAsistenciasGrupo($curso->codigo_curso);
                    
                }
                $consulta=$this->Listas_Matriculas->borraListasMatriculasPorCurso($curso->codigo_curso);
            }
            $consulta=$this->cursos->borraCursosPorProfesor($id_profesor);
        }
        $consulta=$this->Profesor->borraProfesor($id_profesor);
        if($consulta==true){
           return true;
        }else{
           return false;
        }
    }
 
}
?>
