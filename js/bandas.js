document.addEventListener("DOMContentLoaded",function(){

let tablaBandas = new Vue({
    el:"#tabla-bandas",
    data: {
        bandas: []
    }
});

let btnAgregar = document.querySelector("#btn-agregar-banda");
btnAgregar.addEventListener("click",agregarBanda);


async function borrarBanda(id) {
    await fetch("api/bandas/" + id,{
        "method": "DELETE"
    });

    let overlay = document.getElementById('overlay'),
    popup = document.getElementById('popup');

    overlay.classList.remove('active');
    popup.classList.remove('active');
    getBandas();
}
    
async function agregarBanda() {
    if (datosCorrectos()) {
        
        let json = {
            "banda": document.querySelector("#input-banda").value,
            "cantidad_canciones": document.querySelector("#input-cantidad").value,
            "anio": document.querySelector("#input-anio").value
        };
        
        let response = await fetch("api/bandas",{
            "method": "POST",
            "headers": { "Content-Type": "application/json" },
            "body": JSON.stringify(json)
        });

        getBandas();
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

function getBandas() {
    fetch("api/bandas?evento=")
    .then(response => response.json())
    .then(bandas => {
        tablaBandas.bandas = bandas; 
    })
    .then(listo => asignarIconosBorrar())
    .catch(error => console.log(error));
}

getBandas();

let btnBorrar = document.querySelector("#btn-borrar");
btnBorrar.addEventListener("click",function() { borrarBanda(btnBorrar.getAttribute("name")) });
})