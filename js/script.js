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

    let tdsOrdenamiento = document.querySelectorAll(".js-orden");
    tdsOrdenamiento.forEach(td => {
        td.addEventListener("click",()=>{
            let formulario = document.querySelector("#js-form-tablas");
            let tipo = td.getAttribute("value");
            let inputEventos = formulario.firstElementChild;
            let inputBandas = inputEventos.nextElementSibling;
            let input;
            if ( tipo == "bandas" ) {
                input = inputBandas;
            } else {
                input = inputEventos
            }
            
            input.value = td.getAttribute("src");
            formulario.submit();
        });
        
    });
  
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
                let href = btnBorrar.getAttribute("src") + btnAbrirPopup.getAttribute("name");
                btnBorrar.setAttribute("href",href);
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

    asignarIconosBorrar();
});