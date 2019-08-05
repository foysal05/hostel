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
  }else if (isset($_GET['delete'])) {
        ?>
        <div class="alert alert-danger alert-dismissible">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Deleted!</strong> Room Information Deleted Successfully !
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
                            <h5 class="card-header">Enter Room Info</h5>
                             
                            <div class="card-body">
                                <form action="db/db_room.php" enctype='multipart/form-data' method="post" >
<div class="form-group">
    <label for="inputUserName">Room No</label>
    <input id="inputUserName" onkeypress="return isNumberKeyND(event)" type="text" name="room_no" required=""  data-parsley-trigger="change" required="" value="<?php 
    if(isset($_GET['edit'])) echo $_GET['room_no'];
    ?>" placeholder="Enter Room No." autocomplete="off" class="form-control">
</div>
<div class="form-group">
    <label for="inputEmail">Seat Capacity</label>
    <input id="inputEmail" onkeypress="return isNumberKeyND(event)" required="" value="<?php 
    if(isset($_GET['edit'])) echo $_GET['room_capacity'];
    ?>" type="text" name="room_capacity" data-parsley-trigger="change" required="" placeholder="Number of Seats" autocomplete="off" class="form-control">
</div>
<?php 
   if(isset($_GET['edit'])){
    ?>
   <div class="form-group">
    <label for="inputEmail">Room Video</label>
    <input id="inputEmail" accept=".mp4,.mkv" value="<?php 
    if(isset($_GET['edit'])) echo $_GET['room_capacity'];
    ?>" type="file" name="room_video" data-parsley-trigger="change"  placeholder="Number of Seats" autocomplete="off" class="form-control">
</div>
    <?php
}else{

   ?>
   <div class="form-group">
    <label for="inputEmail">Room Video</label>
    <input id="inputEmail" accept=".mp4,.mkv" value="<?php 
    if(isset($_GET['edit'])) echo $_GET['room_capacity'];
    ?>" type="file" name="room_video" data-parsley-trigger="change" required="" placeholder="Number of Seats" autocomplete="off" class="form-control">
</div>
   <?php
}
?>


<div class="form-group">
    <label for="inputEmail">Seat Price</label>
    <input id="inputEmail" required="" value="<?php 
    if(isset($_GET['edit'])) echo $_GET['seat_price'];
    ?>" type="text" onkeypress="return isNumberKeyAD(event)" name="seat_price" data-parsley-trigger="change" required="" placeholder="Seat Price" autocomplete="off" class="form-control">
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
                    <h5 class="card-header">Room List</h5>
                    <div class="card-body">
                       <div class="table-responsive">
                         <table id="example" class="table table-striped table-bordered first">
                            <thead>
                                <tr>
                                    <th>Room NO.</th>
                                    <th>Video</th>
                                    <th>Seat+Food Cost</th>
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

      <td><?php echo $row['room_capacity']; ?></td>
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
      <a href="room.php?edit&room_no=<?php echo $row['room_no']; ?>&room_capacity=<?php echo $row['room_capacity']; ?>&video=<?php echo $row['room_video']; ?>&seat_price=<?php echo $row['seat_price']; ?>" class="btn btn-success btn-xs">
          <i class="fas fa-external-link-alt"></i></a>
          <a href="db/db_room.php?delete&id=<?php echo $row['r_id'];?>" class="btn btn-danger btn-xs">
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