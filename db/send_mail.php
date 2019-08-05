<?php
include 'email_config.php';
    $mailto = $g_email;
   $mailSub = "DIU Hostel, System Access Information (Student)";
  
   $message="
  <h2>DIU Hostel, System Access Information (Student)</h2>
   <b>Student ID :</b>".$v_id."<br>
   <b>Student ID :</b>".$password."
   <p>Thank You</p>
  
  "
  
  ;
  
  
  
  
  
  
  
   require 'PHPMailer-master/PHPMailerAutoload.php';
   
   $mail = new PHPMailer();
   
   $mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
  );
   $mail ->IsSmtp();
   $mail ->SMTPDebug = 0;
   $mail ->SMTPAuth = true;
   $mail ->SMTPSecure = 'ssl';
   $mail ->Host = "smtp.gmail.com";
  // $mail ->Port = 465; // or 587
   $mail ->Port = 465; // or 587
   $mail ->IsHTML(true);
   $mail ->Username = $system_email_address;
   $mail ->Password = $system_email_pass;
   $mail->setFrom('hosteldiu@gmail.com', 'DIU Home');
  
   $mail ->Subject = $mailSub;
   $mail ->Body = $mailMsg;
   $mail ->AddAddress($mailto);

   if(!$mail->Send())
   {
      //echo "Mail Not Sent";
   }
   else
   {
      // echo "Mail Sent";
   }





   

