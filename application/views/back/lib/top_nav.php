<nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="navbar">
   <!-- navbar-header -->
   <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo base_url();?>dashboard"  style="padding:20px;">
         <img class="logo logo-display" src="<?php echo base_url("assets/partner/images/logo.png"); ?>" alt="logo">
      </a>
   </div>
   <!-- end navbar-header -->
   <!-- navbar-top-links -->
   <ul class="nav navbar-top-links navbar-right">
      <!-- main dropdown -->
      <li class="dropdown">
         <a class="dropdown-toggle" data-toggle="dropdown" href="#">
         <span class="top-label label label-danger">
         <?php
            $all_message = $this->ContactModel->all_contact()[0]->total;
            
            echo $all_message;
            
            ?>
         </span><i class="fa fa-envelope fa-3x"></i>
         </a>
         <!-- dropdown-messages -->
         <ul class="dropdown-menu dropdown-messages">
            <?php $data = $this->ContactModel->get_all_message();
               ?>
            <?php 
               $i=0;
               
               foreach ($data as  $value) {  $i++; ?>
            <li>
               <a href="">
                  <div>
                     <strong><span class=" label label-danger"><?php echo $value->contact_name?></span></strong>
                     <span class="pull-right text-muted">
                     <em>
                     <?php
                        echo $value->contact_date;
                        
                        
                        
                        ?>
                     </em>
                     </span>
                  </div>
                  <div>
                     <?php $msg = $value->contact_message;
                        $content = explode(" ",$msg);
                        
                           $less_content = array_slice($content, 0, 10);
                        
                           echo implode(" ", $less_content);
                        
                        ?>
                  </div>
               </a>
            </li>
            <li class="divider"></li>
            <?php if($i==4){
               break;
               
               }?>
            <?php } ?>
            <li>
               <a class="text-center" href="#<?php echo base_url()?>contact-message-list">
               <strong>Read All Messages</strong>
               <i class="fa fa-angle-right"></i>
               </a>
            </li>
         </ul>
         <!-- end dropdown-messages -->
      </li>
      <li class="dropdown">
         <a class="dropdown-toggle" data-toggle="dropdown" href="#">
         <i class="fa fa-user fa-3x"></i>
         </a>
         <!-- dropdown user-->
         <ul class="dropdown-menu dropdown-user">
            <li><a href="#"><i class="fa fa-user fa-fw"></i>User Profile</a>
            </li>
            <li class="divider"></li>
            <li><a href="<?php echo base_url();?>Admin/adminlogout"><i class="fa fa-sign-out fa-fw"></i>Logout</a>
            </li>
         </ul>
         <!-- end dropdown-user -->
      </li>
      <!-- end main dropdown -->
   </ul>
   <!-- end navbar-top-links -->
</nav>