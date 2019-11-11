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

    public function getComentariosByEvento($params = null) {
        $id = $params[":ID"];
        $comentarios = $this->model->getComentariosByEvento($id);
        $this->view->response($comentarios, 200);
    }

    public function getUsuario($params = null) {
        $id = $params[':ID'];
        
        $comentario = $this->model->getComentarioById($id);        
        if ($comentario)
            $this->view->response($comentario, 200);
        else
            $this->view->response("El comentario con el id={$id} no existe", 404);
    } 

    public function eliminarUsuario($params = null) {
        $id = $params[':ID'];
        $comentario = $this->model->getComentarioById($id);
        if ($comentario) {
            $this->model->eliminarUsuario($id);
            $this->view->response("El comentario fue borrado con exito.", 200);
        } else
            $this->view->response("El comentario con el id={$id} no existe", 404);
    }

    public function enviarComentario($params = null) {
        $logueado = $this->authHelper->isLoged();

        if ( !$logueado ) {
            $this->view->response("Necesitas iniciar sesion para comentar",502);
            die();
        }

        $body = $this->getData();
        
        $id_usuario = $_SESSION["id_usuario"];
        $id_evento = $body->id_evento;
        $comentario = $body->comentario;
        $puntaje = $body->puntaje;

        $id = $this->model->enviarComentario($id_usuario,$id_evento,$comentario,$puntaje);
        if ($id)
            $this->view->response("Comentario enviado",200);
        else
            $this->view->response("Error al enviar el comentario", 500);
    }

    
}