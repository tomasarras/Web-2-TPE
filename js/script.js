import Helper from './Helper.js';

document.addEventListener("DOMContentLoaded", () => {
    let helper = new Helper();

    try {
        let btnLogOut = document.querySelector("#logout");
        btnLogOut.addEventListener("click", helper.quitarToken);
    } catch {
        
    }

    let btnsFormulario = document.querySelectorAll(".campos-vacios");
    btnsFormulario.forEach(btn =>
        btn.addEventListener("click", (event) => helper.comprobarInputsVacios(event))
    );

});