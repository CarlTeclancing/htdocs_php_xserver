<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    //SEND TO EMAIL VARIABLES

    $toEmail = $email;
    $subject = "Sending email";
    $message;
    if(mail($toEmail, $subject, $message)){
        echo "Emails succesfully sent";
    } else{
        echo "sorry faild to send your email! try again letter";
    }
}
?>