<?php 
require_once("./Views/adminView.php");
require_once("./Views/homeview.php");
require_once("./Helpers/AuthHelper.php");
require_once("./Model/bandasmodel.php");
require_once("./Model/eventosmodel.php");

class AdminController {

    private $adminView;
    private $authHelper;
    private $logueado;
    private $bandasModel;
    private $eventosModel;
    private $homeView;

    function __construct() {
        $this->adminView = new AdminView();
        $this->authHelper = new AuthHelper();
        $this->bandasModel = new BandasModel();
        $this->eventosModel = new eventosmodel();
        $this->homeView = new homeview();
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

        $banda = $_POST['banda'];
        $cantidad = $_POST['cant-canciones'];
        $anio = $_POST['anio'];

        $this->bandasModel->agregarBanda($banda,$cantidad,$anio);
        header("Location: ".ADMINISTRAR_BANDAS);
        die();
    }

    function agregarEvento() {
        $this->authHelper->verificarPermiso();

        $evento = $_POST['evento'];
        $detalle = $_POST['detalle'];
        $id_banda = $_POST['id_banda'];

        $this->eventosModel->agregarEvento($evento,$detalle,$id_banda);
        header("Location: ".ADMINISTRAR_EVENTOS);
        die();
    }

    function editarBanda($params = null) {
        $id = $params[':ID'];
        if ( isset($_POST['banda']) && isset($_POST['cant-canciones']) && isset($_POST['anio']) ) {
            $banda = $_POST['banda'];
            $cantidad = $_POST['cant-canciones'];
            $anio = $_POST['anio'];
    
            $this->bandasModel->editarBanda($banda,$cantidad,$anio,$id);
            header("Location: ". ADMINISTRAR_BANDAS);
            die();
        }
    }

    function getBanda($params = null) {
        $this->authHelper->verificarPermiso();
        $id = $params[':ID'];
        $banda = $this->bandasModel->getBanda($id);

        if ($banda) {
            $this->adminView->mostrarEditarBanda("Editar banda",$banda);
        } else {
            $this->homeView->noExiste("Esta banda no existe");
        }
    }

    function editarEvento($params = null) {
        $id = $params[':ID'];
        if ( isset($_POST['evento']) && isset($_POST['detalle']) && isset($_POST['id_banda']) ) {
            $evento = $_POST['evento'];
            $detalle = $_POST['detalle'];
            $idBanda = $_POST["id_banda"];
            
            $this->eventosModel->editarEvento($evento,$detalle,$id,$idBanda);
            header("Location: ".ADMINISTRAR_EVENTOS);
            die();
        }
    }

    function getEvento($params = null) {
        $id = $params[':ID'];
        $this->authHelper->verificarPermiso();

        $evento = $this->eventosModel->getEvento($id);
        if ($evento) {
            $bandas = $this->bandasModel->getBandasNombre();
            $this->adminView->mostrarEditarEvento("Editar evento",$evento,$bandas);
        } else {
            $this->homeView->noExiste("Este evento no existe");
        }
    }
    
    function eliminarBanda($params = null) {
        $id = $params[':ID'];
        $this->authHelper->verificarPermiso();

        $this->bandasModel->eliminarBanda($id);
        header("Location: ".ADMINISTRAR_BANDAS);
        die();
    }

    function eliminarEvento($params = null) {
        $id = $params[':ID'];
        $this->authHelper->verificarPermiso();

        $this->eventosModel->eliminarEvento($id);
        header("Location: ".ADMINISTRAR_EVENTOS);
        die();
    }

}


?>