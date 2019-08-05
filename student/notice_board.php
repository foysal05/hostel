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
                                        <li class="breadcrumb-item"><a href="index.php" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page"></li>Notice Board
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end pageheader  -->
                <!-- ============================================================== -->
                <div class="ecommerce-widget">

               <div class="row">
               <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">Notice List</h5>
                    <div class="card-body">
                       <div class="table-responsive">
                         <table id="example" class="table table-striped table-bordered first">
                            <thead>
                                <tr>
                                   
                                    <th>Heading</th>
                                    <th>Description</th>
                                    
                                    

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query="SELECT * FROM notice ORDER BY id DESC";
                                $result=mysqli_query($con,$query);
                                if(mysqli_num_rows($result)>0){
                                    while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){


                                        ?>
                                        <tr>
      <td><?php echo $row['heading']; ?></td>
      
      <td><?php echo $row['body']; ?></td>

      
    
  

                                              </tr>
                                              <?php   
                                          }
                                      }
                                      ?>
                                  </tbody>
                                  <tfoot>
                                    <tr>

                                    <th>Heading</th>
                                    <th>Description</th>
                                   
                                    </tr>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end horizontal form -->
            <!-- ============================================================== -->
        </div>
        </div>
       




    
</div>
</div>
<!-- ============================================================== -->
<!-- footer -->
<!-- ============================================================== -->

<?php include('inc/footer.php'); ?>
<!-- ============================================================== -->
<!-- end footer -->
<!-- ============================================================== -->
 <?PHP

}else{
    header('location:index.php');
}

?>