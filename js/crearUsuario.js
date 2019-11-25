import Helper from './Helper.js';

document.addEventListener("DOMContentLoaded", () => {
    let helper = new Helper();

    function errorEmail() {
        let mensajeEmail = document.querySelector("#email-existente");
        mensajeEmail.classList.remove("none");
        let inputEmail = document.querySelector("#email");
        inputEmail.addEventListener("click", () => mensajeEmail.classList.add("none"));
    }

    function errorUsuario() {
        let usuarioExistente = document.querySelector("#usuario-existente");
        usuarioExistente.classList.remove("none");
        let inputUsuario = document.querySelector("#user_name");
        inputUsuario.addEventListener("click", () => usuarioExistente.classList.add("none"));
    }

    async function registrarUsuario(event) {
        let form = document.querySelector("#form-registro");

        let password1 = document.querySelector("#password-1");
        let password2 = document.querySelector("#password-2");

        let email = document.querySelector("#email");
        if (email.value.search("@") != -1) {
            event.preventDefault();

            if (password1.value === password2.value && password1.value != '') {
                let userName = document.querySelector("#user_name").value;
                let pregunta = document.querySelector("#pregunta").value;
                let respuesta = document.querySelector("#respuesta").value;

                let enviar = {
                    "nombre": userName,
                    "email": email.value,
                    "password": password1.value,
                    "pregunta": pregunta,
                    "respuesta": respuesta,
                };

                
                let response = await fetch("api/signUp",{
                    "method": "POST",
                    "headers" : { "Content-Type": "application/json" },
                    "body": JSON.stringify(enviar)
                });

                if (response.ok) {
                    let token = await response.json();
                    helper.guardarToken(token);
                    let emailUser = document.querySelector("#email-usuario");
                    emailUser.value = userName;
                    form.submit();
                } else {
                    let error = await response.text();
                    if (error == '"El email ya existe"')
                        errorEmail();
                    else if (error == '"El usuario ya existe"')
                        errorUsuario();
                }


            } else
                password2.classList.add("is-invalid");
        }
    }


    let btnRegistrarse = document.querySelector("#btn-registrarse");
    btnRegistrarse.addEventListener("click", (event) => {
        helper.comprobarInputsVacios(event, () => registrarUsuario(event));
    });

});