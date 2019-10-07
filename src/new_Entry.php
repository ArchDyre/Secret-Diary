<?php

//////////////////////////////////////////////////////////////////////
/*
                    Call all external php scripts
*/
//////////////////////////////////////////////////////////////////////
// include "functions/";

include "../functions/includes.php";

post_Diary_Entry();

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
    <title>New Entry</title>
    
    
  </head> <!-- END OF: <head> -->
  
  
  <body> <!-- START OF: <body> -->
    
    <!-- Navbar div => include -->
    <div class="navigation_Area"><?php include ("nav.php") ?></div>
    
        
        <!-- Display area div -->
        <div class="container-fluid my-auto"> <!-- START OF: .container -->
           
            <div class="row align-items-center py-lg-n5" id="diary_Entry_Container">
                
                <div class="col"></div>  
                   
                <div class="col-sm-10 col-md-6 col-lg-6 bg-white border-primary rounded-lg my_Border" id="diary_Col">
                    <div class="container p-sm-2 p-md-4 p-lg-3 m-0">
                        <div class="container my-4">
                            <h1 class="text-center m-0 d_Main_Header">My Diary Entry</h1>
                            <hr class="bg-dark mx-5">
                        </div> <!-- -->

                        <!-- Error message alert div -->
                        <div class="text-center w-75 m-auto p-auto"><?php echo $diary_Entry_Error_Message ?></div>

                        <form method="post" id="diary_New_Entry">

                            <div class="form-group row justify-content-center align-items-center">
                                <label for="diary_Date_Picker" class="col-sm-3 col-md-5 col-lg-3 h5 text-center">Entry Date</label>
                                <div class="col-sm col-md col-lg-6">
                                    <input id="diary_Date_Picker" name="diary_Date_Picker" type="date" class="form-control" required>
                                </div> <!-- -->
                            </div> <!-- END OF: row_1 -->

                            <div class="form-group row justify-content-center align-items-center">
                                <label for="diary_Subject" class="col-sm-3 col-md-5 col-lg-3 h5 text-center">Subject</label>
                                <div class="col-sm col-md col-lg-6">
                                    <input id="diary_Subject" name="diary_Subject" type="text" class="form-control" placeholder="The Best Day Ever!!!" maxlength="80" required>
                                </div> <!-- -->
                            </div> <!-- END OF: row_2 -->

                            <div class="form-group mt-4 px-lg-5 px-md-2 px-sm-2 text-center">
                                <label for="diary_Content" class="d_Sub_Header h3">Diary content</label>
                                <textarea id="diary_Content" name="diary_Content" class="form-control" placeholder="Today was a good day, because..." style="min-height: 200px;" required></textarea>
                            </div> <!-- END OF: `text area` div -->

                            <div class="form-group row text-center align-items-center">
                               
                                <div class="col"></div>
                                <div class="col form-group">
                                    <input type="submit" name="submit_Diary_Entry" id="submit_Diary_Entry" value="Add to my Diary" class="btn btn-primary btn-sm">
                                </div> <!-- -->
                                <div class="col"></div>
                                
                            </div> <!-- END OF: row_3 -->
                    
                        </form> <!-- END OF: form -->
                    </div> <!-- END OF: .form + .heading == 1st layer container -->
                </div> <!-- END OF: .form + .heading == 2de layer container -->
                
                <div class="col"></div>

            </div><!-- -->  

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
        
        /* Loads Nav 
        $("#nav").load("nav.html");
        */
        
        // Call function
        media_Resizer();
        // Runs the function on resizing event.        
        window.addEventListener('resize',media_Resizer,false);
        
          
                
        
    </script> <!-- END OF: Optional In-File JavaScript -->
    
    
  </body> <!-- END OF: <body> -->
  
</html> <!-- END OF: <html> -->