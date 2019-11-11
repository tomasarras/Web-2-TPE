<?php
require_once("./Views/homeview.php");
require_once("./Views/eventosview.php");
require_once("./Views/bandasviews.php");
require_once("./Model/bandasmodel.php");
require_once("./Model/eventosmodel.php");
require_once("./Helpers/AuthHelper.php");

class homeController
{
  private $homeView;
  private $eventosview;
  private $bandasviews;
  private $bandasmodel;
  private $eventosmodel;
  private $user;

  function __construct()
  {
    $this->homeView = new homeview();
    $this->eventosview = new eventosview();
    $this->BandasView = new BandasView();
    $this->eventosmodel = new eventosmodel();
    $this->bandasmodel = new bandasmodel();
    $this->authHelper = new AuthHelper();
    $this->user = new stdClass();
    $this->user->logueado = $this->authHelper->isLoged();

    if ( $this->user->logueado ) {
      $this->user->admin = $_SESSION["admin"] == "1";
      $this->user->email = $_SESSION["email"];
      $this->user->id_usuario = $_SESSION["id_usuario"];
    }
    else
      $this->user->admin = false;
  }

  function Home() {
    $ordenBandas = false;
    $ordenEventos = false;

    if ( isset($_POST['eventos']) ) {
      $ordenEventos = $_POST['eventos'];
      $eventos = $this->eventosmodel->getEventosOrdenado($ordenEventos);
    } else {
      $eventos = $this->eventosmodel->getEventos();
    }

    if ( isset($_POST['bandas']) ) {
      $ordenBandas = $_POST['bandas'];
      $bandas = $this->bandasmodel->getBandasOrdenadas($ordenBandas);
    } else {
      $bandas = $this->bandasmodel->GetBandas();
    }
    $this->homeView->Mostrar($bandas, $eventos,$this->user,$ordenEventos,$ordenBandas);
  }

  function filtrarPorEvento(){
    if (isset($_POST["banda"])){
      $id_banda = $_POST["banda"];
      $bandas = $this->bandasmodel->GetBandas();
      $EventoFiltrado = $this ->eventosmodel->getEventoFiltrado($id_banda);

      $this->homeView->Mostrar($bandas,$EventoFiltrado,$this->user);
    } else {
      $this->noExiste();
    }
  }
  function VerDetallesEvento($params = null) {
    $id = $params[':ID'];
    $eventos = $this->eventosmodel->GetDetalleEvento($id);
    $bandas = $this->bandasmodel->GetBandas();

    $this->eventosview->MostrarDetallesEventos($eventos,$this->user);
  }

  
  function VerDetallesBandas($params = null) {
    $id = $params[':ID'];
    $bandas = $this->bandasmodel->GetDetalleBanda($id);

    $this->BandasView->MostrarDetalleBanda($bandas,$this->user);
  }

  function noExiste() {
    $this->homeView->noExiste();
  }
  
}