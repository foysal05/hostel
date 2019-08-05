<?php session_start();
if ($_SESSION['staff_login']==TRUE) {
    include('inc/head.php'); ?>
    <script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
    
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
                                            <li class="breadcrumb-item"><a href="index.php" class="breadcrumb-link">Dashboard</a></li>
                                            <li class="breadcrumb-item active" aria-current="page"></li>bKash Payment
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
                          <strong>Success!</strong> Operation Done Successfully.
                      </div>
                      <?php
                  }else if (isset($_GET['application_req'])) {
                    ?>
                    <div class="alert alert-danger alert-dismissible">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      <strong>Wrong!</strong> Application Field Must Be Filled Out.
                  </div>
                  <?php
              }else if (isset($_GET['id_exist'])) {
                ?>
                <div class="alert alert-danger alert-dismissible">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Wrong!</strong> This Student ID already Exist.
              </div>
              <?php
          }

          ?>
          <!-- <a class="btn btn-primary" href="complain.php">Drop Your Complain</a> -->
          <br>
          <div class="ecommerce-widget">

             <div class="row">

                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <h5 class="card-header">Due Payment</h5>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered first">
                                    <thead>
                                        <tr>

                                            <th>Payment ID</th>
                                            <th>Amount</th>
                                            <th>STD ID</th>
                                            <th>TrxID</th>
                                            <th>Date</th>
                                            <th>Status</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query="SELECT * FROM payment_request";
                                        $result=mysqli_query($con,$query);
                                        if(mysqli_num_rows($result)>0){
                                            while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
                                                ?>
                                                <tr>
                                                    <td><?php echo $row['payment_id']; ?></td>

                                                    <td><?php echo $row['amount']; ?></td>
                                                    <td><?php echo $row['std_id']; ?></td>
                                                    <td><?php echo $row['trxid']; ?></td>
                                                    <td><?php echo $row['date']; ?></td>
                                                    <td>
                                                        <?php  
                                                        if ($row['status']=='Pending') {
                                                            ?>
                                                            <a href="db/db_payment.php?done&onlineDueid=<?php echo $row['payment_id'];?>&amount=<?php echo $row['amount'];?>" class="btn btn-danger btn-xs"> <i class="fas fa-arrow-circle-down"></i></a> 
                                                            <?php
                                                        }else{
                                                            ?>
                                                            <a href="#" class="btn btn-success btn-xs"> <i class="fas fa-check-circle"></i></a>  
                                                            <?php
                                                        }

                                                        ?>
                                                        
                                                    </td>


                                                </tr>
                                                <?php   
                                            }
                                        }
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>

                                         <th>Payment ID</th>
                                         <th>Amount</th>
                                         <th>STD ID</th>
                                         <th>TrxID</th>
                                         <th>Date</th>
                                         <th>Status</th>
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
                <h5 class="card-header">New Payment</h5>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered first">
                            <thead>
                                <tr>

                                    <th>STD ID</th>
                                    <th>Date</th>
                                    <th>Amount</th>
                                    <th>TrxID</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query="SELECT * FROM payment WHERE received_by='Pending'";
                                $result=mysqli_query($con,$query);
                                if(mysqli_num_rows($result)>0){
                                    while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
                                        ?>
                                        <tr>
        <td><?php echo $row['s_id']; ?></td>
        <td><?php echo $row['date']; ?></td>
        <td><?php echo $row['amount']; ?></td>
        <td><?php echo $row['trxid']; ?></td>
                                            <td>
                                                <?php  
                                                if ($row['received_by']=='Pending') {
                                                    ?>
                                                    <a href="db/db_payment.php?done&id=<?php echo $row['p_id'];?>" class="btn btn-danger btn-xs"> <i class="fas fa-arrow-circle-down"></i></a> 
                                                    <?php
                                                }else{
                                                    ?>
                                                    <a href="#" class="btn btn-success btn-xs"> <i class="fas fa-check-circle"></i></a>  
                                                    <?php
                                                }

                                                ?> 
                                            </td>


                                        </tr>
                                        <?php   
                                    }
                                }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>

                                    <th>STD ID</th>
                                    <th>Date</th>
                                    <th>Amount</th>
                                    <th>TrxID</th>
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

</div>

</div>
</div>


<?php include('inc/footer.php'); ?>

<?PHP

}else{
    header('location:index.php');
}

?>