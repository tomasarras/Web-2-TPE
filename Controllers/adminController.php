<?php 
require_once("./Views/adminView.php");
require_once("./Views/homeview.php");
require_once("./Helpers/AuthHelper.php");
require_once("./Model/bandasmodel.php");
require_once("./Model/eventosmodel.php");
require_once("./Model/UsuariosModel.php");

class AdminController {

    private $adminView;
    private $authHelper;
    private $bandasModel;
    private $eventosModel;
    private $UsuariosModel;
    private $homeView;

    function __construct() {
        $this->authHelper = new AuthHelper();
        $this->authHelper->verificarPermiso();
        $this->adminView = new AdminView();
        $this->bandasModel = new BandasModel();
        $this->eventosModel = new eventosmodel();
        $this->homeView = new homeview();
        $this->UsuariosModel = new UsuariosModel();
    }

    function mostrarUsuarios() {
        $usuarios = $this->UsuariosModel->getUsuarios();
        $this->adminView->mostrarUsuarios($usuarios);
    }

    function eliminarUsuario($params = null) {
        $id = $params[':ID'];
        $this->UsuariosModel->eliminarUsuario($id);
        header("Location: ".ADMINISTRAR_USUARIOS);
        die();
    }

    function getAdmin() {
        $this->adminView->mostrarAdmin();
    }

    function getBandas(){
        $bandas = $this->bandasModel->getBandasyEventos();
        $this->adminView->mostrarBandas($bandas);
    }

    function getEventos() {
        $eventos = $this->eventosModel->getEventosJoinBandas();
        $bandas = $this->bandasModel->getNombreBandas();

        $this->adminView->mostrarEventos($eventos,$bandas);
    }

    function agregarBanda() {
        $banda = $_POST['banda'];
        $cantidad = $_POST['cant-canciones'];
        $anio = $_POST['anio'];

        $this->bandasModel->agregarBanda($banda,$cantidad,$anio);
        header("Location: ".ADMINISTRAR_BANDAS);
        die();
    }

    function agregarEvento() {
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
        $id = $params[':ID'];
        $banda = $this->bandasModel->getBanda($id);

        if ($banda) {
            $this->adminView->mostrarEditarBanda($banda);
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

        $evento = $this->eventosModel->getEvento($id);
        if ($evento) {
            $bandas = $this->bandasModel->getBandasNombre();
            $this->adminView->mostrarEditarEvento($evento,$bandas);
        } else {
            $this->homeView->noExiste("Este evento no existe");
        }
    }
    
    function eliminarBanda($params = null) {
        $id = $params[':ID'];

        $this->bandasModel->eliminarBanda($id);
        header("Location: ".ADMINISTRAR_BANDAS);
        die();
    }

    function eliminarEvento($params = null) {
        $id = $params[':ID'];

        $this->eventosModel->eliminarEvento($id);
        header("Location: ".ADMINISTRAR_EVENTOS);
        die();
    }

}


?>