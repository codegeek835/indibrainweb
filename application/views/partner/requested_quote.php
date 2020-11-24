<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Celyboom | Vendor Requested Quotes</title>
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
                        <h3 class="dashboard-page-title">Requested Quotes</h3>
                     </div>
                  </div>
               </div>
               <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                 <div class="card-footer table-view">
                <a href="#">All Requested Quote</a>
                
              </div>
              <div class="card request-list-table table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th style="width: 150px;">Product Name</th>
                        <th style="width: 150px;">Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Date</th>
                        <th>Book Type</th>
                        <th>Description</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if($quote_info){foreach($quote_info as $quote){?>
                        <tr>
                          <td class="requester-name"><?php echo get_product_name($quote->product_id);?></td>
                          <td class="wedding-date"><?php echo $quote->name;?></td>
                          <td class="requester-id"><?php echo $quote->email;?></td>
                          <td class="requester-phone"><?php echo $quote->phone;?></td>
                          <td class="requester-action"><?php echo $quote->date_book;?></td>
                          <td class="requester-action">
                            <?php 
                             if($quote->book_type == 'enquiry'){
                                 echo "<span class='badge badge-danger'>Enquiry</span>";
                             }else{
                                 echo "<span class='badge badge-success'>Booking</span>";
                             }
                             ?>
                          </td>

                          <td class="requester-action"><?php echo $quote->comment;?></td>
                        </tr>
                      <?php }}else{?>
                        <tr> <td colspan="6" style="color: red; text-align: center">Sorry not data found</td></tr>
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