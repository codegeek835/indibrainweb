<?php $this->load->view('front/lib/header.php');?>
<!--== Header End ==-->      
<section style="padding-bottom: 0px;padding-top: 0px;margin-top: 50px;">
   <!-- about-us-1 start -->
   <div style="background: url(<?php echo base_url('assets/front/images/bg.jpg')?>) no-repeat fixed center; background-size: cover; width:100%;height: 300px;">
      <div class="container">
         <div class="row">
            <div class="col-md-8 col-sm-12 centerize-col m-t-110">
               <div class="text-center white-color">
                  <h1 class="font-400 play-font font-italic font-style">CREATIVE PARTNER</h1>
               </div>
         </div>
         </div>
      </div>
   </div>
   <!-- about-us end-->
</section>

 <section class="stap">
      <div class="container">
         <div class="row">
            <div class="col-md-12 text-center">
               <div>
                  <h3 class="roboto-font white-color">Latest Offer Should be runing here e.g. "Get 50% off on Prime Section Use code - INTR050"</h3>
               </div>
            </div>
         </div>
      </div>
   </section>
<!--== Hero Slider End ==-->
   <div class="container m-t-n">
      <div class="row">
         <div class="col-md-3">
            <div class="name">
               <p><?php echo $user_name;?></p>
            </div>
         </div>
         <div class="col-md-9 text-right">
            <div class="likes">
               <p> <span>Assets -<?php echo $assets;?></span> <span>Downloads -<?php echo $download;?></span> <span>Hire</span></p>
            </div>
         </div>
      </div>
   </div>

<!--== What We Offer Start ==-->
<section>
    <div class="container">
        <div class="row">
        <div align="center">
            <?php if($portfolios){foreach($portfolios as $portfolio){?>
                <button type="button" class="btn btn-default filter-button p-b-n" data-filter="<?php echo $portfolio->pro_cat;?>"><?php echo getcatIdName($portfolio->pro_cat);?></button>
            <?php }}?>
        </div>
        <br/>
        <?php if($portfolios){foreach($portfolios as $portfolio){?>
            <?php  foreach(getProductListByCatId($portfolio->pro_cat) as $portfolioImg){ ?>
                <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-12 filter <?php echo $portfolio->pro_cat;?>">
                    <img style="width:360px;" class="img-responsive" src="<?php echo base_url('uploads/'). getSingalImage($portfolioImg->pro_id);?>">
                </div>
            <?php }?>
        <?php }}?>
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
$(document).ready(function(){

    $(".filter-button").click(function(){
        var value = $(this).attr('data-filter');
        
        if(value == "all")
        {
            //$('.filter').removeClass('hidden');
            $('.filter').show('1000');
        }
        else
        {
//            $('.filter[filter-item="'+value+'"]').removeClass('hidden');
//            $(".filter").not('.filter[filter-item="'+value+'"]').addClass('hidden');
            $(".filter").not('.'+value).hide('3000');
            $('.filter').filter('.'+value).show('3000');
            
        }
    });
    
    if ($(".filter-button").removeClass("active")) {
$(this).removeClass("active");
}
$(this).addClass("active");

});
</script>

</body>
</html>