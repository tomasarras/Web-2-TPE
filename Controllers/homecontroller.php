<?php
require_once  "./Views/homeview.php";
require_once  "./Views/eventosview.php";
require_once  "./Views/bandasviews.php";
require_once  "./Model/bandasmodel.php";
require_once  "./Model/eventosmodel.php";

class homeController
{
  private $view;
  private $eventosview;
  private $bandasviews;
  private $bandasmodel;
  private $eventosmodel;
  private $Titulo;
  function __construct()
  {
    $this->view = new homeview();
    $this->eventosview = new eventosview();
    $this->BandasView = new BandasView();
    $this->eventosmodel = new eventosmodel();
    $this->bandasmodel = new bandasmodel();
    $this->Titulo = "Inicio";
}
function Home(){
    $eventos = $this->eventosmodel->getEventos();
    $bandas = $this->bandasmodel->GetBandas();
    $this->view->Mostrar($this->Titulo, $bandas, $eventos);
}
}