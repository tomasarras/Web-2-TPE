import Helper from './Helper.js';

document.addEventListener("DOMContentLoaded",()=>{
    let helper = new Helper();
    
    let btnLogin = document.querySelector("#btn-login");
    btnLogin.addEventListener("click",(e)=> {
        e.preventDefault();
        helper.comprobarInputsVacios(e,login);
    });
    
    async function login(){
        let user = document.querySelector("#email-usuario").value;
        let pass = document.querySelector("#password").value;
        
        let enviar = {
            "user": user,
            "password": pass
        };
        
        
        let response = await fetch("api/login",{
            "method": "POST",
            "headers" : { "Content-Type": "application/json" },
            "body": JSON.stringify(enviar)
        });

        if (response.ok) {
            let token = await response.json();
            helper.guardarToken(token);
            let form = document.querySelector("#form-login");
            form.submit();
            
        } else {
            let divError = document.querySelector("#mensaje-error");
            divError.classList.remove("none");
            let inputs = document.querySelectorAll(".campo-vacio");
            inputs.forEach(input => 
                input.addEventListener("click", ()=> divError.classList.add("none") )
            );
        }

    }

    


});