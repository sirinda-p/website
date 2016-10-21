<?php
  require_once 'config.php';
  require_once 'class/news.php';
  $news = new news();
?>
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
              echo $news->showNewsestNews('D');
              echo $news->showNewsestNews('U');
              echo $news->showNewsestNews('E');
            ?>
        </div> <!-- Row end -->
    </div> <!--container end -->
</section>
<!-- section blog end -->
