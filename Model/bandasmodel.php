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

    function getBandasyEventos() {
        $sql = "SELECT banda.*,evento.nombre AS evento from banda 
        LEFT JOIN evento ON banda.id_banda = evento.id_banda 
        UNION ALL
        SELECT banda.*,evento.nombre AS evento FROM banda 
        RIGHT JOIN evento ON banda.id_banda = evento.id_banda 
        WHERE banda.id_banda IS NULL";
        
        $sentencia = $this->db->prepare($sql);
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function agregarBanda($banda,$cantidad,$anio) {
        $sql = "INSERT INTO banda(id_banda,banda,anio,cantidadCanciones) VALUES (NULL,?,?,?)";
        $sentencia = $this->db->prepare($sql);
        $sentencia->execute( array(
            $banda,
            $anio,
            $cantidad
        ));

    }

    function editarBanda($banda,$cantidad,$anio,$id) {
        $sql = "UPDATE banda SET
        banda = ?,
        anio = ?,
        cantidadCanciones = ?
        WHERE id_banda = ?";
        $sentencia = $this->db->prepare($sql);
        $sentencia->execute( array(
            $banda,
            $anio,
            $cantidad,
            $id
        ));

    }

    function eliminarBanda($id) {
        $sql = "DELETE FROM banda WHERE banda.id_banda = ?";
        $sentencia = $this->db->prepare($sql);
        $sentencia->execute( array($id) );
    }
}
?>