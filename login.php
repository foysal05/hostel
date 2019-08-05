<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
     <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #adc5c9;
    }
    </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div class="card ">
            <div class="card-header text-center">
<h1 style="color:#4656E9"><a href="home/">DIU Home</a></h1>
<h2>Staff Login Page</h2>
<a href="student/">Student Login</a>
                <span class="splash-description">Please enter your user information.</span></div>
                 <?php 
    if (isset($_GET['success'])) {
        ?>
        <div class="alert alert-success alert-dismissible">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Success!</strong> Payment Done Successfully.
      </div>
      <?php
  }else if (isset($_GET['wrong'])) {
        ?>
        <div class="alert alert-danger alert-dismissible">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Wrong!</strong> Email or Password Is Wrong 
      </div>
      <?php
  }else if (isset($_GET['ewcaptcha_error'])) {
        ?>
        <div class="alert alert-danger alert-dismissible">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Wrong!</strong> Please Complete Recaptcha Process      </div>
      <?php
  }

  ?>
            <div class="card-body">
                <form action="db/db_login.php" method="post">
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="username" type="email" name="email" placeholder="Email" required="" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" name="password" type="password" required="" placeholder="Password">
                    </div>
                    <div class="form-group">
                    <div class="g-recaptcha " data-sitekey="6Ld9_64UAAAAAHovZEIfDpXvfMhdc5opYQMJNIJV">
                    </div>
                    </div>

                    <br>

                    <button type="submit" name="login" style="background-color: #F4623A; color: white" class="btn  btn-lg btn-block">Sign in</button>
                </form>
            </div>
           <!--  <div class="card-footer bg-white p-0  ">
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="#" class="footer-link">Create An Account</a></div>
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="#" class="footer-link">Forgot Password</a>
                </div>
            </div> -->
        </div>
    </div>
  
    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
</body>
 
</html>