<?php session_start();
if ($_SESSION['std_login']==TRUE) {
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
          <strong>Success!</strong> Application Submitted Successfully.
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
<a class="btn btn-primary" href="payment.php">Previous Payment History </a>
<br>
<br>
                <div class="ecommerce-widget">
                         <div class="row">
                    <!-- ============================================================== -->
                    <!-- basic form -->
                    <!-- ============================================================== -->
                      <img src="bkash.jpg">
                      <br>
                    <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12 ">
                        <div class="card">
                            <h5 class="card-header">Enter bKash Payment Info</h5>

  <?php
  if (isset($_GET['id'])) {
      
 
$sql="SELECT * FROM payment WHERE s_id='".$_SESSION['v_id']."' AND p_id='".$_GET['id']."'";  
  $sql_result=mysqli_query($con,$sql);
 
    if(mysqli_num_rows($sql_result)>0){
       
        while($row_payment=mysqli_fetch_array($sql_result, MYSQLI_ASSOC)){
$amount= $row_payment['due'];
        }
    }


  ?>                           
                            <div class="card-body">
                                <form action="../db/db_online_payment.php" enctype='multipart/form-data' method="post" >
<div class="form-group">
    <label for="inputUserName">Amount</label>
    <input id="inputUserName" onkeypress="return isNumberKeyND(event)" type="text" name="amount" required="" value="<?php echo $amount;
 ?>" readonly=""  data-parsley-trigger="change" required=""  placeholder="Amount" autocomplete="off" class="form-control">
</div>
<div class="form-group">
    <label for="inputEmail">TrxID</label>
    <input id="inputEmail" onkeypress="return isNumberKeyND(event)" required=""  type="text" name="trxid" data-parsley-trigger="change" required="" placeholder="Enter TrxID" autocomplete="off" class="form-control">
</div>
<input type="hidden" name="p_id" value="<?php echo $_GET['id']; ?>">



                                    <div class="row">

                                        <div class="col-sm-6 pl-0">
                                            <p class="text-right">
                                             <?php 
                                             if(isset($_GET['edit'])){
                                                ?>
                                                <input  type="submit" name="update" class="btn btn-primary" value="Update">
                                                <?php
                                            }else{

                                               ?>
                                               <input  type="submit" name="add" class="btn" style="background-color: #E3106D; color: white" value="Submit">
                                               <?php
                                           }
                                           ?>

                                       </p>
                                   </div>
                               </div>
                           </form>
                       </div>

                       <?php
}else{
                       ?>

                       <?php
}
$sql="SELECT * FROM room,std_seat WHERE room_no='".$_GET['newid']."' AND room.room_no=std_seat.room AND std_seat.std_id='".$_SESSION['v_id']."'";  
  $sql_result=mysqli_query($con,$sql);
 
    if(mysqli_num_rows($sql_result)>0){
       
        while($row_payment=mysqli_fetch_array($sql_result, MYSQLI_ASSOC)){
$amount= $row_payment['seat_price'];
      


  ?>                           
                            <div class="card-body">
                                <form action="../db/db_online_payment.php" enctype='multipart/form-data' method="post" >
<div class="form-group">
    <label for="inputUserName">Amount</label>
    <input id="inputUserName" onkeypress="return isNumberKeyND(event)" type="text" name="amount" required="" value="<?php echo $amount;
 ?>" readonly=""  data-parsley-trigger="change" required=""  placeholder="Amount" autocomplete="off" class="form-control">
</div>
<div class="form-group">
    <label for="inputEmail">TrxID</label>
    <input id="inputEmail" onkeypress="return isNumberKeyND(event)" required=""  type="text" name="trxid" data-parsley-trigger="change" required="" placeholder="Enter TrxID" autocomplete="off" class="form-control">
</div>
<input type="hidden" name="month" value="<?php echo $_GET['month']; ?>">
<input type="hidden" name="year" value="<?php echo $_GET['year']; ?>">



                                    <div class="row">

                                        <div class="col-sm-6 pl-0">
                                            <p class="text-right">
                                             <?php 
                                             if(isset($_GET['edit'])){
                                                ?>
                                                <input  type="submit" name="update" class="btn btn-primary" value="Update">
                                                <?php
                                            }else{

                                               ?>
                                               <input  type="submit" name="newadd" class="btn" style="background-color: #E3106D; color: white" value="Submit">
                                               <?php
                                           }
                                           ?>

                                       </p>
                                   </div>
                               </div>
                           </form>
                       </div>
                       <?php
  }
    }else{
        echo "<h3 style='color:red'>You Are Following Illegal Way</h3>";
    }

                       ?>
                   </div>
               </div>
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