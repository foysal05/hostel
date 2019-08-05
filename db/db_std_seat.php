<?php
require_once 'db.php';
if (isset($_GET['sid'])) {

	$std_id=$_GET['sid'];
	$room_no=$_GET['room_no'];
	$sign=$_GET['sign'];

	if ($sign=='danger') {
		header('location:../std_seat.php?vacancy=no');
		//echo 'no vacancy';
		
	}else{
		$query="INSERT INTO std_seat VALUES('','$std_id','$room_no')";
		$result=mysqli_query($con,$query);
		if ($result) {
			header('location:../room_allocation.php?allocated');
		}else{
			header('location:../std_seat.php?error');
		}


	}
}


?>