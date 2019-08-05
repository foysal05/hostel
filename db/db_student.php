<?php
require_once 'db.php';
// Adding Student Information
if (isset($_POST['add'])) {
	
	$fullname=$_POST['fullname'];
	$father_name=$_POST['father_name'];
	$mother_name=$_POST['mother_name'];
	$v_id=$_POST['v_id'];
	$nid=$_POST['nid'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$category='';
	$permanent_address=$_POST['permanent_address'];
	$additional_info=$_POST['additional_info'];
	$g_name=$_POST['g_name'];
	$relation=$_POST['relation'];
	$g_address=$_POST['g_address'];
	$g_email=$_POST['g_email'];
	$g_phone=$_POST['g_phone'];
	$g_nid=$_POST['g_nid'];
	$date=date('m/d/Y');
	function randomPassword() {
		$alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
    	$n = rand(0, $alphaLength);
    	$pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}
$password=randomPassword();


$checkQuery="SELECT * FROM student WHERE v_id='$v_id'";
$CheckResult=mysqli_query($con,$checkQuery);
if(mysqli_num_rows($CheckResult)==0){


	$photo=$_FILES['photo']['name'];
	$file_ext=strtolower(end(explode('.', $photo)));
	$expensions=array("jpeg","jpg","png");

	if (in_array($file_ext, $expensions)==false) {
		header('location:../add_student.php?imgtypeE');

	}else{
		//$name =str_replace(" ","_",$_FILES['photo'] ['name']);
		$name =$v_id.'.'.$file_ext;
		$temp=$_FILES['photo'] ['tmp_name'];
		move_uploaded_file($temp,"photos/".$name);
		$imagePath="photos/$name";
		$query="INSERT INTO student VALUES('','$v_id','$fullname','$imagePath','$father_name','$mother_name','$nid','$email','$phone','$permanent_address','$additional_info','$password','$category','$date')";

	}

	if ($con->query($query) === TRUE) {
		$last_id = $con->insert_id;

	} else {
		echo "Error: " . $query . "<br>" . $con->error;
	}
	$g_password=randomPassword();

	$sql="INSERT INTO guardian VALUES('$last_id','$g_name','$relation','$g_address','$g_email','$g_phone','$g_nid','$g_password')";
	$result=mysqli_query($con,$sql);
	if ($result) {
		include 'send_mail.php';
		header('location:../add_student.php?success');

					//echo "Done";
	}else{
		header('location:../add_student.php?error');
		//echo "Error";
	}

}else{
	header('location:../add_student.php?id_exist');
}


}
//Deleting Student Information
if (isset($_GET['delete'])) {
	$id=$_GET['id'];
	$query="DELETE FROM student WHERE std_id='$id'";
	$query2="DELETE FROM std_seat WHERE std_id='$id'";
	$query3="DELETE FROM guardian WHERE std_id='$id'";
	$result=mysqli_query($con,$query);
	$result2=mysqli_query($con,$query2);
	$result3=mysqli_query($con,$query3);
	if ($result) {
		header('location:../students.php?success');
		
	}else{
		header('location:../students.php?error');
	}
}


//Update Student Information
if (isset($_POST['update'])) {
	$fullname=$_POST['fullname'];
	$father_name=$_POST['father_name'];
	$mother_name=$_POST['mother_name'];
	$v_id=$_POST['v_id'];
	$nid=$_POST['nid'];
	$nid=$_POST['nid'];
	$category='';

	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$permanent_address=$_POST['permanent_address'];
	$additional_info=$_POST['additional_info'];
	$g_name=$_POST['g_name'];
	$relation=$_POST['relation'];
	$g_address=$_POST['g_address'];
	$g_email=$_POST['g_email'];
	$g_phone=$_POST['g_phone'];
	$g_nid=$_POST['g_nid'];
	$id=$_POST['id'];
	
	
	$query="";

	if(!file_exists($_FILES['photo']['tmp_name']) || !is_uploaded_file($_FILES['photo']['tmp_name'])) {
		$query="UPDATE student SET fullname='$fullname',father_name='$father_name',mother_name='$mother_name',nid='$nid',email='$email',phone='$phone',permanent_address='$permanent_address',additional_info='$additional_info',v_id='$v_id',category='$category' WHERE std_id='$id' ";
	}else{
		$photo=$_FILES['photo']['name'];
		$file_ext=strtolower(end(explode('.', $photo)));
		$expensions=array("jpeg","jpg","png");

		if (in_array($file_ext, $expensions)==false) {
			header('location:../add_student.php?imgtypeE');
		}else{
			$name =$v_id.'.'.$file_ext;
			$temp=$_FILES['photo'] ['tmp_name'];
			move_uploaded_file($temp,"photos/".$name);
			$imagePath="photos/$name";
			$query="UPDATE student SET fullname='$fullname',father_name='$father_name',mother_name='$mother_name',nid='$nid',email='$email',phone='$phone',permanent_address='$permanent_address',additional_info='$additional_info',v_id='$v_id',photo='$imagePath',category='$category' WHERE std_id='$id' ";

		}
	}
	$query2="UPDATE guardian SET  g_name='$g_name',relation='$relation',g_address='$g_address',g_email='$g_email',g_phone='$g_phone',g_nid='$g_nid' WHERE sid_id='$id' ";
	$result2=mysqli_query($con,$query2);
	$result=mysqli_query($con,$query);
	if ($result) {
		//echo $query2;
		header('location:../students.php?success');

	}else{
		echo 'error';
	}
}


?>