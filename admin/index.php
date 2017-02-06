<?php
  ob_start();
  session_start();
  require_once '../config.php';
 ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Science and Technology - Admin Panel</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- WYSIHTML5 Text Editor -->
    <link rel="stylesheet" type="text/css" href="dist/bootstrap3-wysihtml5.min.css"></link>
    <!-- Krajee Uploader -->
    <link href="../css/fileinput.css" media="all" rel="stylesheet" type="text/css" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
    @media (max-width: 767px){
      ul.timeline > li > .timeline-panel {
        width: 65vw !important;
      }
    }
    /*Floating Button*/
    .share-wrapper {
        position: fixed;
        bottom: 25px;
        right: 25px;
        margin: 0px;
    }
    /*End Floating Button*/
    .fileinput-upload-button,.kv-file-upload,.file-upload-indicator {
      display: none;
    }
    </style>
</head>

<body>
  <?php
    $r;
    if(@$_SESSION['login']===base64_encode(md5(@$_SESSION['username']).session_id())){
      $page = @$_GET['page'];
      if(!$page||$page==''){
        $page = 'index';
      }
      if(!file_exists('inc/'.$page.'.php')){
        $request = $page;
        $page = '404';
      }
      require_once 'req/header.php';
      require_once 'inc/'.$page.'.php';
      require_once 'req/footer.php';
    } else {
      require_once 'inc/login.php';
    }
  ?>
  <!-- jQuery -->
  <script src="vendor/jquery/jquery.min.js"></script>

  <!-- Bootstrap Core JavaScript -->
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

  <!-- Metis Menu Plugin JavaScript -->
  <script src="vendor/metisMenu/metisMenu.min.js"></script>

  <!-- Morris Charts JavaScript -->
  <script src="vendor/raphael/raphael.min.js"></script>
  <script src="vendor/morrisjs/morris.min.js"></script>
  <script src="data/morris-data.js"></script>

  <!-- WYSIHTML5 Text Editor -->
  <script src="components/wysihtml5x/dist/wysihtml5x-toolbar.min.js"></script>
  <script src="components/handlebars/handlebars.runtime.min.js"></script>
  <script src="dist/bootstrap3-wysihtml5.min.js"></script>
  <script>
    $('.textarea').wysihtml5();
  </script>
  <!-- Krajee Uploader -->
  <script src="../js/fileinput.js" type="text/javascript"></script>
  <script>
    $("#cover").fileinput({
        initialPreviewAsData: true,
        autoReplace: true,
        maxFileCount: 1,
        allowedFileExtensions: ["jpg"]
    });
  </script>

  <!-- Custom Theme JavaScript -->
  <script src="dist/js/sb-admin-2.js"></script>
  <script>
    $("#addnews").click(function(){window.location.href='?page=addnews';})
    $("#addinstructor").click(function(){window.location.href='?page=instructors&action=add';})
    $('#cancelBtn').click(function(){window.history.back(1);})
    $('#submitBtn').click(function(){$('#form').submit();})
  </script>
</body>

</html>
