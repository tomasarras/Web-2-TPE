<?php
require('libs/Smarty.class.php');

 class BandasView
{
    

     function Mostrar($bandas)
    {
      $smarty = new Smarty();
      $smarty->assign('bandas',$bandas);
      $smarty->assign('home','//'.$_SERVER['SERVER_NAME'].dirname($_SERVER['PHP_SELF']).'/');
      $smarty->display('templates/bandas.tpl');
           
    }
    /*function getNoticias($bandas){
      $smarty = new Smarty();
      $smarty->assign('Titulo',"Inicio");
      $smarty->assign('bandas',$bandas);
      $smarty->assign('home','//'.$_SERVER['SERVER_NAME'].dirname($_SERVER['PHP_SELF']).'/');
      $smarty->display('templates/noticias.tpl');
    } */
    }
?>