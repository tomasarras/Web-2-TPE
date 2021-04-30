<?php
abstract class AbstractModel {
    protected $db;
    public function __construct() {
        $this->db = $this->Connect();
    }

    private function connect(){
        $server = "sql10.freemysqlhosting.net";
        $username = "sql10409476";
        $dbname = "sql10409476";
        $password = "lifrck4f5H";
        
        try {
            return new PDO('mysql:host='.$server.';'.'dbname=' . $dbname . ';charset=utf8',$username, $password);
        } catch (Exception $e) {
            echo "ERROR: ". $e->getMessage();
            $this->data = file_get_contents("db/bandas.sql"); 
        }
    }
}
?>
