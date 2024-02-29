<?php 

if(count($_POST) > 0){
    if(empty($_POST['name'])){
        echo "<h4/>please enter your name</h4>";
    }
    if(empty($_POST['others'])){
        echo "<h4/>please enter others</h4>";
    }
    if(empty($_POST['g-recaptcha-response'])){
        echo "<h4/>please salve reCAPTCHA</h4>";
    }
    if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])){

        $secret = "6Lc0QncnAAAAAMO2Xf4XDMB-SduIMe5ORhe6Q-UY";

        $response = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='. $secret.'&response='.$_POST['g-recaptcha-response']);

        $data=json_decode($response);

        if($data->success){
            echo "<h2>data sent</h2>";
        }else{
            echo "please try again";
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>reCAPTCHA</title>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
    <h1>google recaptch Verification 2</h1>
    <form action="<?= $_SERVER['PHP_SELF']?>" method="POST">
        <input type="text" name="" id="" placeholder="name">
        <input type="text" name="" id="" placeholder="others">
        <div class="g-recaptcha" data-sitekey="6Lc0QncnAAAAAAB3qe1dCtbBYfmPiY4tt-0Fa3Bw"></div>
        <input type="submit" name="submit" value="submit">
    </form>
</body>
</html>