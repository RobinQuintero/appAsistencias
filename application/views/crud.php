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
            <a href="<?php echo base_url()?>" class="brand-logo"> <img src="<?php echo base_url()?>images/default.png" alt="universidad del magdalena"> <p class="hide-on-med-and-down">UNIVERSIDAD DEL MAGDALENA</p></a>
        </div>

        

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
        
        <div>
        
            <!--Tarjetas de estudiantes-->
            <h2 class="blue-text hide-on-med-and-down" style="padding:5px 20px">Administrador</h2>
                <h1 class="orange-text hide-on-large-only center">GRUPOS</h1>
            
            
            <!--Tarjetas de estudiantes-->
        </div>
        
        

        
    </section>
    <!--Tarjeta principal-->
    
</body>
</html>