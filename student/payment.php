<?php 
session_start();
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
                                <h2 class="pageheader-title"><?php echo $_SESSION['fullname']; ?></h2>
                                
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.php" class="breadcrumb-link">Dashboard</a>
                                            <li class="breadcrumb-item active" aria-current="page"></li>Payment Payment
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php 
    if (isset($_GET['success'])) {
        ?>
        <div class="alert alert-success alert-dismissible">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Success!</strong> Payment Done Successfully.
      </div>
      <?php
  }else if (isset($_GET['error'])) {
        ?>
        <div class="alert alert-danger alert-dismissible">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Wrong!</strong> Something Wrong !
      </div>
      <?php
  }else if (isset($_GET['changed'])) {
        ?>
        <div class="alert alert-success alert-dismissible">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Success!</strong> Room Changed Successfully !
      </div>
      <?php
  }

  ?>
    <div class="container-fluid">
  <form action="" method="POST">
  <div class="row">
    <div class="col">
      <div class="form-group row">
        <label class="col-12 col-sm-3 col-form-label text-sm-right">Student ID:</label>
        <div class="col-12 col-sm-8 col-lg-6">
            <input type="text" readonly=""  placeholder="Student ID" class="form-control" value="<?php echo $_SESSION['v_id']; ?>" name="std_id">
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
    $_SESSION['id']=$id;
    $admission_date='';
    $category='';

    $query="SELECT * FROM student,std_seat WHERE v_id=std_seat.std_id AND v_id='$id'";
    //echo $query;
     $result=mysqli_query($con,$query);
    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
$admission_date=$row['date'];
$category=$row['category'];

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
                                
                                <th>Payment</th>
                                <th>Due</th>
                                <th>Date</th>
                                <th>Invoice</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php
    $old_paid_month=array();
$months = array("January", "February", "March","April","May","June","July","August","September","October","November","December");

$p=1;
$monthName='';
foreach ($months as $month) {
    
 $sql="SELECT * FROM payment WHERE s_id='$id' AND month='$month' AND due=0 AND year='$year' AND received_by<>'Pending'";  
  $sql_result=mysqli_query($con,$sql);
 
    if(mysqli_num_rows($sql_result)>0){
        
        while($row_payment=mysqli_fetch_array($sql_result, MYSQLI_ASSOC)){
            $monthName=$row_payment['month'];
          array_push($old_paid_month,$monthName);

                            ?>
                            <tr>
                                <td><?php echo $p; ?></td>
                                <td><?php echo $month.'-'.$year; ?></td>
                                
                                <td><?php echo $row_payment['amount']; ?></td>
                                <td><?php echo $row_payment['due']; ?></td>
                                <td><?php echo $row_payment['date']; ?></td>
                                <td>
                                    <a href="invoice.php?std_id=<?php echo $id; ?>&p_id=<?php echo $row_payment['p_id']; ?>" class="btn btn-success">Invoice</a>
                                </td>
                            </tr>
                            <?php
                        }
                    }
$p++;
}
//print_r($old_paid_month);
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>

                               <th>SL.</th>
                                <th>Month-Year</th>
                                
                                <th>Payment</th>
                                <th>Due</th>
                                <th>Date</th>
                                <th>Invoice</th>
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
<?php
$category_payment_query="SELECT * FROM student,std_seat,room WHERE room.room_no=std_seat.room AND v_id='$id'";
//echo $category_payment_query;
$category_result=mysqli_query($con,$category_payment_query);
    if(mysqli_num_rows($category_result)>0){
        while($row=mysqli_fetch_array($category_result, MYSQLI_ASSOC)){
 $monthly_bill= $row['seat_price'];
        }
    }

?>
</div>
          <div class="row">

    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">Due Payment Book</h5>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered first">
                        <thead>
                            <tr>
                                <th>SL.</th>
                                <th>Month-Year</th>
                                 <th>Bill</th>
                                <th>Payment</th>
                               
                                <th>Due</th>
                                <th>Date</th>
                                <th>Payment</th>
                                
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php
$months = array("January", "February", "March","April","May","June","July","August","September","October","November","December");

