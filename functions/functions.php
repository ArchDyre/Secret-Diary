<?php

include "database_Connector.php";

//////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////
/*
                              TOPIC:
            ---------------------------------------------


                        *Usefull Utilities*

        
*/
//////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////


//////////////////////////////////////////////
/*
        Recalls the name of the currently `logged in`
        user, and returns it as a variable:
        
        Unique Variable:
        $user_Server_Name
*/
//////////////////////////////////////////////

if(function_exists('recall_User_Name') === false){
    
    function recall_User_Name(){
    
    global $link;
    global $_SESSION;
    global $user_Server_Name;
    
    
    // Checks if the 'users' session ID is in place.
    if($_SESSION["id"] == "" || !isset($_SESSION["id"])){
        
        $user_Server_Name = "And error has occured.";
        return $user_Server_Name;
        
        
    }elseif(isset($_SESSION["id"])){
        
        $query = "SELECT `name` FROM `users` WHERE `email` = '".$_SESSION['id']."'";

        $results = mysqli_query($link,$query);
        $row = mysqli_fetch_array($results);

        
        $user_Server_Name = $row['name'];
        return $user_Server_Name;
        
        
    }
}
    
}



//////////////////////////////////////////////////////////////////////
/*
                    New Entry -Page
*/
//////////////////////////////////////////////////////////////////////


/*
// Recording diary entry function to a .txt file:

if(function_exists('post_Diary_Entry') === false){
    
    function post_Diary_Entry(){
        // Declare GLOBAL variables:


        global $diary_Entry_Error_Message;
        global $_SESSION;

        $diary_Entry_Error_Message = "";

        if($_POST['submit_Diary_Entry']){

            // Check if `subject` is empty:
            if(!isset($_POST['diary_Subject']) || $_POST['diary_Subject'] == ""){

                $diary_Entry_Error_Message = "Sorry, No Subject was found.";
            }

            // Check if `contents` is empty:
            if(!isset($_POST['diary_Content']) || $_POST['diary_Content'] == ""){

                $diary_Entry_Error_Message = "Sorry, No diary entry content found.";
            }



            if(!isset($diary_Entry_Error_Message)){

                $diary_Entry_Error_Message = "<div class='alert alert-danger' role='alert'>
                            <p>ERROR:</p>".$diary_Entry_Error_Message."
                         </div>";

            }else{

                // Declare cariables for $_POST[''] variables:
                $diary_Date_Picker = $_POST['diary_Date_Picker'];
                $diary_Subject = $_POST['diary_Subject'];
                $diary_Content = $_POST['diary_Content'];

                // Testing that all variables are assigned correctly
                // echo "Date: ".$diary_Date_Picker."</br> Subject: ".$diary_Subject."</br> Contents: ".$diary_Content;


                // Open or Create email.txt file    
                $myfile = fopen($_SESSION['id'].".txt","a") or die("Unable to open file!");
                // Declare contents
                $txt = 
                    "--- START OF: '".$diary_Date_Picker."' ---"."\n\n".
                    "<div id='".$diary_Date_Picker."'> DATE: '".$diary_Date_Picker."'\n".
                    "SUBJECT: '".$diary_Subject."'\n\n".
                    "CONTENT: \n'".$diary_Content."' </div>".
                    "\n".
                    "--- END OF ENTRY: ---"."\n\n\n";


                // Write to .txt file
                fwrite($myfile, $txt);
                // Close .txt file
                fclose($myfile);
                
                $diary_Entry_Error_Message = 
                    "<div class='alert alert-success' role='alert'> Diary Entry successfully and securely stored! </div>";

            }
        }
    }
}
*/



// Recording diary entry function to DB:

