<?php

//////////////////////////////////////////////////////////////////////
/*
                    Call all external php scripts
*/
//////////////////////////////////////////////////////////////////////
// include "functions/";

include "../functions/includes.php";

// Declare global variables
global $link;
global $_SESSION;

$diary_Content = "";

$query = "SELECT `post_Count`, `diary_Content` FROM `users` WHERE `email` = '".mysqli_real_escape_string($link,$_SESSION['id'])."'";

$results = mysqli_query($link, $query);

$row = mysqli_fetch_array($results);

// $post_Count = "'".($row['post_Count'] - 1)."'";

                        
  if($row['diary_Content'] == ""){
      
      $diary_Content = "<div class='alert alert-danger text-center' role='alert'> No diary entries found. </div>";
      
  }else{
      
      $diary_Content = $row['diary_Content'];
      
  }                      



?>

<!doctype html>
<html lang="en"> <!-- START OF: <html> -->
  <head> <!-- START OF: <head> -->
    
    <!-- CSS Links -->
    
        <!-- Link to css normalising sheet. -->
        <link rel="stylesheet" type="text/css" href="../css/normalise.css">

        <!-- Link to css sheet -->
        <link rel="stylesheet" type="text/css" href="../css/stylesheet.css">

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
    <title>View Entries</title>
    
    
  </head> <!-- END OF: <head> -->
  
  
  <body> <!-- START OF: <body> -->
    
    <!-- Navbar div => include -->
    <div class="navigation_Area"><?php include ("nav.php") ?></div>
    
    
    <!-- Display area div -->
    <div class="container-fluid"> <!-- START OF: .container -->
           
        <div class="row align-items-center pt-5">
            <div class="col"></div> <!-- -->
            <div class="container col-sm col-md-8 bg-white border-primary rounded-lg my_Border p-md-5 p-sm-3">

                <h1 class="text-black d_Main_Header text-center">Previous Diary Entries:</h1>
                <hr class="bg-dark text-center w-25">

                <div class="container w-75">

                    <div class="accordion w-100 position-relative" id="view_Entries_Accordion">

                        <?php

                            echo $diary_Content;

                        ?>

                    </div>  <!-- END OF: .accordion -->

                </div>

            </div> <!-- -->
            <div class="col"></div> <!-- -->
        </div> <!-- -->    

    </div> <!-- END OF: .container --> 
    
    
    

    <!-- Footer div => include -->
    <div class="main_Footer"><?php include __DIR__."/../src/footer.php"; ?></div>

    
    <!-- jQuery Link -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
	integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
	crossorigin="anonymous"></script>
   
   <!-- Offline jQuery Link -->
    <script src="../resources/jquery-3.4.1.js"></script>  
  
   <!-- Popper.js Link -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <!-- Bootstrap JavaScript Link -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
    <!-- Link to own JavaScript sheets -->
    
    <script type="text/javascript" src="../javascript/javascript.js">
    </script> <!-- END OF: Link to own JavaScript sheets -->
    
    
    
    <!-- Optional In-File JavaScript -->
    <script type="text/javascript">
        
        // Call function
        media_Resizer();
        // Runs the function on resizing event.        
        window.addEventListener('resize',media_Resizer,false);
        
    </script> <!-- END OF: Optional In-File JavaScript -->
    
    
  </body> <!-- END OF: <body> -->
  
</html> <!-- END OF: <html> -->