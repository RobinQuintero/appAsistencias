<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo base_url()?>css/materialize.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>css/estilos.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Mukta'>
  	
    <script src="<?php echo base_url()?>js/jquery.js"></script>
    <script src="<?php echo base_url()?>js/materialize.min.js"></script>
    <script src="<?php echo base_url()?>js/jspdf.js"></script>
    <script src="<?php echo base_url()?>js/graficos.js"></script>
    <title>Perfil | Control de asistencias</title>
</head>
<body>

    <header>
        <?php include 'header.php'?>
    </header>

    <section class="main" style="margin-top:90px">
    <div class="container">
        <div class="card horizontal">
            <div class="card-image">
                <img src="<?php echo $profesor->imagen_perfil?>" style="width:200px;">
            </div>
            <div class="card-stacked">
                <style>
                    h6{
                        text-align:left;
                    }
                    .card i{
                        padding-top:10px;
                    }
                </style>
                <div class="card-content">
                <h4 class="blue-text"><?php echo $profesor->nombre." ".$profesor->apellido?></h4>
                <h6 class="black-text" style="width: 350px; display:inline-block;">Email: <?php echo $profesor->email?></h6><a href="#"><i class="material-icons right" onclick="cambiarusu()" >create</i></a>
                <h6 class="black-text" style="width: 350px; display:inline-block;">Contraseña:      •••••••••••••••</h6><a href="#"><i class="material-icons right" onclick="cambiarcontra()">create</i></a>
                </div>
            </div>  
        </div>
        <div class="card horizontal" id="usuario" style="display:none;">
            
            <div class="card-stacked">
                <style>
                    h6{
                        text-align:center;
                    }
                    .card i{
                        padding-top:10px;
                    }
                </style>
                <div class="card-content">
                    <h4 class="blue-text center">Cambiar Correo</h4>
                    <div class="input-field">
                        <i class="material-icons prefix darken-1">email</i>
                        <input name="correo1" type="email">
                        <label for="correo1">Nuevo Correo</label>
                    </div>
                    <div class="input-field">
                        <i class="material-icons prefix darken-1">email</i>
                        <input name="correo2" type="email">
                        <label for="correo2">Confirmar Correo</label>
                    </div>
                    <div class="input-field">
                        <i class="material-icons prefix darken-1">lock</i>
                        <input name="confirmpass" type="email">
                        <label for="confirmpass">Contraseña</label>
                    </div>
                    <button type="submit" class="waves-effect waves-teal btn-flat right">Cambiar</button>
                </div>
            </div>  
        </div>
        <div class="card horizontal" id="contrasena" style="display:none;">
            
            <div class="card-stacked">
                <style>
                    h6{
                        text-align:center;
                    }
                    .card i{
                        padding-top:10px;
                    }
                </style>
                <div class="card-content">
                    <h4 class="blue-text center">Cambiar Contraseña</h4>
                    <div class="input-field">
                        <i class="material-icons prefix darken-1">lock</i>
                        <input name="contra1" id="contra1" type="password">
                        <label for="contra1">Nuevo Contraseña</label>
                    </div>
                    <div class="input-field">
                        <i class="material-icons prefix darken-1">lock</i>
                        <input name="contra2" id="contra2" type="password">
                        <label for="contra2">Confirmar Contraseña</label>
                    </div>
                    <div class="input-field">
                        <i class="material-icons prefix darken-1">lock</i>
                        <input name="confirmapass" id="confirmapass" type="password">
                        <label for="confirmapass">Contraseña Actual</label>
                    </div>
                    <button onclick="llamacambiocontra()" class="waves-effect waves-teal btn-flat right">Cambiar</button>
                </div>
            </div>  
        </div>
            <script>
                function cambiarusu(){
                    var div = document.getElementById('contrasena');
                    if(div.style.display == 'none'){
                        $('#usuario').toggle();
                    }
                }
                function cambiarcontra(){
                    var div2 = document.getElementById('usuario');
                    if(div2.style.display == 'none'){
                        $('#contrasena').toggle();
                    }
                }
                function llamacambiocontra(){
                    var div1 = document.getElementById('contra1').value;
                    var div2 = document.getElementById('contra2').value;
                    var div3 = document.getElementById('confirmapass').value;
                    if(div1 != div2){
                        alert("contraseña no coincide");
                    }else{
                        var datos = {
                                "contrasena1":div1,
                                "contrasena2":div2,
                                "contrasena3":div3,
                                "email":'<?php echo $profesor->email?>'
                            }
                        $.ajax({
                            url:'<?php Base_url()?>usuario/cambiarcontrasena',
                            type:'POST',
                            data: datos,
                            success: function(data){
                                alert(data);
                            }
                        });
                    }
                }
            </script>  
        </div>
    </div>
    </section>
    
</body>
</html>