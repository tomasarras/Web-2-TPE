<?php

require_once("Controllers/bandascontroller.php");
require_once("Controllers/loginController.php");
require_once("Controllers/eventoscontroller.php");
require_once("Controllers/homecontroller.php");
require_once("Controllers/adminController.php");
require_once('Router.php');

define("HOME","http://". $_SERVER["SERVER_NAME"].dirname($_SERVER["PHP_SELF"]."/"));
define("LOGIN","http://". $_SERVER["SERVER_NAME"].dirname($_SERVER["PHP_SELF"])."/login");
define("ADMINISTRAR_BANDAS","http://". $_SERVER["SERVER_NAME"].dirname($_SERVER["PHP_SELF"])."/admin/bandas");
define("ADMINISTRAR_EVENTOS","http://". $_SERVER["SERVER_NAME"].dirname($_SERVER["PHP_SELF"])."/admin/eventos");

$router = new Router();

$router->addRoute("login", "GET", "loginController", "getLogin");
$router->addRoute("login", "POST", "loginController", "verificarUser");
$router->addRoute("logout", "GET", "loginController", "logout");
$router->addRoute("NuevoUsuario", "GET", "loginController", "MostrarRegistro");
$router->addRoute("guardaUsuario", "POST", "loginController", "guardaUsuario");
$router->addRoute("admin", "GET", "adminController", "getAdmin");
$router->addRoute("admin/bandas", "POST", "adminController", "getBandas");
$router->addRoute("admin/bandas", "GET", "adminController", "getBandas");
$router->addRoute("admin/bandas/agregar", "POST", "adminController", "agregarBanda");
$router->addRoute("admin/bandas/editar/:ID", "GET", "adminController", "getBanda");
$router->addRoute("admin/bandas/editar/:ID", "POST", "adminController", "editarBanda");
$router->addRoute("admin/bandas/eliminar/:ID", "GET", "adminController", "eliminarBanda");
$router->addRoute("admin/eventos", "POST", "adminController", "getEventos");
$router->addRoute("admin/eventos", "GET", "adminController", "getEventos");
$router->addRoute("admin/eventos/agregar", "POST", "adminController", "agregarEvento");
$router->addRoute("admin/eventos/editar/:ID", "GET", "adminController", "getEvento");
$router->addRoute("admin/eventos/editar/:ID", "POST", "adminController", "editarEvento");
$router->addRoute("admin/eventos/eliminar/:ID", "GET", "adminController", "eliminarEvento");
$router->addRoute("filtrarEventos", "POST", "homecontroller", "filtrarPorEvento");
$router->addRoute("#", "POST", "homecontroller", "Home");
$router->addRoute("VerEvento/:ID", "GET", "homecontroller", "VerDetallesEvento");
$router->addRoute("MasDetallesBanda/:ID", "GET", "homecontroller", "VerDetallesBandas");

$router->setDefaultRoute("homeController", "Home");

$router->route($_GET['action'], $_SERVER['REQUEST_METHOD']); 
?>