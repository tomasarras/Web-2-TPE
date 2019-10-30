<?php
require_once "./Views/loginView.php";
require_once "AuthHelper.php";
require_once "./Model/loginModel.php";

class loginController {

    private $view;
    private $model;
    private $titulo;
    private $authHelper;
    function __construct(){
        $this->view = new loginView();
        $this->authHelper = new AuthHelper();
        $this->model = new loginModel();
        $this->titulo = "La maquina del Metal";
    }

    function verificarUser($user,$pass) {
    
        $usuario = $this->model->getUser($user);

        if ($usuario) {
            $hash = $usuario->contraseña;
            
            if ( password_verify($pass, $hash) ){
                session_start();
                $_SESSION["id_usuario"] = $usuario->id_usuario;
                $_SESSION["nombre"] = $usuario->nombre;
                header("Location: ". HOME);
                die();
            }

        }

        $this->view->getLogin($this->titulo,false,"Usario o contraseña incorrectos");
    
    }

    function getLogin(){
        $logueado = $this->isLoged();
        if ( !$logueado ) {
            $this->view->getLogin($this->titulo, $logueado);
        } else {
            header("Location: ". HOME);
            die();
        }
        
    }

    function guardaUsuario(){
        //$this->view->getRegistro($this->titulo);
        $user = $_POST["user"];
        $pass = $_POST["password"];
        $existe = $this->model->getUser($user);
        $logeado = $this->authHelper->isLoged();
        if (empty($user) || empty($pass)){
            $this->view->getRegistro($logeado,"Que te haces el hacker la concha de tu madre");
        } else {
            // buscamos si existe el usuario en la db y llamamos al model para comprobar
            if ($existe) { // si existe ..
                $this->view->getRegistro(false,"Este nombre ya existe");
                // ya existe (mensaje);
            }else{    
                $id = $this->model->registrarse($user,$pass);
                session_start();
                $_SESSION["id_usuario"] = $id;
                header("Location: ". HOME);
                die();
            } 
        }
    }

    private function isLoged(){
        session_start();
        return isset($_SESSION["id_usuario"]);
    }

    function logout() {
        session_start();
        session_destroy();
        header("Location: ". HOME);
        die();
    }


    function MostrarRegistro(){

        $logueado = $this->isLoged();

        if ( !$logueado ) {
            $this->view->MostrarRegistro($logueado);
        } else {
            header("Location: ". HOME);
        die();
    }
   }
}
?>