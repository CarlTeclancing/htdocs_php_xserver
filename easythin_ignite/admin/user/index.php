<?php require ("../.././path.php"); ?>
<?php require(HELPERS."/redirect.php");?>
<?php
// Block direct access to this directory
if(!isset($_SESSION['userId']) || $_SESSION['roleId'] == 9 || $_SESSION['roleId'] == 10){
    redirect(BASEURL);
}