<?php
require('libs/Smarty.class.php');

 class BandasView
{
    

     function Mostrar($titulo, $bandas)
    {
      $smarty = new Smarty();
      $smarty->assign('titulo',$titulo);
      $smarty->assign('bandas',$bandas);
      $smarty->assign('home','//'.$_SERVER['SERVER_NAME'].dirname($_SERVER['PHP_SELF']).'/');
      $smarty->display('templates/home.tpl');
           
    }

    function getNoticias($titulo, $bandas){
      $smarty = new Smarty();
      $smarty->assign('titulo',$titulo);
      $smarty->assign('bandas',$bandas);
      $smarty->assign('home','//'.$_SERVER['SERVER_NAME'].dirname($_SERVER['PHP_SELF']).'/');
      $smarty->display('templates/noticias.tpl');
    }

    function getLogin($titulo){
      $smarty = new Smarty();
      $smarty->assign('titulo',$titulo);
      $smarty->assign('home','//'.$_SERVER['SERVER_NAME'].dirname($_SERVER['PHP_SELF']).'/');
      $smarty->display('templates/login.tpl');
    }

    function getRegistro($titulo){
      $smarty = new Smarty();
      $smarty->assign('titulo',$titulo);
      $smarty->assign('home','//'.$_SERVER['SERVER_NAME'].dirname($_SERVER['PHP_SELF']).'/');
      $smarty->display('templates/registro.tpl');
    }

  }
?>