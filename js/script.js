import Helper from './Helper.js';

document.addEventListener("DOMContentLoaded", () => {
    let helper = new Helper();

    let btnsFormulario = document.querySelectorAll(".campos-vacios");
    btnsFormulario.forEach(btn =>
        btn.addEventListener("click", (event) => helper.comprobarInputsVacios(event))
    );
});