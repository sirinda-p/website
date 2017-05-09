<nav class="navbar navbar-custom navbar-fixed-top">
		<div class="container">
				<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
							<!--<i class="fa fa-bars"></i>-->
							MENU
						</button>
						<a class="navbar-brand page-scroll" href="?page=index&ref=logo">
							<img class="logo light" src="images/logo-d.png"/>
							<img class="logo dark" src="images/logo-d.png"/>
						</a>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-right navbar-main-collapse">
						<ul class="nav navbar-nav">
								<li<?php echo $page=='index'?' class="active"':'';?>><a href="?page=index">หน้าแรก</a></li>


			<li<?php echo $page=='index2'?' class="active"':'';?>>
									<a class="dropdown-toggle" data-toggle="dropdown" href="javascript:void();">เกี่ยวกับเรา<span class="caret"></span></a>
									<ul class="dropdown-menu">
										<li><a href="?page=./aboutus/history">ประวัติความเป็นมา</a></li>
										<li><a href="?page=./aboutus/purpose">ปรัชญา ปณิธาน</a></li>

				<li><a href="?page=./aboutus/present">ปัจจุบัน</a></li>
				<li><a href="?page=instructors">อาจารย์</a></li>
									</ul>
								</li>

								<li<?php echo $page=='index2'?' class="active"':'';?>>
									<a class="dropdown-toggle" data-toggle="dropdown" href="javascript:void();">ผู้ที่สนใจ<span class="caret"></span></a>
									<ul class="dropdown-menu">
										<li><a href="?page=majors">ปริญญาตรี</a></li>
										<li><a href="#">ปริญญาโท</a></li>

										<li><a href="?page=rate">ค่าใช้จ่าย</a></li>
										<li><a href="<?php echo $_CONFIG['admissionLink'] ?>">สมัครเรียน</a></li>
										<li><a href="<?php echo $_CONFIG['scholarship'] ?>">ทุนการศึกษา</a></li>
										<!--<li><a href="#">สิ่งส่งเสริมการศึกษา</a></li>-->
										<li><a href="http://science.utcc.ac.th/files/apartment_2016.pdf">หอพัก</a></li>
										<!-- <li class="dropdown-submenu">
											<a tabindex="-1" href="javascript:void();">ความร่วมมือกับภายนอก</a>
											<ul class="dropdown-menu">
												<li><a href="#">Micresoft</a></li>
												<li><a href="#">Apple</a></li
											</ul>
										</li>  >-->
									</ul>
								</li>

								<li<?php echo $page=='index2'?' class="active"':'';?>>
									<a class="dropdown-toggle" data-toggle="dropdown" href="javascript:void();">งานวิชาการ<span class="caret"></span></a>
									<ul class="dropdown-menu">
									    <li><a href="http://science.utcc.ac.th/costis/">costis</a></li>
										<li><a href="?page=publications&type=S">ผลงานนักศึกษา</a></li>
										<li><a href="?page=publications&type=I">ผลงานอาจารย์</a></li>
										
			<!--
				<li><a href="?page=conference_main">งานประชุมวิชาการ</a></li>-->
									</ul>
								</li>

								<li<?php echo $page=='index2'?' class="active"':'';?>>
							</li>
								<li<?php echo $page=='index2'?' class="active"':'';?>>
									<a class="dropdown-toggle" data-toggle="dropdown" href="javascript:void();">ศิษย์ปัจจุบัน<span class="caret"></span></a>
									<ul class="dropdown-menu">
										<li><a href="<?php echo $_CONFIG['aes'] ?>">ประเมินอาจารย์ที่ปรึกษา</a></li>
										<li class="dropdown-submenu">
											<a tabindex="-1" href="javascript:void();">ข่าวและกิจกรรม</a>
											<ul class="dropdown-menu">
												<li><a href="?page=news&type=A">ข่าว</a></li>
												<li><a href="?page=news&type=E">กิจกรรม</a></li>
											</ul>
										</li>
										<li><a href="?page=timetable">ตารางสอน</a></li>
										<li><a href="?page=news&type=D">ประกาศจากคณะ</a></li>
									</ul>
								</li>
								<li<?php echo $page=='contactus'?' class="active"':'';?>><a href="?page=contactus">ติดต่อเรา</a></li>
			<li>
			<a class="dropdown-toggle" data-toggle="dropdown" href="javascript:void();">MIS<span class="caret"></span></a>
									<ul class="dropdown-menu">

										<li><a href="http://10.12.21.169/sc_db/">MIS</a></li>
										<li><a href="http://10.12.21.169/infonew/login.php">InfoQA</a></li>
									</ul>
								</li>

							<!--  <li><a class="page-scroll" href="#section-contact"  >contact</a></li> -->
						</ul>
				</div>
				<!-- /.navbar-collapse -->
		</div>
		<!-- /.container -->
</nav>
<!-- navbar end -->
