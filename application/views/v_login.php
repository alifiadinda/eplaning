<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo base_url();?>assets/login/fonts/icomoon/style.css">

    <link rel="stylesheet" href="<?php echo base_url();?>assets/login/css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/login/css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/login/css/style.css">

    <title>RSUD Kota Malang</title>
  </head>
  <body>
  

  
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-6 order-md-2">
          <img src="<?php echo base_url();?>assets/login/images/rsud.png" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4">
              <h3>Sign In to <strong>E-Planning</strong></h3>
              <p class="mb-4">RSUD Kota Malang.</p>
            </div>
            <form action="<?php echo site_url().'/C_login/login'?>" method="post">
              <div class="form-group first">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username">

              </div>
              <div class="form-group last mb-4">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password">
                
              </div>

              <input type="submit" class="btn text-white btn-block btn-primary">

            </form>
            </div>
          </div>
          
        </div>
        
      </div>
    </div>
  </div>

  
    <script src="<?php echo base_url();?>assets/login/js/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url();?>assets/login/js/popper.min.js"></script>
    <script src="<?php echo base_url();?>assets/login/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/login/js/main.js"></script>
  </body>
</html>