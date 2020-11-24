<?php $this->load->view('front/lib/header.php');?>
<section style="padding-bottom: 0px;padding-top: 0px;margin-top: 50px;">
   <!-- about-us-1 start -->
   <div style="background: url(<?php echo base_url('assets/front/images/bg.jpg')?>) no-repeat fixed center; background-size: cover; width:100%;height: 300px;">
      <div class="container">
         <div class="row">
            <div class="col-md-8 col-sm-12 centerize-col m-t-110">
               <div class="text-center white-color">
                  <h1 class="font-400 play-font font-italic font-style">Checkout</h1>
               </div>
            </div>
         </div>
      </div>
      <!-- about-us end-->
</section>
<!--== Hero Slider End ==-->      
<!--== What We Offer Start ==-->
<section>
<div class="container">
<div class="row">
<?php if(validation_errors()){ ?>
<div class="alert alert-danger" role="alert">
<?php echo validation_errors();?>
</div>
<?php }?>
<form action="<?php echo base_url()?>Checkout/saveOrder" method="post">
<input type="hidden" name="user_id" value="<?php echo getEncrypt($cus_info->user_id);?>">
<div class="col-md-8 mt-40 mb-30 ">
<h4 class="p-l-15">Billing Address</h4>
<div class="form-group from-bot">
<div class="col-md-12">
<label for="first_name">
<h4>Full name</h4>
</label>
<input type="text" class="form-control" value="<?php echo $cus_info->username;?>" placeholder="Full Name" name="bill_username">
</div>
</div>
<div class="form-group from-bot">
<div class="col-md-6">
<label for="email">
<h4>Email</h4>
</label>
<input type="email" class="form-control" value="<?php echo $cus_info->user_email;?>" placeholder="Enter email" name="bill_email">
</div>
</div>
<div class="form-group from-bot">
<div class="col-md-6">
<label for="mobile">
<h4>Mobile</h4>
</label>
<input type="text" class="form-control"  value="<?php echo $cus_info->user_phone;?>" placeholder="Enter Mobile Number" name="bill_phone">
</div>
</div>
<div class="form-group from-bot">
<div class="col-md-12">
<label for="email">
<h4>Address</h4>
</label>
<input type="text" class="form-control" value="<?php echo $cus_info->address;?>" placeholder="Address" name="bill_address" required>
</div>
</div>
<div class="form-group from-bot">
<div class="col-md-6">
<label for="email">
<h4>City</h4>
</label>
<input type="text" class="form-control" placeholder="City" name="bill_city" value="<?php echo $cus_info->city;?>" required>
</div>
</div>
<div class="form-group from-bot">
<div class="col-md-6">
<label for="email">
<h4>State</h4>
</label>
<input type="text" class="form-control" placeholder="State" name="bill_state" value="<?php echo $cus_info->state;?>" required>
</div>
</div>
<div class="form-group from-bot">
<div class="col-md-6">
<label for="email">
<h4>Country</h4>
</label>
<input type="text" class="form-control" name="bill_country" value="<?php echo $cus_info->country;?>" placeholder="Country" required>
</div>
</div>
<div class="form-group from-bot">
<div class="col-md-6">
<label for="email">
<h4>Pin Code</h4>
</label>
<input type="number" class="form-control" value="<?php echo $cus_info->pincode;?>" placeholder="Post Code" name="bill_pincode" required>
</div>
</div>
<hr>
</div>
<div class="col-md-4 border mt-40 mb-30">
<div class="m-b30">
<div class="wt-box your-order-list bg-white p-a20">
<div class="row">
<div class="col-md-12 col-sm-12">
<div class="form-group">
<label><h4>Additional Information</h4></label>
<textarea class="form-control" rows="5" name="payment_message" id="comment"></textarea>
</div>
</div>
</div>
</div>
<div class="your-order-list m-t15">
<ul class="list-group mb-3">
<?php 
   $cart_content = $this->cart->contents();
   
   foreach ($cart_content as $items){ ?>
<li class="list-group-item d-flex justify-content-between lh-condensed">
<div>
<p class="my-0 m-table"><?php echo $items['name']?></p>
<small class="text-muted"> Quantity : <?php echo $items['qty']?></small>
</div>
<span class="text-muted"><strong>$<?php echo number_format($items['price'],2);?></strong></span>
</li>
<?php }?>
<?php $cart_total = $this->cart->total(); ?> 
<li class="list-group-item d-flex justify-content-between">
<span>Total </span>
<strong>$<?php echo number_format($cart_total,2);?></strong>
<input type="hidden" name="order_total" value="<?php echo $cart_total;?>">
</li>
</ul>                  
</div>
<div class="your-order-list m-t15">
<div class="custom-control custom-checkbox">
<input type="checkbox" class="custom-control-input check-d">
<label class="custom-control-label" for="save-info">Accept Terms and Conditions</label>
</div>
</div>
<div class="your-order-list m-t15">
<div class="d-block my-3">
<h4>Delivery choice</h4>
<div class="custom-control custom-radio">
<input id="paypal" name="payment_gateway" type="radio" class="custom-control-input radio-d" value="paypal" checked="">
<label class="custom-control-label" for="paypal">Paypal</label>
</div>
</div>
</div>
<br>
<button type="submit" class="btn btn-primary btn-sm" style="width: 100%;font-size: 14px;">Proceed to Payment</button>
<br><br>
</div>
</div>
</form>
</div>
</div>
</section>
<!--== What We Offer End ==-->
<!--== Footer Start ==-->
<footer class="footer">
<?php $this->load->view('front/lib/footer.php');?>
</footer>
<!--== Footer End ==-->
</div>
<!--== Wrapper End ==-->
<?php $this->load->view('front/lib/footer-js.php');?>
</body>
</html>