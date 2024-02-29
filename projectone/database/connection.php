<?php

require(__DIR__ . '/connect.php');
//connecting to the database

$conn = new mysqli($servername, $dbuser, $dbpass, $dbname);

//checking connection if valid

if($conn->connect_error){
    die ("connection failed" . $conn->connect_error);
}