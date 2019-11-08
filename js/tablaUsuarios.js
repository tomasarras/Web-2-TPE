"use strict";
let tabla = new Vue({
    el: "#vue-tabla-usuarios",
    data: {
        subtitle: "Estas tareas se renderizan desde el cliente usando Vue.js",
        usuarios: [], 
        auth: true
    }
});

tabla.usuarios = [{
    email: "tom@tom",
    admin: "1",
    id_usuario: "2"
},
{
    email: "r@tom",
    admin: "0",
    id_usuario: "1"
}];
tabla.usuarios.push()

async function getUsuarios() {
    let response = await fetch('api/usuarios');
    let json = await response.json();
    tabla.usuarios = json;

}

let switches = document.querySelectorAll(".switch-admin");

console.log(switches);