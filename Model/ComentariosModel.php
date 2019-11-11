<?php 

class ComentariosModel {

    function __construct(){
        $this->db = $this->Connect();
    }
    
    private function connect(){
        try {
            return new PDO('mysql:host=localhost;'.'dbname=bandas;charset=utf8','root', '');
        } catch (Exception $e) {
            echo "ERROR: ". $e->getMessage();
        }
    }

    public function enviarComentario($id_usuario,$id_evento,$comentario,$puntaje) {
        $sql = "INSERT comentario(id_comentario,id_usuario,id_evento,comentario,puntaje)
        VALUES (NULL,?,?,?,?);";
        $sentencia = $this->db->prepare($sql);
        $sentencia->execute(array(
          $id_usuario,
          $id_evento,
          $comentario,
          $puntaje
        ));
        
        return $this->db->lastInsertId();
    }

    public function getComentariosByEvento($id) {
        $sql = "SELECT usuario.email,usuario.admin, comentario.*
        FROM comentario
        JOIN evento ON evento.id_evento = comentario.id_evento 
        JOIN usuario ON usuario.id_usuario = comentario.id_usuario 
        WHERE evento.id_evento = ?;";
        $sentencia = $this->db->prepare($sql);
        $sentencia->execute( array($id) );
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

}