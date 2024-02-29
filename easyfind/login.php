<?php require "includes/header.php" ?>


<?php

if(isset($_SESSION['name'])) {
    header("location: missing.php");


}else{
if(isset($_POST['email']) && (isset($_POST['pass']))) {
    // Include the database connection file
    include('db_connection.php');

    // Get user input
    $email = $_POST['email'];
    $password = $_POST['pass'];

    // Check if the user exists
    $query = "SELECT * FROM user WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {

            session_start();

            $_SESSION['name'] = $row['name'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['address'] = $row['address'];
            $_SESSION['id'] = 1;

            echo "Login successful. Welcome, " . $_SESSION['name'];
            header("location: missing.php");
        } else {
            echo "Incorrect password. Please try again.";
        }
    } else {
        echo "User not found. Please register first.";
    }

    // Close the database connection
    mysqli_close($conn);
}else{
    echo "filds empty";
}
}


?>

<main class="container-fluid bg-primary" style="height:100vh;">



<div class="container d-flex justify-content-center flex-column p-4">
<div class="container bg-light w-100 d-flex justify-content-around align-items-center shadow-lg rounded-lg" style="padding: 50px;">
        <form action="" method="post" enctype="multipart/form-data" class="p-4">
            <div class="card shadow-lg m-auto submit-card p-4">
                <div class="card-header">
                    <h2 class="text-center mb-0" style="font-size: 20px">Login In</h2>
                </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                        </div>
                        <input type="text" class="form-control" name="email" placeholder="User Name | Email">
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-user"></i></span>
                        </div>
                        <input type="password" class="form-control text-capitalize" placeholder="Password" name="pass">
                    </div>
                </div>
                <div class="card-footer">
                    <div class="form-group">
                        <input type="submit" value="LogIn" class="btn btn-danger btn-block rounded-0" name="submitDocument">
                    </div>
                </div>
                <a href="signup.php">Dont have an acount? Register here</a>
            </div>
        </form>
</div>
</div>
</main>
