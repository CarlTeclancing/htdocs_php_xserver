<?php require ("../.././path.php"); ?>
<?php require(ABSPATH."/includes/header.php"); ?>
<?php require(HELPERS."/redirect.php");?>
<?php $page_title = "View All Classes"; ?>


<?php 
  if(isset($_GET['action']) && $_GET['action'] == 'delete'){
    $classToDelete = $_GET['classId'];
    $query = "DELETE FROM class WHERE id = {$classToDelete};";
    $result = mysqli_query($connection, $query);

 
    if(!$result){
      $_SESSION['error'] = "Class not deleted";
    }else{
      $_SESSION['success'] = "Class was added successfully";
    }

    redirect(BASEURL."/admin/class/all-classes.php");

  }


?>



<?php
    // user role control
        $hideFromBoth;
        $hideFromStudent;
        $hideFromTeacher;
        
        if($_SESSION['roleId'] == 9 || $_SESSION['roleId'] == 10){
          $hideFromBoth = "d-none";
        }

        if($_SESSION['roleId'] == 8 || $_SESSION['roleId'] == 9){
          $hideFromAdminTeacher = 'd-none';
        }
       
        if($_SESSION['roleId'] == 10){
          $hideFromStudent = "d-none";
        }
       if($_SESSION['roleId'] == 9){
          $hideFromTeacher = "d-none";
        }

        if($_SESSION['roleId'] == 7){
          $hideFromAdmin = "d-none";
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
                 elseif($roleId == 10):
                  $queryteacher = "SELECT * FROM students WHERE id = $userId";
                  $studentResult = mysqli_query($connection, $queryteacher);
                    foreach($studentResult as $student):
                      $studentClassId = $student['class_id'];
                      $query = "SELECT * FROM class WHERE id = $studentClassId";
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
                          <h6 class="card-title">See students in this class</h6>
                          <p class="card-text">To see all the students in a class, click the <?= $class['name']; ?> button below</p>
                          <a href="<?= BASEURL?>/admin/class/all.php?action=view&classId=<?= $class['id']; ?>" class="btn btn-primary"><?= $class['name']; ?></a>

                          <a href="javascript:void(0)" id="deleteButton" rel="<?= $class['id']; ?>" data-toggle="modal" data-target="#modal-md" class="btn btn-danger delete_link <?= $hideFromBoth; ?>">Delete</a>

                          <a href="<?= BASEURL?>/admin/class/edit-class.php?action=edit&classId=<?= $class['id']; ?>" class="btn btn-success <?= $hideFromBoth; ?>">Edit</a>
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


//  Modal delete script below

$(document).ready(function(){

  $(".delete_link").on('click', function(){

         let classId = $(this).attr("rel");
         let deleteUrl = "all-classes.php?action=delete&classId="+classId+" ";

         $(".modal-delete-link").attr("href", deleteUrl);

  });
       
               
});

  


</script>