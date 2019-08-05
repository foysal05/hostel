<?php
include 'db.php';
session_start();
if (isset($_POST['submit'])) {

	$complain=$_POST['complain'];
	$std_id=$_SESSION['v_id'];

	$query="INSERT INTO complain (complain,std_id,`date`,status) VALUES ('$complain','$std_id',NOW(),'Pending') ";
	$result=mysqli_query($con,$query);
	if ($result) {
		header("Location:../student/complain.php?success");
	}else{
		// echo $query;
		// echo 'Error';
		header("Location:../student/complain.php?error");
	}

	
}
if (isset($_GET['done'])) {
	$id=$_GET['id'];
	$query=" UPDATE complain SET status='Done' WHERE c_id='$id' ";
	$result=mysqli_query($con,$query);
	if ($result) {
		header("Location:../complain.php?success");
	}else{
		header("Location:../complain.php?error");
	}
}
if (isset($_GET['delete'])) {
	$id=$_GET['id'];
	$query=" DELETE FROM complain WHERE c_id='$id' ";
	$result=mysqli_query($con,$query);
	if ($result) {
		header("Location:../complain.php?success");
	}else{
		header("Location:../complain.php?error");
	}
}
if (isset($_GET['drop'])) {
	$id=$_GET['id'];
	$query=" DELETE FROM complain WHERE c_id='$id' ";
	$result=mysqli_query($con,$query);
	if ($result) {
		header("Location:../student/complain.php?success");
	}else{
		header("Location:../student/complain.php?error");
	}
}

?>