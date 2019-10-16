<?php
require_once "./Views/bandasviews.php";
require_once "./Model/bandasmodel.php";

class BandasController
{
    private $view;
    private $model;
    private $titulo;
    
    function __construct(){
        $this->view = new BandasView();
        $this->model = new BandasModel();
        $this->titulo = "La maquina del Metal";
    }
    function Home(){
        $bandas = $this->model->GetBandas();
        $this->view->Mostrar($this->titulo, $bandas);
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

        if( isset( $_GET['email']) && isset($_GET['password']) ){ 
            $email = $_GET['email']; 
            $password = $_GET['password'];
        } 


    }

    function getRegistro(){
        $this->view->getRegistro($this->titulo);

        if( isset( $_GET['email']) && isset($_GET['password']) ){ 
            $email = $_GET['email']; 
            $password = $_GET['password'];

            $this->model->registrarse($email,$password);
        } 
    }

}



?>