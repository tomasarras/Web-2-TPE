<?php
class UsuariosModel {
    private $db;

    private function connect(){
        try {
            return new PDO('mysql:host=localhost;'.'dbname=bandas;charset=utf8','root', '');
        } catch (Exception $e) {
            echo "ERROR: ". $e->getMessage();
        }
    }

    function __construct(){
        $this->db = $this->Connect();
    }

    function getUsuarios() {
        $sentencia = $this->db->prepare( "SELECT * FROM usuario");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function registrarse($user,$password){
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO usuario (email,password,admin) VALUES ('$user', '$hash','0')";
        $sentencia = $this->db->prepare($sql);
        $sentencia->execute();
        return $this->db->lastInsertId();
    }

    function eliminarUsuario($id) {
        $sql = "DELETE FROM usuario WHERE id_usuario = ?";
        $sentencia = $this->db->prepare($sql);
        $sentencia->execute( array($id) );
    }
 
    function getUser($user){
        $sentencia = $this->db->prepare( "SELECT * FROM usuario WHERE email = ?");
        $sentencia->execute(array($user));
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    function getUserById($id) {
        $sentencia = $this->db->prepare( "SELECT * FROM usuario WHERE id_usuario = ?");
        $sentencia->execute( array($id) );
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }
}