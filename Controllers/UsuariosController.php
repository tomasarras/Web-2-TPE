<?php
require_once("./Views/UsuariosView.php");
require_once("./Helpers/AuthHelper.php");
require_once("./Model/UsuariosModel.php");

class UsuariosController {

    private $usuariosView;
    private $usuariosModel;
    private $authHelper;
    private $logueado;

    function __construct(){
        $this->usuariosView = new UsuariosView();
        $this->authHelper = new AuthHelper();
        $this->usuariosModel = new UsuariosModel();
        $this->logueado = $this->authHelper->isLoged();
    }

    private function checkLog() {
        if ($this->logueado)
            header("Location: ". HOME);
    }

    function verificarUser() {
        $this->checkLog();

        if ( isset($_POST['email-usuario']) && isset($_POST['password']) 
             && $_POST['email-usuario'] != '' && $_POST['password'] != '') {
            
            $user = $_POST['email-usuario'];
            $pass = $_POST['password'];
            
            $usuario = $this->usuariosModel->getUserByEmail($user);
            
            if (!$usuario) {//si no existe por email, compruebo por nombre
                $usuario = $this->usuariosModel->getUserByNombre($user);
                
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
            $_SESSION["id_usuario"] = $user->id_usuario;
            $_SESSION["email"] = $user->email;
            $_SESSION["nombre"] = $user->nombre;
            $_SESSION["admin"] = $user->admin;
            header("Location: ". HOME);
        } else {
            $this->usuariosView->getLogin("Usuario o contraseña incorrectos");
        }

    }   

    function getLogin(){
        $this->checkLog();
        $this->usuariosView->getLogin();
    }

    function guardaUsuario(){
        $this->checkLog();


        if ( isset($_POST["email"]) && isset($_POST["user_name"]) && isset($_POST["password"])
            && isset($_POST["pregunta"]) && isset($_POST["respuesta"]) ) {
                
            $email = $_POST["email"];
            $userName = $_POST['user_name'];
            $pass = $_POST["password"];
            $pregunta = $_POST["pregunta"];
            $respuesta = $_POST["respuesta"];
            
            $existeEmail = $this->usuariosModel->getUserByEmail($email);
            $existeNombre = $this->usuariosModel->getUserByNombre($userName);
            
            if ($existeEmail) {
                $this->usuariosView->mostrarRegistro("El email ya existe");
                die();
            }
            
            if ($existeNombre) {
                $this->usuariosView->mostrarRegistro("El usuario ya existe");
                die();
            }
            
            $id = $this->usuariosModel->registrarse($email, $pass,$userName,$pregunta,$respuesta);
            //session_start();
            $_SESSION["id_usuario"] = $id;
            $_SESSION["email"] = $email;
            $_SESSION["nombre"] = $userName;
            $_SESSION["admin"] = "0";
        }
        
        header("Location: ". HOME);
    }

    function showRestablecerPassword() {
        $this->checkLog();
        $this->usuariosView->restablecerPassword();
    }

    function logout() {
        session_destroy();
        header("Location: ". HOME);
        die();
    }

    function MostrarRegistro(){
        $this->checkLog();
        $this->usuariosView->MostrarRegistro();
   }
}
?>