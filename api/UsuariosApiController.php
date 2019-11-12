<?php
require_once("./Model/UsuariosModel.php");
require_once("./api/JSONView.php");
require_once("./api/ApiController.php");
require_once("./Helpers/AuthHelper.php");

class UsuariosApiController extends ApiController {

    private $authHelper;

    public function __construct() {
        parent::__construct();
        $this->model = new UsuariosModel();
        $this->authHelper = new AuthHelper();
        $this->authHelper->verificarPermiso();
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

    public function agregarUsuario() {
        $body = $this->getData();
        $existe = $this->model->getUser($body->email);
        if (!$existe) {
            
            $id = $this->model->registrarse($body->email, $body->password);

            
            $usuario = $this->model->getUserById($id);
            if ($usuario)
                $this->view->response($usuario, 200);
            else
                $this->view->response("Error", 502);
        } else
            $this->view->response("El usuario ya existe",500);
    }

    public function cambiarAdmin($params = null) {
        $id = $params[':ID'];
        $body = $this->getData();
        $existe = $this->model->getUserById($id);
        if ($existe) {
            
           $this->model->cambiarAdmin($id, $body->admin);

        } else {
            $this->view->response("El usuario con el id={$id} no existe", 404);
        }

    }
/*
    public function editarUsuario($params = null) {
        $id = $params[':ID'];
        $body = $this->getData();
        $usuario = $this->model->getUserById($id);
        if ($usuario) {
            $this->model->editarUsuario($id,$body->email,$body->password,$body->admin);
            $this->view->response("Se edito id={$id}", 200);
        } else
            $this->view->response("El usuario con el id={$id} no existe", 404);
    }*/
}