<?php
  require_once 'class/instructors.php';
  $ins = new instructors();
  if(!@$_GET['instructorID']) {
    ?><script>window.location.href="?page=instructors";</script><?php
  } else {
    $info = $ins->getInsInfo($_GET['instructorID']);
?>
<section>
  <div style="padding-top:120px;">
  </div>
</section>
<!-- About Section -->
    <section id="about" class="about-section section-padding">
      <div class="container">
        <h2 class="section-title wow fadeInUp">About Me</h2>

        <div class="row">

          <div class="col-md-4">
            <div class="biography">
              <div class="myphoto">
                <img src="images/ins/index.php?instructorID=<?php echo $info['instructorID']; ?>" alt="">
              </div>
              <ul>
                <li><strong>ชื่อ:</strong> <?php echo $info['firstname'].'  '.$info['lastname']; ?></li>
                <li><strong>ตำแหน่ง:</strong> <?php echo $info['post']; ?></li>
                <li><strong>Email:</strong> <?php echo $info['email']?$info['email']:'-'; ?></li>
              </ul>
            </div>
          </div> <!-- col-md-4 -->

          <div class="col-md-8">
            <div class="short-info wow fadeInUp">
              <h3>Objective</h3>
              <p>An opportunity to work and upgrade oneself, as well as being involved in an organization that believes in gaining a competitive edge and giving back to the community. I'm presently expanding my solid experience in UI / UX design. I focus on using my interpersonal skills to build good user experience and create a strong interest in my employers. I hope to develop skills in motion design and my knowledge of the Web, and become an honest asset to the business. As an individual, I'm self-confident you’ll find me creative, funny and naturally passionate. I’m a forward thinker, which others may find inspiring when working as a team.</p>
            </div>

            <div class="short-info wow fadeInUp">
              <h3>What I Do ?</h3>
              <p>I have been working as a web interface designer since. I have a love of clean, elegant styling, and I have lots of experience in the production of CSS3 and HTML5 for modern websites. I loving creating awesome as per my clients’ need. I think user experience when I try to craft something for my clients. Making a design awesome.</p>

              <ul class="list-check">
                <li>User Experience Design</li>
                <li>Interface Design</li>
                <li>Product Design</li>
                <li>Branding Design</li>
                <li>Digital Painting</li>
                <li>Video Editing</li>
              </ul>
            </div>
          </div>


        </div> <!-- /.row -->
      </div> <!-- /.container -->
    </section><!-- End About Section -->
<?php
  }
?>
