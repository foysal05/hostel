<?php
require_once 'db.php';
session_start();
if (isset($_POST['change'])) {
	$password=$_POST['password'];
	$cpassword=$_POST['cpassword'];
	$id=$_SESSION['id'];

	if ($password==$cpassword) {
		$query="UPDATE staff SET password='$password' WHERE id='$id'";
		$result=mysqli_query($con,$query);
		if ($result) {
			header('location:../setting.php?changed');
		}else{
			header('location:../setting.php?error');
		}
	}else{
		header('location:../setting.php?password_not_matched');
	}
}
if (isset($_POST['change_std_pass'])) {
	$password=$_POST['password'];
	$cpassword=$_POST['cpassword'];
	$id=$_SESSION['v_id'];

	if ($password==$cpassword) {
		$query="UPDATE student SET password='$password' WHERE v_id='$id'";
		$result=mysqli_query($con,$query);
		if ($result) {
			header('location:../student/setting.php?changed');
		}else{
			header('location:../student/setting.php?error');
		}
	}else{
		header('location:../student/setting.php?password_not_matched');
	}
}


?>