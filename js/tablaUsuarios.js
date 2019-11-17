"use strict";
let tabla = new Vue({
    el: "#vue-tabla-usuarios",
    data: {
        usuarios: []
    }
});

let id_user = document.querySelector("#user-id").value;

//agrega el efecto al hacer click en el switch
function moverSwitches() {
    let switches = document.querySelectorAll(".cb-value");
    switches.forEach(swich => {
        swich.addEventListener("click",()=>{
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

//agrega o quita permisos de admin
async function asignarSwitches() {
    let switches = document.querySelectorAll(".cb-value");
    switches.forEach(checkbox => {
        checkbox.addEventListener("click",()=>{
            let estado = checkbox.checked;
            //console.log(estado);
            if (checkbox.getAttribute("name") != id_user)
                cambiarAdmin(estado,checkbox.getAttribute("name"));
        });
    });
}

//envia a la api el usuario admin
async function cambiarAdmin(estado,id) {
    let json = {};
    if ( estado ) {
        json = { "admin": "1" }
    } else {
        json = { "admin": "0" }
    }
    
    await fetch('api/admin/usuarios/' + id,{
        "method" : "PUT",
        "headers" : { "Content-Type" : "application/json" },
        "body" : JSON.stringify(json)
    });

}
//carga los usuarios de la api a la tabla
function getUsuarios(callback) {
    fetch("api/usuarios")
    .then(response => response.json())
    .then(usuarios => {
        tabla.usuarios = usuarios;
    })
    .then(()=> callback() )
    .catch(error => console.log(error));
}



getUsuarios(()=>{
    moverSwitches();
    asignarSwitches();
    asignarIconosBorrar();
});;

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
            let href = btnBorrar.getAttribute("src") + btnAbrirPopup.getAttribute("name");
            btnBorrar.setAttribute("href",href);
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