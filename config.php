<?php
$_CONFIG = array(
  'pages'           => 'pages/',  //Folder contain "pages" contents
  'pagesType'       => '.php',    //Extention of file in pages folder to include
  'majorPath'       => 'majors/', //Folder contain "major" contents (sub in pages)
  'email'           => 'scitech.utcc@gmail.com', //E-Mail to recieve contact form
//กำหนดอีเมล์ที่ใช้ในการส่งฟอร์ม
  'sender'          => 'sender.scitech@gmail.com',
  'senderPwd'       => '30hAm7OS',
  'senderHost'      => 'ssl://smtp.gmail.com',
  'senderPort'      => '465',
/**************กรุณาอัพเดทลิ้งให้เป็นปัจจุบันเสมอ****************/
  'admissionLink'   => 'http://reg3.utcc.ac.th/registrar/appbioentryconfigregis.asp',//URL of current main Admission pages
  'scholarship'     => 'http://www.utcc.ac.th/admission/2016/scholarship/scholarship/index.php',//URL of current Scholarship pages
  'dorms'           => 'http://www.utcc.ac.th/download/apartment_2016.pdf',//URL of current Dorm file
  'aes'             => 'http://science.utcc.ac.th/aes/login.php'//URL of AES (ระบบประเมินอาจารย์ที่ปรึกษา)
);
//กำหนด Username และ Password สำหรับระบบหลังบ้าน
$_ADMIN = array(
  array('username','password'),//ตัวอย่างการกำหนดค่า (ระบบจะไม่อ่านค่าจากบรรทัดนี้)
  array('admin','123456'),
  array('admin2','1234')
);
class Dbconfig {
    protected $serverName;
    protected $userName;
    protected $passCode;
    protected $dbName;
    function __construct() {
        $this -> serverName = 'localhost';
        $this -> userName = 'science';
        $this -> passCode = 'pass';
        $this -> dbName = 'science';
    }
}
  $page = @$_REQUEST['page']!=""?$_REQUEST['page']:'index';
  if(!file_exists($_CONFIG['pages'].$page.$_CONFIG['pagesType'])) $page = '404';
  $filePage = $_CONFIG['pages'].$page.$_CONFIG['pagesType'];
?>
