<?php


//////////////////////////////////////////////
/*
        Log out function
*/
//////////////////////////////////////////////

if(isset($_POST['logout_Btn']) || isset($_GET['logout']) == true){
    
    session_start();

    global $_SESSION;
    global $_COOKIE;

    $_SESSION['id'] = "";
    $_COOKIE['id'] = "";
    $_COOKIE['PHPSESSID'] = "";


    setcookie('id',"",time() - 60 * 60 * 24 * 2);
    $_SESSION['id'] = "";

    setcookie(session_name(),'',0,'/');   
    session_unset();
    
    if(isset($_GET['logout']) == true){
        
        header ('Location: ../index.php');
        
    }else{
        
        header ('Location: index.php');
        
    }
    
    
    
}





?>