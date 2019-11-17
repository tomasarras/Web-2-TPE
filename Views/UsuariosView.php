<?php
require_once('./libs/Smarty.class.php');

class UsuariosView {
    private $user;
    private $smarty;
    
    function __construct() {
        $this->smarty = new Smarty();
        $this->smarty->assign('home','//'.$_SERVER['SERVER_NAME'].dirname($_SERVER['PHP_SELF']).'/');
        $this->user = new stdClass();
        $this->user->logueado = false;
    }

    function getLogin($mensaje=""){
        $this->smarty->assign('titulo',"Formulario de login");
        $this->smarty->assign('mensaje',$mensaje);
        $this->smarty->assign('user',$this->user);
        $this->smarty->display('templates/login.tpl');
    }
  
    function mostrarRegistro($mensaje=''){
        $this->smarty->assign('titulo',"Formulario de registro");
        $this->smarty->assign('mensaje',$mensaje);
        $this->smarty->assign('user',$this->user);
        $this->smarty->display('templates/registro.tpl');
    }

    function restablecerPassword() {
        $this->smarty->assign('titulo',"Restablecer contraseña");
        $this->smarty->assign('user',$this->user);
        $this->smarty->display('templates/restablecerPassword.tpl');
    }
}

?>