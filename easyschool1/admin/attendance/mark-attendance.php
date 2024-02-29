<?php require ("../.././path.php"); ?>
<?php require(ABSPATH."/includes/header.php"); ?>
<?php require(HELPERS."/form.php"); ?>
<?php require(HELPERS."/redirect.php");?>
<?php $page_title = "Mark Attendance"; ?>


<?php

  if(isset($_POST['submitattendance'])){ 
    
    if(isset($_SESSION['roleId']) && $_SESSION['roleId'] = 10){
      
    $studentId = $_SESSION['userId'];
    $roleId = $_SESSION["roleId"];
    $checkAttendance = mysqli_real_escape_string($connection, $_POST['attendance']);
    $checkDate =  date('Y-m-d');
    
    if(isset($checkAttendance)){

        if($checkDate > 28800){
            $attendance = 0;
        }else{
            $attendance = 1;
        }
        

        $query = "SELECT class_id FROM students WHERE id = $studentId";
        $result = mysqli_query($connection, $query);

        if(mysqli_num_rows($result) > 0){
            foreach($result as $student){
                $studentClassId = $student['class_id'];
                $query = "INSERT INTO attendance (attendance_status, date, student_id, class_id, marked, time) VALUES({$attendance}, now(), {$studentId}, {$studentClassId}, 1, now())";
                  
                $result = mysqli_query($connection, $query);

                if(!$result){
                    $_SESSION['error'] = "Attendance not set";
                  }else{
                    redirect(BASEURL."/admin/attendance/mark-attendance.php");
                    $_SESSION['success'] = "Attendance for today was set successfully";
                   
                  }
            }
           
        
       
    } 


    }

    }
  }

?>

<style>

   /* The switch - the box around the slider */
.switch {
  position: relative;
  display: inline-block;
  width: 100%;
  height: 50px;
}

/* Hide default HTML checkbox */
.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: red;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 45px;
  width: 48.5%;
  left: 4px;
  bottom: 3px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(100%);
  -ms-transform: translateX(100%);
  transform: translateX(100%);
}

.attendance_title p{
    padding: 13px 0;
    font-size: 20px;
    font-weight: 700;
    text-transform: uppercase;
    text-align: center;
}


</style>

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
                <h5 class="m-0 text-center">Mark Today's Attendance  -  <?= date("D j M Y"); ?></h5>
              </div>

              <form action="" method="post">
                    <div class="card-body row">
                    <div class="col-md-3 attendance_title">
                        <p class="text-center">Absent</p>
                    </div>

                 
                    <div class="col-md-6">
                        <!-- Rectangular switch -->
                        <label class="switch shadow">
                            <!-- check if true -->
                        <?php 
                            $studentId = $_SESSION['userId'];
                            $query = "SELECT * FROM attendance WHERE attendance_status = 1 AND student_id = $studentId AND marked = 1";
                            $result = mysqli_query($connection, $query);
                            if(mysqli_num_rows($result) > 0):
                              foreach($result as $attendance):
                                if(($attendance['date'] == date('Y-m-d')) && ($attendance['date'] < 86400) && ($attendance['attendance_status'] == 1)):
                        ?>

                            <input type="checkbox" id="attendance" name="attendance" checked>   
                        <?php else: ?>
                            <input type="checkbox" id="attendance" name="attendance">   
                        <?php endif;?>
                        <?php endforeach;?>
                        <?php endif;?>
                             
                            <span class="slider"></span>
                         </label>
                    </div>

                        <div class="col-md-3 text-center attendance_title">
                            <p class="text-center">Present</p>
                        </div>

                    </div>

                    <div class="card-body">
                        <?php 
                            $studentId = $_SESSION['userId'];
                            // $today = date('Y-m-d H:i:s');
                            $today = date('Y-m-d');
                            $query = "SELECT * FROM attendance WHERE date = '$today' AND student_id = $studentId AND marked = 1";
                            $result = mysqli_query($connection, $query);
                            if(mysqli_num_rows($result) > 0 && $today < 86400):
                        ?>
                        <button disabled="disabled" class="btn btn-primary btn-block">Already Marked Attendance</button>

                        <?php elseif(mysqli_num_rows($result) > 0 && $today > 86400): ?>
                            <button type="submit" name="submitattendance" class="btn btn-primary btn-block"> Save Attendance</button>
                        
                        <?php else: ?>
                            <button type="submit" name="submitattendance" class="btn btn-primary btn-block"> Save Attendance</button>
                           
                        <?php endif;?>
                    </div> 

                    </form>

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