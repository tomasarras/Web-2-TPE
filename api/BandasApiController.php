<?php
require_once("./Model/BandasModel.php");
require_once("./Model/EventosModel.php");
require_once("./api/JSONView.php");
require_once("./api/ApiController.php");

class BandasApiController extends ApiController {
    private $eventosModel;

    public function __construct() {
        parent::__construct();
        $this->model = new BandasModel();
        $this->eventosModel = new EventosModel();
    }

    public function getBandas($params = null) {
        if (isset($_GET["evento"])) 
            $bandas = $this->model->getBandasyEventos();
        else 
            $bandas = $this->model->GetBandas();
            
        $this->view->response($bandas, 200);
    }
    

    public function getBanda($params = null) {
        $id = $params[':ID'];
        
        $banda = $this->model->getBanda($id);        
        if ($banda)
            $this->view->response($banda, 200);
        else
            $this->view->response("La banda con el id={$id} no existe", 404);
    } 

    public function eliminarBanda($params = null) {
        $this->verificarAdmin();
        $id = $params[':ID'];
        $banda = $this->model->getBanda($id);
        if ($banda) {
            $eventos = $this->eventosModel->getEventosDeBanda($id);
            if (!$eventos) {
                $this->model->eliminarBanda($id);
                $this->view->response("La banda fue borrada con exito.", 200);
            } else
            $this->view->response("No se puede borrar esta banda porque pertenece a uno o mas eventos.", 502);
            
        } else
        $this->view->response("La banda con el id={$id} no existe", 404);
    }
        
    public function agregarBanda() {
        $this->verificarAdmin();
        $body = $this->getData();
        if ( isset($body->banda) && isset($body->anio) && isset($body->cantidad_canciones) 
            && $body->banda != '' && $body->anio != '' && $body->cantidad_canciones != '') {

            $id = $this->model->agregarBanda($body->banda, $body->cantidad_canciones,$body->anio);
            
            $banda = $this->model->getBanda($id);
            if ($banda)
                $this->view->response($banda, 200);

        } else 
            $this->view->response("Error datos incorrectos", 400);
    }

    public function modificarBanda($params = null) {
        $this->verificarAdmin();
        $id = $params[':ID'];
        $body = $this->getData();
        if ( isset($body->banda) && isset($body->anio) && isset($body->cantidad_canciones) 
            && $body->banda != '' && $body->anio != '' && $body->cantidad_canciones != '') {

            $banda = $this->model->getBanda($id);
            
            if ($banda) {
                $this->model->editarBanda($body->banda, $body->cantidad_canciones,$body->anio,$id);
                $respuesta = $this->model->getBanda($id);
                $this->view->response($respuesta, 200);
            } else
                $this->view->response("La banda con el id={$id} no existe", 404);
        } else
            $this->view->response("Error datos incorrectos", 400);
    }
}