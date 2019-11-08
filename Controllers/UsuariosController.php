<?php
require_once("./Views/UsuariosView.php");
require_once("./Helpers/AuthHelper.php");
require_once("./Model/UsuariosModel.php");

class UsuariosController {

    private $UsuariosView;
    private $UsuariosModel;
    private $titulo;
    private $authHelper;
    function __construct(){
        $this->UsuariosView = new UsuariosView();
        $this->authHelper = new AuthHelper();
        $this->UsuariosModel = new UsuariosModel();
        $this->titulo = "La maquina del Metal";
    }

    function verificarUser() {
        $user = $_POST['usuario'];
        $pass = $_POST['password'];
    
        $usuario = $this->UsuariosModel->getUser($user);

        if ($usuario) {
            $hash = $usuario->password;
            
            if ( password_verify($pass, $hash) ){
                session_start();
                $_SESSION["id_usuario"] = $usuario->id_usuario;
                $_SESSION["nombre"] = $usuario->email;
                header("Location: ". HOME);
                die();
            }

        }

        $this->UsuariosView->getLogin($this->titulo,false,"Usario o contraseña incorrectos");
    
    }

    function getLogin(){
        $logueado = $this->authHelper->isLoged();
        if ( !$logueado ) {
            $this->UsuariosView->getLogin($this->titulo, $logueado);
        } else {
            header("Location: ". HOME);
            die();
        }
        
    }

    function guardaUsuario(){
        $user = $_POST["user"];
        $pass = $_POST["password"];
        $existe = $this->UsuariosModel->getUser($user);
        $logeado = $this->authHelper->isLoged();
        if (empty($user) || empty($pass)){
            $this->UsuariosView->getRegistro($logeado,"Datos incorrectos");
        } else {
            // buscamos si existe el usuario en la db y llamamos al model para comprobar
            if ($existe) { // si existe ..
                $this->UsuariosView->getRegistro(false,"Este nombre ya existe");
                // ya existe (mensaje);
            } else {    
                $id = $this->UsuariosModel->registrarse($user,$pass);
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
            $this->UsuariosView->MostrarRegistro($logueado);
        } else {
            header("Location: ". HOME);
            die();
        }
   }
}
?>