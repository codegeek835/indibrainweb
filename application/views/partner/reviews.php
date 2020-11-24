<?php
   defined('BASEPATH') OR exit('No direct script access allowed');
   
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Celyboom | Vendor Reviews</title>
      <?php $this->load->view('vendor/include/header.php');?>
   </head>
   <body class="body-bg">
      <?php $this->load->view('vendor/include/top_navigation.php');?>
      <div class="dashboard-wrapper">
         <?php $this->load->view('vendor/include/side_navigation.php');?>
         <div class="dashboard-content">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-xl-12 col-lg-10 col-md-9 col-sm-12 col-12">
                     <div class="dashboard-page-header">
                        <h3 class="dashboard-page-title">Reviews</h3>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                     <div class="card-footer table-view">
                        <a href="#">All Reviews</a>
                     </div>
                     <div class="card review-summary-table table-responsive">
                        <table class="table">
                           <thead>
                              <tr>
                                 <th>Name</th>
                                 <th>Rating</th>
                                 <th>Email</th>
                                 <th>Date</th>
                                 <th>Action</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php if($review_info){foreach($review_info as $review){?>
                              <tr>
                                 <td class="review-summary-name"><?php echo $review->name;?></td>
                                 <td class="review-summary-rating"> 
                                    <?php
                                       if($review->rating == '1'){?>
                                    <span class="rated"><i class="fa fa-star"></i> <i class="far fa-star"></i> <i class="far fa-star"></i> <i class="far fa-star"></i> <i class="far fa-star"></i></span><span class="ml-2">1</span>
                                    <?php }else if($review->rating == '2') {?>
                                    <span class="rated"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="far fa-star"></i> <i class="far fa-star"></i> <i class="far fa-star"></i></span><span class="ml-2">2</span>
                                    <?php }elseif ($review->rating == '3') {?>
                                    <span class="rated"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="far fa-star"></i> <i class="far fa-star"></i></span><span class="ml-2">3</span>
                                    <?php }elseif ($review->rating == '4') { ?>
                                    <span class="rated"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="far fa-star"></i></span><span class="ml-2">4</span>
                                    <?php }else{ ?>
                                    <span class="rated"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></span><span class="ml-2">5</span>
                                    <?php } ?>
                                 </td>
                                 <td class="review-summary-id"><?php echo $review->email;?></td>
                                 <td class="review-summary-time"><?php echo date("j F Y",strtotime($review->date));?></td>
                                 <td class="review-summary-action"><a class="btn btn-outline-pink btn-xs" data-toggle="collapse" data-text-swap="close" data-text-original="Details" href="#reviewId-<?php echo $review->id;?>" aria-expanded="false" aria-controls="reviewId-<?php echo $review->id;?>">View Details</a></td>
                              </tr>
                              <?php }}else{?>
                              <tr>
                                 <td colspan="6" style="color: red; text-align: center">Sorry not data found</td>
                              </tr>
                              <?php }?>
                              <?php if($review_info){foreach($review_info as $review1){

                              if($review1->user_id){
                                    $user_detail = get_user_details($review1->user_id);
                                    if($user_detail->user_type=='user'){
                                       $img_url = base_url("assets/user/").$user_detail->images;
                                    }elseif($user_detail->user_type=='vendor'){
                                      $img_url = base_url("assets/vendor/").$user_detail->images; 
                                    }
                              }else{
                                 $img_url = base_url("assets/user.png"); 
                              }
                              ?>
                              <tr>
                                 <td colspan="12" class="expandable-info">
                                    <div class="collapse expandable-collapse" id="reviewId-<?php echo $review1->id;?>">
                                       <div class="row">
                                          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                             <!-- review-user -->
                                             <div class="review-user">
                                                <div class="user-img"> <img src="<?php echo $img_url;?>" alt="star rating jquery" class="rounded-circle"></div>
                                                <div class="user-meta">
                                                   <span class="user-name"><?php echo $review1->name;?></span>
                                                   <span class="user-review-date"><?php echo date("j F Y",strtotime($review1->date));?></span>
                                                   <hr>
                                                   <div class="given-review">
                                                      <?php
                                                      if($review1->rating == '1'){?>
                                                      <span class="rated"><i class="fa fa-star"></i> <i class="far fa-star"></i> <i class="far fa-star"></i> <i class="far fa-star"></i> <i class="far fa-star"></i></span><span class="ml-2">1</span>
                                                      <?php }else if($review1->rating == '2') {?>
                                                      <span class="rated"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="far fa-star"></i> <i class="far fa-star"></i> <i class="far fa-star"></i></span><span class="ml-2">2</span>
                                                      <?php }elseif ($review1->rating == '3') {?>
                                                      <span class="rated"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="far fa-star"></i> <i class="far fa-star"></i></span><span class="ml-2">3</span>
                                                      <?php }elseif ($review1->rating == '4') { ?>
                                                      <span class="rated"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="far fa-star"></i></span><span class="ml-2">4</span>
                                                      <?php }else{ ?>
                                                      <span class="rated"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></span><span class="ml-2">5</span>
                                                      <?php } ?>
                                                   </div>
                                                </div>
                                             </div>
                                             <!-- /.review-user -->
                                             <!-- review-descripttions -->
                                             <div class="review-descriptions">
                                                <hr>
                                                <p><?php echo $review1->comment;?></p>
                                             </div>
                                             <!-- /.review-descripttions -->
                                          </div>
                                       </div>
                                    </div>
                                 </td>
                              </tr>
                           <?php }}?>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <?php $this->load->view('vendor/include/footer.php');?>
   </body>
</html>