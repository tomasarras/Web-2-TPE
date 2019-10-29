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
        
    let btnsSeleccionarBanda = document.querySelectorAll(".btn-seleccionar-banda");
    
    btnsSeleccionarBanda.forEach(btn => {
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
    
    let btnsSeleccionarEvento = document.querySelectorAll(".btn-seleccionar-evento");
    btnsSeleccionarEvento.forEach(btn => {
        btn.addEventListener("click",()=>{
            //elementos de la tabla
            let tdBandaAsociada = btn.parentNode.previousElementSibling;
            let tdDetalle = tdBandaAsociada.previousElementSibling;
            let tdEvento = tdDetalle.previousElementSibling;
            let idEvento = tdEvento.getAttribute("name");
            let idBanda = tdBandaAsociada.getAttribute("name");
            
            //elementos del formulario
            let titulo = document.querySelector("#nombre-evento");
            let inputEvento = document.querySelector("#input-evento");
            let inputDetalle = document.querySelector("#input-detalle");
            let selectBandaAsociada = document.querySelector("#banda-asociada");
            let inputIdEvento = document.querySelector("#id_evento");

            titulo.innerHTML = tdEvento.innerHTML;
            inputEvento.value = tdEvento.innerHTML;
            inputDetalle.value = tdDetalle.innerHTML;
            inputIdEvento.value = idEvento;
            selectBandaAsociada.value = idBanda;

            let btnEditar = document.querySelector("#btn-editar");
            btnEditar.classList.remove("none");
            let btnEliminar = document.querySelector("#btn-eliminar");
            btnEliminar.classList.remove("none");
            let botonera = btnEditar.parentNode;
            botonera.classList.add("centrar-contenido");

        });
        
    });
  
});
