<?php require ("../.././path.php"); ?>
<?php require(ABSPATH."/includes/header.php"); ?>
<?php require(HELPERS."/form.php"); ?>
<?php $page_title = "Send a Complain"; ?>


<?php


if(!empty($_POST['class_id'])){
  $ajaxClassId = $_POST['class_id'];
  $query = "SELECT * FROM teachers WHERE class_id = $ajaxClassId AND uniqueId IS NOT NULL";
  $result = mysqli_query($connection, $query);

  if(mysqli_num_rows($result) > 0){
      echo '<option value="">Select A Teacher</option>';
      while($row = mysqli_fetch_assoc($result)){
          echo '<option value="'.$row['id'].'">'.$row['firstname'].' '.$row['lastname'].'</option>';
      }
  }else{
      echo '<option value="">No Teacher available </option>';
  }
}

  if(isset($_POST['sendComplain'])){ 
    $title = mysqli_real_escape_string($connection, $_POST['title']);
    $message = mysqli_real_escape_string($connection, $_POST['message']);
    $studentId = $_SESSION["userId"];
    $roleId = $_SESSION["roleId"];
    $receiverId = mysqli_real_escape_string($connection, $_POST['receiver']);


    $query = "INSERT INTO complains (title, message, sender_id, role_id, teacher_id, sendDate) 
              VALUES('{$title}', '{$message}',{$studentId} , {$roleId} , {$receiverId}, now())";
    $result = mysqli_query($connection, $query);

    if(!$result){
      $_SESSION['error'] = "Complain not sent";
    }else{
      $_SESSION['success'] = "Complain was sent successfully";
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
            <div class="col-md-6">         
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="m-0">Send a Complain</h5>
              </div>
              <div class="card-body">
              
                <?php if(isset($_SESSION['roleId']) && $_SESSION['roleId'] == 10): ?>
                  <h6 class="card-title pt-2 pb-2">Complain Title</h6>

                <?= formOpen("post"); ?>
                  <div class="form-group">
                    <input type="text" name="title" class="form-control" id="" placeholder="Title" required>
                  </div>
                  

                  <div class="form-group">
                    <label for="">Select Class</label>
                    <select name="class" id="class" class="form-control" required>

                    <option value="">Select</option>
                      <?php
                           $currentStudentClass = $_SESSION["classId"];
                            $query = "SELECT * FROM class WHERE id = $currentStudentClass;";
                            $result = mysqli_query($connection, $query);
                              if(mysqli_num_rows($result) > 0):
                                foreach($result as $class):
                      ?>

                      <option value="<?= $class['id']; ?>"><?= $class['name'] ?></option>

                      <?php endforeach; ?>
                      <?php endif; ?>
                        
                    </select>

                  </div>

                  <div class="form-group">
                    <label for="">Select a teacher</label>
                    <select name="receiver" id="teacher" class="form-control" required>
                    
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="">Message</label>
                    <textarea maxlength="255" class="form-control" name="message" style="resize: none;"></textarea>
                  </div>
                  <div class="form-group">
                     <button type="submit" class="btn btn-primary" name="sendComplain"><i class="fa fa-paper-plane"></i> Send your Complain</button>
                   
                  </div>
               
                          <?= formClose(); ?>

                          <?php elseif(isset($_SESSION['roleId']) && $_SESSION['roleId'] == 9): ?>

                            <?= formOpen("post"); ?>
                            <div class="form-group">
                              <input type="text" name="title" class="form-control" id="" placeholder="Title" required>
                            </div>
                        

                            <div class="form-group">
                              <label for="">Select Admin</label>
                              <select name="receiver" id="receiver" class="form-control" required>
                                  <?php 
                                      $allAdmin = selectGetAll('admin');
                                        foreach($allAdmin as $admin):
                                   ?>
                                   <option value="<?= $admin['id']; ?>"><?= $admin['firstname'].' '.$admin['lastname']; ?></option>
                                   <?php endforeach; ?>
                              </select>
                            </div>

                            <div class="form-group">
                              <label for="">Message</label>
                              <textarea maxlength="255" class="form-control" name="message" style="resize: none;"></textarea>
                            </div>
                            <div class="form-group">
                              <button type="submit" class="btn btn-primary" name="sendComplain"><i class="fa fa-paper-plane"></i> Send your Complain</button>
                            
                            </div>
                        
                          <?= formClose(); ?>


                          <?php elseif(isset($_SESSION['roleId']) && $_SESSION['roleId'] == 8 || $_SESSION['roleId'] == 11): ?>

                              <h6 class="card-title pt-2 pb-2">Complain Title</h6>

                                  <?= formOpen("post"); ?>
                                    <div class="form-group">
                                      <input type="text" name="title" class="form-control" id="" placeholder="Title" required>
                                    </div>
                                    

                                    <div class="form-group">
                                      <label for="">Select Class</label>
                                      <select name="class" id="class" class="form-control" required>

                                      <option value="">Select</option>
                                        <?php
              
                                              $query = "SELECT * FROM class";
                                              $result = mysqli_query($connection, $query);
                                                if(mysqli_num_rows($result) > 0):
                                                  foreach($result as $class):
                                        ?>

                                        <option value="<?= $class['id']; ?>"><?= $class['name'] ?></option>

                                        <?php endforeach; ?>
                                        <?php endif; ?>
                                          
                                      </select>

                                    </div>

                                    <div class="form-group">
                                      <label for="">Select a teacher</label>
                                      <select name="receiver" id="teacher" class="form-control" required>
                                      
                                      </select>
                                    </div>

                                    <div class="form-group">
                                      <label for="">Message</label>
                                      <textarea maxlength="255" class="form-control" name="message" style="resize: none;"></textarea>
                                    </div>
                                    <div class="form-group">
                                      <button type="submit" class="btn btn-primary" name="sendComplain"><i class="fa fa-paper-plane"></i> Send your Complain</button>
                                    
                                    </div>
                                
                                <?= formClose(); ?>
                  
                
                <?php endif; ?>
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

$(document).ready(function(){
    $("#class").on("change", function(){
        let classId = $(this).val();
        if(classId){

            $.ajax({
                    type :"POST",
                    url:"send-complain.php",
                    data: "class_id="+classId,
                    success: function(html){
                        $("#teacher").html(html); 
                    }
            });

        }else{
            $("#teacher").html("<option value=''>Select a class first</option>"); 
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

  <?php if(isset($_SESSION['success'])): ?>
        toastr.success("<?= $_SESSION['success'] ?>");
       <?php unset($_SESSION['success']); ?>
  <?php elseif(isset($_SESSION['error'])):?>
        toastr.error("<?= $_SESSION['error'] ?>");
        <?php unset($_SESSION['error']); ?>
 <?php endif; ?>
  


</script>