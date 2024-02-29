<?php require ("../.././path.php"); ?>
<?php require(ABSPATH."/includes/header.php"); ?>
<?php require(HELPERS."/redirect.php");?>
<?php $page_title = "Mark Attendance"; ?>


<?php 
 
 if(isset($_POST['saveAttendance'])){

  if(isset($_POST['markAllArray'])){

   if(isset($_POST['markDate'])){
      $date = $_POST['markDate'];
    $classId = $_GET['classId'];
    $isPresent = 1;
    foreach($_POST['markAllArray'] as $studentId){
      $query = "SELECT * FROM attendance WHERE date = '$date' AND student_id = $studentId";
      $result = mysqli_query($connection, $query);

      if(mysqli_num_rows($result)>0){
        $_SESSION['error'] = "Attendance already marked for that day";

      }elseif(mysqli_num_rows($result)==0){
          $query = "INSERT INTO attendance(date, student_id, class_id, ispresent)
          VALUES('{$date}', {$studentId}, {$classId}, {$isPresent});";
          $insertResult = mysqli_query($connection, $query);
          if(!$insertResult){
            $_SESSION['error'] = "Attendance not marked";
          }else{
            $_SESSION['success'] = "Attendance marked successfully";
          }
        } 
      }
  }
   
  }elseif(!isset($_POST['markAllArray'])){
    $date = $_POST['markDate'];
    $classId = $_GET['classId'];
    $isPresent = 0;

    $studentQuery = "SELECT * FROM students WHERE class_id = $classId";
    $studentResult = mysqli_query($connection, $studentQuery);
    foreach($studentResult as $student){
      $studentId = $student['id'];

      //verify if attendance already exist
      $query = "SELECT * FROM attendance WHERE date = '$date' AND student_id = $studentId";
      $result = mysqli_query($connection, $query);

      if(mysqli_num_rows($result)>0){
        $_SESSION['error'] = "Attendance already marked for that day";
      }elseif(mysqli_num_rows($result)==0){
          $query = "INSERT INTO attendance(date, student_id, class_id, ispresent)
          VALUES('{$date}', {$studentId}, {$classId}, {$isPresent});";
          $insertResult = mysqli_query($connection, $query);
          if(!$insertResult){
            $_SESSION['error'] = "Attendance not marked";
          }else{
            $_SESSION['success'] = "Attendance marked successfully";
          }
    }
    }

   

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
<form method="post" action="">
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
        <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><?= $page_title;?> Information</h3>

                <div class="card-tools row">
                  <div class="col-md-5">
                    <label for="markDate">Select Date</label>
                  </div>
                  <div class="col-md-7">
                      <input type="date" class="form-control w-100" name="markDate" id="markDate" required/>
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
                      <th class="text-center">
                        Student Attendance 
                        <div class="form-group d-inline">
                            <input type="checkbox" title="Mark All Students" name="markAll" id="markAll" class="form-control"/></th>  
                        </div>
                        
                    </tr>
                  </thead>
                  <tbody>

                   <?php
                      $count = 0;
                      if(isset($_GET['classId'])):
                        $currentClassId = $_GET['classId'];
                        $query = "SELECT * FROM students WHERE class_id = $currentClassId";
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
                      <div class="row">

                          <div class="col-md-6 m-auto">
                            <!-- Rectangular switch -->
                            <label class="switch shadow">
                              <!-- check if true -->

                              <input type="checkbox" id="attendanceState" class="checkBoxes" name="markAllArray[]" onclick="myAttendance()" value="<?= $student['id'];?>">
                              <span class="slider"></span>
                            </label>
                          </div>

                        </div>

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
                        endif;
                      ?>
            
                  </tbody>
                </table>

                <div class="card-body p-2">
                    <input type="submit" class="btn btn-lg btn-primary btn-block" value="Save Attendance" name="saveAttendance">
                </div>
              
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->

      </form>
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


//  Modal delete script below

$(document).ready(function(){

  $(".delete_link").on('click', function(){

         let studentId = $(this).attr("rel");
         let deleteUrl = "all-students.php?action=delete&studentId="+studentId+" ";

         $(".modal-delete-link").attr("href", deleteUrl);

  });
       
               
});



// Select all other checkboxes when main checkbox is active

$('#markAll').click(function(){

if(this.checked) {

    $('.checkBoxes').each(function(){

        this.checked = true;

    });

} else {


    $('.checkBoxes').each(function(){

        this.checked = false;

    });


}

});


  


</script>

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

  input:checked+.slider {
    background-color: #2196F3;
  }

  input:focus+.slider {
    box-shadow: 0 0 1px #2196F3;
  }

  input:checked+.slider:before {
    -webkit-transform: translateX(90%);
    -ms-transform: translateX(90%);
    transform: translateX(90%);
  }

  .attendance_title p {
    padding: 13px 0;
    font-size: 20px;
    font-weight: 700;
    text-transform: uppercase;
    text-align: center;
  }

</style>