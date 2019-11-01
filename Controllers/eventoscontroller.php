<?php
      require_once("./Model/eventosmodel.php");
      require_once("./Views/eventosview.php");
 

      class eventoscontroller{
            private $eventosView;
            private $eventosModel;


            function __construct(){
                  $this->eventosView = new eventosview();
                  $this->eventosModel = new eventosmodel();
            }

            function mostrar(){
                  $eventos = $this->eventosModel->getEventos();
                  $this->eventosView->ver($eventos);
            }

      }
?>