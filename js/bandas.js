import Helper from './Helper.js';

document.addEventListener("DOMContentLoaded",function(){

let tablaBandas = new Vue({
    el:"#tabla-bandas",
    data: {
        bandas: []
    }
});
let helper = new Helper();

let btnAgregar = document.querySelector("#btn-agregar-banda");
btnAgregar.addEventListener("click",(event)=>
    helper.comprobarInputsVacios(event,agregarBanda)
);


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

    if (!response.ok)
        console.log("error de conexion");
    getBandas();
}

function getBandas() {
    fetch("api/bandas?evento=")
    .then(response => response.json())
    .then(bandas => {
        tablaBandas.bandas = bandas; 
    })
    .then(()=> helper.asignarIconosBorrar() )
    .catch(error => console.log(error));
}

getBandas();

let btnBorrar = document.querySelector("#btn-borrar");
btnBorrar.addEventListener("click",()=> borrarBanda(btnBorrar.getAttribute("name")) );
})