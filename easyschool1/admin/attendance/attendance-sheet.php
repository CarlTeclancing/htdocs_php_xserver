<?php require ("../.././path.php"); ?>
<?php require(ABSPATH."/includes/header.php"); ?>
<?php require(HELPERS."/form.php"); ?>
<?php require(HELPERS."/redirect.php");?>
<?php $page_title = "Attendance Sheet"; ?>


<?php

  if(isset($_POST['addclass'])){ 
    $className = mysqli_real_escape_string($connection, $_POST['class']);

    $query = "INSERT INTO class (name) VALUES('{$className}')";
    $result = mysqli_query($connection, $query);

    if(!$result){
      $_SESSION['error'] = "Class not added";
    }else{
      $_SESSION['success'] = "Class was added successfully";
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
            <div class="col-md-9">         
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="m-0 text-center">Attendance Sheet </h5>
              </div>
                    <div class="card-body">
                        <table class="table table-bordered text-nowrap">
                            <tr>
                                <th>#</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Attendance</th>
                                
                            </tr>

                            <?php 
                               $count = 0;
                                $studentId = $_SESSION['userId'];
                                $query = "SELECT * FROM attendance WHERE student_id = $studentId";        
                                $result = mysqli_query($connection, $query);
                                foreach($result as $attendance):
                                    $count++;
                            ?>

                            <tr>
                                    <td><?= $count; ?></td>
                                    <td><?= $attendance['date'];?></td>
                                    <td><?= $attendance['time']; ?></td>
                                    <?php if($attendance['attendance_status'] == 1): ?>
                                        <td>Present</td>
                                    <?php else: ?>
                                        <td>Absent</td>
                                    <?php endif; ?>
                                    
                            </tr>

                            <?php endforeach; ?>

                        </table>

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