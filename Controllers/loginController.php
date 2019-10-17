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

    function getLogin(){
        $this->view->getLogin($this->titulo);

        if( isset( $_POST['email']) && isset($_POST['password']) ){ 
            $email = $_POST['email']; 
            $password = $_POST['password'];
            
            $usuario = $this->model->getUsuario($email,$password);
            $hash = $usuario->contraseña;
            
            if ( password_verify($password, $hash) ){
                //datos correctos
                echo "<h1>logueado</h1>";
            } else {
                //datos incorrectos
                echo "<h1>datos incorrectos</h1>";
            }
        } 
    }

    function getRegistro(){
        $this->view->getRegistro($this->titulo);

        if( isset( $_POST['email']) && isset($_POST['password']) ){ 
            $email = $_POST['email']; 
            $password = $_POST['password'];

            $this->model->registrarse($email,$password);
        } 
    }
}

?>