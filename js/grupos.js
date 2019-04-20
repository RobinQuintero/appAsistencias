// Control de asistencias - estudiantes.js
// Define la lista de estudiantes con sus códigos, nombres y los id relacionados 


//Busca la posición del estudiante en la lista
function buscar(id){
    for(i in grupos.Grupos){
        if(grupos.Grupos[i].id == id) return i;
    }
}

//Toma los elementos de la lista y crea las correspondientes tarjetas

