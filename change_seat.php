<?php session_start();
if ($_SESSION['staff_login']==TRUE) {
    include('inc/head.php'); ?>
<!-- ============================================================== -->
<!-- main wrapper -->
<!-- ============================================================== -->
<div class="dashboard-main-wrapper">
    <!-- ============================================================== -->
    <?php include('inc/top_nev.php'); ?>  
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <?php include('inc/left_nev.php'); ?>  
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- wrapper  -->
    <!-- ============================================================== -->
    <div class="dashboard-wrapper">
        <div class="dashboard-ecommerce">
            <div class="container-fluid dashboard-content ">
                <!-- ============================================================== -->
                <!-- pageheader  -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Student Changing Room</h2>

                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page"></li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="ecommerce-widget">

                   <div class="row col-10">
                    <?php
                    $query="SELECT * FROM room ORDER BY room_no ASC";
                    $result=mysqli_query($con,$query);
                    if(mysqli_num_rows($result)>0){
                        while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
                            $room_no=$row['room_no'];
                    $sql="SELECT * FROM std_seat WHERE room='$room_no'";
                     $result2=mysqli_query($con,$sql);
                    $rowcount=mysqli_num_rows($result2);
                    $sign="";
                    if ($rowcount<$row['room_capacity']) {
                            $sign='success';
                        }else{
                            $sign='danger';
                        }
                            ?>
                            <a href="db/db_change_seat.php?sid=<?php echo $_GET['vid']; ?>& room_no=<?php echo $row['room_no']; ?>&sign=<?php echo $sign; ?>" style="border: 1px solid gray; color: white" class="btn btn-<?php echo $sign; ?> col"><?php echo $row['room_no']; ?> &nbsp; Cap: <?php echo $row['room_capacity']; ?></a>
                             

                            <?php

                        
                }
            }

                    ?>

                </div>







                <div class="row">


                </div>




            </div>
        </div>
    </div>


    <?php include('inc/footer.php'); ?>
 <?PHP

}else{
    header('location:index.php');
}

?>
