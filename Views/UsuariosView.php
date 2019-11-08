<?php
require_once('./libs/Smarty.class.php');

class UsuariosView {

    function getLogin($titulo,$logueado,$mensaje=""){
        $smarty = new Smarty();
        $smarty->assign('titulo',$titulo);
        $smarty->assign('mensaje',$mensaje);
        $smarty->assign('logueado',$logueado);
        $smarty->assign('home','//'.$_SERVER['SERVER_NAME'].dirname($_SERVER['PHP_SELF']).'/');
        $smarty->display('templates/login.tpl');
    }
  
    function getRegistro($logueado,$mensaje = ''){
        $smarty = new Smarty();
        $smarty->assign('mensaje',$mensaje);
        $smarty->assign('titulo',"insert titulo here");
        $smarty->assign('logueado',$logueado);
        $smarty->assign('home','//'.$_SERVER['SERVER_NAME'].dirname($_SERVER['PHP_SELF']).'/');
        $smarty->display('templates/registro.tpl');
    }

    function mostrarRegistro($logueado,$mensaje=''){
        $smarty = new Smarty();
        $smarty->assign('logueado',$logueado); // El 'Titulo' del assign puede ser cualquier valor
        $smarty->assign('titulo',"Formulario de registro"); // El 'Titulo' del assign puede ser cualquier valor
        $smarty->assign('mensaje',$mensaje); // El 'Titulo' del assign puede ser cualquier valor
        $smarty->assign('home','//'.$_SERVER['SERVER_NAME'].dirname($_SERVER['PHP_SELF']).'/');
        $smarty->display('templates/registro.tpl');
        //$this->Smarty->assign('base',$this->base);
        }
}

?>