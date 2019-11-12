<?php
    require_once('./Router.php');
    require_once('./api/UsuariosApiController.php');
    require_once('./api/ComentariosApiController.php');
    require_once('./api/BandasApiController.php');
    require_once('./api/EventosApiController.php');
    
    // CONSTANTES PARA RUTEO
    define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

    $router = new Router();

    // rutas
    $router->addRoute("/usuarios", "GET", "UsuariosApiController", "getUsuarios");
    $router->addRoute("/usuarios/:ID", "GET", "UsuariosApiController", "getUsuario");
    $router->addRoute("/usuarios/:ID", "DELETE", "UsuariosApiController", "eliminarUsuario");
    $router->addRoute("/usuarios", "POST", "UsuariosApiController", "agregarUsuario");
    $router->addRoute("/usuarios/:ID", "PUT", "UsuariosApiController", "cambiarAdmin");

    $router->addRoute("/bandas", "GET", "BandasApiController", "getBandas");
    $router->addRoute("/bandas/:ID", "GET", "BandasApiController", "getBanda");
    $router->addRoute("/bandas/:ID", "DELETE", "BandasApiController", "eliminarBanda");
    $router->addRoute("/bandas", "POST", "BandasApiController", "agregarBanda");
    $router->addRoute("/bandas/:ID", "PUT", "BandasApiController", "modificarBanda");

    $router->addRoute("/eventos", "GET", "EventosApiController", "getEventos");
    $router->addRoute("/eventos/:ID", "GET", "EventosApiController", "getEvento");
    $router->addRoute("/eventos/:ID", "DELETE", "EventosApiController", "eliminarEvento");
    $router->addRoute("/eventos", "POST", "EventosApiController", "agregarEvento");
    $router->addRoute("/eventos/:ID", "PUT", "EventosApiController", "modificarEvento");
    
    $router->addRoute("/comentarios/:ID", "GET", "ComentariosApiController", "getComentariosByEvento");
    $router->addRoute("/comentarios", "POST", "ComentariosApiController", "enviarComentario");

    //run
    $router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']); 