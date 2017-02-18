<?php include_once("analyticstracking.php") ?>

<div class="flexslider" id="section-slider">
  <ul class="slides">
      <li>
        <img src="images/32blank.png" style="background-image:url('images/blank.jpg');" alt="สาขาวิชาเทคโนโลยีสารสนเทศและการสื่อสาร" class="img-responsive newscover">
        <!--<object data="http://www.youtube.com/v/GLHbUmRSkGU?autoplay=1" class="img-responsive" style="width:100%;height: 125vh;"></object>-->
        <div class="flex-caption ">
          <h4 class="wow slideInLeft">ติดต่อเรา</h4>
        </div>
      </li>
  </ul>
</div>
<section id="section-contact" class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12 wow fadeInDown">
                <div class="section-heading text-center">
                    <h2 class="section-title">ติดต่อเรา</h2>
                    <hr>
                </div>
            </div>
        </div> <!-- row end -->
        <div class="row">
            <div class="col-md-12">
              <?php echo @$result; ?>
            </div>
            <div class="col-md-4 col-sm-4 wow fadeInLeft">
                <div class="contact-info">
                    <div class="info-box">
                        <i class="icon icon-phone"></i>
                        <div class="info-desc">
                            <p>02-697-6504</p>
                        </div>
                    </div>
                    <div class="info-box">
                        <i class="icon" style="background-image:url('images/line-icon.png');background-size:contain;background-repeat:no-repeat;background-position:center;height:40px;"></i>
                        <div class="info-desc">
                            <p>095-367-5505</p>
                        </div>
                    </div>
                    <div class="info-box">
                        <i class="icon icon-envelope"></i>
                        <div class="info-desc">
                            <p><?php echo $_CONFIG['email'];?></p>
                        </div>
                    </div>

                    <div class="info-box">
                        <div class="info-desc">
                          <i class="icon icon-map" style="float:left;"></i>
                          <p>126 / 1 ถ.วิภาวดีรังสิต ดินแดง กรุงเทพฯ 10400</p>
                        </div>
                          <p>**หากคุณมีข้อสงสัย หรือต้องการสอบถามข้อมูลเพิ่มเติมสามารถระบุข้อความในแบบฟอร์มนี้</p>
                    </div>
                </div>
            </div> <!-- col end -->
            <div class="col-md-8 col-sm-8 wow fadeInRight">
                <form role="form" id="contactForm" data-toggle="validator" class="shake" method="POST" >
                  <input type="hidden" name="ipaddr" id="ipaddr" value="<?php echo @$_SERVER['REMOTE_ADDR']; ?>"/>
                    <div class="row">
                        <div class="col-md-4 col-xs-12 col-sm-4">
                            <div class="form-group">
                                <input type="text" id="name" name="name" class="form-control" placeholder="ชื่อ-นามสกุล" required data-error="type your name">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-4 col-xs-12 col-sm-4">
                            <div class="form-group">
                                <input type="email" name="email" id="email" class="form-control" placeholder="E-Mail" required
                                data-error="type your email">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-4 col-xs-12 col-sm-4">
                            <div class="form-group">
                                <input type="text" name="subject" id="subject" class="form-control" placeholder="หัวข้อเรื่อง" required
                                data-error="type your subject">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-12 col-xs-12 col-sm-12">
                            <div class="form-group">
                                <textarea  id="message" name="message" cols="30" rows="6" class="form-control" placeholder="เนื้อหา" required data-error="type your message"></textarea>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div> <!-- row end -->
                        <div class="col-md-12 col-xs-12 col-sm-12 ">
                            <a class="btn btn-primary feature" id="form-submit" type="submit" value="Submit">ส่ง</a>
                            <div id="msgSubmit" class="h3 text-center hidden"></div>
                         </div>
                    </div>
                </form>
            </div>
        </div> <!-- Row end -->
        <div class="row">
            <div class="col-md-12 wow bounceInUp">
                <div class="section-heading text-center">
                    <h2>แผนที่ในการเดินทาง</h2>
                    <hr>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 wow bounceInUp">
                  <img src="images/utcc_map_update2015.jpg" alt="ค่าใช้จ่ายปริญญาตรี" class="img-responsive">
            </div>
        </div>
    </div><!-- container end -->
</section>
<!-- section testimonial end -->
