<?php
               //extendemos CI_Model
class CrudCursos extends CI_Model{
    public function __construct() {
        //llamamos al constructor de la clase padre
        parent::__construct();
         
        //cargamos la base de datos
        $this->load->database();
    }
     
    public function ver(){
        //Hacemos una consulta
        $consulta=$this->db->query("SELECT * FROM Cursos;");
         
        //Devolvemos el resultado de la consulta
        return $consulta->result();
    }
     
    public function add($numero,$nombre,$descripcion,$capacidad,$numero_estudiantes_asignados,$id_profesor_asignado,$horario){
            $consulta=$this->db->query("INSERT INTO Cursos VALUES(NULL,'$numero','$nombre','$descripcion','$capacidad',
            '$numero_estudiantes_asignados','$id_profesor_asignado','$horario');");
            if($consulta==true){
              return true;
            }else{
                return false;
            }
        
    }
     
    public function mod($codigo_curso,$modificar="NULL",$numero="NULL",$nombre="NULL",$descripcion="NULL",$capacidad="NULL",
    $numero_estudiantes_asignados="NULL",$id_profesor_asignado="NULL",$horario="NULL"){
        if($modificar=="NULL"){
            $consulta=$this->db->query("SELECT * FROM Cursos WHERE codigo_curso=$codigo_curso");
            return $consulta->result();
        }else{
          $consulta=$this->db->query("
              UPDATE Cursos SET numero='$numero', nombre='$nombre', descripcion='$descripcion',capacidad='$capacidad',
              numero_estudiantes_asignados='$numero_estudiantes_asignados', id_profesor_asignado='$id_profesor_asignado',
              horario='$horario'  WHERE codigo_curso=$codigo_curso;
                  ");
          if($consulta==true){
              return true;
          }else{
              return false;
          }
        }
    }
     
    public function eliminar($codigo_curso){
        $this->load->model('Asistencia');
        $this->load->model('Listas_Asistencias');
        $this->load->model('Listas_Matriculas');
        $listasasistencias = $this->Listas_Asistencias->obtenerListaAsistenciasGrupo($codigo_curso);
        if($listasasistencias!=null){
            foreach($listasasistencias as $lista){
                $consulta=$this->Asistencias->borraAsistencia($lista->id_lista_asistencia);
            }
            $consulta=$this->Listas_Asistencias->BorraListaAsistenciasGrupo($codigo_curso);
        }
        $consulta=$this->Listas_Matriculas->borraListasMatriculasPorCurso($codigo_curso);
        $consulta=$this->db->query("DELETE FROM Cursos WHERE codigo_curso=$codigo_curso");
        if($consulta==true){
           return true;
        }else{
           return false;
       } 

    }
}?>
