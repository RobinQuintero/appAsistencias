<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Recuperar contraseña | Control de asistencias</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/login.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>

    

    <div class="card div-form">
        <div class="card-body">

            <img class="left" src="<?php echo base_url()?>images/escudo_unimag_sm.png" alt="" style="width: 100px;">
            <h1 class="right blue-text" style="font-family: 'googlesans-bold'; text-align: right; margin-bottom: 5%;">UNIVERSIDAD DEL<br>MAGDALENA</h1>
            <div style="clear:both;"></div>
            <form action="" method="post">
                <div class="input-field" >
                    <i class="material-icons prefix">email</i>
                    <input name="email" type="text">
                    <label for="email">E-mail</label>
                </div>
                <button type="submit" class="waves-effect waves-teal btn-flat right">Recuperar</button>
                <a href="<?php echo base_url()?>login" class="waves-effect waves-teal btn-flat right">Cancelar</a>
            </form>

        </div>
    </div>
</body>

</html>