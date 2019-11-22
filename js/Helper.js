export default class Helper {

    comprobarInputsVacios(event,callback) {
        let error = false;
        let btnsComprobar = document.querySelectorAll(".campos-vacios");
        btnsComprobar.forEach(btn => {
            btn.addEventListener("click", () => {//comprobar event
            
            let inputs = document.querySelectorAll(".campo-vacio");
            inputs.forEach(input => {
                //let div = input.nextElementSibling;
                //div.classList.add("oculto");
                input.classList.remove("is-invalid");
                
                if ( input.value == '' ) {
                    //div.classList.remove("oculto");
                    input.classList.add("is-invalid");
                    error = true;
                    event.preventDefault();
                }

                input.addEventListener("click", ()=> input.classList.remove("is-invalid") );

                });
            });
        });
        if (!error)
            callback();
    }
    
    asignarIconosBorrar() {
        let btnsAbrirPopup = document.querySelectorAll('.btns-abrir-popup');
        let overlay = document.getElementById('overlay'),
        popup = document.getElementById('popup'),
        btnCerrarpopup = document.querySelectorAll('.js-cerrar');
        
        
        btnsAbrirPopup.forEach(btnAbrirPopup => {
            
            btnAbrirPopup.addEventListener('click', function() {
                overlay.classList.add('active');
                popup.classList.add('active');
                let btnBorrar = document.querySelector("#btn-borrar");
                btnBorrar.setAttribute("name",btnAbrirPopup.getAttribute("name"));
                //let href = btnBorrar.getAttribute("src") + btnAbrirPopup.getAttribute("name");
                //btnBorrar.setAttribute("href",href);
                let evento = btnAbrirPopup.parentNode.parentNode.firstElementChild;
                let spanEvento = document.querySelector("#js-nombre-evento");//cambbiar id
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
}