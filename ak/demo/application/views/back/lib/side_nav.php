<nav class="navbar-default navbar-static-side" role="navigation">
   <!-- sidebar-collapse -->
   <div class="sidebar-collapse">
      <!-- side-menu -->
      <ul class="nav" id="side-menu">
         <li>
            <!-- user image section-->
            <div class="user-section">
               <div class="user-section-inner">
                  <img src="<?php echo base_url()?>assets/back/img/user.jpg" alt="">
               </div>
               <div class="user-info">
                  <div><?php echo substr($this->session->username,0,11);?>..</div>
                  <div class="user-text-online">
                     <span class="user-circle-online btn btn-success btn-circle "></span>&nbsp;Online
                  </div>
               </div>
            </div>
            <!--end user image section-->
         </li>
        
         <!--<li class="selected">-->
         <li>
            <a href="<?php echo base_url();?>dashboard"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
         </li>
         <li>
            <a href="<?php echo base_url();?>register-form"><i class="fa fa-user-plus fa-fw"></i> Register User</a>
         </li>
         <li>
            <a href="#"><i class="fa fa-tags fa-fw"></i> Category<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
               
               <li>
                  <a href="<?php echo base_url();?>category-list"><i class=""></i>Category List</a>
               </li>
                
               <li>
                  <a href="<?php echo base_url();?>sub-category-list"><i class=""></i>Sub Category List</a>
               </li>
            </ul>
         </li>
         
         <li>
            <a href="#"><i class="fa fa-product-hunt fa-fw"></i> Products Option<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
               <li>
                  <a href="<?php echo base_url();?>add-product"><i class=""></i>Add Product</a>
               </li>
               <li>
                  <a href="<?php echo base_url();?>product-list"><i class=""></i>Product List</a>
               </li>
            </ul>
         </li>
         <li>
            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Brand Option<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
               <li>
                  <a href="<?php echo base_url();?>add-brand">Add Brand</a>
               </li>
               <li>
                  <a href="<?php echo base_url();?>brand-list">Brand List</a>
               </li>
            </ul>
            <!-- second-level-items -->
         </li>
         <li>
            <a href="<?php echo base_url()?>manage-order"><i class="fa fa-flask fa-fw"></i>Manage Order</a>
         </li>
      </ul>
      <!-- end side-menu -->
   </div>
   <!-- end sidebar-collapse -->
</nav>