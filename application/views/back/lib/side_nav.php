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
            <a href="<?php echo base_url();?>partner-list"><i class="fa fa-user-plus fa-fw"></i> Creative Partner</a>
         </li>
         <li>
            <a href="<?php echo base_url();?>user-list"><i class="fa fa-user-plus fa-fw"></i> User List</a>
         </li>
         <li>
            <a href="<?php echo base_url();?>category-list"><i class="fa fa-tags fa-fw"></i> Category List</a>
         </li>

         <li>
            <a href="<?php echo base_url();?>product-list"><i class="fa fa-product-hunt fa-fw"></i> Product List</a>
         </li>

         <li>
            <a href="<?php echo base_url();?>dashboard"><i class="fa fa fa-list-alt fa-fw"></i> All Orders</a>
         </li>

         <li>
            <a href="<?php echo base_url();?>dashboard"><i class="fa fa-money fa-fw"></i> Payment List</a>
         </li>

         <li>
            <a href="<?php echo base_url();?>dashboard"><i class="fa fa-commenting fa-fw"></i> Reviews List</a>
         </li>
         <!-- <li>
            <a href="#"><i class="fa fa-product-hunt fa-fw"></i> Products Option<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li>
                  <a href="<?php echo base_url();?>product-list"><i class=""></i>Product List</a>
               </li>
               <li>
                  <a href="<?php echo base_url();?>add-product"><i class=""></i>Add Product</a>
               </li>
            </ul>
         </li> -->
      </ul>
      <!-- end side-menu -->
   </div>
   <!-- end sidebar-collapse -->
</nav>