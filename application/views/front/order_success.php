<?php $this->load->view('front/lib/header.php');?>
<section style="padding-bottom: 0px;padding-top: 0px;margin-top: 50px;">
   <!-- about-us-1 start -->
   <div style="background: url(<?php echo base_url('assets/front/images/bg.jpg')?>) no-repeat fixed center; background-size: cover; width:100%;height: 300px;">
      <div class="container">
         <div class="row">
            <div class="col-md-8 col-sm-12 centerize-col m-t-110">
               <div class="text-center white-color">
                  <h1 class="font-400 play-font font-italic font-style">Order Status</h1>
               </div>
            </div>
         </div>
      </div>
      <!-- about-us end-->
</section>
<section>
	<div class="container">

        <div class="row justify-content-center">

            <div class="col-md-12">

                <div class="text-center order_complete">
                    <div class="heading_s1">

                      <h3>Dear <?php echo $this->session->userdata("user_name");?></h3>

                  	<h3>Your order is completed!</h3>

                    </div>

                  	<p>Thanks for purchase.<br> 
                      Receive your order successfully.<br> 
                      We will contact you ASAP with delivery details. <br>
                      For more details please check your registration mail.</p>
                    
                    <a href="<?php echo base_url();?>" class="btn btn-fill-out">Continue Shopping</a>

                </div>

            </div>

        </div>
  </div>
<section>
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