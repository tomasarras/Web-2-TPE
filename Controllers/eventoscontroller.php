<?php
require_once "./Model/eventosmodel.php";
require_once "./Views/eventosview.php";
 

       class eventoscontroller{
           private $view;
           private $model;


        function __construct(){
        $this->view = new eventosview();
        $this->model = new eventosmodel();
        }

        function mostrar(){
        $eventos = $this->model->getEventos();
        $this->view->ver($eventos);
        }
  

       }





?>