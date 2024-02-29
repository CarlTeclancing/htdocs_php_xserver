<?php require (".././path.php"); ?>
<?php require(HELPERS."/redirect.php"); ?>
<?php require(ABSPATH."/includes/header.php"); ?>
<?php $page_title = "Dashboard"; ?>
<?php
    if(!isset($_SESSION['userId'])){
        redirect(BASEURL);
    }

?>

<body class="hold-transition sidebar-mini layout-fixed">
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
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">

            <?php
                $allClasses = selectGetAll('class');
                print_r(selectGetAll('class'));
                $numberOfClasses = mysqli_num_rows($allClasses);
            ?>

            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?= $numberOfClasses; ?></h3>
               
                <p>Classes</p>
              </div>
              <div class="icon">
                <i class="fas fa-school"></i>
              </div>
              <a href="<?= BASEURL?>/admin/class/all-classes.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
          <?php
                $allCourses = selectGetAll('course');
                $numberOfCourses = mysqli_num_rows($allCourses);
            ?>
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?= $numberOfCourses; ?></h3>

                <p>Courses</p>
              </div>
              <div class="icon">
                <i class="fas fa-book"></i>
              </div>
              <a href="<?= BASEURL?>/admin/course/all-courses.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">

            <?php
                $allUsers = selectGetAll('users');
                $numberOfUsers = mysqli_num_rows($allUsers);
            ?>
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?= $numberOfUsers; ?></h3>

                <p>User Accounts</p>
              </div>
              <div class="icon">
                <i class="fa fa-user-plus"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">

            <?php
                $allStudents = selectGetAll('students');
                $numberOfStudents = mysqli_num_rows($allStudents);
            ?>
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?= $numberOfStudents; ?></h3>

                <p>Students</p>
              </div>
              <div class="icon">
                <i class="fa fa-user"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">

        <div class="col-lg-3 col-6">

              <?php
                  $allTeachers = selectGetAll('teachers');
                  $numberOfTeachers = mysqli_num_rows($allTeachers);
              ?>
              <!-- small box -->
              <div class="small-box bg-secondary">
                <div class="inner">
                  <h3><?= $numberOfTeachers; ?></h3>

                  <p>Teachers</p>
                </div>
                <div class="icon">
                  <i class="fas fa-chalkboard-teacher"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
              </div>
              <!-- ./col -->
              </div>
              <section class="col-lg-6" id="myChart">
                  
              
              </section>
        
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
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