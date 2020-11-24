<?php $this->load->view('front/lib/header.php');?>
<?php 
   if($this->session->userdata('ptnr_id')) {
   		redirect("partner-dashboard");
   	}
   ?>
<!--== Header End ==-->
<section class="pb-50 pt-100 dark-grey-bg  bg_area">
   <div class="container">
      <div class="row">
         <div class="col-md-12 text-center">
            <div class="section-title">
               <h2 class="roboto-font text-uppercase">Creative Partner Login</h2>
            </div>
         </div>
         <div class="col-lg-6 col-md-6 col-sm-6 col-md-offset-3  bg-tres">
            <br>
            <?php if($this->session->flashdata('flash_msg')){ ?>
            <div class="alert alert-danger" role="alert">
               <?php echo $this->session->flashdata('flash_msg'); ?>
            </div>
            <?php }?>
            <?php if($this->session->flashdata('flash_msg_suu')){ ?>
            <div class="alert alert-success" role="alert">
               <?php echo $this->session->flashdata('flash_msg_suu'); ?>
            </div>
            <?php }?>
            <div class="page-notfound text-left" style="padding-left: 50px; padding-right: 50px; padding-top: 50px; padding-bottom: 10px;">
               <form action="<?php echo base_url()?>partner-post-login" method="post">
                  <div class="form-group">
                     <label for="email">Email:</label>
                     <input type="email" class="form-control" name="email" placeholder="Email Address" value="<?php if(isset($_COOKIE["partnerLoginId"])) { echo $_COOKIE["partnerLoginId"]; } ?>" required>
                  </div>
                  <div class="form-group">
                     <label for="pwd">Password:</label>
                     <input class="form-control" type="password" name="password" placeholder="Password" value="<?php if(isset($_COOKIE["partnerLoginPass"])) { echo $_COOKIE["partnerLoginPass"]; } ?>" required>
                  </div>
                  <div class="form-group">
                     <div>
                        <input class="form-check-input" type="checkbox" style="width: 5%;" name="remember" <?php if(isset($_COOKIE["partnerLoginId"])) { ?> checked="checked" <?php } ?>>
                        <label class="form-check-label"> Remember me</label>
                     </div>
                  </div>
                  <input type="submit" name="submit" class="btn btn-info btn-md" value="Log In">
               </form>
            </div>
            <br>
            <p class="text-center">Don't have an account &nbsp;<a href="<?php echo base_url()?>partner-register">Sign Up</a></p>
         </div>
      </div>
   </div>
</section>
<footer class="footer">
   <?php $this->load->view('front/lib/footer.php');?>
</footer>
</div>
<!--== Wrapper End ==-->
<?php $this->load->view('front/lib/footer-js.php');?>
</body>
</html>