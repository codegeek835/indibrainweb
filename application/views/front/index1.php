<?php $this->load->view('front/lib/header.php');?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!--== Header End ==-->      
<section style="padding-bottom: 0px;padding-top: 0px;margin-top: 50px;">
   <!-- about-us-1 start -->
   <div style="background: url(<?php echo base_url()?>assets/front/images/bg2.jpg) no-repeat fixed center; background-size: cover; width:100%;height: 510px;">
      <div class="container">
         <div class="row">
            <div class="col-md-8 col-sm-12 centerize-col m-t-50">
               <div class="all-padding-50 text-center white-color">
                  <h1 class="font-style top-mt">Make your world beautiful with us</h1>
                  <div class="topnav">
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
   </div>
   <!-- about-us end-->
</section>
<!--== What We Offer Start ==-->
<section>
   <div class="container-margin">
      <div class="row">
         <div class="col-md-12 text-center">
            <div class="section-title">
               <h2 class="roboto-font text-uppercase">Discover vast library of Free Assets <br> for yourcreative work</h2>
               <hr class="center_line white-bg">
            </div>
         </div>
      </div>
      
      <div class="row">
         <div class="col-md-3">
            <a href="<?php echo base_url('vertical/photos');?>">
               <div class="box portfolio-item">
                  <img class="h-w1 rounded" src="https://free-images.com/lg/346c/old_in_new_orleans.jpg" alt="">
                  <div class="box-text">
                     <h4>Photos</h4>
                  </div>
               </div>
            </a>
         </div>
         <div class="col-md-3">
            <a href="<?php echo base_url('vertical/vectors');?>">
               <div class="box portfolio-item">
                  <img class="h-w1 rounded" src="https://free-images.com/lg/5c2f/flower_vector_background_brochure.jpg" alt="">
                  <div class="box-text">
                     <h4>Vectors</h4>
                  </div>
               </div>
            </a>
         </div>
         <div class="col-md-3">
            <a href="<?php echo base_url('vertical/arts');?>">
               <div class="box portfolio-item">
                  <img class="h-w1 rounded" src="https://pngimg.com/uploads/house/house_PNG50.png" alt="">
                  <div class="box-text">
                     <h4>Arts</h4>
                  </div>
               </div>
            </a>
         </div>
         <div class="col-md-3">
            <a href="<?php echo base_url('vertical/prints');?>">
               <div class="box portfolio-item">
                  <img class="h-w1 rounded" src="https://free-images.com/lg/e1b0/calidris_alba_bird_nature.jpg" alt="">
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
         <div class="col-md-4">
            <a href="<?php echo base_url('category/photos').'?s=&cat=&sby=all&ltyp=all&cby=&ornt=&people=';?>">
               <div class="box portfolio-item">
                  <img src="https://free-images.com/lg/fd3a/street_performer_grafton_street.jpg" alt="" class="h-w">
                  <div class="box-text">
                     <h4>Street</h4>
                  </div>
               </div>
            </a>
         </div>
         <div class="col-md-4">
            <a href="<?php echo base_url('category/vectors').'?s=&cat=&sby=all&ltyp=all&cby=&ornt=&people=';?>">
               <div class="box portfolio-item">
                  <img src="https://free-images.com/lg/798e/a_roma_lifestyle_hotel_64.jpg" alt="" class="h-w">
                  <div class="box-text">
                     <h4>lifestyle</h4>
                  </div>
               </div>
            </a>
         </div>
         <div class="col-md-4">
            <a href="<?php echo base_url('category/arts').'?s=&cat=&sby=all&ltyp=all&cby=&ornt=&people=';?>">
               <div class="box portfolio-item">
                  <img src="https://free-images.com/lg/6686/perspective_redwoods.jpg" alt="" class="h-w">
                  <div class="box-text">
                     <h4>Perspective</h4>
                  </div>
               </div>
            </a>
         </div>
         <div class="col-md-4">
            <a href="<?php echo base_url('category/photos').'?s=&cat=&sby=all&ltyp=all&cby=&ornt=&people=';?>">
               <div class="box portfolio-item">
                  <img src="https://free-images.com/lg/a332/wildlife_photographers_in_nature.jpg" alt="" class="h-w">
                  <div class="box-text">
                     <h4>Wildlife</h4>
                  </div>
               </div>
            </a>
         </div>
         <div class="col-md-4">
            <a href="<?php echo base_url('category/vectors').'?s=&cat=&sby=all&ltyp=all&cby=&ornt=&people=';?>">
               <div class="box portfolio-item">
                  <img src="https://free-images.com/lg/8f1a/lake_mirror_reflection_yosemite.jpg" alt="" class="h-w">
                  <div class="box-text">
                     <h4>Nature</h4>
                  </div>
               </div>
            </a>
         </div>
         <div class="col-md-4">
            <a href="<?php echo base_url('category/arts').'?s=&cat=&sby=all&ltyp=all&cby=&ornt=&people=';?>">
               <div class="box portfolio-item">
                  <img src="https://free-images.com/lg/fbff/festival_site_home_festival.jpg" alt="" class="h-w">
                  <div class="box-text">
                     <h4>Festivals</h4>
                  </div>
               </div>
            </a>
         </div>
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
         <div class="col-md-4">
            <a href="#">
               <div class="box portfolio-item">
                  <img class="h-w rounded" src="https://free-images.com/lg/2749/drop_water_impact_experiment.jpg" alt="">
               </div>
            </a>
         </div>
         <div class="col-md-4">
            <a href="#">
               <div class="box portfolio-item">
                  <img class="h-w rounded" src="https://free-images.com/lg/fc7f/adorable_animal_background_164489.jpg" alt="">
               </div>
            </a>
         </div>
         <div class="col-md-4">
            <a href="#">
               <div class="box portfolio-item">
                  <img class="h-w rounded" src="https://free-images.com/md/f988/colored_pencils_colour_pencils.jpg" alt="">
               </div>
            </a>
         </div>
      </div>
   </div>
