<?php

require(dirname(__DIR__, 2). '/database/connection.php');

$sql = ("SELECT * FROM users");
$result = $conn->query($sql);

// if ($result->num_rows > 0) {
//     //looping through the data
//     // while($row = $result->fetch_assoc()) {
//     //     //hello
//     //     if($_SERVER['REQUEST_METHOD'] == 'POST'){

//     //         $email = $row['email'];
//     //         $message = $_POST['message'];
        
//     //         //SEND TO EMAIL VARIABLES
        
//     //         $toEmail = $row['email'];
//     //         $subject = "Sending email";
//     //         $message;
//     //         if(mail($toEmail, $subject, $message)){
//     //             echo "Emails succesfully sent";
//     //         } else{
//     //             echo "sorry faild to send your email! try again letter";
//     //         }
//     //     }
//     // }
// }
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
                    <span class="input-group-text" id="addon-wrapping">@</span>
                    <?php if($result->num_rows > 0): ?>
                        


                    <input type="email" name="email" 
               
                    value="<?php foreach($result as $user): echo $user['email'] . ',';  endforeach ?>" 
                
                    class="form-control" placeholder="email" name="email" required aria-label="Email" aria-describedby="addon-wrapping" width="300px">

                    <?php endif ?>

                </div>

                <div class="input-group pt-4">
                    <span class="input-group-text" id="addon-wrapping">MSG</span>
                    <textarea name="message"nwidth='300px'></textarea>
                </div>

                
                <button class="btn btn-primary mt-4" >Send Email</button>

            </form>


</body>
</html>

