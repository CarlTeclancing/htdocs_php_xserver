<?php require "includes/header.php" ?>

<?php
// Include the database connection file

if(isset( $_POST['name']) && ($_POST['email'])&&($_POST['address'])&&($_POST['pass'])){
    include('db_connection.php');

// Get user input
$username = $_POST['name'];
$email = $_POST['email'];
$address = $_POST['address'];
$password = password_hash($_POST['pass'], PASSWORD_DEFAULT); // Hash the password

// Insert user data into the database
$query = "INSERT INTO user (`name`, `email`, `address`, `password`) VALUES ('$username', '$email', '$address', '$password')";
$result = mysqli_query($conn, $query);

if ($result) {
    echo "Registration successful. <a href='login.php'>Login here</a>";
} else {
    echo "Registration failed. Please try again.";
}

// Close the database connection
mysqli_close($conn);
}

?>


<main class="container-fluid bg-primary" style="height:100vh;">



<div class="container d-flex justify-content-center flex-column p-4">
<div class="container bg-light w-100 d-flex justify-content-around align-items-center shadow-lg rounded-lg" style="padding: 50px;">
        <form action="" method="post" class="p-4">
            <div class="card shadow-lg m-auto submit-card p-4">
                <div class="card-header">
                    <h2 class="text-center mb-0" style="font-size: 20px">Login In</h2>
                </div>

                <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control text-capitalize" placeholder="Enter name" name="name">
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
                        <input type="text" class="form-control text-capitalize" placeholder="Enter address" name="address">
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
                        <input type="submit" value="Register Me" class="btn btn-danger btn-block rounded-0" name="submitDocument">
                    </div>

                    <a href="./login.php">Already have an account</a>
                </div>
            </div>
        </form>
</div>
</div>
</main>
