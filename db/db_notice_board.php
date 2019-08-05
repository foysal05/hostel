<?php
include 'db.php';
if (isset($_POST['add'])) {
	$heading=$_POST['heading'];
	$description=$_POST['description'];
	$query="INSERT INTO notice VALUES('','$heading','$description')";
	$result=mysqli_query($con,$query);
	if ($result) {
		header('location:../notice_board.php?success');
	}else{
		header('location:../notice_board.php?error');
	}
}
if (isset($_POST['update'])) {
	$id=$_POST['id'];
	$heading=$_POST['heading'];
	$description=$_POST['description'];
	$query="UPDATE notice SET heading='$heading',body='$description' WHERE id='$id' ";
	$result=mysqli_query($con,$query);
	if ($result) {
		header('location:../notice_board.php?success');
	}else{
		header('location:../notice_board.php?error');
	}
}
if (isset($_GET['delete'])) {
	$id=$_GET['id'];
	$query="DELETE FROM notice WHERE id='$id'";
	$result=mysqli_query($con,$query);
	if ($result) {
		header('location:../notice_board.php?success');
	}else{
		header('location:../notice_board.php?error');
	}
}


?>