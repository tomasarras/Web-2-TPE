document.addEventListener("DOMContentLoaded", function () {
    let btnsComprobar = document.querySelectorAll(".campos-vacios");
    btnsComprobar.forEach(btnComprobar => {
        
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
    });
        
    let btnsSeleccionar = document.querySelectorAll(".btn-seleccionar");

    btnsSeleccionar.forEach(btn => {
        btn.addEventListener("click",()=>{
            //elementos de la tabla
            let evento = btn.parentNode.previousElementSibling;
            let cantidad = evento.previousElementSibling;
            let anio = cantidad.previousElementSibling;
            let banda = anio.previousElementSibling;
            let id = btn.getAttribute("name");
            
            //elementos del formulario
            let tituloFormulario = document.querySelector("#nombre-banda");
            let inputBanda = document.querySelector("#input-banda");
            let inputAnio = document.querySelector("#input-anio");
            let inputCantidad = document.querySelector("#input-cantidad");
            let inputId = document.querySelector("#id_banda");
            let btnEliminar = document.querySelector("#btn-eliminar");
            let divMensaje = btnEliminar.previousElementSibling;
            let nombreEvento = document.querySelector("#nombre-evento");

            //asignacion de elementos de la tabla a los del formulario
            tituloFormulario.innerHTML = banda.innerHTML;
            inputBanda.value = banda.innerHTML;
            inputAnio.value = anio.innerHTML;
            inputCantidad.value = cantidad.innerHTML;
            inputId.value = id;
            
            let btnEditar = document.querySelector("#btn-editar");
            btnEditar.classList.remove("none");
            
            let botonera = btnEditar.parentNode;
            botonera.classList.add("centrar-contenido");
            
            if ( evento.getAttribute("name") == "sin-evento" ) { //si no tiene un evento asociado, se puede eliminar
                btnEliminar.classList.remove("none");// se muestra el btn eliminar
                divMensaje.classList.add("none");
            } else {
                btnEliminar.classList.add("none"); //se quita el btn eliminar
                divMensaje.classList.remove("none");
                nombreEvento.innerHTML = evento.innerHTML;
            }

        });
        
    });
  
});
