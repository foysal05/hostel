<?php
include('db.php');
session_start();
function CheckCaptcha($userResponse) {
        $fields_string = '';
        $fields = array(
            'secret' => '6Ld9_64UAAAAAL4lKmmMg7eh6BXaQQ7q3yDGBd4V',
            'response' => $userResponse
        );
        foreach($fields as $key=>$value)
        $fields_string .= $key . '=' . $value . '&';
        $fields_string = rtrim($fields_string, '&');
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
        curl_setopt($ch, CURLOPT_POST, count($fields));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, True);
        $res = curl_exec($ch);
        curl_close($ch);
        return json_decode($res, true);
    }
    // Call the function CheckCaptcha
    $result = CheckCaptcha($_POST['g-recaptcha-response']);
    if ($result['success']) {

		if (isset($_POST['login'])) {



	$email = mysqli_real_escape_string($con, $_POST['email']);
	$password=mysqli_real_escape_string($con, $_POST['password']);
	$query="SELECT * FROM staff where email='$email' and password='$password' AND type='1'";
	$result=mysqli_query($con,$query);

	if ($row = mysqli_fetch_array($result)) {
		$_SESSION['id']=$row['id'];
		$_SESSION['fullname']=$row['fullname'];		
		$_SESSION['email']=$row['email'];
		$_SESSION['type']=$row['type'];
		
		$_SESSION['staff_login']=TRUE;
		header("Location:../index.php");	
		
	}else{
		//echo $query;

		header("Location:../login.php?wrong=1");
	}

}
if (isset($_POST['std_login'])) {
	$v_id = mysqli_real_escape_string($con, $_POST['v_id']);
	$password=mysqli_real_escape_string($con, $_POST['password']);
	$result=mysqli_query($con,"SELECT * FROM student where v_id='$v_id' and password='$password'");
	if ($row = mysqli_fetch_array($result)) {
		$_SESSION['v_id']=$row['v_id'];
		$_SESSION['fullname']=$row['fullname'];		
		$_SESSION['email']=$row['email'];
		//$_SESSION['type']=$row['type'];
		
		$_SESSION['std_login']=TRUE;	
		header("Location:../student/");
		
	}else{
		header("Location:../student/login.php?wrong=1");
	}

}
 } else {
        // If the CAPTCHA box wasn't checked
       //echo '<script>alert("Error Message");</script>';
	   header('location:../login.php?ewcaptcha_error');
    }
?>
