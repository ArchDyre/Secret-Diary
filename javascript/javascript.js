//////////////////////////////////////////////////////////////////////
/*
                        Login && Registration - Pages
*/
//////////////////////////////////////////////////////////////////////


// Switches Login Screen => Register Screen

$('#btn_Switch_To_Register').click(function(){

    $('#registration_Container').removeClass('hide_Me');
    $('#login_Container').toggleClass('hide_Me',true);
    $('#page_Title').html("Registration");

    $('#message_Area').html("");

    return false;

});

// Switches Register Screen => Login Screen

$('#btn_Switch_To_Login').click(function(){

    $('#login_Container').removeClass('hide_Me');
    $('#registration_Container').toggleClass('hide_Me',true);
    $('#page_Title').html("Login");

    $('#message_Area').html("");

    return false;

});




//////////////////////////////////////////////////////////////////////
/*
                        Nav Bar
*/
//////////////////////////////////////////////////////////////////////

// Resize Navigation with window resize event
/*
Used to run:
    // Call function
    media_Resizer();
    
    // Runs the function on resizing event.
    window.addEventListener('resize',media_Resizer,false);

*/

function media_Resizer (){
            
    if (window.matchMedia("(max-width: 750px)").matches) {

        $('#logout_Button_Welcome').removeClass('ml-auto');
        $('#logout_Button_Welcome').addClass('m-auto');
        $('.nav-link').addClass('m-auto');

    }

    if(window.matchMedia("(min-width: 750px)").matches){

        $('#logout_Button_Welcome').addClass('ml-auto');
        $('#logout_Button_Welcome').removeClass('m-auto');
        $('.nav-link').removeClass('m-auto');
       }
    
    if(window.matchMedia("(min-width: 750px)").matches){
       
        $('.jumbotron_A').removeClass('pt-5', 'pb-5');
        $('.jumbotron_A').addClass('pt-3', 'pb-3');
       
       }
    

};


// Change active state of `Nav`
$(".custom_Navbar a").each(function(){

    if (this.innerHTML != document.title){

        this.classList.remove('disabled');
        this.classList.remove('font-weight-bold');
        $(this).removeClass('active');

    }else if(this.innerHTML == document.title){

            this.classList.add('disabled');
            this.classList.add('font-weight-bold');
            $(this).addClass('active');
       }

});


//////////////////////////////////////////////////////////////////////
/*
                    My Account Area - Page
*/
//////////////////////////////////////////////////////////////////////

        $("#newsletter_Check").click(function(){
            
            if($("#newsletter_Check").is(":checked")){
               
               $("#account_Alert_Message").html("<div class='alert alert-success'>You have successfully been subscribed to our newsletter!</div>");
               
            }else if($("#newsletter_Check").is(":checked") == false){
               
               $("#account_Alert_Message").html("<div class='alert alert-danger'>Your account has successfully been unsubscribed from our newsletter...</div>");
               
            }   
            
            
        });
        
        // Clears the alert message area's messages when switching tabs
        $("#personal_Details_Tab").click(function(){
            
            $("#account_Alert_Message").html("");
            
        });
        
        // Clears the alert message area's messages when switching tabs
        $("#email_Preferences_Tab").click(function(){
            
            $("#account_Alert_Message").html("");
            
        });
        
        // Clears the alert message area's messages when switching tabs
        $("#delete_User_Account_Tab").click(function(e){
            
            $("#account_Alert_Message").html("");
            
        });
        
function make_Active(){
        // Change active class ofter php submit
        $('#delete_Input').click(function(){
            
            $('#personal_Details_Tab').classList.remove('active');
            $('#email_Preferences_Tab').classList.remove('active');
            $('#delete_User_Account_Tab').addClass('active');
            
        });
}
        


//////////////////////////////////////////////////////////////////////
/*
                        Log Out Button
*/
//////////////////////////////////////////////////////////////////////

/* Redirect to the `logout.php` page on `logout button (class)` click. */
$(".log_Out_Buttons").click(function(){
            
            window.location.assign("../functions/logout.php");
            
        });



//////////////////////////////////////////////////////////////////////
/*
                        New Entry Page
*/
//////////////////////////////////////////////////////////////////////


// Display current date in `date input field` on new_Entry.php
document.getElementById("diary_Date_Picker").valueAsDate = new Date();


// Resets all checkboxes => `unchecked`

$('.checkbox_id').prop('checked', false);











