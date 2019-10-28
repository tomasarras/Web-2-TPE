<?php
     class eventosmodel{
      private $db;

      function __construct(){
          $this->db = $this->connect();
      }
      private function connect() {
        return new PDO('mysql:host=localhost;'.'dbname=bandas;charset=utf8','root', '');
      }
      function getEventos(){
          $sentencia = $this->db->prepare(
            "SELECT evento.*, banda.banda AS banda FROM evento
           JOIN banda ON evento.id_banda = evento.id_banda"
           );
          $sentencia->execute();
          return $sentencia->fetchAll(PDO::FETCH_OBJ);
      }
     }



?>