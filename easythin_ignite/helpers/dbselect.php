<?php


function selectCheckAll($tableName){
    global $connection;
    
    $query = "SELECT * FROM {$tableName}";
    $result = mysqli_query($connection, $query);

    if(mysqli_num_rows($result) > 0){
        return true;
    }else{
        return false;
    }
}

function selectGetAll($tableName){
    global $connection;
    
    $query = "SELECT * FROM {$tableName}";
    $result = mysqli_query($connection, $query);

    if(mysqli_num_rows($result) > 0){
        return $result;
    }else{
        return $result;
    }
}