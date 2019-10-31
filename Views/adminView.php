<?php

require_once('libs/Smarty.class.php');

class AdminView {

    private $smarty;

    function __construct() {
        $this->smarty = new Smarty();
    }
    
    function mostrarAdmin($titulo) {
        $this->smarty->assign("titulo",$titulo);
        $this->smarty->assign("logueado",true);
        $this->smarty->assign('home','//'.$_SERVER['SERVER_NAME'].dirname($_SERVER['PHP_SELF']).'/');
        $this->smarty->display('templates/admin.tpl');
    }

    function mostrarBandas($titulo,$bandas) {
        $this->smarty->assign("titulo",$titulo);
        $this->smarty->assign("logueado",true);
        $this->smarty->assign('home','//'.$_SERVER['SERVER_NAME'].dirname($_SERVER['PHP_SELF']).'/');
        $this->smarty->assign("bandas",$bandas);
        $this->smarty->display('templates/adminBandas.tpl');

    }

    function mostrarEventos($titulo,$eventos,$bandas) {
        $this->smarty->assign("titulo",$titulo);
        $this->smarty->assign("logueado",true);
        $this->smarty->assign('home','//'.$_SERVER['SERVER_NAME'].dirname($_SERVER['PHP_SELF']).'/');
        $this->smarty->assign("eventos",$eventos);
        $this->smarty->assign("bandas",$bandas);
        $this->smarty->display('templates/adminEventos.tpl');
    }

    function mostrarEditarBanda($titulo,$banda) {
        $this->smarty->assign("titulo",$titulo);
        $this->smarty->assign("logueado",true);
        $this->smarty->assign('home','//'.$_SERVER['SERVER_NAME'].dirname($_SERVER['PHP_SELF']).'/');
        $this->smarty->assign("banda",$banda);
        $this->smarty->display('templates/adminEditarBanda.tpl');
    }

    function mostrarEditarEvento($titulo,$evento,$bandas) {
        $this->smarty->assign("titulo",$titulo);
        $this->smarty->assign("logueado",true);
        $this->smarty->assign('home','//'.$_SERVER['SERVER_NAME'].dirname($_SERVER['PHP_SELF']).'/');
        $this->smarty->assign("evento",$evento);
        $this->smarty->assign("bandas",$bandas);
        $this->smarty->display('templates/adminEditarEvento.tpl');
    }

}
?>