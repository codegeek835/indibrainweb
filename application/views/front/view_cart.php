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
         <div class="section-full p-t40 p-b50">
            <div class="container">
               <div class="section-content">
                  
               </div>
            </div>
         </div>
         <!-- SECTION CONTENT END -->
         <?php $this->load->view('front/lib/footer.php');?>
      </div>
      <?php $this->load->view('front/lib/footer-js.php');?>
   </body>
</html>