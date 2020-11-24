<!DOCTYPE html>
<html lang="en">
   <?php $this->load->view('front/lib/header.php');?>
   <body id="bg">
      <div class="page-wraper">
      <!-- HEADER START -->
      <header class="site-header header-style-1 ">
         <?php $this->load->view('front/lib/header-top.php');?>
         <?php $this->load->view('front/lib/header-middle.php');?>
      </header>
      <!-- HEADER END -->
      <!-- CONTENT START -->
      <div class="page-content bg-gray">
         <!-- SECTION CONTENT START --> 
         <div class="section-full p-t10 p-b10">
            <div class="container">
               <div class="section-content">
                  <div class="row">
                     <div class="logo-404">
                        <a href="<?php echo base_url();?>"><img src="<?php echo base_url()?>assets/front/images/home/logo.png" alt="" /></a>
                     </div>

                     <div class="content-404">
                        <img src="<?php echo base_url()?>assets/front/images/404/404.png" class="img-responsive" alt="" />
                        <h1><b>OPPS!</b> We Couldn’t Find this Page</h1>
                        <p>Uh... So it looks like you brock something. The page you are looking for has up and Vanished.</p>
                        <h2><a href="<?php echo base_url();?>">Bring me back Home</a></h2>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- SECTION CONTENT END -->
         <?php $this->load->view('front/lib/footer.php');?>
      </div>
      <?php $this->load->view('front/lib/footer-js.php');?>
   </body>
</html>