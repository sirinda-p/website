<?php
  require_once 'config.php';
  if(array_search(array('username','password'),$_ADMIN)) echo 'true'; else echo 'false';
 ?>
