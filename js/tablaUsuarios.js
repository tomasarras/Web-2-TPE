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
    btnBorrar.addEventListener("click", ()=> {
        let id = btnBorrar.getAttribute("name");
        borrarUsuario(id);
    });

    async function borrarUsuario(id){
        console.log("cick")
        let response = await fetch("api/usuarios/" + id,{
            "method": "DELETE",
            "headers": { "Authorization": "Bearer " + helper.getToken() }
        });

        if (response.ok) {
            getUsuarios();
            let overlay = document.getElementById('overlay'),
            popup = document.getElementById('popup');
            overlay.classList.remove('active');
            popup.classList.remove('active');
        }
    }

    //agrega o quita permisos de admin
    async function asignarSwitches() {
        let switches = document.querySelectorAll(".cb-value");
        switches.forEach(checkbox => {
            checkbox.addEventListener("click", () => {
                let estado = checkbox.checked;
                if (checkbox.getAttribute("name") != id_user)
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

        await fetch('api/admin/usuarios/' + id, {
            "method": "PUT",
            "headers": {
                "Content-Type": "application/json",
                "Authorization": "Bearer " + helper.getToken()
            },
            "body": JSON.stringify(json)
        });

    }

    function getUsuarios(callback) {
        fetch("api/usuarios",{
            "headers": { "Authorization": "Bearer " + helper.getToken() }
        })
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