<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "debit_display";

    $conn = mysqli_connect($servername, $username,$password, $database);

    if(!$conn){
        die("Cannot connect to database because:".mysqli_error($conn));
    }
   

?>