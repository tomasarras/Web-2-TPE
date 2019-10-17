<?php
class BandasModel
{
    function __construct(){
        $this->db = $this->Connect();
    }
    private function connect(){
        return new PDO('mysql:host=localhost;'.'dbname=bandas;charset=utf8','root', '');
     }
    function GetBandas(){
        $sentencia = $this->db->prepare( "select * from banda");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);

    }

    function getEventos(){
        $sentencia = $this->db->prepare( "select * from evento");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function registrarse($email,$password){
       //$sql = 'select * from usuario where nombre = "'.mysql_real_escape_string($nombre).'" and pass = "'.mysql_real_escape_string($hash).'"';
       
       $hash = password_hash($password, PASSWORD_DEFAULT);
       $sql = "INSERT INTO usuarios (nombre,contraseña) VALUES ('$email', '$hash')";
       $sentencia = $this->db->prepare($sql);
       $sentencia->execute();
    }

    function getUsuario($email,$password){
        $sql = "SELECT * FROM usuarios WHERE nombre = '$email'";

        $sentencia = $this->db->prepare($sql);
        $sentencia->execute();
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }
}



?>