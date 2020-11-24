<?php $this->load->view('front/lib/header.php');?>
<section>
   <div class="container-margin">
      <div class="row bg-light p-a-10 m-top-50">
         <div class="col-md-1">
            <h4 class="h4-margin font-weight-normal">Sort By:</h4>
         </div>
         <div class="col-md-2 border-right">
            <select id="selectBy">
               <option value="all" <?php if($_GET['sby']=='all'){echo "selected";}?>>All Assets</option>
               <option value="free" <?php if($_GET['sby']=='free'){echo "selected";}?>>Free Assets</option>
               <option value="prime" <?php if($_GET['sby']=='prime'){echo "selected";}?>>Prime Assets</option>
            </select>
         </div>
         <div class="col-md-1">
            <h4 class="h4-margin font-weight-normal">License:</h4>
         </div>
         <div class="col-md-2 mx-auto my-5 blue pb-4 white-text">
             <select id="licenseType">
               <option value="all" <?php if($_GET['ltyp']=='all'){echo "selected";}?>>All Assets</option>
               <option value="standard" <?php if($_GET['ltyp']=='standard'){echo "selected";}?>>Standard</option>
               <option value="editorial" <?php if($_GET['ltyp']=='editorial'){echo "selected";}?>>Editorial</option>
            </select>
         </div>
         <div class="col-md-2 mx-auto my-5 blue pb-4 white-text">
            <select id="selectColor">
                <option value="">Select Color</option>
                <?php if(getColor()){
                    foreach (getColor() as $color) {  ?>
                    <option value="<?php echo $color->name;?>" <?php if($color->name == $_GET['cby']){echo "selected";}?> ><?php echo $color->name;?></option>
                <?php } }?>
            </select>
         </div>
         <div class="col-md-2 mx-auto my-5 blue pb-4 white-text">
            <select id="selectOrientation">
               <option>Select Orientation</option>
               <option value="Horizontal" <?php if($_GET['ornt']=='Horizontal'){echo "selected";}?>>Horizontal</option>
               <option value="Vertical" <?php if($_GET['ornt']=='Vertical'){echo "selected";}?>>Vertical</option>
               <option value="Square" <?php if($_GET['ornt']=='Square'){echo "selected";}?>>Square</option>
               <option value="Panoramic" <?php if($_GET['ornt']=='editorial'){echo "selected";}?>>Panoramic</option>
            </select>
         </div>
         
         <div class="col-md-2 mx-auto my-5 blue pb-4 white-text">
            <select id="selectPeople">
               <option>Select People</option>
                <?php
                for($i=1;$i<=20;$i++){?>
                <option value="<?php echo $i;?>" <?php if($i == $_GET['people']){echo "selected";}?> ><?php echo $i;?></option>
                <?php }  ?>
            </select>
         </div>
      </div>
      <br>
      
      <div class="row">
          <?php if($most_categorys){ foreach($most_categorys as $most_category){?>
          <div class="md-width-200">
            <div class="geeks">
            <a href="<?php echo base_url('category/photos').'?s=&cat='.getcatIdName($most_category->pro_cat).'&sby=all&ltyp=all&cby=&ornt=&people=';?>">
            <img src="<?php echo base_url('uploads/').getSingalImage($most_category->product_id);?>" alt="">
            <h5 class="find-h" ><?php echo getcatIdName($most_category->pro_cat);?></h5>
            </a>
            </div>
         </div>
        <?php }} ?>
      </div>
      <br>
      <div class="row">
            <?php if($products){ foreach($products as $product){?>
            <div class="col-md-4">
                <div class="geeks">
                    <a href="<?php echo base_url('view-details/').getEncrypt($product->pro_id);?>">
                        <div class="box portfolio-item">
                        <img src="<?php echo base_url('uploads/').$product->pro_image;?>" alt="" class="h-w rounded"/> 
                        </div>
                    </a>
                </div>
            </div>
            <?php }}else{?>
            <div class="col-md-4 text-center">
                
                <img src="<?php echo base_url()?>assets/front/images/no.jpg">
               
            </div>
            <?php }?>
        </div>
      <br>
      <!--<div class="row text-center">-->
      <!--   <nav aria-label="Page navigation example">-->
      <!--      <ul class="pagination">-->
      <!--         <li class="page-item">-->
      <!--            <a class="page-link" href="#" aria-label="Previous">-->
      <!--            <span aria-hidden="true">&laquo;</span>-->
      <!--            <span class="sr-only">Previous</span>-->
      <!--            </a>-->
      <!--         </li>-->
      <!--         <li class="page-item"><a class="page-link" href="#">1</a></li>-->
      <!--         <li class="page-item"><a class="page-link" href="#">2</a></li>-->
      <!--         <li class="page-item"><a class="page-link" href="#">3</a></li>-->
      <!--         <li class="page-item">-->
      <!--            <a class="page-link" href="#" aria-label="Next">-->
      <!--            <span aria-hidden="true">&raquo;</span>-->
      <!--            <span class="sr-only">Next</span>-->
      <!--            </a>-->
      <!--         </li>-->
      <!--      </ul>-->
      <!--   </nav>-->
      <!--</div>-->
   </div>
</section>
<!-- section 2 end  -->
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
        
        document.getElementById("submitform").action = selected;
    }
    
    $("#selectBy").change(function () {
        var cur_url = "<?php echo get_current_url();?>";
        var href = new URL(cur_url);
        sby = $(this).val();
        href.searchParams.set('sby', sby);
        window.location.href=href.toString();
    });
    
    $("#licenseType").change(function () {
        var cur_url = "<?php echo get_current_url();?>";
        var href = new URL(cur_url);
        ltyp = $(this).val();
        href.searchParams.set('ltyp', ltyp);
        window.location.href=href.toString();
    });
    
    $("#selectColor").change(function () {
        var cur_url = "<?php echo get_current_url();?>";
        var href = new URL(cur_url);
        cby = $(this).val();
        href.searchParams.set('cby', cby);
        window.location.href=href.toString();
    });
    
    $("#selectOrientation").change(function () {
        var cur_url = "<?php echo get_current_url();?>";
        var href = new URL(cur_url);
        ornt = $(this).val();
        href.searchParams.set('ornt', ornt);
        window.location.href=href.toString();
    });
    
    $("#selectPeople").change(function () {
        var cur_url = "<?php echo get_current_url();?>";
        var href = new URL(cur_url);
        people = $(this).val();
        href.searchParams.set('people', people);
        window.location.href=href.toString();
    });
    
    function submit_button(id){
        document.getElementById("submitform").action = id;
        
        document.getElementById("submitform").submit();
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
    
    $(".column").sortable({
        connectWith: ".column",
        handle: ".portlet-header",
        cancel: ".portlet-toggle",
        placeholder: "drop-placeholder"
    });
   
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