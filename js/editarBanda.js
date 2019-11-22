import Helper from './Helper.js';

document.addEventListener("DOMContentLoaded",()=>{
let helper = new Helper();

    
async function editarBanda() {
    let id_banda = document.querySelector("#id_banda").value;
    let json = {
        "anio": document.querySelector("#input-anio").value,
        "cantidad_canciones": document.querySelector("#input-cantidad").value,
        "banda": document.querySelector("#input-banda").value,
        "id_banda": id_banda
    }

    await fetch("api/bandas/" + id_banda,{
        "method" : "PUT",
        "headers" : { "Content-Type" : "application/json" },
        "body" : JSON.stringify(json)
    });
}


let btnEditar = document.querySelector("#btn-editar");
btnEditar.addEventListener("click",(event)=> helper.comprobarInputsVacios(event,editarBanda) );

});