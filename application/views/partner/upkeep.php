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
               <div class="row">
                  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                     <div class="card">
                        <div class="card-header"> Featured 
                           <span class="tab-r" >
                           <label class="switch">
                           <input type="checkbox" checked>
                           <span class="slider round"></span>
                           </label>
                           </span>
                        </div>
                        <div class="card-body1">
                           <img src="https://indibrainweb.com/uploads/product_1599841113.jpeg" class="card-img-top">
                           <div class="card-body1">
                              <h5 class="card-header"><b>Reward : $ 100</b></h5>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
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