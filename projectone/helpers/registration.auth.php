<?php

require('../database/connection.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if ((!empty($_POST["fname"])) && (!empty($_POST["lname"])) && (!empty($_POST["username"])) && (!empty($_POST["email"])) && (!empty($_POST["password"]))){
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $username = $_POST['username'];
        $email = $_POST['email'];

        //hashing the passwod

        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        //checking if email and password already exist in the db
        $sql = ("SELECT username, email FROM admin");
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            //looping through the data 
            while($row = $result->fetch_assoc()) {
                if(($email != $row['email']) && ($username != $row['username'])) {
                    // runn prepare and bind
        
                    $stmt = $conn->prepare("INSERT INTO admin (fname, lname, username, email, password) VALUES (?, ?, ?, ?, ?)");
                    $stmt->bind_param("sssss", $fname, $lname, $username, $email, $hashed_password);
            
                    if($stmt->execute()){
                        echo "New records created successfully";
                    }
            
                    $stmt->close();
                  }else{
                    echo "creaditials already registed";
                  }
                // echo "<pre>";

                // print_r($row);

                // echo "<pre>";

                
               
  }

        
    }
}
}

$conn->close();

