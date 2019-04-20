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

    

    <!--Barra de navegación-->
    <header>
        <?php include 'header.php'?>
    </header>
    <!--Barra de navegación-->

    <!--Tarjeta principal-->
    <section id="main">
        
        <div>
        
            <!--Tarjetas de estudiantes-->
            <h2 class="orange-text hide-on-med-and-down" style="padding:5px 20px">Grupos</h2>
                <h1 class="orange-text hide-on-large-only center">GRUPOS</h1>
            <div class="grupos">
                
                <div class="row" id="grupos">
                    <!--Espacio para los grupos-->
                </div>
            </div>
            
            <!--Tarjetas de estudiantes-->
        </div>
        
        
        

        <div class="clear"></div>
        <div class="barra"></div>
        
    </section>
    <!--Tarjeta principal-->

    
    
    
    <script>

        <?php
        $grups = '';
        $grups = json_encode($grupos);
        $grups = 'var grupos = '.$grups;
        echo $grups;
        ?>
        
        function buscar(id){
            for(i in grupos){
                if(grupos[i].codigo_curso == id) return i;
            }
        }
        for(i in grupos){
            var grupoActual = grupos[i];
            var color = "";
            color = "card azul waves-effect waves-light";
            var div = document.createElement("div");
            div.className = "col s12 m6 l4";
            document.getElementById("grupos").appendChild(div);
            var card = document.createElement("div");
            card.className = color;
            card.id = grupoActual.codigo_curso;
            card.onclick = function(){
                window.location = "<?php echo base_url()?>grupos/info/"+grupos[buscar(this.id)].codigo_curso;
            }
            card.classList.add("zoom");
            div.appendChild(card);
            var cardcontent = document.createElement("div");
            cardcontent.className = "card-image";
            cardcontent.innerHTML = '<h6> Materia: '+grupoActual.nombre+'</h6><h6>Grupo No. '+grupoActual.numero+'</h6><h6>Horario: '+grupoActual.horario+'</h6>';
            card.appendChild(cardcontent);
        }

        
    
    </script>

    
    <script src="<?php echo base_url()?>js/convertirAPdf.js"></script>
    

    



    
</body>
</html>