import Helper from './Helper.js';

document.addEventListener("DOMContentLoaded", () => {

    let sectionComentarios = new Vue({
        el: "#vue-comentarios",
        data: {
            comentarios: [],
            promedio: 0,
            user: {
                "email": document.querySelector("#user-email").value,
                "id_usuario": document.querySelector("#user-id").value,
                "admin": document.querySelector("#user-admin").value,
                "nombre": document.querySelector("#user-nombre").value,
                "logueado": document.querySelector("#user-logueado").value
            }
        }
    });

    let helper = new Helper();
    asignarTabs();

    function asignarTabs() {
        let divTabs = document.querySelector(".tabs.active");
        helper.moverTabs(divTabs);
        let tabs = divTabs.children;
        for (let i = 0; i < tabs.length; i++)
            tabs[i].addEventListener("click",()=> {
                let criterio = tabs[i].getAttribute("name");
                let orden = tabs[i].getAttribute("value");
                getComentarios(criterio,orden);
            });
    }

    function calcularTiempo(comentarios) {
        let fechaActual = new Date();

        comentarios.forEach(comentario => {

            let fechaComentario = new Date(comentario.fecha);

            let segundos = (fechaActual.getTime() - fechaComentario.getTime()) / 1000;
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
                if (Math.floor(horas) > 1) comentario.tiempo = "mas de " + Math.floor(horas) + " horas";
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

    function asignarBackground(puntaje, div) {
        puntaje = parseInt(puntaje);
        div.remove("background-rojo");
        div.remove("background-naranja");
        div.remove("background-amarillo");
        div.remove("background-verde");
        div.remove("background-verde-oscuro");

        switch (puntaje) {
            case 1:
                div.add("background-rojo");
                break;
            case 2:
                div.add("background-naranja");
                break;
            case 3:
                div.add("background-amarillo");
                break;
            case 4:
                div.add("background-verde");
                break;
            case 5:
                div.add("background-verde-oscuro");
                break;
        }
    }

    function calcularPromedio(comentarios) {
        let prom = 0;

        comentarios.forEach(comentario => {
            prom += parseInt(comentario.puntaje);
        });

        prom = prom / comentarios.length;

        let div = document.querySelector("#promedio-puntaje");
        prom = Math.round(prom * 10) / 10;
        if (prom)
            div.innerHTML = prom;
        else
            div.innerHTML = 0;
        prom = Math.round(prom);
        asignarBackground(prom, div.parentElement.classList);

        let stars = document.querySelectorAll(".stars-prom");
        stars.forEach(star => star.classList.remove("marcada"));

        let i = stars.length - 1;
        while (prom > 0) {
            stars[i].classList.add("marcada");
            i--;
            prom--;
        }

    }

    let puntaje = "0";
    //efecto al hacer click en las rating-stars
    let stars = document.querySelectorAll(".rating-star");
    stars.forEach(star => {
        star.addEventListener("click", () => {
            puntaje = star.value;
            let clasesDiv = star.parentNode.classList;

            asignarBackground(puntaje, clasesDiv);

            let mostrarPuntaje = star.parentNode.firstChild;
            mostrarPuntaje.innerHTML = puntaje;
        });
    });

    //obtiene los comentarios de la api y los muestra
    function getComentarios(criterio,orden) {
        let url;
        let id = document.querySelector("#evento").getAttribute("name");
        if (criterio)
            url = "api/eventos/" + id + "/comentarios?" + criterio + '=' + orden;
        else
            url = "api/eventos/" + id + "/comentarios";

        fetch(url)
            .then(response => response.json())
            .then(comentarios => {
                sectionComentarios.comentarios = comentarios;
                calcularTiempo(comentarios);
                calcularPromedio(comentarios);
            })
            .then(() => helper.asignarIconosBorrar())
            .catch(error => console.log(error));
    }

    if (sectionComentarios.user.logueado == "1") {
        //si esta logueado se habilita el boton de comentar
        let btnEnviar = document.querySelector("#btn-enviar-comentario");
        btnEnviar.addEventListener("click", enviarComentario);

        //se quita el mensaje de error si es que hay
        let textArea = document.querySelector("#js-comentario")
        textArea.addEventListener("click", () => {
            let mensajeError = document.querySelector(".comment-box span");
            mensajeError.classList.add("none");
        });
    }



    async function enviarComentario() {
        let comentario = document.querySelector("#js-comentario").value;
        let mensajeError = document.querySelector(".comment-box span");

        if (comentario != '') {

            if (puntaje != '0') {
                let id_evento = document.querySelector("#evento").getAttribute("name");

                let json = {
                    "comentario": comentario,
                    "puntaje": puntaje
                }

                let response = await fetch("api/eventos/" + id_evento + "/comentarios", {
                    "method": "POST",
                    "headers": { "Content-Type": "application/json" },
                    "body": JSON.stringify(json)
                });

                if (!response.ok)
                    console.log("error de conexion");

                getComentarios();

            } else {
                mensajeError.classList.remove("none");
                mensajeError.innerHTML = "*Puntua el comentario";
            }


        } else {

            mensajeError.classList.remove("none");
            mensajeError.innerHTML = "*Escribi un comentario";

            if (puntaje == '0')
                mensajeError.innerHTML += " y una puntuacion";

        }
    }

    async function borrarComentario(id) {
        await fetch("api/comentarios/" + id, {
            "method": "DELETE"
        });

        let overlay = document.getElementById('overlay'),
            popup = document.getElementById('popup');

        overlay.classList.remove('active');
        popup.classList.remove('active');
        getComentarios();
    }

    getComentarios();

    let btnBorrarComentario = document.querySelector("#btn-borrar");
    btnBorrarComentario.addEventListener("click", () =>
        borrarComentario(btnBorrarComentario.getAttribute("name")));
});