<?php

//////////////////////////////////////////////////////////////////////
/*
                    Call all external php scripts
*/
//////////////////////////////////////////////////////////////////////

include "functions/login_Registration.php";
include "functions/functions.php";
include "functions/logged_Id.php";

// Starts Session
session_start();
global $error_Success_Alert;

login_System();
registration_System();

?>




<!doctype html>
<html lang="en"> <!-- START OF: <html> -->
  <head> <!-- START OF: <head> -->
    
    <!-- CSS Links -->
    
        <!-- Link to css normalising sheet. -->
        <link rel="stylesheet" type="text/css" href="./css/normalise.css">

        <!-- Link to css sheet -->
        <link rel="stylesheet" type="text/css" href="./css/stylesheet.css">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    
    <!-- IE 8 and below compatibility with HTML5 -->
    
        <!--[if IE]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js">
            </script>
        <![endif]-->  
    
    <!-- Declare <meta> variables -->
    
        <!-- Declare description of website -->
        <meta name="description" content="">
        <!-- Declare author of website. -->
        <meta name="author" content="Rohan Dyre">
        <!-- Declare keywords relating to SEO of website content -->
        <meta name="keywords" content="">
        <!-- Required meta tags -->
        <!-- Defines the character encoding used -->
        <meta charset="utf-8">
        <!-- Ensure resizing based on device -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    
    
    
    <!-- Change the title of the website -->
    <title id="page_Title">Login</title>
    
    
  </head> <!-- END OF: <head> -->
  
  
  <body> <!-- START OF: <body> -->

    <div class="container h-100"> <!-- START OF: .container -->

           <!-- Row Container for the forms -->
            <div class="row h-100 ">

                <div class="col"></div>
                <div class="col-5 align-self-center">
                    
                    <h1 class="text-white text-center text-wrap font-weight-bold f_Main_Header">Secret Diary</h1>
                    <h4 class="text-light text-center text-wrap f_Sub_Header">Store your thoughts permanently and securely.</h4>
                    <hr class="bg-light">
                    
                    <div class="w-100"></div>
                    
                    <!-- Error message display area -->
                    <div id="message_Area" class="text-white text-center"><?php echo $error_Success_Alert; ?></div>
                    
                    
                    <!-- Login Form -->
                    <form method="post">

                        <div id="login_Container" class="form-group">

                            <div id="login_Details_Container">

                                <div class="form-group">    
                                    <label for="login_Email" class="label_White_Styler">Email Address</label>
                                    <input type="email" id="login_Email" name="login_Email" class="form-control text-body" placeholder="Enter email here...">
                                </div> <!-- -->   

                                <div class="form-group">  
                                    <label for="login_Password" class="label_White_Styler">Password</label>   
                                    <input type="password" id="login_Password" name="login_Password" class="form-control text-body" placeholder="Enter password here...">
                                </div>    

                            </div> <!-- END OF: #login_Details_Container -->

                            <div id="login_Submit_Container" class="text-center">   

                                <div class="form-group">  
                                    <input type="checkbox" id="stay_Logged_Box" name="stay_Logged_Box" class="checkbox_id form-check-input text-body">
                                    <label class="form-check-label label_White_Styler" for="stay_Logged_Box">Remember me</label>
                                </div> <!-- --> 
                                
                                <div class="form-group"> 
                                    <input type="submit" name="login_Button" id="login_Button" value="Log in" class="btn btn-success login_Buttons">
                                </div> <!-- -->
                                
                                
                                <div class="form-group">
                                    <p class="text-white not_Member_Title">Not a member?<button class="btn btn-outline-primary btn-sm m-2 login_Buttons" id="btn_Switch_To_Register">Register now</button></p>
                                    
                                </div> <!-- -->

                            </div> <!-- #login_Submit_Container -->    

                        </div> <!-- END OF: #login_Container -->
                            
                    </form> <!-- END OF: login form -->
                    
                    <!-- Registration form -->
                    <form method="post">
                           
                            <!-- Registration container -->
                            
                        <div id="registration_Container" class="form-group hide_Me">

                            <div id="register_Details_Container">   
                                
                                    <!-- Name -->
                                <div class="form-group">
                                    <label for="register_Name" class="label_White_Styler">Name</label>
                                    <input type="text" id="register_Name" name="register_Name" class="form-control text-body" placeholder="Enter Name here..." required>
                                </div> <!-- -->
                                   
                                   <!-- Email -->
                                <div class="form-group">
                                    <label for="register_Email" class="label_White_Styler">Email address</label>
                                    <input type="email" id="register_Email" name="register_Email" class="form-control text-body" placeholder="Enter email here..." required>
                                </div> <!-- -->
                                
                                    <!-- Password -->
                                <div class="form-group">  
                                    <label for="register_Password" class="label_White_Styler">Password</label> 
                                    <input type="password" id="register_Password" name="register_Password" class="form-control text-body" placeholder="Enter password here..." required>
                                </div> <!-- -->

                            </div> <!-- END OF: #register_Details_Container -->    

                            <div id="register_Submit_Container" class="text-center">        
                                
                                <!-- `remember me` Checkbox -->
                                <div class="form-group">   
                                    <input type="checkbox" id="stay_Register_Box" name="stay_Register_Box" class="checkbox_id form-check-input  text-body">
                                    <label class="form-check-text label_White_Styler" for="stay_Register_Box">Remember me</label>
                                </div> <!-- -->    
                                
                                <!-- Registration Button -->
                                <div class="form-group">     
                                    <input type="submit" name="register_Button" id="register_Button" value="Register" class="btn btn-primary login_Buttons">
                                </div> <!-- -->
                                
                                
                                <!-- Switch to `login` screen -->
                                <div class="form-group">
                                    <p class="text-white not_Member_Title">Already a member?<button class="btn btn-outline-success btn-sm m-2 login_Buttons" id="btn_Switch_To_Login">Login</button></p>
                                </div> <!-- -->

                            </div> <!-- END OF: #register_Submit_Container -->

                        </div> <!-- END OF: #registration_Container -->
                        
                    </form> <!-- END OF: Registration form -->

                </div> <!-- END OF: middle collum -->
                <div class="col"></div><!-- -->
            </div> <!-- END OF: row -->
    </div> <!-- END OF: .container -->

    
    
    <!-- jQuery Link -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
	integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
	crossorigin="anonymous"></script>
   <!-- Popper.js Link -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <!-- Bootstrap JavaScript Link -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
    <!-- Link to own JavaScript sheets -->
    
    <script type="text/javascript" src="./javascript/javascript.js">
    </script> <!-- END OF: Link to own JavaScript sheets -->
    
    
    
    <!-- Optional In-File JavaScript -->
    <script type="text/javascript">
      

      
        
    </script> <!-- END OF: Optional In-File JavaScript -->
  </body> <!-- END OF: <body> -->
  
</html> <!-- END OF: <html> -->