<?php include_once("analyticstracking.php") ?>

<?php
  require_once 'class/instructors.php';
  $ins = new instructors();
?>
<style>
  .tab-content .tab-pane img {
    display: inline-block;
    float: none ;
    margin-right: 0px;
  }
  .tab-pane .container {
    padding-top: 40px;
    padding-left: 0px;
    padding-right: 0px;
    margin-right: 0px;
    width: 100%;
  }
  .tab-pane .container .row {
    margin-right: 0px;
    margin-left: 0px;
  }
</style>
<!-- slider start -->
<div class="flexslider" id="section-slider">
  <ul class="slides">
      <li>
        <img src="images/32blank.png" style="background-image:url('images/cover1.jpg');" alt="คณะวิทยาศาสตร์และเทคโนโลยี" class="img-responsive newscover">
      <div class="flex-caption ">
        <h4 class="wow slideInLeft">คณะวิทยาศาสตร์และเทคโนโลยี</h4>
        <div class="btn-container wow fadeInUp">
          <a href="<?php echo $_CONFIG['admissionLink'] ?>" class="btn btn-primary ">สมัครตอนนี้</a>
        </div>
      </div>
      </li>
  </ul>
</div>
<!-- slider end -->
<!-- section about strat -->
<section class="section-padding">
	<div class="container">
    <div class="row">
        <div class="col-md-12 wow bounceInUp">
            <div class="section-heading text-center">
              <h2 class="section-title">รายชื่อคณาจารย์ในคณะวิทยาศาสตร์และเทคโนโลยี</h2>
            </div>
        </div>
    </div>
    <div class="row">
      <div class="col-md-12 wow bounceInDown">
        <div class="service-wrapper">
        <ul class="nav nav-tabs">
          <li class="active"><a data-toggle="tab" href="#home"><i class="fa fa-cube" aria-hidden="true"></i> สาขาวิชาพื้นฐานและการบริการ</a></li>
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">หลักสูตรปริญญาตรี
            <span class="caret"></span></a>
            <ul class="dropdown-menu" role = "menu" aria-labelledby = "myTabDrop1">
              <?php
                echo $ins->getCourseList('B');
              ?>
            </ul>
          </li>
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">หลักสูตรปริญญาโท
            <span class="caret"></span></a>
            <ul class="dropdown-menu" role = "menu" aria-labelledby = "myTabDrop2">
              <?php
                echo $ins->getCourseList('M');
              ?>
            </ul>
          </li>
        </ul>
        <div class="tab-content" style="border: 1px solid #ddd;border-top:0px;">
          <div id="home" class="tab-pane fade in active">
            <div class="container">
              <div class="row">
                <?php
                  echo $ins->getInsList('11');
                ?>
              </div>
            </div>
          </div>
          <?php
            echo $ins->genInfo();
          ?>
        </div>
        </div>
      </div>
    </div><!--row end-->
  </div><!-- content end -->
</section><!-- section end -->
