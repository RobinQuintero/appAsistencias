
$(document).ready(function(){
    $('.fixed-action-btn').floatingActionButton();
});



var estudiantes = {
    "Estudiantes" : [
        {"Codigo":"2017114002","Nombre" : "Acuña Franco Marlon Yesid", "Genero" : "Masculino", "id":"acuñafranco", "Estado":"noasistio"},
        {"Codigo":"2016114013","Nombre" : "Bermudez Quinto Jesus David", "Genero" : "Masculino", "id":"bermudezquinto", "Estado":"noasistio"},
        {"Codigo":"2017114030","Nombre" : "Dangond Fernandez Santiago", "Genero" : "Masculino", "id":"dangondfernandez", "Estado":"noasistio"},
        {"Codigo":"2016214015","Nombre" : "De Armas Lara Elkin Enrique", "Genero" : "Masculino", "id":"dearmaslara", "Estado":"noasistio"},
        {"Codigo":"2016114035","Nombre" : "De La Cruz Bocanegra Jhan Carlos", "Genero" : "Masculino", "id":"delacruz", "Estado":"noasistio"},
        {"Codigo":"2015114015","Nombre" : "De la Hoz Guerra Jasseth Yamith", "Genero" : "Masculino", "id":"delahoz", "Estado":"noasistio"},
        {"Codigo":"2013214044","Nombre" : "Duarte Porras Miguel", "Genero" : "Masculino", "id":"duarte", "Estado":"noasistio"},
        {"Codigo":"2015214044","Nombre" : "Escorcia Pertuz Deiber Andres", "Genero" : "Masculino", "id":"escorciapertuz", "Estado":"noasistio"},
        {"Codigo":"2013214056","Nombre" : "Garcia Sanchez Deyver David", "Genero" : "Masculino", "id":"garciasanchez", "Estado":"noasistio"},
        {"Codigo":"2014214071","Nombre" : "Hidalgo Jimenez Michael Andres", "Genero" : "Masculino", "id":"hidalgojimenez", "Estado":"noasistio"},
        {"Codigo":"2015214059","Nombre" : "Hurtado Buendia Hanssel Alfonso", "Genero" : "Masculino", "id":"hurtadobuendia", "Estado":"noasistio"},
        {"Codigo":"2013214064","Nombre" : "Jaimes Perez Alejandra Patricia", "Genero" : "Femenino", "id":"jaimesperez", "Estado":"noasistio"},
        {"Codigo":"2014114130","Nombre" : "Manjarres Romero Ivan Andres", "Genero" : "Masculino", "id":"manjarresromero", "Estado":"noasistio"},
        {"Codigo":"2016214108","Nombre" : "Miranda Paternina Yeisy Esther", "Genero" : "Femenino", "id":"mirandapaternina", "Estado":"noasistio"},
        {"Codigo":"2012214069","Nombre" : "Molina De La Cruz Fredys Eduardo", "Genero" : "Masculino", "id":"molinadelacruz", "Estado":"noasistio"},
        {"Codigo":"2013214089","Nombre" : "Olarte Demartino Andres David", "Genero" : "Masculino", "id":"olartedemartino", "Estado":"noasistio"},
        {"Codigo":"2016214046","Nombre" : "Ospino Ayala Luis Fernando", "Genero" : "Masculino", "id":"ospinoayala", "Estado":"noasistio"},
        {"Codigo":"2016114099","Nombre" : "Patron Ramirez Breyner David", "Genero" : "Masculino", "id":"patronramirez", "Estado":"noasistio"},
        {"Codigo":"2013214101","Nombre" : "Pertuz Vides Naren David", "Genero" : "Masculino", "id":"pertuzvides", "Estado":"noasistio"},
        {"Codigo":"2017114091","Nombre" : "Quintero Castaño Robinson", "Genero" : "Masculino", "id":"quinterocastaño", "Estado":"noasistio"},
        {"Codigo":"2011114131","Nombre" : "Rodriguez Diaz Mauricio Rafael", "Genero" : "Masculino", "id":"rogriguezdiaz", "Estado":"noasistio"},
        {"Codigo":"2014214134","Nombre" : "Urieles Navas MAyron Alfonso", "Genero" : "Masculino", "id":"urielesnavas", "Estado":"noasistio"},
        {"Codigo":"2008114147","Nombre" : "Valdez Lozano Manuel Rodrigo", "Genero" : "Masculino", "id":"valdezlozano", "Estado":"noasistio"},
        {"Codigo":"2010214127","Nombre" : "Villa Polo Luis Alberto", "Genero" : "Masculino", "id":"villapolo", "Estado":"noasistio"},
    ]
}

function buscar(id){
    for(i in estudiantes.Estudiantes){
        if(estudiantes.Estudiantes[i].id == id) return i;
    }
}



for(i in estudiantes.Estudiantes){
    var EstudianteActual = estudiantes.Estudiantes[i];
    var imagen = "";
    var color = "";
    if(EstudianteActual.Genero == "Masculino") imagen = "images/estudiante.png";
    else imagen = "images/estudiante_fem.png";
    if(EstudianteActual.Estado == "asistio") color = "card green darken-1 waves-effect waves-light";
    else color = "card red darken-1 waves-effect waves-light"
    var div = document.createElement("div");
    div.className = "col s12 m3";
    document.getElementById("Estudiantes").appendChild(div);
    var card = document.createElement("div");
    card.className = color;
    card.id = EstudianteActual.id;
    card.classList.add("zoom");
    card.onclick = function(){
        if(estudiantes.Estudiantes[buscar(this.id)].Estado == "asistio"){
            this.classList.add("red");
            this.classList.remove("green");
            estudiantes.Estudiantes[buscar(this.id)].Estado = "noasistio";
        }else{
            this.classList.add("green");
            this.classList.remove("red");
            estudiantes.Estudiantes[buscar(this.id)].Estado = "asistio";
        }
    }
    div.appendChild(card);
    var cardimage = document.createElement("div");
    cardimage.className = "card-image";
    cardimage.innerHTML = '<img src="'+imagen+'" alt="'+EstudianteActual.Nombre+'">';
    card.appendChild(cardimage);
    var cardcontent = document.createElement("div");
    cardcontent.className = "card-image";
    cardcontent.innerHTML = '<h6>'+EstudianteActual.Nombre+'</h6>';
    card.appendChild(cardcontent);
    
}

$('.dropdown-trigger').dropdown();

$(document).ready(function(){
    $('.tooltipped').tooltip();
    $('.modal').modal();
  });



