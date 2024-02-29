<?php
session_start();
$_SESSION['name'] = "";
$_SESSION['email'] = "";
$_SESSION['address'] = "";
$_SESSION['id'] = 0;    
session_destroy();


header("location: login.php");


?>