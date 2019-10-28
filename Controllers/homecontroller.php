<?php
require_once  "./Views/homeview.php";
require_once  "./Views/eventosview.php";
require_once  "./Views/bandasviews.php";
require_once  "./Model/bandasmodel.php";
require_once  "./Model/eventosmodel.php";
require_once "AuthHelper.php";

class homeController
{
  private $homeView;
  private $eventosview;
  private $bandasviews;
  private $bandasmodel;
  private $eventosmodel;
  private $titulo;
  private $authHelper;

  function __construct()
  {
    $this->homeView = new homeview();
    $this->eventosview = new eventosview();
    $this->BandasView = new BandasView();
    $this->eventosmodel = new eventosmodel();
    $this->bandasmodel = new bandasmodel();
    $this->authHelper = new AuthHelper();
    $this->titulo = "Inicio";
}
  function Home() {
    $logueado = $this->authHelper->isLoged();
    $eventos = $this->eventosmodel->getEventos();
    $bandas = $this->bandasmodel->GetBandas();
    $this->homeView->Mostrar($this->titulo, $bandas, $eventos,$logueado);
  }

  
}