<nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="navbar">
   <!-- navbar-header -->
   <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo base_url();?>dashboard">
         <h1 style="margin-top: 10px;"><strong>Admin Panel</strong></h1>
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
               <a class="text-center" href="<?php echo base_url()?>contact-message-list">
               <strong>Read All Messages</strong>
               <i class="fa fa-angle-right"></i>
               </a>
            </li>
         </ul>
         <!-- end dropdown-messages -->
      </li>
      <li class="dropdown">
         <a class="dropdown-toggle" data-toggle="dropdown" href="#">
         <span class="top-label label label-success">4</span>  <i class="fa fa-tasks fa-3x"></i>
         </a>
         <!-- dropdown tasks -->
         <ul class="dropdown-menu dropdown-tasks">
            <li>
               <a href="#">
                  <div>
                     <p>
                        <strong>Task 1</strong>
                        <span class="pull-right text-muted">40% Complete</span>
                     </p>
                     <div class="progress progress-striped active">
                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                           <span class="sr-only">40% Complete (success)</span>
                        </div>
                     </div>
                  </div>
               </a>
            </li>
            <li class="divider"></li>
            <li>
               <a href="#">
                  <div>
                     <p>
                        <strong>Task 2</strong>
                        <span class="pull-right text-muted">20% Complete</span>
                     </p>
                     <div class="progress progress-striped active">
                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                           <span class="sr-only">20% Complete</span>
                        </div>
                     </div>
                  </div>
               </a>
            </li>
            <li class="divider"></li>
            <li>
               <a href="#">
                  <div>
                     <p>
                        <strong>Task 3</strong>
                        <span class="pull-right text-muted">60% Complete</span>
                     </p>
                     <div class="progress progress-striped active">
                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                           <span class="sr-only">60% Complete (warning)</span>
                        </div>
                     </div>
                  </div>
               </a>
            </li>
            <li class="divider"></li>
            <li>
               <a href="#">
                  <div>
                     <p>
                        <strong>Task 4</strong>
                        <span class="pull-right text-muted">80% Complete</span>
                     </p>
                     <div class="progress progress-striped active">
                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                           <span class="sr-only">80% Complete (danger)</span>
                        </div>
                     </div>
                  </div>
               </a>
            </li>
            <li class="divider"></li>
            <li>
               <a class="text-center" href="#">
               <strong>See All Tasks</strong>
               <i class="fa fa-angle-right"></i>
               </a>
            </li>
         </ul>
         <!-- end dropdown-tasks -->
      </li>
      <li class="dropdown">
         <a class="dropdown-toggle" data-toggle="dropdown" href="#">
         <span class="top-label label label-warning">5</span>  <i class="fa fa-bell fa-3x"></i>
         </a>
         <!-- dropdown alerts-->
         <ul class="dropdown-menu dropdown-alerts">
            <li>
               <a href="#">
                  <div>
                     <i class="fa fa-comment fa-fw"></i>New Comment
                     <span class="pull-right text-muted small">4 minutes ago</span>
                  </div>
               </a>
            </li>
            <li class="divider"></li>
            <li>
               <a href="#">
                  <div>
                     <i class="fa fa-twitter fa-fw"></i>3 New Followers
                     <span class="pull-right text-muted small">12 minutes ago</span>
                  </div>
               </a>
            </li>
            <li class="divider"></li>
            <li>
               <a href="#">
                  <div>
                     <i class="fa fa-envelope fa-fw"></i>Message Sent
                     <span class="pull-right text-muted small">4 minutes ago</span>
                  </div>
               </a>
            </li>
            <li class="divider"></li>
            <li>
               <a href="#">
                  <div>
                     <i class="fa fa-tasks fa-fw"></i>New Task
                     <span class="pull-right text-muted small">4 minutes ago</span>
                  </div>
               </a>
            </li>
            <li class="divider"></li>
            <li>
               <a href="#">
                  <div>
                     <i class="fa fa-upload fa-fw"></i>Server Rebooted
                     <span class="pull-right text-muted small">4 minutes ago</span>
                  </div>
               </a>
            </li>
            <li class="divider"></li>
            <li>
               <a class="text-center" href="#">
               <strong>See All Alerts</strong>
               <i class="fa fa-angle-right"></i>
               </a>
            </li>
         </ul>
         <!-- end dropdown-alerts -->
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
            <li><a href="<?php echo base_url();?>Login/adminlogout"><i class="fa fa-sign-out fa-fw"></i>Logout</a>
            </li>
         </ul>
         <!-- end dropdown-user -->
      </li>
      <!-- end main dropdown -->
   </ul>
   <!-- end navbar-top-links -->
</nav>