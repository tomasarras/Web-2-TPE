<?php
require_once('libs/Smarty.class.php');

class loginView {

    function getLogin($titulo){
        $smarty = new Smarty();
        $smarty->assign('titulo',$titulo);
        $smarty->assign('home','//'.$_SERVER['SERVER_NAME'].dirname($_SERVER['PHP_SELF']).'/');
        $smarty->display('templates/login.tpl');
    }
  
    function getRegistro($mensaje = ''){
        $smarty = new Smarty();
        $smarty->assign('mensaje',$mensaje);
        $smarty->assign('home','//'.$_SERVER['SERVER_NAME'].dirname($_SERVER['PHP_SELF']).'/');
        $smarty->display('templates/registro.tpl');
    }

    function mostrarRegistro($mensaje=''){
        $smarty = new Smarty();
        $smarty->assign('Titulo',"Formulario de registro"); // El 'Titulo' del assign puede ser cualquier valor
        $smarty->assign('mensaje',$mensaje); // El 'Titulo' del assign puede ser cualquier valor
        $smarty->assign('home','//'.$_SERVER['SERVER_NAME'].dirname($_SERVER['PHP_SELF']).'/');
        $smarty->display('templates/registro.tpl');
        //$this->Smarty->assign('base',$this->base);
        }
}

?>