<?php
require('libs/Smarty.class.php');

 class BandasView
{
    

     function Mostrar($titulo, $bandas)
    {
      $smarty = new Smarty();
      $smarty->assign('titulo',$titulo);
      $smarty->assign('bandas',$bandas);
      $smarty->assign('BASE_URL',BASE_URL);
      $smarty->display('templates/home.tpl');
           
    }
  }
?>