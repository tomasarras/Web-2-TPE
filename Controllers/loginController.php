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
    function guardaUsuario(){
        //$this->view->getRegistro($this->titulo);
        $user = $_POST["user"];
        $pass = $_POST["password"];
        $existe = $this->model->getUser($user);

        if (empty($user)){
            $this->view->getRegistro("El campo Usuario esta vacio");
        }
        if (empty($pass)){
            $this->view->getRegistro("El campo contraseña esta vacio");
        }
        // buscamos si existe el usuario en la db y llamamos al model para comprobar
        elseif(isset($existe['nombre'])) { // si existe ..
                $this->view->getRegistro("Este nombre ya existe");
             // ya existe (mensaje);
            }else{    
            $this->model->registrarse($user,$pass);
        } 
    }
function MostrarRegistro(){
    $this->view->MostrarRegistro();
   }
}
?>