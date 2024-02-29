<?php require ("../.././path.php"); ?>
<?php require(ABSPATH."/includes/header.php"); ?>
<?php require(HELPERS."/redirect.php");?>
<?php $page_title = "See All reply"; ?>


<?php 








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
                      <th>Sender</th>
                      <th>Title</th>
                      <th>Message</th>
                      <th>Reply</th>
                      <th>Date</th>
                    
                    </tr>
                  </thead>
                  <tbody>

                   <?php
                        if(isset($_SESSION['userId'])):
                          $recieverId = $_SESSION['userId'];
                            $query = "SELECT * FROM reply WHERE reciever_id = $recieverId";
                            $result = mysqli_query($connection, $query);
                                if(mysqli_num_rows($result)>0):
                                foreach($result as $reply):
                                  $count = 0;
                                  $complainIdReply  = $reply['complain_id'];
                                
                                  $query = "SELECT * FROM complains WHERE id = $complainIdReply";
                                  $result = mysqli_query($connection, $query);
                               
                                  if(mysqli_num_rows($result)>0):
                                  foreach($result as $complains):
                                  $count++;
                    ?>

                    <tr>
                      <td><?= $count; ?></td>
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
                      <td class="text-wrap"><?= $complains['message']?></td>
                      <td><?= $reply['reply']?></td>
                      <td><?= date('F j, Y h:m:s', strtotime($reply['datetime'])); ?></td>
                      

                    </tr>

                    <?php 
                        endforeach;
                        endif;
                        endforeach;
                        else:
                     ?>
                      <tr>
                          <td colspan="8"><div class="alert alert-danger text-center">No results</div></td>
                     </tr>
                    
                     <?php endif; ?>
                     <?php else: ?>
                      
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
         let deleteUrl = "all-users.php?action=delete&complainId="+complainId+" ";

         $(".modal-delete-link").attr("href", deleteUrl);

  });
       
               
});

  


</script>