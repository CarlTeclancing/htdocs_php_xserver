<?php $xml = simplexml_load_file("role.xml") or die("Error: Cannot create object");?>
<?php require("../.././path.php"); ?>
<?php require(ABSPATH . "/includes/header.php"); ?>
<?php require(HELPERS . "/form.php"); ?>
<?php $page_title = "Add a User Account"; ?>



<?php

if (isset($_POST['adduser'])) {

    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);
    $roleId = mysqli_real_escape_string($connection, $_POST['role']);
    $statusId = mysqli_real_escape_string($connection, $_POST['status']);

    $userId = mysqli_real_escape_string($connection, $_POST['user']);

    $uniqueId = md5(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ123456780" . time()));


    $query = "INSERT INTO users (email,password,uniqueId,status_id,role_id) VALUES('{$email}', '{$password}', '{$uniqueId}', {$statusId}, {$roleId})";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        $_SESSION['error'] = "User Account not added";
    } else {

        if ($roleId == 8) { // admin
            $query = "UPDATE admin SET uniqueId = '{$uniqueId}' WHERE id = $userId";
        } elseif ($roleId == 9) {
            $query = "UPDATE teachers SET uniqueId = '{$uniqueId}' WHERE id = $userId";
        } elseif ($roleId == 10) {
            $query = "UPDATE students SET uniqueId = '{$uniqueId}' WHERE id = $userId";
        } elseif($roleId == 11){
            $query = "UPDATE supervisor SET uniqueId = '{$uniqueId}' WHERE id = $userId";
        }
        else{
            $_SESSION['error'] = "User Account not added";
        }

        $result = mysqli_query($connection, $query);

        if (!$result) {
            $_SESSION['error'] = "User Account not added";
        } else {

            $_SESSION['success'] = "User account was added successfully";
        }
    }
}

?>


<?php

if (!empty($_POST['roleId'])) {
    $ajaxRoleId = $_POST['roleId'];

    if ($ajaxRoleId == 8) { // admin
        $query = "SELECT * FROM admin";
    } elseif ($ajaxRoleId == 9) {
        $query = "SELECT * FROM teachers";
    } elseif ($ajaxRoleId == 10) {
        $query = "SELECT * FROM students";
    } elseif ($ajaxRoleId == 11){
        $query = "SELECT * FROM supervisor";
    }else{
        $query = false;
    }

    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) > 0) {
        echo '<option value="">Select a user</option>';
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<option value="' . $row['id'] . '">' . $row['firstname'] . ' ' . $row['lastname'] . '</option>';
        }
    } else {
        echo '<option value="">No user available </option>';
    }
}

?>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <?php require(ABSPATH . "/includes/navigation.php"); ?>
        <!-- /.navbar -->

        <!-- Sidebar -->
        <?php require(ABSPATH . "/includes/sidebar.php"); ?>
        <!-- /.sidebar -->


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <?php require(ABSPATH . "/admin/content-header.php"); ?>
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
                                    <h3 class="card-title">Add User Account</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <?= formOpen("post"); ?>
                                <div class="card-body">


                                    <div class="form-group row">
                                        <label for="name" class="col-sm-3 col-form-label">Email</label>
                                        <div class="col-sm-9">
                                            <input type="email" class="form-control" placeholder="Enter user email" id="email" name="email" required>

                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label for="name" class="col-sm-3 col-form-label">Password</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control" placeholder="Enter user password" id="password" name="password" required>

                                        </div>
                                    </div>



                                    <!-- <div class="form-group row" >
                                                <label for="gender" class="col-sm-3 col-form-label">User Role</label>
                                                <div class="col-sm-9" id="divGender">
                                                    <select class="form-control" id="role" name="role" required>
                                                        <option>Select User Role</option>
                                                        <option value="8">Admin</option>
                                                        <option value="9">Teacher</option>
                                                        <option value="10">Student</option>
                                                        <option value="11">Supervisor</option>
                                                    </select>
                                                </div>
                                            </div> -->


                                    <div class="form-group row">
                                        <label for="gender" class="col-sm-3 col-form-label">User Role</label>
                                        <div class="col-sm-9" id="divGender">
                                            <select class="form-control" id="role" name="role" required>
                                                <option>Select User Role</option>
                                                <?php
                                                    foreach($xml->children() as $user) {
                                                        echo "<option value='$user->roleid'>$user->name</option>";
                                                    } 

                                                ?>

                                            </select>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label for="gender" class="col-sm-3 col-form-label">Select User</label>
                                        <div class="col-sm-9" id="divGender">
                                            <select class="form-control" id="user" name="user" required>

                                            </select>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label for="gender" class="col-sm-3 col-form-label">Account Status</label>
                                        <div class="col-sm-9" id="divGender">
                                            <select class="form-control" id="status" name="status" required>
                                                <option>Select Account Status</option>
                                                <option value="5">Active</option>
                                                <option value="6">Inactive</option>

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

                                    <input type="submit" value="Add User" name="adduser" class="btn btn-primary" />

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

        <?php require(ABSPATH . "/includes/copyright.php"); ?>

        <?php require(ABSPATH . "/includes/footer.php"); ?>

        <script>
            $(document).ready(function() {
                $("#role").on("change", function() {
                    let roleId = $(this).val();
                    if (roleId) {

                        $.ajax({
                            type: "POST",
                            url: "add-user.php",
                            data: "roleId=" + roleId,
                            success: function(html) {
                                $("#user").html(html);
                            }
                        });

                    } else {
                        $("#user").html("<option value=''>Select a user</option>");
                    }
                });
            });

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

            <?php if (isset($_SESSION['success'])) : ?>
                toastr.success("<?= $_SESSION['success'] ?>");
                <?php unset($_SESSION['success']); ?>
            <?php elseif (isset($_SESSION['error'])) : ?>
                toastr.error("<?= $_SESSION['error'] ?>");
                <?php unset($_SESSION['error']); ?>
            <?php endif; ?>
        </script>