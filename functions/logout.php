<?php


//////////////////////////////////////////////
/*
        Log out function
*/
//////////////////////////////////////////////


function log_Out(){
    
    global $_SESSION;
    global $_COOKIE;
    
    session_unset();
    session_destroy();
    session_write_close();
    setcookie(session_name(),'',time() - 6 * 2);
    session_regenerate_id(true);
    
    header ('../');
    
}

log_Out();

?>