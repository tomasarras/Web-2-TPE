<?php

class HomeView
{
  private $smarty;
  function __construct()
  {
    $this->smarty = new Smarty();
  }
  
  function Mostrar($titulo, $bandas, $eventos,$logueado){
    $this->smarty->assign('titulo',$titulo);
    $this->smarty->assign('bandas',$bandas);
    $this->smarty->assign('logueado',$logueado);
    $this->smarty->assign('eventos',$eventos);
    $this->smarty->assign('home','//'.$_SERVER['SERVER_NAME'].dirname($_SERVER['PHP_SELF']).'/');
    $this->smarty->display('templates/home.tpl');
  }
}
  ?>