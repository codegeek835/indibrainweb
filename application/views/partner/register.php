<?php $this->load->view('front/lib/header.php');?>
<!--== Header End ==-->
<section class="pb-50 pt-100 dark-grey-bg  bg_area">
   <div class="container">
      <div class="row">
         <div class="col-md-12 text-center">
            <div class="section-title">
               <h2 class="roboto-font text-uppercase">Creative Partner Register</h2>
            </div>
         </div>
         <div class="col-lg-6 col-md-6 col-sm-6 col-md-offset-3  bg-tres">
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
            <div class="page-notfound text-left" style="padding-left: 50px; padding-right: 50px; padding-top: 50px; padding-bottom: 10px;">
               <form action="<?php echo base_url()?>partner-save-register" method="post">
                  <div class="form-group">
                     <label for="name">Name:</label>
                     <input type="text" class="form-control" placeholder="Full Name" name="name" value="<?php echo set_value('name');?>">
                  </div>
                  <div class="form-group">
                     <label for="email">Email:</label>
                     <input type="email" class="form-control"  placeholder="Email" name="email" value="<?php echo set_value('email');?>">
                  </div>
                  <div class="form-group">
                     <label for="phn">Phone Number:</label>
                     <input type="text" class="form-control"  placeholder="Phone Number" name="phone" value="<?php echo set_value('phone');?>">
                  </div>
                  <div class="form-group">
                     <label for="pwd">Password:</label>
                     <input type="password" class="form-control"  placeholder="Password" name="password" value="<?php echo set_value('password');?>">
                  </div>
                  <div class="form-group">
                     <label for="pwd">Password Confirmation:</label>
                     <input type="password" class="form-control"  placeholder="Password Confirmation" name="con_pass">
                  </div>
                  <input type="submit" name="submit" class="btn btn-info btn-md" value="Sign Up">
               </form>
            </div>
            <br>
            <p class="text-center">Already have an account &nbsp;<a href="<?php echo base_url()?>partner-login">Log In</a></p>
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