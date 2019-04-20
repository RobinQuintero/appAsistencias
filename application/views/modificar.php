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
        
        <h2>Modificar Estudiante</h2>
        <form action="" method="POST">
            <?php foreach ($mod as $fila){ ?>
                <div class="input-field" >
                    <input type="text" name="nombre" value="<?=$fila->nombre?>" style="margin: 2px 2px 2px 2px">
                    <label for="nombre">Nombre</label>
                </div>
                <div class="input-field" >
                    <input type="text" name="apellido" value="<?=$fila->apellido?>" style="margin: 2px 2px 2px 2px">
                    <label for="apellido">Apellido</label>
                </div>
                <div class="input-field" >
                    <input type="number" name="codigo" value="<?=$fila->codigo?>" style="margin: 2px 2px 2px 2px">
                    <label for="codigo">Codigo</label>
                </div>
                <div class="input-field" >
                    <input type="number" name="genero" value="<?=$fila->genero?>" style="margin: 2px 2px 2px 2px">
                    <label for="genero">Genero</label>
                </div>
                <div class="input-field" >
                    <input type="email" name="email" value="<?=$fila->email?>" style="margin: 2px 2px 2px 2px">
                    <label for="email">Correo</label>
                </div>
                <div class="input-field" >
                    <input type="text"  name="password" value="<?=$fila->contrasenia?>" style="margin: 2px 2px 2px 2px">
                    <label for="password">Contraseña</label>
                </div>         
                <div class="input-field" >
                    <input type="number" name="estado" value="<?=$fila->estado?>"style="margin: 2px 2px 2px 2px">
                    <label for="nombre">Estado</label>
                </div>
                <input type="submit" name="submit" value="Modificar" class="btn blue" style="margin: 2px 2px 2px 2px">
            <?php } ?>
        </form>
        <a class="btn blue" href="<?php echo base_url()?>Estudiantes" style="margin: 2px 2px 2px 2px">volver</a>
        </div>
    
    </section>
    <!--Tarjeta principal-->
    
</body>
</html>
