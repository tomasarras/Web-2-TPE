<?php
  class eventosmodel{
    private $db;

    function __construct(){
      $this->db = $this->connect();
    }

    private function connect() {
      try {
        return new PDO('mysql:host=localhost;'.'dbname=bandas;charset=utf8','root', '');
      } catch (Exception $e) {
        echo "ERROR: ". $e->getMessage();
      }
    }

    function getEventos(){
      $sentencia = $this->db->prepare(
        "SELECT evento.*, banda FROM evento INNER JOIN banda ON evento.id_banda = banda.id_banda ORDER BY banda.banda"
      );
      $sentencia->execute();
      return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function getEventosOrdenado($orden) {
      switch ( $orden ) {
        case "nombre": $oredenamiento = "nombre"; break;
        case "detalle": $oredenamiento = "detalle"; break;
        case "banda": $oredenamiento = "banda"; break;
        default: $oredenamiento = "nombre"; break;
      }

      $sql = "SELECT evento.*, banda.banda FROM evento
      INNER JOIN banda ON evento.id_banda = banda.id_banda
      ORDER BY $oredenamiento;";

      $sentencia = $this->db->prepare($sql);
      $sentencia->execute();
      //$sentencia->execute( array($orden) );
      return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function getEvento($id) {
      $sql = "SELECT * FROM evento WHERE id_evento = ?";
      $sentencia = $this->db->prepare($sql);
      $sentencia->execute( array($id) );
      return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    function getEventoFiltrado ($id){
      $sentencia = $this->db->prepare( "SELECT evento.*, banda.banda FROM evento INNER JOIN banda ON evento.id_banda = banda.id_banda WHERE evento.id_banda=? ORDER BY banda");
      $sentencia->execute(array($id));
      return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function getEventosJoinBandas() {
      $sql = "SELECT evento.*, banda.banda 
      FROM evento JOIN banda 
      ON evento.id_banda = banda.id_banda";

        $sentencia = $this->db->prepare($sql);
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function agregarEvento($evento,$detalle,$id_banda,$ciudad="") {
      $sql = "INSERT INTO evento(id_evento,id_banda,evento,detalle,ciudad) VALUES (NULL,?,?,?,?)";
      $sentencia = $this->db->prepare($sql);
      $sentencia->execute(array(
        $id_banda,
        $evento,
        $detalle,
        $ciudad
      ));
    }

    function editarEvento($evento,$detalle,$idEvento,$idBanda) {
      $sql = "UPDATE evento SET
      evento = ?,
      detalle = ?,
      id_evento = ?,
      id_banda = ?,
      ciudad = NULL
      WHERE id_evento = ?";

      $sentencia = $this->db->prepare($sql);
      $sentencia->execute(array(
        $evento,
        $detalle,
        $idEvento,
        $idBanda,
        $idEvento
      ));
    }

    function eliminarEvento($id) {
      $sql = "DELETE FROM evento WHERE evento.id_evento = ?";
      $sentencia = $this->db->prepare($sql);
      $sentencia->execute( array($id) );
    }
    function GetDetalleEvento($id){
      $sentencia = $this->db->prepare( "SELECT evento.*, banda.banda FROM evento INNER JOIN banda ON evento.id_banda = banda.id_banda WHERE evento.id_evento=?");
      $sentencia->execute(array($id));
      return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

  }

?>