<?php
require_once("./Model/EventosModel.php");
require_once("./Model/BandasModel.php");
require_once("./api/JSONView.php");
require_once("./api/ApiController.php");

class EventosApiController extends ApiController {

    private $bandasModel;

    public function __construct() {
        parent::__construct();
        $this->model = new EventosModel();
        $this->bandasModel = new BandasModel();
    }

    public function getEventos($params = null) {
        $eventos = $this->model->getEventos();
        $this->view->response($eventos, 200);
    }

    public function getEvento($params = null) {
        $id = $params[':ID'];
        
        $evento = $this->model->getEvento($id);        
        if ($evento)
            $this->view->response($evento, 200);
        else
            $this->view->response("El evento con el id={$id} no existe", 404);
    } 

    public function eliminarEvento($params = null) {
        $id = $params[':ID'];
        
        $evento = $this->model->getEvento($id);

        if ($evento) {
            $this->model->eliminarEvento($id);
            $this->view->response("Se elimino el evento con el id={$id}", 200);
        } else
            $this->view->response("El evento con el id={$id} no existe", 404);
    } 

    public function agregarEvento() {
        $body = $this->getData();
        
        if ( isset($body->id_banda) && isset($body->evento) && isset($body->ciudad) && isset($body->detalle) ) {

            $banda = $this->bandasModel->getBanda($body->id_banda);
            //verifico que el id_banda de la banda que me pasa exista
            if ($banda) {
                $id = $this->model->agregarEvento($body->evento,$body->detalle,$body->id_banda,$body->ciudad);
                $this->view->response("Se creo el evento con el id={$id}", 200);
            } else
                $this->view->response("La banda con el id={$body->id_banda}, no existe", 502);

        } else 
            $this->view->response("Error datos incorrectos", 502);
    }


    public function modificarEvento($params = null) {
        $id = $params[':ID'];
        $body = $this->getData();
        
        if ( isset($body->id_banda) && isset($body->evento) && isset($body->ciudad) && isset($body->detalle) ) {
            
            $banda = $this->bandasModel->getBanda($body->id_banda);
            
            if ($banda) {
                $this->model->editarEvento($body->evento,$body->detalle,$id,$body->id_banda,$body->ciudad);
                $this->view->response("Se edito id={$id}", 200);
            } else
                $this->view->response("La banda con el id={$body->id_banda}, no existe", 502);
        } else
            $this->view->response("Error datos incorrectos", 502);
    }
}