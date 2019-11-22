document.addEventListener("DOMContentLoaded",()=>{

function errorEmail() {
    let mensajeEmail = document.querySelector("#email-existente");
    mensajeEmail.classList.remove("none");
    let inputEmail = document.querySelector("#email");
    inputEmail.addEventListener("click",()=> mensajeEmail.classList.add("none"));
}

function errorUsuario() {
    let usuarioExistente = document.querySelector("#usuario-existente");
    usuarioExistente.classList.remove("none");
    let inputUsuario = document.querySelector("#user_name");
    inputUsuario.addEventListener("click",()=> usuarioExistente.classList.add("none"));
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


async function registrarUsuario(event) {
    let form = document.querySelector("#form-registro");
    
    let password1 = document.querySelector("#password-1");
    let password2 = document.querySelector("#password-2");

    let email = document.querySelector("#email").value;
    
    if (email.search("@") != -1) {

        if ( datosCorrectos() ) {
            if ( password1.value === password2.value && password1.value != '' ) {
                event.preventDefault();
                /*let json = {
                    "email": document.querySelector("#email").value,
                    "password": password1.value,
                    "usuario": document.querySelector("#user_name").value,
                    "pregunta": document.querySelector("#pregunta").value,
                    "respuesta": document.querySelector("#respuesta").value
                };*/
                /*
                
                let response = await fetch("api/usuarios",{
                    "method": "POST",
                    "headers": { "Content-Type": "application/json" },
                    "body": JSON.stringify(json)
                });*/
                let userName = document.querySelector("#user_name").value;
                let existeEmail = await fetch("api/usuarios/email/" + email);
                let existeUsuario = await fetch("api/usuarios/nombre/" + userName);

                if (existeEmail.ok) //si existe el email, no se puede registrar
                    errorEmail();

                if (existeUsuario.ok) // si existe el usuario no se puede registrar
                    errorUsuario();
                
                if (!existeEmail.ok && !existeUsuario.ok)
                    form.submit();// si no existe el email y el usuario, se puede registrar

            } else {
                password2.classList.add("is-invalid");
                event.preventDefault();
            }

        } else 
            event.preventDefault();
    }
}


let btnRegistrarse = document.querySelector("#btn-registrarse");
btnRegistrarse.addEventListener("click",function(event){ registrarUsuario(event) });
});