<?php

// Database credentials
require('../database/connection.php');

// Get the ID of the entry to edit from the URL
$id = $_GET['id'];

// Get the current data for the entry from the database
$sql = "SELECT * FROM users WHERE id = $id";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
} else {
    echo "Entry not found.";
}

// Check if the form has been submitted
if (isset($_POST['submit'])) {

    // Get the data from the form

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];

    // Update the entry in the database
 
    $sql = "UPDATE users SET fname='$fname', lname='$lname', email='$email' WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        echo "Entry updated successfully.";
    } else {
        echo "Error updating entry: " . mysqli_error($conn);
    }
}

mysqli_close($conn);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit your list</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</head>
<body>
        <!-- HTML form to display the current data and allow editing -->


    <body>
        <div class='container'>
            <nav class="navbar bg-light">
                <div class="container-fluid">
                <a class="navbar-brand">CODEwithCREST</a>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                    
                </div>
            </nav>
        
        <div class="container-fluid">
            <form method="POST" action="sendmail.php">
                <div class="input-group pt-4">
                    <span class="input-group-text" id="addon-wrapping">FN</span>
                    <input type="text" name="fname" value="<?php echo $row['fname']; ?>" class="form-control" placeholder="First name" required name="fname" aria-label="Username" aria-describedby="addon-wrapping" width="300px">
                </div>

                <div class="input-group pt-4">
                    <span class="input-group-text" id="addon-wrapping">LN</span>
                    <input type="text" name="lname" value="<?php echo $row['lname']; ?>" class="form-control" placeholder="Last name" required name="lname" aria-label="Username" aria-describedby="addon-wrapping" width="300px">
                </div>



                <div class="input-group pt-4">
                    <span class="input-group-text" id="addon-wrapping">@</span>
                    <input type="email" name="email" value="<?php echo $row['email']; ?>" class="form-control" placeholder="email" name="email" required aria-label="Email" aria-describedby="addon-wrapping" width="300px">
                </div>

                <div class="input-group pt-4">
                    <span class="input-group-text" id="addon-wrapping">MSG</span>
                    <textarea name="message"nwidth='300px'></textarea>
                </div>

                
                <button class="btn btn-primary mt-4" >Send Email</button>

            </form>


</body>
</html>

