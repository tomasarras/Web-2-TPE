<?php
require_once("./Model/AbstractModel.php");
class BandasModel extends AbstractModel {
    
    function __construct(){
        parent::__construct();
    }

    function GetBandas($orden="banda"){
        $sentencia = $this->db->prepare( "SELECT * FROM banda ORDER BY $orden;");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function getBandasyEventos() {
        $sql = "SELECT banda.*,evento.evento FROM banda 
        LEFT JOIN evento ON banda.id_banda = evento.id_banda 
        GROUP BY banda
        UNION ALL
        SELECT banda.*,evento.evento FROM banda 
        RIGHT JOIN evento ON banda.id_banda = evento.id_banda 
        WHERE banda.id_banda IS NULL";
        
        $sentencia = $this->db->prepare($sql);
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function getNombreBandas() {
        $sentencia = $this->db->prepare("SELECT banda.banda,banda.id_banda FROM banda");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function agregarBanda($banda,$cantidad,$anio) {
        $sql = "INSERT INTO banda(id_banda,banda,anio,cantidad_canciones) VALUES (NULL,?,?,?)";
        $sentencia = $this->db->prepare($sql);
        $sentencia->execute( array(
            $banda,
            $anio,
            $cantidad
        ));

        return $this->db->lastInsertId();
    }

    function editarBanda($banda,$cantidad,$anio,$id) {
        $sql = "UPDATE banda SET
        banda = ?,
        anio = ?,
        cantidad_canciones = ?
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
        $sentencia = $this->db->prepare( "SELECT * FROM banda WHERE id_banda=?");
        $sentencia->execute(array($id));
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    function getBanda($id) {
        $sql = "SELECT * FROM banda WHERE id_banda = ?";
        $sentencia = $this->db->prepare($sql);
        $sentencia->execute( array($id) );
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }
}
?>