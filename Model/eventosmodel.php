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

    function getEventosOrdenado($orden) {
      switch ( $orden ) {
        case "nombre": $oredenamiento = "nombre"; break;
        case "detalle": $oredenamiento = "detalle"; break;
        case "banda": $oredenamiento = "banda"; break;
        default: $oredenamiento = "nombre"; break;
      }

      $sql = "SELECT evento.*, banda.banda AS banda FROM evento
      INNER JOIN banda ON evento.id_banda = banda.id_banda
      ORDER BY $oredenamiento;";

      $sentencia = $this->db->prepare($sql);
      $sentencia->execute();
      //$sentencia->execute( array($orden) );
      return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function getEvento($id) {
      $sql = "SELECT * FROM evento WHERE id = ?";
      $sentencia = $this->db->prepare($sql);
      $sentencia->execute( array($id) );
      return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    function getEventoFiltrado ($id){
      $sentencia = $this->db->prepare( "select evento.*, banda.banda as banda from evento inner join banda on evento.id_banda = banda.id_banda where evento.id_banda=? order by banda");
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

    function agregarEvento($evento,$detalle,$id_banda) {
      $sql = "INSERT INTO evento(id,id_banda,nombre,detalle) VALUES (NULL,?,?,?)";
      $sentencia = $this->db->prepare($sql);
      $sentencia->execute(array(
        $id_banda,
        $evento,
        $detalle
      ));
    }

    function editarEvento($evento,$detalle,$idEvento,$idBanda) {
      $sql = "UPDATE evento SET
      nombre = ?,
      detalle = ?,
      id = ?,
      id_banda = ?
      WHERE id = ?";

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
      $sql = "DELETE FROM evento WHERE evento.id = ?";
      $sentencia = $this->db->prepare($sql);
      $sentencia->execute( array($id) );
    }
    function GetDetalleEvento($id){
      $sentencia = $this->db->prepare( "select evento.*, banda.banda as banda from evento inner join banda on evento.id_banda = banda.id_banda where evento.id=?");
      $sentencia->execute(array($id));
      return $sentencia->fetchAll(PDO::FETCH_OBJ);
  }

  }

?>