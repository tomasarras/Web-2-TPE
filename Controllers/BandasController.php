<?php
require_once("./Views/BandasView.php");
require_once("./Model/BandasModel.php");

class BandasController
{
    private $bandasView;
    private $bandasModel;

    
    function __construct(){
        $this->bandasView = new BandasView();
        $this->bandasModel = new BandasModel();
    }
    function Home(){
        $bandas = $this->bandasModel->GetBandas();
        $this->bandasView->Mostrar($bandas);
    }

}



?>