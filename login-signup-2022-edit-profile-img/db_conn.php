<?php 

$sName = "localhost";
$uName = "root";
$pass = "";
$db_name = "auth_db";


    $conn = new mysqli($sName, $db_name, $uName, $pass);
    // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
