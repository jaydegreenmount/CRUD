<?php

require_once('db_credentials.php');


function db_connect(){
$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    return $connection;
if (!$connnection)
{
die('Could not connect: ' . mysql_error());
}
    
}

function db_disconnect($connection){
    if(isset($connection)){
        mysqli_close($connection);
    }
}

function confirm_db_connect(){
    if(mysqli_connect_errno()){
        
        $msg = "Database connection failed:";
        $msg.=mysql_connect_error();
        $msg .="(".mysqli_connect_errno().")";
        exit($msg);
    }
}

function confirm_result_set($result_set){
    if(!$result_set){
        exit("database query failed");
    }
}
?>