</section>




<!--== What We Offer Start ==-->
<!--<section>-->
<!--   <div class="container">-->
<!--      <div class="row">-->
<!--         <div class="col-md-12 text-center">-->
<!--            <div class="section-title">-->
<!--               <h2 class="roboto-font text-uppercase">Discover vast library of Free Assets <br> for yourcreative work</h2>-->
<!--               <hr class="center_line white-bg">-->
<!--            </div>-->
<!--         </div>-->
<!--      </div>-->
<!--      <div class="row">-->
<!--         <div class="col-md-4 col-sm-4 col-xs-12 mt-40 mb-30 feature-box text-center">-->
<!--            <div class="box-style">-->
<!--               <a href="<?php echo base_url('category/photos').'?s=&cat=&sby=all&ltyp=all&cby=&ornt=&people=';?>">-->
<!--                  <img src="<?php echo base_url()?>assets/front/images/img-1.jpg"  alt="your-image">-->
<!--                  <h3 class="mt-10 white-color">Photos</h3>-->
<!--               </a>-->
<!--            </div>-->
<!--            <p class="pt-20 par">High resolution royalty free images for personal & commercial use</p>-->
<!--         </div>-->
<!--         <div class="col-md-4 col-sm-4 col-xs-12 mt-40 mb-30 feature-box text-center">-->
<!--            <div class="box-style">-->
<!--               <a href="<?php echo base_url('category/arts').'?s=&cat=&sby=all&ltyp=all&cby=&ornt=&people=';?>">-->
<!--                  <img src="<?php echo base_url()?>assets/front/images/img-2.jpg"  alt="your-image">-->
<!--                  <h3 class="mt-10 white-color">Arts</h3>-->
<!--               </a>-->
<!--            </div>-->
<!--            <p class="pt-20 par">Stunning digital & handmade art collection</p>-->
<!--         </div>-->
<!--         <div class="col-md-4 col-sm-4 col-xs-12 mt-40 mb-30 feature-box text-center">-->
<!--            <div class="box-style">-->
<!--               <a href="<?php echo base_url('category/vectors').'?s=&cat=&sby=all&ltyp=all&cby=&ornt=&people=';?>">-->
<!--                  <img src="<?php echo base_url()?>assets/front/images/img-3.jpg"  alt="your-image">-->
<!--                  <h3 class="mt-10 white-color">Vectors</h3>-->
<!--               </a>-->
<!--            </div>-->
<!--            <p class="pt-20 par">Creative and editable content to suit your projects</p>-->
<!--         </div>-->
<!--      </div>-->
<!--   </div>-->
<!--</section>-->
<!--== What We Offer End ==-->
<!--== Portfolio Start ==-->
<!--<section class="pb-0 pt-0">-->
<!--   <div class="container-fluid remove-padding">-->
<!--      <div class="row">-->
<!--         <div class="col-md-12 text-center">-->
<!--            <div class="section-title">-->
<!--               <h2 class="roboto-font text-uppercase">70% of our library content is free to download </h2>-->
<!--               <hr class="center_line dark-bg">-->
<!--            </div>-->
<!--         </div>-->
<!--      </div>-->
<!--      <div class="row">-->
<!--         <div class="col-md-12">-->
<!--            <div id="portfolio-gallery" class="cbp">-->
<!--               <div class="cbp-item print branding col-md-6 col-sm-6">-->
<!--                  <div class="portfolio-item">-->
<!--                     <a href="<?php echo base_url('category/photos').'?s=&cat=Street&sby=all&ltyp=all&cby=&ornt=&people=';?>">-->
<!--                        <img src="<?php echo base_url()?>assets/front/images/street.jpg" alt="">-->
<!--                        <div class="portfolio-info heading-bg">-->
<!--                           <div class="centrize">-->
<!--                              <div class="v-center white-color">-->
<!--                                 <h3>Street</h3>-->
<!--                              </div>-->
<!--                           </div>-->
<!--                        </div>-->
<!--                     </a>-->
<!--                  </div>-->
<!--               </div>-->
<!--               <div class="cbp-item branding col-md-3 col-sm-6">-->
<!--                  <div class="portfolio-item">-->
<!--                     <a href="<?php echo base_url('category/photos').'?s=&cat=lifestyle&sby=all&ltyp=all&cby=&ornt=&people=';?>">-->
<!--                        <img src="<?php echo base_url()?>assets/front/images/lifestyle.jpg" alt="">-->
<!--                        <div class="portfolio-info heading-bg">-->
<!--                           <div class="centrize">-->
<!--                              <div class="v-center white-color">-->
<!--                                 <h3>lifestyle</h3>-->
<!--                              </div>-->
<!--                           </div>-->
<!--                        </div>-->
<!--                     </a>-->
<!--                  </div>-->
<!--               </div>-->
<!--               <div class="cbp-item print branding col-md-3 col-sm-6">-->
<!--                  <div class="portfolio-item">-->
<!--                     <a href="<?php echo base_url('category/photos').'?s=&cat=Perspective&sby=all&ltyp=all&cby=&ornt=&people=';?>">-->
<!--                        <img src="<?php echo base_url()?>assets/front/images/perspective.jpg" alt="">-->
<!--                        <div class="portfolio-info heading-bg">-->
<!--                           <div class="centrize">-->
<!--                              <div class="v-center white-color">-->
<!--                                 <h3>Perspective</h3>-->
<!--                              </div>-->
<!--                           </div>-->
<!--                        </div>-->
<!--                     </a>-->
<!--                  </div>-->
<!--               </div>-->
<!--               <div class="cbp-item branding col-md-6 col-sm-6">-->
<!--                  <div class="portfolio-item">-->
<!--                     <a href="<?php echo base_url('category/photos').'?s=&cat=Festivals&sby=all&ltyp=all&cby=&ornt=&people=';?>">-->
<!--                        <img src="<?php echo base_url()?>assets/front/images/festival.jpg" alt="">-->
<!--                        <div class="portfolio-info heading-bg">-->
<!--                           <div class="centrize">-->
<!--                              <div class="v-center white-color">-->
<!--                                 <h3>Festivals</h3>-->
<!--                              </div>-->
<!--                           </div>-->
<!--                        </div>-->
<!--                     </a>-->
<!--                  </div>-->
<!--               </div>-->
<!--               <div class="cbp-item print photography col-md-3 col-sm-6">-->
<!--                  <div class="portfolio-item">-->
<!--                     <a href="<?php echo base_url('category/photos').'?s=&cat=Wildlife&sby=all&ltyp=all&cby=&ornt=&people=';?>">-->
<!--                        <img src="<?php echo base_url()?>assets/front/images/wildlife.jpg" alt="">-->
<!--                        <div class="portfolio-info heading-bg">-->
<!--                           <div class="centrize">-->
<!--                              <div class="v-center white-color">-->
<!--                                 <h3>Wildlife</h3>-->
<!--                              </div>-->
<!--                           </div>-->
<!--                        </div>-->
<!--                     </a>-->
<!--                  </div>-->
<!--               </div>-->
<!--               <div class="cbp-item branding web-design col-md-3 col-sm-6">-->
<!--                  <div class="portfolio-item">-->
<!--                     <a href="<?php echo base_url('category/photos').'?s=&cat=Nature&sby=all&ltyp=all&cby=&ornt=&people=';?>">-->
<!--                        <img src="<?php echo base_url()?>assets/front/images/nature.jpg" alt="">-->
<!--                        <div class="portfolio-info heading-bg">-->
<!--                           <div class="centrize">-->
<!--                              <div class="v-center white-color">-->
<!--                                 <h3>Nature</h3>-->
<!--                              </div>-->
<!--                           </div>-->
<!--                        </div>-->
<!--                     </a>-->
<!--                  </div>-->
<!--               </div>-->
<!--            </div>-->
<!--         </div>-->
<!--      </div>-->
<!--   </div>-->
<!--</section>-->
<!--== Portfolio End ==-->
<!--== What We Offer Start ==-->
<!--<section class="pb-50 pt-50">-->
<!--   <div class="container-fluid remove-padding">-->
<!--      <div class="row">-->
<!--         <div class="col-md-12 text-center">-->
<!--            <div class="section-title">-->
<!--               <h2 class="roboto-font text-uppercase">Order canvas or framed prints for your Home or Business</h2>-->
<!--               <hr class="center_line dark-bg">-->
<!--            </div>-->
<!--         </div>-->
<!--      </div>-->
<!--      <div class="row">-->
<!--         <div class="col-md-12">-->
<!--            <div class="col-md-3 col-sm-6">-->
<!--               <div class="portfolio-item">-->
<!--                  <a href="<?php echo base_url('category/photos').'?s=&cat=Creative&sby=all&ltyp=all&cby=&ornt=&people=';?>">-->
<!--                     <img src="<?php echo base_url()?>assets/front/images/creative.jpg" alt="">-->
<!--                     <div class="portfolio-info">-->
<!--                        <div class="centrize">-->
<!--                           <div class="v-center white-color">-->
<!--                              <h3>Creative</h3>-->
<!--                           </div>-->
<!--                        </div>-->
<!--                     </div>-->
<!--                  </a>-->
<!--               </div>-->
<!--            </div>-->
<!--            <div class="col-md-3 col-sm-6">-->
<!--               <div class="portfolio-item">-->
<!--                  <a href="<?php echo base_url('category/photos').'?s=&cat=Digital Painting&sby=all&ltyp=all&cby=&ornt=&people=';?>">-->
<!--                     <img src="<?php echo base_url()?>assets/front/images/digital.jpg" alt="">-->
<!--                     <div class="portfolio-info">-->
<!--                        <div class="centrize">-->
<!--                           <div class="v-center white-color">-->
<!--                              <h3>Digital Paintings</h3>-->
<!--                           </div>-->
<!--                        </div>-->
<!--                     </div>-->
<!--                  </a>-->
<!--               </div>-->
<!--            </div>-->
<!--            <div class="col-md-6 col-sm-6">-->
<!--               <div class="portfolio-item">-->
<!--                  <a href="<?php echo base_url('category/photos').'?s=&cat=Blended&sby=all&ltyp=all&cby=&ornt=&people=';?>">-->
<!--                     <img src="<?php echo base_url()?>assets/front/images/blend.jpg" alt="">-->
<!--                     <div class="portfolio-info">-->
<!--                        <div class="centrize">-->
<!--                           <div class="v-center white-color">-->
<!--                              <h3>Blended</h3>-->
<!--                           </div>-->
<!--                        </div>-->
<!--                     </div>-->
<!--                  </a>-->
<!--               </div>-->
<!--            </div>-->
<!--         </div>-->
<!--      </div>-->
<!--   </div>-->
<!--</section>-->
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
         <div class="col-md-3">
            <div class="tags blue">
               <a href="#">Meetings<span>31</span></a>
            </div>
         </div>
         <div class="col-md-3">
            <div class="tags blue">
               <a href="#">Managment<span>33</span></a>
            </div>
         </div>
         <div class="col-md-3">
            <div class="tags blue">
               <a href="#">Wallpapers<span>65</span></a>
            </div>
         </div>
         <div class="col-md-3">
            <div class="tags blue">
               <a href="#">Landscape<span>160</span></a>
            </div>
         </div>
         <div class="col-md-3">
            <div class="tags blue">
               <a href="#">Technology<span>31</span></a>
            </div>
         </div>
         <div class="col-md-3">
            <div class="tags blue">
               <a href="#">Education<span>33</span></a>
            </div>
         </div>
         <div class="col-md-3">
            <div class="tags blue">
               <a href="#">Healthcare<span>65</span></a>
            </div>
         </div>
         <div class="col-md-3">
            <div class="tags blue">
               <a href="#">Communications<span>160</span></a>
            </div>
         </div>
      </div>
   </div>
