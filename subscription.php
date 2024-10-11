<?php

$servername="localhost";
$username= "root";
$password= "";
$dbname= "cw412";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection Failed:".$conn->connect_error);
}

//Handle form submission
if ($_SERVER['REQUEST_METHOD']=='POST'){
    $email = $_POST['email'];
    // $time = $_POST['time'];
}

    $stmt = $conn->prepare("INSERT INTO subscriptions(email) VALUES(?)");
    $stmt->bind_param("s", $email);

    if ($stmt->execute()) {
        echo 'Subscription successful!!';
    } else {
        echo'ERROR:'.$stmt->error;
    }

    $stmt->close();
    $conn->close();
?>