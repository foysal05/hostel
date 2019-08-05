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
                                            <li class="breadcrumb-item active" aria-current="page"></li>Due List
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="ecommerce-widget">
 
 <div class="row">

    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">Due Student List</h5>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered first">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Photo</th>
                                <th>Name</th>
                                <th>Month</th>
                                <th>Year</th>
                                <th>Due</th>
                                <th>Profile</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query="SELECT * FROM student,payment WHERE v_id=s_id AND due<>0";
                            $result=mysqli_query($con,$query);
                            if(mysqli_num_rows($result)>0){
                                while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){


                                    ?>
                                    <tr>
                                        <td><?php echo $row['v_id']; ?></td>
                                        <td><img src="db/<?php echo $row['photo']; ?>" width="100" height="100"></td>
                                        <td><?php echo $row['fullname']; ?></td>
                                        <td><?php echo $row['month']; ?></td>
                                        <td><?php echo $row['year']; ?></td>
                                        <td><?php echo $row['due']; ?></td>
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
                                <th>Month</th>
                                <th>Year</th>
                                <th>Due</th>
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