<?php

$server_Name = "localhost";
$user_Name = "dpumoodr_admin";
$pass_Word = "97D!aRy97";
$db_Name = "dpumoodr_secret_diary";


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

}else{
    
    echo "Successfull Database Connection <br><br>";
    
    $query = "INSERT INTO `users` (`name`,`surname`) VALUES ('Jack','Worker')";
    $run = mysqli_query($link,$query);
    
    if(!$run){

        die("INSERT QUERY FAILURE: <br>" . mysqli_error($link));
        
    }else{
        
        echo "<br> User: Jack Worker has been added to the DB. <br>";
    
        $query = "SELECT * FROM `users` WHERE `name` = 'Rohan'";
        $results = mysqli_query($link,$query);

        if(!$results){

            die("SELECT QUERY FAILURE: <br>" . mysqli_error($link));

        }else{

            $row = mysqli_fetch_array($results);
            echo "<br><br> Name: ".$row['name']."<br> Surname: ".$row['surname']."<br> ID: ".$row['id'];
            echo "<br> Successfully Read from the DB";  

        }
        
    }
    
    
    
    
}




// DB WRITE





?>
