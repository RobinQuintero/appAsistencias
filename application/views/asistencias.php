<?php/*
require 'php/ConectaBaseDeDatos.php';
if(!isset($_SESSION)){ 
    session_start(); 
}
if (isset($_SESSION['user_id'])) {
$records = $conn->prepare('SELECT id, username, nombre FROM users WHERE id = :id');
$records->bindParam(':id', $_SESSION['user_id']);
$records->execute();
$results = $records->fetch(PDO::FETCH_ASSOC);
$user = null;
if (count($results) > 0) {
    $user = $results;
    $profe = json_encode($user);
    echo '<script> var profe = '.$profe.'</script>';
    $ver = $conn->prepare('SELECT * FROM grupos WHERE id= :id');
    $ver->bindParam(':id', $_GET['grupoid']);
    $ver->execute();
    $res = $ver->fetch(PDO::FETCH_ASSOC);
    if(!($res['profesorid'] == $user['id'])){
        header ('location: grupos.php');
    }
}

    
    
  }*/
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/materialize.css">
    <link rel="stylesheet" href="css/estilos.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Mukta'>
    <script src="js/jquery.js"></script> 
    <script src="js/materialize.min.js"></script>
    <script src="js/jspdf.js"></script>
    
    <script src="js/graficos.js"></script>
    <title>Control de asistencias - Unimagdalena</title>
