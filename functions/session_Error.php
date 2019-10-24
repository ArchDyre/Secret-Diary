<?php

if(session_status() == PHP_SESSION_NONE){
    
    session_start();
    
}

if($_SESSION["id"] == "" || empty($_SESSION["id"]) || !isset($_SESSION["id"])){
    
    header ("Location: ../index.php");
}

?>