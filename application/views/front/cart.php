<?php $this->load->view('front/lib/header.php');?>
<section style="padding-bottom: 0px;padding-top: 0px;margin-top: 50px;">
  <!-- about-us-1 start -->
  <div style="background: url(<?php echo base_url('assets/front/images/bg.jpg')?>) no-repeat fixed center; background-size: cover; width:100%;height: 300px;">
  <div class="container">
    <div class="row">
        <div class="col-md-8 col-sm-12 centerize-col m-t-110">
           <div class="text-center white-color">
              <h1 class="font-400 play-font font-italic font-style">Cart</h1>
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
      <div class="col-xs-12 col-md-12 ">
        <div class="panel panel-info">
          <div class="panel-heading">
            <div class="panel-title">
              <div class="row">
                <div class="col-xs-6 col-md-6">
                  <p><i class="fa fa-shopping-cart shop"></i> Shopping Cart</p>
                </div>
                <div class="col-xs-6 col-md-6">
                  <a href="<?php echo base_url()?>">
                  <button type="button" class="btn btn-success pull-right">
                    <i class="fa fa-share"></i> Continue shopping
                  </button></a>
                </div>
              </div>
            </div>
          </div>
          <div class="panel-body">
            <?php $cart_content = $this->cart->contents();
            if(count($cart_content)){
              foreach ($cart_content as $items){
            ?>
            <div class="row">
              <div class="col-xs-12 col-md-2">
                <?php if($items['options']['pro_image']){?><img  src="<?php echo base_url('uploads/').$items['options']['pro_image'];?>" alt="product" class="img-responsive"><?php }?>
              </div>
              <div class="col-xs-12 col-md-8">
                <h4 class="product-name">
                  <strong><?php echo $items['name']?></strong>
                </h4>
                <h4>
                  <small><strong>Price : $<?php echo number_format($items['price'],2);?></strong></small><br>
                  <small><strong>Quantity : <?php echo $items['qty'];?> </strong></small>
                </h4>
              </div>
              <div class="col-xs-12 col-md-2 text-right">
                <a class="btn btn-link" href="<?php echo base_url()?>delete-to-cart/<?php echo $items['rowid']?>">
                  <i class="fa fa-trash del"></i>
                </a>
              </div>
            </div>
            <hr style="border: 1px solid #dadada; height:0px;">
            <?php }}else{?>
            <div class="row">
              <div class="col-xs-12 col-md-12">
                <p style="text-align: center; color: red;">Cart empty</p>
              </div>
            </div>
            <?php }?>
            <!-- <div class="row">
              <div class="text-right">
                <div class="col-xs-12 col-md-12">
                  <button type="button" class="btn btn-info">
                    Update cart
                  </button>
                </div>
              </div>
            </div> -->
          </div>
          <?php if(count($cart_content)){ ?>
          <div class="panel-footer">
            <div class="row text-center">
              <div class="col-xs-9">
                <?php $cart_total = $this->cart->total();?>

                <h2 class="text-right"style="margin: 0px 0 10px 0;">Total 
                  <strong>$<?php echo number_format($cart_total,2);?></strong></h2>
              </div>
              <div class="col-xs-3">
                <a href="<?php echo base_url('checkout')?>"  class="btn btn-success">Proceed to Checkout</a>
              </div>
            </div>
          </div>
          <?php }?>
        </div>
      </div>
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