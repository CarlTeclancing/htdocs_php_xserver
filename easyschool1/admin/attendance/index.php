<?php require ("../.././path.php"); ?>
<?php require(HELPERS."/redirect.php");?>
<?php
// Block direct access to this directory
if(!isset($_SESSION['userId'])){
    redirect(BASEURL);
}