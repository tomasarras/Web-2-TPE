document.addEventListener("DOMContentLoaded",()=>{

    
async function editarBanda() {
    if (datosCorrectos()) {
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
btnEditar.addEventListener("click",editarBanda);

});