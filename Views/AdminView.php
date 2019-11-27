<?php
require_once('./libs/Smarty.class.php');

class AdminView {

    private $smarty;
    private $user;

    function __construct() {
        $this->smarty = new Smarty();
        $this->smarty->assign('home','//'.$_SERVER['SERVER_NAME'].dirname($_SERVER['PHP_SELF']).'/');
        $this->user = new stdClass();
        
        $this->user->logueado = true;
        $this->user->admin = true;
        $this->user->email = $_SESSION["email"];
        $this->user->nombre = $_SESSION["nombre"];
        $this->user->id_usuario = $_SESSION["id_usuario"];
        $this->smarty->assign("user",$this->user);
    }
    
    function mostrarUsuarios($usuarios) {
        $this->smarty->assign("titulo","Administrar usuarios");
        $this->smarty->assign("usuarios",$usuarios);
        $this->smarty->display('templates/adminUsuarios.tpl');
    }

    function mostrarAdmin() {
        $this->smarty->assign("titulo","Administrar");
        $this->smarty->display('templates/admin.tpl');
    }

    function mostrarBandas($bandas) {
        $this->smarty->assign("titulo","Administrar bandas");
        $this->smarty->assign("bandas",$bandas);
        $this->smarty->display('templates/adminBandas.tpl');

    }

    function mostrarEventos($eventos,$bandas) {
        $this->smarty->assign("titulo","Administrar eventos");
        $this->smarty->assign("eventos",$eventos);
        $this->smarty->assign("bandas",$bandas);
        $this->smarty->display('templates/adminEventos.tpl');
    }

    function mostrarEditarBanda($banda) {
        $this->smarty->assign("titulo","Editar banda");
        $this->smarty->assign("banda",$banda);
        $this->smarty->display('templates/adminEditarBanda.tpl');
    }

    function mostrarEditarEvento($evento,$bandas,$imagenes) {
        $this->smarty->assign("titulo","Editar evento");
        $this->smarty->assign("evento",$evento);
        $this->smarty->assign("imagenes",$imagenes);
        $this->smarty->assign("bandas",$bandas);
        $this->smarty->display('templates/adminEditarEvento.tpl');
    }

}
