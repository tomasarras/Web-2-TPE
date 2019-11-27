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
                let id = btnAbrirPopup.getAttribute("name");
                let href = btnBorrar.getAttribute("src") + id;
                btnBorrar.setAttribute("href", href);
                btnBorrar.setAttribute("name", id);

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

    moverTabs(divTabs) {
        let tabs = divTabs.children;

        for (let i = 0; i < tabs.length; i++) {

            tabs[i].addEventListener("click", () => {
                for (let j = 0; j < tabs.length; j++)
                    tabs[j].classList.remove("active");

                tabs[i].classList.add("active");
                let bar = divTabs.nextElementSibling.firstElementChild;
                let porcentaje = 100 / tabs.length;
                porcentaje = porcentaje * i;
                bar.style.marginLeft = porcentaje + '%';
            });

        }
    }
}