<?php
  class EventosModel {
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
        "SELECT * FROM evento"
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

    // devuelve todos los eventos que tengan esa banda
    public function getEventosDeBanda($id_banda) {
      $sql = "SELECT evento.evento 
      FROM evento 
      JOIN banda 
      ON banda.id_banda = evento.id_banda 
      WHERE banda.id_banda = ?;";

      $sentencia = $this->db->prepare($sql);
      $sentencia->execute( array($id_banda) );
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

    function getEventosConBanda() {
      $sql = "SELECT evento.*, banda.banda 
      FROM evento JOIN banda 
      ON evento.id_banda = banda.id_banda";

        $sentencia = $this->db->prepare($sql);
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function agregarEvento($evento,$detalle,$id_banda,$ciudad) {
      $sql = "INSERT INTO evento(id_evento,id_banda,evento,detalle,ciudad) VALUES (NULL,?,?,?,?)";
      $sentencia = $this->db->prepare($sql);
      $sentencia->execute(array(
        $id_banda,
        $evento,
        $detalle,
        $ciudad
      ));
      return $this->db->lastInsertId();
    }

    function agregarImagen($id_evento,$filePath) {
        $sql = "INSERT INTO imagen_evento(id_imagen,id_evento,ruta) VALUES (NULL,?,?)";
        $sentencia = $this->db->prepare($sql);
        $sentencia->execute(array(
          $id_evento,
          $filePath
        ));
        return $this->db->lastInsertId();
    }

    function getImagenesEvento($id) {
        $sql = "SELECT ruta 
        FROM imagen_evento JOIN evento 
        ON evento.id_evento = imagen_evento.id_evento
        WHERE evento.id_evento = ?;";

          $sentencia = $this->db->prepare($sql);
          $sentencia->execute( array($id) );
          return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function editarEvento($evento,$detalle,$idEvento,$idBanda,$ciudad) {
      $sql = "UPDATE evento SET
      evento = ?,
      detalle = ?,
      id_evento = ?,
      id_banda = ?,
      ciudad = ?
      WHERE id_evento = ?";

      $sentencia = $this->db->prepare($sql);
      $sentencia->execute(array(
        $evento,
        $detalle,
        $idEvento,
        $idBanda,
        $ciudad,
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