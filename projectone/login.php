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


        <?php 
           if(isset($_GET['error']) && $_GET['error'] == "loginerror"): 
        ?>

        <div class="alert alert-danger">
            <?= "Login failed" ?>
        </div>

        <?php endif ?>
        
        <div class="container">
            <form method="POST" action="./helpers/login.auth.php">

                <div class="input-group pt-4">
                    <span class="input-group-text" id="addon-wrapping">@</span>
                    <input type="email" class="form-control" placeholder="Email" required name="email" aria-label="Username" aria-describedby="addon-wrapping" width="300px">
                </div>

                <div class="input-group pt-4">
                    <span class="input-group-text" id="addon-wrapping">PS</span>
                    <input type="password" class="form-control" placeholder="password" name="password" required aria-label="password" aria-describedby="addon-wrapping" width="300px">
                </div>

                
                <button class="btn btn-primary mt-4" >login</button> <br/>
                <a href="./register.php">Don't have an account Register here</a>

            </form>
        </div>
        </div>
    </body>

</html>


