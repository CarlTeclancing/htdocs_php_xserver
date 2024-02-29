<?php require "includes/header.php" ?>



<main class="container-fluid bg-primary" style="height:100vh;">



    <div class="container d-flex justify-content-center flex-column p-4">


         <?php require ROOT_PATH."/includes/navigation.php"; ?>


        <div class="container bg-light p-3 mt-3 text-center shadow-sm" style="border-radius: 50px;">
            <h2>
                Welcome to Document Finder
            </h2>
            <p>Find your lost document or post a found document</p>
        </div>



        <div class="container mt-4" style="margin-bottom:5px!important;">

            <div id="quickslide" class="carousel slide" data-ride="carousel">

                <!-- Indicators -->
                <ul class="carousel-indicators">
                    <li data-target="#quickslide" data-slide-to="0" class="active"></li>
                    <li data-target="#quickslide" data-slide-to="1"></li>
                </ul>

                <!-- The slideshow -->
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="<?= BASE_URL?>/assets/images/slide1.jpg" alt="Lost but found">
                    </div>
                    <div class="carousel-item">
                        <img src="<?= BASE_URL?>/assets/images/slide2.jpg" alt="Lost but found">
                    </div>
    
                </div>

                <!-- Left and right controls -->
                <a class="carousel-control-prev" href="#quickslide" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#quickslide" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>

            </div>

        </div>



        <div class="container row mt-4 m-0 p-0">

            <div class="col-md-4 col-sm-12 bg-light shadow-lg d-flex justify-content-center align-items-center flex-column" style="height: 200px;">
                <p>Click here to search a document</p>

                <a href="search.php" class="btn btn-primary btn-lg rounded-0">Search Document</a>
            </div>

            <div class="col-md-4 col-sm-12 bg-light shadow-lg  d-flex justify-content-center align-items-center flex-column" style="height: 200px;">
                <p>Click here to submit a missing document</p>
                <a href="login.php" class="btn btn-warning text-dark btn-lg rounded-0">Submit Missing Document</a>

            </div>

            <div class="col-md-4 col-sm-12 bg-light shadow-lg  d-flex justify-content-center align-items-center flex-column" style="height: 200px;">
                <p>Click here to submit a found document</p>
                <a href="login.php" class="btn btn-danger btn-lg rounded-0">Submit Found Document</a>

            </div>

        </div>
    </div>











</main>






























<?php require "includes/footer.php" ?>