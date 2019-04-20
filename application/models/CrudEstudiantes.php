<?php
               //extendemos CI_Model
class CrudEstudiantes extends CI_Model{
    public function __construct() {
        //llamamos al constructor de la clase padre
        parent::__construct();
         
        //cargamos la base de datos
        $this->load->database();
    }
     
    public function ver(){
        //Hacemos una consulta
        $consulta=$this->db->query("SELECT * FROM Estudiantes;");
         
        //Devolvemos el resultado de la consulta
        return $consulta->result();
    }
     
    public function add($nombre,$apellido,$codigo,$genero,$email,$contrasenia,$estado){
        $consulta=$this->db->query("SELECT email FROM Estudiantes WHERE email LIKE '$email'");
        if($consulta->num_rows()==0){
            $consulta=$this->db->query("INSERT INTO Estudiantes VALUES(NULL,'$nombre','$apellido','$codigo','$genero','$email','$contrasenia','$estado');");
            if($consulta==true){
              return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
     
    public function mod($id_estudiante,$modificar="NULL",$nombre="NULL",$apellido="NULL",$codigo="NULL",
    $genero="NULL",$email="NULL",$contrasenia="NULL",$estado="NULL"){
        if($modificar=="NULL"){
            $consulta=$this->db->query("SELECT * FROM Estudiantes WHERE id_estudiante=$id_estudiante");
            return $consulta->result();
        }else{
          $consulta=$this->db->query("
              UPDATE Estudiantes SET nombre='$nombre', apellido='$apellido', codigo='$codigo', 
              genero='$genero', email='$email', contrasenia='$contrasenia', estado='$estado' WHERE id_estudiante=$id_estudiante;
                  ");
          if($consulta==true){
              return true;
          }else{
              return false;
          }
        }
    }
     
    public function eliminar($id_estudiante){
       $consulta=$this->db->query("DELETE FROM Estudiantes WHERE id_estudiante=$id_estudiante");
       $consulta=$this->db->query("DELETE FROM Asistencias WHERE id_estudiante=$id_estudiante");
       $consulta=$this->db->query("DELETE FROM Listas_Matriculas WHERE id_estudiante=$id_estudiante");
       if($consulta==true){
           return true;
       }else{
           return false;
       }
    }
 
}
?>
