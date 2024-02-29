<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    session_start();
    unset($_SESSION['id']);
    unset($_SESSION['username']);
    session_destroy();

header('Location: ../login.php');

exit(0);
}

?>