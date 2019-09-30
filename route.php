<?php

require_once "Controllers/bandascontroller.php";

$action = $_GET["action"];
define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');
$controller = new BandasController();

if($action == ''){
    $controller->Home(); 
}else{
    if (isset($action)){
        $partesURL = explode("/", $action);

        if($partesURL[0] == "tareas"){
            $controller->GetTareas();
        }elseif($partesURL[0] == "insertar") {
            $controller->InsertarTarea();
        }elseif($partesURL[0] == "finalizar") {
            $controller->FinalizarTarea($partesURL[1]);
        }elseif($partesURL[0] == "borrar") {
            $controller->BorrarTarea($partesURL[1]);
        }
    }
}

