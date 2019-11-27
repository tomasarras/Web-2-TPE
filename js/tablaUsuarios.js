import Helper from './Helper.js';

document.addEventListener("DOMContentLoaded", () => {
    let helper = new Helper();
    let id_user = document.querySelector("#user-id").value;
    resaltarUsuario();
    moverSwitches();

    //agrega el efecto al hacer click en el switch
    function moverSwitches() {
        let switches = document.querySelectorAll(".cb-value");
        switches.forEach(swich => {
            swich.addEventListener("click", () => {
                if (swich.getAttribute("name") != id_user) {
                    let mainParent = swich.parentNode;
                    if (swich.checked)
                        mainParent.classList.add("active");
                    else
                        mainParent.classList.remove("active");
                    let url = swich.nextElementSibling.getAttribute("href");
                    location.href = url;
                }
            });
        });
    }

    function resaltarUsuario(){
        let trs = document.querySelectorAll(".ids_usuarios");
        trs.forEach(tr => {
            let id = tr.getAttribute("name");
            if (id == id_user) {
                let tdUsuario = tr.children;
                tdUsuario[0].classList.add("resaltar");
                tdUsuario[1].classList.add("resaltar");
                let switc = tdUsuario[2].firstElementChild.firstElementChild;
                console.log(switc)
                switc.classList.add("not-link");
                tdUsuario[3].classList.remove("none");
                tdUsuario[4].classList.add("none");

            }

        });
    }
});