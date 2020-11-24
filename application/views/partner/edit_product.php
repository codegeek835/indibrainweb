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
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="dashboard-page-header">
                            <h3 class="dashboard-page-title">Edit Photo</h3>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <?php if ($this->session->flashdata('flsh_msg')) 
                     {
                     
                     echo "<div class='alert alert-success'>";
                     
                     echo $this->session->flashdata('flsh_msg');
                     
                     echo "</div>";
                     
                     }?>
                     <?php if ($this->session->flashdata('update_pro_msg')) 
                     {
                     
                     echo "<div class='alert alert-success'>";
                     
                     echo $this->session->flashdata('update_pro_msg');
                     
                     echo "</div>";
                     
                     }?>
                    
                    <h5 style='color:red'> <?php echo validation_errors();?></h5>
                    <?php echo form_open_multipart('update-my-product','');?>
                   <input type="hidden" value="<?php echo $all_product->pro_id?>" name="pro_id">
                        <!-- Form Name -->
                        <div class="venue-form-info card-body">
                            <div class="row add-form">
                                <div class="col-lg-12 col-md-12">
                                  <div class="form-group">
                                    <label>Photo Title</label>
                                    <input type="text" class="form-control" value="<?php echo $all_product->pro_title?>" name="pro_title" required="">
                                  </div>
                                </div>
                                 <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                            <label>Photo Description</label>
                                            <textarea  id="desc" class="form-control" rows="3" name="pro_desc">
                                              <?php echo $all_product->pro_desc;?>
                                            </textarea>
                                            <script>CKEDITOR.replace('desc')</script>
                                         </div>
                                  </div>
                                <div class="col-lg-6 col-md-6">
                                  <div class="form-group">
                                    <label>Select Category</label>
                                    <select class="form-control" name="pro_cat">
                                       <option>Select One</option>
                                       <?php
                                          foreach ($all_cat as $category) {  ?>
                                       <option 
                                          <?php if($all_product->pro_cat==$category->category_id){?>
                                          selected="selected";
                                          <?php }?>
                                          value="<?php echo $category->category_id;?>"><?php echo $category->category_name?>
                                       </option>
                                       <?php } ?>
                                    </select>
                                  </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                  <div class="form-group">
                                    <label>Photo Price</label>
                                    <input type="number" class="form-control" value="<?php echo $all_product->pro_price?>" name="pro_price" required="">
                                  </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                  <div class="form-group">
                                    <label>Photo Quantity</label>
                                    <input type="number" class="form-control" value="<?php echo $all_product->pro_quantity?>" name="pro_quantity" required="">
                                  </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                  <div class="form-group">
                                    <label>Photo Status</label>
                                    <select class="form-control" name="pro_status">
                                       <?php if($all_product->pro_status==1){?>
                                       <option selected="" value="1">Enable</option>
                                       <option  value="2">Disable</option>
                                       <?php }elseif($all_product->pro_status==2){ ?>
                                       <option  value="1">Enable</option>
                                       <option selected="" value="2">Disable</option>
                                       <?php } ?> 
                                    </select>
                                  </div>
                                </div>
                                
                                <div class="col-lg-12 col-md-12">
                                  <div class="form-group">
                                    <label>Photo Availability</label>
                                    <select class="form-control" name="pro_availability">
                                      <?php if($all_product->pro_availability==1){?>
                                      <option selected="" value="1">In Stock</option>
                                      <option value="2">Out Of Stock</option>
                                      <option value="3">Up Comming</option>
                                      <?php }elseif($all_product->pro_availability==2){?>
                                      <option value="1">In Stock</option>
                                      <option selected="" value="2">Out Of Stock</option>
                                      <option value="3">Up Comming</option>
                                      <?php }elseif($all_product->pro_availability==3){?>
                                      <option value="1">In Stock</option>
                                      <option value="2">Out Of Stock</option>
                                      <option selected="" value="3">Up Comming</option>
                                      <?php }?>
                                    </select>
                                  </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                  <div class="form-group">
                                    <label>Upload Photo</label>
                                    <input type="file" name="pro_image">
                                    <input type="hidden" name="old_pro_image" value="<?php echo $all_product->pro_image;?>">
                                    <br>
                                    <img  class="imageThumb" src="<?php echo base_url('uploads/').$all_product->pro_image;?>"/>
                                  </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                  <div class="form-group">
                                    <label>Featured Photo</label>
                                    <div class="checkbox">
                                       <label>
                                       <?php if($all_product->is_featured==1){?>
                                       <input type="checkbox" name="is_featured" value="1" checked=""> Select Featured Photo
                                       <?php } else{?>
                                       <input type="checkbox" name="is_featured" value="1"> &nbsp;Select Featured Photo
                                       <?php } ?>
                                       </label>
                                    </div>
                                  </div>
                                </div>                             
                            </div>
                        </div>
                        <div class="social-form-info card-body border-top">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <button class="btn btn-primary" type="submit">Update</button>
                                </div>
                            </div>
                        </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view('partner/lib/footer.php');?>
</body>
</html>