<?php
require_once("./Views/HomeView.php");
require_once("./Views/EventosView.php");
require_once("./Views/BandasView.php");
require_once("./Model/BandasModel.php");
require_once("./Model/EventosModel.php");
require_once("./Helpers/AuthHelper.php");

class HomeController {
  private $homeView;
  private $eventosView;
  private $bandasView;
  private $bandasModel;
  private $eventosModel;
  private $user;

  function __construct()
  {
    $this->homeView = new HomeView();
    $this->eventosView = new EventosView();
    $this->bandasView = new BandasView();
    $this->eventosModel = new EventosModel();
    $this->bandasModel = new BandasModel();
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
      $eventos = $this->eventosModel->getEventosOrdenado($ordenEventos);
    } else {
      $eventos = $this->eventosModel->getEventosConBanda();
    }

    if ( isset($_POST['bandas']) ) {
      $ordenBandas = $_POST['bandas'];
      $bandas = $this->bandasModel->getBandasOrdenadas($ordenBandas);
    } else {
      $bandas = $this->bandasModel->GetBandas();
    }
    $this->homeView->Mostrar($bandas, $eventos,$this->user,$ordenEventos,$ordenBandas);
  }

  function filtrarPorEvento(){
    if (isset($_POST["banda"])){
      $id_banda = $_POST["banda"];
      $bandas = $this->bandasModel->GetBandas();
      $eventoFiltrado = $this ->eventosModel->getEventoFiltrado($id_banda);

      $this->homeView->Mostrar($bandas,$eventoFiltrado,$this->user);
    } else {
      $this->noExiste();
    }
  }
  function VerDetallesEvento($params = null) {
    $id = $params[':ID'];
    $eventos = $this->eventosModel->GetDetalleEvento($id);
    $bandas = $this->bandasModel->GetBandas();

    $this->eventosView->MostrarDetallesEventos($eventos,$this->user);
  }

  
  function VerDetallesBandas($params = null) {
    $id = $params[':ID'];
    $bandas = $this->bandasModel->GetDetalleBanda($id);

    $this->bandasView->MostrarDetalleBanda($bandas,$this->user);
  }

  function noExiste() {
    $this->homeView->noExiste();
  }
  
}