<?php

$servername = "localhost";
$username = "buninutr_user";
$password = "buninutr_2022!";
$db_name = "buninutr_2022";

try{
    $conn = new PDO("mysql:host=$servername;dbname=$db_name",$username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    echo "Ooops!----Connection Failure : ". $e->getMessage();
}
