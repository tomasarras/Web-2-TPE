import Helper from './Helper.js';

document.addEventListener("DOMContentLoaded", () => {
    let tabla = new Vue({
        el: "#vue-tabla-usuarios",
        data: {
            usuarios: [],
            id_usuario: document.querySelector("#user-id").value
        }
    });
    let helper = new Helper();
    let id_user = document.querySelector("#user-id").value;

    //agrega el efecto al hacer click en el switch
    function moverSwitches() {
        let switches = document.querySelectorAll(".cb-value");
        switches.forEach(swich => {
            swich.addEventListener("click", () => {
                if (swich.getAttribute("name") != id_user) {
                    let mainParent = swich.parentNode;
                    if (swich.checked)
                        mainParent.classList.add("active");
                    else
                        mainParent.classList.remove("active");
                }
            });
        });
    }

    let btnBorrar = document.querySelector("#btn-borrar");
    btnBorrar.addEventListener("click", () => {
        let href = btnBorrar.getAttribute("src") + btnBorrar.getAttribute("name");
        btnBorrar.setAttribute("href", href);
    });

    //agrega o quita permisos de admin
    async function asignarSwitches() {
        let switches = document.querySelectorAll(".cb-value");
        switches.forEach(checkbox => {
            checkbox.addEventListener("click", () => {
                let estado = checkbox.checked;
                if (checkbox.getAttribute("name") != id_user) //quitar de smarty
                    cambiarAdmin(estado, checkbox.getAttribute("name"));
            });
        });
    }

    //envia a la api el usuario admin
    async function cambiarAdmin(estado, id) {
        let json = {};
        if (estado)
            json = { "admin": "1" }
        else
            json = { "admin": "0" }

        await fetch('api/admin/usuarios/' + id, { //enviar mas datos en json
            "method": "PUT",
            "headers": { "Content-Type": "application/json" },
            "body": JSON.stringify(json)
        });

    }

    function getUsuarios(callback) {
        fetch("api/usuarios")
            .then(response => response.json())
            .then(usuarios => {
                tabla.usuarios = usuarios;
            })
            .then(() => callback())
            .catch(error => console.log(error));
    }

    getUsuarios(() => {
        moverSwitches();
        asignarSwitches();
        helper.asignarIconosBorrar();
    });
});