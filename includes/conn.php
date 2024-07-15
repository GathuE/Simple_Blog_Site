<?php

$servername = "localhost";
$username = "root";
$password = "";
$db_name = "app";

try{
    $conn = new PDO("mysql:host=$servername;dbname=$db_name",$username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    echo "Ooops!----Connection Failure : ". $e->getMessage();
}
