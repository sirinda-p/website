<?php include_once("analyticstracking.php") ?>

<?php
  $major = @$_REQUEST['major']!=""?$_REQUEST['major']:'index';
  if(!file_exists($_CONFIG['pages'].$_CONFIG['majorPath'].$major.$_CONFIG['pagesType'])) $major = 'index';
	$lang;
	if(@$_COOKIE['lang']=='en'){
		if(file_exists($_CONFIG['pages'].$_CONFIG['majorPath'].$major.'.en'.$_CONFIG['pagesType'])) $lang = '.en';
	}
  $fileMajor = $_CONFIG['pages'].$_CONFIG['majorPath'].$major.$lang.$_CONFIG['pagesType'];
  require_once $fileMajor;
?>
