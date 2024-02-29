<?php require ("../.././path.php"); ?>
<?php require(ABSPATH."/includes/header.php"); ?>
<?php require(HELPERS."/redirect.php");?>
<?php $page_title = "Single Complain"; ?>


<?php 

// update view
  if(isset($_GET['action']) && $_GET['action'] == 'reply' && isset($_GET['complainId'])){
    $complainId = $_GET['complainId'];
    $query = "UPDATE complains SET view = 1 WHERE id = {$complainId}";
    $result = mysqli_query($connection, $query);

    if(!$result){
        redirect(BASEURL."/admin/user/all-users.php");
    }else{

            $query = "SELECT * FROM complains WHERE id = $complainId";
            $result = mysqli_query($connection, $query);

            foreach($result as $complains){
                $title = $complains['title'];
                $message = $complains['message'];
            }

            if(!$result){
                redirect(BASEURL."/admin/user/all-users.php");
            }
        
    }

  }


  //send reply
  if(isset($_POST['reply'])){
      $complainToReply = $_GET['complainId'];
      $message = mysqli_real_escape_string($connection, $_POST['message']);

      $query = "INSERT INTO reply (reply, complain_id) VALUES('{$message}', {$complainToReply})";
      $result = mysqli_query($connection, $query);
  
      if(!$result){
        $_SESSION['error'] = "Reply not successful";
      }else{
        $_SESSION['success'] = "Reply sent successfully";
      }
  
  }






?>



<body class="hold-transition sidebar-mini">
<div class="wrapper">

 <!-- Navbar -->
 <?php require(ABSPATH."/includes/navigation.php"); ?>
  <!-- /.navbar -->

  <!-- Sidebar -->
    <?php require(ABSPATH."/includes/sidebar.php"); ?>
  <!-- /.sidebar -->


<div class="content-wrapper">
 <!-- Content Wrapper. Contains page content -->
 <?php require(ABSPATH."/admin/content-header.php"); ?>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row d-flex justify-content-center">
        <div class="col-6">
            <div class="card">
              <div class="card-header">
                <h5 class="text-center"><?= $page_title;?> Information</h5>

                <div class="card-tools">
            
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                    <h1 class="text-center"><?= $title;?></h1>
                    <p><?= $message;?></p>

                    <form action="" method="post">
                        <div class="form-group">
                            <textarea name="message" class="form-control" id="" cols="30" rows="10" style="resize:none;"></textarea>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-success" type="submit" name="reply">
                                <i class="fas fa-reply"></i> Reply
                            </button>
                        </div>
                    </form>
              </div>
                
                
              
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <div class="modal fade" id="modal-md">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Confirm Delete</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">
                <p>Are you sure you want to delete?&hellip;</p>
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <a class="btn btn-danger text-white modal-delete-link">Delete</a>
              </div>

            </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
      <!-- /.modal -->

  <?php require(ABSPATH."/includes/copyright.php"); ?>
 
  <?php require(ABSPATH."/includes/footer.php"); ?>
  
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
};

<?php if(isset($_SESSION['success'])): ?>
        toastr.success("<?= $_SESSION['success'] ?>");
       <?php unset($_SESSION['success']); ?>
  <?php elseif(isset($_SESSION['error'])):?>
        toastr.error("<?= $_SESSION['error'] ?>");
        <?php unset($_SESSION['error']); ?>
 <?php endif; ?>


//  Modal delete script below

$(document).ready(function(){

  $(".delete_link").on('click', function(){

         let complainId= $(this).attr("rel");
         let deleteUrl = "all-users.php?action=delete&complainId="+complainId+" ";

         $(".modal-delete-link").attr("href", deleteUrl);

  });
       
               
});

  


</script>