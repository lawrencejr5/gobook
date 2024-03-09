<?php

class Connection{

    protected $conn;

    public function __construct(){
        // $dbhost = "localhost:3325";
        $dbhost = "localhost";
        // $dbuser = "root";
        $dbuser = "gobookn3_lawjun";
        // $dbpass = "";
        $dbpass = "Law3221211#$*";
        $dbname = "gobookn3_database";

        try{
            $this -> conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
            $this -> conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this -> conn;
        }catch(PDOException $e){
            return $e->getMessage();
        }
    }
}