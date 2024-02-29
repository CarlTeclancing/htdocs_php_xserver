<?php

/* 
    @ for opening forms ==> helper function for easy form creation
*/
function formOpen($method="post", $action="", $class="", $id="", $autocomplete="off", $enctype="multipart/form-data"){
    $formOpen = "<form method='$method' action='$action' class='$class' id='$id' autocomplete='$autocomplete' enctype='$enctype'>";

        return $formOpen;
}

/* 
    @ for closing forms
*/
function formClose(){
    return "</form>";
}

