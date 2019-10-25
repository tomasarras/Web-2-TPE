<?php

    class eventosview{
            
    function ver($eventos)
    {
      $smarty = new Smarty();
      $smarty->assign('eventos',$eventos);
      $smarty->assign('home','//'.$_SERVER['SERVER_NAME'].dirname($_SERVER['PHP_SELF']).'/');
      $smarty->display('templates/eventos.tpl');
    }
       }


?>