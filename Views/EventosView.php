<?php
require_once('./libs/Smarty.class.php');

class EventosView {
    private $smarty;

    function __construct() {
      $this->smarty = new Smarty();
      $this->smarty->assign('home','//'.$_SERVER['SERVER_NAME'].dirname($_SERVER['PHP_SELF']).'/');
    }  

    function MostrarDetallesEventos($eventos,$imagenes,$user) {
       $this->smarty->assign('titulo',"Ver Evento detallado");
       $this->smarty->assign('user',$user);
       $this->smarty->assign('eventos',$eventos);
       $this->smarty->assign('imagenes',$imagenes);
       $this->smarty->display('templates/MostrarDetallesEventos.tpl');
    }
}


?>