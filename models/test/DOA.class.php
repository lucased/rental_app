<?php

require_once 'config.php';

class DOA extends DB {

    private $conn;

    public function __construct($dsn, $host, $user, $pass) {

    }


    protected function dbSelect($table, $fieldname=null, $id=null){
    $this->conn();
    $sql = "SELECT * FROM `$table` WHERE `$fieldname`=:id";
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

}