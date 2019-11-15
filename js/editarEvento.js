document.addEventListener("DOMContentLoaded",()=>{

    
async function editarEvento() {
    if (datosCorrectos()) {
        let id_evento = document.querySelector("#id_evento").value;
        let json = {
            "ciudad": document.querySelector("#input-ciudad").value,
            "detalle": document.querySelector("#input-detalle").value,
            "evento": document.querySelector("#input-evento").value,
            "id_banda": document.querySelector("#banda-asociada").value,
            "id_evento": id_evento
        }

        await fetch("api/eventos/" + id_evento,{
            "method" : "PUT",
            "headers" : { "Content-Type" : "application/json" },
            "body" : JSON.stringify(json)
        });
    }
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

let btnEditar = document.querySelector("#btn-editar");
btnEditar.addEventListener("click",editarEvento);

});