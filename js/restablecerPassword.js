let select = new Vue({
    el:"#pregunta-seguridad-vue",
    data: {
        pregunta : "",
        id: ""
    }
});

async function informacionValida(btn,callback) {
    let step = btn.getAttribute("value");

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

let buttons = document.querySelectorAll(".content button");

buttons.forEach(button => {
    button.addEventListener("click",()=>{
        if (button.getAttribute("value") == "back")
            previousStep(button);
        else {
            informacionValida(button,()=> nextStep(button) );
        }
    });
});

function hide(section,tab) {
    section.classList.remove("active");
    tab.classList.remove("active");
}

function show(section,tab) {
    section.classList.add("active");
    tab.classList.add("active");
}

function moveBar(tabNumber) {
    let bar = document.querySelector(".tabSlider .bar");
    let tabs = document.querySelectorAll(".tabs .tab");
    let porcentaje = 100 / tabs.length;
    porcentaje = porcentaje * tabNumber;
    bar.style.marginLeft = porcentaje + '%';
}
function previousStep(button) {
    let tabNumber = button.getAttribute("name") -1;
    let sections = document.querySelectorAll(".sections .section");
    let tabs = document.querySelectorAll(".tabs .tab");
    let thisSection = sections[tabNumber]
    let thisTab = tabs[tabNumber];
    
    hide(thisSection,thisTab);

    tabNumber--;
    let previousSection = sections[tabNumber];
    let previousTab = tabs[tabNumber];
    
    moveBar(tabNumber);
    show(previousSection,previousTab);
}

function nextStep(button) {
    let tabNumber = button.getAttribute("name") -1;
    let sections = document.querySelectorAll(".sections .section");
    let tabs = document.querySelectorAll(".tabs .tab");
    let thisSection = sections[tabNumber]
    let thisTab = tabs[tabNumber];
    
    hide(thisSection,thisTab);
    
    if (tabNumber == tabs.length -1)
        tabNumber = 0;
    else
        tabNumber++;

    
    let nextSection = sections[tabNumber];
    let nextTab = tabs[tabNumber];
    
    moveBar(tabNumber);
    show(nextSection,nextTab);
}


/*$(document).ready(function(){
    

    




    var steps = ['.res-step-one','.res-step-two','.res-step-three','.res-step-four'];
    var i = 1;
    $(".res-step-form .res-btn-orange").click( async function(){

        informacionValida($(this),pasarPagina );
    });

    // step back 
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

    // click from top bar steps 
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
});*/