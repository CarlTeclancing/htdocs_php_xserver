<html>
    <head>
    <title>exercise one in php</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    </head>
</html>
<?php


// Database credentials
require('../database/connection.php');

// Insert data into database
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if ((!empty($_POST["fname"])) && (!empty($_POST["lname"])) && (!empty($_POST["email"]))){
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];

        $sql = "INSERT INTO users (fname, lname, email) VALUES ('$fname', '$lname', '$email')";

    }
    // Do something with the data, such as save it to a database or send an email

}



if ($conn->query($sql) === TRUE) {

    echo '<div class="alert alert-primary" role="alert">
    Information submitted successfully!
  </div>';
 
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

