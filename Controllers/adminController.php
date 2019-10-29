<?php 
require_once "./Views/adminView.php";
require_once "AuthHelper.php";
require_once "./Model/bandasmodel.php";
require_once "./Model/eventosmodel.php";

class AdminController {

    private $adminView;
    private $authHelper;
    private $logueado;
    private $bandasModel;
    private $eventosModel;

    function __construct() {
        $this->adminView = new AdminView();
        $this->authHelper = new AuthHelper();
        $this->bandasModel = new BandasModel();
        $this->eventosModel = new eventosmodel();
    }

    function getAdmin() {
        $this->authHelper->verificarPermiso();
        $this->adminView->mostrarAdmin("Administrar");
    }

    function getBandas(){
        $this->authHelper->verificarPermiso();

        $bandas = $this->bandasModel->getBandasyEventos();
        $this->adminView->mostrarBandas("Administrar bandas",$bandas);
    }

    function getEventos() {
        $this->authHelper->verificarPermiso();

        $eventos = $this->eventosModel->getEventosJoinBandas();
        $bandas = $this->bandasModel->getNombreBandas();

        $this->adminView->mostrarEventos("Administrar eventos",$eventos,$bandas);
    }

    function agregarBanda() {
        $this->authHelper->verificarPermiso();

        if ( isset($_POST['banda']) && isset($_POST['cant-canciones']) && isset($_POST['anio']) ) {
            $banda = $_POST['banda'];
            $cantidad = $_POST['cant-canciones'];
            $anio = $_POST['anio'];

            $this->bandasModel->agregarBanda($banda,$cantidad,$anio);
        }
        header("Location: ".ADMINISTRAR_BANDAS);
        die();
    }

    function agregarEvento() {
        $this->authHelper->verificarPermiso();

        if ( isset($_POST['evento']) && isset($_POST['detalle']) && isset($_POST['id_banda']) ) {
            $evento = $_POST['evento'];
            $detalle = $_POST['detalle'];
            $id_banda = $_POST['id_banda'];

            $this->eventosModel->agregarEvento($evento,$detalle,$id_banda);
        }
        header("Location: ".ADMINISTRAR_EVENTOS);
        die();
    }

    function editarBanda() {
        $this->authHelper->verificarPermiso();

        if ( isset($_POST['banda']) && isset($_POST['cant-canciones']) && isset($_POST['anio']) && isset($_POST['id']) ) {
            $banda = $_POST['banda'];
            $cantidad = $_POST['cant-canciones'];
            $anio = $_POST['anio'];
            $id = $_POST["id"];

            $this->bandasModel->editarBanda($banda,$cantidad,$anio,$id);
        }
        header("Location: ".ADMINISTRAR_BANDAS);
        die();
    }

    function editarEvento() {

        $this->authHelper->verificarPermiso();

        if ( isset($_POST['evento']) && isset($_POST['detalle']) && isset($_POST['id_evento']) && isset($_POST['id_banda']) ) {
            $evento = $_POST['evento'];
            $detalle = $_POST['detalle'];
            $idEvento = $_POST['id_evento'];
            $idBanda = $_POST["id_banda"];

            $this->eventosModel->editarEvento($evento,$detalle,$idEvento,$idBanda);
        }

        header("Location: ".ADMINISTRAR_EVENTOS);
        die();
    }
    
    function eliminarBanda() {
        $this->authHelper->verificarPermiso();

        if ( isset($_POST['id']) ) {
            $bandaId = $_POST['id'];
            $this->bandasModel->eliminarBanda($bandaId);
        }
        header("Location: ".ADMINISTRAR_BANDAS);
        die();
    }

    function eliminarEvento() {
        $this->authHelper->verificarPermiso();

        if ( isset($_POST['id_evento']) ) {
            $idEvento = $_POST['id_evento'];
            $this->eventosModel->eliminarEvento($idEvento);
        }
        header("Location: ".ADMINISTRAR_EVENTOS);
        die();
    }

}


?>