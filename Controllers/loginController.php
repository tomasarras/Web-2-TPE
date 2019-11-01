<?php
require_once("./Views/loginView.php");
require_once("./Helpers/AuthHelper.php");
require_once("./Model/loginModel.php");

class loginController {

    private $loginView;
    private $loginModel;
    private $titulo;
    private $authHelper;
    function __construct(){
        $this->loginView = new loginView();
        $this->authHelper = new AuthHelper();
        $this->loginModel = new loginModel();
        $this->titulo = "La maquina del Metal";
    }

    function verificarUser() {
        $user = $_POST['usuario'];
        $pass = $_POST['password'];
    
        $usuario = $this->loginModel->getUser($user);

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

        $this->loginView->getLogin($this->titulo,false,"Usario o contraseña incorrectos");
    
    }

    function getLogin(){
        $logueado = $this->authHelper->isLoged();
        if ( !$logueado ) {
            $this->loginView->getLogin($this->titulo, $logueado);
        } else {
            header("Location: ". HOME);
            die();
        }
        
    }

    function guardaUsuario(){
        $user = $_POST["user"];
        $pass = $_POST["password"];
        $existe = $this->loginModel->getUser($user);
        $logeado = $this->authHelper->isLoged();
        if (empty($user) || empty($pass)){
            $this->loginView->getRegistro($logeado,"Datos incorrectos");
        } else {
            // buscamos si existe el usuario en la db y llamamos al model para comprobar
            if ($existe) { // si existe ..
                $this->loginView->getRegistro(false,"Este nombre ya existe");
                // ya existe (mensaje);
            }else{    
                $id = $this->loginModel->registrarse($user,$pass);
                session_start();
                $_SESSION["id_usuario"] = $id;
                header("Location: ". HOME);
                die();
            } 
        }
    }

    function logout() {
        session_start();
        session_destroy();
        header("Location: ". HOME);
        die();
    }

    function MostrarRegistro(){

        $logueado = $this->authHelper->isLoged();

        if ( !$logueado ) {
            $this->loginView->MostrarRegistro($logueado);
        } else {
            header("Location: ". HOME);
            die();
        }
   }
}
?>