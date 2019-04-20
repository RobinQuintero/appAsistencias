<style>
            .sidenav li a{
                color: white;
            }
            nav-wrapper{
                margin-bottom: 0;
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
                    <div class="grey lighten-4" style="height:200px;">-</div>
                </div>
                <a href="#user"><img class="circle" src="<?php echo $profesor->imagen_perfil?>"></a>
                <a href="#name"><span class="black-text name"><?php echo $profesor->nombre." ".$profesor->apellido?></span></a>
                <a href="#email"><span class="black-text email"><?php echo $profesor->email?></span></a>
                </div>
            </li>
            <li><a href="<?php echo base_url()?>principal"><i class="material-icons white-text">home</i>Inicio</a></li>
            <li><a href="<?php echo base_url()?>grupos"><i class="material-icons white-text">class</i>Grupos</a></li>
            <li><a href="<?php echo base_url()?>usuario"><i class="material-icons white-text">person</i>Perfil</a></li>
            <li><a href="<?php echo base_url()?>login/logout"><i class="material-icons white-text">exit_to_app</i>Cerrar Sesión</a></li>
        </ul>
        
    </nav>
</div>



<!--<ul class="sidenav-fixed" id="mobile-demo">
            <li><div class="user-view">
                    <div class="background">
                        <img src="<?php echo base_url()?>img/Universidad-del-Magdalena-1.jpg">
                    </div>
                    <a href="#user"><img class="circle" src="images/yuna.jpg"></a>
                    <a href="#name"><span class="white-text name">John Doe</span></a>
                    <a href="#email"><span class="white-text email">jdandturk@gmail.com</span></a>
                    </div>
                </li>
                <li><a href="<?php echo base_url()?>principal">Inicio</a></li>
                <li><a href="<?php echo base_url()?>grupos">Grupos</a></li>
                <li><a href="<?php echo base_url()?>usuario">Perfil</a></li>
                <li><a href="<?php echo base_url()?>login/logout">Cerrar Sesión</a></li>
        </ul>-->