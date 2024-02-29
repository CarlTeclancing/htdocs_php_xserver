<?php require ("../.././path.php"); ?>
<?php require(ABSPATH."/includes/header.php"); ?>
<?php require(HELPERS."/form.php"); ?>
<?php $page_title = "Edit Class"; ?>


<?php

  if(isset($_POST['updateclass'])){ 
    $className = mysqli_real_escape_string($connection, $_POST['class']);
    $classId = $_GET['classId'];

    $query = "UPDATE class SET name = '{$className}' WHERE id = $classId;";
    $result = mysqli_query($connection, $query);
    
    if(!$result){
      $_SESSION['error'] = "Class not Modified";
    }else{
      $_SESSION['success'] = "Class was Modified successfully";
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
                <h5 class="m-0">Modify Class</h5>
              </div>
              <div class="card-body">
                <h6 class="card-title pt-2 pb-2">Type a class name</h6>

               <?php
                if(isset($_GET['action']) && $_GET['action'] == 'edit'):
                    $classId = $_GET['classId'];
                    $query = "SELECT * FROM class WHERE id = $classId;";
                    $result = mysqli_query($connection, $query);
                    if(mysqli_num_rows($result)> 0):
                    foreach($result as $class):
               ?>

                <?= formOpen("post"); ?>
                  <div class="form-group">
                    <input type="text" name="class" class="form-control" id="" placeholder="Class Name" value="<?= $class['name']; ?>" required>
                  </div>
                  <div class="form-group">
                    <input type="submit" value="Update" name="updateclass" class="btn btn-primary">
                  </div>
               
                <?= formClose(); ?>

                <?php 
                
                  endforeach; 
                  endif;
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