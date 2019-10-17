<?php
require_once('libs/Smarty.class.php');

class loginView {

    function getLogin($titulo){
        $smarty = new Smarty();
        $smarty->assign('titulo',$titulo);
        $smarty->assign('home','//'.$_SERVER['SERVER_NAME'].dirname($_SERVER['PHP_SELF']).'/');
        $smarty->display('templates/login.tpl');
    }
  
    function getRegistro($titulo){
        $smarty = new Smarty();
        $smarty->assign('titulo',$titulo);
        $smarty->assign('home','//'.$_SERVER['SERVER_NAME'].dirname($_SERVER['PHP_SELF']).'/');
        $smarty->display('templates/registro.tpl');
    }

}

?>