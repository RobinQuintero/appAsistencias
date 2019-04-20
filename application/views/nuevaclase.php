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
    <script src="<?php echo base_url()?>js/materialize.min.js"></script>
    <script src="<?php echo base_url()?>js/jspdf.js"></script>
    
    <script src="<?php echo base_url()?>js/graficos.js"></script>
    <title>Control de asistencias - Unimagdalena</title>
</head>
<body>

    
    
    <!--Barra de navegación-->
    <header class="col s12 m12">
        <?php include 'header.php'?>
    </header>

    
    <!--Barra de navegación-->

    <!--Tarjeta principal-->
    <section id="main" class="row" style="">

            
            <h2 class="orange-text hide-on-med-and-down" style="padding:5px 20px">Nueva clase</h2>
            <h3 class="orange-text hide-on-large-only center" style="padding-top:30px">NUEVA CLASE</h3>        


            
            <!--Tarjetas de estudiantes-->
            
            <div class="estudiantes col s12 m12">
                <div class="card col s12 m12 l12 orange" id="info1">
                    <h5>Información del grupo</h5>
                    <p>Asignatura: <?php echo $grupo->nombre?></p>
                    <p>Docente: <?php echo $profesor->nombre." ".$profesor->apellido?></p>
                    <p>Grupo: <?php echo $grupo->numero?></p>
                    <p>Horario: <?php echo $grupo->horario?></p>
                    </div>
                <div class="row" id="Estudiantes">
                    <!--Espacio para los estudiantes-->
                </div>
            </div>
            <!--Tarjetas de estudiantes-->

            <div class="col m1"></div>

            <div class="clear"></div>


            
        
        
    </section>
    <!--Tarjeta principal-->
    
    <!--Botón flotante-->
    <div class="fixed-action-btn" id="botoncheck">
        <a onclick="finalizar()" class="btn-floating btn-large red waves-effect waves-light tooltipped hoverable zoom" data-position="left" data-tooltip="Generar Asistencia">
            <i class="large material-icons">check</i>
        </a>
    </div>
    <!--Botón flotante-->

    <!--Aviso al generar lista-->
    <div id="aviso" class="modal">
        <form action="#">
            <div class="modal-content">
                <h3>Clase creada correctamente</h3>
            </div>
            <div class="modal-footer">
                <a href="<?php echo base_url()?>grupos" class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
            </div>
        </form>
    </div>
    <!--Aviso al generar lista-->
    


    <script>

        <?php
        $est = '';
        $est = json_encode($estudiantes);
        $est = 'var estudiantes = '.$est;
        echo $est;
        ?>
        //Busca la posición del estudiante en la lista
        function buscar(id){
            for(i in estudiantes){
                if(estudiantes[i].codigo == id) return i;
            }
        }

        //Toma los elementos de la lista y crea las correspondientes tarjetas
        for(i in estudiantes){
            var EstudianteActual = estudiantes[i];
            var imagen = "";
            var color = "";
            if(EstudianteActual.genero == "1") imagen = "<?php echo base_url()?>images/estudiante.png";
            else imagen = "<?php echo base_url()?>images/estudiante_fem.png";
            if(EstudianteActual.estado == "1") color = "card green darken-1 waves-effect waves-light";
            else color = "card red darken-1 waves-effect waves-light"
            var div = document.createElement("div");
            div.className = "col s6 m3 l2";
            document.getElementById("Estudiantes").appendChild(div);
            var card = document.createElement("div");
            card.className = color;
            card.id = EstudianteActual.codigo;
            card.classList.add("zoom");
            card.onclick = function(){
                if(estudiantes[buscar(this.id)].estado == "1"){
                    this.classList.add("red");
                    this.classList.remove("green");
                    estudiantes[buscar(this.id)].estado = "0";
                }else{
                    this.classList.add("green");
                    this.classList.remove("red");
                    estudiantes[buscar(this.id)].estado = "1";
                }
            }
            div.appendChild(card);
            var cardimage = document.createElement("div");
            cardimage.className = "card-image";
            cardimage.innerHTML = '<img src="'+imagen+'" alt="'+EstudianteActual.nombre+' '+EstudianteActual.apellido+'">';
            card.appendChild(cardimage);
            var cardcontent = document.createElement("div");
            cardcontent.className = "card-image";
            cardcontent.innerHTML = '<h6>'+EstudianteActual.nombre+' '+EstudianteActual.apellido+'</h6>';
            card.appendChild(cardcontent);

            function finalizar(){

                var n_Asistencias = 0;
                for(i in estudiantes){
                    if(estudiantes[i].estado=="1") n_Asistencias++;
                }

                var datos = {
                    "grupo" : "<?php echo $grupo->codigo_curso?>",
                    "fecha" : "<?php echo $fecha?>",
                    "tema" : "<?php echo $tema?>",
                    "estudiantes":JSON.stringify(estudiantes),
                    "n_Asistencias":n_Asistencias
                };
                
                $.ajax({
                    url: '<?php echo base_url()?>clases/crearClase',
                    type: 'POST',
                    data: datos,
                    success: function(data){
                        var ventana = document.getElementById('aviso');
                        var instance = M.Modal.getInstance(ventana);
                        if(data=="si"){
                            instance.open();
                        }

                    }
                });
            }
            
        }
    </script>
    <script src="<?php echo base_url()?>js/autotable.js"></script>
    <script><?php include("js/convertirAPdf.js")?></script>
    


</body>
</html>