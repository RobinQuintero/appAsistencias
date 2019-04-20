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
    <title>CRUD | Control de asistencias</title>
</head>
<body>
        <?php
        //Si existen las sesiones flasdata que se muestren
            if($this->session->flashdata('correcto'))
                echo $this->session->flashdata('correcto');
             
            if($this->session->flashdata('incorrecto'))
                echo $this->session->flashdata('incorrecto');
        ?>

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
            <a href="<?php echo base_url()?>" class="brand-logo"><p style="padding-left:280px;" class="hide-on-med-and-down">Administrador</p></a>
        </div>

        

        <ul id="slide-out" class="sidenav sidenav-fixed blue white-text">
            
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
            <h2 class="blue-text hide-on-med-and-down" style="padding:5px 20px">Administrar profesores</h2>
                <h1 class="blue-text hide-on-large-only center">Admin. profesores</h1>
                <table class="striped">
                <thead>
                <tr class="blue-text">
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Correo</th>
                    <th>Contraseña</th>
                    <th>Estado</th>
                    <th>Imagen de perfil</th>
                </tr>
                </thead>
            <tr>
                <form action="<?php echo base_url()?>Profesores/add" method="post">
                    <td></td>
                    <td>
                        <div class="input-field" >
                            <input type="text" name="nombre" id="nombre" required>
                            <label for="nombre">Nombre</label>
                        </div>
                    </td>
                    <td>
                        <div class="input-field" >
                            <input type="text" name="apellido" id="apellido" required>
                            <label for="apellido">Apellido</label>
                        </div>
                    </td>
                    <td>
                        <div class="input-field" >
                            <input type="email" name="email" id="email" required>
                            <label for="email">Correo</label>
                        </div>
                    </td>
                    <td>
                        <div class="input-field" >
                            <input type="text" name="password" id="password" required>
                            <label for="password">Contraseña</label>
                        </div>
                    </td>
                    <td>
                        <div class="input-field" >
                            <input type="number" name="estado" id="estado" required>
                            <label for="estado">Estado</label>
                        </div>
                    </td>
                    <td>
                        <div class="input-field" >
                            <input type="text" name="imagen_perfil" id="imagen_perfil" required>
                            <label for="imagen_perfil">Imagen del Perfil</label>
                        </div>
                    </td>
                    <td>
                        <input type="submit" name="submit" value="Añadir" class="btn blue"/>
                    </td>
                </form>
            </tr>
        
<?php

foreach($ver as $fila){
?>
    <tr>
        <td>
            <?=$fila->id_profesor;?>
        </td>
        <td>
            <?=$fila->nombre;?>
        </td>
        <td>
            <?=$fila->apellido;?>
        </td>
        <td>
            <?=$fila->email;?>
        </td>
        <td>
            <?=$fila->contrasenia;?>
        </td>
        <td>
            <?=$fila->estado;?>
        </td>
        <td>
            <?=$fila->imagen_perfil;?>
        </td>
        <td>
            <a class="btn blue" style="margin-top: 2px; width:100%" href="<?php echo base_url()?>Profesores/mod/<?=$fila->id_profesor;?>">Modificar</a>
            <a class="btn blue" style="margin-top: 2px; width:100%" href="<?php echo base_url()?>Profesores/eliminar/<?=$fila->id_profesor;?>">Eliminar</a>
        </td>
    </tr>
<?php
    
}
?>
</table>            
            <!--Tarjetas de estudiantes-->
        </div>
    
    </section>
    <!--Tarjeta principal-->
    
</body>
</html>
