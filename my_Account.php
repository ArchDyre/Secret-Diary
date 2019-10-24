<?php ob_start(); ?>
<?php

//////////////////////////////////////////////////////////////////////
/*
                    Call all external php scripts
*/
//////////////////////////////////////////////////////////////////////
// include "functions/";

include "functions/includes.php";

delete_User_Account();
recall_User_Info();
update_User_Info();

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
    <title>My Account</title>
    
    
  </head> <!-- END OF: <head> -->
  
  
  <body> <!-- START OF: <body> -->
    
    <!-- Navbar div => include -->
    <div class="navigation_Area"><?php include ("src/nav.php") ?></div>
    
    
    <!-- CONTENT: -->
    
        <div class="container">
        
        <div class="row">
            
            <div class="col"></div>
            
            <div class="col-md-8 col-sm-12 bg-light p-md-5 p-sm">

                <div class="h1 text-dark text-center p-md-3 p-sm-1">Account Information</div>
                
                <div class="text-center" id="account_Alert_Message"><?php echo $account_Error_Message; echo $account_Delete_Message; ?> </div>

                <div class="row bg-light m-sm-0 m-md">
                    
                    <div class="col-md-4 col-sm-3 p-2 m-n1">

                        <nav class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical" style="min-height: 200px;">
                        
                            <a class="nav-link text-left active mx-sm-0 mx-md" id="personal_Details_Tab" data-toggle="pill" href="#personal_Details" role="tab" aria-controls="personal_Details" aria-selectred="true">Personal Details</a> <!-- -->

                            <a class="nav-link text-left mx-sm-0 mx-md" id="email_Preferences_Tab" data-toggle="pill" href="#email_Preferences" role="tab" aria-controls="email_Preferences" aria-selectred="true">Email Preferences</a> <!-- -->

                            <a class="nav-link text-left mx-sm-0 mx-md" id="delete_User_Account_Tab" data-toggle="pill" href="#delete_User_Account" role="tab" aria-controls="delete_User_Account" aria-selectred="true">Delete Account</a> <!-- -->

                        </nav>

                    </div> <!-- END OF: .col -->

                    <div class="col-md-8 col-sm px-md-4 px-sm-2 pb-sm-2 pb-md-3 pt-sm-5 pt-md-0" style="min-height: 150px;">

                        <div class="tab-content">

                            <div class="tab-pane fade show active" id="personal_Details" role="tabpanel" aria-labelledby="personal_Details_Tab">
                                
                                <form method="post">            
                                    <table class="table" id="user_Info_Table">

                                      <tbody>
                                        <tr>
                                          <td class="py-3">Name</td>
                                          <td class="form-group">

                                                <input type="text" class="text-body form-control" id="user_A_Name" name="user_A_Name" placeholder="Insert Name" value="<?php echo $user_A_Name;?>">

                                          </td> <!-- END OF: td -->
                                        </tr> <!-- END OF: tr -->

                                        <tr>
                                          <td class="py-3">Surname</td>
                                          <td class="form-group">

                                                <input type="text" class="text-body form-control" id="user_A_Surname" name="user_A_Surname" placeholder="Insert Surname" value="<?php echo $user_A_Surname;?>">

                                          </td> <!-- END OF: td -->
                                        </tr> <!-- END OF: tr -->

                                        <tr>
                                          <td class="py-3">Email</td>
                                          <td class="form-group">

                                                <input type="email" class="text-body form-control" id="user_A_Email" name="user_A_Email" placeholder="info@example.com" value="<?php echo $user_A_Email;?>" readonly>

                                          </td> <!-- END OF: td -->
                                        </tr> <!-- END OF: tr -->

                                        <tr>
                                          <td class="py-3">Phone no</td>
                                          <td class="form-group">

                                                <input type="tel" class="text-body form-control" id="user_A_Phone" name="user_A_Phone" placeholder="021 xxx nnnn" value="<?php echo $user_A_Phone;?>">

                                          </td> <!-- END OF: td -->
                                        </tr> <!-- END OF: tr -->

                                      </tbody> <!-- END OF: tbody -->

                                    </table>  <!-- END OF: table -->
                                    
                                    <div class="form-group text-center">
                                        
                                        <input type="submit" id="user_Update_Info" name="user_Update_Info" class="btn btn-primary" value="Update Information">
                                        
                                    </div>
                                    
                                </form> <!-- END OF: form -->         

                            </div> <!-- END OF: #personal_Details -->

                           
                            <div class="tab-pane fade text-center" id="email_Preferences" role="tabpanel" aria-labelledby="email_Preferences_Tab">
                                
                                <div class="form-group form-check pt-5">
                                    <input type="checkbox" class="form-check-input checkbox_id" id="newsletter_Check">
                                    <label class="form-check-label" for="newsletter_Check">Subscribe to our newsletter</label>
                                </div> <!-- -->
                            
                            
                            </div> <!-- END OF: #personal_Details -->

                           
                            <div class="tab-pane fade" id="delete_User_Account" role="tabpanel" aria-labelledby="delete_User_Account_Tab">
                               
                                <form method="post">
                                   
                                    <div class="form-group text-center">
                                        <label for="delete_Input" class="text-center p-3">Please type <strong>`DELETE`</strong> below, <br>to successfully delete your account:</label>
                                        <input type="text" id="delete_Input" name="delete_Input" class="form-control text-center font-weight-bold w-50 mx-auto">
                                    </div>
                                                 
                                    <div class="form-group text-center mt-md-5 mt-5 mb-5 mb-md-2">
                                        
                                        <input type="submit" id="delete_Input_Submit" name="delete_Input_Submit" class="btn btn-danger" value="Delete My Account">
                                        
                                    </div>  
                                              
                                </form> <!-- END OF: -form -->
                                
                            </div> <!-- END OF: #personal_Details -->

                        </div> <!-- END OF: .tab-content -->

                    </div> <!-- END OF: .col -->

                </div> <!-- END OF: .row -->
            </div> <!-- --> 
            
            <div class="col"></div>
            
        </div> <!-- -->
                  
                
    </div> <!-- END OF: .container-fluid -->
    
    <!-- END OF: content -->
    
    

    
    <!-- Footer div => include -->
    <div class="main_Footer"><?php include "src/footer.php"; ?></div>
    