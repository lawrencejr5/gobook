<?php

// include "../backend/class.php";
session_start();
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
if(isset($_SESSION['info']['regno'])){
    foreach($_POST as $key => $value){
        $_SESSION['info'][$key] = $value;
    }
    $keys = array_keys($_SESSION['info']);
    if(in_array('next', $keys)){
        unset($_SESSION['info']['next']);
    }
    
    extract($_SESSION['info']);
    
    $return = [];
    $return['stat'] = "continue";
    
    
    echo json_encode($return);

    // header("location: ./choose_username");
}

?>