<?php
   defined('BASEPATH') OR exit('No direct script access allowed');
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <?php $this->load->view('partner/lib/header.php');?>
   </head>
   <body class="body-bg">
      <?php $this->load->view('partner/lib/top_navigation.php');?>
      <div class="dashboard-wrapper">
         <?php $this->load->view('partner/lib/side_navigation.php');?>
         <div class="dashboard-content">
            <div class="container-fluid">
               <div class="row page-head">
                  <h2 class="find">Create trending content</h2>
               </div>
               <br>
               <div class="row">
                  <div class="col-sm-12 col-md-12 px-0 mb-2">
                     <div class="dbox dbox--color-3 shadow ">
                        <div class="dbox__body">
                           <p class="dbox__count"> Upkeep keeps you updated about trending <br> content required on Jephine  &  You can also earn reward*</p>
                        </div>
                     </div>
                  </div>
               </div>
               <br>
            </div>
         </div>
      </div>
      </div>
      </div>
      <?php $this->load->view('partner/lib/footer-side.php');?>
      </div>
      <?php $this->load->view('partner/lib/footer.php');?>
   </body>
</html>