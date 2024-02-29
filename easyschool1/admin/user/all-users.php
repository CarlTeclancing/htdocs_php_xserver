<?php require ("../.././path.php"); ?>
<?php require(ABSPATH."/includes/header.php"); ?>
<?php require(HELPERS."/redirect.php");?>
<?php $page_title = "View All Teachers"; ?>


<?php 
  if(isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['userId'])){
    $userToDelete = $_GET['userId'];
    $query = "DELETE FROM users WHERE id = {$userToDelete}";
    $result = mysqli_query($connection, $query);

  

    if(!$result){
      $_SESSION['error'] = "User not deleted";

    }else{
      $_SESSION['success'] = "User was deleted successfully";
    }

    redirect(BASEURL."/admin/user/all-users.php");
  }



  if(isset($_GET['action']) && $_GET['action'] == 'deactivate' && isset($_GET['userId'])){
    $userToDeactivate = $_GET['userId'];
    $query = "UPDATE users SET status_id = 6 WHERE id = {$userToDeactivate}";
    $result = mysqli_query($connection, $query);

  

    if(!$result){
      $_SESSION['error'] = "User not deactivated";

    }else{
      $_SESSION['success'] = "User was deactivated successfully";
    }

    redirect(BASEURL."/admin/user/all-users.php");
  }



  if(isset($_GET['action']) && $_GET['action'] == 'activate' && isset($_GET['userId'])){
    $userToDeactivate = $_GET['userId'];
    $query = "UPDATE users SET status_id = 5 WHERE id = {$userToDeactivate}";
    $result = mysqli_query($connection, $query);

  

    if(!$result){
      $_SESSION['error'] = "User not activated";

    }else{
      $_SESSION['success'] = "User was activated successfully";
    }

    redirect(BASEURL."/admin/user/all-users.php");
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
        <div class="row">
        <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><?= $page_title;?> Information</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
            
                <table class="table table-bordered text-nowrap">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Email</th>
                      <th>Password</th>
                      <th>Role</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>

                   <?php
                      $count = 0;
                      $allUsers = selectGetAll('users');
                      if(mysqli_num_rows($allUsers)>0):
                      foreach($allUsers as $user):
                        $count++;
                    ?>

                    <tr>
                      <td><?= $count; ?></td>
                      <td><?= $user['email']?></td>
                      <td><?= $user['password']?></td>
                      <td> <!--  check user role and print text -->
                        <?php if($user['role_id'] == 8): ?>
                          Admin
                        <?php elseif($user['role_id'] == 9): ?>
                          Teacher
                        <?php elseif($user['role_id'] == 10): ?>
                          Student
                        <?php else: ?>
                          No user role
                        <?php endif; ?>
                      </td>
                      <td> <!-- check status and print text-->
                      <?php if($user['status_id'] == 5): ?>
                        <span class="alert alert-success">Active</span>
                      <?php elseif($user['status_id'] == 6): ?> 
                        <span class="alert alert-danger">Inactive</span>
                        <?php else: ?>
                          No status
                        <?php endif; ?>
                      </td>
  
                      <td>
                        <a href="<?= BASEURL?>/admin/user/edit-user.php?action=edit&userId=<?=  $user['id']; ?>" class="btn btn-success">Edit</a>
                        <a href="javascript:void(0)" id="deleteButton" rel="<?= $user['id']; ?>" data-toggle="modal" data-target="#modal-md" class="btn btn-danger delete_link">Delete</a>
                       
                         <?php if($user['status_id'] == 5): ?>
                          <a href="<?= BASEURL?>/admin/user/all-users.php?action=deactivate&userId=<?=  $user['id']; ?>" class="btn btn-warning">Deactivate</a>
                          <?php else: ?> 
                            <a href="<?= BASEURL?>/admin/user/all-users.php?action=activate&userId=<?=  $user['id']; ?>" class="btn btn-primary">Activate</a>
                          <?php endif; ?>
                    
                      </td>

                    </tr>

                    <?php 
                        endforeach;
                        else:
                     ?>
                      <tr>
                          <td colspan="8"><div class="alert alert-danger text-center">No results (Create a user)</div></td>
                     </tr>
                    
                     <?php endif; ?>
            
                  </tbody>
                </table>
              
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <div class="modal fade" id="modal-md">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Confirm Delete</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">
                <p>Are you sure you want to delete?&hellip;</p>
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <a class="btn btn-danger text-white modal-delete-link">Delete</a>
              </div>

            </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
      <!-- /.modal -->

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

         let userId= $(this).attr("rel");
         let deleteUrl = "all-users.php?action=delete&userId="+userId+" ";

         $(".modal-delete-link").attr("href", deleteUrl);

  });
       
               
});

  


</script>