<?php
  session_destroy();
?>
<div class="row" style="height:45vh;">
</div>
<div class="row">
  <div class="col-sm-4"></div>
  <div class="col-sm-4">
    <div class="alert alert-success">
      <strong>Logout success!</strong> Please wait or <a href="index.php">click here</a>.
    </div>
  </div>
  <div class="col-sm-4"></div>
</div>
<style>
  #page-wrapper {
    margin: 0 !important;
    background-color: #f8f8f8 !important;
  }
  .navbar {
    display: none !important;
  }
</style>
<script>
  self.setTimeout(function(){window.location.href='index.php';},3000);
</script>