$p=1;
$sum;
$monthName='';
foreach ($months as $month) {
    
 $sql="SELECT * FROM payment WHERE s_id='$id' AND month='$month' AND due<>0 AND year='$year'";  
  $sql_result=mysqli_query($con,$sql);
 
    if(mysqli_num_rows($sql_result)>0){
       
        while($row_payment=mysqli_fetch_array($sql_result, MYSQLI_ASSOC)){
            $monthName=$row_payment['month'];
              array_push($old_paid_month,$monthName);

                            ?>
                            <tr>
                                <form action="db/db_payment.php" method="post">
                                <td><?php echo $p; ?></td>
                                <td><?php echo $month.'-'.$year; ?></td>
                                
                                <input type="hidden" name="p_id" value="<?php echo $row_payment['p_id']; ?>" >
                                <input type="hidden" name="amount" value="<?php echo $row_payment['payable_bill']; ?>" >
                                
                                <td><?php echo $row_payment['payable_bill']; ?></td>
                                <td><?php echo $row_payment['amount']; ?></td>
                                <td><?php echo $row_payment['due']; ?></td>
                                <td><?php echo $row_payment['date']; ?></td>
     <td><a href="make_payment.php?id=<?php echo $row_payment['p_id']; ?>" class="btn btn-info" style="color: white">Payment</a></td>
                                
                                </form>
                            </tr>
                            <?php
                        }
                        //echo gettype($sum).'<br>';
                       // echo "Due :".$sum;

                    }
$p++;
}
  //print_r($old_paid_month);                          ?>
                        </tbody>
                        <tfoot>
                            <tr>

                               <th>SL.</th>
                                <th>Month-Year</th>
                                <th>Bill</th>
                                <th>Payment</th>
                                <th>Due</th>
                                <th>Date</th>
                                <th>Payment</th>
                                
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
<?php
$category_payment_query="SELECT * FROM student,std_seat,room WHERE room.room_no=std_seat.room AND v_id='$id'";
//echo $category_payment_query;
$category_result=mysqli_query($con,$category_payment_query);
    if(mysqli_num_rows($category_result)>0){
        while($row=mysqli_fetch_array($category_result, MYSQLI_ASSOC)){
$monthly_bill= $row['seat_price'];
$room_no=$row['room_no'];
        }
    }

?>
</div>
<div class="row">

    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">Unpaid Payment Book</h5>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example2" class="table table-striped table-bordered first">
                        <thead>
                            <tr>
                                <th>SL.</th>
                                <th>Month-Year</th>
                                
                                <th>Amount</th>
                                <th>Payment</th>
                                
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php
$months = array("January", "February", "March","April","May","June","July","August","September","October","November","December");

$filteredFoos = array_diff($months, $old_paid_month);

$u=1;


foreach ($filteredFoos as $month) {
    
     
  
                            ?>
                            <tr>
                                <form action="db/db_payment.php" method="post">
                                <td><?php echo $u; ?></td>
                                <input type="hidden" value="<?php echo $month; ?>" name="month">
                                <input type="hidden" value="<?php echo $monthly_bill; ?>" name="monthly_bill">
                                <td><?php echo $month.'-'.$year; ?></td>
                                
                                <td><input type="text" class="form-control" name="amount" value="<?php echo $monthly_bill; ?>"></td>
                                <td><a href="make_payment.php?newid=<?php echo $room_no; ?>&month=<?php echo $month; ?>&year=<?php echo $year; ?>" class="btn btn-info" style="color: white">Payment</a></td>
                               
                                </form>
                            </tr>
                            <?php
$u++;

}
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>

                               <th>SL.</th>
                                <th>Month-Year</th>
                                
                                <th>Amount</th>
                                <th>Payment</th>
                                
                                
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
<?php 
$query="SELECT * FROM student, std_category WHERE category=pc_id AND v_id='$id'";
$sql_result=mysqli_query($con,$query);
    if(mysqli_num_rows($sql_result)>0){
        while($row=mysqli_fetch_array($sql_result, MYSQLI_ASSOC)){
$monthly_payable_amount=$row['amount'];
            }
        }

 ?>


           <h3>Bill Created From: <?php echo $admission_date; ?> To <?php echo date('Y-m-d'); ?>  </h3>              
                            
                        </div>

                        
                        
                        
                    </div>
                </div>
            </div>
            
<?php
}
}
// else{
//     echo '<h2>Wrong Student ID Entered</h2>';
// }
?>            
            <?php include('inc/footer.php'); ?>
            
        <?PHP

}else{
    header('location:index.php');
}

?>