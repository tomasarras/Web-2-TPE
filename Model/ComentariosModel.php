<?php 
require_once("./Model/AbstractModel.php");
class ComentariosModel extends AbstractModel {

    function __construct(){
        parent::__construct();
    }
    
    public function enviarComentario($id_usuario,$id_evento,$comentario,$puntaje,$fecha) {
        $sql = "INSERT comentario(id_comentario,id_usuario,id_evento,comentario,puntaje,fecha)
        VALUES (NULL,?,?,?,?,?);";
        $sentencia = $this->db->prepare($sql);
        $sentencia->execute(array(
          $id_usuario,
          $id_evento,
          $comentario,
          $puntaje,
          $fecha
        ));
        
        return $this->db->lastInsertId();
    }

    public function borrarComentario($id) {
        $sql = "DELETE FROM comentario WHERE id_comentario = ?;";
        $sentencia = $this->db->prepare($sql);
        $sentencia->execute( array($id) );
    }

    public function getComentario($id) {
        $sql = "SELECT * FROM comentario
        WHERE id_comentario = ?;";
        $sentencia = $this->db->prepare($sql);
        $sentencia->execute( array($id) );
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    public function getComentariosByEvento($id_evento,$orden="fecha") {
        $sql = "SELECT usuario.nombre,usuario.email,usuario.admin, comentario.*
        FROM comentario
        JOIN evento ON evento.id_evento = comentario.id_evento 
        JOIN usuario ON usuario.id_usuario = comentario.id_usuario 
        WHERE evento.id_evento = ?
        ORDER BY $orden;";
        $sentencia = $this->db->prepare($sql);
        $sentencia->execute( array($id_evento) );
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

}