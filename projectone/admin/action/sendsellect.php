<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $message = $_POST['message'];
    $emails = $_POST['email'];
    $emailArray = explode(',', $emails);

    foreach($emailArray as $emails){
        //SEND TO EMAIL VARIABLES
        
            $toEmail = $emails;
            $subject = "Sending email";
            if(mail($toEmail, $subject, $message)){
                echo "Emails succesfully sent";
            } else{
                echo "sorry faild to send your email! try again letter";
            }
    }
}