<?php require ("../.././path.php"); ?>
<?php require(ABSPATH."/includes/header.php"); ?>
<?php require(HELPERS."/form.php"); ?>
<?php $page_title = "Settings"; ?>


<?php

if($_SESSION['userId'] == 9 && $_SESSION['userId'] == 10){
  redirect(BASEURL);
}

  if(isset($_POST['updatesystem'])){ 

    $name = mysqli_real_escape_string($connection, $_POST['name']);
    $copyright = mysqli_real_escape_string($connection, $_POST['copyright']);
    $version = mysqli_real_escape_string($connection, $_POST['version']);
    $author = mysqli_real_escape_string($connection, $_POST['author']);
    $authorUrl = mysqli_real_escape_string($connection, $_POST['authorUrl']);

    $query = "UPDATE system 
              SET name = '$name', 
              copyright = '$copyright', 
              version = '$version', 
              author = '$author', 
              authorurl = '$authorUrl' 
              WHERE id = 4";
    $result = mysqli_query($connection, $query);

    if(!$result){
      $_SESSION['error'] = "System not modified";
    }else{
      $_SESSION['success'] = "System was modified successfully";
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
      <div class="container-fluid">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6">         
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="m-0">Modify System Settings</h5>
              </div>

              <?php
                  $query = "SELECT * FROM system";
                  $result = mysqli_query($connection, $query);
                  if(mysqli_num_rows($result) > 0):
                  foreach($result as $system):
              ?>
              <div class="card-body">
                <h6 class="card-title pt-2 pb-2">Name</h6>

                <?= formOpen("post"); ?>
                  <div class="form-group">
                    <input type="text" name="name" class="form-control" id="" placeholder="Software Name" value="<?= $system['name'];?>" required>
                  </div>

                  <div class="form-group">
                    <label for="">Copyright</label>
                    <input type="text" name="copyright" class="form-control" id="" placeholder="Copyright Year" value="<?= $system['copyright'];?>" required>
                  </div>

                  <div class="form-group">
                    <label for="">Version</label>
                    <input type="text" name="version" class="form-control" id="" placeholder="Software Version" value="<?= $system['version'];?>" required>
                  </div>

                  <div class="form-group">
                    <label for="">Author</label>
                    <input type="text" name="author" class="form-control" id="" placeholder="Software Author" value="<?= $system['author'];?>" required>
                  </div>

                  <div class="form-group">
                    <label for="">Author Url</label>
                    <input type="url" name="authorUrl" class="form-control" id="" placeholder="https://example.com" value="<?= $system['authorurl'];?>" required>
                  </div>
                  
                  <div class="form-group">
                    <input type="submit" value="Update System" name="updatesystem" class="btn btn-primary">
                  </div>
               
                <?= formClose(); ?>

                <?php
                    endforeach;
                  endif;
                ?>
                
                </div>
              </div>
            </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

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
  


</script>