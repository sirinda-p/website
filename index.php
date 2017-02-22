<?php
  require_once "config.php";
?>
<!DOCTYPE html>
<html lang="en" manifest="appcache.php">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>School of Science and Technology | คณะวิทยาศาสตร์และเทคโนโลยี</title>

	<!-- MAIN CSS FILES===================================
	======================================================= -->
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.css">
    <!-- Animation -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- Flexslider -->
    <link rel="stylesheet" href="css/flexslider.css">
    <!-- Custom CSS -->
    <link href="css/theme.css" rel="stylesheet">
    <!-- Responsive styles-->
    <link rel="stylesheet" href="css/responsive.css">

    <!-- Custom Fonts -->
    <!-- FontAwesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- Elegant icon font -->
    <link rel="stylesheet" href="css/line-icons.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">
    <!--<link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">-->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
    <!-- Preloader -->
    <div class="preloader">
      <div class="pre-wrap">
        <div class="pre-logo bg-tm"><img src="images/logo-m.png" alt=""></div>
        <div class="pre-logo-text"><p class="text-tm">School of Science</p></div>
        <span class="pre-load"><i class="bg-tm"><img src="images/pre_animation.gif" alt=""></i><br>Loading...</span>
      </div>
    </div>
    <!-- Navigation -->
		<?php
		if(@$_COOKIE['lang']=='en'&&file_exists('req/navbar.en.php')){
				require_once 'req/navbar.en.php';
		} else {
			require_once 'req/navbar.php';
		}
		?>
    <!-- content start -->
    <?php
      //require content from attribute 'page' from GET and POST
      //variable $filePage definded on config.php
      require_once $filePage;
    ?>
    <!-- content end -->
    <!-- <div class="section section-white">
      <div class="container">
        <div class="row">
            <div class="col-md-12 wow slideInLeft">
              <div class="section-heading text-center ">
                  <hr>
                </div>
            </div>
        </div>
      </div>
    </div>-->
    <!-- footer start -->
    <footer id="section-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="text-left copy">
                        <p>&copy; Copyright reserved by School of Science and Technology. 2016</p>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="text-right footer-socail">
                        <ul class="list-inline">
														<li><a href="javascript:document.cookie='lang=<?php echo @$_COOKIE['lang']=='en'?'th':'en';?>';location.reload(1);" alt="Change Language" style="width:<?php echo @$_COOKIE['lang']=='en'?'100':'80';?>px;"><i class="fa fa-globe"> <?php echo @$_COOKIE['lang']=='en'?'ภาษาไทย':'English';?></i></a></li>
                            <li><a href="https://www.facebook.com/utccSciTech/"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="http://www.youtube.com/sctutcc"><i class="fa fa-youtube"></i></a></li>
                            <!--<li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-rss"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-skype"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>-->
                        </ul>
                    </div>
                </div>
            </div><!--row end -->
        </div><!-- container end -->
    </footer>
    <!-- footer end -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="js/jquery.easing.min.js"></script>
    <!-- Respond js -->
    <script type="text/javascript" src="js/respond.js"></script>
     <!-- form validation -->
    <script type="text/javascript" src="js/validator.min.js"></script>
    <script type="text/javascript" src="js/form-scripts.js"></script>
    <!-- Html5 shiv -->
    <script type="text/javascript" src="js/html5shiv.js"></script>
     <!-- Flex slider js -->
    <script type="text/javascript" src="js/jquery.flexslider.js"></script>
    <!-- Owl Carousel -->
    <script type="text/javascript" src="js/owl.carousel.js"></script>
    <!-- Waypoint js with counter -->
    <script type="text/javascript" src="js/jquery.waypoints.min.js"></script>
    <!-- Counter -->
    <script type="text/javascript" src="js/jquery.counterup.min.js"></script>
        <!-- Wow Animation -->
    <script type="text/javascript" src="js/wow.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/theme.js"></script>
    <script src="js/custom.js"></script>
    <script type="text/javascript" src="js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <script>
        new WOW().init();
        window.onload = function(){
          $('.preloader').hide();
        }
    </script>
</body>

</html>
