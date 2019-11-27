<?php 
require_once("./Views/AdminView.php");
require_once("./Views/HomeView.php");
require_once("./Helpers/AuthHelper.php");
require_once("./Model/BandasModel.php");
require_once("./Model/EventosModel.php");
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
        $this->eventosModel = new EventosModel();
        $this->homeView = new Homeview();
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
    }

    public function cambiarAdmin( $params = null ) {
        $id = $params[":ID"];
        $user = $this->UsuariosModel->getUserById($id);
        $this->UsuariosModel->cambiarAdmin($id,!$user->admin);
        header("Location: ". ADMINISTRAR_USUARIOS);
    }

    function getAdmin() {
        $this->adminView->mostrarAdmin();
    }

    function getBandas(){
        $bandas = $this->bandasModel->getBandasyEventos();
        $this->adminView->mostrarBandas($bandas);
    }

    function getEventos() {
        $eventos = $this->eventosModel->getEventosConBanda();
        $bandas = $this->bandasModel->getNombreBandas();

        $this->adminView->mostrarEventos($eventos,$bandas);
    }

    function agregarBanda() {
        if (isset($_POST['banda']) && isset($_POST['cant-canciones']) && isset($_POST['anio']) &&
            $_POST['banda'] != '' && $_POST['cant-canciones'] =! '' && $_POST['anio'] != '') {

            $banda = $_POST['banda'];
            $cantidad = $_POST['cant-canciones'];
            $anio = $_POST['anio'];
            
            $this->bandasModel->agregarBanda($banda,$cantidad,$anio);
            header("Location: ".ADMINISTRAR_BANDAS);
        }
    }

    function editarEvento($params = null) {
        $id = $params[':ID'];
        if ( isset($_POST['evento']) && isset($_POST['detalle']) && 
             isset($_POST['id_banda']) && isset($_POST["ciudad"]) ) {
            if ($_POST['evento'] != '' && $_POST['detalle'] != '' &&
            $_POST['id_banda'] != '' && $_POST["ciudad"] != '') {

                $evento = $_POST['evento'];
                $detalle = $_POST['detalle'];
                $idBanda = $_POST["id_banda"];
                $ciudad = $_POST["ciudad"];

                $this->agregarImagenes($id);
                $this->eventosModel->editarEvento($evento,$detalle,$id,$idBanda,$ciudad);
                header("Location: ".ADMINISTRAR_EVENTOS);
            }
        }
    }
    

    function agregarEvento() {

        if (isset($_POST["evento"]) && isset($_POST["detalle"]) && isset($_POST["id_banda"]) && isset($_POST["ciudad"])) {
            if ($_POST["evento"] != '' && $_POST["detalle"] != '' && $_POST["id_banda"] != '' && $_POST["ciudad"] != '') {
                $evento = $_POST['evento'];
                $detalle = $_POST['detalle'];
                $id_banda = $_POST['id_banda'];
                $ciudad = $_POST["ciudad"];

                $id_evento = $this->eventosModel->agregarEvento($evento,$detalle,$id_banda,$ciudad);
                
                $this->agregarImagenes($id_evento);
            }
        }

        header("Location: ".ADMINISTRAR_EVENTOS);
    }

    function agregarImagenes($id_evento){
        $cantidadArchivos = count($_FILES["imagesToUpload"]["name"]);

            for ($i = 0; $i < $cantidadArchivos; $i++) {

                $type     = $_FILES["imagesToUpload"]["type"][$i];
                $name     = $_FILES["imagesToUpload"]["name"][$i];
                $tmp_name = $_FILES["imagesToUpload"]["tmp_name"][$i];

                if (   $type == "image/jpg"
                    || $type == "image/jpeg"
                    || $type == "image/png" ) {

                        
                        $filePath = "images/eventos/" . uniqid("", true) . "." 
                        . strtolower(pathinfo($name, PATHINFO_EXTENSION));
                        
                        move_uploaded_file($tmp_name, $filePath);
                        $this->eventosModel->agregarImagen($id_evento,$filePath);
                } 
            }
    }

    function editarBanda($params = null) {
        $id = $params[':ID'];
        if ( isset($_POST['banda']) && isset($_POST['cant-canciones']) && isset($_POST['anio']) &&
            $_POST['banda'] != '' && $_POST['cant-canciones'] != '' && $_POST['anio'] != '') {
            $banda = $_POST['banda'];
            $cantidad = $_POST['cant-canciones'];
            $anio = $_POST['anio'];
    
            $this->bandasModel->editarBanda($banda,$cantidad,$anio,$id);
            header("Location: ". ADMINISTRAR_BANDAS);
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

    function showEditarEvento($params = null) {
        $id = $params[':ID'];

        $evento = $this->eventosModel->getEvento($id);
        if ($evento) {
            $bandas = $this->bandasModel->getNombreBandas();
            $imagenes = $this->eventosModel->getImagenesEvento($id);
            $this->adminView->mostrarEditarEvento($evento,$bandas,$imagenes);
        } else {
            $this->homeView->noExiste("Este evento no existe");
        }
    }
    
    function eliminarBanda($params = null) {
        $id = $params[':ID'];

        $this->bandasModel->eliminarBanda($id);
        header("Location: ".ADMINISTRAR_BANDAS);
    }

    function eliminarEvento($params = null) {
        $id = $params[':ID'];

        $this->eventosModel->eliminarEvento($id);
        header("Location: ".ADMINISTRAR_EVENTOS);
    }
    

    public function eliminarImagen( $params = null ) {
        $id_imagen = $params[":ID_IMAGEN"];
        $id_evento = $params[":ID_EVENTO"];
        $this->eventosModel->eliminarImagen($id_imagen);
        header("Location: ".EDITAR_EVENTO . $id_evento);
    }
}



?>