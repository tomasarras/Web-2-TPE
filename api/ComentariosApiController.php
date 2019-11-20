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
        $this->authHelper = new AuthHelper();
    }

    public function borrarComentario($params = null) {
        $this->authHelper->verificarPermiso();
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
        $comentarios = $this->model->getComentariosByEvento($id_evento);

        $this->view->response($comentarios, 200);
    }

    public function enviarComentario($params = null) {
        $logueado = $this->authHelper->isLoged();

        if ( !$logueado ) {
            $this->view->response("Necesitas iniciar sesion para comentar",502);
            die();
        }

        $body = $this->getData();
        
        $id_usuario = $_SESSION["id_usuario"];
        $id_evento = $params[":ID_EVENTO"];
        $comentario = $body->comentario;
        $puntaje = $body->puntaje;

        $id = $this->model->enviarComentario($id_usuario,$id_evento,$comentario,$puntaje);
        if ($id)
            $this->view->response("Comentario enviado id={$id}",200);
        else
            $this->view->response("Error al enviar el comentario", 500);
    }

    
}