<!-- slider start -->
<div class="flexslider" id="section-slider">
  <ul class="slides">
      <li>
        <img src="images/32blank.png" style="background-image:url('images/cover1.jpg');" alt="คณะวิทยาศาสตร์และเทคโนโลยี" class="img-responsive newscover">
      <div class="flex-caption ">
        <h4 class="wow slideInLeft">School of Science and Technology</h4>
        <div class="btn-container wow fadeInUp">
          <a href="<?php echo $_CONFIG['admissionLink'] ?>" class="btn btn-primary ">Apply Now</a>
        </div>
      </div>
      </li>
  </ul>
</div>
<!-- slider end -->
<?php
  //require index of major
  require_once $_CONFIG['pages'].$_CONFIG['majorPath'].'index.php';
  //require blog content
  require_once 'newsfeed.en.php';
?>
<!-- section testimonial start -->
<section id="section-testimonial">
    <div class="container">
        <div class="row">
            <div class="col-md-12 wow bounceInDown">
                <div class="carousel slide" id="testimonial-carousel" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="item ">
                            <i class="icon icon-quote"></i>
                            <p>ตั้งแต่ได้เข้ามาเรียน Food Sci Tech ที่ UTCC ทำให้หนูได้รับประสบการณ์ใหม่ๆ ที่ไม่สามารถหาได้ในระดับมัธยมศึกษา ได้ทดลองได้ลงมือทำได้แชร์ไอเดียกับเพื่อนๆในสาขา อาจารย์ในแต่ละวิชาดูแลนักศึกษาได้อย่างทั่วถึงทำให้หนูรู้สึกอุ่นใจเมื่อได้เข้ามาอยู่ในบ้านหลังนี้ </p>
                            <h5> โดย <strong>พิลัดดา พิทักษ์เจริญ</strong></h5>
                        </div> <!-- item end -->
                        <div class="item active">
                        <i class="icon icon-quote"></i>
                            <p>ประสบการณ์การเรียนหลักสูตร 4+1 สาขา ICT ต้องบอกเลยว่าเข้มข้นมากค่ะ ตอนแรกก็คิดว่าเราจะเรียนไหวไหม แต่พอมาเรียนเข้าจริง อาจารย์ที่นี่ใส่ใจนักศึกษามากค่ะ ตรงไหนที่ไม่เข้าใจ อาจารย์ก็จะอธิบายและให้คำปรึกษาเป็นอย่างดี การเรียนที่นี่ได้มากกว่าความรู้ที่อยู่แค่ในตำรา <!--เพราะบ้านหลังนี้ให้ทั้งประสบการณ์ตรงจากการที่อาจารย์เปิดโอกาสให้นักศึกษาแสดงความสามารถ ความคิดเห็น และลงมือปฏิบัติจริง จากตอนแรกที่เป็นคนขี้อายไม่กล้าพูด ไม่กล้าพรีเซ้นงาน มาตอนนี้คะน้ากล้าที่จะอยู่หน้าชั้น และนำเสนอผลงานของตัวเองและทีมมากขึ้นค่ะ และที่สำคัญการเรียนหลักสูตร 4+1 ทำให้เมื่อจบการศึกษา คะน้าจะได้ทั้งปริญญาตรีและปริญญาโท โดยใช้เวลาแค่ 5 ปีเท่านั้นเอง ทำให้คะน้ามีโอกาสที่จะไปได้ไวและมีความก้าวหน้าในการทำงานมากขึ้น บอกเลยว่าเลือก UTCC คิดไม่ผิดจริงๆ ค่ะ--></p>
                            <h5> โดย <strong>คณนา ณัฐญานธร</strong></h5>
                        </div> <!-- item end -->
                        <div class="item">
                        <i class="icon icon-quote"></i>
                            <p>ตั้งแต่เข้ามาเรียนสาขานี้ทำให้ผมได้เรียนรู้สิ่งใหม่ๆ การเรียนที่สนุกได้เจอเพื่อนใหม่ๆ รู้จักรุ่นพี่ที่น่ารัก ได้ทำงานกับเพื่อนๆ แลกเปลี่ยนความคิดใหม่ความรู้ใหม่ๆ และอาจารย์ทุกท่านนี่ดูแลเอาใจใส่นักศึกษาทุกคนรู้สึกดีใจมากๆที่ได้มาเรียน Food Science จริงๆ</p>
                            <h5> โดย <strong>ภาณุวัฒน์ สหัชเสาวภาคย์</strong></h5>
                        </div> <!-- item end -->
                    </div> <!-- caorusel inner end -->
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#testimonial-carousel" data-slide-to="0" >
                            <img src="images/quote/1.jpg" alt="" class="img-responsive">
                        </li>
                        <li data-target="#testimonial-carousel" data-slide-to="1" class="active">
                            <img src="images/quote/2.jpg" alt="" class="img-responsive">
                        </li>
                        <li data-target="#testimonial-carousel" data-slide-to="2">
                            <img src="images/quote/3.jpg" alt="" class="img-responsive">
                        </li>
                    </ol>
                </div> <!-- caorusel slide end -->
            </div>
        </div> <!-- Row end -->

    </div><!-- container end -->
</section>
<!-- section testimonial end -->
