<?php
    require_once('./Router.php');
    require_once('./api/UsuariosApiController.php');
    require_once('./api/ComentariosApiController.php');
    
    // CONSTANTES PARA RUTEO
    define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

    $router = new Router();

    // rutas
    $router->addRoute("/usuarios", "GET", "UsuariosApiController", "getUsuarios");
    $router->addRoute("/usuarios/:ID", "GET", "UsuariosApiController", "getUsuario");
    $router->addRoute("/usuarios/:ID", "DELETE", "UsuariosApiController", "eliminarUsuario");
    $router->addRoute("/usuarios", "POST", "UsuariosApiController", "agregarUsuario");
    $router->addRoute("/usuarios/:ID", "PUT", "UsuariosApiController", "cambiarAdmin");
    $router->addRoute("/comentarios/:ID", "GET", "ComentariosApiController", "getComentariosByEvento");
    $router->addRoute("/comentarios", "POST", "ComentariosApiController", "enviarComentario");

    //run
    $router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']); 