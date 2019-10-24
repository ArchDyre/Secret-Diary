<?php

include "database_Connector.php";

//////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////
/*
                              TOPIC:
            ---------------------------------------------


                            *Login*
                        
UNIQUE VARIABLES:       

login_Email
login_Password
stay_Login

        
*/
//////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////
/*
            Login Function:
*/
//////////////////////////////////////////////

function login_System(){
    
    global $_POST;
    global $error_Success_Alert;
    global $login_Email;
    global $login_Password;
    global $link;
    
    
    if($_POST['login_Button']){
        
    // Clearing the error messages.
    $error_Success_Alert = "";    
        
    // Validate that the `password` and `email` inputs aren't empty
    validate_Empty_Login();
    
    if($error_Success_Alert == ""){
        
        // Validate Email format
        validate_Email_Login();
        
    }
    
        if(!$error_Success_Alert == ""){

            $error_Success_Alert = 
                "<div class='alert alert-danger' role='alert'>
                    <p>ERROR:</p>".$error_Success_Alert."
                 </div>";

        }else{
            
            // Assign `user inputs` to variables.
            $login_Email = $_POST['login_Email'];
            $login_Password = $_POST['login_Password'];
            
            // Prepared query to check if the email is already registered
            $query = "SELECT * FROM `users` WHERE `email` = '".mysqli_real_escape_string($link,$login_Email)."'";


            if($results = mysqli_query($link,$query)){

                $row = mysqli_fetch_array($results);

                if(!isset($row['email']) && !isset($row['password'])){

                    $error_Success_Alert .= "<div class='alert alert-danger' role='alert'>
                        <p>ERROR:</p> <p>Incorrect credentials, please try again or register a new account. </p> </div>";

                    // Checks if `email` is set && `password` is NOT set in DB
                }else{

                    if($row['email'] == $login_Email && isset($row['password'])){
                        
                        $secret = $row['password'];
                        // verifies the password with the existing `$query` and `$row` data.
                        verify_Password_Login($secret);
                        

                    }elseif($row['email'] == $login_Email && !isset($row['password'])){

                        $error_Success_Alert .= "<div class='alert alert-danger' role='alert'>
                            <p>ERROR:</p> <p>No Password found linked to your account. <br>
                                             Please contact an administrator to help you at: <br>
                                             help@mydomain.co.za. </p> </div>";

                    }else{

                            $error_Success_Alert .= "<div class='alert alert-danger' role='alert'>
                                <p>ERROR:</p> <p>Incorrect Email, please try again. </p> </div>";
                    }
                }            
            }   
        }
    }  
}


//////////////////////////////////////////////
/*
        Verify that`email` && `password` 
             Inputs aren't Empty
                (LOGIN)
*/
//////////////////////////////////////////////
    
function validate_Empty_Login(){
    
    global $error_Success_Alert;
    
        // Verifying if an `email` was provided.
    if($_POST['login_Email'] == ""){
        
        $error_Success_Alert .= 
            "<p>
                - Please provide an email.
             </p>";
        
    }
    // Verifying if a `password` was provided.
    if($_POST['login_Password'] == ""){
        
        $error_Success_Alert .= 
            "<p>
                - Please provide a Password.
             </p>";
        
    }
    
} 
   
    
//////////////////////////////////////////////
/*
        Validate Email formatting
                (Login)
*/
////////////////////////////////////////////// 

function validate_Email_Login(){
    
    global $error_Success_Alert;
    
        // Validating if the `email` is indeed an email.
    if(filter_var($_POST['login_Email'], FILTER_VALIDATE_EMAIL) === false){
        
        $error_Success_Alert .= "<p>- The entered email address is not valid.</p>";

    }
    
}


//////////////////////////////////////////////
/*
        -Verify if 'Remember Me' checkbox is
        checked or not.
        - Creates a cookie if `checked`
        - Creates session if NOT `checked`
*/
////////////////////////////////////////////// 


