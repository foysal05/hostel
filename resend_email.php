<?php
include 'db/email_config.php';
    $mailto = $_GET['email'];
    $v_id=$_GET['id'];
    $password=$_GET['pass'];
    $mailSub = "DIU Hostel, System Access Information (Student)";
	$message="
  <h2>DIU Hostel, System Access Information (Student)</h2>
   <b>Student ID :</b>".$v_id."<br>
	 <b>Student ID :</b>".$password."
   <p>Thank You</p>
	
	"
	
	;
    $mailMsg = $message;
	
	
	
	
	
	
	
   require 'db/PHPMailer-master/PHPMailerAutoload.php';
   // require 'db/PHPMailer-master/class.phpmailer.php';
   // require 'db/PHPMailer-master/class.smtp.php';
   
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
      echo "Mail Not Sent";
       // echo "Mailer Error: " . $mail->ErrorInfo.'<br>';
   }
   else
   {
       header('location:profile.php?email=send&id='.$v_id);
     //echo 'Mail Sent';
   }





   

