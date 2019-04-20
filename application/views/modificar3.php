<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo base_url()?>css/materialize.min.css">
    
    <link rel="stylesheet" href="<?php echo base_url()?>css/estilos.css">
    <link rel="stylesheet" href="<?php echo base_url()?>css/grupos.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Mukta'>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url()?>js/materialize.min.js"></script>
    <script src="<?php echo base_url()?>js/jspdf.js"></script>
    <script src="<?php echo base_url()?>js/autotable.js"></script>
    <script src="<?php echo base_url()?>js/graficos.js"></script>
    <title>Grupos | Control de asistencias</title>
</head>
<body>

    <style>
            .sidenav li a{
                color: white;
            }
            nav-wrapper{
                margin-bottom: 0;
            }
            #div1{
                height: 348px;
                width: 350px;
            }
        </style>

<div class="navbar-fixed z-depth-4" >
    <nav >
        <div class="nav-wrapper">
            <a href="#" data-target="slide-out" class="sidenav-trigger" style="height:90px; padding-top:15px;"><i class="material-icons">menu</i></a>
            <div style="width:40px; display: inline-block;"><p style="display:none;">-</p></div>
            <!--<a href="<?php echo base_url()?>" class="brand-logo"> <img src="<?php echo base_url()?>images/default.png" alt="universidad del magdalena"> <p class="hide-on-med-and-down">UNIVERSIDAD DEL MAGDALENA</p></a>
        --></div>

        

        <ul id="slide-out" class="sidenav sidenav-fixed blue white-text">
            <li><div class="user-view">
                <div class="background">
                    <img src="images/admin.png" style="width:110%; -webkit-filter: blur(5px); filter: blur(5px);">
                </div>
                
                </div>
            </li>
            <div>
            <li><a href="<?php echo base_url()?>Profesores"><i class="material-icons white-text">person</i>Profesores</a></li>
            <li><a href="<?php echo base_url()?>Estudiantes"><i class="material-icons white-text">person</i>Estudiantes</a></li>
            <li><a href="<?php echo base_url()?>Cursos"><i class="material-icons white-text">class</i>Cursos</a></li>
            <li><a href="<?php echo base_url()?>login/logout2"><i class="material-icons white-text">exit_to_app</i>Cerrar Sesión</a></li>
        </ul>
        
    </nav>
</div>


    <!--Tarjeta principal-->
    <section id="main">
        
        <div class="container">
        
        <h2>Modificar Cursos</h2>
        <form action="" method="POST"> 
            <?php foreach ($mod as $fila){ ?>
                <div class="input-field" >
                    <input type="number" name="numero" value="<?=$fila->numero?>" style="margin: 2px 2px 2px 2px">
                    <label for="numero">Numero</label>
                </div>
                <div class="input-field" >
                    <input type="text" name="nombre" value="<?=$fila->nombre?>" style="margin: 2px 2px 2px 2px">
                    <label for="nombre">Nombre</label>
                </div>
                <div class="input-field" >
                    <input type="text"  name="descripcion" value="<?=$fila->descripcion?>" style="margin: 2px 2px 2px 2px">
                    <label for="descripcion">Descripcion</label>
                </div>         
                <div class="input-field" >
                    <input type="number" name="capacidad" value="<?=$fila->capacidad?>"style="margin: 2px 2px 2px 2px">
                    <label for="capacidad">Capacidad</label>
                </div>
                <div class="input-field" >
                    <input type="number" name="numero_estudiantes_asignados" value="<?=$fila->numero_estudiantes_asignados?>"style="margin: 2px 2px 2px 2px">
                    <label for="numero_estudiantes_asignados">Numero de Estudiantes Asignados</label>
                </div>
                <div class="input-field" >
                    <input type="number" name="id_profesor_asignado" value="<?=$fila->id_profesor_asignado?>"style="margin: 2px 2px 2px 2px">
                    <label for="id_profesor_asignado">ID  del Profesor Asignado</label>
                </div>
                <div class="input-field" >
                    <input type="text" name="horario" value="<?=$fila->horario?>"style="margin: 2px 2px 2px 2px">
                    <label for="horario">horario</label>
                </div>
                <input type="submit" name="submit" value="Modificar" class="btn blue" style="margin: 2px 2px 2px 2px">
            <?php } ?>
        </form>
        <a class="btn blue" href="<?php echo base_url()?>Cursos" style="margin: 2px 2px 2px 2px">volver</a>
        </div>
    
    </section>
    <!--Tarjeta principal-->
    
</body>
</html>
