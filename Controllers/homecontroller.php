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
    $this->authHelper = new AuthHelper();
    $this->titulo = "Inicio";
  }
  function Home() {
    $logueado = $this->authHelper->isLoged();
    //$nombre = $_SESSION["nombre"];
    $eventos = $this->eventosmodel->getEventos();
    $bandas = $this->bandasmodel->GetBandas();
    $this->view->Mostrar($this->Titulo, $bandas, $eventos,$logueado);
  }
  function filtrarPorEvento(){
    $id_banda = $_POST["banda"];
    $bandas = $this->bandasmodel->GetBandas();
    $EventoFiltrado = $this ->eventosmodel->getEventoFiltrado($id_banda);
    session_start();
    $logueado = isset($_SESSION["id_usuario"]);
    $this->view->Mostrar($this->Titulo,$bandas,$EventoFiltrado,$logueado);
  }
  function VerDetallesEvento($id){
    $eventos = $this->eventosmodel->GetDetalleEvento($id);
    $bandas = $this->bandasmodel->GetBandas();
    session_start();
    $logueado = isset($_SESSION["id_usuario"]);
    $this->eventosview->MostrarDetallesEventos("Ver Evento detallado", $eventos,$logueado);

  }
  function VerDetallesBandas($id){
    $bandas = $this->bandasmodel->GetDetalleBanda($id);
    session_start();
    $logueado = isset($_SESSION["id_usuario"]);
    $this->BandasView->MostrarDetalleBanda("Ver Banda detallada", $bandas,$logueado);

  }
  
}