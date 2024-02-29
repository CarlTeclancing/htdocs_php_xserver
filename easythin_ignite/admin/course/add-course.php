<?php require ("../.././path.php"); ?>
<?php require(ABSPATH."/includes/header.php"); ?>
<?php require(HELPERS."/form.php"); ?>
<?php $page_title = "Add a Course"; ?>


<?php

  if(isset($_POST['addcourse'])){ 
    $courseName = mysqli_real_escape_string($connection, $_POST['course']);
    $classId = mysqli_real_escape_string($connection, $_POST['class']);
    $description = mysqli_real_escape_string($connection, $_POST['description']);

    $query = "INSERT INTO course (name, class_id, description) VALUES('{$courseName}', {$classId}, '{$description}')";
    $result = mysqli_query($connection, $query);

    if(!$result){
      $_SESSION['error'] = "Course not added";
    }else{
      $_SESSION['success'] = "Course was added successfully";
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
                <h5 class="m-0">Create New Course</h5>
              </div>
              <div class="card-body">
                <h6 class="card-title pt-2 pb-2">Type a course name</h6>

                <?= formOpen("post"); ?>
                  <div class="form-group">
                    <input type="text" name="course" class="form-control" id="" placeholder="Course Name" required>
                  </div>
                  <div class="form-group">
                    <label for="">Select a Class</label>
                    <select name="class" id="" class="form-control" required>
                      <option value="">Select a Class</option>
                      <?php
                          $allClasses = selectGetAll('class');
                          foreach($allClasses as $class):
                      ?>
                        <option value="<?= $class['id']; ?>"><?= $class['name']; ?></option>
                      <?php endforeach; ?>
                      
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="">Course Description</label>
                    <textarea maxlength="100" class="form-control" name="description" style="resize: none;"></textarea>
                  </div>
                  <div class="form-group">
                    <input type="submit" value="Create Course" name="addcourse" class="btn btn-primary">
                  </div>
               
                <?= formClose(); ?>
                
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