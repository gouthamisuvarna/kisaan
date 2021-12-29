<?php
    
    $reason=$_POST['reason'];
    $date=$_POST['date'];
    $time=date('H:i',strtotime($_POST['time']));
    $amount =$_POST['amount'];
    $Recieve=$_POST['Recieve'];
    $animal = $_POST['animal'];

    $conn=new mysqli('localhost','root','','credit_display');
    if($conn->connect_error){
        die('Connection Failed :'.$conn->connect_error);
    }
    else{
        $stmt=$conn->prepare("INSERT INTO cow(reason,date,time,amount,Recieve,animal) values ('$reason','$date','$time','$amount','$Recieve','$animal')");
        $stmt->execute();
        echo "One transaction has been recorded!";
        header("credit.html");
        $stmt->close();
        $conn->close();
    }
?>