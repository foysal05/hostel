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
		$query="UPDATE std_seat SET room='$room_no' WHERE std_id='$std_id'";
		$result=mysqli_query($con,$query);
		echo $query;
		if ($result) {
			header('location:../room_allocation.php?changed');
			
		}else{
			header('location:../change_seat.php?error');
		}
		

	}
}


?>