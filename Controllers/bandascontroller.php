<?php
require_once "./Views/bandasviews.php";
require_once "./Model/bandasmodel.php";

class BandasController
{
    private $view;
    private $model;

    
    function __construct(){
        $this->view = new BandasView();
        $this->model = new BandasModel();
    }
    function Home(){
        $bandas = $this->model->GetBandas();
        $this->view->Mostrar($bandas);
    }

    function getNoticias(){
        $bandas = $this->model->GetBandas();
        $eventos = $this->model->getEventos();
        

        foreach($bandas as $banda){
            $banda->eventos = array();
            foreach($eventos as $evento){
                if ($banda->id_banda == $evento->id_banda){
                    array_push($banda->eventos, $evento);
                }
            }
        }
        
        $this->view->getNoticias($this->titulo, $bandas);
    }

    function getLogin(){
        $this->view->getLogin($this->titulo);

        if( isset( $_POST['email']) && isset($_POST['password']) ){ 
            $email = $_POST['email']; 
            $password = $_POST['password'];

            $usuario = $this->model->getUsuario($email,$password);
            $hash = $usuario->contraseña;

            if ( password_verify($password, $hash) ){
                //logeado
            } else {
                //incorrecto
            }
        } 
    }

    function getRegistro(){
        $this->view->getRegistro($this->titulo);

        if( isset( $_POST['email']) && isset($_POST['password']) ){ 
            $email = $_POST['email']; 
            $password = $_POST['password'];

            $this->model->registrarse($email,$password);
        } 
    }

}



?>