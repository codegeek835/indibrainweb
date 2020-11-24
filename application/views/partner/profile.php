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
              <h2 class="find">Profile</h2>
            </div>
                <br>
                <div class="row card">
                  <?php if ($this->session->flashdata('flsh_msg')) 
                  {
                    echo "<div class='alert alert-success'>";
                    echo $this->session->flashdata('flsh_msg');
                    echo "</div>";
                  }?>
                  <h5 style='color:red'> <?php echo validation_errors();?></h5>
                  <?php echo form_open_multipart('update-partner-profile','');?>
                    <input type="hidden" name="user_id" value="<?php echo $info->user_id;?>">
                    <input type="hidden" name="old_profile_image" value="<?php if($info->image){echo $info->image;}else{echo "user.png";}?>">
                    <!-- Form Name -->
                    <div class="venue-form-info card-body">
                      <div class="row add-form">
                        <div class="profile-upload-img">
                          <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                            <div id="image-preview">
                                
                                
                              <img src="<?php if($info->image){echo base_url().'/assets/partner/profile/'.$info->image;}else{echo base_url('/assets/default.png');}?>" alt="" class="rounded-circle">
                            </div>
                            <input type="file" name="profile_image" id="image-upload" class="upload-profile-input">
                          </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                           <div class="form-group">
                              <label>Full Name</label>
                              <input type="text" class="form-control" name="username"  value="<?php echo $info->username;?>" required>
                           </div>
                        </div>

                        <div class="col-lg-6 col-md-6">
                           <div class="form-group">
                              <label>Email</label>
                              <input type="text" class="form-control" name="user_email" value="<?php echo $info->user_email;?>" required>
                           </div>
                        </div>
                        
                        <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                        <label>Phone</label>
                        <input type="text" class="form-control" name="user_phone" value="<?php echo $info->user_phone;?>"required>
                        </div>
                        </div>

                        <div class="col-lg-12">
                        <div class="form-group">
                         <label> Address </label>
                         <input type="text" class="form-control" name="address" value="<?php echo $info->address;?>"required="">
                        </div>
                        </div>

                        <div class="col-lg-6">
                        <div class="form-group">
                         <label> Country</label>
                         <input type="text" class="form-control" name="country" value="<?php echo $info->country;?>" required="">
                        </div>
                        </div>
                        <div class="col-lg-6">
                        <div class="form-group">
                        <label> State </label>
                        <input type="text" class="form-control" name="state" value="<?php echo $info->state;?>"required="">
                        </div>
                        </div>
                        <div class="col-lg-6">
                        <div class="form-group">
                        <label> City</label>
                        <input type="text" class="form-control" name="city" value="<?php echo $info->city;?>" required="">
                        </div>
                        </div>
                        <div class="col-lg-6">
                        <div class="form-group">
                        <label> Pin Code </label>
                        <input type="number" class="form-control" name="pincode" value="<?php echo $info->pincode;?>" required="">
                        </div>
                        </div>
                        <div class="col-lg-12">
                        <div>
                        <h3><b>Account Details</b></h3>
                        </div>
                        <hr>
                        </div>
                        <div class="col-lg-6">
                        <div class="form-group">
                        <label> Account Holder Name </label>
                        <input type="text" class="form-control" name="holder_name" value="<?php echo $info->holder_name;?>">
                        </div>
                        </div> 
                        <div class="col-lg-6">
                        <div class="form-group">
                        <label> Bank Name</label>
                        <input type="text" class="form-control" name="bank_name" value="<?php echo $info->bank_name;?>">
                        </div>
                        </div> 
                        <div class="col-lg-6">
                        <div class="form-group">
                        <label> Branch Name</label>
                        <input type="text" class="form-control" name="branch_name" value="<?php echo $info->branch_name;?>">
                        </div>
                        </div> 
                        
                        <div class="col-lg-6">
                        <div class="form-group">
                        <label> Account Number</label>
                        <input type="text" class="form-control" name="account_number" value="<?php echo $info->account_number;?>">
                        </div>
                        </div> 
                        
                        <div class="col-lg-6">
                        <div class="form-group">
                        <label>IFSC Code</label>
                        <input type="text" class="form-control" name="IFSC_code" value="<?php echo $info->IFSC_code;?>">
                        </div>
                        </div> 
                         <div class="col-lg-6">
                        <div class="form-group">
                        <label> Pan Card No </label>
                        <input type="text" class="form-control" name="pan_number" value="<?php echo $info->pan_number;?>">
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