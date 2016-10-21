<?php
require_once '../config.php';
require_once '../class/PHPMailerAutoload.php';
$mail = new PHPMailer();
$errorMSG = "";
$result = "";
// NAME
if (empty($_POST["name"])) {
    $errorMSG = "Name is required ";
} else {
    $name = $_POST["name"];
}

// EMAIL
if (empty($_POST["email"])) {
    $errorMSG .= "Email is required ";
} else {
    $email = $_POST["email"];
}

// SUBJECT
if (empty($_POST["subject"])) {
    $errorMSG .= "Subject is required ";
} else {
    $subject = $_POST["subject"];
}


// MESSAGE
if (empty($_POST["message"])) {
    $errorMSG .= "Message is required ";
} else {
    $message = $_POST["message"];
}
  if(@$_POST['ipaddr']||!@$_POST['ipaddr']) {
    $ipaddr = @$_POST['ipaddr']?$_POST['ipaddr']:'UNKNOW';
    $name = @$_POST['name']?$_POST['name']:NULL;
    $email = @$_POST['email']?$_POST['email']:NULL;
    $subject = @$_POST['subject']?$_POST['subject']:NULL;
    $message = @$_POST['message']?$_POST['message']:NULL;
    if($ipaddr&&$name&&$email&&$subject&&$message){
      /*$headers = "Content-type:text/html;charset=UTF-8" . "\r\n";
      $headers.= 'From: <no-reply@science.utcc.ac.th>' . "\r\n";
      $headers.= 'Reply-To: '.$email . "\r\n";*/
      $subject = 'ฟอร์มเว็บไซต์(อัตโนมัติ) : '.$subject;
      $msg = "ส่งมาจาก คุณ$name (E-Mail : <a href=\"https://mail.google.com/mail/u/0/?view=cm&fs=1&tf=1&source=mailto&to=$email\">$email</a>,หมายเลข IP Address : $ipaddr)<br/><hr/>$message";
      //$res = mail($_CONFIG['email'],$subject,$msg,$headers);
      $mail->IsHTML(true);
      $mail->IsSMTP();
	    $mail->SMTPAuth = true; // enable SMTP authentication
      $mail->CharSet = 'UTF-8';
      $mail->Host = $_CONFIG['senderHost']; // sets GMAIL as the SMTP server
    	$mail->Port = $_CONFIG['senderPort']; // set the SMTP port for the GMAIL server
    	$mail->Username = $_CONFIG['sender']; // GMAIL username
    	$mail->Password = $_CONFIG['senderPwd']; // GMAIL password
      $mail->AddReplyTo($email,$name); // Reply
    	$mail->From = $_CONFIG['sender']; // "name@yourdomain.com";
    	$mail->FromName = "Website Form Sender";  // set from Name
    	$mail->Subject = $subject;
    	$mail->Body = $msg;

    	$mail->AddAddress($_CONFIG['email']); // to Address

      if($mail->Send()){
        $result = 'success';
      } else {
        $result = '
          <div class="alert alert-danger">
            <strong>ล้มเหลว!</strong> ไม่สามารถส่งข้อมูลไปยังส่วนที่เกี่ยวข้องได้. กรุณาติดต่อ <a href="mailto:'.$_CONFIG['email'].'">'.$_CONFIG['email'].'</a><hr/>'.$mail->ErrorInfo.'
          </div>';
      }
    } else {
      $result = '
        <div class="alert alert-warning">
          <strong>คำเตือน!</strong> กรุณากรอกข้อมูลให้ครบถ้วน.
        </div>';
    }
  } else {
    $result = 'ERROR'.$ipaddr.$name.$email.$subject.$message;
  }
  echo $result;
?>