function stay_Logged_In(){
    
    global $login_Email;
    global $_SESSION;
    global $_POST;
    
    echo "<br> DETAILS: " . $_POST['login_Password'];
    
    // Check if cookie should be used.
    if(isset($_POST['stay_Logged_Box'])){
        
        
        // Start Cookie
        setcookie('id',$login_Email,time() + 60 * 60 * 24 * 2);
        $_SESSION['id'] = $login_Email;
        
        // REDIRECT:
        
        header ("Location: welcome.php");
        
    }else{
        //Start Session
   
        $_SESSION['id'] = $login_Email;
        
        // REDIRECT:
        header ("Location: welcome.php");

    }
    
}

//////////////////////////////////////////////
/*
        Verifies `password` with the current 
        Query that you have run for (LOGIN).
*/
//////////////////////////////////////////////

function verify_Password_Login($hash){

    global $error_Success_Alert;
    global $login_Password;    
    global $_POST;
    

        // Verify if the $hash is related to the $login_Password
        if(password_verify($login_Password,$hash)){
            
            // Success message if password verification was successful.
            $error_Success_Alert .= "<div class='alert alert-success' role='alert'>
            <p>Login Successful </p> </div>";    

            // Verify if 'Remember Me' checkbox is checked or not.
            stay_Logged_In();
            
            
        }else{
            
            // Error message if password verification failed.
            $error_Success_Alert .= "<div class='alert alert-danger' role='alert'>
            <p>ERROR:</p> <p>Incorrect Password, please try again. </p> </div>";

        }
    
}


//////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////
/*
                              TOPIC:
            ---------------------------------------------


                        *Registration*
                        
UNIQUE VARIABLES:       

register_Email
register_Password
stay_Register

        
*/
//////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////


//////////////////////////////////////////////
/*
            Registration Function:
*/
//////////////////////////////////////////////

function registration_System(){
    
    global $_POST;
    global $error_Success_Alert;
    global $query;
    global $row;
    global $link;
    global $register_Email;
    global $register_Password;
    global $register_Name;
    
    if($_POST['register_Button']){
        
        // Clearing the error messages.
        $error_Success_Alert = "";

        // Validate that the `password` and `email` inputs aren't empty
        validate_Empty_Register();

        // Validate Email format
        validate_Email_Register();


        if(!$error_Success_Alert == ""){

            $error_Success_Alert = 
                "<div class='alert alert-danger' role='alert'>
                    <p>ERROR:</p>".$error_Success_Alert."
                 </div>";

        }else{

            // Assign `user inputs` to variables.
            $register_Email = $_POST['register_Email'];
            $register_Password = $_POST['register_Password'];
            $register_Name = $_POST['register_Name'];
            
            $query = "SELECT * FROM `users` WHERE `email` = '".mysqli_real_escape_string($link,$register_Email)."'";

            if($results = mysqli_query($link,$query)){

                $row = mysqli_fetch_array($results);

                // Check if Email is not already in DB
                if($row['email'] != $register_Email){
                    
                    //Register
                    add_new_user();

                   // IF email is in DB 
                }elseif($row['email'] == $register_Email && isset($row['password'])){

                    // verifies the password with the existing `$query` and `$row` data.
                    verify_Password_Register();

                }

            }

        }  
    }
}


//////////////////////////////////////////////
/*
        Inserting new user into DB
*/
//////////////////////////////////////////////

function add_new_user(){
        
        global $hash;
        global $query;
        global $link;
        global $register_Password;
        global $register_Email;
        global $register_Name;
        global $error_Success_Alert;
            
            // Verify that `entered password` is >6 characters
        if(strlen($register_Password) < 6){
            $error_Success_Alert .= "<div class='alert alert-danger' role='alert'>
                    <p>ERROR:</p><p>The entered password is to short. (".strlen($register_Password).") Please provide a stronger password. (>6 AND <24)</p>
                 </div>";
            
            // Verify that `entered password` is <25 characters.
        }elseif(strlen($register_Password) > 25){
            
            $error_Success_Alert .= "<div class='alert alert-danger' role='alert'>
                    <p>ERROR:</p><p>The entered password is to long. (MORE than 6 & LESS than 24)</p>
                 </div>";

        }else{
    
            $hash = password_hash($register_Password,PASSWORD_DEFAULT);
            if(password_verify($register_Password, $hash)){
                
                
                $query = "INSERT INTO `users`(`name`, `email`,`password`) VALUES(
                '".mysqli_real_escape_string($link,$register_Name)."',
                '".mysqli_real_escape_string($link,$register_Email)."',
                '".mysqli_real_escape_string($link,$hash)."')";
                
                // Runs the query
                mysqli_query($link,$query);
                
                // Runs function to check if a session or cookie should be used
                Stay_Logged_After_Registered();

                // Show success Message
                $error_Success_Alert .= "<div class='alert alert-success' role='alert'>
                <p>Successfully Registered! </p> </div>";
                
                
            }
        }
}

