export default class Helper {

    comprobarInputsVacios(event, callback) {
        let error = false;

        let inputs = document.querySelectorAll(".campo-vacio");
        inputs.forEach(input => {
            input.classList.remove("is-invalid");
            if (input.value == '') {
                input.classList.add("is-invalid");
                error = true;
                event.preventDefault();
            }

            input.addEventListener("click", () => input.classList.remove("is-invalid"));

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
                btnBorrar.setAttribute("name", btnAbrirPopup.getAttribute("name"));
                let evento = btnAbrirPopup.parentNode.parentNode.firstElementChild;
                let spanEvento = document.querySelector("#js-nombre-elemento");
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