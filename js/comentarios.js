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
async function getComentarios() {
    let id = document.querySelector("#nombreForm").getAttribute("name");
    let response = await fetch("api/comentarios/" + id);
    let json = await response.json();
    sectionComentarios.comentarios = json;
}

if (sectionComentarios.user.logueado == "1") {
    let btnEnviar = document.querySelector("#btn-enviar-comentario");
    btnEnviar.addEventListener("click",enviarComentario);
}

async function enviarComentario() {
    let comentario = document.querySelector("#js-comentario").value;
    let id_evento = document.querySelector("#nombreForm").getAttribute("name");

    let json = {
        "id_evento": id_evento,
        "comentario": comentario,
        "puntaje": puntaje
    }

    let response = await fetch("api/comentarios",{
        "method" : "POST",
        "headers": { "Content-Type": "application/json" },
        "body"   : JSON.stringify(json)
    });

    getComentarios();
}

getComentarios();