
<?php
session_start();
if ($_SESSION['staff_login']==TRUE) {
    header('location:students.php');
}else if ($_SESSION['std_login']==TRUE) {
     header('location:student/');
}else{
    header('location:home/');
}

?>     