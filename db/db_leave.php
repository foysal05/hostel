<?php
require_once 'db.php';
session_start();
if (isset($_POST['submit'])) {
	$id=$_SESSION['v_id'];
	$application=$_POST['application'];
	//echo $application;

if ($application<>"") {
	
	$guardian_query="SELECT * FROM student, guardian WHERE student.std_id=guardian.sid_id AND v_id='$id' ";
	$result=mysqli_query($con,$guardian_query);
	while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
		$email=$row['g_email'];
		//echo $email;
	}

	$query="INSERT INTO leave_application VALUES('','$id',NOW(),'$application','Pending')";
	$result=mysqli_query($con,$query);
	if ($result) {
		header('location:../student/leave.php?application_done');
		include 'send_application.php';
	}else{
		header('location:../student/leave.php?application_error');
	}
}else{
	header('location:../student/leave.php?application_req');
}

}
if (isset($_GET['leave_id'])) {
	$id=$_GET['leave_id'];

	$query="UPDATE leave_application SET status='Approved' WHERE l_id='$id'";
	$result=mysqli_query($con,$query);
	if ($result) {
		header('location:../application.php?approved');
		
	}else{
		header('location:../application.php?error');
	}
}

?>