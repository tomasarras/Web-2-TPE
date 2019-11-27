<?php
require_once("./Model/AbstractModel.php");
class UsuariosModel extends AbstractModel {
    function __construct(){
        parent::__construct();
    }

    function cambiarAdmin($id,$admin) {
        $sql = "UPDATE usuario SET
        admin = ?
        WHERE usuario.id_usuario = ?;";
        $sentencia = $this->db->prepare($sql);
        $sentencia->execute( array( $admin,$id ));
    }

    function getUsuarios() {
        $sentencia = $this->db->prepare( "SELECT id_usuario,email,nombre,admin FROM usuario");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function registrarse($email,$password,$userName,$pregunta,$respuesta){
        $hash_password = password_hash($password, PASSWORD_DEFAULT);
        $hash_respuesta = password_hash($respuesta, PASSWORD_DEFAULT);
        $sql = $this->db->prepare("INSERT INTO usuario(id_usuario,email,password,nombre,pregunta,respuesta,admin) 
        VALUES (null,?,?,?,?,?,'0');");
        $sql->execute(array(
            $email,
            $hash_password,
            $userName,
            $pregunta,
            $hash_respuesta
        ));
        return $this->db->lastInsertId();
    }

    function editarPassword($email,$id,$password) {
        $hash_password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "UPDATE usuario SET
        password = ?
        WHERE email = ? AND id_usuario = ?";
        $sentencia = $this->db->prepare($sql);
        $sentencia->execute( array(
            $hash_password,
            $email,
            $id
        ));
    }

    function eliminarUsuario($id) {
        $sql = "DELETE FROM usuario WHERE id_usuario = ?";
        $sentencia = $this->db->prepare($sql);
        $sentencia->execute( array($id) );
    }
 
    function getUserByEmail($email){
        $sentencia = $this->db->prepare( "SELECT * FROM usuario WHERE email = ?");
        $sentencia->execute(array($email));
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }
    
    function getUserByNombre($nombre){
        $sentencia = $this->db->prepare( "SELECT * FROM usuario WHERE nombre = ?");
        $sentencia->execute(array($nombre));
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    function getUserById($id) {
        $sentencia = $this->db->prepare( "SELECT * FROM usuario WHERE id_usuario = ?");
        $sentencia->execute( array($id) );
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }
}