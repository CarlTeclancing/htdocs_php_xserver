<?php require "includes/header.php" ?>


<main class="container-fluid bg-primary p-5 d-flex flex-column justify-content-center align-items-center" style="height: 100vh;">

    <div class="container d-flex justify-content-center flex-column p-4">
        <?php require ROOT_PATH."/includes/navigation.php"; ?>

    </div>

    <div class="container bg-light w-100 d-flex justify-content-around align-items-center shadow-lg rounded-lg" style="padding: 80px;">


        <form action="archive.php" method="get" enctype="multipart/form-data">
            <div class="card shadow-lg">
                <div class="card-header">
                    <h2 class="text-center mb-0" style="font-size: 20px">Search for a document</h2>
                </div>
                <div class="card-body">


                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control" name="fullname" placeholder="Full Names">
                    </div>

                   

                </div>
                <div class="card-footer">
                    <div class="form-group">
                    <input type="submit" value="Search Document" class="btn btn-danger btn-block rounded-0">
                    </div>
                </div>
            </div>
        </form>

    </div>


</main>




<?php require "includes/footer.php" ?>