<?php

class HomeView
{
  private $Smarty;
  function __construct()
  {
    $this->Smarty = new Smarty();
  }

  function Mostrar($titulo, $bandas, $eventos,$logueado){
    $this->Smarty->assign('titulo',$titulo);
    //$this->Smarty->assign('nombre',$nombre);
    $this->Smarty->assign('bandas',$bandas);
    $this->Smarty->assign('logueado',$logueado);
    $this->Smarty->assign('eventos',$eventos);
    $this->Smarty->assign('home','//'.$_SERVER['SERVER_NAME'].dirname($_SERVER['PHP_SELF']).'/');
    $this->Smarty->display('templates/home.tpl');
  }

  function noExiste($mensaje=""){
    $this->Smarty->assign('titulo',"Pagina no disponible");
    $this->Smarty->assign('mensaje',$mensaje);
    $this->Smarty->assign('home','//'.$_SERVER['SERVER_NAME'].dirname($_SERVER['PHP_SELF']).'/');
    $this->Smarty->display('templates/error.tpl');
  }
}
  ?>