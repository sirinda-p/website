<?php
  class instructors extends Dbconfig {
    function __construct() {
      $this -> Mysql();
      $this -> dbConnect();
    }
    function Mysql()    {
      $dbPara = new Dbconfig();
      $this -> databaseName = $dbPara -> dbName;
      $this -> hostName = $dbPara -> serverName;
      $this -> userName = $dbPara -> userName;
      $this -> passCode = $dbPara ->passCode;
      $dbPara = NULL;
    }
    function dbConnect()    {
        $this -> pdo = new PDO("mysql:dbname={$this -> databaseName};host={$this -> serverName};charset=utf8", $this -> userName, $this -> passCode);
        return $this -> pdo;
    }
    public function getInsList($course='%',$type='col'){
      $sth = $this -> pdo -> prepare("SELECT * FROM `instructor` RIGHT JOIN `course` ON `instructor`.`courseID` = `course`.`courseID` WHERE `instructor`.`courseID` LIKE '$course'");
      $sth -> execute();
      $out = '';
      while($row = $sth->fetch(PDO::FETCH_ASSOC)) {
        if($type=='col'){
          $preOut = '
          <div class="col-md-4 team-box col-sm-6 wow pulse" data-wow-delay=".3s">
            <div class="team-box">
							<img src="images/ins/cover.png" style="background:url(\'images/ins/index.php?instructorID='.$row['instructorID'].'\') no-repeat;background-size:cover;" alt="'.$row['firstname'].' '.$row['lastname'].'">
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
        } else {
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
  }
?>
