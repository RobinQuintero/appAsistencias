/*Control de asistencia - graficos.js*/

/*Inicializa los elementos gráficos y sus efectos*/

$(document).ready(function(){
    $('.fixed-action-btn').floatingActionButton();
    $('.modal').modal();
    $('.dropdown-trigger').dropdown();
    $('.sidenav').sidenav();
    $('.datepicker').datepicker({
        container: 'body'
    });
    $('.collapsible').collapsible();
});
