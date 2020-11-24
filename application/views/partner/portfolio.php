<?php
   defined('BASEPATH') OR exit('No direct script access allowed');
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <?php $this->load->view('partner/lib/header.php');?>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
   </head>
   <body class="body-bg">
      <?php $this->load->view('partner/lib/top_navigation.php');?>
      <div class="dashboard-wrapper">
         <?php $this->load->view('partner/lib/side_navigation.php');?>
         <div class="dashboard-content">
            <div class="container-fluid  page-head">
               <!-- Grid row -->
               <div class="row m-t">
                  <!-- Grid column -->
                  <div class="col-md-12 d-flex justify-content-center mb-5">
                     <?php if($portfolios){foreach($portfolios as $portfolio){?>
                     <button type="button" class="btn mtbtn waves-effect filter active bt-b" data-rel="<?php echo $portfolio->pro_cat;?>"><?php echo getcatIdName($portfolio->pro_cat);?></button>
                     <?php }}?>
                     <br>
                  </div>
                <?php
                $image_url = 'https://indibrainweb.com/uploads/adorable_animal_background_164489.jpg';
                //echo getImageRecognition($image_url);
                ?>
               
                  <!-- Grid column -->
               </div>
               <!-- Grid row -->
                <div class="gallery" id="gallery">
                    <!-- Grid column -->
                    <?php if($portfolios){foreach($portfolios as $portfolio){?>
                    <?php  foreach(getProductListByCatId($portfolio->pro_cat) as $portfolioImg){ ?>
                        <div class="item mb-3 pics animation <?php echo $portfolio->pro_cat;?>">
                            <a href="<?php echo base_url('uploads/'). getSingalImage($portfolioImg->pro_id);?>" data-lightbox="photos">
                                <img style="width:360px;" class="img-fluid img-thumbnail" src="<?php echo base_url('uploads/'). getSingalImage($portfolioImg->pro_id);?>" alt="">
                            </a>
                        </div>
                    <?php }?>
                    <?php }}?>
                    <!-- Grid column -->
                </div>
               <!-- Grid row -->
            </div>
         </div>
         <?php $this->load->view('partner/lib/footer-side.php');?>
      </div>
      <?php $this->load->view('partner/lib/footer.php');?>
      <script>
         $(function() {
         var selectedClass = "";
         $(".filter").click(function(){
         selectedClass = $(this).attr("data-rel");
         $("#gallery").fadeTo(100, 0.1);
         $("#gallery div").not("."+selectedClass).fadeOut().removeClass('animation');
         setTimeout(function() {
         $("."+selectedClass).fadeIn().addClass('animation');
         $("#gallery").fadeTo(300, 1);
         }, 300);
         });
         });
      </script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
   </body>
</html>