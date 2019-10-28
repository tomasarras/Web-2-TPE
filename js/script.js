document.addEventListener("DOMContentLoaded", function () {
    let btnComprobar = document.querySelector("#campos-vacios");

    btnComprobar.addEventListener("click", function (event) {
        let inputs = document.querySelectorAll(".campo-vacio");
        inputs.forEach(input => {
            let div = input.nextElementSibling;
            div.classList.add("oculto");

            if ( input.value == '' ) {
                div.classList.remove("oculto");
                event.preventDefault();
            }
        });

    });

    let btnsMostrar = document.querySelectorAll(".btn-mostrar");

    btnsMostrar.forEach(boton => {
        boton.addEventListener("click", ()=>{
            let div = document.querySelector("#contenedor-mostrar");
            div.classList.remove("none");
            boton.classList.add("none");
            let btnCerrar = div.firstElementChild.firstElementChild;
            btnCerrar.addEventListener("click",()=>{
                boton.classList.remove("none");
                div.classList.add("none");
            });
        });
    });

    /*
    let btnsEditar = document.querySelectorAll(".editar-tabla");

    btnsEditar.forEach(btn => {
        btn.addEventListener("click", ()=>{
            let div = document.querySelector("#formulario-admin");
            let btnCerrar = div.firstElementChild.firstChild;
            console.log(div);
            console.log(btnCerrar);
            btnCerrar.addEventListener("click",()=>{
                div.class
            });
            div.classList.remove("none");
        });
    });*/
    
});
