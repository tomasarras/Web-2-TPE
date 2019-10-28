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
}
?>