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
      $this->user->nombre = $_SESSION["nombre"];
      $this->user->id_usuario = $_SESSION["id_usuario"];
    }
    else
      $this->user->admin = false;
  }

  function Home() {
    if ( isset($_POST['eventos']) ) {
      $ordenEventos = $_POST['eventos'];
      switch ($ordenEventos) {
        case 'evento': $eventos = $this->eventosModel->getEventosConBanda('evento'); break;
        case 'ciudad': $eventos = $this->eventosModel->getEventosConBanda('ciudad'); break;
        case 'detalle': $eventos = $this->eventosModel->getEventosConBanda('detalle'); break;
        case 'banda': $eventos = $this->eventosModel->getEventosConBanda('banda'); break;
        default: $eventos = $this->eventosModel->getEventosConBanda(); break;
      }
    } else {
      $eventos = $this->eventosModel->getEventosConBanda();
    }

    if ( isset($_POST['bandas']) ) {
      $ordenBandas = $_POST['bandas'];
      switch ($ordenBandas) {
        case 'banda': $bandas = $this->bandasModel->GetBandas('banda'); break;
        case 'anio': $bandas = $this->bandasModel->GetBandas('anio'); break;
        case 'cantidad-canciones': $bandas = $this->bandasModel->GetBandas('cantidad_canciones'); break;
        default : $bandas = $this->bandasModel->GetBandas(); break;
      }
    } else {
      $bandas = $this->bandasModel->GetBandas();
    }
    $this->homeView->Mostrar($bandas, $eventos,$this->user);
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
    $evento = $this->eventosModel->GetDetalleEvento($id);
    if ($evento) {
      $imagenes = $this->eventosModel->getImagenesEvento($id);
      $this->eventosView->MostrarDetallesEvento($evento,$imagenes,$this->user);
    } else
      $this->homeView->noExiste("Este evento no existe");
  }

  
  function VerDetallesBanda($params = null) {
    $id = $params[':ID'];
    $banda = $this->bandasModel->GetDetalleBanda($id);

    if ($banda)
      $this->bandasView->MostrarDetalleBanda($banda,$this->user);
    else 
      $this->homeView->noExiste("Esta banda no existe");
  }

  function noExiste() {
    $this->homeView->noExiste();
  }
  
}