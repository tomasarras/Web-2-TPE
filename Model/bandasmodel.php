<?php
class BandasModel
{
    function __construct(){
        $this->db = $this->Connect();
    }
    private function connect(){
        return new PDO('mysql:host=localhost;'.'dbname=bandas;charset=utf8','root', '');
    }

    function getBandasNombre(){
        $sql = "SELECT banda.id_banda, banda.banda FROM banda";
        $sentencia = $this->db->prepare($sql);
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function GetBandas(){
        $sentencia = $this->db->prepare( "select * from banda");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function getNombreBandas() {
        $sentencia = $this->db->prepare("SELECT banda.banda,banda.id_banda FROM banda");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function getBandasOrdenadas($orden) {
        switch ( $orden ) {
            case "banda": $ordenamiento = "banda"; break;
            case "anio": $ordenamiento = "anio"; break;
            case "cantidadCanciones": $ordenamiento = "cantidadCanciones"; break;
            default: $ordenamiento = "banda"; break;
        }
        $sql = "SELECT * FROM banda ORDER BY $ordenamiento;";
        $sentencia = $this->db->prepare($sql);
        //$sentencia->execute( array($orden) );
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
    function GetDetalleBanda($id){
        $sentencia = $this->db->prepare( "select * from banda where id_banda=?");
        $sentencia->execute(array($id));
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function getBanda($id) {
        $sql = "SELECT * FROM banda WHERE id_banda = ?";
        $sentencia = $this->db->prepare($sql);
        $sentencia->execute( array($id) );
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }
}
?>