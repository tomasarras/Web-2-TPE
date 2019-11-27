<?php
abstract class AbstractModel {
    protected $db;
    public function __construct() {
        $this->db = $this->Connect();
    }

    private function connect(){
        try {
            return new PDO('mysql:host=localhost;'.'dbname=bandas;charset=utf8','root', '');
        } catch (Exception $e) {
            echo "ERROR: ". $e->getMessage();
            $this->data = file_get_contents("db/bandas.sql"); 
        }
    }
}
?>