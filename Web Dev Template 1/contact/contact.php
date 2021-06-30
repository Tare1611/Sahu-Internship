<?php

    session_start();
    extract($_POST);
    $name = $_POST["name"];
    $mail = $_POST["email"];
    $phone = $_POST["phone"];
    $message = $_POST["message"];
    echo($name);

    $conn = new mysqli('localhost', 'root', '', 'sahu');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    $stmt = $conn->prepare("INSERT INTO contact (name, email, phone, message) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $mail, $phone, $message);
    $stmt->execute();
    $stmt->close();
    $conn->close();
    

    header("Location: contact.html")
?>