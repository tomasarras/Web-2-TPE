<?php

require_once('libs/Smarty.class.php');

class AdminView {

    private $smarty;

    function __construct() {
        $this->smarty = new Smarty();
    }
    
    function mostrarAdmin($titulo,$logueado) {
        $this->smarty->assign("titulo",$titulo);
        $this->smarty->assign("logueado",$logueado);
        $this->smarty->assign('home','//'.$_SERVER['SERVER_NAME'].dirname($_SERVER['PHP_SELF']).'/');
        $this->smarty->display('templates/admin.tpl');
    }

    function mostrarBandas($titulo,$logueado,$bandas) {
        $this->smarty->assign("titulo",$titulo);
        $this->smarty->assign("logueado",$logueado);
        $this->smarty->assign('home','//'.$_SERVER['SERVER_NAME'].dirname($_SERVER['PHP_SELF']).'/');
        $this->smarty->assign("bandas",$bandas);
        $this->smarty->display('templates/adminBandas.tpl');

    }

}


?>