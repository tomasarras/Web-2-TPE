<?php
require_once("./Model/ComentariosModel.php");
require_once("./api/JSONView.php");
require_once("./api/ApiController.php");
require_once("./Helpers/AuthHelper.php");

class ComentariosApiController extends ApiController {

    private $authHelper;

    public function __construct() {
        parent::__construct();
        $this->model = new ComentariosModel();
    }

    public function borrarComentario($params = null) {
        $this->verificarAdmin();
        $id_comentario = $params[":ID_COMENTARIO"];

        $comentario = $this->model->getComentario($id_comentario);
        if ($comentario) {
            $this->model->borrarComentario($id_comentario);
            $this->view->response("Se elimino el comentario id={$id_comentario}",200);
        } else
            $this->view->response("El comentario con el id={$id_comentario} no existe", 404);
    }
    

    public function getComentario($params = null) {
        $id = $params[":ID"];

        $comentario = $this->model->getComentario($id);
        if ($comentario)
            $this->view->response($comentario,200);
        else
            $this->view->response("El comentario con el id={$id} no existe", 404);
    }

    public function getComentarios($params = null) {
        $id_evento = $params[":ID_EVENTO"];
        if (isset($_GET["fecha"])) {
            $comentarios = $this->model->getComentariosByEvento($id_evento,"fecha");
            if ($_GET["fecha"] == "des")
                $comentarios = array_reverse($comentarios);
        } 
        else if (isset($_GET["puntaje"])) {
                $comentarios = $this->model->getComentariosByEvento($id_evento,"puntaje");
                if ($_GET["puntaje"] == "des")
                    $comentarios = array_reverse($comentarios);
            }
        else {
            $comentarios = $this->model->getComentariosByEvento($id_evento);
            $comentarios = array_reverse($comentarios);

        }

        $this->view->response($comentarios, 200);
    }

    public function enviarComentario($params = null) {
        $id_usuario = $this->checkLog();
        $body = $this->getData();
        
        if ($body->comentario != '' && $body->puntaje > '0' && $body->puntaje < '6') {
            $id_evento = $params[":ID_EVENTO"];
            $comentario = $body->comentario;
            $puntaje = $body->puntaje;
            date_default_timezone_set('UTC');
            $fecha = date(DATE_W3C);

            $id = $this->model->enviarComentario($id_usuario,$id_evento,$comentario,$puntaje,$fecha);
            $coment = $this->model->getComentario($id);
            $this->view->response($coment,200);
        } else {
            $this->view->response("Falta comentario o puntaje",400);
        }

    }

}