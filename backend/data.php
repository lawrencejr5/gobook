<?php
include "database.php";

$uID = $_SESSION['id'];

$database = new Database;

$data['user'] = $database -> getUser($uID);
$data['posts'] = $database -> getPosts($uID);