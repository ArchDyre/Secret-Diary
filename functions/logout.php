<?php


//////////////////////////////////////////////
/*
        Log out function
*/
//////////////////////////////////////////////

if(isset($_POST['logout_Btn'])){
    
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

    header ('Location: index.php');
    
}




?>