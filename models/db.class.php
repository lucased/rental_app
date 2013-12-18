<?php

/**
 *  Database connection class
 */

class Database
{

    protected  $conn;
    protected  $stmt;
    protected  $results;

    function __construct($config)
    {
        try {
            $this->conn = new PDO($config['DB_HOST'], $config['DB_USERNAME'], $config['DB_PASSWORD']);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conn;
        } catch (PDOException $e) {
            die("DB connection failed:" . $e->getMessage());
        }
    }

    protected function query($query, $binding = null)
    {
        try {
            $this->stmt = $this->conn->prepare($query);
            $this->stmt->setFetchMode(PDO::FETCH_OBJ);
            $this->stmt->execute($binding);
            return $this->stmt;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function get_all_items()
    {
        $this->results = self::query("SELECT * FROM inventory");
        return $this->results->fetchAll();
    }

    public function get_item($id) {
        try{

            $this->results = self::query("SELECT * FROM inventory WHERE id = :id",
                array('id' => $id));
            return $this->results->fetch();
        } catch(PDOException $e) {
            die($e->getMessage());
        }
    }

    public function add_item($item)
    {
        try {
            $this->results = $this->conn->prepare("INSERT INTO inventory(id, pName, description, category, week_price, month_price, three_month_price, stock, asset_number)
            VALUES(:id, :pName, :description, :category, :week_price, :month_price, :three_month_price, :stock, :asset_number)");
            $this->results->execute((array)$item);
        } catch(PDOException $e) {
            die($e->getMessage());
        }
    }

    public function update_item($item) {
        try {
            $this->results = $this->conn->prepare("UPDATE inventory SET pName = :pName, description = :description, category = :category,
            week_price = :week_price, month_price = :month_price, three_month_price = :three_month_price, stock = :stock, asset_number = :asset_number
            WHERE id = :id");
            $this->results->execute((array)$item);
        } catch(PDOException $e) {
            die($e->getMessage());
        }
    }

    public function delete_item($id) {
        try{
            $this->results = self::query("DELETE FROM inventory WHERE id = :id", array('id' => $id));
        } catch(PDOException $e) {
            die($e->getMessage());
        }
    }

    public function get_categories() {
        try {
            $this->results = self::query("SELECT * FROM category");
            return $this->results->fetchAll();
        } catch(PDOException $e) {
            die($e->getMessage());
        }
    }
}