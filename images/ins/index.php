<?php
if(file_exists($_GET['instructorID'].'.jpg')) {
  header('Location: '.$_GET['instructorID'].'.jpg'.(@$_POST['random']?'?random='.rand():''));
} else {
  header('Location: blankface.jpg');
}
 ?>
