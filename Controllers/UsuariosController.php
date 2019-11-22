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
        if ( isset($_POST['email-usuario']) && isset($_POST['password']) ) {

            $user = $_POST['email-usuario'];
            $pass = $_POST['password'];
            
            $usuario = $this->usuariosModel->getUserByEmail($user);//pido por email

            if (!$usuario) {//si no existe por email, compruebo por nombre
                $usuario = $this->usuariosModel->getUserByNombre($user);//pido por nombre

                if ($usuario) {//nombre valido
                    $this->checkPassword($usuario,$pass);
                } else
                    $this->usuariosView->getLogin("Usuario o contraseña incorrectos");
            }
            else {//email valido
                $this->checkPassword($usuario,$pass);
            }
            
        }
    
    }

    private function checkPassword($user,$pass) {
        $hash = $user->password;
                
        if ( password_verify($pass, $hash) ){
            session_start();
            $_SESSION["id_usuario"] = $user->id_usuario;
            $_SESSION["email"] = $user->email;
            $_SESSION["nombre"] = $user->nombre;
            $_SESSION["admin"] = $user->admin;
            header("Location: ". HOME);
            die();
        }

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
                    $_SESSION["nombre"] = $userName;
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