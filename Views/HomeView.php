<?php
require_once('./libs/Smarty.class.php');

class HomeView
{
  private $smarty;

  function __construct()
  {
    $this->smarty = new Smarty();
    $this->smarty->assign('home','//'.$_SERVER['SERVER_NAME'].dirname($_SERVER['PHP_SELF']).'/');
  }

  function Mostrar($bandas, $eventos,$user,$ordenEvento=false,$ordenBanda=false){
    $this->smarty->assign('titulo',"Inicio");
    $this->smarty->assign('user',$user);
    $this->smarty->assign('bandas',$bandas);
    $this->smarty->assign('ordenBanda',$ordenBanda);
    $this->smarty->assign('ordenEvento',$ordenEvento);
    $this->smarty->assign('eventos',$eventos);
    $this->smarty->display('templates/home.tpl');
  }

  function noExiste($mensaje=""){
    $this->smarty->assign('titulo',"Pagina no disponible");
    $this->smarty->assign('mensaje',$mensaje);
    $this->smarty->display('templates/error.tpl');
  }
}
  ?>