<?php

include ("functions/logout.php");

?>


    <!-- Inserts the `navbar` -->
    <div class="container-fluid mx-0 px-0 mb-5 fixed-top" id="nav"> <!-- START OF: .container-fluid -->
    
        <nav class="navbar navbar-expand-md navbar-light bg-light my-auto">


            <button class="navbar-toggler nav-brand mr-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button> <!-- -->



            <div class="navbar-nav collapse navbar-collapse m-auto" id="navbarSupportedContent">

                <a class="navbar-brand" href="welcome.php">
                    <img src="images/logo-text-only.png" width="75" height="35" alt="">
                </a> <!-- -->

                <div class="navbar-nav custom_Navbar">
                    <a class="nav-item nav-link nav_My_Color active font-weight-bold disabled " href="welcome.php">Home</a>
                        <span class="vertical_Line"></span>
                        <span > <hr class="m-auto border-dark"></span>
                    <a class="nav-item nav-link nav_My_Color" href="new_Entry.php">New Entry</a>
                        <span class="vertical_Line"></span>
                        <span > <hr class="m-auto border-dark"></span>
                    <a class="nav-item nav-link nav_My_Color" href="view_All_Entries.php">View Entries</a>
                        <span class="vertical_Line"></span>
                        <span > <hr class="m-auto border-dark"></span>
                    <a class="nav-item nav-link nav_My_Color" href="my_Account.php">My Account</a>
                    <span > <hr class="m-auto border-dark"></span>
                </div> <!-- -->

                <div class="navbar-nav ml-auto" id="logout_Button_Welcome">
                    
                    <form method="post" action=""><input type="submit" name="logout_Btn" value="Log Out"></form>
<!--                    <a class="nav-item nav-link text-body logout_Button_Styler log_Out_Buttons" href="functions/logout.php"> Log out</a>-->

                </div> <!-- -->

            </div><!-- -->

        </nav><!-- -->
   
    </div> <!-- END OF: #nav -->
