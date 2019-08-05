<?php
require_once 'db.php';
session_start();
if (isset($_POST['payment'])) {
	$id=$_SESSION['id'];
	$year=$_SESSION['year'];
	$date=date('m/d/Y');
	$monthly_bill=$_POST['monthly_bill'];
	$month=$_POST['month'];
	$amount=$_POST['amount'];
	$due=$monthly_bill-$amount;

	$query="INSERT INTO payment VALUES('','$id','$date','$monthly_bill','$amount','$due','$month','$year','Office')";
	//echo $query;
	$result=mysqli_query($con,$query);
	if ($result) {
		header('location:../make_payment.php?success');
	}else{
		header('location:../make_payment.php?error');
	}


}
if (isset($_POST['due_payment'])) {
	$p_id=$_POST['p_id'];
	$amount=$_POST['amount'];
	//echo $amount;
	$query="UPDATE payment SET amount='$amount', due='0' WHERE p_id='$p_id'  ";
	$result=mysqli_query($con,$query);
	if ($result) {
		header('location:../make_payment.php?success');
	}else{
		header('location:../make_payment.php?error');
	}
}
if (isset($_GET['onlineDueid'])) {

	$p_id=$_GET['onlineDueid'];
	$amount=$_GET['amount'];
	//echo $amount;
	$query="UPDATE payment SET amount=payment.payable_bill, due='0',received_by='Office' WHERE p_id='$p_id'";
	
	$query1="UPDATE payment_request SET status='Done' WHERE payment_id='$p_id'  ";
	echo $query1;
	$result1=mysqli_query($con,$query1);
	$result=mysqli_query($con,$query);
	if ($result) {
		header('location:../online_payment.php?success');
	}else{
		header('location:../online_payment.php?error');
	}
}
if (isset($_GET['done'])) {
	$id=$_GET['id'];
	$query="UPDATE payment SET received_by='Office' WHERE p_id='$id' ";
	$result=mysqli_query($con,$query);
	if ($result) {
		header('location:../online_payment.php?success');
	}else{
		header('location:../online_payment.php?error');
	}
}


?>