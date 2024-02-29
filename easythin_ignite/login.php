<?php require("path.php"); ?>
<?php require(ABSPATH."/includes/header.php"); ?>
<?php require(HELPERS."/form.php"); ?>
<?php require(HELPERS."/dbselect.php"); ?>

<body class="hold-transition login-page bg-dark">
<div class="login-box">
  <div class="login-logo">
      <?php $system = selectGetAll("system"); ?>
      <?php if(mysqli_num_rows($system) > 0): ?>
      <?php foreach($system as $value): ?>
        <a href="#" class="text-white"><b id="title"><?= $value['name'];?></b></a>
      <?php endforeach;?>
      <?php else:?>
        <a href="#" class="text-white">Easyschool</a>
      <?php endif;?>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body p-5">
      <?php if(isset($value['name'])):?>
        <p class="login-box-msg">Sign In to <?= $value['name'];?></p>
      <?php else:?>
        <p class="login-box-msg">Sign In to Easyschool</p>
        <?php endif;?>
      

      <?= formOpen("post", BASEURL."/auth/login.auth.php"); ?>
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" name="login" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
     <?= formClose(); ?>

     

      <!-- <div class="social-auth-links text-center mb-3">

          <?php //if(selectCheckAll("users")): ?>
            <a href=""></a>
          <?php //else:?>
            <a href="#" class="btn btn-block btn-primary">
                </i> Create Admin Account
            </a>
          <?php //endif; ?>
          
      </div> -->
      <!-- /.social-auth-links -->
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<div class="container text-center"> <?php
      $systemInfo = selectGetAll('system');
      if(mysqli_num_rows($systemInfo)>0):
      foreach($systemInfo as $info):
?>

<strong>Copyright &copy; <?= $info['copyright']; ?> <a class="author_url" href="<?= $info['authorurl']; ?>" target="_blank"><?= $info['author']; ?></a></strong><br/><br/>
<!-- <b>Version</b> <?= $info['version']; ?> -->

<?php 
        endforeach; 
        else:
 ?>
  <p>Copyright 2022 <a href="https://easythingz.com" target="_blank">Easythingz</a></p>

  <?php endif;?>
 </div>

 <div class="row d-none">
          <div class="col-md-4"> <button class="btn btn-primary" onclick="bgLight()">Light</button></div>
          <div class="col-md-4"> <button class="btn btn-primary" onclick="bgDark()">Dark</button></div>
          <div class="col-md-4"> <button class="btn btn-primary" onclick="bgPrimary()">Cool</button></div>
  </div>

<?php require(ABSPATH."/includes/footer.php"); ?>

<script>

function bgLight(){
  $('body').removeClass("bg-dark");
  $('body').removeClass("bg-primary-dark");
  $('body').addClass("bg-light");
  $('#title').css('color', 'black');
  $('.author_url').css('color', 'black');
}

function bgDark(){
  $('body').removeClass("bg-light");
  $('body').removeClass("bg-primary-dark");
  $('body').addClass("bg-dark");
  $('#title').css('color', 'white');
  $('.author_url').css('color', '');
}

function bgPrimary(){
  $('body').removeClass("bg-dark");
  $('body').removeClass("bg-light");
  $('body').addClass("bg-primary-dark");
  $('#title').css('color', 'white');
  $('.author_url').css('color', 'orange');
}

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
    "timeOut": "2000",
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

<style>

  .bg-primary-dark{
    background-color: #07305b!important;
    color: #fff!important;
  }
</style>