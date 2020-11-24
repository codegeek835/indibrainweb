<?php $this->load->view('front/lib/header.php');?>
<!--== Header End ==-->
<section class="pb-50 pt-100 dark-grey-bg bg_area">
   <div class="container">
      <div class="row">
         
         <div class="col-lg-6 col-md-6 col-sm-6 col-md-offset-3 bg-tres">
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
            <div class="page-notfound padding-60">
                <div class="col-md-12">
            <div class="section-title text-center">
               <h2 class="roboto-font">Sign In</h2>
            </div>
            
         </div>
               <form action="<?php echo base_url()?>post-login" method="post" class="log login">
                   <div class="m-b-53">
                       <div class="col-md-5 l-r"><a href="#" class="btn-login-with bg1 m-b-20"><i class="fa fa-facebook"></i> Continue With Facebook</a></div>
                       <div class="col-md-2"></div>
                     <div class="col-md-5 l-r"> <a href="#" class="btn-login-with bg2 m-b-20"><i class="fa fa-google"></i> Continue With Google</a></div>
                  </div>
                  <div class="col-md-12 m-b-53">or</div>
                  <div class="form-group">
                     <label for="email">Email:</label>
                     <input type="email" class="form-control" name="email" placeholder="Email Address" value="<?php if(isset($_COOKIE["userLoginId"])) { echo $_COOKIE["userLoginId"]; } ?>" required>
                  </div>
                  <div class="form-group">
                     <label for="pwd">Password:</label>
                     <input class="form-control" type="password" name="password" placeholder="Password" value="<?php if(isset($_COOKIE["userLoginPass"])) { echo $_COOKIE["userLoginPass"]; } ?>" required>
                  </div>
                  <div class="form-group text-center">
                  <input type="submit" name="submit" class="btn bt-log btn-lg" value="Sign In">
                  </div>
                  <div class="form-group">
                      <div class="row">
  <div class="col-md-8"><div class="checkbox">
                        <input class="form-check-input" type="checkbox" style="margin-left: 0px; width: 14px;" name="remember" <?php if(isset($_COOKIE["userLoginId"])) { ?> checked="checked" <?php } ?> >
                        <label class="remember"> Remember me</label>
                     </div></div>
  <div class="col-md-4 forgot"><a href="#">Forgot Password?</a></div>
</div>
                     
                     <div class="sign_in text-center">
                    <p>Not a Member? &nbsp;<a href="<?php echo base_url()?>register">Sign Up Here</a></p>
                </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</section>
<footer class="footer">
<div class="footer-copyright">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="copy-right text-center">Copyright © 2020 Jephine | All Rights Reserved.</div>
         </div>
      </div>
   </div>
</div>
</footer>
</div>
<!--== Wrapper End ==-->
<?php $this->load->view('front/lib/footer-js.php');?>
</body>
</html>