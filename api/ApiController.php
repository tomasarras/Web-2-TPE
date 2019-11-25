<?php
require_once("./api/JSONView.php");
use Firebase\JWT\JWT;
abstract class ApiController {
    protected $model;
    protected $view;

    private $data; 

    public function __construct() {
        $this->view = new JSONView();
        $this->data = file_get_contents("php://input"); 
    }

    function getData(){ 
        return json_decode($this->data); 
    } 

    function decode($token) {
        try {
            $decode = JWT::decode($token, TOKEN_KEY, array('HS256'));
            return $decode;
        } catch (\Firebase\JWT\SignatureInvalidException $e) {
            $this->view->response("Token invalido",401);
            die();
        } catch (\Firebase\JWT\ExpiredException $e) {
            $this->view->response("Token expirado",401);
            die();
        }
    }

    function getToken() {
        $headers = apache_request_headers();
        if (isset($headers["Authorization"])) {
            $authorization = $headers["Authorization"];
            $token = explode(" ",$authorization)[1];
            return $token;
        } else {
            $this->view->response("Missing Token",400);
            die();
        }
    }
}
