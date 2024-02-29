<?php require ("../.././path.php"); ?>
<?php require(ABSPATH."/includes/header.php"); ?>
<?php require(HELPERS."/redirect.php");?>
<?php $page_title = "View All Courses"; ?>

<?php 
  if(isset($_GET['action']) && $_GET['action'] == 'delete'){
    $classId = $_GET['classId'];
    $courseToDelete = $_GET['courseId'];

    $query = "DELETE FROM course WHERE id = {$courseToDelete} and class_id = {$classId};";
    $result = mysqli_query($connection, $query);

    redirect(BASEURL."/admin/course/all-courses.php");

    if(!$result){
      $_SESSION['error'] = "Course not deleted";
      redirect(BASEURL."/admin/course/all-courses.php");
    }else{
      $_SESSION['success'] = "Course was deleted successfully";
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
        <div class="row">
        
            <?php // verify the query
            if(isset($_GET['action']) && $_GET['action'] == 'view'):
                $classId = $_GET['classId'];
                $query = "SELECT * FROM course WHERE class_id = $classId;";
                $result = mysqli_query($connection, $query);
                if(mysqli_num_rows($result)> 0):
                foreach($result as $course):
            ?>
              <div class="col-lg-3 col-md-3 col-sm-12">
                  <div class="card card-primary card-outline">
                        <div class="card-header">
                          <h5 class="m-0"><?= $course['name']; ?></h5>
                        </div>
                        <div class="card-body">
                            <?php // verify the class for the course
                                 $query = "SELECT name FROM class WHERE id = $classId;";
                                 $result = mysqli_query($connection, $query);
                                 foreach($result as $class):
                            ?>
                          <h6 class="card-title">Class: <?= $class['name']; ?></h6>
                                  <?php  // verify the teacher for the course
                                    $courseId = $course['id'];
                                    $query = "SELECT * FROM teachers WHERE course_id =  $courseId and class_id = $classId;";
                                    $result = mysqli_query($connection, $query);
                                    if(mysqli_num_rows($result) > 0):
                                      foreach($result as $teachers):
                                  ?>
                                 <p class="card-text mt-2">Teacher: <?= $teachers['firstname']; ?> <?= $teachers['lastname']; ?></p>
                                  <?php
                                    endforeach;
                                    endif;
                                  ?>
                          <?php endforeach; ?>
            

                        
                          <p class="card-text mt-2"><?= $course['description']; ?></p>
                          <a href="javascript:void(0)" id="deleteButton" courseId="<?= $course['id']; ?>" classId="<?= $classId; ?>" data-toggle="modal" data-target="#modal-md" class="btn btn-danger delete_link">Delete</a>

                          <a href="<?= BASEURL?>/admin/course/edit-course.php?action=edit&classId=<?= $classId; ?>&courseId=<?= $course['id'] ?>" class="btn btn-success">Edit</a>
                        </div>
                  </div>

              </div>
            <?php 
                endforeach; 
                else:
            ?>
                <div class="container d-flex justify-content-center">
                    <div class="alert alert-danger w-100 text-center">No results found</div>  
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

       let classId = $(this).attr("classId");
       let courseId = $(this).attr("courseId");
       let deleteUrl = "all.php?action=delete&classId="+classId+"&courseId="+courseId+" ";

       $(".modal-delete-link").attr("href", deleteUrl);

});
     
             
});

  


</script>