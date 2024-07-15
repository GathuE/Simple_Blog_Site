<?php 
//initialize session
session_start();

//unset session
session_unset();

//Destroy session
session_destroy();


header("Location:index?success=Successfully Logged Out !!");


?>