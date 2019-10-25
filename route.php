<?php

require_once "Controllers/bandascontroller.php";
require_once "Controllers/loginController.php";
require_once "Controllers/eventoscontroller.php";
require_once "Controllers/homecontroller.php";

$action = $_GET["action"];

$bandasController = new BandasController();
$loginController = new loginController();
$eventoscontroller = new eventoscontroller();
$homecontroller = new homecontroller();
if($action == ''){
    $homecontroller->Home();
}else{
    if (isset($action)){
        $partesURL = explode("/", $action);

        if($partesURL[0] == "tareas"){
            $bandasController->GetTareas();
        }elseif($partesURL[0] == "insertar") {
            $bandasController->InsertarTarea();
        }elseif($partesURL[0] == "finalizar") {
            $bandasController->FinalizarTarea($partesURL[1]);
        }elseif($partesURL[0] == "borrar") {
            $bandasController->BorrarTarea($partesURL[1]);
        }elseif($partesURL[0] == "noticias") {
            $bandasController->getNoticias();
        }elseif($partesURL[0] == "login") {
            $loginController->getLogin();
        }elseif($partesURL[0] == "NuevoUsuario") {
            $loginController->MostrarRegistro();
        }elseif($partesURL[0] == "guardaUsuario") {
            $loginController->guardaUsuario();
        }

    }
}


