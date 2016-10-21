<?php
if(file_exists($_GET['instructorID'].'.jpg')) {
  header('Location: '.$_GET['instructorID'].'.jpg');
} else {
  header('Location: blankface.jpg');
}
 ?>
