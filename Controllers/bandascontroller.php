<?php
require_once "./Views/bandasviews.php";
require_once "./Model/bandasmodel.php";

class BandasController
{
    private $view;
    private $model;

    
    function __construct(){
        $this->view = new BandasView();
        $this->model = new BandasModel();
    }
    function Home(){
        $bandas = $this->model->GetBandas();
        $this->view->Mostrar($bandas);
    }

}



?>