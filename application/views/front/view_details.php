<?php $this->load->view('front/lib/header.php');?>
<!--== Header End ==-->    
<style type="text/css">
	.set_color{color: #ff4d4d;}
	.btn-wishlist {
    background-color: #fff;
    border-radius: 4px;
    padding: 11px 10px;
    border: 1px solid #ebebeb;
    color:black;
    font-size: 13px;
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 1px;
}
</style>
<section style="padding-bottom: 0px;padding-top: 0px;margin-top: 50px;">
   <!-- about-us-1 start -->
   <div style="background: url(<?php echo base_url()?>assets/front/images/bg.jpg) no-repeat fixed center; background-size: cover; width:100%;height: 300px;">
      <div class="container">
         <div class="row">
            <div class="col-md-8 col-sm-12 centerize-col m-t-110">
               <div class="text-center white-color">
                  <h1 class="font-400 play-font font-italic font-style">Product Detail</h1>
               </div>
         </div>
         </div>
      </div>
   </div>
   <!-- about-us end-->
</section>
<!--== Hero Slider End ==-->
<!-- <section class="stap">
   <div class="container">
      <div class="row">
         <div class="col-md-12 text-center">
            <div>
               <h3 class="roboto-font white-color">Latest Offer Should be runing here e.g. "Get 50% off on Prime Section Use code - INTR050"</h3>
            </div>
         </div>
      </div>
   </div>
</section> -->

<!--== What We Offer Start ==-->
<section>
    <div class="container">
    <div class="card">
      <div class="container-fliud">
        <div class="row">
          <div class="preview col-md-6">
            <div class="preview-pic tab-content">
              <div class="tab-pane active" id="pic-1"><img style="width: 100%;height: 370px;" src="<?php echo base_url('uploads/'). getSingalImage($product->pro_id);?>" /></div>
            </div>            
          </div>
          
          <div class="details col-md-6">
              <div class="details">
            <h3 class="product-title pt-d"><a href="<?php echo base_url('view-partner/').getEncrypt($product->pro_user_id);?>"><?php echo $product->pro_title;?></a></h3>
            
            <p class="product-description"><?php echo $product->pro_desc;?></p>
            <h4 class="price">current price : <span> <i class="fa fa-inr" aria-hidden="true"></i><?php echo number_format($product->pro_price,2);?></span></h4>
            
            <h5 class="sizes">Dimensions:
              <span class="size">
                <select class="form-control" style="display: inherit;width: 60%;">
                  <option>Original (1333 x 2000)</option>
                  <option>Medium (1280 x 1920)</option>
                  <option>Small (640 x 960)</option>
                </select>
              </span>
            </h5>
            <h5 class="sizes" style="margin: 0px 0 15px 0;">Custom Size:
              <span class="size"><input type="text" class="form-control" style="width: 29%;display: inherit;" placeholder="Width"> </span> 
              <span class="size"><input type="text" class="form-control" style="width: 29%;display: inherit;" placeholder="height"></span> 
            </h5>
            <div class="action">
              <form action="<?php echo base_url()?>add-to-cart" method="post" class="cart">
                <input type="hidden" value="<?php echo $product->pro_id?>" name="pro_id"/>
                <input type="hidden" name="qty" value="1">
                <button type="submit" class="btn btn-success" style="margin-bottom: 10px;"><i class="fa fa-cart-plus"></i> ADD TO CART</button>
                <?php if ($this->session->userdata('user_id')) {?>
                    <a href="javascript:void(0)" class="btn-wishlist" onclick="saveMe('<?php echo $product->pro_id;?>','<?php echo $this->session->userdata('user_id'); ?>')" id="set_data<?php echo $product->pro_id;?>"><i class="fa fa-heart <?php if(getIsTrue($this->session->userdata('user_id'),$product->pro_id)){echo "set_color";}?>" aria-hidden="true"></i></a>
                <?php }else{?>
                    <a href="<?php echo site_url('/login');?>" class="btn-wishlist"><i class="fa fa-heart" aria-hidden="true" ></i></a>
                <?php }?>
              </form>
            </div>
            </div>
          </div>
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
<script>
    var url = "<?php echo base_url('/saveMe/');?>";
    function saveMe(id,user_id)
    {
        if(id && user_id)
        {
        	$.ajax({
        	url: url+id+'-'+user_id,
        	type: "GET",
        	success:function(data) { 
                if(data=='set'){
                    $("#set_data"+id).html('<i class="fa fa-heart set_color" aria-hidden="true"></i>');
                }else if(data=='delete'){
                    $("#set_data"+id).html('<i class="fa fa-heart" aria-hidden="true"></i>');
                } 
        	}
        	});
        }else{
          alert('sorry not working!');
        }
    }
</script>
</body>
</html>