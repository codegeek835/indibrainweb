<?php $this->load->view('front/lib/header.php');?>
<section style="padding-bottom: 0px;padding-top: 0px;margin-top: 50px;">
   <!-- about-us-1 start -->
   <div style="background: url(<?php echo base_url('assets/front/images/bg.jpg')?>) no-repeat fixed center; background-size: cover; width:100%;height: 300px;">
   <div class="container">
      <div class="row">
         <div class="col-md-8 col-sm-12 centerize-col m-t-110 mt-15">
            <div class="text-center white-color">
               <h1 class="font-400 play-font font-italic font-style">Account Details</h1>
            </div>
         </div>
      </div>
   </div>
   <!-- about-us end-->
</section>
<!--== Hero Slider End ==-->      
<!--== What We Offer Start ==-->
<section style="background-color: #f1f2f2;">
   <div class="cont-m">
      <div class="row">
         <div class="col-sm-3 p-a-0 m-b-20">
            <nav class="nav-sidebar border bg-col-t dt">
               <ul class="nav tabs">
                  <li class="active side-left"><a href="#tab2" data-toggle="tab"><i class="fa fa-shopping-cart dis-block"></i> My Wishlis</a></li>
               </ul>
            </nav>
         </div>
         <!-- tab content -->
         <div class="col-sm-9 tab-content border hig bg-col-t mt">
            
            <div class="tab-pane active" id="tab2">
                <div class="myaccount-content">
                            <h3> My Wishlis</h3>
                            <div class="myaccount-table table-responsive text-center">
                                <table class="table table-bordered table-hover">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>S No</th>
                                            <th>Image</th>
                                            <th>Product Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                         <?php if($wishlists){ $i= 1;foreach($wishlists as $wishlist){
                         
                         ?>
                        <tr class="table-d">
                                   <td>#<?php echo $i;?></td>
                                   <td> <a href="<?php echo base_url('view-details/').getEncrypt($wishlist->product_id);?>">
                                       
                                        <img src="<?php echo base_url('uploads/').getSingalImage($wishlist->product_id);?>" alt="" class="h-w rounded" width="150"/> 
                                        
                                        </a>
                                    </td>
                                    <td><?php echo geProductDetails($wishlist->product_id)->pro_title;?></td>
                            
                                    <td>
                                        <a class="btn-delete" onclick="alert('Are Your Sure to Delete')" href="<?php echo base_url('delete-wishlist/').$wishlist->id.'/'.$wishlist->user_id;?>"><i class="fa fa-trash-o"></i></a>
                                    </td>
                        </tr>
                        <?php }}else{?>
                        <tr class="table-d">
                           <td colspan="5" style="color:red; text-align:center"> Sorry no orders.</td>
                        </tr>
                        <?php }?>
                     </tbody>
                                </table>
                            </div>
                        </div>
            </div>
         </div>
      </div>
   </div>
</section>
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
<!--== What We Offer End ==-->
<script type="text/javascript">
   $(document).ready(function() {
   
     
     var readURL = function(input) {
         if (input.files && input.files[0]) {
             var reader = new FileReader();
   
             reader.onload = function (e) {
                 $('.avatar').attr('src', e.target.result);
             }
     
             reader.readAsDataURL(input.files[0]);
         }
     }
     
   
     $(".file-upload").on('change', function(){
         readURL(this);
     });
   });
   
   $(document).ready(function(){
   $('.pass_show').append('<span class="ptxt">Show</span>');  
   });   
   
   $(document).on('click','.pass_show .ptxt', function(){ 
   
   $(this).text($(this).text() == "Show" ? "Hide" : "Show"); 
   
   $(this).prev().attr('type', function(index, attr){return attr == 'password' ? 'text' : 'password'; }); 
   
   });  
</script>