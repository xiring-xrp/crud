<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "form";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if($conn){
        // echo "Connection Sucessfully";
    }else{
        echo "Connection Failed".mysqli_connect_error();
    }
?>