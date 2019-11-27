<?php
    require_once('./Router.php');
    require_once('./api/UsuariosApiController.php');
    require_once('./api/ComentariosApiController.php');
    require_once('./api/BandasApiController.php');
    require_once('./api/EventosApiController.php');
    
    // CONSTANTES PARA RUTEO
    define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');
    define('TOKEN_KEY','3568793f28c7n8y$"%&SDF&A"!E"R/(6d778218"%$&CF&"F');

    $router = new Router();

    // rutas
    $router->addRoute("/signUp", "POST", "UsuariosApiController", "signUp");
    $router->addRoute("/login", "POST", "UsuariosApiController", "logIn");

    $router->addRoute("/usuarios", "GET", "UsuariosApiController", "getUsuarios");
    $router->addRoute("/usuarios/:ID", "GET", "UsuariosApiController", "getUsuario");
    $router->addRoute("/usuarios/:ID", "DELETE", "UsuariosApiController", "eliminarUsuario");
    $router->addRoute("/admin/usuarios/:ID", "PUT", "UsuariosApiController", "cambiarAdmin");

    $router->addRoute("/usuarios/:ID/verificar-respuesta", "POST", "UsuariosApiController", "verificarRespuesta");
    $router->addRoute("/usuarios/:ID", "PUT", "UsuariosApiController", "cambiarPassword");
    $router->addRoute("/usuarios/email/:EMAIL", "GET", "UsuariosApiController", "getUsuarioByEmail");
    $router->addRoute("/usuarios/nombre/:NOMBRE", "GET", "UsuariosApiController", "getUsuarioByNombre");
    
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
    
    $router->addRoute("/comentarios/:ID", "GET", "ComentariosApiController", "getComentario");
    $router->addRoute("/comentarios/:ID_COMENTARIO", "DELETE", "ComentariosApiController", "borrarComentario");
    $router->addRoute("/eventos/:ID_EVENTO/comentarios", "POST", "ComentariosApiController", "enviarComentario");
    $router->addRoute("/eventos/:ID_EVENTO/comentarios", "GET", "ComentariosApiController", "getComentarios");

    //run
    $router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']); 