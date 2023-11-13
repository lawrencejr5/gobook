<?php

include "crud.php";

class Controller extends Crud{

    protected $result;

    // Signup/Signin Controller

    public function fieldEmpty($field){
        if(empty($field)){
            $this -> result = true;
        }else{
            $this -> result = false;
        }
        return $this -> result;
    }

    public function passMatch($password, $cpassword){
        if($password == $cpassword){
            $this -> result = true;
        }else{
            $this -> result = false;
        }
        return $this -> result;
    }

    public function userExists($username){
        $sql = "SELECT * FROM user WHERE username = ?";
        try{
            if($this -> num_of_users([$username], $sql) == 0){
                $this -> result = true;
            }else{
                $this -> result = false;
            }
            return $this -> result;
        }catch(PDOException $e){
            return $e->getMessage();
        }
    }
}