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
                   <div style="width: 100%;">
                <div class="card">
                    <?php if ($this->session->flashdata('flsh_msg')) 
                     {
                     
                     echo "<div class='alert alert-success'>";
                     
                     echo $this->session->flashdata('flsh_msg');
                     
                     echo "</div>";
                     
                     }?>
                    <h5 style='color:red'> <?php echo validation_errors();?></h5>
                    <?php echo form_open_multipart('save-my-upload','');?>
                   
                    <input type="hidden" name="pro_user_id" value="<?php echo $info->user_id;?>">
                        <!-- Form Name -->
                        <div class="venue-form-info card-body">
                            <div class="add-form">
                              <div class="">
                                 <div class="form-group">
                                    <label>Upload Photo &nbsp;<b>( PNG | GIF | JPG | JPEG ) </b></label>
                                    <!--<input type="file" name="pro_image" required>-->
                                    <div class="custom-file">
                           <input name="pro_image" type="file"  class="custom-file-input" required>
                              <label class="custom-file-label">Choose file</label>
                           </div>
                                 </div>
                              </div>
                            </div>
                        </div>
                        <div class="social-form-info card-body border-top">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-center">
                                    <button class="btn btn-primary" type="submit"><i class="fa fa-floppy-o"></i> Upload</button>
                                </div>
                            </div>
                        </div>
                    <?php echo form_close(); ?>
                </div>
                </div>
                </div>
            </div>
        </div>
        <?php $this->load->view('partner/lib/footer-side.php');?>
    </div>
    <?php $this->load->view('partner/lib/footer.php');?>
</body>
</html>