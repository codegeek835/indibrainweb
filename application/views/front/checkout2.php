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
    <?php
        $description        = "Product Description";
        $txnid              = date("YmdHis");     
        $key_id             = "rzp_test_vzLUok1mIIbncq";
        $currency_code      = $currency_code;            
        $total              = (1* 100); // 100 = 1 indian rupees
        $amount             = 1;
        $merchant_order_id  = "ABC-".date("YmdHis");
        $card_holder_name   = 'Abhilash kumar';
        $email              = 'ak4abhilash@gmail.com';
        $phone              = '9000000001';
        $name               = "RazorPay Infovistar";
    ?>
    <section>
        <div class="container">
        <div class="row">
            <?php if(validation_errors()){ ?>
               <div class="alert alert-danger" role="alert">
                  <?php echo validation_errors();?>
               </div>
            <?php }?>
            <form name="razorpay-form" id="razorpay-form" action="<?php echo $callback_url; ?>" method="POST">
            <!--<form action="<?php echo base_url()?>Checkout/saveOrder" method="post">-->
                <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id" />
                <input type="hidden" name="merchant_order_id" id="merchant_order_id" value="<?php echo $merchant_order_id; ?>"/>
                <input type="hidden" name="merchant_trans_id" id="merchant_trans_id" value="<?php echo $txnid; ?>"/>
                <input type="hidden" name="merchant_product_info_id" id="merchant_product_info_id" value="<?php echo $description; ?>"/>
                <input type="hidden" name="merchant_surl_id" id="merchant_surl_id" value="<?php echo $surl; ?>"/>
                <input type="hidden" name="merchant_furl_id" id="merchant_furl_id" value="<?php echo $furl; ?>"/>
                <input type="hidden" name="card_holder_name_id" id="card_holder_name_id" value="<?php echo $card_holder_name; ?>"/>
                <input type="hidden" name="merchant_total" id="merchant_total" value="<?php echo $total; ?>"/>
                <input type="hidden" name="merchant_amount" id="merchant_amount" value="<?php echo $amount; ?>"/>
                <input type="hidden" name="user_id" value="<?php echo getEncrypt($cus_info->user_id);?>">
               <div class="col-md-8 mt-40 mb-30 ">
                  <h4 class="p-l-15">Billing Address</h4>
                   <hr>
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
                     
                     <br>
                     <input  id="pay-btn" type="submit" onclick="razorpaySubmit(this);" value="Proceed to Payment" class="btn btn-primary btn-sm"/>
                     <br>
                     <br>
                  </div>
               </div>
            </form>
        </div>
    </div>
    </section>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        var options = {
            key:            "<?php echo $key_id; ?>",
            amount:         "<?php echo $total; ?>",
            name:           "<?php echo $name; ?>",
            description:    "Order # <?php echo $merchant_order_id; ?>",
            netbanking:     true,
            currency:       "<?php echo $currency_code; ?>", // INR
            prefill: {
              name:       "<?php echo $card_holder_name; ?>",
              email:      "<?php echo $email; ?>",
              contact:    "<?php echo $phone; ?>"
            },
            notes: {
              soolegal_order_id: "<?php echo $merchant_order_id; ?>",
            },
            handler: function (transaction) {
              document.getElementById('razorpay_payment_id').value = transaction.razorpay_payment_id;
              document.getElementById('razorpay-form').submit();
            },
            "modal": {
              "ondismiss": function(){
                location.reload()
             }
            }
        };
    
        var razorpay_pay_btn, instance;
        function razorpaySubmit(el) {
             if(typeof Razorpay == 'undefined') {
               setTimeout(razorpaySubmit, 200);
               if(!razorpay_pay_btn && el) {
                 razorpay_pay_btn    = el;
                 el.disabled         = true;
                 el.value            = 'Please wait...';  
              }
           } else {
            if(!instance) {
              instance = new Razorpay(options);
              if(razorpay_pay_btn) {
                 razorpay_pay_btn.disabled   = false;
                 razorpay_pay_btn.value      = "Pay Now";
              }
           }
           instance.open();
        }
     }  
    </script>
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