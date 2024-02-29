<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">

</head>
<body>
    <form action="./handlers/submit.php" method="POST">
        <h1>Contact Form</h1>
        <div class="el">
            <label for="name">Name</label>
            <input type="text" name="name">
        </div>

        <div class="el">
            <label for="Email">Email</label>
            <input type="email" name="email">
        </div>

        <div class="el">
            <label for="message">message</label>
            <input type="text" name="message">
        </div>
        <input type="submit" value="Submit Data" id="btn">
    </form>
</body>
</html>