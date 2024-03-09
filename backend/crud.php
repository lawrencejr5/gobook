<?php

include "conn.php";

class Crud extends Connection{

    protected $stmt;

    public function insertRow($params=[], $sql){
        try{
            $this->stmt = $this->conn->prepare($sql);
            return $this->stmt->execute($params);
        }
        catch(PDOException $e){
            return $e->getMessage();
        }
    }

    public function updateRow($params=[], $sql){
        try{
            $this->stmt = $this->conn-> prepare($sql);
            return $this->stmt->execute($params);
        }catch(PDOException $e){
            return $e->getMessage();
        }
    }

    public function deleteRow($params=[], $sql){
        try{
            $this->stmt = $this->conn-> prepare($sql);
            return $this->stmt->execute($params);
        }catch(PDOException $e){
            return $e->getMessage();
        }
    }

    public function readRow($params=[], $sql){
        try{
            $this->stmt = $this->conn-> prepare($sql);
            $this->stmt->execute($params);
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            return $e->getMessage();
        }
    }
    public function count($params=[], $sql){
        try{
            $this->stmt = $this->conn-> prepare($sql);
            return $this->stmt->execute($params);
        }catch(PDOException $e){
            return $e->getMessage();
        }
    }

    public function num_of_users($params=[], $sql){
        try{
            $this->stmt = $this->conn->prepare($sql);
            $this->stmt->execute($params);
            $this->stmt->fetchAll(PDO::FETCH_ASSOC);
            return $this->stmt->rowCount();
        }catch(PDOException $e){
            return $e->getMessage();
        }
    }
    public function numOf($params=[], $sql){
        try{
            $this->stmt = $this->conn->prepare($sql);
            $this->stmt->execute($params);
            $this->stmt->fetchAll(PDO::FETCH_ASSOC);
            return $this->stmt->rowCount();
        }catch(PDOException $e){
            return $e->getMessage();
        }
    }
}