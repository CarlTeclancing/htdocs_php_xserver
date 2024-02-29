<?php
      $systemInfo = selectGetAll('system');
      foreach($systemInfo as $info):
?>
<footer class="main-footer">
    <strong>Copyright &copy; <?= "CODEwithCREST"; ?></a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> <?= $info['version']; ?>
    </div>
  </footer>

  <?php endforeach; ?>