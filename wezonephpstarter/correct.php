<?php 
include "config.php";




if (isset($_POST['submit'])) 
// print_r($_POST);
// exit(0);
{
  if (isset($_POST["firstname"])&& isset($_POST["lastname"])&& isset($_POST["email"])&& isset($_POST["password"])&& isset($_POST["gender"])) {
    $first_name = $_POST['firstname'];
    $last_name = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $sql = "INSERT INTO students(first_name, last_name, email, password, gender) 
           VALUES ('$first_name','$last_name','$email','$password','$gender')";
    $result = $conn->query($sql);
    if ($result == TRUE) {
      echo "New record created successfully.";
    }else{
      echo "Error:". $sql . "<br>". $conn->error;
    }
    $conn->close();
  } else{
    echo "invalide inputs";
  }
}


?> 
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="./style/form.css">
    <link href="https://fonts.googleapis.com/css?family=Figtree:300,regular,500,600,700,800,900,300italic,italic,500italic,600italic,700italic,800italic,900italic" rel="stylesheet" />
  </head>
<body>
  <div class="wrapper">
    <div class="container form-div">
      <div class="form-wrapper">
      <h2>Registration Form</h2> 
     <form action="" method="POST">
         
         <label for="">First name</label>:<br>
         <input type="text" name="firstname">
         <br>
         <label for="">Last name:</label> <br>
         <input type="text" name="lastname">
         <br>
         <label for="">Email:</label> <br>
         <input type="email" name="email" >
         <br>
         <label for="">Password:</label> <br>
         <input type="password" name="password" >
         <br>
         <label for="">Gender:</label><br>
         <label class="radio">
         <input type="radio" name="gender" value="Male" >
         <span>Male</span>
         </label>
         <label class="radio">
         <input type="radio" name="gender" value="Female" >
         <span>Female</span>
         </label>
         <br><br>
         <input type="submit" name="submit" value="Join Our Academy">
     </form> 

      </div>
    </div>
    <div class="container">
      <img class="image" src="./assets/techgirl.jpg" alt="">
    </div>
  </div> <!-- end of wrapper -->

</body>
</html>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="./style/form.css">
    <link href="https://fonts.googleapis.com/css?family=Figtree:300,regular,500,600,700,800,900,300italic,italic,500italic,600italic,700italic,800italic,900italic" rel="stylesheet" />
  </head>
<body>
  <div class="wrapper">
    <div class="container form-div">
      <div class="form-wrapper">
      <h2>Registration Form</h2> 
     <form action="" method="POST">
         
         <label for="">First name</label>:<br>
         <input type="text" name="firstname">
         <br>
         <label for="">Last name:</label> <br>
         <input type="text" name="lastname">
         <br>
         <label for="">Email:</label> <br>
         <input type="email" name="email" >
         <br>
         <label for="">Password:</label> <br>
         <input type="password" name="password" >
         <br>
         <label for="">Gender:</label><br>
         <label class="radio">
         <input type="radio" name="gender" value="Male" >
         <span>Male</span>
         </label>
         <label class="radio">
         <input type="radio" name="gender" value="Female" >
         <span>Female</span>
         </label>
         <br><br>
         <input type="submit" name="submit" value="Join Our Academy">
     </form> 

      </div>
    </div>
    <div class="container">
      <img class="image" src="./assets/techgirl.jpg" alt="">
    </div>
  </div> <!-- end of wrapper -->

</body>
</html>