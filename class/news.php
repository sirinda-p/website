<?php
	class news extends Dbconfig {
		public $id;
		public $date;
		public $title;
		public $cover;
		public $outline;
		public $content;
		public $pdo;
		protected $databaseName;
		protected $hostName;
		protected $userName;
		protected $passCode;
		private $imagePath = 'images/news/';

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

		public function getNewsList($type='A',$status='A',$sort='DESC',$limit='10'){
			switch ($type) {
				case 'D':
				case 'U':
				case 'E':
					$qType = " AND `type` = '$type'";
					break;
				case 'A':
				default:
					$qType = '';
					break;
			}
			switch ($status) {
				case 'A':
				case 'D':
				case 'I':
					$qStatus = " `status` = '$status'";
					break;
				default:
					$qStatus = " `status` = 'A'";
					break;
			}
			switch ($sort) {
				case 'DESC':
				case 'ASC':
					$qSort = " ORDER BY `date` $sort";
					break;

				default:
					$qSort = " ORDER BY `date` DESC";
					break;
			}
			if($limit<1) $limit = 10;
			if(!is_int($limit)) $limit = intval($limit);
			$sth = $this -> pdo -> prepare("SELECT * FROM `news` WHERE$qStatus$qType$qSort LIMIT $limit");
			$sth -> execute();
			$preID;
			$preTitle;
			$preCover;
			$precontent;
			while($row = $sth->fetch(PDO::FETCH_ASSOC)) {
				$preID[] = $row['newsID'];
				//$preTitle[] = $row['title'];
				//$preContent[] = $row['content'];
			}
			//$this -> id = $preId;
			//$this -> title = $preTitle;
			//$this -> content = $preContent;
			return $preID;
		}
		public function getNewsListAdmin(){
			$sth = $this -> pdo -> prepare("SELECT * FROM `news`");
			$sth -> execute();
			$out;
			while($row = $sth->fetch(PDO::FETCH_ASSOC)) {
				$out .= '
				<tr';
				if($row['status']!='A'){
					$out .= $row['status']=="D"?' class="draft"':' class="inactive"';
				}
				$out .='>
					<td>'.$row['newsID'].'</td>
					<td><img src="../images/32blank.png" style="background:url(\'../images/news/'.$row['newsID'].'/cover.jpg\') no-repeat top center;background-size:cover;width:100%;" alt="'.$row['title'].'" data-url="../images/news/'.$row['newsID'].'/cover.jpg" class="newsImg"></td>
					<td>'.($row['type']=="D"?'Department':($row['type']=="U"?'University':'Event')).'</td>
					<td class="outline">'.$row['title'].'</td>
					<td class="outline">'.$row['outline'].'</td>';
				if($row['status']!='A'){
					$out .='<td>
						<button type="button" class="btn btn-warning btn-circle od" data-target="#modalDialog" data-href="?modal=true&page=news&action=edit&newsID='.$row['newsID'].'">
							<i class="fa fa-edit"></i>
						</button>
						<button type="button" class="btn btn-success btn-circle od" data-target="#modalDialog" data-href="?modal=true&page=news&action=active&newsID='.$row['newsID'].'">
							<i class="fa fa-check"></i>
						</button>
					</td>';
				} else {
						$out .='
						<td>
							<button type="button" class="btn btn-warning btn-circle od" data-target="#modalDialog" data-href="?modal=true&page=news&action=edit&newsID='.$row['newsID'].'">
								<i class="fa fa-edit"></i>
							</button>
							<button type="button" class="btn btn-danger btn-circle od" data-target="#modalDialog" data-href="?modal=true&page=news&action=inactive&newsID='.$row['newsID'].'">
								<i class="fa fa-times"></i>
							</button>
							</td>';
				}
				$out .= '</tr>';
			}
			return $out;
		}
		public function getNewsestNews($type='A'){
			return $this->getNews($this->getNewsList($type,'A','DESC',1)[0]);
		}
		public function showNewsestNews($type='A',$limit=1){
			$res = '';
			$newslist = $this->getNewsList($type,'A','DESC',$limit);
			for($i=0;$i<$limit;$i++){
				$res .= $this->showNews($newslist[$i]);
			}
			return $res;
		}
		public function getNews($id,$type='defalut'){
			$sth = $this -> pdo -> prepare("SELECT * FROM `news` WHERE newsID = '$id' LIMIT 1");
			$sth -> execute();
			$out;
			if($type=='row'){
				$out = $sth->fetch(PDO::FETCH_ASSOC);
			} else {
				$row = $sth->fetch(PDO::FETCH_ASSOC);
				$this -> id = $row['newsID'];
				$this -> date = $this->dateThai($row['date']);
				$this -> title = $row['title'];
				$this -> cover = $this->imagePath.$row['newsID'].'/cover.jpg';
				$this -> outline = $row['outline'];
				$this -> content = $row['content'];
				$out = Array('id'=>$row['newsID'],'date'=>$this -> date,'title'=>$row['title'],'cover'=>$this -> cover,'outline'=>$row['outline'],'content'=>$row['content']);
			}
			return $out;
		}
		public function showNews($id){
			$this -> getNews($id);
			if($this->id){
				$res = '
				<div class="col-md-4 col-sm-4 wow slideInLeft">
						<div class="blog-box">
								<div class="blog-top-desc">
										<div class="blog-date">'.
												$this -> date
				.'	 </div>
										<a href="?page=news&newsID='.$this -> id.'"><h4>'.$this -> title.'</h4></a>
								</div>
								<img src="images/32blank.png" style="background-image:url(\''.$this->cover.'\');" alt="" class="newscover">
								<div class="blog-btm-desc">
										<p>'.$this -> outline.'</p>
										<a href="?page=news&newsID='.$this -> id.'" class="readmore">อ่านต่อ <i class="fa fa-long-arrow-right"></i></a>
								</div>
						</div>
				</div>';
			} else {
				$res = '';
			}
			return $res;
		}
		public function count($type='A'){
			switch ($type) {
				case 'D':
				case 'U':
				case 'E':
					$qType = " WHERE `type` = '$type'";
					break;
				case 'A':
				default:
					$qType = '';
					break;
			}
			$sth = $this -> pdo -> prepare("SELECT COUNT(*) AS 'count' FROM `news`$qType");
			$sth -> execute();
			$row = $sth->fetch(PDO::FETCH_ASSOC);
			return $row['count'];
		}
		public function save($id){

		}
		public function add($title,$type,$status,$outline,$content){
			$sth = $this -> pdo -> prepare("INSERT INTO `news` (`type`, `status`, `title`, `outline`, `content`) VALUES ('$type','$status','$title','$outline','$content')");
			$sth -> execute();
			$row = $sth->fetch(PDO::FETCH_ASSOC);
			return $this -> pdo ->lastInsertId();
		}
		public function edit($id,$title,$type,$status,$outline,$content,$datetime){
			$udatetime;
			if(!empty($datetime)){
				$udatetime = ", `date`='$datetime'";
			}
			$sth = $this -> pdo -> prepare("UPDATE `news` SET `type`='$type', `status`='$status', `title`='$title', `outline`='$outline', `content`='$content'$udatetime WHERE `newsID` = '$id';");
		}
		public function inactive($id){
			$sth = $this -> pdo -> prepare("UPDATE `news` SET `status` = 'I' WHERE `newsID` = '$id';");
			return $sth -> execute();
		}
		public function active($id){
			$sth = $this -> pdo -> prepare("UPDATE `news` SET `status` = 'A' WHERE `newsID` = '$id';");
			return $sth -> execute();
		}
		private function dateThai($strDate){
			$strYear = date("Y",strtotime($strDate))+543;
			$strMonth= date("n",strtotime($strDate));
			$strDay= date("j",strtotime($strDate));
			$strHour= date("H",strtotime($strDate));
			$strMinute= date("i",strtotime($strDate));
			$strSeconds= date("s",strtotime($strDate));
			$strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
			$strMonthThai=$strMonthCut[$strMonth];
			return "$strDay $strMonthThai $strYear, $strHour:$strMinute";
		}

	}
?>
