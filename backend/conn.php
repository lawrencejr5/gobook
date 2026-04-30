<?php

class Connection
{

    protected $conn;

    public function __construct()
    {
        $dbhost = "localhost";
        $dbuser = "root";
        $dbpass = "";
        $dbname = "gobook";

        try {
            $this->conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Database Connection Error: " . $e->getMessage());
        }
    }
}