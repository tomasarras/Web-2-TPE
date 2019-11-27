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
        $id = $params[":ID"];
        $body = $this->getData();
        if ($body->respuesta) {
            $respuesta = $body->respuesta; 

            $usuario = $this->model->getUserById($id);

            if ($usuario) {
                $hash = $usuario->respuesta;

                if ( password_verify($respuesta, $hash) ) {// verifico que la respuesta que me pase coincida
                    session_start();
                    $_SESSION["email_recuperacion"] = $usuario->email;
                    
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
        
        if ($usuario){
            //creo el objeto que voy a devolver y le asigno valores
            $user = new stdClass();
            $user->id = $usuario->id_usuario;
            $user->email = $usuario->email;
            $user->nombre = $usuario->nombre;
            $user->pregunta = $usuario->pregunta;

            $this->view->response($user,200);
        } else
            $this->view->response("El email={$email} no existe", 404);
    }

    public function getUsuarioByNombre( $params = null ) {
        $nombre = $params[":NOMBRE"];

        $usuario = $this->model->getUserByNombre($nombre);
        
        if ($usuario) {
        //creo el objeto que voy a devolver y le asigno valores
        $user = new stdClass();
        $user->id = $usuario->id_usuario;
        $user->email = $usuario->email;
        $user->nombre = $usuario->nombre;
        $user->pregunta = $usuario->pregunta;

            $this->view->response($user,200);
        } else
            $this->view->response("El nombre={$nombre} no existe", 404);
        
    }
}