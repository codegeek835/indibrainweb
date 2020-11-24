<!DOCTYPE html>
<html lang="en">
<head>
<!-- Meta -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="Anil z" name="author">
<!-- SITE TITLE -->
<title>Admin Login</title>
<!-- Favicon Icon -->
<!-- Favicon Icon -->
<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url()?>assets/images/favicon.png" />

<!-- Animation CSS -->
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/animate.css" />
<!-- Latest Bootstrap min CSS -->
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap.min.css" />
<!-- Google Font -->
<link href="<?php echo base_url()?>assets/css/css.css" rel="stylesheet" />
<link href="<?php echo base_url()?>assets/css/css1.css" rel="stylesheet" />
<!-- Icon Font CSS -->
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/all.min.css" />
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/ionicons.min.css" />
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/themify-icons.css" />
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/linearicons.css" />
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/flaticon.css" />
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/simple-line-icons.css" />
<!-- Style CSS -->
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/style.css" />
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/responsive.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>

<!-- START MAIN CONTENT -->
<div class="main_content">
  <!-- START LOGIN SECTION -->
  <div class="login_register_wrap section">
      <div class="container">
          <div class="row justify-content-center">
              <div class="col-xl-6 col-md-10">
                  <div class="login_wrap">
                  <div class="padding_eight_all bg-white">
                          <div class="heading_s1">
                              
                    <h3>Please Sign In</h3>
                    <p class="text-success"> 
                     <?php
                          if(isset($success_message)){
                         echo $success_message;
                     }?>
                     </p>
                    <p class="text-danger"> 
                    <?php
                        if(isset($error_message)){
                       echo $error_message;
                    }?>
                    </p>
                          </div>
                          <form role="form" action="<?php echo base_url();?>Login/checklogin" method="post">
                              <div class="form-group">
                                  <input type="email" class="form-control" name="user_email" placeholder="Your Email" autofocus>
                              </div>
                              <div class="form-group">
                                  <input class="form-control" type="password" name="user_password" placeholder="Password">
                              </div>
                              <div class="login_footer form-group">
                                  <div class="chek-form">
                                      <div class="custome-checkbox">
                                        <input class="form-check-input" type="checkbox" name="remember" id="exampleCheckbox1" value="Remember Me">
                                          <label class="form-check-label" for="exampleCheckbox1"><span>Remember me</span></label>
                                      </div>
                                  </div>
                                  
                              </div>
                              <div class="form-group">
                                  <button type="checkbox" class="btn btn-fill-out btn-block" name="remember" value="Remember Me">Log in</button>
                              </div>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- END LOGIN SECTION -->
</div>
<!-- END MAIN CONTENT -->
</body>
</html>