<?php
include 'email_config.php';
    $mailto = $email;
    $mailSub = "Your Child Submitted An Application, This Copy To Keep Your Knowledge";
	
    $mailMsg = $application;
	
	
	
	
	
	
	
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
       //echo "Mail Sent";
   }





   

