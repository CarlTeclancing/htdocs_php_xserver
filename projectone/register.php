<html>
    <head>
        <title>exercise one in php</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>


    </head>

    <body>
    <?php  
        require('./global/header.php');

    ?>
        
        <div class="container-fluid">
            <form method="POST" action="./helpers/registration.auth.php">
                <div class="input-group pt-4">
                    <span class="input-group-text" id="addon-wrapping">FN</span>
                    <input type="text" class="form-control" placeholder="Fist name" required name="fname" aria-label="name" aria-describedby="addon-wrapping" width="300px">
                </div>

                <div class="input-group pt-4">
                    <span class="input-group-text" id="addon-wrapping">LN</span>
                    <input type="text" class="form-control" placeholder="Full name" required name="lname" aria-label="name" aria-describedby="addon-wrapping" width="300px">
                </div>

                <div class="input-group pt-4">
                    <span class="input-group-text" id="addon-wrapping">UN</span>
                    <input type="text" class="form-control" placeholder="Username" required name="username" aria-label="Username" aria-describedby="addon-wrapping" width="300px">
                </div>



                <div class="input-group pt-4">
                    <span class="input-group-text" id="addon-wrapping">@</span>
                    <input type="email" class="form-control" placeholder="email" name="email" required aria-label="Email" aria-describedby="addon-wrapping" width="300px">
                </div>

                <div class="input-group pt-4">
                    <span class="input-group-text" id="addon-wrapping">PS</span>
                    <input type="password" class="form-control" placeholder="password" name="password" required aria-label="password" aria-describedby="addon-wrapping" width="300px">
                </div>

                
                <button class="btn btn-primary mt-4" >Register</button> <br/>
                <a href="./login.php">Already have an account login here</a>

            </form>
        </div>
        </div>
    </body>
</html>

<html>
    <head>
    <title>exercise one in php</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    </head>
</html>