if(function_exists('post_Diary_Entry') === false){
    
    function post_Diary_Entry(){
        // Declare GLOBAL variables:

        global $diary_Entry_Error_Message;
        global $_SESSION;
        global $link;
        
        $diary_Entry_Error_Message = "";

        if($_POST['submit_Diary_Entry']){

            // Check if `subject` is empty:
            if(!isset($_POST['diary_Subject']) || $_POST['diary_Subject'] == ""){

                $diary_Entry_Error_Message = "Sorry, No Subject was found.";
            }

            // Check if `contents` is empty:
            if(!isset($_POST['diary_Content']) || $_POST['diary_Content'] == ""){

                $diary_Entry_Error_Message = "Sorry, No diary entry content found.";
            }



            if(!isset($diary_Entry_Error_Message)){

                $diary_Entry_Error_Message = "<div class='alert alert-danger' role='alert'>
                            <p>ERROR:</p>".$diary_Entry_Error_Message."
                         </div>";

            }else{

                // Declare cariables for $_POST[''] variables:
                $diary_Date_Picker = $_POST['diary_Date_Picker'];
                $diary_Subject = $_POST['diary_Subject'];
                $diary_Content = $_POST['diary_Content'];
                $diary_Session_Identifier = $_SESSION['id'];

                
                
                // Fetch `post_Count` used for post identification.
                
                $query = "
                SELECT `post_Count` 
                FROM `users` 
                WHERE `email` 
                = '".mysqli_real_escape_string($link,$diary_Session_Identifier)."'";
                
                $results = mysqli_query($link,$query);
                
                $row = mysqli_fetch_array($results);
                
                $post_Count = $row['post_Count'];
                                
                // Increase post_Count for identification use next time.
                $post_Count++;
                
                // Fetch `diary_Content` used for post identification.
                
                $query = "
                SELECT `diary_Content` 
                FROM `users` 
                WHERE `email` 
                = '".mysqli_real_escape_string($link,$diary_Session_Identifier)."'";
                
                $results = mysqli_query($link,$query);
                
                $row = mysqli_fetch_array($results);
                
                $entry_Input_Text = $row['diary_Content'];
                
                // declare string format of Diary Content to be placed in DB
                $entry_Input_Text .= 
                    
                    "<div class='card border-dark w-100 p-0 m-0 position-relative'>
                           
                            <div class='card-header border-dark' id='heading_".$post_Count."'>
                                <h2 class='mb-0'>
                                    <button class='btn btn-link' type='button' data-toggle='collapse' data-target='#collapse_".$post_Count."' aria-expanded='false' aria-controls='collapse_".$post_Count."'>
                                        <span class:'text-bold h4'> DATE: </span> ".$diary_Date_Picker."
                                    </button>
                                </h2> <!-- -->
                            </div><!-- END OF: .card-header -->

                            <div id='collapse_".$post_Count."' class='collapse' aria-labelledby='heading_".$post_Count."' data-parent='#view_Entries_Accordion'>
                                <div class='card-body px-3 border-dark'>
                                    
                                    <p class='text-center h4'>".$diary_Subject."</p>
                                    
                                    <hr class='bg-primary mx-5 text-center'>
                                    
                                    <p class='px-2'>".$diary_Content."</p>
                    
                                </div> <!-- END OF: .card-body -->
                            </div> <!-- END OF: collapse_One -->
                            
                    </div> <!-- END OF: .card --> ";
                    
                
                // Query for information update on server
                $query = "
                UPDATE `users` 
                SET `post_Count` = '".mysqli_real_escape_string($link,$post_Count)."', 
                    `diary_Content` = '".mysqli_real_escape_string($link,$entry_Input_Text)."'  
                WHERE `email` 
                = '".mysqli_real_escape_string($link,$diary_Session_Identifier)."'";
                
                mysqli_query($link,$query);
                
                // Success message alert
                $diary_Entry_Error_Message = 
                    "<div class='alert alert-success' role='alert'> Diary Entry successfully and securely stored! </div>";

            }
        }
    }
}

//////////////////////////////////////////////////////////////////////
/*
                    My Account -Page
*/
//////////////////////////////////////////////////////////////////////


// Delete User account
if(function_exists('delete_User_Account') === false){
    function delete_User_Account(){
        
        global $account_Delete_Message;
        global $link;
        global $_POST;
        global $_SESSION;
        global $error_Success_Alert;
        
        if($_POST['delete_Input_Submit']){

            if($_POST['delete_Input'] == "" || !isset($_POST['delete_Input'])){

                $account_Delete_Message = "<div class='alert alert-danger'>Please type in `DELETE` to confirm your account deletion.</div>";
                
                return $account_Delete_Message;


            }elseif($_POST['delete_Input'] == "DELETE"){

                // Query to `delete` Account
                $query = "DELETE FROM `users` WHERE `email` = '".mysqli_real_escape_string($link,$_SESSION['id'])."'";
                
                // Run `delete` query
                mysqli_query($link,$query);
                
                // Redirect to welcome Page
                header ("Location: ../index_Rename.php");
                
                // Not Working (Return message to `login` page `alert div`)
                //$error_Success_Alert = "<div class='alert alert-danger'>Account Successfully deleted.</div>";
                // return $error_Success_Alert;
            }

        }
    }
}


// Recall Personal Information

