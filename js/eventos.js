import Helper from './Helper.js';

document.addEventListener("DOMContentLoaded", function() {
    let tablaEventos = new Vue({
        el: "#tabla-eventos",
        data: {
            eventos: []
        }
    });

    let helper = new Helper();

    //let btnAgregarEvento = document.querySelector("#btn-agregar-evento");
    //btnAgregarEvento.addEventListener("click", (event) => helper.comprobarInputsVacios(event));
    /*async function agregarEvento() {
            
        let json = {
            "evento": document.querySelector("#input-evento").value,
            "ciudad": document.querySelector("#input-ciudad").value,
            "id_banda": document.querySelector("#banda-asociada").value,
            "detalle": document.querySelector("#input-detalle").value
        };
        
        let response = await fetch("api/eventos",{
            "method": "POST",
            "headers": { "Content-Type": "application/json" },
            "body": JSON.stringify(json)
        });

        getEventos();
    }*/

    async function borrarEvento(id) {
        await fetch("api/eventos/" + id, {
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