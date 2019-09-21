document.addEventListener("DOMContentLoaded", function () {
    "use strict";
    let links = document.querySelectorAll(".links");
    for (let i = 0; i < links.length; i++) {
        links[i].addEventListener("click", async function () {
            let articulo = document.querySelector("#partial-render");
            let link;
            let script = function () { };

            switch (i) {
                case 0: link = "inicio.html"; break;
                case 1: link = "login.html"; script = CargarInicioSesion; break;
                case 2: link = "inicio.html"; break;
                case 3: link = "contacto.html"; script = CargarCaptcha; break;
                case 4: link = "listadobandas.html"; break;
                case 5: link = "tablainteractiva.html"; script = tabla; break;
            }

            let response = await fetch(link);
            let text = await response.text();

            articulo.innerHTML = text;
            script();
        });
    }





    function CargarCaptcha() {
        let almacenarnumero = "0";
        generarcaptcha();
        function generarcaptcha() {
            //alert("si");
            let imagen = document.querySelector("#imagencaptcha");// almaceno el parrafo en un variable
            let Captcha = Math.floor(Math.random() * 4 + 1);
            switch (Captcha) {
                case 1: imagen.src = "imgs/1.png";
                    almacenarnumero = "W93BX";
                    break;

                case 2: imagen.src = "imgs/2.png";
                    almacenarnumero = "RBSKW";
                    break;
                case 3: imagen.src = "imgs/3.png";
                    almacenarnumero = "TSMS9";
                    break;
                case 4: imagen.src = "imgs/4.png";
                    almacenarnumero = "R84CH";
                    break;
            }
        }
        function verificarCaptcha() {
            let capturarnumero = document.querySelector("#numerointroducido");
            if (almacenarnumero == capturarnumero.value) {
                alert('Formulario enviado Correctamente');
            }
            else {
                alert('Captcha Incorrecto');
            }
        }





        let bottonenviar = document.querySelector("#btn-enviar"); // agarra el boton
        bottonenviar.addEventListener("click", verificarCaptcha); // cada vez que le de click ejecutar verificarCaptcha

    }


    function tabla() {
        let url = "http://web-unicen.herokuapp.com/api/groups/";
        let grupo = "68";
        let coleccion = "bandas";
    
        async function ObtenerDatos(callback) {
            // carga los datos del servidor en el JSON y los carga a la tabla
            console.log("obtener datos");
    
            let response = await fetch(url + grupo + "/" + coleccion);
            let div = document.querySelector("#use-ajax");
    
            if (!response.ok) {
                div.innerHTML = "Error de conexion";
            } else {
                let json = await response.json();
    
                callback(json.bandas);
            }
        }
    
        function CargarTabla(objeto) {
            console.log("cargar tabla");
    
            for (let i = 0; i < objeto.length; i++) {
                AgregarEnTabla(objeto[i]);
            }
    
        }
    
        ObtenerDatos(CargarTabla);
    
        function VaciarServidor(objeto) {
    
            for (let i = 0; i < objeto.length; i++)
                EliminarFilaServidor(objeto[i]._id);
    
        }
    
        async function EliminarFilaServidor(id) {
            await fetch(url + grupo + "/" + coleccion + "/" + id, {
                "method": "DELETE"
            });
    
        }
    
    
        async function SubirFila(objeto, callback) {
            let div = document.querySelector("#use-ajax");
    
            objeto = { "thing": objeto };
    
            try {
                let enviar = await fetch(url + grupo + "/" + coleccion, {
                    "method": "POST",
                    "headers": { "Content-Type": "application/json" },
                    "body": JSON.stringify(objeto)
                });
    
                callback();
    
            } catch {
                div.innerHTML = "Error de conexion";
            }
        }
    
    
    
        async function ModificarFila(objeto, id, callback) {
            objeto = { "thing": objeto };
    
            let div = document.querySelector("#use-ajax");
    
            try {
                let enviar = await fetch(url + grupo + "/" + coleccion + "/" + id, {
                    "method": "PUT",
                    "headers": { "Content-Type": "application/json" },
                    "body": JSON.stringify(objeto)
                });
    
                callback();
            } catch {
                div.innerHTML = "Error de conexion";
            }
    
        }
    
    
    
        async function CrearBoton(id) {
            let tds = document.querySelectorAll("td");
            let boton = document.createElement("button");
            boton.name = id;
            boton.innerHTML = "Eliminar";
            boton.classList = "btn-eliminar btn btn-danger ocupar-ancho";
            boton.addEventListener('click', async () => {
                await EliminarFilaServidor(boton.name);
                VaciarTabla();
                await ObtenerDatos(CargarTabla);
            });
    
            tds[tds.length - 1].appendChild(boton);
        }
    
        //Agregar elementos a la tabla
        let btn_agregar_tabla = document.querySelector("#btn-agregar-tabla");
        btn_agregar_tabla.addEventListener("click", async function () {
            let table = document.querySelectorAll("td");
            let objeto;
            let id;

            for (let i = 0; i < table.length; i = i + 3){
                objeto = {
                    "banda": table[i].innerHTML,
                    "ultimoconcierto": table[i + 1].innerHTML
                };

                id = table[i+2].firstChild.name;

                ModificarFila(objeto, id, ()=>{});
            }
    /*
            let inputs = document.querySelectorAll(".td-input");
            let table = document.querySelectorAll("td");
    
            for (let i = 0; i < inputs.length - 2; i = i + 2) {
                ModificarFila({
                    "banda": inputs[i].value,
                    "ultimoconcierto": inputs[i + 1].value
                }, inputs[i].name, function () { });
            }
    
            ModificarFila({
                "banda": inputs[inputs.length - 2].value,
                "ultimoconcierto": inputs[inputs.length - 1].value
            }, inputs[inputs.length - 2].name, function () {
                VaciarTabla();
                ObtenerDatos(CargarTabla);
            });
    */
        });
    
    
        let btn_filtrar = document.getElementById("filtrar-btn");
        btn_filtrar.addEventListener("click", function (objeto) {
            VaciarTabla();
            ObtenerDatos(Filtrar);
        });
    
    
        function Filtrar(objeto) {
            console.log(objeto);
            let palabra = document.querySelector("#inputfiltro").value;
    
            for (let i = 0; i < objeto.length; i++) {
                if ((palabra === objeto[i].thing.banda) || (palabra === objeto[i].thing.ultimoconcierto)) {
                    AgregarEnTabla(objeto[i]);
                }
            }
        }
    
        function AgregarEnTabla(objeto) {
    
            let banda = objeto.thing.banda;
            let ultimoconcierto = objeto.thing.ultimoconcierto;
            let id = objeto._id;
    
            let table = document.querySelector(".tabladidactica");
            let row = table.insertRow(table.rows.length);
            let elemento_uno = row.insertCell(0);
            let elemento_dos = row.insertCell(1);
            let elemento_tres = row.insertCell(2);
            /*
            let tds = document.querySelectorAll("td");
            let input_uno = document.createElement("input");
            let input_dos = document.createElement("input");
            let br = document.createElement("br");
            input_uno.className = "td-input";
            input_dos.className = "td-input";
            input_uno.name = id;
            input_dos.name = id;
            input_uno.value = banda;
            input_dos.value = ultimoconcierto;
            div_cargar_tabla.appendChild(input_uno);
            div_cargar_tabla.appendChild(input_dos);
            div_cargar_tabla.appendChild(br);
            let div_cargar_tabla = document.querySelector(".cargar-tabla");
            */

    
    
    
    
            elemento_uno.innerHTML = banda;
            elemento_dos.innerHTML = ultimoconcierto;

            elemento_uno.contentEditable = "true";
            elemento_dos.contentEditable = "true";
    
            elemento_uno.className = "grande";
            elemento_dos.className = "grande";
            elemento_tres.className = "grande";
    
            CrearBoton(id);
        }
    
    
        //vaciar tabla
        let btn_vaciar_tabla = document.querySelector("#btnvaciartabla");
        btn_vaciar_tabla.addEventListener("click", function () {
            console.log("btn vaciar");
            ObtenerDatos(VaciarServidor);
            //ObtenerDatos();
            VaciarTabla();
    
        });
    
        function VaciarTabla() {
            //let div_inputs = document.querySelector(".cargar-tabla");
            let div_tabla = document.querySelector(".tabladidactica");
    
            //div_inputs.innerHTML = "";
            div_tabla.innerHTML =   '<tr><th scope="col" class="th">Banda</th><th scope="col" class="th">Ultimo Concierto</th><th scope="col" class="th">Borrar</th></tr>';
        }
    
    
        // crear elemento
        let btn_elemento = document.querySelector("#btn-enviarEl");
        btn_elemento.addEventListener("click", function () {
            CrearFila(function () {
                VaciarTabla()
                ObtenerDatos(CargarTabla);
            });
        });
    
    
        // crear 3 elementos
        let btn_elementos = document.querySelector("#agregartres");
        btn_elementos.addEventListener("click", async function () {
            console.log("boton 3 elem.");
    
            for (let i = 0; i < 2; i++) {
                CrearFila(function () { });
            }
    
    
            CrearFila(function () {
                VaciarTabla()
                ObtenerDatos(CargarTabla);
            });
    
        });
    
        function CrearFila(callback) {
            let objeto = {};
            let inputs = document.querySelectorAll(".inputagregar");
            objeto.banda = inputs[0].value;
            objeto.ultimoconcierto = inputs[1].value;
            SubirFila(objeto, callback);
        }
    }

    function CargarInicioSesion(){
        let linkRegistrarse = document.querySelector("#link-registrarse");
        linkRegistrarse.addEventListener("click", async ()=>{
            let articulo = document.querySelector("#partial-render");
            let response = await fetch("registro.html");
            let text = await response.text();

            articulo.innerHTML = text;
        });
    }

    });
