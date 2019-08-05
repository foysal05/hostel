<?php 
session_start();
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
                                            <li class="breadcrumb-item active" aria-current="page"></li>Account Setting
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php 
    if (isset($_GET['changed'])) {
        ?>
        <div class="alert alert-success alert-dismissible">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Success!</strong> Password Changed Successfully.
      </div>
      <?php
  }else if (isset($_GET['password_not_matched'])) {
        ?>
        <div class="alert alert-danger alert-dismissible">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Wrong!</strong> Both Password Not Matched.
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
                    <div class="ecommerce-widget">

    <script type="text/javascript">
        var check = function() {
  if (document.getElementById('password').value ==
    document.getElementById('confirm_password').value) {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'Matching';
  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'Not Matched';
  }
}
    </script>     
<form action="db/db_setting.php" method="post">
    <div class="card-body well">
    <div class="form-group row">
                                    <label class="col-12 col-sm-3 col-form-label text-sm-right"><span style="color: red">*</span>Password</label>
                                    <div class="col-12 col-sm-8 col-lg-6">
                                        <input type="Password" id="password" required="required" placeholder="Enter Password" class="form-control" name="password">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-12 col-sm-3 col-form-label text-sm-right"><span style="color: red">*</span>Confirm Password</label>
                                    <div class="col-12 col-sm-8 col-lg-6">
                                        <input id="confirm_password"  onkeyup='check();' type="Password" required="" placeholder="Confirm Password" class="form-control" name="cpassword">
                                        <span id='message'></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                     <label class="col-12 col-sm-3 col-form-label text-sm-right"></label>
                                    <div class="col-12 col-sm-8 col-lg-6">
                                         <input type="submit" class="btn btn-primary btn-block" value="Change Password" name="change">
                                    </div>
                                </div>
                               
</form>

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
       