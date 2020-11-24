<?php $this->load->view('back/lib/header.php');?>
<body>
   <!--  wrapper -->
   <div id="wrapper">
      <!-- navbar top -->
      <?php $this->load->view('back/lib/top_nav.php');?>
      <!-- end navbar top -->
      <?php $this->load->view('back/lib/side_nav.php');?>
      <!-- navbar side -->
      <!-- end navbar side -->
      <!--  page-wrapper -->
      <script type="text/javascript" src="<?php echo base_url();?>/assets/back/ckeditor/ckeditor.js"></script>
      <!--  page-wrapper -->
      <div id="page-wrapper">
         <div class="row">
            <!-- page header -->
            <div class="col-lg-12">
               <h1 class="page-header">Add Photo</h1>
            </div>
            <!--end page header -->
         </div>
         <div class="row">
            <div class="col-lg-12">
               <!-- Form Elements -->
               <div class="panel panel-default">
                  <?php if ($this->session->flashdata('flsh_msg')) 
                     {
                     
                     echo "<div class='alert alert-success'>";
                     
                     echo $this->session->flashdata('flsh_msg');
                     
                     echo "</div>";
                     
                     }?>
                  <div class="panel-heading">Add new Photo</div>
                  <div class="panel-body">
                     <div class="row">
                        <div class="col-lg-12">
                           <h5 style='color:red'> <?php echo validation_errors();?></h5>
                           <?php echo form_open_multipart('save-product','');?>
                           <input type="hidden" name="pro_user_id" value="0">
                              <div class="col-lg-12 col-md-12">
                                 <div class="form-group">
                                    <label>Photo Title</label>
                                    <input type="text" class="form-control" value="" name="pro_title" required>
                                 </div>
                              </div>
                              <div class="col-lg-12 col-md-12">
                              <div class="form-group">
                                 <label>Photo Description</label>
                                 <textarea  id="desc" class="form-control" rows="3" name="pro_desc"></textarea>
                                 <script>CKEDITOR.replace('desc')</script>
                              </div>
                           </div>
                              <div class="col-lg-6 col-md-6">
                                 <div class="form-group">
                                    <label>Select Category</label>
                                    <select class="form-control" name="pro_cat" required>
                                    <option value="">Select One</option>
                                    <?php
                                    foreach ($all_cat as $category) {  ?>
                                    <option value="<?php echo $category->category_id;?>"><?php echo $category->category_name?></option>
                                    <?php } ?>
                                    </select>
                                 </div>
                              </div>

                              <div class="col-lg-6 col-md-6">
                                 <div class="form-group">
                                    <label>Photo Price</label>
                                    <input type="number" class="form-control" value="" name="pro_price" required>
                                 </div>
                              </div>

                              <div class="col-lg-6 col-md-6">
                                 <div class="form-group">
                                    <label>Photo Quantity</label>
                                    <input type="number" class="form-control" name="pro_quantity" required>
                                 </div>
                              </div>
                              
                              <div class="col-lg-6 col-md-6">
                                 <div class="form-group">
                                    <label>Photo Status</label>
                                    <select class="form-control" name="pro_status" required>
                                       <option value="">Select One</option>
                                       <option value="1">Enable</option>
                                       <option value="2">Disable</option>
                                    </select>
                                 </div>
                              </div>

                              <div class="col-lg-12 col-md-12">
                                 <div class="form-group">
                                    <label>Photo Availability</label>
                                    <select class="form-control" name="pro_availability" required>
                                       <option value="">Select One</option>
                                       <option value="1">In Stock</option>
                                       <option value="2">Out Of Stock</option>
                                       <option value="3">Up Comming</option>
                                    </select>
                                 </div>
                              </div>

                              <div class="col-lg-12 col-md-12">
                                 <div class="form-group">
                                    <label>Upload Photo</label>
                                    <input type="file" name="pro_image" required>
                                 </div>
                              </div>

                              <div class="col-lg-12 col-md-12">
                                 <div class="form-group">
                                    <label>Featured Photo</label>
                                    <div class="checkbox">
                                       <label>
                                       <input type="checkbox" name="is_featured" value="1">Select Featured Photo
                                       </label>
                                    </div>
                                 </div>
                              </div>
                              
                              <div class="col-lg-12 col-md-12">
                                 <button type="submit" class="btn btn-primary">Save</button>
                              </div>
                           <?php echo form_close();?>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- End Form Elements -->
            </div>
         </div>
      </div>
      <!-- end page-wrapper -->
   </div>
   <!-- Core Scripts - Include with every page -->
   <?php $this->load->view('back/lib/footer.php');?>
</body>
</html>