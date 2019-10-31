<?php

require_once "Controllers/bandascontroller.php";
require_once "Controllers/loginController.php";
require_once "Controllers/eventoscontroller.php";
require_once "Controllers/homecontroller.php";
require_once "Controllers/adminController.php";

define("HOME","http://". $_SERVER["SERVER_NAME"].dirname($_SERVER["PHP_SELF"]."/"));
define("LOGIN","http://". $_SERVER["SERVER_NAME"].dirname($_SERVER["PHP_SELF"])."/login");
define("ADMINISTRAR_BANDAS","http://". $_SERVER["SERVER_NAME"].dirname($_SERVER["PHP_SELF"])."/admin/bandas");
define("ADMINISTRAR_EVENTOS","http://". $_SERVER["SERVER_NAME"].dirname($_SERVER["PHP_SELF"])."/admin/eventos");

$action = $_GET["action"];

$bandasController = new BandasController();
$loginController = new loginController();
$eventoscontroller = new eventoscontroller();
$homecontroller = new homecontroller();
$adminController = new AdminController();

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
            if( isset( $_POST['usuario']) && isset( $_POST['password'] ) ){
                $user = $_POST['usuario'];
                $pass = $_POST['password'];
                $loginController->verificarUser($user,$pass);
            } else {
                $loginController->getLogin();
            }
            
        }elseif($partesURL[0] == "NuevoUsuario") {
            $loginController->MostrarRegistro();
        }elseif($partesURL[0] == "guardaUsuario") {
            $loginController->guardaUsuario();
        }elseif($partesURL[0] == "logout") {
            $loginController->logout();
        } elseif($partesURL[0] == "admin") {

            if ( isset($partesURL[1]) ) {

                if ($partesURL[1] == "bandas") {

                    if ( isset($partesURL[2]) ) {

                        if ($partesURL[2] == "agregar") {
                            $adminController->agregarBanda();

                        } else if ($partesURL[2] == "editar") {
                            if ( isset($partesURL[3]) ) {
                                $adminController->editarBanda($partesURL[3]);
                            } else {
                                $adminController->getBandas();
                            }

                        } else if ($partesURL[2] == "eliminar") {
                            $adminController->eliminarBanda();
                        }

                    } else {
                        $adminController->getBandas();
                    }

                } else if ($partesURL[1] == "eventos"){

                    if ( isset($partesURL[2]) ) {

                        if ($partesURL[2] == "agregar") {
                            $adminController->agregarEvento();
                        } else if ($partesURL[2] == "editar") {
                            if ( isset($partesURL[3]) ) {
                                $adminController->editarEvento($partesURL[3]);
                            } else {
                                $adminController->getEventos();
                            }
                        } else if ($partesURL[2] == "eliminar") {
                            $adminController->eliminarEvento();
                        }

                    } else {
                        $adminController->getEventos();
                    }
                }

            } else {
                $adminController->getAdmin();
            }

        }elseif ($partesURL[0] == "filtrarEventos") {
            $homecontroller->filtrarPorEvento();
        }   elseif($partesURL[0]== "VerEvento"){
            $homecontroller->VerDetallesEvento($partesURL[1]);
        } elseif($partesURL[0]== "MasDetallesBanda"){
            $homecontroller->VerDetallesBandas($partesURL[1]);
        }

    }
}


