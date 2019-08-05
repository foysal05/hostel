<?php session_start();
if ($_SESSION['std_login']==TRUE) {
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
                                <h2 class="pageheader-title">DIU Hostel Dashboard</h2>
                                
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.php" class="breadcrumb-link">Dashboard</a></li> <li class="breadcrumb-item"><a href="payment.php" class="breadcrumb-link">Payment</a></li>
                                            <li class="breadcrumb-item active" aria-current="page"></li>Invoice
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="ecommerce-widget">
<?php
if ($_SESSION['v_id']==$_GET['std_id']) {
    


?>

<?php
if (isset($_GET['p_id'])) {
    $std_id=$_GET['std_id'];
    $p_id=$_GET['p_id'];
    $query="SELECT * FROM student, payment WHERE v_id=s_id AND v_id='$std_id' AND p_id='$p_id' ";
    $sql_result=mysqli_query($con,$query);
 
    if(mysqli_num_rows($sql_result)>0){
       
        while($row=mysqli_fetch_array($sql_result, MYSQLI_ASSOC)){

?>
            <div class="row">
                        <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-header p-4">
                                     <a class="pt-2 d-inline-block">DUI Hostel</a>
                                   
                                    <div class="float-right"> <h3 class="mb-0">Invoice #<?php echo $p_id ?></h3>
                                    Date: <?php echo $row['date']; ?></div>
                                </div>
                                <div class="card-body">
                                    <div class="row mb-4">
                                        <div class="col-sm-6">
                                            <h5 class="mb-3">From:</h5>                                            
                                            <h3 class="text-dark mb-1">DIU Hostel</h3>
                                         
                                            <div>Shukrabad</div>
                                            <div>Dhaka, 1205</div>
                                            <div>Email: info@diuhome.com</div>
                                            <div>Phone: +573-282-9117</div>
                                        </div>
                                        <div class="col-sm-6">
                                            <h5 class="mb-3">To:</h5>
                                            <h3 class="text-dark mb-1"><?php echo $row['fullname']; ?></h3>                                            
                                            <div><?php echo $row['permanent_address']; ?></div>
                                            
                                            <div>Email: <?php echo $row['email']; ?></div>
                                            <div>Phone: <?php echo $row['phone']; ?></div>
                                        </div>
                                    </div>
                                    <div class="table-responsive-sm">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    
                                                    <th>Month-Year</th>
                                                    <th>Bill</th>
                                                    <th class="right">Payment</th>
                                                    <th class="center">Due</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    
                                                    <td class="left strong"><?php echo $row['month'].'-'.$row['year']; ?></td>
                                                    <td class="left"><?php echo $row['payable_bill']; ?></td>
                                                    <td class="right"><?php echo $row['amount']; ?></td>
                                                    <td class="center"><?php echo $row['due']; ?></td>
                                                    
                                                </tr>
                                            
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                </div>
                                <!-- <div class="card-footer bg-white">
                                    <p class="mb-0">2983 Glenview Drive Corpus Christi, TX 78476</p>
                                </div> -->
                            </div>
                        </div>
                    </div>

    <?php
}
}else{
    echo '<h2> Records Not Found</h2>';
}
}


    ?>






           
                        <div class="row">
                           
                            
                        </div>

                        
                        
                        
                    </div>
                    <?php
}else{
    echo '<h2>You Have No Access To See This Invoice</h2>';
}
                    ?>
                </div>
            </div>
            
            
            <?php include('inc/footer.php'); ?>
            
        <?PHP

}else{
    header('location:index.php');
}

?>