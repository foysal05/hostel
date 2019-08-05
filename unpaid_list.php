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
                                            <li class="breadcrumb-item"><a href="index.php" class="breadcrumb-link">Dashboard</a></li><li class="breadcrumb-item"><a href="payment.php" class="breadcrumb-link">Payment</a></li>
                                            <li class="breadcrumb-item active" aria-current="page"></li>Unpaid
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="ecommerce-widget">

           <form action="" method="POST">
  <div class="row">
    <div class="col">
      <div class="form-group row">
        <label class="col-12 col-sm-3 col-form-label text-sm-right">Month:</label>
        <div class="col-12 col-sm-8 col-lg-6">
            <select name="month" required="" class="form-control">
                <option value="">Select Month</option>
                <option value="January">January</option>
                <option value="February">February</option>
                <option value="March">March</option>
                <option value="April">April</option>
                <option value="May">May</option>
                <option value="June">June</option>
                <option value="July">July</option>
                <option value="August">August</option>
                <option value="September">September</option>
                <option value="October">October</option>
                <option value="November">November</option>
                <option value="December">December</option>
            </select>
        </div>
    </div>
    </div>
    <div class="col">
      <div class="form-group row">
        <label class="col-12 col-sm-3 col-form-label text-sm-right">Year</label>
        <div class="col-12 col-sm-8 col-lg-6">
            <input type="text" required="" onkeypress="return isNumberKeyND(event)" value="<?php echo date('Y'); ?>"  placeholder="Enter Year" class="form-control" name="year">
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
  <?php
if (isset($_POST['std_search'])) {
    $month=$_POST['month'];
    $year=$_POST['year'];
   ?>
 <div class="row">

    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">Unpaid Student List. Month : (<?php echo $month.'-'.$year; ?>)</h5>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered first">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Photo</th>
                                <th>Name</th>
                                <th>Father</th>
                                <th>Mother</th>
                                <th>Profile</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query="SELECT * FROM student WHERE v_id NOT IN (
SELECT DISTINCT v_id FROM student, payment WHERE v_id  IN(s_id) AND payment.`month`='$month' AND `year`=$year)";
                            $result=mysqli_query($con,$query);
                            if(mysqli_num_rows($result)>0){
                                while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){


                                    ?>
                                    <tr>
                                        <td><?php echo $row['v_id']; ?></td>
                                        <td><img src="db/<?php echo $row['photo']; ?>" width="100" height="100"></td>
                                        <td><?php echo $row['fullname']; ?></td>
                                        <td><?php echo $row['father_name']; ?></td>
                                        <td><?php echo $row['mother_name']; ?></td>
                                        <td><a href="profile.php?id=<?php echo $row['v_id']; ?>" class="btn btn-info">Profile</a></td>

                                    </tr>
                                    <?php   
                                }
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>

                                <th>ID</th>
                                <th>Photo</th>
                                <th>Name</th>
                                <th>Father</th>
                                <th>Mother</th>
                                <th>Profile</th>
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