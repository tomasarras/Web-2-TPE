document.addEventListener("DOMContentLoaded", function () {

    let btnLogueo = document.querySelector("#btn-logueo");
    btnLogueo.addEventListener("click", function (event) {
        let password = document.querySelector("#password").value;
        let usuario = document.querySelector("#usuario").value;
        let divPassword = document.querySelector("#error-password");
        
        let divUsuario = document.querySelector("#error-usuario");
        divUsuario.innerHTML = '';
        divPassword.innerHTML = '';
        
        if ( password == '' ) {
            let mensaje = 'Error, la contraseña no puede quedar vacia';
            divPassword.innerHTML = mensaje;
            event.preventDefault();
        }
        
        if ( usuario == '' ) {
            let mensaje = 'Error, el nombre de usuario no puede quedar vacio';
            divUsuario.innerHTML = mensaje;
            event.preventDefault();
        }
    });
    
});
