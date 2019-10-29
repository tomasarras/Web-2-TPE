<?php 
require_once "./Views/adminView.php";
require_once "AuthHelper.php";
require_once "./Model/bandasmodel.php";

class AdminController {

    private $adminView;
    private $authHelper;
    private $logueado;
    private $bandasModel;

    function __construct() {
        $this->adminView = new AdminView();
        $this->authHelper = new AuthHelper();
        $this->bandasModel = new BandasModel();
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
    
    function eliminarBanda() {
        $this->authHelper->verificarPermiso();

        if ( isset($_POST['id']) ) {
            $bandaId = $_POST['id'];
            $this->bandasModel->eliminarBanda($bandaId);
        }
        header("Location: ".ADMINISTRAR_BANDAS);
        die();
    }

}


?>