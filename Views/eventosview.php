<?php
require_once('libs/Smarty.class.php');

    class eventosview{
            
    function ver($eventos)
    {
      $smarty = new Smarty();
      $smarty->assign('eventos',$eventos);
      $smarty->assign('home','//'.$_SERVER['SERVER_NAME'].dirname($_SERVER['PHP_SELF']).'/');
      $smarty->display('templates/eventos.tpl');
    }
    function MostrarDetallesEventos($Titulo,$eventos,$logueado){
      $smarty = new Smarty();
      $smarty->assign('titulo',$Titulo);
      $smarty->assign('logueado',$logueado);
      $smarty->assign('eventos',$eventos);
      $smarty->assign('home','//'.$_SERVER['SERVER_NAME'].dirname($_SERVER['PHP_SELF']).'/');
      $smarty->display('templates/MostrarDetallesEventos.tpl');
  
    }
       }


?>