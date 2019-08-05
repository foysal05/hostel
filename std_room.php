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
                                        <li class="breadcrumb-item active" aria-current="page"></li>Room
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
               <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">Room List</h5>
                    <div class="card-body">
                       <div class="table-responsive">
                         <table id="example" class="table table-striped table-bordered first">
                            <thead>
                                <tr>
                                    <th>Room NO.</th>
                                    <th>Video</th>
                                    <th>Seat Price</th>
                                    <th>Seat Capacity</th>
                                    
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query="SELECT * FROM room";
                                $result=mysqli_query($con,$query);
                                if(mysqli_num_rows($result)>0){
                                    while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){


                                        ?>
                                        <tr>
      <td><?php echo $row['room_no']; ?></td>
      <td>
      <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal<?php echo $row['room_no']; ?>">
  Video
</button>  


      </td>
      <td><?php echo $row['seat_price']; ?></td>

      <td>
               <?php
                  
                            $room_no=$row['room_no'];
                    $sql="SELECT * FROM std_seat WHERE room='$room_no'";
                     $result2=mysqli_query($con,$sql);
                    $rowcount=mysqli_num_rows($result2);
                    $sign="";
                    if ($rowcount<$row['room_capacity']) {
                            $sign='success';
                        }else{
                            $sign='danger';
                        }
                            ?>
                            <p class="btn btn-<?php echo $sign; ?>"><?php echo $row['room_capacity']; ?> </p>
                             

                         
      </td>
     
      <!-- Modal -->
<div class="modal fade" id="myModal<?php echo $row['room_no']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
       
        <h4 class="modal-title" id="myModalLabel">Room No : <?php echo $row['room_no']; ?></h4> <button type="button" class="close danger" data-dismiss="modal" aria-hidden="true">×</button>
        
      </div>

<div class="modal-body">
        <video width="740" height="440" controls>
  <source src="db/<?php echo $row['room_video']; ?>" type="video/mp4">
 <!--  <source src="movie.ogg" type="video/ogg"> -->
  Your browser does not support the video tag.
</video>
      </div>

    </div>
  </div>
</div> <!-- /#myModal -->

  <td>
    <?php
if ($sign=='danger') {
  ?>
 <a href="#" style="border: 1px solid gray; color: white" class="btn btn-<?php echo $sign; ?> col">Booked</a>
  <?php
}else{
  ?>
 <a href="db/db_std_seat.php?sid=<?php echo $_GET['vid']; ?>& room_no=<?php echo $row['room_no']; ?>&sign=<?php echo $sign; ?>" style="border: 1px solid gray; color: white" class="btn btn-<?php echo $sign; ?> col">Allocation</a>
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

                                       <th>Room NO.</th>
                                    <th>Video</th>
                                    <th>Seat Price</th>
                                    <th>Seat Capacity</th>
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