
    <!-- Content Header (Page header) -->
    <div class="content-header bg-white mb-3">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?= $page_title ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= BASEURL; ?>/admin">Home</a></li>
              <li class="breadcrumb-item active"><?= $page_title ?></li>
            </ol>
            <button class="btn btn-primary" onclick="goBack();">Go Back</button>
            <button class="btn btn-success" onclick="goBack();">Go Forward</button>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <script>
      // js script for goback button
        function goBack() {
          window.history.back()
        }

        function goForward(){
          window.history.forward();
        }

    </script>