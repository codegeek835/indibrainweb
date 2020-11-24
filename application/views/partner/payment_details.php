<?php
   defined('BASEPATH') OR exit('No direct script access allowed');

   if($this->uri->segment(3)){
     $pay_id = base64_decode(urldecode($this->uri->segment(3)));
     $ci=& get_instance();
     $ci->load->database(); 
     $query = $ci->db->query("SELECT * FROM `request_quote` WHERE `id` = $pay_id");
     $row = $query->result()[0];
   
     $user_id = $row->user_id;
     $user_query = $ci->db->query("SELECT * FROM `users` WHERE `id` = $user_id");
     $user_row = $user_query->result()[0];
   
     $payment_id = $row->payment_id;
     $pay_query = $ci->db->query("SELECT * FROM `payments` WHERE `id` = $payment_id");
     $pay_row = $pay_query->result()[0];
   
     $product_id = $row->product_id;
     $product_query = $ci->db->query("SELECT * FROM `product_list` WHERE `id` = $product_id");
     $product_row = $product_query->result()[0];
   }
   if($product_row->image_gallery){
    $gallery = explode(",",$product_row->image_gallery);
  }else{
    $gallery = array();
  }
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
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
              <div class="dashboard-page-header">
                <h3 class="dashboard-page-title">Order # <?php echo $pay_row->order_id;?> in details</h3>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 ">
              <div class="card">
                <div class="card-body">
                  <h4 class="mb0"><b>General</b></h4>
                  <p><span class="text-danger">Booking Date: </span><?php echo $row->date_book;?></p>
                  <p><span class="text-danger">Booking Time: </span><?php echo $row->date;?></p>
                  <p><span class="text-danger">Status: </span><?php if($pay_row->status){echo "Done";}else{echo "Pending";}?></p>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 ">
              <div class="card">
                <div class="card-body">
                  <h4 class="mb0"><b>Payment</b></h4>
                  <p><span class="text-danger">Name: </span><?php echo $user_row->full_name;?></p>
                  <p><span class="text-danger">Address: </span><?php echo $user_row->location;?></p>
                  <p><span class="text-danger">Email: </span><?php echo $user_row->user_email;?></p>
                  <p><span class="text-danger">Phone: </span><?php echo $user_row->mobile;?></p>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="mb0"><b>Delivery</b></h4>
                  <p><span class="text-danger">Service Address: </span><?php echo $user_row->location.', '.$user_row->postcode;?></p>
                </div>
              </div>
            </div>

          </div>
	        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
              <div class="card-footer table-view">
                <a href="#">Product Details</a>
              </div>
              <div class="card review-summary-table table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>S.No</th>
                      <th>Product</th>
                      <th>Servicd By</th>
                      <th>Price</th>
                      <th>Initial Amt</th>
                      <th>Balance</th>
                      <th>View Invoice</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $i=1;foreach($pay_query->result() as $payment){ 
                      $product_row = productByDetails($payment->product_id);
                      if($product_row->image_gallery){
                        $gallery = explode(",",$product_row->image_gallery);
                      }else{
                        $gallery = array();
                      }

                      $initial  = str_replace(",", "", $payment->amount)-$payment->cgst-$payment->sgst-$payment->igst;
                      ?>
                    <tr>
                      <td><?php echo $i;?></td>
                      <td><img src="<?php echo base_url("assets/products/").$gallery[0];?>" style="width:50px;"></td>
                      <td><?php echo $product_row->title;?></td>
                      <td>Rs <?php echo number_format($product_row->price,2);?></td>
                      <td>Rs <?php echo number_format($initial,2);?></td>
                      
                      <td>Rs <?php if($row->pay_status=='0'){echo number_format($product_row->price - $initial,2);}else{echo "0.00";}?></td>
                      <td><a href="<?php echo site_url('invoice?reqId=').urlencode(base64_encode($row->id)).'&payId='.urlencode(base64_encode($payment->id));?>" target="_blank"><span class="btn btn-info btn-sm">Invoice <i class="fa fa-eye"></i></span></a></td>
                    </tr>
                  <?php $i++;}?>
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