//////////////////////////////////////////////
/*
        Verify that`email` && `password` 
             Inputs aren't Empty
                (Registration)
*/
//////////////////////////////////////////////

function validate_Empty_Register(){
    
    global $error_Success_Alert;
    
        // Verifying if an `email` was provided.
    if($_POST['register_Email'] == ""){
        
        $error_Success_Alert .= 
            "<p>
                - Please provide an email.
             </p>";
        
    }
    // Verifying if a `password` was provided.
    if($_POST['register_Password'] == ""){
        
        $error_Success_Alert .= 
            "<p>
                - Please provide a Password.
             </p>";
        
    }    
    // Verifying if a `name` was provided.
    if($_POST['register_Name'] == ""){
        
        $error_Success_Alert .= 
            "<p>
                - Please provide a Password.
             </p>";
        
    }    
    
    // Verifying That `name` is shorter than 255 characters.
    if(strlen($_POST['register_Name']) > 255){
        
        $error_Success_Alert .= 
            "<p>
                - Invalid Name Provided.
             </p>";
        
    }
    
} 


//////////////////////////////////////////////
/*
        Validate Email formatting
            (Registration)
*/
////////////////////////////////////////////// 

function validate_Email_Register(){
    
    global $error_Success_Alert;
    
        // Validating if the `email` is indeed an email.
    if(filter_var($_POST['register_Email'], FILTER_VALIDATE_EMAIL) === false){
        
        $error_Success_Alert .= "<p>- The entered email address is not valid.</p>";

    }
    
}

//////////////////////////////////////////////
/*
        -Verify if 'Remember Me' checkbox is
        checked or not.
        - Creates a cookie if `checked`
        - Creates session if NOT `checked`
*/
////////////////////////////////////////////// 

function Stay_Logged_After_Registered(){
    
    global $login_Email;
    global $register_Email;
    
    // Check if cookie should be used.
    if(isset($_POST['stay_Register_Box'])){
        
        // Start Cookie
        setcookie('id',$register_Email,time() + 60 * 60 * 24 * 2);
        $_SESSION['id'] = $register_Email;
        
        // REDIRECT:
        
        
        header ("Location:  welcome.php");
        
        
    }else{
        //Start Session
   
        $_SESSION['id'] = $register_Email;

        header ("Location: welcome.php");
    }
    
}

//////////////////////////////////////////////
/*
        Verifies `password` with the current 
        Query that you have run for (LOGIN).
*/
//////////////////////////////////////////////

function verify_Password_Register(){

    global $hash;
    global $error_Success_Alert;
    global $register_Password;
    global $row;
    
    
        // Retrieve $hash from `password` field in DB 
        $hash = $row['password'];

        // Verify if the $hash is related to the $register_Password
        if(password_verify($register_Password,$hash)){
            
            // Success message if password verification was successful.
            $error_Success_Alert .= "<div class='alert alert-success' role='alert'>
            <p>Login Successful </p> </div>";    

            // Verify if 'Remember Me' checkbox is checked or not.
            Stay_Logged_After_Registered();

        }else{
            
            // Error message if password verification failed.
            $error_Success_Alert .= "<div class='alert alert-danger' role='alert'>
            <p>ERROR:</p> <p>Account already exists. (Incorrect Password). </p> </div>";

        }
    
}

?>
