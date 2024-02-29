<?php

/* 
    @ function to simplify the redirect procedure
*/
    function redirect($location){
        return header("Location:".$location);
        exit();
    }