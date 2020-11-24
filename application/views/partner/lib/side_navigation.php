<?php
$last = $this->uri->total_segments();

$last_1 = $last-1;
$record = $this->uri->segment($last_1);
if($record =='partner-profile'){
   $record_num = $record; 
}else{
  $record_num = $this->uri->segment($last);  
}
?>
<div class="dashboard-sidebar offcanvas-collapse">
    <div class="vendor-user-profile">
        <div class="vendor-profile-img">
          <img src="<?php if($info->image){ echo base_url().'/assets/partner/profile/'.$info->image;}else{ echo base_url('/assets/default.png');}?>" alt="" class="rounded-circle"></div>
          <h3 class="vendor-profile-name"><?php if($info->username){ echo $info->username;}?> <br> <?php if($info->user_level){?> <span>(<?php echo $info->user_level;?> Partner)</span><?php }?> </h3>
    </div>
    <div class="dashboard-nav">
        <ul class="list-unstyled">
            <li class="<?php if($record_num=='partner-dashboard'){echo "active";}?>"><a href="<?php echo base_url();?>partner-dashboard"><span class="dash-nav-icon"><i class="fa fa-tachometer"></i></span>Dashboard</a></li>
            <li class="<?php if($record_num=='portfolio'){echo "active";}?>"><a href="<?php echo base_url('portfolio');?>"><span class="dash-nav-icon"><i class="fa fa-picture-o"></i></span> Portfolio </a></li>
            <li class="<?php if($record_num=='reports'){echo "active";}?>"><a href="<?php echo base_url('reports');?>"><span class="dash-nav-icon"><i class="fa fa-file-text-o"></i></span> Reports </a></li>
            <li class="<?php if($record_num=='insights'){echo "active";}?>"><a href="<?php echo base_url('insights');?>"><span class="dash-nav-icon"><i class="fa fa-lightbulb-o"></i></span> Insights </a></li>
            <li class="<?php if($record_num=='upkeep'){echo "active";}?>"><a href="<?php echo base_url('upkeep');?>"><span class="dash-nav-icon"><i class="fa fa-cogs"></i></span> Upkeep </a></li>
            <li class="<?php if($record_num=='partner-profile'){echo "active";}?>"><a href="<?php echo base_url('partner-profile/').getEncrypt($info->user_id);?>"><span class="dash-nav-icon"><i class="fas fa-user-circle"></i></span>Profile </a></li>
            <li class="<?php if($record_num=='my-upload' || $record_num=='add-my-product'){echo "active";}?>"><a href="<?php echo base_url();?>upload-image"><span class="dash-nav-icon"><i class="fa fa-product-hunt"></i></span> My Uploads </a></li>
            <li class="<?php if($record_num=='password-change'){echo "active";}?>"><a href="<?php echo base_url('password-change/');?>"><span class="dash-nav-icon"><i class="fa fa-unlock-alt"></i></span>Change Password </a></li>
            <li><a href="<?php echo base_url('partner-logout');?>"><span class="dash-nav-icon"><i class="fas fa-sign-out-alt"></i></span>Logout </a></li>
        </ul>
    </div>
</div>