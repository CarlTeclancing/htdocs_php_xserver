<?php require ("../.././path.php"); ?>
<?php require(ABSPATH."/includes/header.php"); ?>
<?php require(HELPERS."/redirect.php");?>
<?php $page_title = "View All Complains"; ?>


<?php 

  if(isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['complainId'])){
    $complainToDelete = $_GET['complainId'];
    $query = "DELETE FROM complains WHERE id = {$complainToDelete}";
    $result = mysqli_query($connection, $query);

  

    if(!$result){
      $_SESSION['error'] = "Complain not deleted";

    }else{
      $_SESSION['success'] = "Complain was deleted successfully";
    }

    redirect(BASEURL."/admin/complain/all-complains.php");
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


<?php
    // user role control
        $hideFromBoth;
        $hideFromStudent;
        $hideFromTeacher;
        
        if($_SESSION['roleId'] == 9 || $_SESSION['roleId'] == 10){
          $hideFromBoth = "d-none";
        }

        if($_SESSION['roleId'] == 8 || $_SESSION['roleId'] == 9){
          $hideFromAdminTeacher = 'd-none';
        }
       
        if($_SESSION['roleId'] == 10){
          $hideFromStudent = "d-none";
        }
       if($_SESSION['roleId'] == 9){
          $hideFromTeacher = "d-none";
        }

        if($_SESSION['roleId'] == 7){
          $hideFromAdmin = "d-none";
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
            
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Sender</th>
                      <th>Title</th>
                      <th class="text-wrap">Message</th>
                      <th>Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>

                   <?php
                      $currentUserRole = $_SESSION['roleId'];
                        $count = 0;
                        $currentTeacherId = $_SESSION['userId'];
                        $query = "SELECT * FROM complains WHERE teacher_id = $currentTeacherId";
                        $result = mysqli_query($connection, $query);
                        if(mysqli_num_rows($result)>0):
                        foreach($result as $complains):
                          $count++;
                    ?>

                    <tr>
                      <td><?= $count; ?></td>
                      
                          <?php
                              $senderId = $complains['sender_id'];
                              if($complains['role_id'] == 8):
                                $query = "SELECT * FROM admin WHERE id = $senderId";
                              elseif($complains['role_id'] == 9):
                                $query = "SELECT * FROM teachers WHERE id = $senderId";
                              elseif($complains['role_id'] == 10):
                                $query = "SELECT * FROM students WHERE id = $senderId";
                              elseif($complains['role_id'] == 11):
                                  $query = "SELECT * FROM supervisor WHERE id = $senderId";
                              endif;
                              
                                $result = mysqli_query($connection, $query);
                                foreach($result as $user):
                                  if(mysqli_num_rows($result)):
                          ?>

                          <td><?= $user['firstname']." ".$user['lastname']?></td>
                          <?php 
                            endif;
                            endforeach;
                          ?>
                      <?php if($complains['role_id'] == 8): ?>
                        <td>Admin</td>
                        <?php elseif($complains['role_id'] == 9): ?> 
                          <td>Teacher</td> 
                          <?php elseif($complains['role_id'] == 10): ?> 
                            <td>Student</td>
                            <?php else: ?> 
                              <td>Undefined User</td>
                      <?php 
                        endif; 
                      ?>
                      <td><?= $complains['title']?></td>
                      <td class="text-wrap" style="width:400px;"><?= $complains['message']?></td>
                      <td class="nowrap"><?= $complains['sendDate']?></td>
                      
                      <td class="text-nowrap">
                        <a href="javascript:void(0)" id="deleteButton" rel="<?= $complains['id']; ?>" data-toggle="modal" data-target="#modal-md" class="btn btn-danger delete_link <?= $hideFromBoth;?>" class="btn btn-danger">Delete</a>
                        <a href="<?= BASEURL?>/admin/complain/view-complain.php?action=view&complainId=<?= $complains['id']; ?>" class="btn btn-primary">View</a>
                        <!-- <a href="<?= BASEURL?>/admin/complain/reply-complain.php?action=reply&complainId=<?= $complains['id']; ?>" class="btn btn-success"> <i class="fas fa-reply"></i> Reply</a> -->
                        <!-- <a href="<?= BASEURL?>/admin/complain/see-reply.php?action=reply&complainId=<?= $complains['id']; ?>" class="btn btn-warning"> <i class="fas fa-eye"></i> See Reply</a> -->
                      </td>

                
                    </tr>

                    <?php 
                        endforeach;
                        else:
                     ?>
                      <tr>
                          <td colspan="8"><div class="alert alert-danger text-center">No results</div></td>
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

         let complainId= $(this).attr("rel");
         let deleteUrl = "all-complains.php?action=delete&complainId="+complainId+" ";

         $(".modal-delete-link").attr("href", deleteUrl);

  });
       
               
});

  


</script>