</head>
<body>

    
    <?php/*
    
    $query = $conn->prepare('SELECT * FROM Listados WHERE grupoid= :id');
    $query->bindParam(':id', $_GET['grupoid']);
    $query->execute();
    $dbdata = array();
    while ( $row = $query->fetch(PDO::FETCH_ASSOC))  {
        $queryEst = $conn->prepare('SELECT * FROM estudiantes WHERE Codigo=:cod');
        $queryEst->bindParam(':cod', $row['estudiantecod']);
        $queryEst->execute();
        $dbdata[]=$queryEst->fetch(PDO::FETCH_ASSOC);
    }
    $estudiantes = json_encode($dbdata);
    echo '<script> var estudiantes = '.$estudiantes.'</script>';
     
    $query = $conn->prepare('SELECT * FROM grupos WHERE id= :id');
    $query->bindParam(':id', $_GET['grupoid']);
    $query->execute();
    $dbdata = array();
    $row = $query->fetch(PDO::FETCH_ASSOC);
    $grupo = json_encode($row);
    echo '<script> var grupo = '.$grupo.'</script>';*/
    ?>
    <!--Barra de navegación-->
    <header class="col s12 m12">
        <?php include 'header.php'?>
    </header>
    <!--Barra de navegación-->

    <!--Tarjeta principal-->
    <section id="main" class="row">

            <div class="hide-on-large-only">
                    <div class="card" id="info1">
                    
                    </div>
            </div>

            
            <!--Tarjetas de estudiantes-->
            
            <div class="estudiantes col s12 m12 l8">
                <div class="row" id="Estudiantes">
                    <!--Espacio para los estudiantes-->
                </div>
            </div>
            <!--Tarjetas de estudiantes-->
            
            <!--Barra lateral-->
            <div class="col s12 m3 pull-m2 hide-on-med-and-down">
                <div class="card  blue darken-4" id="info">
                    
                    </div>
                    <div class="card white" id="info2">
                        <h5>Indicaciones</h5>
                        <p><a class="btn-floating waves-effect waves-light green darken-1" style="margin-right:20px;"><i class="material-icons"></i></a>Asistió</p>
                        <p><a class="btn-floating waves-effect waves-light red darken-1" style="margin-right:20px;"><i class="material-icons"></i></a>No asistió</p>
                        <p><a class="btn-floating waves-effect waves-light red" style="margin-right:20px;"><i class="material-icons">check</i></a>Guardar Lista</p>
                </div>
            </div>
            <!--Barra lateral-->

            <div class="col m1"></div>

            <div class="clear"></div>


            
        
        
    </section>
    <!--Tarjeta principal-->
    
    <!--Botón flotante-->
    <div class="fixed-action-btn" id="botoncheck">
        <a href="#aviso" class="btn-floating btn-large red waves-effect waves-light tooltipped modal-trigger hoverable" data-position="left" data-tooltip="Generar Asistencia">
            <i class="large material-icons">check</i>
        </a>
    </div>
    <!--Botón flotante-->

    <!--Aviso al generar lista-->
    <div id="aviso" class="modal">
        <form action="#">
            <div class="modal-content">
                <h4 style="text-align: center">Guardar lista de asistencia</h4>
                <p style="text-align: center"><br>Se generará una lista con los alumnos asistentes, presione "Descargar" para guardar<br>el documento o "Visualizar" para abrirlo con su navegador.</p>
                <input type="text" class="datepicker">
            </div>
            <div class="modal-footer">
                <button onclick="convertir(2)" class="modal-close waves-effect waves-green btn-flat">Descargar</button>
                <button onclick="convertir(1)" class="modal-close waves-effect waves-green btn-flat">Visualizar</button>
            </div>
        </form>
    </div>
    <!--Aviso al generar lista-->
    
    <script>
        //Busca la posición del estudiante en la lista
        function buscar(id){
            for(i in estudiantes){
                if(estudiantes[i].Codigo == id) return i;
            }
        }

        //Toma los elementos de la lista y crea las correspondientes tarjetas
        for(i in estudiantes){
            var EstudianteActual = estudiantes[i];
            var imagen = "";
            var color = "";
            if(EstudianteActual.Genero == "Masculino") imagen = "images/estudiante.png";
            else imagen = "images/estudiante_fem.png";
            if(EstudianteActual.Estado == "asistio") color = "card green darken-1 waves-effect waves-light";
            else color = "card red darken-1 waves-effect waves-light"
            var div = document.createElement("div");
            div.className = "col s6 m3 l3";
            document.getElementById("Estudiantes").appendChild(div);
            var card = document.createElement("div");
            card.className = color;
            card.id = EstudianteActual.Codigo;
            card.classList.add("zoom");
            card.onclick = function(){
                if(estudiantes[buscar(this.id)].Estado == "asistio"){
                    this.classList.add("red");
                    this.classList.remove("green");
                    estudiantes[buscar(this.id)].Estado = "noasistio";
                }else{
                    this.classList.add("green");
                    this.classList.remove("red");
                    estudiantes[buscar(this.id)].Estado = "asistio";
                }
            }
            div.appendChild(card);
            var cardimage = document.createElement("div");
            cardimage.className = "card-image";
            cardimage.innerHTML = '<img src="'+imagen+'" alt="'+EstudianteActual.Nombre+'">';
            card.appendChild(cardimage);
            var cardcontent = document.createElement("div");
            cardcontent.className = "card-image";
            cardcontent.innerHTML = '<h6>'+EstudianteActual.Nombre+'</h6>';
            card.appendChild(cardcontent);
            
        }
    </script>
    <script src="js/autotable.js"></script>
    <script><?php include("js/convertirAPdf.js")?></script>
    <script>
        document.getElementById("us").innerHTML = "BIENVENIDO/A - "+profe.nombre;
    </script>
    <script>
        document.getElementById("info1").innerHTML = "<h5>Información del grupo</h5><p>Asignatura: "+grupo.materia+"</p><p>Docente: "+profe.nombre+"</p><p>Grupo: "+grupo.ngrupo+"</p><p>Horario: "+grupo.horario+"</p>"
        document.getElementById("info").innerHTML = "<h5>Información del grupo</h5><p>Asignatura: "+grupo.materia+"</p><p>Docente: "+profe.nombre+"</p><p>Grupo: "+grupo.ngrupo+"</p><p>Horario: "+grupo.horario+"</p>"
    </script>
    


</body>
</html>