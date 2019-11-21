let sectionComentarios = new Vue({
    el: "#vue-comentarios",
    data: {
        comentarios: [],
        user: {
            "email" : document.querySelector("#user-email").value,
            "id_usuario": document.querySelector("#user-id").value,
            "admin": document.querySelector("#user-admin").value,
            "logueado": document.querySelector("#user-logueado").value
        }
    }
});

function calcularTiempo(comentarios) {
    let fechaActual = new Date();
    
    comentarios.forEach(comentario => {
        
        let fechaComentario = new Date(comentario.fecha);
        
        let segundos = ( fechaActual.getTime() - fechaComentario.getTime() ) / 1000;
        let minutos = segundos / 60;
        let horas = minutos / 60;
        let dias = horas / 24;
        let meses = dias / 30;
        let anio = meses / 12;
        
        if (Math.floor(anio) > 0) 
            if (Math.floor(anio) > 1) comentario.tiempo = "mas de " + Math.floor(anio) + " años";
            else comentario.tiempo = "un año";
        else if (Math.floor(meses) > 0)
            if (Math.floor(meses) > 1) comentario.tiempo = "mas de " + Math.floor(meses) + " meses";
            else comentario.tiempo = "un mes";
        else if (Math.floor(dias) > 0)
            if (Math.floor(dias) > 1) comentario.tiempo = "mas de " + Math.floor(dias) + " dias";
            else comentario.tiempo = "un dia";
        else if (Math.floor(horas) > 0)
            if (Math.floor(horas) > 1) json.tiempo = "mas de " + Math.floor(horas) + " horas";
            else comentario.tiempo = "una hora";
        else if (Math.floor(minutos) > 0)
            if (Math.floor(minutos) > 1) comentario.tiempo = "mas de " + Math.floor(minutos) + " minutos";
            else comentario.tiempo = "un minuto";
        else if (Math.floor(segundos) > 0)
            if (Math.floor(segundos) > 1) comentario.tiempo = "mas de " + Math.floor(segundos) + " segundos";
            else comentario.tiempo = "un segundo";
        else
            comentario.tiempo = "un segundo";
    });
        return comentarios;
}

/* efecto al hacer click en las rating-stars */
let puntaje = "1";
let stars = document.querySelectorAll(".rating-star");
stars.forEach(star => {
    star.addEventListener("click",()=>{
        puntaje = star.value;
        let clasesDiv = star.parentNode.classList;

        clasesDiv.remove("background-rojo");
        clasesDiv.remove("background-naranja");
        clasesDiv.remove("background-amarillo");
        clasesDiv.remove("background-verde");
        clasesDiv.remove("background-verde-oscuro");

        switch (puntaje) {
            case "1": clasesDiv.add("background-rojo"); break;
            case "2": clasesDiv.add("background-naranja"); break;
            case "3": clasesDiv.add("background-amarillo"); break;
            case "4": clasesDiv.add("background-verde"); break;
            case "5": clasesDiv.add("background-verde-oscuro"); break;
        }

        let mostrarPuntaje = star.parentNode.firstChild;
        mostrarPuntaje.innerHTML = puntaje;
    });
});

//obtiene los comentarios de la api y los muestra
function getComentarios() {
    let id = document.querySelector("#nombreForm").getAttribute("name");
    fetch("api/eventos/" + id + "/comentarios")
    .then(response => response.json())
    .then(comentarios => { sectionComentarios.comentarios = calcularTiempo(comentarios); })
    .then(()=> asignarIconosBorrar() )
    .catch(error => console.log(error));
}

if (sectionComentarios.user.logueado == "1") {
    let btnEnviar = document.querySelector("#btn-enviar-comentario");
    btnEnviar.addEventListener("click",enviarComentario);
}



async function enviarComentario() {
    let comentario = document.querySelector("#js-comentario").value;
    let id_evento = document.querySelector("#nombreForm").getAttribute("name");

    let json = {
        "comentario": comentario,
        "puntaje": puntaje
    }
    
    let response = await fetch("api/eventos/" + id_evento + "/comentarios",{
        "method" : "POST",
        "headers": { "Content-Type": "application/json" },
        "body"   : JSON.stringify(json)
    });

    if ( !response.ok )
        console.log("error de conexion");

    getComentarios();
}

async function borrarComentario(id) {
    await fetch("api/comentarios/" + id,{
        "method": "DELETE"
    });

    let overlay = document.getElementById('overlay'),
    popup = document.getElementById('popup');

    overlay.classList.remove('active');
    popup.classList.remove('active');
    getComentarios();
}




//agrega popup al apretar el icono de borrar
function asignarIconosBorrar() {
    let btnsAbrirPopup = document.querySelectorAll('.btns-abrir-popup');
    let overlay = document.getElementById('overlay'),
    popup = document.getElementById('popup'),
    btnCerrarpopup = document.querySelectorAll('.js-cerrar');
    
    btnsAbrirPopup.forEach(btnAbrirPopup => {
        
        btnAbrirPopup.addEventListener('click', function() {
            overlay.classList.add('active');
            popup.classList.add('active');
            let btnBorrar = document.querySelector("#btn-borrar");
            btnBorrar.setAttribute("name",btnAbrirPopup.getAttribute("name"));
            let evento = btnAbrirPopup.parentNode.parentNode.firstElementChild;
            let spanEvento = document.querySelector("#js-nombre-evento");
            spanEvento.innerHTML = evento.innerHTML;
        });
        
    });
    
    btnCerrarpopup.forEach(btn => {
        btn.addEventListener('click', function() {
            overlay.classList.remove('active');
            popup.classList.remove('active');
        });
    });
}

getComentarios();

let btnBorrarComentario = document.querySelector("#btn-borrar");
btnBorrarComentario.addEventListener("click",()=> 
    borrarComentario(btnBorrarComentario.getAttribute("name")
));