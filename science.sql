-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2016 at 12:53 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `science`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `courseID` int(11) NOT NULL,
  `degree` enum('B','M','D','O') COLLATE utf8_bin NOT NULL COMMENT 'B=Bachelor, M=Master, D=Doctorial, O=Other',
  `courseName` varchar(100) COLLATE utf8_bin NOT NULL,
  `status` enum('A','P','C') COLLATE utf8_bin NOT NULL COMMENT 'A=Active, P=Pre-Close, C=Closed'
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`courseID`, `degree`, `courseName`, `status`) VALUES
(1, 'B', 'คอมพิวเตอร์แอนิเมชั่น', 'A'),
(2, 'B', 'วิทยาการคอมพิวเตอร์', 'A'),
(3, 'B', 'วิศวกรรมการเงิน', 'A'),
(4, 'B', 'วิทยาศาสตร์และเทคโนโลยีการอาหาร', 'A'),
(5, 'B', 'เทคโนโลยีสารสนเทศและการสื่อสาร', 'A'),
(6, 'B', 'เทคโนโลยีเว็บและโมไบล์', 'P'),
(7, 'B', 'การจัดการธุรกิจอาหาร', 'A'),
(8, 'M', 'คณิตศาสตร์และเทคโนโลยีสารสนเทศ', 'A'),
(9, 'M', 'การจัดการเทคโนโลยีสารสนเทศและการสื่อสาร', 'A'),
(10, 'M', 'วิศวกรรมการเงิน', 'A'),
(11, 'O', 'พื้นฐานและบริการ', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

CREATE TABLE IF NOT EXISTS `instructor` (
  `instructorID` int(11) NOT NULL,
  `post` varchar(50) COLLATE utf8_bin NOT NULL,
  `firstname` varchar(50) COLLATE utf8_bin NOT NULL,
  `lastname` varchar(50) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `courseID` int(11) NOT NULL,
  `website` varchar(250) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `instructor`
--

INSERT INTO `instructor` (`instructorID`, `post`, `firstname`, `lastname`, `email`, `courseID`, `website`) VALUES
(1, 'อาจารย์ ดร.', 'ยอดธง', 'รอดแก้ว', 'yodthong_rod@utcc.ac.th', 1, '-'),
(2, 'ผู้ช่วยศาสตราจารย์', 'วรัตมา', 'เกษรสิทธิ์', 'warattama@hotmail.com', 1, '-'),
(3, 'อาจารย์', 'ศรันยา', 'มะระพฤกษ์วรรณ', 'scitech.utcc@gmail.com', 1, '-'),
(4, 'ผู้ช่วยศาสตราจารย์', 'อรรถวิท', 'กปิลกาญจน์', 'attawit_kap@utcc.ac.th', 1, ''),
(5, 'อาจารย์ ดร.', 'จักรินทร์', 'สิงห์หนู', 'jakkarin_sin@utcc.ac.th', 1, ''),
(6, 'ผู้ช่วยศาสตราจารย์', 'เกศศิริ', 'เหล่าวชิระสุวรรณ', 'katsiri_lao@utcc.ac.th', 11, ''),
(7, 'อาจารย์', 'เฉลิมพงค์', 'คำวงค์ษา', 'chalermpong_kum@utcc.ac.th', 11, ''),
(8, 'ผู้ช่วยศาสตราจารย์ ดร.', 'เหมือนหมาย', 'อภินทนาพงศ์', 'mmeang@gmail.com', 11, ''),
(9, 'อาจารย์', 'จตุภัทร', 'ขจัดภัย', 'jatupat_kaj@utcc.ac.th', 11, ''),
(10, 'ผู้ช่วยศาสตราจารย์', 'ทวีศักดิ์', 'พงษ์ปัญญา', 'taveesak_pho@utcc.ac.th', 11, ''),
(11, 'อาจารย์', 'ทิวา', 'เพ็ญสุข', 'tiwa_pen@utcc.ac.th', 11, ''),
(12, 'อาจารย์', 'ธนวรรษ์', 'เสริมพาณิชย์', 'thanawat_ser@utcc.ac.th', 11, ''),
(13, 'อาจารย์', 'ธีรวุฒิ', 'หวังอำนวยพร', 'theerawut_wan@utcc.ac.th', 11, ''),
(14, 'อาจารย์', 'นิศานาถ', 'ขันธวิสูตร', 'nisanath_kha@utcc.ac.th', 11, ''),
(15, 'ผู้ช่วยศาสตราจารย์', 'บุญหญิง', 'สมร่าง', 'boonying_som@utcc.ac.th', 11, ''),
(16, 'อาจารย์', 'ประยง', 'มหากิตติคุณ', 'prayong_mah@utcc.ac.th', 11, ''),
(17, 'อาจารย์', 'ปัทมพร', 'ราชภักดี', 'pattamaporn_rat@utcc.ac.th', 11, ''),
(18, 'ผู้ช่วยศาสตราจารย์', 'พรชัย', 'เหลืองบริสุทธิ์', 'pornchai_lua@utcc.ac.th', 11, ''),
(19, 'ผู้ช่วยศาสตราจารย์ ดร.', 'พิชญอร', 'ไหมสุทธิสกุล', 'pitchaon_mai@utcc.ac.th', 11, ''),
(20, 'ผู้ช่วยศาสตราจารย์', 'ภัชรี', 'สิทธิกิจโยธิน', 'patcharee_sit@utcc.ac.th', 11, ''),
(21, 'ผู้ช่วยศาสตราจารย์', 'ลักขณา', 'เศาธยะนันท์', 'luckhana_sao@utcc.ac.th', 11, ''),
(22, 'อาจารย์', 'วิรัช', 'ตฤณขจี', 'virach_tin@utcc.ac.th', 11, ''),
(23, 'อาจารย์ ดร.', 'อิทธิพงษ์', 'เขมะเพชร', 'ittipong_khe@utcc.ac.th', 11, ''),
(24, 'อาจารย์ ดร.', 'วัศวี', 'แสนศรีมหาชัย', 'watsawee@yahoo.com', 11, ''),
(25, 'อาจารย์', 'สุนันทา', 'คชสาร', 'sununta_kot@utcc.ac.th', 11, ''),
(26, 'อาจารย์', 'สุวโรจน์', 'อัครวุฒิพรภัทร์', 'suwaroj_wut@utcc', 11, ''),
(27, 'อาจารย์', 'ลักขณา', 'คิดบรรจง', 'lakkana_kid@utcc.ac.th', 2, ''),
(28, 'ผู้ช่วยศาสตราจารย์ ดร.', 'วรลักษณ์ วงศ์โดยหวัง', 'ศิริเจริญ', 'waralak_von@utcc.ac.th', 2, ''),
(29, 'ผู้ช่วยศาสตราจารย์', 'สิริธร', 'เจริญรัตน์', 'sirithorn_jal@utcc.ac.th', 2, ''),
(30, 'ผู้ช่วยศาสตราจารย์', 'อารีวรรณ', 'สุขวิลัย', 'areewan_suk@hotmail.com', 2, ''),
(31, 'อาจารย์ ดร.', 'มยุรี', 'ศรีกุลวงศ์', 'mayuree_sri@utcc.ac.th', 2, ''),
(32, 'อาจารย์', 'เชาวศิริ', 'อินทร์แก้ว', 'chaowasiri_ink@utcc.ac.th', 3, ''),
(33, 'อาจารย์', 'กนกพรรณ', 'แก้วเนตร', 'kanokphan_kae@utcc.ac.th', 3, ''),
(34, 'อาจารย์', 'ทิฆัมพร', 'รอดเงิน', 'tukutcc@gmail.com', 3, ''),
(35, 'อาจารย์', 'นลินี', 'เวชวิริยกุล', 'nalinee_wec@utcc.ac.th', 3, ''),
(36, 'อาจารย์', 'ภาสกร', 'เกตุชาญวิทย์', 'pasakorn_ket@utcc.ac.th', 3, ''),
(37, 'ผู้ช่วยศาสตราจารย์', 'ระวีวรรณ', 'เหล็งขยัน', 'raweewan_len@utcc.ac.th', 3, ''),
(38, 'อาจารย์ ดร.', 'วรรณี', 'ลาภจินดา', 'wannee_lap@utcc.ac.th', 3, ''),
(39, 'ผู้ช่วยศาสตราจารย์', 'วัลลภ', 'เฉลิมสุวิวัฒนาการ', 'wallop_cha@utcc.ac.th', 3, ''),
(40, 'ผู้ช่วยศาสตราจารย์', 'สุชีพ', 'งามเจริญ', 'sucheep_nga@utcc.ac.th', 3, ''),
(41, 'ผู้ช่วยศาสตราจารย์', 'กมลทิพย์', 'เอกธรรมสุทธิ์', 'kamontip_ekt@utcc.ac.th', 4, ''),
(42, 'อาจารย์ ดร.', 'ทัศนีย์', 'วัฒนชัยยงค์', 'tasanee_wat@utcc.ac.th', 4, ''),
(43, 'ผู้ช่วยศาสตราจารย์', 'สิรินาถ', 'ตัณฑเกษม', 'sirinard_tan@utcc.ac.th', 4, ''),
(44, 'ผู้ช่วยศาสตราจารย์', 'สุภางค์', 'เรืองฉาย', 'supang_rua@utcc.ac.th', 4, ''),
(45, 'รองศาสตราจารย์', 'อดิศักดิ์', 'เอกโสวรรณ', 'adisak_ake@utcc.ac.th', 4, ''),
(46, 'ผู้ช่วยศาสตราจารย์', 'อภิญญา', 'เจริญกูล', 'apinya_cha@utcc.ac.th', 4, ''),
(47, 'ผู้ช่วยศาสตราจารย์', 'อัญชัน', 'ชุณหะหิรัณย์', 'anchan_cho@utcc.ac.th', 4, ''),
(48, 'ผู้ช่วยศาสตราจารย์', 'อุษามาส', 'จริยวรานุกุล', 'usamas_jar@utcc.ac.th', 4, ''),
(49, 'ผู้ช่วยศาสตราจารย์', 'เอกรินทร์', 'วรุตบางกูร', 'realekarin@hotmail.com', 5, ''),
(50, 'อาจารย์', 'คัดเค้า', 'สันธนะสุข', 'kadkao_san@utcc.ac.th', 5, ''),
(51, 'ผู้ช่วยศาสตราจารย์', 'ชฎารัตน์', 'พิพัฒนนันท์', 'chadarat_phi@utcc.ac.th', 5, ''),
(52, 'อาจารย์', 'วรวิทย์', 'จิตรงค์', 'vorawit_jit@utcc.ac.th', 5, ''),
(53, 'อาจารย์ ดร.', 'ปิยะวรรณ', 'เกษมศุภกร', 'piyawan_kas@utcc.ac.th', 5, ''),
(54, 'ผู้ช่วยศาสตราจารย์', 'ไขแข', 'จุลชาต', 'khaikhae_chu@utcc.ac.th', 6, ''),
(55, 'ผู้ช่วยศาสตราจารย์', 'สุณี', 'ทวีสกุลวัชระ', 'sunee_tha@utcc.ac.th', 6, ''),
(56, 'ผู้ช่วยศาสตราจารย์ ดร.', 'เสาวนีย์', 'เอี้ยวสกุลรัตน์', 'souwanee_ieo@utcc.ac.th', 7, ''),
(57, 'ผู้ช่วยศาสตราจารย์', 'ผาณิต', 'รุจิรพิสิฐ', 'panid_ruj@utcc.ac.th', 7, ''),
(58, 'ผู้ช่วยศาสตราจารย์', 'รัชนี', 'ไสยประจง', 'ratchanee_sai@utcc.ac.th', 7, ''),
(59, 'ผู้ช่วยศาสตราจารย์', 'วิชชุดา', 'สังข์แก้ว', 'witchuda_san@utcc.ac.th', 7, ''),
(60, 'ผู้ช่วยศาสตราจารย์', 'สุรพงษ์', 'พินิจกลาง', 'surapong_pin@utcc.ac.th', 7, ''),
(61, 'อาจารย์', 'ไอศุริย', 'สุดประเสริฐ', 'aisuriya@gmail.com', 8, ''),
(62, 'รองศาสตราจารย์', 'ดวงพร', 'หัชชะวณิช', 'doungporn_hat@utcc.ac.th', 8, ''),
(63, 'รองศาสตราจารย์ ดร.', 'นิตติยา', 'ปภาพจน์', 'nittiya_pab@utcc.ac.th', 8, ''),
(64, 'อาจารย์ ดร.', 'มานะชัย', 'โต๊ะชูดี', 'manachai_toa@utcc.ac.th', 8, ''),
(65, 'อาจารย์ ดร.', 'อวภาส์', 'ฉันทศาสตร์รัศมี', 'avapa_cha@utcc.ac.th', 8, ''),
(66, 'ผู้ช่วยศาสตราจารย์', 'นภาพร', 'อุทยานวุฒิกุล', 'napaporn_uta@utcc.ac.th', 9, ''),
(67, 'ผู้ช่วยศาสตราจารย์ ดร.', 'น้ำฝน', 'อัศวเมฆิน', 'namfon_ass@utcc.ac.th', 9, ''),
(68, 'ผู้ช่วยศาสตราจารย์ ดร.', 'ภาณุชาติ', 'บุณยเกียรติ', 'panuchart_bun@utcc.ac.th', 9, ''),
(69, 'อาจารย์ ดร.', 'ศศิพันธ์', 'นิตยะประภา', 'sasiphan_nit@utcc.ac.th', 9, ''),
(70, 'อาจารย์ ดร.', 'สิรินดา', 'พละหาญ', 'sirinda_pal@utcc.ac.th', 9, ''),
(71, 'รองศาสตราจารย์ ดร.', 'ภูมิฐาน', 'รังคกูลนุวัฒน์', 'scitech.utcc@gmail.com', 10, ''),
(72, 'ผู้ช่วยศาสตราจารย์ ดร.', 'วีระชาติ', 'กิเลนทอง', 'scitech.utcc@gmail.com', 10, ''),
(73, 'อาจารย์ ดร.', 'นงนภัส', 'แก้วพลอย', 'scitech.utcc@gmail.com', 10, ''),
(74, 'ผู้ช่วยศาสตราจารย์', 'ยุพิน', 'กาญจนะศักดิ์ดา', 'yupin_kan@utcc.ac.th', 10, ''),
(75, 'ผู้ช่วยศาสตราจารย์ ดร.', 'สมพร', 'ปั่นโภชา', 'somporn_pun@utcc.ac.th', 10, '');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `newsID` int(11) NOT NULL,
  `type` enum('D','U','E') COLLATE utf8_bin NOT NULL,
  `status` enum('A','D','I') COLLATE utf8_bin NOT NULL DEFAULT 'D',
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `title` varchar(100) COLLATE utf8_bin NOT NULL,
  `outline` text COLLATE utf8_bin NOT NULL,
  `content` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`newsID`, `type`, `status`, `date`, `title`, `outline`, `content`) VALUES
(1, 'U', 'A', '2016-06-24 05:24:15', 'ม.หอการค้าไทย รับเสด็จสมเด็จพระเทพรัตนราชสุดาฯ สยามบรมราชกุมารี', '“หยกใสร่ายคำในวงวรรณ ลิลิตพระลอและพระราชนิพนธ์แปล ทีทรรศน์ภาษา วรรณกรรม และวัฒนธรรม” เฉลิมพระเกียรติสมเด็จพระเทพรัตนราชสุดาฯ สยามบรมราชกุมารี ในโอกาส ฉลองพระชนมายุ 5 รอบ', '21 มิถุนายน 2559  เวลา 14.00 น.  สมเด็จพระเทพรัตนราชสุดาฯ สยามบรมราชกุมารี เสด็จพระราชดำเนิน ไปยังมหาวิทยาลัยหอการค้าไทย เขตดินแดง กรุงเทพมหานคร ทรงเปิดการประชุมวิชาการ เรื่อง “หยกใสร่ายคำในวงวรรณ ลิลิตพระลอและพระราชนิพนธ์แปล ทีทรรศน์ภาษา วรรณกรรม และวัฒนธรรม” เฉลิมพระเกียรติสมเด็จพระเทพรัตนราชสุดาฯ สยามบรมราชกุมารี ในโอกาส ฉลองพระชนมายุ 5 รอบ 2 เมษายน 2558 จัดโดยคณะมนุษยศาสตร์และประยุกต์ศิลป์ มหาวิทยาลัยหอการค้าไทย ภาควิชาภาษาจีน คณะศิลปศาสตร์ มหาวิทยาลัยธรรมศาสตร์ และ คณะศิลปศาสตร์ มหาวิทยาลัยมหิดล\n\nการประชุมครั้งนี้จัดขึ้นมีจุดประสงค์เพื่อนำเสนอหน้าประวัติศาสตร์สำคัญของการแปลวรรณคดี ไทยสู่ประชาคมโลก ในปี 2554 ศาสตราจารย์ เผย เสี่ยวรุ่ย แปลลิลิตพระลอ วรรณคดีเอก ของไทยเป็นกวีนิพนธ์จีน ซึ่งนับเป็นครั้งแรกที่มีการแปลวรรณคดีไทยสู่พากย์จีน ลิลิตพระลอเป็น งานประพันธ์สมัยอยุธยาตอนต้น แต่งด้วยลิลิต ซึ่งประกอบด้วยฉันทลักษณ์โคลงและร่าย มีคำโบราณ และมีวรณศิลป์ที่ยากแก่การแปล ศาสตราจารย์เผย เสี่ยวรุ่ยใช้เวลา 4 ปี ในการ แปลด้วยความประณีตบรรจง สามารถถ่ายทอดเนื้อหาสาระที่เข้มข้นของลิลิตพระลอให้ได้อรรถรส ตามขนบวรรณศิลป์จีนได้อย่างแนบเนียน เผยแพร่คุณค่าทางสุนทรียปัญญาของวรรณคดีไทย แก่ประชาคมชาวจีน\n\nในโอกาสนี้ สมเด็จพระเทพรัตนราชสุดาฯ สยามบรมราชกุมารีทรงฟังการบรรยายพิเศษ หัวข้อ ”การถ่ายทอดลิลิตพระลอเป็นกวีนิพนธ์จีน”ศาสตราจารย์เผย เสี่ยวรุ่ย ผู้บรรยายเป็นพระอาจารย์ ในสมเด็จพระเทพรัตนราชสุดาฯ สยามบรมราชกุมารี ได้รับรางวัลนักแปลดีเด่น รางวัล “สุรินทราชา” ของสมาคมนักแปลและล่ามแห่งประเทศไทย ประจำปี 2555 ปัจจุบันเป็น ศาสตราจารย์สอนภาษาไทย ณ มหาวิทยาลัยปักกิ่ง สาธารณรัฐประชาชนจีน\n\nการประชุมวิชาการครั้งนี้ คณะมนุษยศาสตร์และประยุกต์ศิลป์ มหาวิทยาลัยหอการค้าไทย มีความซาบซึ้งในพระกรุณาธิคุณเป็นล้นพ้น ซึ่งงานประชุมวิชาการนี้จัดระหว่างวันที่ 21-22 มิถุนายน นี้ ที่มหาวิทยาลัยหอการค้าไทย'),
(2, 'E', 'A', '2016-06-24 16:20:37', 'ลูกแม่ไทร...จิตใจงาม', 'การปฐมนิเทศนักศึกษาชั้นปีที่ 1 ประจำปีการศึกษา 2559 เพื่อปฐมนิเทศและต้อนรับนักศึกษาชั้นปีที่ 1', 'มหาวิทยาลัยหอการค้าไทย กำหนดจัดโครงการค่าย "ลูกแม่ไทร...จิตใจงาม" เพื่อปฐมนิเทศและต้อนรับนักศึกษาชั้นปีที่ 1\r\nประจำปีการศึกษา 2559 ในวันที่ 2 - 3, 4 - 5, 8 - 9 สิงหาคม 2559 (ค่าย 2 วัน 1 คืน) และค่าย “คุณธรรมจริยธรรม”\r\nในวันที่ 1 สิงหาคม 2559 (จำนวน 2 รอบ คือ รอบเช้า, รอบบ่าย) ณ มหาวิทยาลัยหอการค้าไทย โดยมีวัตถุประสงค์ ดังนี้\r\n\r\nเพื่อให้นักศึกษาใหม่มีแนวทางการปรับตัวให้เข้ากับชีวิตการเรียนและสิ่งแวดล้อมภายในมหาวิทยาลัย\r\nเพื่อเป็นการต้อนรับน้องใหม่ของมหาวิทยาลัย และสร้างมนุษยสัมพันธ์ให้เกิดขึ้นในกลุ่มนักศึกษาระหว่างรุ่นพี่–รุ่นน้อง\r\nภายใต้การดูแลของคณาจารย์อย่างใกล้ชิด\r\nเพื่อปลูกฝังทัศนคติที่ดีและสร้างความรักความผูกพันต่อมหาวิทยาลัย\r\nการเข้าร่วมโครงการค่าย "ลูกแม่ไทร...จิตใจงาม" เป็นส่วนหนึ่งของการเข้าศึกษาในมหาวิทยาลัยหอการค้าไทย โดยฝ่ายกิจการนักศึกษา\r\nแบ่งการเข้าค่ายเป็น 2 ประเภท คือ\r\n\r\nประเภทที่ 1  การปฐมนิเทศนักศึกษาใหม่ ค่าย "ลูกแม่ไทร..จิตใจงาม" ประจำปีการศึกษา 2559\r\nประเภทที่ 1  (2 วัน 1 คืน) โดยจัดการเข้าค่ายระหว่างวันที่ 2 - 9 สิงหาคม 2559\r\nประเภทที่ 2  ค่าย "คุณธรรมจริยธรรม" วันที่ 1 สิงหาคม 2559 (เสื้อสีขาว + กางเกงขายาว)\r\n\r\nการเข้าร่วมโครงการปฐมนิเทศนักศึกษาชั้นปีที่ 1 เป็นส่วนหนึ่งของการศึกษาในมหาวิทยาลัยหอการค้าไทย\r\nและเป็นกิจกรรมบังคับตามโครงการบัณฑิตอุดมคติของมหาวิทยาลัย\r\nดังนั้น นักศึกษาทุกคนจะต้องเข้าร่วมโครงการ\r\n1) ค่าย "ลูกแม่ไทร..จิตใจงาม" ประจำปีการศึกษา 2559 และ 2) ค่าย "คุณธรรมจริยธรรม" ประจำปีการศึกษา 2559\r\nโดยรายงานตัวตามวันและเวลาที่มหาวิทยาลัยกำหนด'),
(3, 'D', 'A', '2016-06-24 16:25:26', 'ประชาสัมพันธ์โครงการดี ๆ สำหรับเยาวชน', 'เคยไหมที่อยากให้โปรแกรมคอมพิวเตอร์ ทำนู่นนี่นั่น แต่ก็ไม่ได้ดั่งใจ เรามาสร้างโปรแกรมคอมพิวเตอร์ด้วยตัวเองเลยดีกว่า...', 'เคยไหมที่อยากให้โปรแกรมคอมพิวเตอร์ ทำนู่นนี่นั่น แต่ก็ไม่ได้ดั่งใจ เรามาสร้างโปรแกรมคอมพิวเตอร์ด้วยตัวเองเลยดีกว่า...\r\n\r\nจะเป็นอย่างไรถ้าเราสามารถเขียนโปรแกรมได้ด้วยตัวเอง? ถ้าเราเขียนเกมได้เองมันจะสนุกขนาดไหน? พบคำตอบของคำถามเหล่านี้ได้กับ Course Programming ของ Saturday School!! Course สอนเขียน Basic Python (ภาษาหนึ่งที่คอมเข้าใจ :)) สำหรับเด็กอายุ 12-15 ปี โดยที่น้องๆไม่จำเป็นต้องมีพื้นฐานใด ๆ\r\n\r\nเรียน 3 ชั่วโมงทุกเสาร์หรืออาทิตย์ ตั้งแต่ วันที่ 2 กรกฎาคม 2559 ถึง วันที่ 25 กันยายน 2559 (ระยะเวลา 3 เดือน) \r\n\r\nเลือกเวลาได้ดังต่อไปนี้\r\n\r\nวันเสาร์\r\nสถานที่สอน หอสมุดกลาง จุฬาลงกรณ์มหาวิทยาลัย\r\n09.00-12.00 หรือ 13.00-16.00\r\n(รอบละ 30 คนค่ะ)\r\n\r\nวันอาทิตย์\r\nวิทยาลัยเทคโนโลยีอรรถวิทย์พณิชยการ เขตบางนา\r\n09.00-12.00 หรือ 13.00-16.00\r\n(รอบละ 20 คนค่ะ)\r\n\r\nคุณพ่อคุณแม่ที่สนใจ สามารถที่จะสมัครได้เลยนะคะผ่าน link นี้ ---> http://bit.ly/ssprogramming1kid\r\n\r\nการชำระเงินสามารถที่จะเลือกได้ดังต่อไปนี้ค่ะ \r\n1. แบ่งชำระ 3 เดือน เดือนละ 3,700 บาท\r\n2. ชำระงวดเดียว เฉลี่ยเดือนละ 3,300 บาท\r\n\r\nรายละเอียดเพิ่มเติมของคอร์สการเรียนในแต่ละสัปดาห์คลิกดูได้ที่ https://goo.gl/tUWyyA นะคะ หรือสอบถามข้อมูลเพิ่มผ่าน Facebook message ได้เลยค่ะ\r\n\r\nหวังว่าจะได้เจอทุกคนในคลาสนะคะ'),
(4, 'E', 'A', '2016-09-08 23:49:35', 'พิธีประสาทปริญญาบัตร ประจำปีการศึกษา 2558', 'พิธีประสาทปริญญาบัตร ประจำปีการศึกษา 2558', '<p style="text-align:center"><span style="color:rgb(0, 0, 128)"><strong>&lt;&lt;</strong></span>&nbsp;<a href="http://utcc2.utcc.ac.th/localuser/cong" target="_blank"><span style="color:rgb(178, 34, 34)"><strong><span style="font-size:14px">กำหนดการเข้ารับปริญญาบัตร</span></strong></span></a>&nbsp;<span style="color:rgb(0, 0, 128)"><strong>&gt;&gt;</strong></span></p>'),
(5, 'U', 'A', '2016-09-08 23:54:39', 'ม.หอการค้าไทย เซ็นสัญญาร่วมกับ อาลีบาบา ยักษ์ใหญ่อีคอมเมิร์ซ', 'หวังสร้าง หลักสูตร E-Commerce ระหว่างสองประเทศ', '<div align="center"><img src="http://www.utcc.ac.th/userfiles/002/0005995_2.jpeg" alt=""></div><br><div align="center"><img src="http://www.utcc.ac.th/userfiles/002/0005995_3.jpeg" alt=""></div><br><p><span style="background-color:rgb(255, 255, 255); color:rgb(29, 33, 41); font-family:helvetica,arial,sans-serif; font-size:16px">มหาวิทยาลัยหอการค้าไทย จัดพิธีลงนามความร่วมมือ กับ&nbsp;</span><a href="http://l.facebook.com/l.php?u=http%3A%2F%2FAlibaba.com%2F&amp;h=-AQH0PT3XAQEjIjvDXSP61uv080YCHmePR7XPz0RqFLAlbw&amp;enc=AZOv0c3BAyuohoeEeCQ0GzuEbxlVNgN8sEp61EizsJNHqiJSy58Ex3frLRECttG1tzy24MTWpBilGXBnwyQCEqvoKuO82CVhvnxMUiXSADOSEAVfTDSKpgxieTdLtS0Q1mtnxTLBFUWw4JF10XfmfzSWQKCBRVlhn2s0knb9bdbFSF2YkXf42gl6Y_5z7qdMRRA&amp;s=1" target="_blank">Alibaba.com</a><span style="background-color:rgb(255, 255, 255); color:rgb(29, 33, 41); font-family:helvetica,arial,sans-serif; font-size:16px">เพื่อจับมือกันสร้างหลักสูตร E-commerce ระหว่างประเทศ ซึ่งประกอบไปด้วย 2 ส่วนสำคัญ คือ 1 การฝึกอบรม โดยทาง&nbsp;</span><a href="http://l.facebook.com/l.php?u=http%3A%2F%2FAlibaba.com%2F&amp;h=cAQHJATsxAQHgwcXRiQkkyvbQt9EIxTD3__gHHzsqTUqtKA&amp;enc=AZMoNrcGfQ__lMBjMqk8sBWg71l5g0lavIclmUH1ar-wVe9aBTtCgkHh74wOuBZMNSRmIabRV2Iph93GEleU3NHMzNocmIorxaCUrDI0VhK0Kdq9rq1tzn9b-rPJZhY0rIdEgwyegCnUK4nZEhQU54qa2pIBJNVH5bgOH9q2apIOhjukOGrDHyGGLgZscGkFrxU&amp;s=1" target="_blank">Alibaba.com</a><span style="background-color:rgb(255, 255, 255); color:rgb(29, 33, 41); font-family:helvetica,arial,sans-serif; font-size:16px">&nbsp;จะส่งผู้เชี่ยวชาญมาอบรมให้กับคณาจารย์และนักศึกษาของมหาวิทยาลัยหอการค้าไทยโดยตรง พร้อมทั้งร่วมกันพัฒนาหลักสูตรต่างๆ ให้อยู่ในเนื้อหาวิชาที่จัดสอนอยู่ในปัจจุบัน และ 2 การจัดศึกษาดูงานที่</span><a href="http://l.facebook.com/l.php?u=http%3A%2F%2FAlibaba.com%2F&amp;h=FAQHEvjgKAQGJM5zvnc8fgPB_oxMJ6dns4ShJDa80C4oHaw&amp;enc=AZMN6ktbRD3kOao8OVDj52UXMvt3QLge8l8Cb0ypmI5fdO_cHHkUAHub1cw2KTxXljq2Y5HwkaBe_r2GtZ8FU2QgaOtISa-SMp4CWw06pPvifLHbhvufZqJMDViMYTuUQa92rIMxWXBBnWLaQfEiRYN1AemAd3J_gkVVm-LT4qhETAiRBpyL_caNhzZvnzX1iK8&amp;s=1" target="_blank">Alibaba.com</a><span style="background-color:rgb(255, 255, 255); color:rgb(29, 33, 41); font-family:helvetica,arial,sans-serif; font-size:16px">&nbsp;ณ หางโจว ประเทศสาธารณรัฐประชาชนจีนโดยตรง ภายในงานมี รศ.ดร.เสาวณีย์ ไทยรุ่งโรจน์ อธิการบดีมหาวิทยาลัยหอการค้าไทย ลงร่วมในสัญญาความร่วมมือกับ Mr.Jerry Wu Country Manager for</span><a href="http://alibaba.com/" target="_blank">Alibaba.com</a><span style="background-color:rgb(255, 255, 255); color:rgb(29, 33, 41); font-family:helvetica,arial,sans-serif; font-size:16px">&nbsp;Thailand โดยมี ผศ.ดร.ธนวรรธน์ พลวิชัย รองอธิการบดีอาวุโสวิชาการและงานวิจัย นายปรเมศ ส่งแสงเติม รองอธิการบดีฝ่ายเทคโนโลยีสารสนเทศ ร่วมลงนาม โดยมีคณะผู้บริหารมหาวิทยาลัยฯ และหอการค้าไทย ร่วมในพิธี ณ ห้องประชุมสภามหาวิทยาลัยหอการค้าไทย เมื่อวันที่ 17 สิงหาคม 2559</span></p>\r\n\r\n<p><strong><span style="color:#0000FF"><span style="font-size:16px">Press Release</span></span></strong></p>\r\n\r\n<p><span style="font-size:16px">มหาวิทยาลัยหอการค้าไทย สถาบันการศึกษาชั้นนำด้านธุรกิจของประเทศกำลังมุ่งสู่ระดับเอเชีย ด้วยจุดแข็งคือการสร้างผู้ประกอบการที่ขับเคลื่อนด้วยนวัตกรรม (Innovation Driven Entrepreneurship) มีการสอนวิชาใหม่การประกอบการเชิงนวัตกรรม (Innovative Entrepreneurship) แก่นักศึกษาทุกคณะ เน้นการเรียนการสอนผ่านระบบ Digital Hybrid Learning System รวมทั้งมีโครงการ EGG Project ที่เปิดโอกาสให้นักศึกษาทำธุรกิจจริงพร้อมกับก้าวเข้าสู่ยุคเศรษฐกิจและสังคมดิจิทัล (<em>Digital Economy) และ</em><em>ไทยแลนด์ 4.0 </em></span></p>\r\n\r\n<p><span style="font-size:16px"><em>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ล่าสุด</em>เว็บไซต์อาลีบาบา ผู้ให้บริการเว็บไซต์ซื้อขายสินค้าออนไลน์รายใหญ่ที่สุดของจีน ซึ่งปีนี้ได้<strong>ประกาศซื้อกิจการ </strong><strong>“ลาซาดา” (Lazada) ในเครือบริษัทร็อคเก็ตอินเทอร์เน็ต (Rocket Internet) สัญชาติเยอรมนี เพื่อขยายตลาดมาสู่อาเซียน </strong>ภายใต้การบริหารของมหาเศรษฐีแจ็ค หม่า (Jack Ma) ร่วมมือกับ</span></p>\r\n\r\n<p><span style="font-size:16px">มหาวิทยาลัยหอการค้าไทย ลงนามความร่วมมือสร้างหลักสูตรอีคอมเมิร์ซระหว่างประเทศ ซึ่งถือเป็นพาร์ทเนอร์แห่งแรกในประเทศไทย โดย รองศาสตราจารย์ ดร.เสาวณีย์ ไทยรุ่งโรจน์&nbsp; อธิการบดีมหาวิทยาลัยหอการค้าไทย&nbsp;พร้อมผู้ช่วยศาสตราจารย์ ดร.ธนวรรธน์ พลวิชัย&nbsp;รองอธิการบดีอาวุโสวิชาการและงานวิจัย และ Mr.Jerry Wu&nbsp; (Country Manager for Alibaba.com Thailand&nbsp;) เพื่อสร้างหลักสูตรประกาศนียบัตรอีคอมเมิร์ซแก่ผู้ประกอบการไทยและนักศึกษามหาวิทยาลัยหอการค้าไทย มุ่งสร้างเด็กหัวการค้ายุค 4.0 และร่วมจัด Exclusive Dream Trip เป็นครั้งแรกกับการเดินทางไปฝึกอบรมอีคอมเมิร์ซครบวงจรที่สำนักงานใหญ่ Alibaba.com หางโจว สาธารณรัฐประชาชนจีน</span></p>\r\n\r\n<p><span style="font-size:16px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>รองศาสตราจารย์ดร.เสาวณีย์ ไทยรุ่งโรจน์ อธิการบดีมหาวิทยาลัยหอการค้าไทย</strong> เปิดเผยถึงความร่วมมือครั้งนี้ว่า จากความร่วมมือกันระหว่าง Alibaba.com กับมหาวิทยาลัยในครั้งนี้ มหาวิทยาลัยจะจัดอบรมแก่ผู้ประกอบการ SMEs ในรูปแบบหลักสูตรระยะสั้นเป็นประกาศนียบัตรจาก Alibaba ส่วนนักศึกษาของมหาวิทยาลัยหอการค้าไทยทุกคนกว่า 20,000 คนจะได้รับฝึกอบรมเช่นกัน โดยจะเป็นส่วนหนึ่งของการสอบ Exit exam ทำให้นักศึกษาของมหาวิทยาลัยหอการค้าไทยทุกคนต้องมีความรู้ด้านอีคอมเมิร์ซ โดยเฉพาะบน Alibaba Platform นอกจากนี้ จะมีการอบรม SMEs แบบ Exclusive Dream trip หรือแคมป์ฝึกอบรมที่สำนักงานใหญ่ของ Alibaba ณ หางโจว สาธารณรัฐประชาชนจีน ซึ่งจะมีโอกาสได้เรียนรู้วัฒนธรรม การซื้อขายออนไลน์ การนำเข้าส่งออก และการร่วมเป็นสมาชิกของ Alibaba.com</span></p>\r\n\r\n<p><span style="font-size:16px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; อธิการบดีมหาวิทยาลัยหอการค้าไทยกล่าวเพิ่มเติมว่า Alibaba ประเทศไทย มีความตั้งใจเดียวกันกับมหาวิทยาลัยและหอการค้าไทย ที่จะช่วยส่งเสริมความสามารถทางการแข่งขันให้กับผู้ประกอบการ SMEs ของไทย ให้ขยายธุรกิจไปยังต่างประเทศ ซึ่งทิศทางในอนาคตอีคอมเมิร์ซเป็นสิ่งที่จำเป็นที่ผู้ประกอบการทุกคนต้องรู้ และซื้อขายเป็น เพราะจะทำให้สินค้าที่ขายมีหน้าร้านอยู่ทั่วโลก โดยเฉพาะนักศึกษาของมหาวิทยาลัยหอการค้าไทย จะต้องถูกปั้นให้เป็นเด็กหัวการค้ายุค 4.0 หรือผู้ประกอบการที่ขับเคลื่อนด้วยนวัตกรรม (Innovation Driven Entrepreneurship) ซึ่งเป็นนโยบายของมหาวิทยาลัยอยู่แล้ว</span></p>\r\n\r\n<p><span style="font-size:16px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ด้าน <strong>Mr.Jerry Wu Country Manager for Alibaba.com Thailand</strong>&nbsp;เปิดเผยว่า Alibaba.com มีความมุ่งหวังที่จะช่วยส่งเสริม SMEs ไทยให้มีความรู้และความสามารในการส่งออกสินค้า คนไทยรู้จักอีคอมเมิร์ซอยู่แล้ว เพียงแต่ยังขาดความเชื่อมั่นและไว้ใจระบบว่ามีความปลอดภัย รวมถึงความรู้ในการส่งออก Alibaba.com จึงต้องการร่วมมือกับมหาวิทยาลัยหอการค้าไทยเป็นแห่งแรก เพื่อสร้างคอร์สฝึกอบรมให้ผู้ประกอบการไทยเข้าใจในการซื้อขายแบบอีคอมเมิร์ซมากขึ้น สามารถขยายธุรกิจไปขายยังต่างประเทศ และเพิ่มขีดความสามารถทางการแข่งขันให้กับผู้ประกอบการไทยในภาพรวมด้วย โดยตั้งเป้าหมายไว้ว่าจะมีผู้ประกอบการ SMEs สมัครเป็นสมาชิกเข้าไปซื้อขายใน Alibaba.com ประมาณ 5,000 ราย ทั้งนี้&nbsp; Alibaba.com เลือกพันธมิตรที่ดีอย่างมหาวิทยาลัยหอการค้าไทย เพราะเล็งเห็นว่าเป็นมหาวิทยาลัยของหอการค้าไทย ซึ่งมีเป้าหมายเดียวกันคือการพัฒนาผู้ประกอบการของไทย อีกทั้งมหาวิทยาลัยหอการค้าไทยยังเป็นหาวิทยาลัยที่มีนวัตกรรมทางความคิดและการทำธุรกิจ มีความคิดสร้างสรรค์และทำงานรวดเร็ว ชัดเจน นับว่ามีวัฒนธรรมที่เหมือนกันกับ Alibaba</span></p>\r\n\r\n<p><span style="font-size:16px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>คุณสุรพล ว่องวัฒนโรจน์</strong>&nbsp;<em><strong>รองประธาน</strong></em><strong>กรรมการ<em>หอการค้าไทย</em>ฯ</strong> กล่าวว่า ผู้ประกอบการ SMEs ไทยยังมีความรู้ความเข้าใจที่ไม่ดีพอเกี่ยวกับอีคอมเมิร์ซ ซึ่งเป็นสิ่งสำคัญในอนาคต การร่วมมือกันในวันนี้ระหว่างมหาวิทยาลัยหอการค้าไทยกับ Alibaba.com จะมีส่วนช่วยพัฒนาสมาชิกของหอการค้าไทยซึ่งมีจำนวน 80,000 คนทั่วประเทศให้ขยายธุรกิจของตนเองไปขายทั่วโลกได้ในอนาคต</span></p>\r\n\r\n<p><span style="font-size:16px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ภายใต้การลงนามความร่วมมือในครั้งนี้ จะช่วยเสริมสร้างศักยภาพด้านอีคอมเมิร์ซให้กับนักศึกษาและคณาจารย์ของมหาวิทยาลัยหอการค้าไทย รวมถึงผู้ประกอบการชาวไทยทั่วประเทศ&nbsp;พร้อมเรียนรู้และสัมผัสวัฒนธรรมด้านการค้าออนไลน์ในแบบฉบับของ Alibaba.com เทคนิคการเปิดร้านออนไลน์ให้มีรายได้เป็นล้านต่อปี ตลอดจนการแลกเปลี่ยนประสบการณ์กับ Alibaba Chinese Gold Members และที่สำคัญมีการให้คำปรึกษา 1 ต่อ 1 ในการนำสินค้าเข้าไปขายในอาลีบาบา</span></p>'),
(6, 'U', 'A', '2016-09-12 01:31:04', 'ม.หอการค้าไทย รับสมัคร ปริญญาโท MBA Online', 'เปิดรับสมัคร ตั้งแต่ วันนี้ - 31 ต.ค. 59', '<p>เปิดรับสมัครนักศึกษาใหม่ (ปริญญาโท) หลักสูตร MBA Online รุ่นที่ 19 ตั้งแต่ วันนี้ - 31 ต.ค. 59 โดยสมัครออนไลน์ได้ที่ <br><a target="_blank" rel="nofollow" href="http://mbaonline.utcc.ac.th/" title="Link: http://mbaonline.utcc.ac.th/">http://mbaonline.utcc.ac.th/</a><br>การเรียนการสอนของหลักสูตร MBA Online เป็นการเรียนการสอนโดยเรียนผ่านระบบออนไลน์ทั้งหมด ไม่ต้องมาเรียนที่มหาวิทยาลัย และต้องมาที่มหาวิทยาลัยเฉพาะตอนสอบปลายภาคของแต่ละเทอมเท่านั้น ระยะเวลาในการเรียนตลอดหลักสูตร 2 ปี โดยค่าใช้จ่ายตลอดหลักสูตรประมาณ 269,350 บาท ดูรายละเอียดเพิ่มเติมได้ที่</p><p><a target="_blank" rel="nofollow" href="https://www.facebook.com/UTCCMBAonline/">https://www.facebook.com/UTCCMBAonline/</a></p><p>หรือสอบถามเพิ่มเติมที่ 02-697-6450-1﻿</p>');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `postName` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`postName`) VALUES
('ผู้ช่วยศาสตราจารย์'),
('ผู้ช่วยศาสตราจารย์ ดร.'),
('รองศาสตราจารย์'),
('รองศาสตราจารย์ ดร.'),
('ศาสตราจารย์'),
('ศาสตราจารย์ ดร.'),
('อาจารย์'),
('อาจารย์ ดร.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`courseID`);

--
-- Indexes for table `instructor`
--
ALTER TABLE `instructor`
  ADD PRIMARY KEY (`instructorID`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`newsID`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`postName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `courseID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `instructor`
--
ALTER TABLE `instructor`
  MODIFY `instructorID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=76;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `newsID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