if(function_exists('recall_User_Info') === false){

    function recall_User_Info(){
        
        global $link;
        global $_SESSION;
        global $user_A_Name;
        global $user_A_Surname;
        global $user_A_Email;
        global $user_A_Phone;
        
        $query = "SELECT * FROM `users` WHERE `email` = '".mysqli_real_escape_string($link,$_SESSION['id'])."'";
        $results = mysqli_query($link,$query);
        $row = mysqli_fetch_array($results);
        
        // Name validation
        if(!isset($row['name']) || $row['name'] == ""){
            
            $user_A_Name = "";
            
        }else{
            
            $user_A_Name = $row['name'];
            
        }
        
        // Surname validation
        if(!isset($row['surname']) || $row['surname'] == ""){
            
            $user_A_Surname = "";
            
        }else{
            
            $user_A_Surname = $row['surname'];
            
        }
        
        // Email validation
        if(!isset($row['email']) || $row['email'] == ""){
            
            $user_A_Email = "";
            
        }else{
            
            $user_A_Email = $row['email'];
            
        }
        
        // Phone no validation
        if(!isset($row['phone']) || $row['phone'] == ""){
            
            $user_A_Phone = "";
            
        }else{
            $user_A_Phone = $row["phone"];
            
            // Format No. into visually acceptable string
            $user_A_Phone = substr($row['phone'],0,3)." ".substr($row['phone'],3,3)." ".substr($row['phone'],6,4);
        }
    }
}
    
// Update information

if(function_exists('update_User_Info') === false){

    function update_User_Info(){
        
        global $link;
        global $account_Error_Message;
        global $_SESSION;
        global $_POST;
        
        $account_Error_Message = "";
        
        if($_POST['user_Update_Info']){
            
            // Form `name` Validation
            if(!isset($_POST['user_A_Name']) || $_POST['user_A_Name'] == ""){
                
                $account_Error_Message = "<p> Please enter your name. </p>";

            }
            
            // Form `email` Validation
            if(!isset($_POST['user_A_Email']) || $_POST['user_A_Email'] == ""){
                
                    $account_Error_Message .= "<p> Please enter your email. </p>";

                } 

            // Form `phone` Validation
            if($_POST['user_A_Phone'] != ""){
                
                if (strlen($_POST['user_A_Phone']) < 10 || strlen($_POST['user_A_Phone']) > 13) {
                    
                    $account_Error_Message .= "<p> Invalid phone number. </p>";
                    
                } else {
                    
                    $custom_Number = $_POST['user_A_Phone'];
                    
                    $custom_Number = str_replace(" ", "", $custom_Number);
                    $custom_Number = str_replace("/", "", $custom_Number);
                    // Removes `backslashes`
                    $custom_Number = stripslashes($custom_Number);
                    $custom_Number = str_replace("+", "", $custom_Number);
                    $custom_Number = str_replace("-", "", $custom_Number);
                    
                    if(strlen($custom_Number) == 10){
                        
                        $insert_Number = $custom_Number;
                        
                    }
                    
                }
            }
            
            
            
            if($account_Error_Message == ""){
                
                $user_Add_Name = $_POST['user_A_Name'];
                $user_Add_Surname = $_POST['user_A_Surname'];
                
                
                // Initialise Query
                $query = "UPDATE `users` SET 

                        `name` = '".mysqli_real_escape_string($link,$user_Add_Name)."',
                        `surname` = '".mysqli_real_escape_string($link,$user_Add_Surname)."',
                        `phone` = '".mysqli_real_escape_string($link,$insert_Number)."' 
                        WHERE `email` ='".mysqli_real_escape_string($link,$_SESSION['id'])."'";
                
                mysqli_query($link,$query);
                
                $account_Error_Message .= "<div class='alert alert-success'>Account Details successfully updated!</div>";
                
                //Display correct Name 
                global $user_A_Name;
                $user_A_Name = $user_Add_Name;
                
                
                // Display Correct Surname
                global $user_A_Surname;
                $user_A_Surname = $user_Add_Surname;
                
                
                // Display correct Phone no
                global $user_A_Phone;
                $user_A_Phone = substr($insert_Number,0,3)." ".substr($insert_Number,3,3)." ".substr($insert_Number,6,4);
                
                // Display Success Message
                return $account_Error_Message;        
                
            }else{
                
                $account_Error_Message = "<div class='alert alert-danger'><div class='h3'>An Error(s) has occured:</div> '".$account_Error_Message."'</div>";
                return $account_Error_Message;
            }
            
  
        }    
        
    }

}









?>