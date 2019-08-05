<?php
include 'db.php';
session_start();
if (isset($_POST['add'])) {
	$std_id=$_SESSION['v_id'];
	$payment_id=$_POST['p_id'];
	$amount=$_POST['amount'];
	$trxid=$_POST['trxid'];

	$query="INSERT INTO payment_request (payment_id,amount,std_id,trxid,`date`,status) VALUES ('$payment_id','$amount','$std_id','$trxid',NOW(),'Pending')";
	$result=mysqli_query($con,$query);
	if ($result) {
		header('location:../student/payment.php?success');
	}else{
		echo 'error';
		//header('location:../student/payment.php?error');
	}
}
if (isset($_POST['newadd'])) {
	$std_id=$_SESSION['v_id'];
	$month=$_POST['month'];
	$year=$_POST['year'];
	$amount=$_POST['amount'];
	$trxid=$_POST['trxid'];
	$date=date('m/d/Y');

	$query="INSERT INTO payment VALUES('','$std_id','$date','$amount','$amount',0,'$month','$year','Pending','$trxid')";
	$result=mysqli_query($con,$query);
	if ($result) {
		header('location:../student/payment.php?success');
	}else{
		echo 'error';
		//header('location:../student/payment.php?error');
	}
}

?>