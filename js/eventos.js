document.addEventListener("DOMContentLoaded",function() {
let tablaEventos = new Vue({
    el: "#tabla-eventos",
    data: {
        eventos: []
    }
})

let btnAgregarEvento = document.querySelector("#btn-agregar-evento");
btnAgregarEvento.addEventListener("click",agregarEvento);

async function borrarEvento(id) {
    console.log(id)
    await fetch("api/eventos/" + id,{
        "method": "DELETE"
    });

    let overlay = document.getElementById('overlay'),
    popup = document.getElementById('popup');

    overlay.classList.remove('active');
    popup.classList.remove('active');
    getEventos();
}

async function agregarEvento() {
    if (datosCorrectos()) {
        
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
    }
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


//verifica que los inputs no esten vacios
function datosCorrectos() {
    let inputs = document.querySelectorAll(".campo-vacio");
    let valido = true;
    inputs.forEach(input => {
        let div = input.nextElementSibling;
        div.classList.add("oculto");
        input.classList.remove("is-invalid");
        
        if ( input.value == '' ) {
            div.classList.remove("oculto");
            input.classList.add("is-invalid");
            valido = false;
        }
    });

    return valido;
}


function getEventos() {
    fetch("api/eventos?bandas=")
    .then(response => response.json())
    .then(eventos => {
        tablaEventos.eventos = eventos; 
    })
    .then(()=> asignarIconosBorrar() )
    .catch(error => console.log(error));
}



getEventos();

let btnBorrar = document.querySelector("#btn-borrar");
btnBorrar.addEventListener("click",function() { borrarEvento(btnBorrar.getAttribute("name")) });


});