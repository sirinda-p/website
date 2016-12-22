<?php include_once("analyticstracking.php") ?>

<?php
  $major = @$_REQUEST['major']!=""?$_REQUEST['major']:'index';
  if(!file_exists($_CONFIG['pages'].$_CONFIG['majorPath'].$major.$_CONFIG['pagesType'])) $major = 'index';
  $fileMajor = $_CONFIG['pages'].$_CONFIG['majorPath'].$major.$_CONFIG['pagesType'];
  require_once $fileMajor;
?>
