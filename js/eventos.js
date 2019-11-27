import Helper from './Helper.js';

document.addEventListener("DOMContentLoaded", function() {
    let tablaEventos = new Vue({
        el: "#tabla-eventos",
        data: {
            eventos: []
        }
    });

    let helper = new Helper();

    async function borrarEvento(id) {
        await fetch("api/eventos/" + id, {
            "headers": { "Authorization": "Bearer " + helper.getToken() },
            "method": "DELETE"
        });

        let overlay = document.getElementById('overlay'),
            popup = document.getElementById('popup');

        overlay.classList.remove('active');
        popup.classList.remove('active');
        getEventos();
    }


    function getEventos() {
        fetch("api/eventos?bandas=")
            .then(response => response.json())
            .then(eventos => {
                tablaEventos.eventos = eventos;
            })
            .then(() => helper.asignarIconosBorrar())
            .catch(error => console.log(error));
    }



    getEventos();

    let btnBorrar = document.querySelector("#btn-borrar");
    btnBorrar.addEventListener("click", () => borrarEvento(btnBorrar.getAttribute("name")));


});