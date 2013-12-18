<?php

/**
 *  Database connection class
 */

class DB {

    private $dbDsn;
    private $dbHost;
    private $dbName;
    private $dbUser;
    private $dbPass;

    function __construct($dsn, $host, $name, $user, $pass)
    {
        $this->dbDsn = $dsn;
        $this->dbDsn = $host;
        $this->dbName = $name;
        $this->dbUser = $user;
        $this->dbPass = $pass;
    }

    protected  function connect() {
        try {
            $conn = new PDO($this->dbDsn . $this->dbHost . $this->dbName, $this->dbUser, $this->dbPass);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            die("DB connection failed:" . $e->getMessage());
        }
    }

    protected  function disconnect($conn) {

        $conn = "";

    }


}