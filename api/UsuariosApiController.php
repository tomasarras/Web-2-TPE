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
    }
    
    public function getUsuarios($params = null) {
        $this->authHelper->verificarPermiso();
        $usuarios = $this->model->getUsuarios();
        $this->view->response($usuarios, 200);
    }
    
    public function getUsuario($params = null) {
        $this->authHelper->verificarPermiso();
        $id = $params[':ID'];
        
        $usuario = $this->model->getUserById($id);        
        if ($usuario)
            $this->view->response($usuario, 200);
        else
            $this->view->response("El usuario con el id={$id} no existe", 404);
    }

    public function cambiarPassword( $params = null ) {
        $id = $params[":ID"];
        $body = $this->getData();
        session_start();
        if ( isset($_SESSION["email_recuperacion"]) ){
            $email = $_SESSION["email_recuperacion"];//recupero el email que almacene en la session
            $password = $body->password;
            $this->model->editarPassword($email,$id,$password);
            session_destroy();
            $this->view->response("Se cambio la contraseña",200);
        } else 
            $this->view->response("Error",502);

    }
    
    //me pasa el id del usuario y una respuesta y verifica si es correcta
    public function verificarRespuesta( $params = null ) {
        $id = $params[":ID"];//viene en la url
        $body = $this->getData();//viene del json de js
        if ($body->respuesta) {
            $respuesta = $body->respuesta; //la asigno a una variable

            $usuario = $this->model->getUserById($id);//pido al model el usuario

            if ($usuario) {//verifico que exista
                $hash = $usuario->respuesta;

                if ( password_verify($respuesta, $hash) ) {// verifico que la respuesta que me pase coincida
                    session_start();
                    $_SESSION["email_recuperacion"] = $usuario->email;//guardo el email en la session
                    
                    $this->view->response($id, 200);
                } else 
                    $this->view->response("respuesta incorrecta", 400);

            } else
                $this->view->response("El usuario con el id={$id} no existe", 404);
        } else 
            $this->view->response("respuesta invalida", 400);
    }

    public function getUsuarioByEmail( $params = null ) {
        $email = $params[":EMAIL"];
        $usuario = $this->model->getUserByEmail($email);

        //creo el objeto que voy a devolver y le asigno valores
        $user = new stdClass();
        $user->id = $usuario->id_usuario;
        $user->email = $usuario->email;
        $user->pregunta = $usuario->pregunta;

        if ($usuario)
            $this->view->response($user,200);
        else
            $this->view->response("El email={$email} no existe", 404);
    }
    
    public function eliminarUsuario($params = null) {
        $this->authHelper->verificarPermiso();
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
        $existeEmail = $this->model->getUserByEmail($body->email);
        $existeNombre = $this->model->getUserByNombre($body->usuario);
        
        
        if ($existeEmail) {
            $this->view->response("El email ya existe",400);
            die();
        }
        
        if ($existeNombre) {
            $this->view->response("El usuario ya existe",400);
            die();
        }
        
        $id = $this->model->registrarse($body->email, $body->password,$body->usuario,$body->pregunta,$body->respuesta);
        session_start();
        $_SESSION["id_usuario"] = $id;
        $_SESSION["email"] = $body->email;
        $_SESSION["nombre"] = $body->usuario;
        $_SESSION["admin"] = "0";
        $this->view->response("Se creo el usuario",200);
        
    }

    public function cambiarAdmin($params = null) {
        $this->authHelper->verificarPermiso();
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