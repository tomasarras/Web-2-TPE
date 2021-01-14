<?php
abstract class AbstractModel {
    protected $db;
    public function __construct() {
        $this->db = $this->Connect();
    }

    private function connect(){
        $server = "sql10.freemysqlhosting.net";
        $username = "sql10386892";
        $dbname = "sql10386892";
        $password = "Z1MxUb2wCu";
        
        try {
            return new PDO('mysql:host='.$server.';'.'dbname=' . $dbname . ';charset=utf8',$username, $password);
        } catch (Exception $e) {
            echo "ERROR: ". $e->getMessage();
            $this->data = file_get_contents("db/bandas.sql"); 
        }
    }
}
?>