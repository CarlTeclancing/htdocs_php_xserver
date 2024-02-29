<?php require ("../.././path.php"); ?>
<?php require(ABSPATH."/includes/header.php"); ?>
<?php require(HELPERS."/form.php"); ?>
<?php $page_title = "Add Student"; ?>


<?php

  if(isset($_POST['addstudent'])){ 

    $firstName = mysqli_real_escape_string($connection, $_POST['firstname']);
    $lastName = mysqli_real_escape_string($connection, $_POST['lastname']);
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $gender = mysqli_real_escape_string($connection, $_POST['gender']);
    $address = mysqli_real_escape_string($connection, $_POST['address']);
    $phone = mysqli_real_escape_string($connection, $_POST['phone']);
    $classId = mysqli_real_escape_string($connection, $_POST['class']);
    $roleId = 10;
   

    $query = "INSERT INTO students (firstname,lastname,username,gender,address,phone,registeredDate, role_id ,class_id) VALUES('{$firstName}', '{$lastName}', '{$username}', '{$gender}', '{$address}', '{$phone}', now(), {$roleId},  {$classId});";
    $result = mysqli_query($connection, $query);

    if(!$result){
      $_SESSION['error'] = "Student not added";
    }else{
      $_SESSION['success'] = "Student was added successfully";
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
                                        <h3 class="card-title">Add Student</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <?= formOpen("post");?>
                                        <div class="card-body">
                                         
                                            <div class="form-group row" >
                                                <label for="name" class="col-sm-3 col-form-label">First Name</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" placeholder="Enter student firstname" id="firstname" name="firstname" required>
                                                
                                                </div>
                                            </div>

                                            <div class="form-group row" >
                                                <label for="name" class="col-sm-3 col-form-label">Last Name</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" placeholder="Enter student lastname" id="lastname" name="lastname" required>
                                                
                                                </div>
                                            </div>

                                            <div class="form-group row" >
                                                <label for="name" class="col-sm-3 col-form-label">Username</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" placeholder="Enter student username" id="username" name="username" required>
                                                
                                                </div>
                                            </div>


                                            <div class="form-group row" >
                                                <label for="gender" class="col-sm-3 col-form-label">Gender</label>
                                                <div class="col-sm-9" id="divGender">
                                                    <select class="form-control" id="gender" name="gender" required>
                                                        <option>Select Gender</option>
                                                        <option value="male">Male</option>
                                                        <option value="female">Female</option>
                                                    </select>
                                                
                                                </div>
                                            </div>

            

                                            <div class="form-group row" >
                                                <label for="address" class="col-sm-3 col-form-label">Address</label>
                                                <div class="col-sm-9" id="">
                                                    <input type="text" class="form-control" placeholder="Enter address" id="address" name="address" required>
                                                </div>
                                            </div>

                                            <div class="form-group row" >
                                                <label for="phone" class="col-sm-3 col-form-label">Phone</label>
                                                <div class="col-sm-9" id="divPhone">
                                                    <input type="text" class="form-control " placeholder="Enter phone number" id="phone" name="phone" required>
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
                                                        ?>
                                                        <option value="<?= $class['id']; ?>"><?= $class['name']; ?></option>
                                                        <?php
                                                            endforeach; 
                                                            else:
                                                        ?>
                                                     <option> Class Not Available</option>

                                                     <?php endif; ?>
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
                        
                                           <input type="submit" value="Add Student" name="addstudent" class="btn btn-primary"/>
                                            
                                        </div>
                                        <!-- /.card-footer -->
                                   <?= formClose(); ?>
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
           