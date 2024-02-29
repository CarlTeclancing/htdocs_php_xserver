<?php require ("../.././path.php"); ?>
<?php require(ABSPATH."/includes/header.php"); ?>
<?php require(HELPERS."/form.php"); ?>
<?php $page_title = "Edit Course"; ?>


<?php

  if(isset($_POST['updatecourse'])){ 
    $courseId = $_GET['courseId'];
    $courseName = mysqli_real_escape_string($connection, $_POST['course']);
    $classId = mysqli_real_escape_string($connection, $_POST['class']);
    $description = mysqli_real_escape_string($connection, $_POST['description']);

    $query = "UPDATE course SET name = '{$courseName}', class_id =  {$classId}, description = '{$description}' WHERE id = $courseId;";
    $result = mysqli_query($connection, $query);

    if(!$result){
      $_SESSION['error'] = "Course not modified";
    }else{
      $_SESSION['success'] = "Course was modified successfully";
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
                <h5 class="m-0">Edit Course</h5>
              </div>
              <div class="card-body">
                <h6 class="card-title pt-2 pb-2">Type a course name</h6>

                <?php
                if(isset($_GET['action']) && $_GET['action'] == 'edit'):
                    $courseId = $_GET['courseId'];
                    $currentClassId = $_GET['classId'];
                    $query = "SELECT * FROM course WHERE id = $courseId;";
                    $result = mysqli_query($connection, $query);
                    if(mysqli_num_rows($result)> 0):
                    foreach($result as $course):
               ?>

                <?= formOpen("post"); ?>
                  <div class="form-group">
                    <input type="text" name="course" class="form-control" id="" placeholder="Course Name" value="<?= $course['name']; ?>" required>
                  </div>
                  <div class="form-group">
                    <label for="">Select a Class</label>
                    <select name="class" id="" class="form-control" required>
                        <option value="">Select a Class</option>
                      <?php
                          $allClasses = selectGetAll('class');
                          foreach($allClasses as $class):
                            if($class['id'] == $currentClassId):
                      ?>
                        <option value="<?= $class['id']; ?>" selected><?= $class['name']; ?></option>
                        <?php else: ?>
                            <option value="<?= $class['id']; ?>"><?= $class['name']; ?></option>
                        <?php 
                            endif;
                            endforeach; 
                        ?>
                      
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="">Course Description</label>
                    <textarea maxlength="100" class="form-control" name="description" style="resize: none;"><?= $course['description']; ?></textarea>
                  </div>
                  <div class="form-group">
                    <input type="submit" value="Update Course" name="updatecourse" class="btn btn-primary">
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