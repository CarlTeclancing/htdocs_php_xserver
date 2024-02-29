<?php
 require (".././path.php");
 require(HELPERS."/redirect.php");

session_start();
session_unset();
session_destroy();



redirect(BASEURL);
