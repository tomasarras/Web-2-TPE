<?php

class HomeView
{
  private $Smarty;
  function __construct()
  {
    $this->Smarty = new Smarty();
  }

  function Mostrar($titulo, $bandas, $eventos){
    $this->Smarty->assign('Titulo',$titulo);
    $this->Smarty->assign('bandas',$bandas);
    $this->Smarty->assign('eventos',$eventos);
    $this->Smarty->assign('Home','//'.$_SERVER['SERVER_NAME'].dirname($_SERVER['PHP_SELF']).'/');
    $this->Smarty->display('templates/home.tpl');
  }
}
  ?>