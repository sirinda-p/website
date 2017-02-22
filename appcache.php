CACHE MANIFEST
# 2017-02-22 v1.0.0
# IMAGES
/img/loading.gif
<?php
if ($handle = opendir($dir='images')) {
	while (false !== ($entry = readdir($handle))) {
		if ($entry != "." && $entry != ".."&&!stripos($entry,'.db')&&!stripos($entry,'.ini')&&!stripos($entry,'.php')&&stripos($entry,'.')) {
			echo "/$dir/$entry\n";
		}
	}
	closedir($handle);
}
if ($handle = opendir($dir='images/ins')) {
	while (false !== ($entry = readdir($handle))) {
		if ($entry != "." && $entry != ".."&&!stripos($entry,'.db')&&!stripos($entry,'.ini')&&!stripos($entry,'.php')&&stripos($entry,'.')) {
			echo "/$dir/$entry\n";
		}
	}
	closedir($handle);
}
if ($handle = opendir($dir='images/quote')) {
	while (false !== ($entry = readdir($handle))) {
		if ($entry != "." && $entry != ".."&&!stripos($entry,'.db')&&!stripos($entry,'.ini')&&!stripos($entry,'.php')&&stripos($entry,'.')) {
			echo "/$dir/$entry\n";
		}
	}
	closedir($handle);
}
?>
# JS
/js/jquery.js
/js/bootstrap.min.js
/js/jquery.easing.min.js
/js/respond.js
/js/validator.min.js
/js/form-scripts.js
/js/html5shiv.js
/js/jquery.flexslider.js
/js/owl.carousel.js
/js/jquery.waypoints.min.js
/js/jquery.counterup.min.js
/js/wow.min.js
/js/theme.js
/js/custom.js
/js/modernizr-2.6.2-respond-1.1.0.min.js
# CSS
/css/bootstrap.min.css
/css/owl.carousel.css
/css/owl.theme.css
/css/animate.css
/css/flexslider.css
/css/theme.css
/css/responsive.css
/css/font-awesome.min.css
/css/line-icons.min.css
/css/custom.css

NETWORK:
index.php
images/ins/index.php
*
FALLBACK:
#/html/ /offline.html
