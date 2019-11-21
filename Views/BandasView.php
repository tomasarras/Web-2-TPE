<?php
require_once('./libs/Smarty.class.php');

class BandasView {
    private $smarty;

    function __construct() {
      $this->smarty = new Smarty();
      $this->smarty->assign('home','//'.$_SERVER['SERVER_NAME'].dirname($_SERVER['PHP_SELF']).'/');
    } 

    function MostrarDetalleBanda($banda,$user) {
      $this->smarty->assign('titulo',"Ver Banda detallada");
      $this->smarty->assign('user',$user);
      $this->smarty->assign('banda',$banda);
      $this->smarty->display('templates/MostrarDetallesBandas.tpl');
    }
}
?>