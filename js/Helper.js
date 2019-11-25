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

    guardarToken(token) {
        document.cookie = "token=" + token;
    }

    getToken() {
        let cookies = document.cookie.split(";");
        let i = 0; 
        let token;
        while ( i < cookies.length) {
            if (cookies[i].search("token") == 0) {
                token = cookies[i].split("=")[1];
                i = cookies.length;
            }
            i++;
        }
        return token;
    }


    quitarToken() {
    let lista = document.cookie.split(";");
    for (let i = 0; i < lista.length; i++) {
        let igual = lista[i].indexOf("=");
        let nombre = lista[i].substring(0,igual);
        lista[i] = nombre+"="+""+";expires=1 Dec 2000 00:00:00 GMT"
        document.cookie = lista[i]
        } 
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