<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $servername = "localhost";
    $dbuser = "root";
    $dbname = "form";
    $dbpass = "";

    // Create connection
    $conn = new mysqli($servername, $dbuser, $dbpass, $dbname);

    // Check connection
    if($conn->connect_error){
        die ("Connection failed: " . $conn->connect_error);
    } else {
        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO user (name, email, message) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $message);

        // Execute the statement
        if($stmt->execute()){
            echo "Added Successfully";
        } else {
            echo "Something went wrong";
        }

        // Close statement and connection
        $stmt->close();
        $conn->close();
    }
}
?>
