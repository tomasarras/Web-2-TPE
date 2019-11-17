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
        $email = $_POST['email'];
        $pass = $_POST['password'];
    
        $usuario = $this->usuariosModel->getUserByEmail($email);

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
        $logeado = $this->authHelper->isLoged();

        if ( !$logueado ) {
            
            $email = $_POST["email"];
            $userName = $_POST['user_name'];
            $pass = $_POST["password"];
            //$passdos = $_POST['passwordCon']; la comprobacion de password se hace en js
            $pregunta = $_POST['preguntas'];
            $respuesta = $_POST['respuesta'];
            //$admin = 0; ningun usuario que se registra es admin, en el model se le asigna
            

            if (empty($email) || empty($pass)){
                $this->UsuariosView->mostrarRegistro("Datos incorrectos");
            } else {
                $existe = $this->usuariosModel->getUserByEmail($email);
                // buscamos si existe el usuario en la db y llamamos al model para comprobar
                if ($existe) { // si existe ..
                    $this->UsuariosView->mostrarRegistro("Este nombre ya existe");
                    // ya existe (mensaje);
                } else {    
                    $id = $this->usuariosModel->registrarse($email,$pass,$userName,$pregunta,$respuesta);
                    $_SESSION["id_usuario"] = $id;
                    $_SESSION["email"] = $email;
                    $_SESSION["admin"] = "0";
                    header("Location: ". HOME);
                } 
            }
        }
    }

    function showRestablecerPassword() {
        $this->usuariosView->restablecerPassword();
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