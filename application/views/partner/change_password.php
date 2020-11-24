<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php $this->load->view('partner/lib/header.php');?>
</head>
<body class="body-bg">
    <?php $this->load->view('partner/lib/top_navigation.php');?>
    <div class="dashboard-wrapper">
        <?php $this->load->view('partner/lib/side_navigation.php');?>
        <div class="dashboard-content">
            <div class="container-fluid">
                <div class="row page-head">
               <h2 class="find">Change Password</h2>
            </div>
            <br>
                <div class="row card">
                <?php if($this->session->flashdata('flash_msg')){ ?>
                <div class="alert alert-danger" role="alert">
                <?php echo $this->session->flashdata('flash_msg'); ?>
                </div>
                <?php }?>
                <?php if($this->session->flashdata('flash_msg_success')){ ?>
                <div class="alert alert-success" role="alert">
                <?php echo $this->session->flashdata('flash_msg_success'); ?>
                </div>
                <?php }?>
                
                <?php if(validation_errors()){ ?>
                <div class="alert alert-danger" role="alert">
                <?php echo validation_errors();?>
                </div>
                <?php }?>
                  <?php echo form_open('CreativePartner/update_partner_password','');?>
                    <input type="hidden" name="user_id" value="<?php echo $info->user_id;?>">
                    <!-- Form Name -->
                    <div class="venue-form-info card-body">
                      <div class="row add-form">
                        <div class="col-lg-12 col-md-12">
                           <div class="form-group">
                              <label>Current Password</label>
                              <input type="password" class="form-control" name="current_password" placeholder="Current Password" required> 
                           </div>
                        </div>

                        <div class="col-lg-6 col-md-6">
                           <div class="form-group">
                              <label>New Password</label>
                              <input type="password" class="form-control" name="new_password" placeholder="New Password" required> 
                           </div>
                        </div>
                        
                        <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" required> 
                        </div>
                        </div>                           
                      </div>
                    </div>
                    <div class="social-form-info card-body border-top">
                      <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                          <button class="btn btn-primary font-weight-bold" type="submit">Update</button>
                        </div>
                      </div>
                    </div>
                  <?php echo form_close(); ?>
                </div>
            </div>
        </div>
        <?php $this->load->view('partner/lib/footer-side.php');?>
    </div>
    <?php $this->load->view('partner/lib/footer.php');?>
    <script>
      $(document).ready(function() {
        $.uploadPreview({
          input_field: "#image-upload", // Default: .image-upload
          preview_box: "#image-preview", // Default: .image-preview
          label_field: "#image-label", // Default: .image-label
          label_default: "Choose File", // Default: Choose File
          label_selected: "Change File", // Default: Change File
          no_label: false // Default: false
        });
      });
    </script>
</body>
</html>