<?php require ("../.././path.php"); ?>
<?php require(ABSPATH."/includes/header.php"); ?>
<?php require(HELPERS."/form.php"); ?>
<?php $page_title = "Mark Attendance"; ?>

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
        <div class="row">
        
            <?php

                if(isset($_SESSION['roleId'])):
                 $roleId =  $_SESSION['roleId'];
                 $userId = $_SESSION['userId'];

                 if($roleId == 8):
                  $query = "SELECT * FROM class;";
                 elseif($roleId == 9):
                  $queryteacher = "SELECT * FROM teachers WHERE id = $userId";
                  $teacherResult = mysqli_query($connection, $queryteacher);
                    foreach($teacherResult as $teacher):
                      $teacherClassId = $teacher['class_id'];
                      $query = "SELECT * FROM class WHERE id = $teacherClassId";
                    endforeach;
                  else:
                    $query = "SELECT * FROM class;";
                  endif;

                  $result = mysqli_query($connection, $query);
      
                if(mysqli_num_rows($result) > 0):
                foreach($result as $class):
            ?>
              <div class="col-lg-3 col-md-3 col-sm-12">
                  <div class="card card-primary card-outline">
                        <div class="card-header">
                          <h5 class="m-0"><?= $class['name']; ?></h5>
                        </div>
                        <div class="card-body">
                          <h6 class="card-title">Select a class you want to mark the attendance</h6>
                          <p class="card-text">Click <?= $class['name']; ?> button below</p>
                          <a href="<?= BASEURL?>/admin/attendance/mark-class.php?action=view&classId=<?= $class['id']; ?>" class="btn btn-primary"><?= $class['name']; ?></a>
                        </div>
                  </div>

              </div>
            <?php 
              endforeach; 
              else: 
            ?>

            <div class="container">
                <div class="alert alert-danger text-center">No results (Create a Class)</div>
            </div>
            <?php 
                endif;
                endif;
             ?>
        
          <!-- /.col-md-6 -->
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
  


</script>