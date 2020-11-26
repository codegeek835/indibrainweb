<?php $this->load->view('front/lib/header.php');?>
<!--== Header End ==-->      
<section style="padding-bottom: 0px;padding-top: 0px;margin-top: 50px;">
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
       <div class="col-md-12 col-sm-12 centerize-col">
               <div class="all-padding-50 text-center white-color">
                  <h1 class="font-style top-mt">BUY OUR <?php echo strtoupper($vertical);?></h1>
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
                              <option value="photos" <?php if($vertical == 'photos'){echo "selected";}?>>Photos</option>
                              <option value="vector" <?php if($vertical == 'vector'){echo "selected";}?>>Vector</option>
                              <option value="psds" <?php if($vertical == 'psds'){echo "selected";}?>>PSDs</option>
                              <option value="arts" <?php if($vertical == 'arts'){echo "selected";}?>>Arts</option>
                              <option value="prints" <?php if($vertical == 'prints'){echo "selected";}?>>Creative Prints</option>
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
<!-- section 1 start  -->
<section>
    <div class="container-margin">
        <div class="row">
        <!-- Grid row -->
        <div class="gallery m-l-r10" id="gallery">
            <!-- Grid column -->
            <?php if($products){ foreach($products as $product){?>
            <div class="mb-3">
               <a href="<?php echo base_url('category/').$product->verticals.'?s=&cat=&sby=all&ltyp=all&cby=&ornt=&people=';?>">
                  <div class="box portfolio-item">
                     <img class="img-fluid" src="<?php echo base_url('uploads/').getSingalImage($product->pro_id);?>" alt="Verticals Images" style="width: 507px;
    height: 337px;    object-fit: cover;">
                     <p class="p-box"><?php echo $product->verticals;?></p>
                  </div>
               </a>
            </div>
            <?php }}else{ ?>
            <div class="mb-3">
                <div class="box portfolio-item">
                    <img class="img-fluid" src="<?php echo base_url('assets/front/images/no.jpg');?>" alt="Verticals Images">
                </div>
            </div>
            <?php }?>
            <!-- Grid column -->
         </div>
        <!-- Grid row -->
    </div>
    </div>
</section>



<section id="photos"></section>


<!--== Footer Start ==-->
<footer class="footer">
   <?php $this->load->view('front/lib/footer.php');?>
</footer>
<!--== Footer End ==-->
</div>
<!--== Wrapper End ==-->
<?php $this->load->view('front/lib/footer-js.php');?>
<script>
 function submit_form(){
          var selected = $('#photos').val();
          document.getElementById("submitform").action = "<?php echo base_url('category/')?>"+selected;
      }
   $(document).ready(function(){
   
       $(".filter-button").click(function(){
           var value = $(this).attr('data-filter');
           
           if(value == "all")
           {
               $('.filter').show('1000');
           }
           else
           {
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
<script>
   $('.portlet-header').on('click', function (e) {
   if ($(e.target).children().last().hasClass('fa-caret-down')) {
   $(e.target).children().last().removeClass('fa-caret-down').addClass('fa-caret-up');
   } else if ($(e.target).children().last().hasClass('fa-caret-up')) {
   $(e.target).children().last().removeClass('fa-caret-up').addClass('fa-caret-down');
   }
   });
</script>
</body>
</html>