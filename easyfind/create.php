<?php
require "path.php";
require ROOT_PATH."/controllers/Document.php";
session_start();


use controllers\Document;

if(isset($_POST['submitDocument'])){

    $documentType = $_POST['type'];
    $documentFullName = $_POST['fullName'];
    $documentLocation = $_POST['location'];
    $phoneNumber = $_POST['phone'];
    $emailAddress = $_POST['email'];



    $image = $_FILES['image'];

    $imageName = $_FILES['image']['name'];
    $imageTmpName = $_FILES['image']['tmp_name'];
    $imageSize = $_FILES['image']['size'];
    $imageError = $_FILES['image']['error'];
    $imageType = $_FILES['image']['type'];

    $imageExt = explode('.',$imageName);

    $imageActualExt = strtolower(end($imageExt));
    $allowed = ["jpg","jpeg","png"];

    $imageNameNew = "image-".time().mt_rand(10,623).".".$imageActualExt;
    $imageDestination =  'uploads/'.$imageNameNew;


    // verify if anything is empty

    

    if(!empty($documentType) && !empty($documentFullName) && !empty($documentLocation) && !empty($phoneNumber) && !empty($emailAddress) && !empty($imageDestination)){


        if(in_array($imageActualExt, $allowed)){


            move_uploaded_file($imageTmpName, $imageDestination);
            $document = new Document();
            $createDocument = $document->createDocument($documentType, $documentFullName, $documentLocation, $imageDestination, $phoneNumber, $emailAddress);
    
            if($createDocument == false){
                $_SESSION['error'] = "Document Not Submitted successfully";
                header("Location:".BASE_URL."/submit.php");  
               
               
            }
            $_SESSION['success'] = "Document Submitted successfully";
            header("Location:".BASE_URL."/submit.php");
           
          

        }else{
            $_SESSION['error'] = "Wrong image format detected";
            header("Location:".BASE_URL."/submit.php");
           
           
        }

    }else{
        $_SESSION['error'] = "Document Not Submitted successfully";
        header("Location:".BASE_URL."/submit.php");  

    }


}



