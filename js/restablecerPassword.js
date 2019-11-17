$(document).ready(function(){
    let select = new Vue({
        el:"#pregunta-seguridad-vue",
        data: {
            pregunta : "",
            id: ""
        }
    });

    async function informacionValida(btn,callback) {
        let step = btn.attr("value");
        let valido = false;

        if (step == "email") {
            let email = document.querySelector("#email");

            try {
                let response = await fetch("api/usuarios/email/" + email.value);
                let json = await response.json();
                select.pregunta = json.pregunta;
                select.id = json.id;
                callback(btn);
            } catch(e) {
                email.classList.add("is-invalid");
            }
                
        }

        if (step == "respuesta") {
            let respuesta = document.querySelector("#respuesta");
            let json = { "respuesta": respuesta.value };

            let response = await fetch("api/usuarios/" + select.id + "/verificar-respuesta",{
                "method": "POST",
                "headers": { "Content-Type":"application/json" },
                "body": JSON.stringify(json)
            });

            if (response.ok)
                callback(btn);
            else
                respuesta.classList.add("is-invalid");
        }

        if (step == "password") {
            //verificar que coincidan
            let passwordUno = document.querySelector("#password").value;
            let passwordDos = document.querySelector("#password-2");

            if (passwordUno === passwordDos.value && passwordUno != '') {

                let json = { "password" : passwordUno };
                fetch("api/usuarios/" + select.id,{
                    "method" : "PUT",
                    "headers": { "Content-Type": "application/json" },
                    "body": JSON.stringify(json)
                });
                callback(btn);
            } else 
                passwordDos.classList.add("is-invalid");
        }
    }






    async function registrarUsuario(event) {
        let form = document.querySelector("#form-registro");
        event.preventDefault();
    
        let password1 = document.querySelector("#password-1");
        let password2 = document.querySelector("#password-2");
    
        if ( datosCorrectos() && password1.value != '' && password2.value != '' ) {
            if ( password1.value === password2.value ) {
                let json = {
                    "email": document.querySelector("#email").value,
                    "password": password1.value,
                    "usuario": document.querySelector("#user_name").value,
                    "pregunta": document.querySelector("#pregunta").value,
                    "respuesta": document.querySelector("#respuesta").value
                };
    
    
                let response = await fetch("api/usuarios",{
                    "method": "POST",
                    "headers": { "Content-Type": "application/json" },
                    "body": JSON.stringify(json)
                });
    
                if (response.ok)
                    form.submit();
                else {
                    let text = await response.text();
                    if (text == '"El email ya existe"')
                        errorEmail();
                    
                    if (text == '"El usuario ya existe"')
                        errorUsuario();
                }
    
            } else
                password2.classList.add("is-invalid");
    
        } else {
    
        }
        
    }







    var steps = ['.res-step-one','.res-step-two','.res-step-three','.res-step-four'];
    var i = 1;
    $(".res-step-form .res-btn-orange").click( async function(){

        informacionValida($(this),pasarPagina );
    });

    /* step back */
    $(".res-step-form .res-btn-gray").click(function(){
        var getClass = $(this).attr('data-class');
        $(".res-steps").removeClass('active');
        i--;
        $(steps[i-1]).addClass('active');
        $(getClass).prev().css('left','-150%')
        $(getClass).animate({
            left: '150%'
        }, 500);
        $(getClass).prev().animate({
            left: '0%'
        }, 500)
    });

    /* click from top bar steps */
    $('.res-step-one').click(function(){
        if(!$(this).hasClass('active')){
            $(".res-steps").removeClass('active');
            i = 0;
            $(steps[i]).addClass('active');
            i++;
            $('.res-form-one').css('left','-150%');
            $('.res-form-two, .res-form-three, .res-form-four').animate({
                left: '150%'
            }, 500);
            $('.res-form-one').animate({
                left: '0%'
            }, 500);
        }
    });

    $('.res-step-two').click(function(){
        if(!$(this).hasClass('active')){
            $(".res-steps").removeClass('active');
            i = 1;
            $(steps[i]).addClass('active');
            i++;
            $('.res-form-two').css('left','-150%');
            $('.res-form-one, .res-form-three, .res-form-four').animate({
                left: '150%'
            }, 500);
            $('.res-form-two').animate({
                left: '0%'
            }, 500);
        }
    });

    $('.res-step-three').click(function(){
        if(!$(this).hasClass('active')){
            $(".res-steps").removeClass('active');
            i = 2;
            $(steps[i]).addClass('active');
            i++;
            $('.res-form-three').css('left','-150%');
            $('.res-form-one, .res-form-two, .res-form-four').animate({
                left: '150%'
            }, 500);
            $('.res-form-three').animate({
                left: '0%'
            }, 500);
        }
    });

    $('.res-step-four').click(function(){
        if(!$(this).hasClass('active')){
            $(".res-steps").removeClass('active');
            i = 3;
            $(steps[i]).addClass('active');
            i++;
            $('.res-form-four').css('left','-150%');
            $('.res-form-one, .res-form-two, .res-form-three').animate({
                left: '150%'
            }, 500);
            $('.res-form-four').animate({
                left: '0%'
            }, 500);
        }
    });

    function pasarPagina(btn) {
        var getClass = btn.attr('data-class');
        $(".res-steps").removeClass('active');
        $(steps[i]).addClass('active');
        i++;
        if(getClass != ".res-form-four"){
            $(getClass).animate({
                left: '-150%'
            }, 500, function(){
                $(getClass).css('left', '150%');
            });
            $(getClass).next().animate({
                left: '0%'
            }, 500, function(){
                btn.css('display','block');
            });
        }
    }
});