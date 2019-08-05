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
<?php 
    if (isset($_GET['success'])) {
        ?>
        <div class="alert alert-success alert-dismissible">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Success!</strong> Operation Done Successfully.
      </div>
      <?php
  }else if (isset($_GET['error'])) {
        ?>
        <div class="alert alert-danger alert-dismissible">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Wrong!</strong> Something Wrong !
      </div>
      <?php
  }else if (isset($_GET['roomExist'])) {
        ?>
        <div class="alert alert-danger alert-dismissible">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Exist!</strong> This Room Number Already Exist !
      </div>
      <?php
  }

  ?>
                  <div class="row">
                    <!-- ============================================================== -->
                    <!-- basic form -->
                    <!-- ============================================================== -->
                    <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12 ">
                        <div class="card">
                            <h5 class="card-header">Make Notice</h5>
                             
                            <div class="card-body">
                                <form action="db/db_notice_board.php"  method="post" >
<div class="form-group">
    <label for="inputUserName">Notice Heading</label>
    <input id="inputUserName"  type="text" name="heading" required=""  data-parsley-trigger="change" required="" value="<?php 
    if(isset($_GET['edit'])) echo $_GET['heading'];
    ?>" placeholder="Enter Notice Heading." autocomplete="off" class="form-control">
</div>
<?php 
    if(isset($_GET['edit'])){
      ?>
      <input type="hidden" name="id" value="<?php  echo $_GET['id'] ?>">
      <?php
    }
    ?>
<div class="form-group">
    <label for="inputEmail">Notice Description</label>
   <textarea class="form-control" name="description" required=""><?php 
    if(isset($_GET['edit'])) echo $_GET['body'];
    ?></textarea>
</div>


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
                                               <input  type="submit" name="add" class="btn btn-info" value="Submit">
                                               <?php
                                           }
                                           ?>

                                       </p>
                                   </div>
                               </div>
                           </form>
                       </div>
                   </div>
               </div>
               </div>
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
                                    <th>Action</th>
                                    

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

      
    
  <td>
      <a href="notice_board.php?edit&heading=<?php echo $row['heading']; ?>&id=<?php echo $row['id']; ?>&body=<?php echo $row['body']; ?>" class="btn btn-success btn-xs">
          <i class="fas fa-external-link-alt"></i></a>
          <a href="db/db_notice_board.php?delete&id=<?php echo $row['id'];?>" class="btn btn-danger btn-xs">
            <i class="fas fa-trash"></i></a>
        </td>

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
                                    <th>Action</th>
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