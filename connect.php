<?php
    $name = $_POST['name'];
    $number = $_POST['number'];
    $orders = $_POST['orders'];
    $method = $_POST['method'];
    $howmuch = $_POST['howmuch'];
    $datetime = $_POST['datetime'];
    $address = $_POST['address'];
    $message = $_POST['message'];

    $conn = new mysqli('localhost','root','','jrjdb');
    if($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error);
    }else{
        $stmt = $conn->prepare("insert into jrjorders(name, number, orders, method, howmuch, datetime, address, message) values(?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sississs",$name, $number, $orders, $method, $howmuch, $datetime, $address, $message);
        $stmt->execute();
        echo "thank you for ordering...";
        $stmt->close();
        $conn->close();
    }


?>