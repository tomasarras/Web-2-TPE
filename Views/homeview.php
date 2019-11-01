<?php
require_once('libs/Smarty.class.php');

class HomeView
{
  private $smarty;
  function __construct()
  {
    $this->smarty = new Smarty();
  }

  function Mostrar($titulo, $bandas, $eventos,$logueado,$ordenEvento=false,$ordenBanda=false){
    $this->smarty->assign('titulo',$titulo);
    //$this->Smarty->assign('nombre',$nombre);
    $this->smarty->assign('bandas',$bandas);
    $this->smarty->assign('ordenBanda',$ordenBanda);
    $this->smarty->assign('ordenEvento',$ordenEvento);
    $this->smarty->assign('logueado',$logueado);
    $this->smarty->assign('eventos',$eventos);
    $this->smarty->assign('home','//'.$_SERVER['SERVER_NAME'].dirname($_SERVER['PHP_SELF']).'/');
    $this->smarty->display('templates/home.tpl');
  }

  function noExiste($mensaje=""){
    $this->smarty->assign('titulo',"Pagina no disponible");
    $this->smarty->assign('mensaje',$mensaje);
    $this->smarty->assign('home','//'.$_SERVER['SERVER_NAME'].dirname($_SERVER['PHP_SELF']).'/');
    $this->smarty->display('templates/error.tpl');
  }
}
  ?>