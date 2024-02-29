<?php 
    session_start();
    if(!isset($_SESSION['id']) || empty($_SESSION['id'])){
        header('Location: ../login.php');
        exit(0);
    }
?>
<html>
    <head>
        <title>exercise one in php</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>


    </head>

    <body>
        <?= $_SESSION['id'];?>
        <div class='container'>
            <nav class="navbar bg-light">
                <div class="container-fluid">
                <a class="navbar-brand">CODEwithCREST</a>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>

                    </form>
                    <form action="../helpers/logout.php" method="POST">
                        <button class="btn btn-danger" type="submit">Logout</button>
                    </form>
                    <form action="./view.php" method="POST">
                        <button class="btn btn-danger" type="submit">View Users</button>
                    </form>
                    
                </div>
            </nav>
        
        <div class="container-fluid">
        <?php 
           if(isset($_GET['succes']) && $_GET['succes'] == "loginsucces"): 
        ?>

        <div class="alert alert-success">
            <?= "Login succesful" . " " . $_SESSION['username'] ?>
        </div>

        <?php endif ?>
            <form method="POST" action="submit.php">
                <div class="input-group pt-4">
                    <span class="input-group-text" id="addon-wrapping">FN</span>
                    <input type="text" class="form-control" placeholder="First name" required name="fname" aria-label="Username" aria-describedby="addon-wrapping" width="300px">
                </div>

                <div class="input-group pt-4">
                    <span class="input-group-text" id="addon-wrapping">LN</span>
                    <input type="text" class="form-control" placeholder="Last name" required name="lname" aria-label="Username" aria-describedby="addon-wrapping" width="300px">
                </div>



                <div class="input-group pt-4">
                    <span class="input-group-text" id="addon-wrapping">@</span>
                    <input type="email" class="form-control" placeholder="email" name="email" required aria-label="Email" aria-describedby="addon-wrapping" width="300px">
                </div>

                
                <button class="btn btn-primary mt-4" >submit</button>

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


