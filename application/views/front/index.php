<?php $this->load->view('front/lib/header.php');?>

<!--== Header End ==-->    
<section style="padding-bottom: 0px;padding-top: 0px;margin-top: 64px;">
   <!-- about-us-1 start -->
   <div id="carousel-example" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carousel-example" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example" data-slide-to="1"></li>
    <li data-target="#carousel-example" data-slide-to="2"></li>
  </ol>

  <div class="carousel-inner">
    <div class="item active">
      <a href="#"><img class="slider-img" src="https://free-images.com/lg/2ef6/f14_tomcats_uss_theodore.jpg" /></a>
    </div>
    <div class="item">
      <a href="#"><img class="slider-img" src="https://free-images.com/lg/32f6/westphalia_germany_landscape_winter.jpg" /></a>
    </div>
    <div class="item">
      <a href="#"><img class="slider-img" src="https://free-images.com/lg/9e46/white_bengal_tiger_tiger_0.jpg" /></a>
    </div>
  </div>
  
  <div class="slider-text">
       <div class="col-md-9 col-sm-12 centerize-col">
               <div class="text-center white-color">
                  <h1 class="font-style top-mt">Make Your World Beautiful With Us</h1>
                  <div class="topnav" id="topNavStatic">
                     <div class="search-container">
                       <form id="submitform" method="GET">
                           <input type="text" placeholder="Search free photos and more" name="s">
                           <input type="hidden" name="cat" value="">
                           <input type="hidden" name="sby" value="all">
                           <input type="hidden" name="ltyp" value="all">
                           <input type="hidden" name="cby">
                           <input type="hidden" name="ornt">
                           <input type="hidden" name="people">
                           <select id="photos" required>
                              <option value="photos">Photos</option>
                              <option value="vector">Vector</option>
                              <option value="psds">PSDs</option>
                              <option value="arts">Arts</option>
                              <option value="prints">Creative Prints</option>
                           </select>
                           <button type="submit" onclick="submit_form()">Search</button>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
  </div>
</div>
   <!-- about-us end-->
</section>
<!-- ddd -->
<!-- si -->
<section class="stap">
   <div>
      <div class="row">
         <div class="col-md-12 text-center">
            <div>
                <marquee onMouseOver="this.stop()" onMouseOut="this.start()"><a href="#"><h3 class="white-color">Latest Offer Should be runing here e.g. "Get 50% off on Prime Section Use code - INTR050"</h3></a></marquee>
               
            </div>
         </div>
      </div>
   </div>
</section>
<!--== What We Offer Start ==-->
<section>
   
   <div class="container-margin">
      <div class="row">
         <div class="col-md-12 text-center">
            <div class="section-title">
               <h2 class="roboto-font text-uppercase">Discover vast library of Free Assets <br> for your creative work</h2>
               <hr class="center_line white-bg">
            </div>
         </div>
      </div>
      
      <div class="row">
         <div class="col-md-3">
            <a href="<?php echo base_url('vertical/photos');?>">
               <div class="box portfolio-item">
                    
                  <img class="h-w1" src="<?php if(getVerticalImage('photos')){echo base_url('uploads/').getVerticalImage('photos');}else{?>https://free-images.com/lg/346c/old_in_new_orleans.jpg<?php }?>" alt="">
                  <div class="box-text">
                     <h4>Photos</h4>
                  </div>
               </div>
            </a>
         </div>
         <div class="col-md-3">
            <a href="<?php echo base_url('vertical/vector');?>">
               <div class="box portfolio-item">
                  <img class="h-w1" src="<?php if(getVerticalImage('vector')){echo base_url('uploads/').getVerticalImage('vector');}else{echo "https://free-images.com/lg/5c2f/flower_vector_background_brochure.jpg";}?>" alt="">
                  <div class="box-text">
                     <h4>Vectors</h4>
                  </div>
               </div>
            </a>
         </div>
         <div class="col-md-3">
            <a href="<?php echo base_url('vertical/arts');?>">
               <div class="box portfolio-item">
                   
                  <img class="h-w1" src="<?php if(getVerticalImage('arts')){echo base_url('uploads/').getVerticalImage('arts');}else{echo "https://pngimg.com/uploads/house/house_PNG50.png";}?>" alt="">
                  <div class="box-text">
                     <h4>Arts</h4>
                  </div>
               </div>
            </a>
         </div>
         <div class="col-md-3">
            <a href="<?php echo base_url('vertical/prints');?>">
               <div class="box portfolio-item">
                   
                  <img class="h-w1" src="<?php if(getVerticalImage('prints')){echo base_url('uploads/').getVerticalImage('prints');}else{echo "https://free-images.com/lg/e1b0/calidris_alba_bird_nature.jpg";}?>" alt="">
                  <div class="box-text">
                     <h4>Prints</h4>
                  </div>
               </div>
            </a>
         </div>
      </div>
   </div>
