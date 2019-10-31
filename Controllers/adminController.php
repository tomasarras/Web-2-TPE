<?php 
require_once "./Views/adminView.php";
require_once "./Helpers/AuthHelper.php";
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

    function editarBanda($id) {
        $this->authHelper->verificarPermiso();

        if ( isset($_POST['banda']) && isset($_POST['cant-canciones']) && isset($_POST['anio']) ) {
            $banda = $_POST['banda'];
            $cantidad = $_POST['cant-canciones'];
            $anio = $_POST['anio'];

            $this->bandasModel->editarBanda($banda,$cantidad,$anio,$id);
            header("Location: ". ADMINISTRAR_BANDAS);
            die();
        }

        $banda = $this->bandasModel->getBanda($id);
        $this->adminView->mostrarEditarBanda("Editar banda",$banda);
    }

    function editarEvento($id) {

        $this->authHelper->verificarPermiso();

        $evento = $this->eventosModel->getEvento($id);
        $bandas = $this->bandasModel->getBandasNombre();

        if ( isset($_POST['evento']) && isset($_POST['detalle']) && isset($_POST['id_banda']) ) {
            $evento = $_POST['evento'];
            $detalle = $_POST['detalle'];
            $idBanda = $_POST["id_banda"];

            $this->eventosModel->editarEvento($evento,$detalle,$id,$idBanda);
            header("Location: ".ADMINISTRAR_EVENTOS);
            die();
        }

        $this->adminView->mostrarEditarEvento("Editar evento",$evento,$bandas);
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