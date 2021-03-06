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
                                            <li class="breadcrumb-item active" aria-current="page"></li>Add Student
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
                        <!-- ============================================================== -->
                        <!-- valifation types -->
                        <!-- ============================================================== -->
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Enter Student Information</h5>
                                <?php 
                                if (isset($_GET['success'])) {
                                    ?>
                                    <div class="alert alert-success alert-dismissible">
                                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                      <strong>Success!</strong> Student Information Added Successfully.
                                  </div>
                                  <?php
                              }else if (isset($_GET['imgtypeE'])) {
                                ?>
                                <div class="alert alert-danger alert-dismissible">
                                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                  <strong>Wrong!</strong> Please Select Valid Student Photo.
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

                      
                      <div class="card-body">
                          <form action="db/db_student.php" method="post"  enctype='multipart/form-data'>
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right"><span style="color: red">*</span>Full Name</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input type="text" required="required" placeholder="Enter Full Name" class="form-control" name="fullname">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right"><span style="color: red">*</span>Father Name</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input type="text" required="" placeholder="Enter Father Name" class="form-control" name="father_name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right"><span style="color: red">*</span>Mother Name</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input type="text" required="" placeholder="Enter Mother Name" class="form-control" name="mother_name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right"><span style="color: red">*</span>Student ID</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input type="text" required="" onkeypress="return isNumberKeyND(event)"  placeholder="Enter University ID No." class="form-control" name="v_id">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right">NID</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input type="text" onkeypress="return isNumberKeyND(event)"  placeholder="Enter NID Number" class="form-control" name="nid">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right">Email</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input type="email" placeholder="Enter Email Address" class="form-control" name="email">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right">Phone</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input type="text" data-parsley-minlength="6" onkeypress="return isNumberKeyND(event)" placeholder="Enter Phone Number" class="form-control" name="phone">
                                </div>
                            </div>
<!-- <div class="form-group row">
<label class="col-12 col-sm-3 col-form-label text-sm-right"><span style="color: red">*</span>Educational Institute</label>
<div class="col-12 col-sm-8 col-lg-6">
    <input type="text" required=""  placeholder="Enter Educational Institute Name" class="form-control">
</div>
</div> -->
<div class="form-group row">
    <label class="col-12 col-sm-3 col-form-label text-sm-right"><span style="color: red">*</span>Permanent Address</label>
    <div class="col-12 col-sm-8 col-lg-6">
        <textarea required="" placeholder="Enter Permanent Address" class="form-control" name="permanent_address"></textarea>
    </div>
</div>
<div class="form-group row">
    <label class="col-12 col-sm-3 col-form-label text-sm-right"><span style="color: red">*</span>Photo</label>
    <div class="col-12 col-sm-8 col-lg-6">
        <input type="file" name="photo" required="" accept=".jpg,.png,.jpeg,.svg" class="form-control">
    </div>
</div>
<!-- <div class="form-group row">
    <label class="col-12 col-sm-3 col-form-label text-sm-right"><span style="color: red">*</span>Category</label>
    <div class="col-12 col-sm-8 col-lg-6">
        <select class="form-control" required="" name="category">
            <option value="">Select Category</option>
            <?php 
 $query="SELECT * FROM std_category ORDER BY pc_id DESC";
                    $result=mysqli_query($con,$query);
                    if(mysqli_num_rows($result)>0){
                        while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
echo '<option value='.$row['pc_id'].'>'.$row['pc_name'].'-'.$row['amount'].'</option>';
                        }
                    }

             ?>
        </select>
    </div>
</div> -->
<div class="form-group row">
    <label class="col-12 col-sm-3 col-form-label text-sm-right">Additional Information</label>
    <div class="col-12 col-sm-8 col-lg-6">
        <textarea placeholder="Enter Additional Information" class="form-control" name="additional_info"></textarea>
    </div>
</div>
<hr>
<fieldset>

    <legend>Guardian Information</legend>
    <hr>
    <div class="form-group row">
        <label class="col-12 col-sm-3 col-form-label text-sm-right"><span style="color: red">*</span>Full Name</label>
        <div class="col-12 col-sm-8 col-lg-6">
            <input type="text" required="" placeholder="Enter Full Name" class="form-control" name="g_name">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-12 col-sm-3 col-form-label text-sm-right"><span style="color: red">*</span>Relation</label>
        <div class="col-12 col-sm-8 col-lg-6">
            <input type="text" required="" placeholder="Relation With Student" class="form-control" name="relation">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-12 col-sm-3 col-form-label text-sm-right"><span style="color: red">*</span>Address</label>
        
        <div class="col-12 col-sm-8 col-lg-6">
            <textarea required="" placeholder="Enter Address" class="form-control" name="g_address"></textarea>
        </div>
        
    </div>
    <div class="form-group row">
        <label class="col-12 col-sm-3 col-form-label text-sm-right"><span style="color: red">*</span>Email</label>
        <div class="col-12 col-sm-8 col-lg-6">
            <input type="email" required="" placeholder="Enter Email Address" class="form-control" name="g_email">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-12 col-sm-3 col-form-label text-sm-right"><span style="color: red">*</span>Phone</label>
        <div class="col-12 col-sm-8 col-lg-6">
            <input type="text" required="" onkeypress="return isNumberKeyND(event)" placeholder="Enter Phone Number" class="form-control" name="g_phone">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-12 col-sm-3 col-form-label text-sm-right"><span style="color: red">*</span>NID</label>
        <div class="col-12 col-sm-8 col-lg-6">
            <input type="text" required="" onkeypress="return isNumberKeyND(event)" placeholder="Enter NID Number" class="form-control" name="g_nid">
        </div>
    </div>
</fieldset>

<div class="form-group row text-right">
    <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
        <input type="submit" class="btn btn-space btn-primary" name="add" value="Submit">
        <button class="btn btn-space btn-secondary">Cancel</button>
    </div>
</div>
</form>
</div>
</div>
</div>
<!-- ============================================================== -->
<!-- end valifation types -->
<!-- ============================================================== -->
</div>
<div class="row">
   
    
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