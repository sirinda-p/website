<?php
	class instructors extends Dbconfig {
		function __construct() {
			$this -> Mysql();
			$this -> dbConnect();
		}
		function Mysql()		{
			$dbPara = new Dbconfig();
			$this -> databaseName = $dbPara -> dbName;
			$this -> hostName = $dbPara -> serverName;
			$this -> userName = $dbPara -> userName;
			$this -> passCode = $dbPara ->passCode;
			$dbPara = NULL;
		}
		function dbConnect()		{
				$this -> pdo = new PDO("mysql:dbname={$this -> databaseName};host={$this -> serverName};charset=utf8", $this -> userName, $this -> passCode);
				return $this -> pdo;
		}
		public function getInsList($course='%',$type='col'){
			$sth = $this -> pdo -> prepare("SELECT *,`instructor`.`status` AS `insStatus` FROM `instructor` RIGHT JOIN `course` ON `instructor`.`courseID` = `course`.`courseID` WHERE `instructor`.`courseID` LIKE '$course'");
			$sth -> execute();
			$out = '';
			while($row = $sth->fetch(PDO::FETCH_ASSOC)) {
				if($type=='col'){
					if($row['insStatus']!='A') continue;
					$preOut = '
					<div class="col-md-4 team-box col-sm-6 wow pulse" data-wow-delay=".3s">
						<div class="team-box">
							<img src="images/ins/cover.png" style="background:url(\'images/ins/index.php?instructorID='.$row['instructorID'].'\') no-repeat top center;background-size:cover;" alt="'.$row['firstname'].' '.$row['lastname'].'">
							<div class="team-box-inner">
								<h4>'.$row['firstname'].' '.$row['lastname'].'</h4>
								<div class="line"></div>
									<hr>
									<p>'.$row['post'].'</p>
								</div>
								<div class="team-desc-hover">
									<h4>'.$row['firstname'].' '.$row['lastname'].'</h4>
									<hr>
									<p>'.$row['post'].'</p>
									<br>
									<p>อาจาร์ยประจำสาขาวิชา'.$row['courseName'].'</p>
									<a href="?page=instructor&instructorID='.$row['instructorID'].'" class="btn btn-primary black">เพิ่มเติม</a>
								</div>
						</div>
					</div> <!-- col end -->
					';
					$out .= $preOut;
				} elseif($type=="tr"){
					$out .= '
					<tr';
					if($row['insStatus']!='A') $out .= ' class="inactive"';
					$out .='>
						<td>'.$row['instructorID'].'</td>
						<td><img src="../images/ins/cover.png" style="background:url(\'../images/ins/index.php?instructorID='.$row['instructorID'].'\') no-repeat top center;background-size:cover;width:100%;" alt="'.$row['firstname'].' '.$row['lastname'].'" data-url="../images/ins/index.php?instructorID='.$row['instructorID'].'" class="insImg"></td>
						<td>'.$row['post'].'</td>
						<td>'.$row['firstname'].'</td>
						<td>'.$row['lastname'].'</td>
						<td>'.$row['courseName'].'</td>';
					if($row['insStatus']!='A'){
						$out .='<td>
							<button type="button" class="btn btn-warning btn-circle od" data-target="#modalDialog" data-href="?modal=true&page=instructors&action=edit&instructorID='.$row['instructorID'].'">
								<i class="fa fa-edit"></i>
							</button>
							<button type="button" class="btn btn-success btn-circle od" data-target="#modalDialog" data-href="?modal=true&page=instructors&action=active&instructorID='.$row['instructorID'].'">
								<i class="fa fa-check"></i>
							</button>
						</td>';
					} else {
							$out .='
							<td>
								<button type="button" class="btn btn-warning btn-circle od" data-target="#modalDialog" data-href="?modal=true&page=instructors&action=edit&instructorID='.$row['instructorID'].'">
									<i class="fa fa-edit"></i>
								</button>
								<button type="button" class="btn btn-danger btn-circle od" data-target="#modalDialog" data-href="?modal=true&page=instructors&action=inactive&instructorID='.$row['instructorID'].'">
									<i class="fa fa-times"></i>
								</button>
								</td>';
						}
					$out .= '</tr>';
				}else {
					$out = 'N/A';
				}
			}
			return $out;
		}
		public function getCourseList($degree){
			$sth = $this -> pdo -> prepare("SELECT * FROM `course` WHERE `degree` = '$degree'");
			$sth -> execute();
			$out = '';
			while($row = $sth->fetch(PDO::FETCH_ASSOC)) {
				$out .= '<li><a href="#course'.$row['courseID'].'" tabindex = "-1" data-toggle="tab">'.$row['courseName'].'</a></li>';
			}
			return $out;
		}
		public function genInfo(){
			$sth = $this -> pdo -> prepare("SELECT * FROM `course` WHERE `degree` != 'O'");
			$sth -> execute();
			$out = '';
			while($row = $sth->fetch(PDO::FETCH_ASSOC)) {
				$out .= '<div id="course'.$row['courseID'].'" class="tab-pane fade in">
					<div class="container">
						<div class="row">'.$this->getInsList($row['courseID']).'</div>
					</div>
				</div>';
			}
			return $out;
		}
		public function getInsInfo($id){
			$sth = $this -> pdo -> prepare("SELECT * FROM `instructor` RIGHT JOIN `course` ON `instructor`.`courseID` = `course`.`courseID` WHERE `instructor`.`instructorID` = '$id'");
			$sth -> execute();
			return $sth->fetch(PDO::FETCH_ASSOC);
		}
		public function getFormPostList($t,$o){
			$out = '';
			$sth = $this -> pdo -> prepare("SELECT postName FROM `post`");
			$sth -> execute();
			switch($t){
				case "select":
					while($row = $sth->fetch(PDO::FETCH_ASSOC)) {
						$out .= '<option value="'.$row['postName'].'"'.($row['postName']==$o?' selected':'').'>'.$row['postName'].'</option>';
					}
				break;
				default:
					$out = $sth->fetch(PDO::FETCH_ASSOC);
				break;
			}
			return $out;
		}
		public function getFormCourseList($t,$o){
			$out = '';
			$sth = $this -> pdo -> prepare("SELECT courseID,degree,courseName FROM `course`");
			$sth -> execute();
			switch($t){
				case "select":
					while($row = $sth->fetch(PDO::FETCH_ASSOC)) {
						$out .= '<option value="'.$row['courseID'].'"'.($row['courseID']==$o?' selected':'').'>หลักสูตร'.(($row['degree']=="B")?"ปริญญาตรี":(($row['degree']=="M")?"ปริญญาโท":"อื่นๆ")).' '.$row['courseName'].'</option>';
					}
				break;
				default:
					$out = $sth->fetch(PDO::FETCH_ASSOC);
				break;
			}
			return $out;
		}
		public function addIns($f,$l,$e,$w,$p,$c){
			$sth = $this -> pdo -> prepare("INSERT INTO `instructor` (`firstname`,`lastname`,`email`,`website`,`post`,`courseID`) VALUES ('$f','$l','$e','$w','$p','$c')");
			$sth -> execute();
			$res = $sth->fetch(PDO::FETCH_ASSOC);
			return $this->pdo->lastInsertId();
		}
		public function editIns($id,$f,$l,$e,$w,$p,$c){
			$out;
			$sth = $this -> pdo -> prepare("SELECT * FROM `instructor` WHERE `instructorID` = '$id';");
			$sth -> execute();
			if($sth->rowCount()==1){
				$sth2 = $this -> pdo -> prepare("UPDATE `instructor` SET `post`='$p',`firstname`='$f',`lastname`='$l',`email`='$e',`courseID`='$c',`website`='$w' WHERE  `instructorID`='$id'");
				if($sth2 -> execute()){
					$out = true;
				} else {
					$out = false;
				}
			} else {
				$out = flase;
			}
			return $out;
		}
		public function count($t='degree',$o){
			switch($t){
				case "degree":
					$sth = $this -> pdo -> prepare("SELECT `instructorID` FROM `instructor` LEFT JOIN `course` ON `instructor`.`courseID` = `course`.`courseID` WHERE `course`.`degree` = '$o';");
				break;
				default:
					$sth = $this -> pdo -> prepare("SELECT `instructorID` FROM `instructor`;");
				break;
			}
			$sth -> execute();
			return $sth->rowCount();
		}
		public function delete($id){
			$sth = $this -> pdo -> prepare("DELETE FROM `instructor` WHERE `instructorID` = '$id';");
			return $sth -> execute();
		}
		public function inactive($id){
			$sth = $this -> pdo -> prepare("UPDATE `instructor` SET `status` = 'I' WHERE `instructorID` = '$id';");
			return $sth -> execute();
		}
		public function active($id){
			$sth = $this -> pdo -> prepare("UPDATE `instructor` SET `status` = 'A' WHERE `instructorID` = '$id';");
			return $sth -> execute();
		}
	}
?>
