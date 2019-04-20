<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo base_url()?>css/materialize.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>css/estilos.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Mukta'>
    <script src="<?php echo base_url()?>js/jquery.js"></script>
    <script src="<?php echo base_url()?>js/materialize.js"></script>
    <script src="<?php echo base_url()?>js/jspdf.js"></script>
    <script src="<?php echo base_url()?>js/graficos.js"></script>
    <title>Control de asistencias - Unimagdalena</title>
</head>
<body>

    <header>
        <?php include 'header.php'?>
    </header>

    

    <section id="main" class="row" >

    <h2 class="orange-text hide-on-med-and-down" style="padding:5px 20px">Información</h2>
                

    <div class="col s12 m12">
    <h3 class="orange-text hide-on-large-only center" style="padding-top:30px">INFORMACIÓN</h3>        
    <div class="card  blue" id="info1">
            
            <h5>Información del grupo</h5>
            <p>Asignatura: <?php echo $grupo->nombre?></p>
            <p>Docente: <?php echo $profesor->nombre." ".$profesor->apellido?></p>
            <p>Grupo: <?php echo $grupo->numero?></p>
            <p>Horario: <?php echo $grupo->horario?></p>
        </div>
    </div>

    <style>
        .collapsible-body{
            padding-top:0;
            padding-bottom:0;
            padding-right:0;
            padding-left:5px;
        }

        table{
             /*horizontal scroll*/
            overflow-y: scroll; /*vertical scroll*/
        }
    </style>

        <div class="col s12 m12">
            <ul class="collapsible">
                <li>
                    <div class="collapsible-header orange-text" style="padding-top:0;padding-bottom:5px;">
                        
                        <h4 class="orange-text" style="width: 150px; display:inline-block;"><i class="material-icons">assignment</i>Clases</h4>            
                    </div>
                    <div class="collapsible-body">
                    <a href="#nuevaclase" class="btn orange waves modal-trigger center" style=" width:100%;">Nueva Clase</a>

                    <table class="striped">
                        <thead>
                            <tr class="orange-text">
                                <th>Fecha</th>
                                <th>Tema</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php if($asistencias!=null):?>
                            <?php foreach($asistencias as $listado):?>
                            <tr id="<?php echo $listado->id_lista_asistencia?>"  style="cursor:pointer;" onclick="infoclase(this.id)">
                                <td><?php echo $listado->fecha_asistencia?></td>
                                <td><?php echo $listado->tema_clase?></td>
                            </tr>
                            <?php endforeach;?>
                            <?php else:?>

                            <tr>
                                <td>No hay clases registradas.</td>
                                
                            </tr>

                            <?php endif; ?>
                            
                        </tbody>
                    </table>
                    </div>
                </li>
                <li>
                    <div class="collapsible-header" style="padding-top:0;padding-bottom:5px;">
                    <h4 class="orange-text"><i class="material-icons">person</i>Estudiantes</h4>
                </div>
                    <div class="collapsible-body">
                        <table class="striped" style="overflow-x: scroll;">
                            <thead>
                                <tr class="orange-text">
                                    <th>Nombre</th>
                                    <th>Código</th>
                                    <th>Fallas</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php if($estudiantes!=null):?>
                                <?php 
                                    $this->load->model('listas_Matriculas')
                                    
                                ?>
                                <?php foreach($estudiantes as $estudiante):?>
                                <?php $fallas = $this->listas_Matriculas->obtenerFallas($estudiante->id_estudiante, $grupo->codigo_curso)?>
                                <tr class="hoverable <?php if($estudiante->fallas>=4) echo'red white-text'; else if($estudiante->fallas==3) echo'yellow white-text';?>" id="<?php echo $estudiante->codigo?>" onclick="infoestudiante(this.id)" style="cursor:pointer;">
                                    <td><?php echo $estudiante->nombre." ".$estudiante->apellido?></td>
                                    <td><?php echo $estudiante->codigo?></td>
                                    <td><?php echo $estudiante->fallas?></td>
                                </tr>
                                <?php endforeach;?>

                                <?php else:?>
                                <tr>
                                    <td>No hay estudiantes matriculados.</td>
                                </tr>
                            <?php endif; ?>
                            
                            </tbody>
                        </table>
                    </div>    
                </li>
            </ul>

            <br><br><br>
            
                
            </div>
    </div>

