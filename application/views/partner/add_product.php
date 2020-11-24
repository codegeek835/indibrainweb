<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php $this->load->view('partner/lib/header.php');?>
  <script type="text/javascript" src="<?php echo base_url();?>/assets/back/ckeditor/ckeditor.js"></script>
</head>
<body class="body-bg">
    <?php $this->load->view('partner/lib/top_navigation.php');?>
    <div class="dashboard-wrapper">
        <?php $this->load->view('partner/lib/side_navigation.php');?>
        <div class="dashboard-content">
            <div class="container-fluid">
                <div class="row page-head">
                  <h2 class="find">Add New Photo</h2>
               </div>
               <br>
               
               <div class="row">
                <div class="card">
                    <?php if ($this->session->flashdata('flsh_msg')) 
                     {
                     
                     echo "<div class='alert alert-success'>";
                     
                     echo $this->session->flashdata('flsh_msg');
                     
                     echo "</div>";
                     
                     }?>
                    <h5 style='color:red'> <?php echo validation_errors();?></h5>
                    <?php echo form_open_multipart('save-my-product','');?>
                   
                    <input type="hidden" name="pro_user_id" value="<?php echo $info->user_id;?>">
                        <!-- Form Name -->
                        <div class="venue-form-info card-body">
                            <div class="row add-form">
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
                                
                              <div class="col-lg-4 col-md-6">
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
                              <div class="col-lg-4 col-md-6">
                                 <div class="form-group">
                                    <label>Select Verticals</label>
                                    <select class="form-control" name="verticals" required>
                                    <option value="">Select One</option>
                                    <option value="photos">Photos</option>
                                    <option value="vector">Vector</option>
                                    <option value="psds">PSDs</option>
                                    <option value="arts">Arts</option>
                                    <option value="prints">Creative Prints</option>
                                    </select>
                                 </div>
                              </div>
                         

                              <div class="col-lg-4 col-md-6">
                                 <div class="form-group">
                                    <label>Photo Price</label>
                                    <input type="number" class="form-control" value="0" min="0" name="pro_price" required>
                                 </div>
                              </div>

                              <input type="hidden" class="form-control" value="100000" name="pro_quantity">
                              
                              <div class="col-lg-4 col-md-6">
                                 <div class="form-group">
                                    <label>Select License Type</label>
                                    <select class="form-control" name="license_type" required>
                                    <option value="">Select One</option>
                                    <option value="Standard">Standard</option>
                                    <option value="Editorial">Editorial</option>
                                    </select>
                                 </div>
                              </div>
                              <div class="col-lg-4 col-md-6">
                                 <div class="form-group">
                                    <label>Select Orientation</label>
                                    <select class="form-control" name="orientation" required>
                                    <option value="">Select One</option>
                                    <option value="Horizontal">Horizontal</option>
                                    <option value="Panoramic">Panoramic</option>
                                    <option value="Square">Square</option>
                                    <option value="Vertical">Vertical</option>
                                    </select>
                                 </div>
                              </div>
                              <div class="col-lg-4 col-md-6">
                                 <div class="form-group">
                                    <label>Select Color</label>
                                    <select class="form-control" name="color" required>
                                    <option value="">Select One</option>
                                    <?php if(getColor()){
                                    foreach (getColor() as $color) {  ?>
                                    <option value="<?php echo $color->name;?>"><?php echo $color->name?></option>
                                    <?php } }?>
                                    </select>
                                 </div>
                              </div>
                              
                               <div class="col-lg-4 col-md-6">
                                 <div class="form-group">
                                    <label>Select People</label>
                                    <select class="form-control" name="people" required>
                                    <option value="">Select One</option>
                                    <?php
                                        for($i=0;$i<=20;$i++){
                                        echo "<option name='$i'>$i</option>";
                                        }
                                    ?>
                                    </select>
                                 </div>
                              </div>
                              
                              <div class="col-lg-4 col-md-6">
                                 <div class="form-group">
                                    <label>Photo Status</label>
                                    <select class="form-control" name="pro_status" required>
                                       <option value="">Select One</option>
                                       <option value="1">Enable</option>
                                       <option value="2">Disable</option>
                                    </select>
                                 </div>
                              </div>

                              <div class="col-lg-4 col-md-6">
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
                                  <input type="hidden" name="pro_image" value="">
                                  <?php
                                  echo "<pre>";
                                  print_r($images);
                                  echo "</pre>";
                                  ?>
                              </div>

                              <div class="col-lg-12 col-md-12">
                                 <div class="form-group">
                                    <label>Featured Photo</label>
                                    <div class="checkbox">
                                       <label>
                                       <input type="checkbox" name="is_featured" value="1">  Select Featured Photo
                                       </label>
                                    </div>
                                 </div>
                              </div>                             
                            </div>
                        </div>
                        <div class="social-form-info card-body border-top">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <button class="btn btn-primary" type="submit"><i class="fa fa-floppy-o"></i> Upload</button>
                                </div>
                            </div>
                        </div>
                    <?php echo form_close(); ?>
                </div>
                </div>
            </div>
        </div>
        <?php $this->load->view('partner/lib/footer-side.php');?>
    </div>
    <?php $this->load->view('partner/lib/footer.php');?>
</body>
</html>