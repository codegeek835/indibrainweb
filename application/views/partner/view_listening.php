<?php
   defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Celyboom | Vendor Listed Item </title>
      <?php $this->load->view('vendor/include/header.php');?>
   </head>
   <body class="body-bg">
      <?php $this->load->view('vendor/include/top_navigation.php');?>
      <div class="dashboard-wrapper">
         <?php $this->load->view('vendor/include/side_navigation.php');?>
         <div class="dashboard-content">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-xl-9 col-lg-8 col-md-8 col-sm-12 col-12">
                     <div class="dashboard-page-header">
                        <h3 class="dashboard-page-title">My Listing</h3>
                     </div>
                  </div>
                  <div class="col-xl-3 col-lg-4 col-md-4 col-sm-12 col-12 text-right mb20">
                     <?php echo anchor('vendor/listed', 'Go Back', 'class="btn btn-default btn-sm"') ?>
                  </div>
               </div>
            </div>
            <div class="list-single-carousel">
               <div class="owl-carousel owl-theme owl-slider">
                  <?php 
                  if($product->image_gallery){
                     $gallery = explode(",",$product->image_gallery);
                  }else{
                     $gallery = array();
                  } 
                
                    foreach ($gallery as $value) {
                  ?>
                  <div class="item">
                     <img src="<?php echo base_url("assets/products/").$value; ?>" alt="" class="view-img">
                  </div>
                  <?php } ?>
              </div>
            </div>
            <div class="list-single-second listing">
               <div class="container">
                  <div class="row">
                     <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
                        <div class="vendor-head text-left">
                           <h2 class="mb10"><?php echo $product->title;?></h2>
                           <p class="vendor-address"><?php echo $product->address.' , '.$product->postcode;?><a href="" class="btn-secondary-link ml-2" data-toggle="modal" data-target="#myModal"><span style="padding-right:5px;"><i class="fa fa-map-marker-alt"></i></span>View Map</a> </p>
                        </div>
                     </div>
                  </div>
                  <div class="vendor-meta bg-white border m-0 ">
                     <div class="vendor-meta-item vendor-meta-item-bordered">
                        <span class="vendor-price">
                        Rs <?php echo $product->price;?>
                        </span>
                        <span class="vendor-text">Start From</span>
                     </div>
                     <div class="vendor-meta-item vendor-meta-item-bordered">
                        <span class="vendor-guest">
                        <?php echo $product->completed;?> 
                        </span>
                        <span class="vendor-text">Events Completed</span>
                     </div>
                      <div class="vendor-meta-item vendor-meta-item-bordered">
                         <span class="vendor-guest"><?php echo $product->experience;?></span>
                        <span class="vendor-text">Years Of Experience</span>
                      </div>
                     <div class="vendor-meta-item vendor-meta-item-bordered">
                        <span class="vendor-guest">

                        <?php get_cat_slug($product->category);?> 
                        </span>
                        <span class="vendor-text">Category</span>
                     </div>
                  </div>
               </div>
               <br>
            </div>
            <div class="vendor-content-wrapper">
               <div class="row">
                  <div class="col-xl-8 col-lg-8 col-md-7 col-sm-12 col-12">
                     <!--vendor-details -->
                     <div class="card border card-shadow-none">
                        <h3 class="card-header bg-white">About <?php echo $product->title;?></h3>
                        <div class="card-body"> <?php echo $product->description; ?> </div>
                     </div>
                     <!--vendor-description -->
                     <!-- aminities-block -->
                     <div class="card border card-shadow-none">
                        <h3 class="card-header bg-white">Accommodations</h3>
                        <div class="card-body">
                           <div class="row">
                              <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                 <div class="animities-list">
                                    <ul class="list-unstyled arrow">
                                       <?php 
                                       $accom = explode(",",$product->accommodation);
                                       foreach ($accom as $value) {
                                       ?>
                                       <li><?php echo $value;?></li>
                                       <?php }?>
                                       
                                    </ul>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- /.aminities-block -->
                     <!-- review-block -->
                     <div id="reviews">
                        <div class="card border card-shadow-none ">
                           <div class="card-header bg-white">
                              <h3 class="mb0 d-inline-block">Reviews</h3>
                           </div>
                           <div class="card-body">
                              <div class="review-block">
                                 <div class="row">
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                                <!-- review-sidebar -->
                                                <div class="review-sidebar">  
                                                    <div class="review-total"><?php echo get_total_review($product->id)['total_rat'] ;?> </div>
                                                    <div class="review-text">Reviews</div>
                                                    <?php echo get_total_review($product->id)['btn_rating'] ;?>
                                                    <p><?php echo get_total_review($product->id)['total_rat'] ;?> average based on <?php echo get_total_review($product->id)['total'] ;?> ratings.</p>
                                                </div>
                                                <!-- /.review-sidebar -->
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                                <!-- review-list -->
                                                <div class="review-box">
                                                <div class="review-list">
                                                    <div class="review-for">Excellent</div>
                                                    <div class="review-rating"><span class="rated"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa  fa-star"></i> </span></div>
                                                    <div class="review-number"><?php echo get_total_review($product->id)['excellent'] ;?></div>
                                                </div>
                                                <!-- /.review-list -->
                                                <!-- review-list -->
                                                <div class="review-list">
                                                    <div class="review-for">Good</div>
                                                    <div class="review-rating"><span class="rated"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="far fa-star"></i> </span></div>
                                                    <div class="review-number"><?php echo get_total_review($product->id)['good'] ;?></div>
                                                </div>
                                                <!-- /.review-list -->
                                                <!-- review-list -->
                                                <div class="review-list">
                                                    <div class="review-for">Average</div>
                                                    <div class="review-rating"><span class="rated"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="far fa-star"></i> <i class="far fa-star"></i> </span></div>
                                                    <div class="review-number"><?php echo get_total_review($product->id)['average'] ;?></div>
                                                </div>
                                                <!-- /.review-list -->
                                                <!-- review-list -->
                                                <div class="review-list">
                                                    <div class="review-for">Poor</div>
                                                    <div class="review-rating"><span class="rated"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="far fa-star"></i> <i class="far fa-star"></i> <i class="far fa-star"></i> </span></div>
                                                    <div class="review-number"><?php echo get_total_review($product->id)['poor'] ;?></div>
                                                </div>
                                                <!-- /.review-list -->
                                                <!-- review-list -->
                                                <div class="review-list">
                                                    <div class="review-for">Terrible</div>
                                                    <div class="review-rating"><span class="rated"><i class="fa fa-star"></i> <i class="far fa-star"></i> <i class="far fa-star"></i> <i class="far fa-star"></i> <i class="far fa-star"></i> </span></div>
                                                    <div class="review-number"><?php echo get_total_review($product->id)['terrible'] ;?></div>
                                                </div>
                                                <!-- /.review-list -->
                                            </div>
                                            </div>
                                        </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <?php foreach($review_info as $review){?>
                     <div class="card border card-shadow-none ">
                        <!-- review-user -->
                        <div class="card-header bg-white mb0">
                           <div class="review-user">
                              <div class="user-img"> <img src="http://www.brightechweb.com/Celyboom.com//assets/image/review-pic-1.jpg" alt="star rating jquery" class="rounded-circle img-50"></div>
                              <div class="user-meta">

                                 <h5 class="user-name mb-0"><?php echo $review->name;?>  <span class="user-review-date"><?php echo date("j F Y",strtotime($review->date));?></span></h5>
                                 <div class="given-review">
                                    <span class="rated"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="far fa-star"></i> <i class="far fa-star"></i></span>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- /.review-user -->
                        <div class="card-body">
                           <!-- review-descripttions -->
                           <div class="review-descriptions">
                              <p><?php echo $review->comment;?></p>
                           </div>
                           <!-- /.review-descripttions -->
                        </div>
                     </div>
                     <?php }?>
                     <!-- review-form -->
                  </div>
                  <!-- list-sidebar -->
                  <div class="col-xl-4 col-lg-4 col-md-5 col-sm-12 col-12">
                    <div class="sidebar-venue">
                        <!-- venue-admin -->
                        <?php 
                          $profile_info = get_user_details( $product->user_id);
                          if($profile_info->images){
                            $img_url = base_url("assets/vendor/").$profile_info->images; 
                          }else{
                            $img_url = base_url("assets/image/admin-pic.jpg");
                          }
                        ?>
                        <div class="vendor-owner-profile mb30">
                            <div class="vendor-owner-profile-head">
                              <div class="vendor-owner-profile-img">
                                <img src="<?php echo $img_url;?>" class="rounded-circle" alt="">
                              </div>
                              <h4 class="vendor-owner-name mb0"><?php echo $profile_info->full_name;?></h4>
                            </div>
                            <div class="vendor-owner-profile-content">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><span class="mr-2 text-default"><i class="fas fa-fw fa-map-marker-alt"></i></span><?php echo $profile_info->location;?></li>
                                    <li class="list-group-item"><span class="mr-2  text-default"><i class="fas fa-fw fa-phone"></i></span><?php echo $profile_info->mobile;?></li>
                                    <li class="list-group-item"><span class="mr-2 text-default"><i class="fas fa-fw fa-envelope"></i></span><?php echo $profile_info->user_email;?></li>
                                </ul>
                            </div>
                        </div>
                        <!-- /.venue-admin -->
                      </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Modal -->
      <div class="modal fade" id="myModal" role="dialog">
         <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
               <div class="modal-header">
                  <h4 class="modal-title">Location - Map</h4>
         		   <button type="button" class="close" data-dismiss="modal">&times;</button>
               </div>
               <div class="modal-body">
                  <!-- location -->
                  <div class="card-shadow-none">
                     <div class="card-body">
                        <address>
                            <?php echo $product->address;?>
                        </address>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <?php $this->load->view('vendor/include/footer.php');?>
   </body>
</html>