</div>
    </section>

    <div id="nuevaclase" class="modal">
        <form action="<?php echo base_url()?>clases/nuevaclase/<?php echo $grupo->codigo_curso?>" method="post">
        <div class="modal-content">
        <h4 class="center orange-text">NUEVA CLASE</h4>
        <div class="input-field">
            
          <input id="fecha" name="fecha" type="text" class="validate datepicker" required>
          <label for="fecha">Fecha de clase</label>
        </div>
        <div class="input-field">
          <input id="tema" name="tema" type="text" class="validate" required>
          <label for="tema">Tema de clase</label>
        </div>
        </div>
        <div class="modal-footer">
        <button type="submit" class="modal-close waves-effect waves-green btn-flat">Crear clase</button>
        </div>
        </form>
    </div>

    <div id="infoclase" class="modal">
        <form action="<?php echo base_url()?>clases/nuevaclase/<?php echo $grupo->codigo_curso?>" method="post">
        <div class="modal-content">
        <h4 class="center orange-text">Info clase</h4>
        <div class="card blue">

            <div class="card-content"> 
                <p class="white-text">Asignatura:    <?php echo $grupo->nombre?></p>
                <p class="white-text">Grupo no.    <?php echo $grupo->numero?></p>
                <p class="white-text" id="infofecha">Fecha: </p>
                <p class="white-text" id="infotema">Tema: </p>
                <div style="clear:both"></div>

                

                
            </div>
        
        </div>
        </div>

        <table class="striped" style="overflow-x: scroll;">
            <thead>
                <tr class="orange-text blue z-depth-2">
                    <th>Nombre</th>
                    <th>Código</th>
                </tr>
            </thead>
            <tbody id="bodyestudiantes"></tbody>
        </table>

    </div>

    <div id="infoestudiante" class="modal">
        <div class="modal-content">
        <h4 class="center orange-text">Info estudiante</h4>
        <div class="card blue">

            <div class="card-content"> 
                <p class="white-text" id="infonombre">Nombre:   </p>
                <p class="white-text" id="infocodigo">Código:  </p>
                <div style="clear:both"></div>                
            </div>
        
        </div>

        <table class="striped" style="overflow-x: scroll;">
            <thead>
                <tr class="white-text blue z-depth-2">
                    <th>Clase</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody id="bodyasistencias"></tbody>
        </table>

    </div>

    

    <script>
        $(document).ready(function(){
            $('.modal').modal();
            $('.collapsible').collapsible({
                accordion: false
            });
        });
    </script>

    <script>
        function infoclase(id){
            var datos = {
                'id_lista':id
            };

            $.ajax({
                url:'<?php echo base_url()?>clases/info',
                type: 'POST',
                data: datos,
                success: function(respuesta){
                    datos = JSON.parse(respuesta);

                    var pfecha = document.getElementById("infofecha");
                    var ptema = document.getElementById("infotema");
                    pfecha.innerHTML = 'Fecha:    '+datos.lista.fecha_asistencia;
                    ptema.innerHTML = "Tema de clase:    "+datos.lista.tema_clase;

                    var estudiantes = datos.estudiantes;

                    for (i in estudiantes){
                        var estudiante = estudiantes[i];
                        var bodyestudiantes = document.getElementById("bodyestudiantes");
                        var tr = document.createElement("tr");
                        if (estudiante.estado=='1'){
                            tr.className = " green darken-2 z-depth-2 white-text";
                        }else tr.className = "red z-depth-2 white-text";
                        var td1 = document.createElement("td");
                        td1.innerHTML = estudiante.nombre+" "+estudiante.apellido;
                        tr.appendChild(td1);
                        var td2 = document.createElement("td");
                        td2.innerHTML = estudiante.codigo;
                        tr.appendChild(td2);
                        bodyestudiantes.appendChild(tr);

                    }

                    var ventana = document.getElementById('infoclase');
                    var instance = M.Modal.getInstance(ventana);
                    instance.open();
                } 
            });
        }

        function infoestudiante(id){

            var datos = {
                'codigo' : id
            };

            $.ajax({
                url:'<?php echo base_url()?>grupos/infoestudiante',
                type: 'POST',
                data: datos,
                success: function(data){
                    dat = JSON.parse(data);
                    var body = document.getElementById("bodyasistencias");
                    while (body.firstChild) {
                        body.removeChild(body.firstChild);
                    }
                    document.getElementById("infonombre").innerHTML = "Nombre: "+dat.estudiante.nombre+" "+dat.estudiante.apellido;
                    document.getElementById("infocodigo").innerHTML = "Código: "+dat.estudiante.codigo;
                    for(i in dat.asistencias){
                        var asistencia = dat.asistencias[i];
                        var tr = document.createElement("tr");
                        var td1 = document.createElement("td");
                        var td2 = document.createElement("td");
                        var td3 = document.createElement("td");
                        td1.innerHTML = asistencia.tema_clase;
                        td2.innerHTML = asistencia.fecha_asistencia;
                        if(asistencia.estado == "1") tr.className = "green darken-2 white-text";
                        else tr.className = "red darken-2 white-text";
                        tr.appendChild(td1);
                        tr.appendChild(td2); 
                        body.appendChild(tr);
                    }
                }
            });

            var vent = document.getElementById('infoestudiante');
            var instance = M.Modal.getInstance(vent);
            instance.open();
        }
    </script>


</body>
</html>