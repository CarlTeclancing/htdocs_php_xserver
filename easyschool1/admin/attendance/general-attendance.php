<?php require ("../.././path.php"); ?>
<?php require(ABSPATH."/includes/header.php"); ?>
<?php require(HELPERS."/form.php"); ?>
<?php require(HELPERS."/redirect.php");?>
<?php $page_title = "General Attendance Sheet"; ?>







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
                                <th>Name</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Attendance</th>
                                
                            </tr>

                            <?php 
                               $count = 0;
                                $studentId = $_SESSION['userId'];
                                if(isset($_GET['classId']) && isset($_GET['studentId'])){
                                  $classId = $_GET['classId'];
                                  $studentId = $_GET['studentId'];
                                }
                               
                                $query = "SELECT * FROM attendance WHERE student_id = $studentId AND class_id = $classId ORDER BY id ASC";        
                                $result = mysqli_query($connection, $query);
                                if(mysqli_num_rows($result) > 0):
                                foreach($result as $attendance):
                                  $count++;  
                            ?>

                            <tr>
                                    <td><?= $count; ?></td>
                                    <td>
                                  <?php
                                    $studentId = $attendance['student_id'];
                                    $studentQuery = "SELECT firstname,lastname FROM students WHERE id = $studentId AND class_id = $classId"; 
                                    $studentResult = mysqli_query($connection, $studentQuery);
                                      foreach($studentResult as $student):
                                  ?>
                                    <?= $student['firstname'].' '.$student['lastname']?>

                                    <?php endforeach;?>
                                    </td>
                                    <td><?= $attendance['date'];?></td>
                                    <td><?= $attendance['time']; ?></td>
                                    <?php if($attendance['attendance_status'] == 1): ?>
                                        <td>Present</td>
                                    <?php else: ?>
                                        <td>Absent</td>
                                    <?php endif; ?>
                                    
                            </tr>

                            <?php
                         
                            endforeach; 
                            else:
                            ?>
                               <td colspan="5"><div class="alert alert-danger text-center">No results</div></td>

                            <?php endif;?>

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