<?php include_once("analyticstracking.php") ?>

<?php
require_once 'class/news.php';
$news = new news();
  if(@$_REQUEST['newsID']){
    $newsID = $_REQUEST['newsID'];
    $news->getNews($newsID);
?>
<div class="flexslider" id="section-slider">
  <ul class="slides">
      <li>
        <img src="images/32blank.png" style="background-image:url('images/blank.jpg');" alt="ข่าวสารประชาสัมพันธ์" class="img-responsive newscover">
        <!--<object data="http://www.youtube.com/v/GLHbUmRSkGU?autoplay=1" class="img-responsive" style="width:100%;height: 125vh;"></object>-->
        <div class="flex-caption ">
					<h4 class="wow slideInLeft"><?php echo $news->title; ?></h4>
          <p><?php echo $news->outline; ?></p>
        </div>
      </li>
  </ul>
</div>
<section class="section-padding">
  <div class="container">
    <div class="row">
      <div class="col-md-12 wow slideInLeft">
        <div class="section-heading text-center ">
          <h2 class="section-title">
            <?php echo $news->title; ?>
          </h2>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4">
        <img src="<?php echo $news->cover; ?>" alt="slider-3 img" class="img-responsive" style="margin-bottom: 20px;">
      </div>
      <div class="col-md-8">
        <?php echo $news->content; ?>
      </div>
    </div>
  </div>
</section>
<?php
  } elseif($type=@$_REQUEST['type']) {
?>
<div class="flexslider" id="section-slider">
  <ul class="slides">
      <li>
        <img src="images/32blank.png" style="background-image:url('images/blank.jpg');" alt="ข่าวสารประชาสัมพันธ์" class="img-responsive newscover">
        <!--<object data="http://www.youtube.com/v/GLHbUmRSkGU?autoplay=1" class="img-responsive" style="width:100%;height: 125vh;"></object>-->
        <div class="flex-caption ">
          <h4 class="wow slideInLeft">ข่าวสารประชาสัมพันธ์</h4>

        </div>
      </li>
  </ul>
</div>
<!-- section blog start -->
<section id="section-blog" class="section-padding bg-black">
    <div class="container">
        <div class="row">
            <div class="col-md-12 wow bounceInDown">
                <div class="section-heading text-center">
                    <h2 class="section-title">ข่าวสารประชาสัมพันธ์</h2>
                </div>
            </div>
        </div>  <!-- row end -->
        <div class="row">
            <?php
              echo $news->showNewsestNews($type,3);
            ?>
        </div> <!-- Row end -->
    </div> <!--container end -->
</section>
<!-- section blog end -->
<?php
  }
?>
