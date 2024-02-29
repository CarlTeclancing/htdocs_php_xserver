<?php
session_start();

//connectiong to the database

require('../database/connection.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if ((!empty($_POST["email"])) && (!empty($_POST["password"]))){

        $email = $_POST['email'];
        $password = $_POST['password'];

        //checking if email and password match to those in the db
        $sql = ("SELECT * FROM admin");
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            //looping through the data 
            while($row = $result->fetch_assoc()) {
                if((password_verify($password, $row['password']))&& ($email == $row['email'])) {
                    // Passwords match, login successful
                    // succesulll login message

                    $_SESSION['username'] = $row['username'];
                    $_SESSION['id'] = $row['id'];
    
                    
                    $query = http_build_query(['succes' => 'loginsucces']);
                    header('Location: ../admin/?' .$query);
                  }else{
                    $query = http_build_query(['error' => 'loginerror']);
                     header('Location: ../login.php?' . $query);
                  }


                  }
                // echo "<pre>";

                // print_r($row);

                // echo "<pre>";           
  }

        
    }
}

$conn->close();

