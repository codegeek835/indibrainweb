<?php $this->load->view('front/lib/header.php');?>
<!--== Header End ==-->
<section class="pb-50 pt-100 bg_area">
   <div class="container">
      <div class="row">
         <div class="col-lg-6 col-md-6 col-sm-6 col-md-offset-3 bg-tres">
            <br>
            <?php if($this->session->flashdata('flash_msg')){ ?>
            <div class="alert alert-danger" role="alert">
               <?php echo $this->session->flashdata('flash_msg'); ?>
            </div>
            <?php }?>
            <?php if(validation_errors()){ ?>
            <div class="alert alert-danger" role="alert">
               <?php echo validation_errors();?>
            </div>
            <?php }?>
            <div class="page-notfound text-left padding-60">
               <div class="col-md-12 text-center">
                  <div class="section-title">
                     <h2 class="roboto-font">Sign Up</h2>
                  </div>
               </div>
               <form action="<?php echo base_url()?>save-register" method="post" class="signup">
                    <div class="row">
                       <div class="col-md-5 l-r"><a href="#" class="btn-login-with bg1 m-b-20"><i class="fa fa-facebook"></i> Continue With Facebook</a></div>
                       <div class="col-md-2 m-b-53">or</div>
                     <div class="col-md-5 l-r"> <a href="#" class="btn-login-with bg2 m-b-20"><i class="fa fa-google"></i> Continue With Google</a></div>
                  </div>
                  <div class="row">
                     <div class="col-md-6">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" placeholder="Full Name" name="name" value="<?php echo set_value('name');?>">
                     </div>
                     <div class="col-md-6">
                        <label for="phn">Phone Number:</label>
                        <input type="text" class="form-control"  placeholder="Phone Number" name="phone" value="<?php echo set_value('phone');?>">
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-12">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control"  placeholder="Email" name="email" value="<?php echo set_value('email');?>">
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-6">
                        <label for="pwd">Password:</label>
                        <input type="password" class="form-control"  placeholder="Password" name="password" value="<?php echo set_value('password');?>">
                     </div>
                     <div class="col-md-6">
                        <label for="pwd">Password Confirmation:</label>
                        <input type="password" class="form-control"  placeholder="Password Confirmation" name="con_pass">
                     </div>
                  </div>
                  <div class="form-group text-center">
                     <p class="text-dark">By joining Jephine, you accept our Membership Agreement, <a href="#"><b>Privacy Policy</b></a> and <a href="#"><b>Terms of Use.</b></a></p>
                  </div>
                  <div class="form-group text-center">
                     <input type="submit" name="submit" class="btn bt-log btn-lg" value="Create Account">
                  </div>
                  <div class="sign_in">
                  <p class="text-center">Already A Member? &nbsp;<a href="<?php echo base_url()?>login">Sign In Here</a></p>
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