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
                                            <li class="breadcrumb-item active" aria-current="page"></li>Complain
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
          <strong>Success!</strong> Complain Added Successfully.
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
<a class="btn btn-primary" href="complain_list.php">Previous Complain List</a>
<br>
                <div class="ecommerce-widget">
                    <form  name="myForm" action="../db/db_complain.php"  method="post">


                        <textarea name="complain" required></textarea>


                        <script>
                            CKEDITOR.replace('complain',
                            {
                                height:400,
                                resize_enabled:true,
                                wordcount: {
                                    showParagraphs: false,
                                    showWordCount: true,
                                    showCharCount: true,
                                    countSpacesAsChars: true,
                                    countHTML: false,

                                    maxCharCount: 20}
                                });



                            </script>

                            <input type="submit" class="btn btn-primary btn-block" value="Submit Complain" name="submit">
                        </form>



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