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
                                            <li class="breadcrumb-item active" aria-current="page"></li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php 
    if (isset($_GET['approved'])) {
        ?>
        <div class="alert alert-success alert-dismissible">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Success!</strong> Application Approved.
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
                    <div class="ecommerce-widget">

                      <div class="row">

                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Student List</h5>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example" class="table table-striped table-bordered first">
                                            <thead>
                                                <tr>

                                                    <th>Application</th>
                                                    <th>Date</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $query="SELECT * FROM leave_application";
                                                $result=mysqli_query($con,$query);
                                                if(mysqli_num_rows($result)>0){
                                                    while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){


                                                        ?>
                                                        <tr>
                                                            <td><?php echo $row['application']; ?></td>

                                                            <td><?php echo $row['date']; ?></td>
    <?php
if ($row['status']=='Pending') {
   ?>
<td><a class="btn btn-success" href="db/db_leave.php?leave_id=<?php echo $row['l_id']; ?>"><?php echo $row['status']; ?></a></td>
   <?php 
}else{
    ?>
<td><?php echo $row['status']; ?></td>
    <?php
}

    ?>
    


                                                        </tr>
                                                        <?php   
                                                    }
                                                }
                                                ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>

                                                    <th>Application</th>
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