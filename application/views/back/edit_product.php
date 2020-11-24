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
          <h1 class="page-header">Edit Photo</h1>
        </div>
        <!--end page header -->
      </div>
      <div class="row">
        <div class="col-lg-12">
          <!-- Form Elements -->
          <div class="panel panel-default">
            <?php echo $this->session->flashdata('flsh_msg'); ?>
            <div class="panel-heading">Edit Photo
              <h4 class="success"> <?php echo $this->session->flashdata('update_pro_msg'); ?></h4>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-lg-12">
                  <h5 style='color:red'> <?php echo validation_errors();?></h5>
                  <?php echo form_open_multipart('update-product','');?>
                    <div class="col-lg-12 col-md-12">
                      <div class="form-group">
                        <label>Photo Title</label>
                        <input type="text" class="form-control" value="<?php echo $all_product->pro_title?>" name="pro_title" required="">
                        <input type="hidden" class="form-control" value="<?php echo $all_product->pro_id?>" name="pro_id">
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
                      <style>
                        .old_remove {
                            display: block;
                            border: 0px solid black;
                            color: #ff4d4d;
                            cursor: pointer;
                            position: relative;
                            bottom: 86px;
                            left: 75px;
                        }
                        .imageThumb {
                            max-height: 75px;
                            border: 2px solid;
                            padding: 1px;
                            cursor: pointer;
                            width: 80px;
                        }
                        .pip {
                            display: inline-block;
                            margin: 10px 15px 0 0;
                        }
                      </style>
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
                           <input type="checkbox" name="is_featured" value="1" checked="">Select Featured Photo
                           <?php } else{?>
                           <input type="checkbox" name="is_featured" value="1">Select Featured Products
                           <?php } ?>
                           </label>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                      <button type="submit" class="btn btn-primary">Update</button>
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
  <script>
      var img_url = "<?php echo base_url('delete-image/');?>";
      var url1 = "<?php echo base_url('edit-product/');?>";
      function deleteImage(val,id,urlid){
        var r = confirm("Are you sure you want to delete");
        if(r == true)
        {
            $.ajax({
                url: img_url+val+'?id='+id,
                type: "GET",
                success:function(data) { 
                    if(data=='done'){
                        window.location=url1+urlid;
                    } 
                }
            });
        }else{
            return false;
            //window.location=url1+id;
        }
      }
  </script>
</body>
</html>