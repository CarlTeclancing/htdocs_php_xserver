<?php

require "config.php";

$connection = mysqli_connect(DBHOST,DBUSER,DBPASSWORD, DBNAME);

if(!$connection){
    return false;
}else{
    return true;
}