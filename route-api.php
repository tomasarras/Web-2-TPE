<?php
    require_once('./Router.php');
    require_once('./api/ComentariosApiController.php');
    require_once('./api/UsuariosApiController.php');
    
    // CONSTANTES PARA RUTEO
    define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

    $router = new Router();

    // rutas
    $router->addRoute("/usuarios/:ID", "PUT", "UsuariosApiController", "cambiarPassword");
    $router->addRoute("/usuarios/email/:EMAIL", "GET", "UsuariosApiController", "getUsuarioByEmail");
    $router->addRoute("/usuarios/nombre/:NOMBRE", "GET", "UsuariosApiController", "getUsuarioByNombre");
    $router->addRoute("/usuarios/:ID/verificar-respuesta", "POST", "UsuariosApiController", "verificarRespuesta");


    $router->addRoute("/comentarios/:ID", "GET", "ComentariosApiController", "getComentario");
    $router->addRoute("/comentarios/:ID_COMENTARIO", "DELETE", "ComentariosApiController", "borrarComentario");
    $router->addRoute("/eventos/:ID_EVENTO/comentarios", "POST", "ComentariosApiController", "enviarComentario");
    $router->addRoute("/eventos/:ID_EVENTO/comentarios", "GET", "ComentariosApiController", "getComentarios");
    //run
    $router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']); 