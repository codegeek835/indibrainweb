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
              <h2 class="find">Important insights about your portfolio</h2>
            </div>
            <br>
            <div class="row">
               <div class="col-md-12 col-lg-4">
                  <div class="card border-left-primary">
                     <div class="card-body text-center">
                        <i class="fa fa-download text-c-blue d-block f-40"></i>
                        <h4 class="m-t-20 hs">Maximum Downloads</h4>
                        <p class="m-b-20 ps">Month : <?php echo date("F",strtotime("-0 Months"));?></p>
                        <p class="ps">Downloads :<b> <?php echo $maximumDownload;?></b></p>
                     </div>
                  </div>
               </div>
               <div class="col-md-12 col-lg-4">
                  <div class="card border-left-success">
                     <div class="card-body text-center">
                        <i class="fa fa-upload text-c-green d-block f-40"></i>
                        <h4 class="m-t-20 hs">Maximum Uploads</h4>
                        <p class="m-b-20 ps">Month : <?php echo date("F",strtotime("-0 Months"));?></p>
                        <p class="ps">Uploads :<b> <?php echo $maximumUpload;?></b></p>
                     </div>
                  </div>
               </div>
               <div class="col-md-12 col-lg-4">
                  <div class="card border-left-warning">
                     <div class="card-body text-center">
                        <i class="fa fa-money text-c-red d-block f-40"></i>
                        <h4 class="m-t-20 hs">Maximum Earning</h4>
                        <p class="m-b-20 ps">Month : <?php echo date("F",strtotime("-0 Months"));?></p>
                        <p class="ps">Earning : <b>$ <?php if($maximumEarning){ echo $maximumEarning->price;}else{echo "0";}?></b></p>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                  <div class="card bg-gradient-danger card-img-holder text-white">
                     <div class="card-body">
                        <img src="https://indibrainweb.com/assets/partner/images/circle.svg" class="card-img-absolute" alt="circle-image">
                        <h4 class="font-weight-normal mb-3 text-white">Most Popular Category from<br>  your work  <i class="fa fa-star-o float-right"></i></h4>
                        <h2 class="mb-5 text-white"><?php echo getcatIdName($mostPopularCat);?></h2>
                     </div>
                  </div>
               </div>
               <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                   <?php if(getSingalImage($mostPopular)){?>
                  <div class="img-container shadow ">
                      
                      <img src="<?php echo base_url('uploads/').getSingalImage($mostPopular);?>" style="width: 100%; height: 225px; object-fit: cover;">
                      
                     <div class="text-block">
                        <p>Most Popular Photo</p>
                     </div>
                     <?php }?>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                  <div class="dashboard-page-header page-head2">
                     <h3 class="find">This week’sTop Rankers</h3>
                  </div>
               </div>
            </div>
            <div class="row">
                
                <?php 
                if($topRankers){
                foreach($topRankers as $topRanker){
                $rank = geUserByTopRank($topRanker->pro_user_id);
                ?>
               <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                  <div class="card">
                      <img src="<?php echo base_url('uploads/').getSingalImage($rank['product_id']);?>" class="card-img-top">
                     <div class="card-body1">
                        <h5 class="card-header"><?php echo $rank['name'];?></h5>
                        <p class="card-text">Downloads <?php echo $rank['downloads'];?>+</p>
                     </div>
                  </div>
               </div>
               <?php }}?>
            </div>
         </div>
         
      </div>
      <?php $this->load->view('partner/lib/footer-side.php');?>
      <?php $this->load->view('partner/lib/footer.php');?>
   </body>
</html>