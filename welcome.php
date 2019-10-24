<?php ob_start(); ?>
<?php

//////////////////////////////////////////////////////////////////////
/*
                    Call all external php scripts
*/
//////////////////////////////////////////////////////////////////////
// include "functions/";

include "functions/includes.php";

?>

<!doctype html>
<html lang="en"> <!-- START OF: <html> -->
  <head> <!-- START OF: <head> -->
    
    <!-- CSS Links -->
    
        <!-- Link to css normalising sheet. -->
        <link rel="stylesheet" type="text/css" href="css/normalise.css">

        <!-- Link to css sheet -->
        <link rel="stylesheet" type="text/css" href="css/stylesheet.css">

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
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    
    
    
    <!-- Change the title of the website -->
    <title>Home</title>
    
    
  </head> <!-- END OF: <head> -->
  
  
  <body> <!-- START OF: <body> -->
    
    <!-- Navbar div => include -->
    <div class="navigation_Area"><?php include ("src/nav.php") ?></div>
    
    
        <div class="container-fluid m-0 p-0 h-100 position-relative content_Boxes"> <!-- START OF: .container -->
            <div class="row mx-0 my-auto h-100 align-items-center">
               
                <div class="container m-auto p-4 text-center w-50 bg-white">

                    <h1 class="text-black">Welcome Back,</h1>

                    <!-- Echo back name from server of logged in person. (Uses session information in the function) -->
                    <h4 class="text-primary font-weight-bold">--
                    <?php 

                        recall_User_Name();
                        echo $user_Server_Name;

                    ?> --</h4> <!-- -->

                    <hr class="my-4 bg-primary">
                    <h3 class="text-black m-3">Want to create a new diary entry?</h3>
                    <a href="new_Entry.php" class="btn btn-primary m-2">New Entry</a>

                </div> <!-- -->

            </div> <!-- END OF: .row -->
        </div> <!-- END OF: .container --> 

    <!-- Footer div => include -->
    <div class="main_Footer"><?php include "src/footer.php"; ?></div>
   