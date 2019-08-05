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
                                <h2 class="pageheader-title">DIU Hostel Dashboard</h2>
                                
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.php" class="breadcrumb-link">Dashboard</a></li>
                                            <li class="breadcrumb-item"><a href="make_payment.php" class="breadcrumb-link">Payment</a></li>
                                            <li class="breadcrumb-item active" aria-current="page"></li>Receive Payment
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
    <div class="container-fluid">
  <form action="" method="POST">
  <div class="row">
    <div class="col">
      <div class="form-group row">
        <label class="col-12 col-sm-3 col-form-label text-sm-right">Student ID:</label>
        <div class="col-12 col-sm-8 col-lg-6">
            <input type="text" required=""  placeholder="Student ID" class="form-control" name="std_id">
        </div>
    </div>
    </div>
    <div class="col">
      <div class="form-group row">
        <label class="col-12 col-sm-3 col-form-label text-sm-right">Year</label>
        <div class="col-12 col-sm-8 col-lg-6">
            <input type="text" required="" value="<?php echo date('Y'); ?>"  placeholder="Enter Year" class="form-control" name="year">
        </div>
    </div>
    </div>
    <div class="col">
      <input type="submit" class="btn btn-success" name="std_search" value="Search">
    </div>
  </div>
  </form>
  <hr>
  <br>
  <?PHP
if (isset($_POST['std_search'])) {
    $id=$_POST['std_id'];
    $year=$_POST['year'];
    $_SESSION['year']=$year;

    $query="SELECT * FROM student,std_seat WHERE v_id=std_seat.std_id AND v_id='$id'";
    //echo $query;
     $result=mysqli_query($con,$query);
    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){


  ?>
  <div class="row">
    <div class="col-sm-6">
      <h3>Name: <?php echo $row['fullname']; ?></h3>
    </div>
    <div class="col-sm-3">
      <h3>ID: <?php echo $row['v_id']; ?></h3>
    </div>
    <div class="col-sm-3">
      <h3>Room: <?php echo $row['room']; ?></h3>
    </div>
  </div>
<?php
}
}

?>
  <hr>
   
</div>  
<br>              
                    <div class="ecommerce-widget">

          <div class="row">

    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">Paid Payment Book</h5>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered first">
                        <thead>
                            <tr>
                                <th>SL.</th>
                                <th>Month-Year</th>
                                <th>Cost</th>
                                <th>Payment</th>
                                <th>Date</th>
                                <th>Action</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php
$months = array("January", "February", "March","April","May","June","July","August","September","October","November","December");
$i=1;
foreach ($months as $month) {
    
                            ?>
                            <tr>
                                <td><input type="text" style="border: none; width: 15px" readonly="" name="month" value="<?php echo $i; ?>" ></td>
                                <td><?php echo $month; ?></td>
                                <td>5000</td>
                                <td><input type="text" name="payment"></td>
                                <td>12/05/2019</td>
                                <td>Invoice</td>
                            </tr>
                            <?php
$i++;
}
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>

                               <th>SL.</th>
                                <th>Month-Year</th>
                                <th>Cost</th>
                                <th>Amount</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>


<!-- ============================================================== -->
<!-- end basic table  -->
<!-- ============================================================== -->
</div>

<div class="row">

    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">Unpaid Payment Book</h5>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered first">
                        <thead>
                            <tr>
                                <th>SL.</th>
                                <th>Month-Year</th>
                                <th>Cost</th>
                                <th>Payment</th>
                                <th>Date</th>
                                <th>Action</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php
$months = array("January", "February", "March","April","May","June","July","August","September","October","November","December");
$i=1;
foreach ($months as $month) {
    
                            ?>
                            <tr>
                                <td><input type="text" style="border: none; width: 15px" readonly="" name="month" value="<?php echo $i; ?>" ></td>
                                <td><?php echo $month; ?></td>
                                <td>5000</td>
                                <td><input type="text" name="payment"></td>
                                <td>12/05/2019</td>
                                <td>Invoice</td>
                            </tr>
                            <?php
$i++;
}
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>

                               <th>SL.</th>
                                <th>Month-Year</th>
                                <th>Cost</th>
                                <th>Amount</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>


<!-- ============================================================== -->
<!-- end basic table  -->
<!-- ============================================================== -->
</div>
<?php
}
?>




           
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