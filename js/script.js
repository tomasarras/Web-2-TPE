import Helper from './Helper.js';

document.addEventListener("DOMContentLoaded", () => {
    let helper = new Helper();

    let btnLogOut = document.querySelector("#logout");
    btnLogOut.addEventListener("click", helper.quitarToken);

    let btnsFormulario = document.querySelectorAll(".campos-vacios");
    btnsFormulario.forEach(btn =>
        btn.addEventListener("click", (event) => helper.comprobarInputsVacios(event))
    );

});