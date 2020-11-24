<!DOCTYPE html>
<html lang="en">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta content="Anil z" name="author" />
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <?php $this->load->view('front/lib/header-css.php');?>
   </head>
   <body>
      <!-- START HEADER -->
      <header class="header_wrap fixed-top header_with_topbar">
         <?php $this->load->view('front/lib/header-top.php');?>
         <?php $this->load->view('front/lib/header-middle-menu.php');?>
      </header>
      <!-- END HEADER -->
      <!-- START SECTION BREADCRUMB -->
      <div class="breadcrumb_section bg_gray page-title-mini"><?php $this->load->view('front/lib/breadcrumb_section.php');?></div>
      <!-- END SECTION BREADCRUMB -->
      <!-- START MAIN CONTENT -->
      <div class="main_content">
         <!-- START SECTION SHOP -->
         <div class="section">
            <div class="container">
               <div class="row">
                  <div class="col-lg-9">
                     <div class="row shop_container list">
                        <div class="col-12">
                           <div class="blog_post blog_style2 box_shadow1">
                              <div class="blog_content bg-white">
                                 <div class="blog_text">
                                    <p>
                                       Hello <strong><?php echo $cus_info->cus_name;?></strong> (not <strong><?php echo $cus_info->cus_name;?></strong>? <a href="<?php echo site_url().'logout';?>">Log out</a>)
                                    </p>
                                    <ul class="list_none blog_meta">
                                       <li>
                                          <a href="#"><i class="ti-calendar"></i> <?php echo date("j F Y",strtotime($cus_info->created_at));?></a>
                                       </li>
                                    </ul>
                                    <p>
                                       From your account dashboard you can view your <a href="<?php echo site_url().'my-orders';?>">recent orders</a>, manage your <a href="<?php echo site_url().'edit-address';?>"> addresses</a>, and <a href="<?php echo site_url().'edit-account';?>">edit your password and account details</a>.
                                    </p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-3 order-lg-first mt-4 pt-2 mt-lg-0 pt-lg-0">
                     <div class="sidebar">
                        <div class="categories_wrap">
                           <div id="navCatContent" class="nav_cat navbar collapse">
                              <ul>
                                 <li>
                                    <a class="nav-link" href="<?php echo site_url().'my-account';?>"><i class="fa fa-tachometer"></i> <span>Dashboard</span></a>                                                
                                 </li>
                                 <li>
                                    <a class="nav-link" href="<?php echo site_url().'my-orders';?>"><i class="fa fa-server"></i> <span>Orders</span></a>
                                 </li>
                                 <li>
                                    <a class="nav-link" href="<?php echo site_url().'edit-address';?>"><i class="fa fa-address-card"></i> <span>Addresses</span></a>
                                 </li>
                                 <li>
                                    <a class="nav-link" href="<?php echo site_url().'edit-account';?>"><i class="fa fa-user"></i> <span>Account details</span></a>
                                 </li>
                                 <li>
                                    <a class="nav-link" href="<?php echo site_url().'logout';?>"><i class="fa fa-sign-out"></i> <span>Logout</span></a>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- END SECTION SHOP -->
         <!-- START SECTION SUBSCRIBE NEWSLETTER -->
         <div class="section bg_default small_pt small_pb"><?php $this->load->view('front/lib/newsletter.php');?></div>
         <!-- START SECTION SUBSCRIBE NEWSLETTER -->
      </div>
      <!-- END MAIN CONTENT -->
      <!-- START FOOTER -->
      <footer class="footer"><?php $this->load->view('front/lib/footer.php');?></footer>
      <!-- END FOOTER -->
   </body>
</html>