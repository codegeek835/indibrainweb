<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard |  Jephine Creative Agency</title>
    <?php $this->load->view('partner/lib/header.php');?>
  </head>
  <body class="body-bg">
    <?php $this->load->view('partner/lib/top_navigation.php');?>
    <div class="dashboard-wrapper">
      <?php $this->load->view('partner/lib/side_navigation.php');?>
      <div class="dashboard-content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-xl-12 col-lg-10 col-md-9 col-sm-12 col-12">
               <div class="dashboard-page-header">
                  <h3 class="dashboard-page-title">Total Orders List</h3>
               </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
              <div class="card-footer table-view">
                <a href="#">Total Orders</a>
                
              </div>
              <div class="card request-list-table table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Image</th>
                      <th>Title</th>
                      <th>Full Name</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Booking Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if($orders){foreach($orders as $order){?>
                      <tr>
                        <td><img src="<?php echo base_url('uploads/').getSingalImage($order->product_id);?>" style="width: 90px;"></td>
                        <td class="wedding-date"><?php echo geProductDetails($order->product_id)->pro_title;?></td>
                        <td class="requester-id"><?php echo geShippingById(geOrderById($order->order_id)->shipping_id)->username;?></td>
                        <td class="requester-phone"><?php echo geShippingById(geOrderById($order->order_id)->shipping_id)->user_email;?></td>
                        <td class="requester-action"><?php echo geShippingById(geOrderById($order->order_id)->shipping_id)->user_phone;?></td>
                        <td class="requester-action"><?php echo geOrderById($order->order_id)->order_date;?></td>
                        <td class="requester-action"></td>
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
      <?php $this->load->view('partner/lib/footer-side.php');?>
    </div>
    <?php $this->load->view('partner/lib/footer.php');?>
  </body>
</html>