</section>
<!--== What We Offer End ==-->
<!--<section>-->
<!--   <div class="container">-->
<!--      <div class="row">-->
<!--         <div class="col-md-12">-->
<!--            <div class="section-title text-center">-->
<!--               <h2 class="roboto-font text-uppercase">Creative Partners Of the Month</h2>-->
<!--            </div>-->
<!--         </div>-->
<!--         <div class="col-md-12">-->
<!--            <div class="row">-->
<!--               <div class="client-slider slick">-->
<!--                  <div class="client-logo">-->
<!--                     <img class="img-responsive" src="<?php echo base_url()?>assets/front/images/client1.png" alt="01"/>-->
<!--<h3>Name</h3>-->
<!--                  </div>-->
<!--                  <div class="client-logo">-->
<!--                     <img class="img-responsive" src="<?php echo base_url()?>assets/front/images/client2.png" alt="02"/>-->
<!--<h3>Name</h3>-->
<!--                  </div>-->
<!--                  <div class="client-logo">-->
<!--                     <img class="img-responsive" src="<?php echo base_url()?>assets/front/images/client3.png" alt="03"/>-->
<!--<h3>Name</h3>-->
<!--                  </div>-->
<!--                  <div class="client-logo">-->
<!--                     <img class="img-responsive" src="<?php echo base_url()?>assets/front/images/client1.png" alt="04"/>-->
<!--<h3>Name</h3>-->
<!--                  </div>-->
<!--                  <div class="client-logo">-->
<!--                     <img class="img-responsive" src="<?php echo base_url()?>assets/front/images/client2.png" alt="05"/>-->
<!--<h3>Name</h3>-->
<!--                  </div>-->
<!--                  <div class="client-logo">-->
<!--                     <img class="img-responsive" src="<?php echo base_url()?>assets/front/images/client3.png" alt="06"/>-->
<!--<h3>Name</h3>-->
<!--                  </div>-->
<!--               </div>-->
<!--            </div>-->
<!--         </div>-->
<!--      </div>-->
<!--   </div>-->
<!--</section>-->
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