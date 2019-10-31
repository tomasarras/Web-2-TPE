document.addEventListener("DOMContentLoaded", function () {
    let btnsComprobar = document.querySelectorAll(".campos-vacios");
    btnsComprobar.forEach(btnComprobar => {
        
        btnComprobar.addEventListener("click", function (event) {
            let inputs = document.querySelectorAll(".campo-vacio");
            inputs.forEach(input => {
                let div = input.nextElementSibling;
                div.classList.add("oculto");
                input.classList.remove("is-invalid");
                
                if ( input.value == '' ) {
                    div.classList.remove("oculto");
                    input.classList.add("is-invalid");
                    event.preventDefault();
                }
            });
            
        });
    });

    let botonesFormulario = document.querySelectorAll(".btns-formulario");
    botonesFormulario.forEach(btn => {
        btn.addEventListener("click",()=>{
            let formulario = document.querySelector("#btns-formulario");
            formulario.action = btn.getAttribute("src");
        });
    });

    let inputs = document.querySelectorAll("input");
    inputs.forEach(input => {
        input.addEventListener("click",()=>{
            input.classList.remove("is-invalid");
        });
    });
  
});
