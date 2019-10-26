<?php
require_once "./Views/loginView.php";
require_once "./Model/loginModel.php";

class loginController {

    private $view;
    private $model;
    private $titulo;

    function __construct(){
        $this->view = new loginView();
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
                header("Location: ". HOME);
                die();
            } else {
            //datos incorrectos
            //echo "<h1>datos incorrectos</h1>";
            }
        } else {
            //usuario no existe
        }
    
    }

    function getLogin(){
        $logueado = $this->isLoged();
        $this->view->getLogin($this->titulo, $logueado);
    }

    function guardaUsuario(){
        //$this->view->getRegistro($this->titulo);
        $user = $_POST["user"];
        $pass = $_POST["password"];
        $existe = $this->model->getUser($user);
        $saf = empty($user);
        if (empty($user)){
            $this->view->getRegistro("El campo Usuario esta vacio");
        }
        if (empty($pass)){
            $this->view->getRegistro("El campo contraseña esta vacio");
        }
        // buscamos si existe el usuario en la db y llamamos al model para comprobar
        elseif(isset($existe->nombre)) { // si existe ..
                $this->view->getRegistro(false,"Este nombre ya existe");
             // ya existe (mensaje);
        }else{    
            $id = $this->model->registrarse($user,$pass);
            session_start();
            $_SESSION["id_usuario"] = $id;
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
        $this->view->MostrarRegistro($logueado);
   }
}
?>