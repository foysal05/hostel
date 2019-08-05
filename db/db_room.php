<?php
require_once 'db.php';

if (isset($_POST['add'])) {
	$room_no=$_POST['room_no'];
	$room_capacity=$_POST['room_capacity'];
	$seat_price=$_POST['seat_price'];

	$sql="SELECT * FROM room WHERE room_no='$room_no'";
	$result=mysqli_query($con,$sql);
	$rowcount=mysqli_num_rows($result);
	if ($rowcount<1) {
			$video=$_FILES['room_video']['name'];
			$file_ext=strtolower(end(explode('.', $video)));
			$expensions=array("mp4","mkv");

			if (in_array($file_ext, $expensions)==false) {
		header('location:../add_student.php?imgtypeE');

	}else{

		$name =$room_no.'.'.$file_ext;
		$temp=$_FILES['room_video'] ['tmp_name'];
		move_uploaded_file($temp,"videos/".$name);
		$videoPath="videos/$name";

		$query="INSERT INTO room VALUES('','$room_no','$room_capacity','$videoPath','$seat_price')";
		$result=mysqli_query($con, $query);
	}
		if ($result) {
			header('location:../room.php?success');
		}else{
			header('location:../room.php?error');
		}
	}else{
		header('location:../room.php?roomExist');
	}
}
if (isset($_POST['update'])) {
	$room_no=$_POST['room_no'];
	$room_capacity=$_POST['room_capacity'];
	$seat_price=$_POST['seat_price'];
	$sql="SELECT * FROM room WHERE room_no='$room_no'";
	$result=mysqli_query($con,$sql);
	$rowcount=mysqli_num_rows($result);
	if ($rowcount<2) {
		$query="UPDATE room SET room_no='$room_no',room_capacity='$room_capacity',seat_price='$seat_price' WHERE room_no='$room_no'";
		$result=mysqli_query($con, $query);
		if ($result) {
			header('location:../room.php?success');
		}else{
			header('location:../room.php?error');
		}
	}else{
		header('location:../room.php?roomExist');
	}


}
if (isset($_GET['delete'])) {
	$id=$_GET['id'];
	$query="DELETE FROM room WHERE r_id='$id'";
	$result=mysqli_query($con, $query);
	if ($result) {
		header('location:../room.php?deleted');
	}else{
		header('location:../room.php?error');
	}
}


?>