<?php
require_once("./Model/UsuariosModel.php");
require_once("./api/JSONView.php");
require_once("./api/ApiController.php");
require_once("./Helpers/AuthHelper.php");

require_once("./php-jwt/src/JWT.php");
require('./php-jwt/src/ExpiredException.php'); //mensaje de token expirado
require('./php-jwt/src/SignatureInvalidException.php'); //mensaje de token invalido
use Firebase\JWT\JWT;

class UsuariosApiController extends ApiController {

    private $authHelper;

    public function __construct() {
        parent::__construct();
        $this->model = new UsuariosModel();
        $this->authHelper = new AuthHelper();
    }

    public function logIn() {
        $body = $this->getData();
        $usuario = $this->model->getUserByNombre($body->user);
        if (!$usuario)
            $usuario = $this->model->getUserByEmail($body->user);
        
        if ($usuario) {
            $hash = $usuario->password;
            
            if ( password_verify($body->password, $hash) ){
                $token = $this->generateToken($usuario->id_usuario,$usuario->admin);
                $this->view->response($token,200);
            } else {
                $this->view->response("El usuario o contraseña no es valido",401);
            }

        } else {
            $this->view->response("El usuario o contraseña no es valido",401);
        }
    }
    
    public function signUp() {
        $body = $this->getData();

        $email = $this->model->getUserByEmail($body->email);

        if ($email) {
            $this->view->response("El email ya existe", 500);
            die();
        }
        
        $usuario = $this->model->getUserByNombre($body->nombre);

        if ($usuario) {
            $this->view->response("El usuario ya existe", 500);
            die();
        }

        $id = $this->model->
        registrarse($body->email,$body->password,$body->nombre,$body->pregunta,$body->respuesta);

        $token = $this->generateToken($id,'0');
        $this->view->response($token,201);
    }

    public function generateToken( $id_usuario,$admin ) {
        $time = time();//fecha y hora actual
  
        $payload = array(
          "sub" => $id_usuario,
          "admin" => $admin,
          "iat" => $time, //tiempo en el que se crea
          "exp" => $time + 3600,//tiempo en el que expira (1 hora)
        );
  
        $jwt = JWT::encode($payload,TOKEN_KEY);//codifica el token
        return $jwt;
      }
    
    public function getUsuarios($params = null) {
        $token = $this->getToken();
        $user = $this->decode($token);
        if ($user->admin) {
            $usuarios = $this->model->getUsuarios();
            $this->view->response($usuarios, 200);
        } else {
            $this->view->response("Necesitas ser administrador para ver usuarios",403);
        }
    }
    
    public function getUsuario($params = null) {
        $token = $this->getToken();
        $user = $this->decode($token);
        if ($user->admin) {
            $id = $params[':ID'];
            
            $usuario = $this->model->getUserById($id);        
            if ($usuario) {

                $respuesta = new stdClass();
                $respuesta->nombre = $usuario->nombre;
                $respuesta->email = $usuario->email;
                $respuesta->pregunta = $usuario->pregunta;
                $respuesta->admin = $usuario->admin;
                $respuesta->id_usuario = $usuario->id_usuario;

                $this->view->response($respuesta, 200);
            }
            else
                $this->view->response("El usuario con el id={$id} no existe", 404);
        } else {
            $this->view->response("Necesitas ser administrador para ver un usuario",403);
        }
    }

    public function cambiarPassword( $params = null ) {
        $body = $this->getData();
        $token = $this->getToken();
        $user = $this->decode($token);
        $email = $user->sub;
        $id = $this->model->getUserByEmail($email)->id_usuario;
        $password = $body->password;
        $this->model->editarPassword($email,$id,$password);
        session_destroy();
        $this->view->response("Se cambio la contraseña",200);
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
                    $token = $this->generateToken($usuario->email,'0');
                    
                    $this->view->response($token, 200);
                } else 
                    $this->view->response("respuesta incorrecta", 400);

            } else
                $this->view->response("El usuario con el id={$id} no existe", 404);
        } else 
            $this->view->response("respuesta invalida", 400);
    }

    
    public function eliminarUsuario($params = null) {
        $token = $this->getToken();
        $user = $this->decode($token);
        if ($user->admin) {
            $id = $params[':ID'];
            $usuario = $this->model->getUserById($id);
            if ($usuario) {
                $this->model->eliminarUsuario($id);
                $this->view->response("El usuario fue borrado con exito.", 200);
            } else
                $this->view->response("El usuario con el id={$id} no existe", 404);
        } else {
            $this->view->response("Necesitar ser administrador para eliminar usuarios",403);
        }
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
        $token = $this->getToken();
        $user = $this->decode($token);
        if ($user->admin) {
                
            $id = $params[':ID'];
            $body = $this->getData();
            $existe = $this->model->getUserById($id);
            if ($existe) {
                
                $this->model->cambiarAdmin($id, $body->admin);
                
            } else {
                $this->view->response("El usuario con el id={$id} no existe", 404);
            }
        } else {
            $this->view->response("Necesitas ser administrador para hacer admin a otro usuario",403);
        }
        
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