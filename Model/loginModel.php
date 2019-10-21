<?php
class loginModel {
    private $db;

    private function connect(){
        return new PDO('mysql:host=localhost;'.'dbname=bandas;charset=utf8','root', '');
    }

    function __construct(){
        $this->db = $this->Connect();
    }

    function registrarse($user,$password){
        //$sql = 'select * from usuario where nombre = "'.mysql_real_escape_string($nombre).'" and pass = "'.mysql_real_escape_string($hash).'"';
        
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO usuarios (nombre,contraseña) VALUES ('$user', '$hash')";
        $sentencia = $this->db->prepare($sql);
        $sentencia->execute();
     }
 
     function getUsuario($email,$password){
         $sql = "SELECT * FROM usuarios WHERE nombre = '$email'";
 
         $sentencia = $this->db->prepare($sql);
         $sentencia->execute();
         return $sentencia->fetch(PDO::FETCH_OBJ);
     }
     function GetUser($user){
        $sentencia = $this->db->prepare( "select * from usuarios where nombre=?");
        $sentencia->execute(array($user));
        return $sentencia->fetch(PDO::FETCH_ASSOC);
    }
}