<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta content="Anil z" name="author" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <?php $this->load->view('front/lib/header-css.php');?>
</head>
<body>

<!-- START HEADER -->
<header class="header_wrap fixed-top header_with_topbar">
	<?php $this->load->view('front/lib/header-top.php');?>
	<?php $this->load->view('front/lib/header-middle-menu.php');?>
</header>
<!-- END HEADER -->

<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_gray page-title-mini">
    <?php $this->load->view('front/lib/breadcrumb_section.php');?> 
</div>
<!-- END SECTION BREADCRUMB -->

<!-- START MAIN CONTENT -->
<div class="main_content">
	<!-- START SECTION SHOP -->
	<div class="section">
		<div class="container">
      <div class="row">
        <div class="col-lg-6">
        	<?php if($this->session->flashdata('flash_msg')){ ?>
        	<div class="alert alert-danger" role="alert">
        		<?php echo $this->session->flashdata('flash_msg'); ?>
        	</div>
        	<?php }?>
        	<div class="login_wrap">
        		<div class="padding_eight_all bg-white">
              <div class="heading_s1">
                <h3>Login</h3>
              </div>
              <form action="<?php echo base_url()?>customer-login" method="post">
                <div class="form-group">
                  <input type="email" class="form-control" name="cus_email" placeholder="Email Address">
                </div>
                <div class="form-group">
                  <input class="form-control" type="password" name="cus_password" placeholder="Password">
                </div>
                <div class="login_footer form-group">
                  <div class="chek-form">
                    <div class="custome-checkbox">
                      <input class="form-check-input checkbox" type="checkbox" name="remember" value="on">
                      <label class="form-check-label" for="exampleCheckbox1"><span>Remember me</span></label>
                    </div>
                  </div>
                  <a href="#">Forgot password?</a>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-fill-out btn-block" name="login">Log in</button>
                </div>
              </form>
              <div class="different_login">
                  <span> or</span>
              </div>
              <ul class="btn-login list_none text-center">
                <li><a href="#" class="btn btn-facebook"><i class="ion-social-facebook"></i>Facebook</a></li>
                <li><a href="#" class="btn btn-google"><i class="ion-social-googleplus"></i>Google</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
        	<?php if(validation_errors()){ ?>
        	<div class="alert alert-danger" role="alert">
        		<?php echo validation_errors();?>
        	</div>
        	<?php }?>
        	<div class="login_wrap">
        		<div class="padding_eight_all bg-white">
              <div class="heading_s1">
                <h3>Create an Account</h3>
              </div>
              <form action="<?php echo base_url()?>customer-registration" method="post">
                <div class="form-group">
                  <input type="text" class="form-control" name="cus_name" placeholder="Enter Your Name" value="<?php echo set_value('cus_name'); ?>">
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" name="cus_email" placeholder="Enter Your Email" value="<?php echo set_value('cus_email'); ?>">
                </div>
                <div class="form-group">
                  <input class="form-control" type="password" name="cus_password" placeholder="Password">
                </div>
                <div class="form-group">
                  <input class="form-control" type="password" name="con_pass" placeholder="Confirm Password">
                </div>
                <!-- <div class="login_footer form-group">
                  <div class="chek-form">
                    <div class="custome-checkbox">
                      <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox2" value="">
                      <label class="form-check-label" for="exampleCheckbox2"><span>I agree to terms &amp; Policy.</span></label>
                    </div>
                  </div>
                </div> -->
                <div class="form-group">
                  <button type="submit" class="btn btn-fill-out btn-block" name="register">Register</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
	  </div>
	</div>
	<!-- END SECTION SHOP -->
</div>
<!-- END MAIN CONTENT -->

<!-- START FOOTER -->
<footer class="footer">
	<?php $this->load->view('front/lib/footer.php');?>
</footer>
<!-- END FOOTER -->
</body>
</html>