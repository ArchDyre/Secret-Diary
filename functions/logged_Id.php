<?php

session_start();
global $_SESSION;

if(array_key_exists('id',$_COOKIE)){
    
    $_SESSION['id'] = $_COOKIE['id'];
    echo "Login Successful Cookie: ".$_COOKIE['id'];
}
   
   
if(array_key_exists('id',$_SESSION)){
    
    echo "Login Successful Session: ".$_SESSION['id'];
    header ("Location: src/welcome.php");
    
    
} 


?>