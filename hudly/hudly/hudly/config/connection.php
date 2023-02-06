<?php

class Database {
    private $host = "localhost";
    private $username = "root";
    private $dbName = "hudly";
    private $dbPass = "";

    public function connect(){
        try{
            $db = new PDO("mysql:host=$this->host;dbname=$this->dbName", $this->username, $this->dbPass);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $db;
        } catch(PDOEXCEPTION $e){
            echo "Error: ".$e->getMessage();
        }
    }
}