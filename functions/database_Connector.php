<?php

/*

            NOTE:

    ALWAYS!!! ALWAYS!!!
    Use 'mysqli_real_escape_string()' when
    using user inputs for query searches/verfication/etc.

*/

//////////////////////////////////////////////
/*
                 (XAMPP)
        Database Variable Initialising
*/
//////////////////////////////////////////////

$server_Name = "127.0.0.1";
$user_Name = "root";
$pass_Word = "";
$db_Name = "secret_diary";


//////////////////////////////////////////////
/*
        Connecting to the Database
*/
//////////////////////////////////////////////

// Establishing Link
$link = mysqli_connect($server_Name,$user_Name,$pass_Word,$db_Name);

// Error checking
if($link === false){
    
    die("ERROR: Failied to connect to server ".mysqli_error());

}


?>