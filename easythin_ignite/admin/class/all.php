<?php require ("../.././path.php"); ?>
<?php require(ABSPATH."/includes/header.php"); ?>
<?php require(HELPERS."/redirect.php");?>
<?php $page_title = "View All Students"; ?>


<?php 
  if(isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['studentId'])){
    $studentToDelete = $_GET['studentId'];
    $query = "DELETE FROM students WHERE id = {$studentToDelete}";
    $result = mysqli_query($connection, $query);

  

    if(!$result){
      $_SESSION['error'] = "Student not deleted";

    }else{
      $_SESSION['success'] = "Student was deleted successfully";
    }

    redirect(BASEURL."/admin/teacher/all-teachers.php");
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
        <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><?= $page_title;?> Information</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
            
                <table class="table table-bordered text-nowrap">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Class</th>
                      <th>Registered Date</th>
                      
                      <th>Address</th>
                      <th>Phone</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>

                   <?php
                      $count = 0;
                      if(isset($_GET['classId'])):
                        $currentClassId = $_GET['classId'];
                        $query = "SELECT * FROM students WHERE class_id = {$currentClassId};";
                        $result = mysqli_query($connection, $query);
                            if(mysqli_num_rows($result)>0):
                            foreach($result as $student):
                                $count++;
                    ?>

                    <tr>
                      <td><?= $count; ?></td>
                      <td><?= $student['firstname'].' '.$student['lastname'];?></td>

                     
                      <td><span class="tag tag-success">
                        <?php

                         $classId = $student['class_id'];
                          $query = "SELECT * FROM class WHERE id = $classId";
                          $result = mysqli_query($connection, $query);
                          foreach($result as $class):
                        ?>
                        <?= $class['name']; ?>
                        <?php endforeach; ?>
                      </span></td>
                      <td><?= $student['registeredDate']; ?></td>
                    
                      <td><?= $student['address']; ?></td>

                      <td><?= $student['phone']; ?></td>

                      <td>
                        <a href="<?= BASEURL?>/admin/student/edit-student.php?action=edit&studentId=<?=  $student['id']; ?>" class="btn btn-success <?=  $hideFromBoth; ?>">Edit</a>
                        <a href="javascript:void(0)" id="deleteButton" rel="<?= $student['id']; ?>" data-toggle="modal" data-target="#modal-md" class="btn btn-danger delete_link  <?=  $hideFromBoth; ?>">Delete</a>
                      </td>

                    </tr>

                    <?php 
                        endforeach;
                        else:
                     ?>
                      <tr>
                          <td colspan="8"><div class="alert alert-danger text-center">No results (Create a student)</div></td>
                     </tr>
                    
                     <?php 
                        endif;
                        else:
                      ?>
                       <tr>
                          <td colspan="8"><div class="alert alert-danger text-center">No results for this class</div></td>
                     </tr>
                     <?php endif; ?>
            
                  </tbody>
                </table>
              
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

         let studentId = $(this).attr("rel");
         let deleteUrl = "all-students.php?action=delete&studentId="+studentId+" ";

         $(".modal-delete-link").attr("href", deleteUrl);

  });
       
               
});

  


</script>