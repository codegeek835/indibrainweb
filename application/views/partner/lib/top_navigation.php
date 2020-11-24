<div class="dashboard-header">
   <div class="container-fluid">
      <div class="row">
         <div class="col-xl-8 col-lg-9 col-md-7 col-sm-6 col-6">
            <div class="header-logo">
               <a href="#"><img class="logo logo-display" src="<?php echo base_url("assets/partner/images/logo.png"); ?>" alt="logo"></a>
            </div>
         </div>
         <div class="col-xl-4 col-lg-3 col-md-5 col-sm-6 col-6">
            <nav class="navbar navbar-expand-lg float-right db-nav-list">
               <div>
                  <ul class="navbar-nav">
                      <li class="nav-item dropdown dropleft notification ">
                        <a class="nav-link dropdown-toggle" href="https://indibrainweb.com/" target= _blank >
                        <span class="notification-icon"> <i class="fa fa-home" aria-hidden="true" title="Goto Home Website"></i></span>
                        <span class="user-vendor-name"></span></a>
                     </li>
                     <li class="nav-item dropdown dropleft notification ">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="notification-icon"> <i class="fas fa-bell" title="Notification"></i></span>
                        <span class="user-vendor-name"></span></a>
                     </li>
                     <li class="nav-item dropdown dropleft user-vendor ">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="user-icon"> <img src="<?php if($info->image){ echo base_url().'/assets/partner/profile/'.$info->image;}else{ echo base_url('/assets/default.png');}?>" class="rounded-circle mb10"></span>
                        <span class="user-vendor-name"><?php if($info->username){ echo $info->username;}?> <i class="fa fa-caret-down"></i></span></a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                           <a class="dropdown-item" href="<?php echo base_url('partner-profile/').getEncrypt($info->user_id);?>">My Profile </a>
                           <a class="dropdown-item" href="<?php echo base_url('partner-logout');?>">Log Out</a>
                        </div>
                     </li>
                  </ul>
               </div>
            </nav>
         </div>
      </div>
   </div>
</div>
<div class="navbar-expand-lg">
   <button class="navbar-toggler" type="button" data-toggle="offcanvas">
   <span id="icon-toggle" class="fa fa-bars"></span>
   </button>
</div>