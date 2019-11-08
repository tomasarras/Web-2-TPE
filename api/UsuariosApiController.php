<?php
require_once("./Model/UsuariosModel.php");
require_once("./api/JSONView.php");
require_once("./api/ApiController.php");

class UsuariosApiController extends ApiController {

    private $data;

    public function __construct() {
        parent::__construct();
        $this->model = new UsuariosModel();
    }

    public function getUsuarios($params = null) {
        $usuarios = $this->model->getUsuarios();
        $this->view->response($usuarios, 200);
    }

    public function getUsuario($params = null) {
        $id = $params[':ID'];
        
        $usuario = $this->model->getUserById($id);        
        if ($usuario)
            $this->view->response($usuario, 200);
        else
            $this->view->response("El usuario con el id={$id} no existe", 404);
    } 

    public function eliminarUsuario($params = null) {
        $id = $params[':ID'];
        $usuario = $this->model->getUserById($id);
        if ($usuario) {
            $this->model->eliminarUsuario($id);
            $this->view->response("El usuario fue borrado con exito.", 200);
        } else
            $this->view->response("El usuario con el id={$id} no existe", 404);
    }

    public function agregarUsuario($params = null) {
        $body = $this->getData();
        $existe = $this->model->getUser($body->email);
        if (!$existe) {
            $id = $this->model->registrarse($body->email, $body->password);
            
            $usuario = $this->model->getUserById($id);
            if ($usuario)
                $this->view->response($usuario, 200);
        } else
            $this->view->response("El usuario ya existe",500);
    }
}