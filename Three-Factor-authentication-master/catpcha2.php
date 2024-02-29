<?php
// Replace YOUR_SECRET_KEY with your actual reCAPTCHA secret key
$secretKey = '6LepXXcnAAAAAJ3jKMR0er1u1aB2_P3HTzZbpi06';
$response = $_POST['g-recaptcha-response'];

// Make a POST request to the reCAPTCHA API
$verifyUrl = 'https://www.google.com/recaptcha/api/siteverify';
$data = array(
    'secret' => $secretKey,
    'response' => $response
);

$options = array(
    'http' => array(
        'header' => "Content-type: application/x-www-form-urlencoded\r\n",
        'method' => 'POST',
        'content' => http_build_query($data)
    )
);

$context = stream_context_create($options);
$apiResponse = file_get_contents($verifyUrl, false, $context);
$apiResponseData = json_decode($apiResponse);

// Check the API response
if ($apiResponseData && $apiResponseData->success) {
    // CAPTCHA verification succeeded
    // Process the rest of the form data here
    // ...
    echo "CAPTCHA verification successful!";
} else {
    // CAPTCHA verification failed
    echo "CAPTCHA verification failed. Please try again.";
}
?>



<!DOCTYPE html>
<html>
<head>
    <title>Example CAPTCHA Form</title>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
    <h2>Example CAPTCHA Form</h2>
    <form action="<?= $_SERVER['PHP_SELF']?>" method="POST">
        <!-- Your other form fields here -->
        
        <!-- reCAPTCHA widget -->
        <div class="g-recaptcha" data-sitekey="6LepXXcnAAAAAGwVLyxf4MLrjt1ZG-yMyOnrJ63B"></div>

        <button type="submit" name="submit">Submit</button>
    </form>
</body>
</html>
