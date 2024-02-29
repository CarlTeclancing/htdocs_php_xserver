

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



            <div class="container text-left pt-4">


            <div class="row mt-4 pt-4">
                <div class="col pt-4 mt-4">
                    <h1>Send Emails to customers with ease</h1>
                    <p>with crest mailing you an send emails and recieve feedback with ease just sign up and use our srvice for free.</p>
                    <div class="container  pt-4 mt-4">
                        <button class='btn btn-primary m-3'> <a  href='./login.php' style="color:white;">Login Now</a> </button>
                        <button class='btn btn-primary m-3'> <a href='./register.php' style="color:white;">Register Now</a> </button>


                    </div>
                </div>
                <div class="col pt-4 mt-4">
                    <img width='100%' src='data:image/png;base64,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'>
                </div>
            </div>

            <div class="row pt-4 mt-4" style="height:40px;"></div>
            <div class="row pt-4 mt-4">
                <div class="card m-3" style="width: 18rem;">
                <img src="https://images.pexels.com/photos/16117986/pexels-photo-16117986.jpeg?auto=compress&cs=tinysrgb&w=1600&lazy=load" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>

                <div class="card m-3" style="width: 18rem;">
                <img src="https://images.pexels.com/photos/16117986/pexels-photo-16117986.jpeg?auto=compress&cs=tinysrgb&w=1600&lazy=load" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>

                <div class="card m-3" style="width: 18rem;">
                <img src="https://images.pexels.com/photos/16117986/pexels-photo-16117986.jpeg?auto=compress&cs=tinysrgb&w=1600&lazy=load" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>

                <div class="card m-3" style="width: 18rem;">
                <img src="https://images.pexels.com/photos/16117986/pexels-photo-16117986.jpeg?auto=compress&cs=tinysrgb&w=1600&lazy=load" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                
                </div>
            </div>

            <div class="row pt-4 mt-4" style="height:40px;"></div>

        </body>
</html>


