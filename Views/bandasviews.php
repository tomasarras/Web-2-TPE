<?php
require_once('libs/Smarty.class.php');

 class BandasView
{
    

     function Mostrar($bandas)
    {
      $smarty = new Smarty();
      $smarty->assign('bandas',$bandas);
      $smarty->assign('home','//'.$_SERVER['SERVER_NAME'].dirname($_SERVER['PHP_SELF']).'/');
      $smarty->display('templates/bandas.tpl');
           
    }
    function MostrarDetalleBanda($Titulo,$bandas,$logueado){
      $smarty = new Smarty();
      $smarty->assign('titulo',$Titulo);
      $smarty->assign('logueado',$logueado);
      $smarty->assign('bandas',$bandas);
      $smarty->assign('home','//'.$_SERVER['SERVER_NAME'].dirname($_SERVER['PHP_SELF']).'/');
      $smarty->display('templates/MostrarDetallesBandas.tpl');
  
    }
}
?>