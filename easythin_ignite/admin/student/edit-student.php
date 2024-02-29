<?php require ("../.././path.php"); ?>
<?php require(ABSPATH."/includes/header.php"); ?>
<?php require(HELPERS."/form.php"); ?>
<?php $page_title = "Edit Student"; ?>


<?php

  if(isset($_POST['editstudent'])){ 

    $currentStudentId = $_GET['studentId'];
    $firstName = mysqli_real_escape_string($connection, $_POST['firstname']);
    $lastName = mysqli_real_escape_string($connection, $_POST['lastname']);
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $gender = mysqli_real_escape_string($connection, $_POST['gender']);
    $address = mysqli_real_escape_string($connection, $_POST['address']);
    $phone = mysqli_real_escape_string($connection, $_POST['phone']);
    $classId = mysqli_real_escape_string($connection, $_POST['class']);
    $roleId = 10;
   

    $query = "UPDATE students SET firstname = '{$firstName}',lastname = '{$lastName}',username = '{$username}',gender = '{$gender}',address = '{$address}',phone = '{$phone}', registeredDate = now(), role_id = {$roleId},class_id =  {$classId} WHERE id = $currentStudentId;";
    $result = mysqli_query($connection, $query);

    if(!$result){
      $_SESSION['error'] = "Student not modified";
    }else{
      $_SESSION['success'] = "Student was modified successfully";
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


 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
 <?php require(ABSPATH."/admin/content-header.php"); ?>
    <!-- /.content-header -->

                <!-- Add Teacher Form-->
                <section class="content">
                    <div class="container">
                        <div class="row  d-flex justify-content-center align-items-center">
                            <!-- left column -->
                            <div class="col-md-6">
                                <!-- Horizontal Form -->
                                <div class="card card-outline card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Edit Student</h3>
                                    </div>
                                    <!-- /.card-header -->

                                    <?php
                                        if(isset($_GET['action']) && $_GET['action'] == 'edit'):
                                            $studentId = $_GET['studentId'];           
                                            $query = "SELECT * FROM students WHERE id = $studentId;";
                                            $result = mysqli_query($connection, $query);
                                            if(mysqli_num_rows($result)> 0):
                                            foreach($result as $student):
                                    ?>

                                    <!-- form start -->
                                    <?= formOpen("post");?>
                                        <div class="card-body">
                                         
                                            <div class="form-group row" >
                                                <label for="name" class="col-sm-3 col-form-label">First Name</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" placeholder="Enter student firstname" value="<?= $student['firstname'];?>"  id="firstname" name="firstname" required>
                                                
                                                </div>
                                            </div>

                                            <div class="form-group row" >
                                                <label for="name" class="col-sm-3 col-form-label">Last Name</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" placeholder="Enter student lastname" value="<?= $student['lastname'];?>" id="lastname" name="lastname" required>
                                                
                                                </div>
                                            </div>

                                            <div class="form-group row" >
                                                <label for="name" class="col-sm-3 col-form-label">Username</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" placeholder="Enter student username" value="<?= $student['username'];?>" id="username" name="username" required>
                                                
                                                </div>
                                            </div>


                                            <div class="form-group row" >
                                                <label for="gender" class="col-sm-3 col-form-label">Gender</label>
                                                <div class="col-sm-9" id="divGender">
                                                    <select class="form-control" id="gender" name="gender" required>
                                                        <option>Select Gender</option>
                                                        <?php if($student['gender'] == "male"): ?>
                                                            <option value="<?= $student['gender'];?>" selected><?= $student['gender'];?></option>
                                                            <option value="female">female</option>
                                                        <?php elseif($student['gender'] == "female"): ?>
                                                            <option value="<?= $student['gender'];?>" selected><?= $student['gender'];?></option>
                                                            <option value="male">male</option>
                                                        <?php endif;?>
                                                    </select>
                                                
                                                </div>
                                            </div>

            

                                            <div class="form-group row" >
                                                <label for="address" class="col-sm-3 col-form-label">Address</label>
                                                <div class="col-sm-9" id="">
                                                    <input type="text" class="form-control" placeholder="Enter address" value="<?= $student['address'];?>" id="address" name="address" required>
                                                </div>
                                            </div>

                                            <div class="form-group row" >
                                                <label for="phone" class="col-sm-3 col-form-label">Phone</label>
                                                <div class="col-sm-9" id="divPhone">
                                                    <input type="text" class="form-control " placeholder="Enter phone number" value="<?= $student['phone'];?>" id="phone" name="phone" required>
                                                </div>
                                            </div>


                                            
                                            <div class="form-group row" >
                                                <label for="class" class="col-sm-3 col-form-label">Select a Class</label>
                                                <div class="col-sm-9" id="">
                                                    <select class="form-control" id="class" name="class" required>
                                                        <option>Select Class</option>
                                                        <?php
                                                            $allClasses = selectGetAll('class');
                                                            if(mysqli_num_rows($allClasses) > 0):
                                                            foreach($allClasses as $class):
                                                                if($student['class_id'] == $class['id']):
                                                        ?>
                                                                <option value="<?= $class['id']; ?>" selected><?= $class['name']; ?></option>
                                                         <?php
                                                            else:
                                                         ?>
                                                                <option value="<?= $class['id']; ?>"><?= $class['name']; ?></option>
                                                        <?php
                                                            endif;
                                                            endforeach; 
                                                            endif;
                                                        ?>
                                                    </select>
                                                
                                                </div>
                                            </div>


                                

                       
                                            <!-- <div class="form-group row" >
                                                <label for="image" class="col-sm-2 col-form-label">Photo</label>
                                                <div class="col-sm-10" id="divImage">
                                                    <img  id="profile_pic" style="width: 120px; height: 120px; margin-bottom:5px;"/>
                                                    <input type="file" class="form-control-file" id="image" name="image">
                                                
                                                </div>
                                            
                                            </div> -->
                                            
                                        </div>
                                        <!-- /.card-body -->
                                        <div class="card-footer">
                        
                                           <input type="submit" value="Update Student" name="editstudent" class="btn btn-primary"/>
                                            
                                        </div>
                                        <!-- /.card-footer -->
                                   <?= formClose(); ?>

                                   <?php 
                                        endforeach;
                                        endif;
                                        endif;
                                    ?>
                                </div>
                                <!-- /.card -->

                            </div>
                        </div>
                    </div>
                </section>

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
           