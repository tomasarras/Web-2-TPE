<?php
require_once("./Views/UsuariosView.php");
require_once("./Helpers/AuthHelper.php");
require_once("./Model/UsuariosModel.php");

class UsuariosController {

    private $usuariosView;
    private $usuariosModel;
    private $authHelper;
    private $user;

    function __construct(){
        $this->usuariosView = new UsuariosView();
        $this->authHelper = new AuthHelper();
        $this->usuariosModel = new UsuariosModel();
    }

    function verificarUser() {
        $user = $_POST['usuario'];
        $pass = $_POST['password'];
    
        $usuario = $this->usuariosModel->getUser($user);

        if ($usuario) {
            $hash = $usuario->password;
            
            if ( password_verify($pass, $hash) ){
                session_start();
                $_SESSION["id_usuario"] = $usuario->id_usuario;
                $_SESSION["email"] = $usuario->email;
                $_SESSION["admin"] = $usuario->admin;
                header("Location: ". HOME);
                die();
            }

        }
        $this->usuariosView->getLogin("Usario o contraseña incorrectos");
    
    }

    function getLogin(){
        $logueado = $this->authHelper->isLoged();
        if ( !$logueado ) {
            $this->usuariosView->getLogin();
        } else {
            header("Location: ". HOME);
            die();
        }
        
    }

    function guardaUsuario(){
        $user = $_POST["user"];
        $pass = $_POST["password"];
        $existe = $this->usuariosModel->getUser($user);
        $logeado = $this->authHelper->isLoged();
        if (empty($user) || empty($pass)){
            $this->usuariosView->getRegistro($logeado,"Datos incorrectos");
        } else {
            // buscamos si existe el usuario en la db y llamamos al model para comprobar
            if ($existe) { // si existe ..
                $this->usuariosView->MostrarRegistro("Este nombre ya existe");
                // ya existe (mensaje);
            } else {    
                $id = $this->usuariosModel->registrarse($user,$pass);
                session_start();
                $_SESSION["id_usuario"] = $id;
                $_SESSION["email"] = $user;
                $_SESSION["admin"] = "0";
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
            $this->usuariosView->MostrarRegistro();
        } else {
            header("Location: ". HOME);
            die();
        }
   }
}
?>