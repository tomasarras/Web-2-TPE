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
            "select evento.*, banda.banda as banda from evento inner join banda on evento.id_banda = banda.id_banda order by banda.banda"
           );
          $sentencia->execute();
          return $sentencia->fetchAll(PDO::FETCH_OBJ);
      }
      function getEventoFiltrado ($id){
          $sentencia = $this->db->prepare( "select evento.*, banda.banda as banda from evento inner join banda on evento.id_banda = banda.id_banda where evento.id_banda=? order by banda");
          $sentencia->execute(array($id));
          return $sentencia->fetchAll(PDO::FETCH_OBJ);
        }
      }

?>