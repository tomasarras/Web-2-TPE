<?php
require_once "./Views/loginView.php";
require_once "./Model/loginModel.php";
require_once "AuthHelper.php";

class loginController {

    private $view;
    private $model;
    private $titulo;
    private $AuthHelper;

    function __construct(){
        $this->view = new loginView();
        $this->model = new loginModel();
        $this->AuthHelper = new AuthHelper();
        $this->titulo = "La maquina del Metal";
    }

    function verificarUser($user,$pass) {
    
        $usuario = $this->model->getUser($user);

        if ($usuario) {
            $hash = $usuario->contraseña;
            
            if ( password_verify($pass, $hash) ){
                session_start();
                $_SESSION["id_usuario"] = $usuario->id_usuario;
                header("Location: ". HOME);
                die();
            }

        }

        $this->view->getLogin($this->titulo,false,"Usario o contraseña incorrectos");
    
    }

    function getLogin(){
        $logueado = $this->AuthHelper->isLoged();
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

        // buscamos si existe el usuario en la db y llamamos al model para comprobar
        if (isset($existe->nombre)) { // si existe ..
                $this->view->getRegistro(false,"Este nombre ya existe");
             // ya existe (mensaje);
        } else {    
            $id = $this->model->registrarse($user,$pass);
            session_start();
            $_SESSION["id_usuario"] = $id;
            header("Location: ". HOME);
            die();
        } 
    }


    function MostrarRegistro(){

        $logueado = $this->AuthHelper->isLoged();

        if ( !$logueado ) {
            $this->view->MostrarRegistro($logueado);
        } else {
            header("Location: ". HOME);
            die();
        }
   }

   function logout() {
       session_start();
       session_destroy();
       header("Location: ". HOME);
       die();  
    }

   
}
?>