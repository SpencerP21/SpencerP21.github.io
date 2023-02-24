<?php
    error_reporting(0); // Ignore All Error Messages

    $fname = $_POST['firstName']; // Transfers ID Data From HTML
    $lname = $_POST['lastName'];
    $DoB = $_POST['dateOfBirth'];
    $pwd = $_POST['password'];

    // Connect To Database
    $conn = new mysqli('localhost', 'root','', 'engineering website');
    if($conn->connect_error){ // If Statement Handling If The Database Isnt Connected
        die('Connection Failed  :  ' .$conn->connect_error);      
    }else { // Else Statement Inputting Data Into The Database
        $stmt = $conn->prepare("insert into registration(firstName, lastName, dateOfBirth, password)
            values(?, ?, ?, ?)");
        $stmt->bind_param("ssss",$fname, $lname, $DoB, $pwd);
        $stmt->execute();
        echo "Account Retrieved Successfully...";
        $stmt->close();
        $conn->close();
    }


?>