</section>
<!--== What We Offer End ==-->
<!--== curated Start ==-->
<section>
   <div class="container-margin">
      <div class="row">
         <div class="col-md-12 text-center">
            <div class="section-title">
               <h2 class="roboto-font text-uppercase">OUR CURATED COLLECTIONS</h2>
               <hr class="center_line white-bg">
            </div>
         </div>
      </div>
      <div class="row">
         
         <?php if($most_categorys){ foreach($most_categorys as $most_category){?>
         <div class="col-md-4">
            <a href="<?php echo base_url('category/photos').'?s=&cat='.getcatIdName($most_category->pro_cat).'&sby=all&ltyp=all&cby=&ornt=&people=';?>">
               <div class="box portfolio-item">
                  <img src="<?php echo base_url('uploads/').getSingalImage($most_category->product_id);?>" alt="" class="h-w">
                  <div class="box-text">
                     <h4><?php echo getcatIdName($most_category->pro_cat);?></h4>
                  </div>
               </div>
            </a>
         </div>
         <?php }} ?>
      </div>
   </div>
</section>
<!--== curated End ==-->
<section>
   <div class="container-margin">
      <div class="row">
         <div class="col-md-12 text-center">
            <div class="section-title">
               <h2 class="roboto-font text-uppercase">Prints</h2>
               <hr class="center_line white-bg">
            </div>
         </div>
      </div>
      <div class="row">
          <?php if($prints){ foreach($prints as $print){?>
         <div class="col-md-4">
            <a href="<?php echo base_url('category/prints').'?s=&cat=&sby=all&ltyp=all&cby=&ornt=&people=';?>">
               <div class="box portfolio-item">
                  <img class="h-w rounded" src="<?php echo base_url('uploads/').getSingalImage($print->pro_id);?>" alt="">
               </div>
            </a>
         </div>
         
         <?php }}else{?>
         <div class="col-md-4">
            <img src="https://indibrainweb.com/assets/front/images/no.jpg">
         </div>
         <?php }?>
      </div>
   </div>
</section>
<!--== What We Offer End ==-->
<section style="background:  #00abad0d">
   <div class="container">
      <div class="row">
         <div class="col-md-12 text-center">
            <div class="section-title">
               <h2 class="roboto-font text-uppercase">Discover More <br> Stunning digital & handmade art collection </h2>
               <hr class="center_line white-bg">
            </div>
         </div>
      </div>
      <div class="row">
          <?php if(getCategory()){ foreach(getCategory() as $category){?>
          
         <div class="col-md-3">
            <div class="tags blue">
               <a href="<?php echo base_url('category/photos').'?s=&cat='.$category->category_name.'&sby=all&ltyp=all&cby=&ornt=&people=';?>"><?php echo $category->category_name;?><span><?php echo getCountProCategory($category->category_id);?></span></a>
            </div>
         </div>
         <?php }} ?>
      </div>
   </div>
</section>

<!--== Footer Start ==-->
<footer class="footer">
   <?php $this->load->view('front/lib/footer.php');?>
   <script type="text/javascript">
      function submit_form(){
          var selected = $('#photos').val();
          document.getElementById("submitform").action = "category/"+selected;
      }
   </script>
</footer>
<!--== Footer End ==-->
</div>
<!--== Wrapper End ==-->
<?php $this->load->view('front/lib/footer-js.php');?>
</body>
</html>