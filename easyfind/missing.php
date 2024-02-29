<?php require "includes/header.php" ?>

<main class="container-fluid bg-primary p-5 flex-column"  style="height: 100%;">

<div class="container d-flex justify-content-center flex-column p-4">
        <?php require ROOT_PATH."/includes/navigation.php"; ?>

    </div>

    <div class="container bg-light w-100 d-flex justify-content-around align-items-center shadow-lg rounded-lg" style="padding: 50px;">
        <form action="createMiss.php" method="post" enctype="multipart/form-data">
            <div class="card shadow-lg m-auto submit-card">
                <div class="card-header">
                    <h2 class="text-center mb-0" style="font-size: 20px">Submit a Missing document</h2>
                </div>
                <div class="card-body">
                        <div class="card-header bg-danger  mb-3">
                            <h6 class="text-center text-white mb-0">Document Information</h6>
                        </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-file"></i></span>
                        </div>
                        <input type="text" class="form-control" name="type" placeholder="Type of Document">
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control text-capitalize" placeholder="Full Names" name="fullName">
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-location"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Where did you loose the document?" name="location">
                    </div>


                    <div class="form-group">
                        <div class="text-center">
                            <label for="formFileLg" class="form-label">Upload Document Image  <span style="font-size: 15px;">Accepted file type ( jpeg, jpg, png )</span> </label>
                           
                            <input class="form-control form-control-lg missing" id="formFileLg" type="file" name="image" accept="image/png, image/jpg, image/jpeg">
                        </div>
                    </div>

                    <div class="card-header bg-danger mb-3">
                            <h6 class="text-center text-white  mb-0">Your Contact Information</h6>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">+237</span>
                        </div>
                        <input type="text" class="form-control" minlength="9" maxlength="9" placeholder="Your phone number" name="phone">
                    </div>


                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                        </div>
                        <input type="email" class="form-control" placeholder="Your Email Address" name="email">
                    </div>


                </div>
                <div class="card-footer">
                    <div class="form-group">
                        <input type="submit" value="Submit Document" class="btn btn-danger btn-block rounded-0" name="submitDocument">
                    </div>
                </div>
            </div>
        </form>

       
    </div>

</main>



  


<?php require "includes/footer.php" ?>

<script>

    toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
    }

    // toastr.success("This is a test message");

    <?php if(isset($_SESSION['success'])): ?>
        toastr.success("<?= $_SESSION['success'] ?>");
        <?php unset($_SESSION['success']); ?>
        <?php session_unset(); ?>
  <?php elseif(isset($_SESSION['error'])):?>
        toastr.error("<?= $_SESSION['error'] ?>");
        <?php unset($_SESSION['error']); ?>
        <?php session_unset(); ?>
 <?php endif; ?>

</script>