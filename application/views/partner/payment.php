<?php
   defined('BASEPATH') OR exit('No direct script access allowed');
   
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Celyboom | Vendor Payment</title>
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
                        <h3 class="dashboard-page-title">Payment</h3>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                     <div class="card-footer table-view">
                        <a href="#">All Payment</a>
                     </div>
                     <div class="card review-summary-table table-responsive">
                        <table class="table">
                           <thead>
                              <tr>
                                 <th>Bokking Date</th>
                                 <th>Product</th>
                                 <th>Customer Name</th>
                                 <th>Price</th>
                                 <th>Address</th>
                                 <th>Book Type</th>
                                 <th>Payment</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php foreach($requestQuote as $request){?>
                              <tr>
                                 <td class="wedding-date"><?php echo $request->date_book;?></td>
                                 <td class="requester-name"><a href="<?php echo base_url("/venueDetails/").urlencode(base64_encode($request->product_id));?>" target="_blank"><?php echo productByUserId($request->product_id)->title;?></a></td>
                                 <td class="requester-id"><?php echo getUserName($request->user_id);?></td>
                                
                                 <td class="requester-action">Rs <?php echo number_format(productByUserId($request->product_id)->price,2);?></td>
                                 <td class="requester-name"><?php echo productByUserId($request->product_id)->state.', '.productByUserId($request->product_id)->city;?></td>
                                 <td class="requester-id">
                                    <?php 
                                       if($request->book_type == 'enquiry'){
                                           echo "<span class='badge badge-danger'>Enquiry</span>";
                                       }else{
                                           echo "<span class='badge badge-success'>Booking</span>";
                                       }
                                       ?>
                                 </td>
                                 <td>
                                    <?php 
                                       if($request->book_type == 'booking'){?>
                                    <a href="<?php echo site_url('vendor/payment-details/').urlencode(base64_encode($request->id));?>"><span class="badge badge-info">View Details</span></a>
                                    <?php } ?>
                                 </td>
                              </tr>
                              <?php }?>
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