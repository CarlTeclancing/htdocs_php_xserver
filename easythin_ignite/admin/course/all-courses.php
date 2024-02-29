<?php require ("../.././path.php"); ?>
<?php require(ABSPATH."/includes/header.php"); ?>
<?php require(HELPERS."/redirect.php");?>
<?php $page_title = "View All Courses"; ?>


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
                $allClasses = selectGetAll('class');
                if(mysqli_num_rows($allClasses) > 0):
                foreach($allClasses as $class):
            ?>
              <div class="col-lg-3 col-md-3 col-sm-12">
                  <div class="card card-primary card-outline">
                        <div class="card-header">
                          <h5 class="m-0">All Courses in <?= $class['name']; ?></h5>
                        </div>
                        <div class="card-body">
                          <h6 class="card-title">See all courses</h6>
                          <p class="card-text">To see all the courses of a particular class, click the button below</p>
                          <a href="<?= BASEURL?>/admin/course/all.php?action=view&classId=<?= $class['id']; ?>" class="btn btn-primary"><?= $class['name']; ?> Courses</a>
                          
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
            <?php endif; ?>
        
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