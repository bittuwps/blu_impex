<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Mailer {

  public function sending_mail($mail_conf = array(),$file='') {
    require_once('php_mailer/autoload.php');
    $mail = new PHPMailer();
    if (is_array($mail_conf) && !empty($mail_conf)) {

 $chn_path="uploaded_files/mail_file";
   $file_path=$chn_path.'/'.$file; 
  
      //echo $mail_conf['body_part'];die;
      $mail->isSMTP();

      $mail->Debugoutput = 'html';
      $mail->Host = 'smtp.gmail.com';

      $mail->Port = 587;
      $mail->SMTPSecure = 'tls';

      $mail->SMTPAuth = true;
      $mail->Username = "anmol@web-shuttle.com";
      $mail->Password = "!@#anmolwebshuttle";
      $mail->setFrom('anmol@web-shuttle.com', 'test');
      
      $mail->addReplyTo('anmol@web-shuttle.com', 'test');
      $mail->addAddress($mail_conf['to_email'], $mail_conf['from_name']);

      $mail->Subject = $mail_conf['subject'];
      $mail->Body = $mail_conf['body_part'];
      $mail->IsHTML(true);
      $mail->AltBody = @$mail_conf['alternative_msg'];
//      print_r($file);
             $mail->AddAttachment($file_path);
        
      if (!$mail->send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
      } else {
        //echo "Message sent!";
      }
    }
  }

}

?>
