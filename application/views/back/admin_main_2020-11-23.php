<?php $this->load->view('back/lib/header.php');?>
<body>
   <!--  wrapper -->
   <div id="wrapper">
      <!-- navbar top -->
      <?php $this->load->view('back/lib/top_nav.php');?>
      <!-- end navbar top -->
      <?php $this->load->view('back/lib/side_nav.php');?>
      <!-- navbar side -->
      <!-- end navbar side -->
      <!--  page-wrapper -->
      <div id="page-wrapper">
         <div class="row">
            <!-- Page Header -->
            <div class="col-lg-12">
               <h1 class="page-header">Dashboard</h1>
            </div>
            <!--End Page Header -->
         </div>
         <div class="row">
            <!-- Welcome -->
            <div class="col-lg-12">
               <div class="alert alert-info">
                  <i class="fa fa-folder-open"></i><b>&nbsp;Hello ! </b>Welcome Back <b><?php echo $this->session->username;?></b>
               </div>
            </div>
            <!--end  Welcome -->
         </div>
         <div class="row">
            <!--quick info section -->
            <div class="col-lg-4">
               <div class="alert alert-success text-center">
                  <i class="fa  fa-beer fa-3x"></i>&nbsp;<b>27 % </b>Profit Recorded in This Month  
               </div>
            </div>
            <div class="col-lg-4">
               <div class="alert alert-info text-center">
                  <i class="fa fa-pencil-square-o fa-3x"></i>&nbsp;<b>2060</b> Pending Orders Found
               </div>
            </div>
            <div class="col-lg-4">
               <div class="alert alert-warning text-center">
                  <i class="fa  fa-pencil fa-3x"></i>&nbsp;<b>2,000 $ </b>Payment Dues For Rejected
               </div>
            </div>
            <!--end quick info section -->
         </div>
         <div class="row">
            <div class="col-lg-8">
               <!--Simple table example -->
               <div class="panel panel-primary">
                  <div class="panel-heading">
                     <i class="fa fa-bar-chart-o fa-fw"></i> Recently added products
                  </div>
                  <div class="panel-body">
                     <div class="row">
                        <div class="col-lg-12">
                           <div class="table-responsive">
                              <table class="table table-bordered table-hover table-striped">
                                 <thead>
                                    <tr>
                                       <th>#</th>
                                       <th>Title</th>
                                       <th>Category</th>
                                       <th>Amount</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php if($recent_product){ foreach($recent_product as $product){?>
                                    <tr>
                                       <td><?php echo $product->pro_id;?></td>
                                       <td><?php echo $product->pro_title;?></td>
                                       <td><?php echo getcatIdName($product->pro_cat);?></td>
                                       <td>$<?php echo number_format($product->pro_price,2);?></td>
                                    </tr>
                                    <?php }}?>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                     <!-- /.row -->
                  </div>
                  <!-- /.panel-body -->
               </div>
               <!--End simple table example -->
            </div>
            <div class="col-lg-4">
               <div class="panel panel-primary text-center no-boder">
                  <div class="panel-body blue">
                     <i class="fa fa-thumbs-up fa-3x"></i>
                     <h3>2,060 </h3>
                  </div>
                  <div class="panel-footer">
                     <span class="panel-eyecandy-title">New Creative Partner </span>
                  </div>
               </div>
               <div class="panel panel-primary text-center no-boder">
                  <div class="panel-body red">
                     <i class="fa fa-thumbs-up fa-3x"></i>
                     <h3>2,700 </h3>
                  </div>
                  <div class="panel-footer">
                     <span class="panel-eyecandy-title">New User Registered
                     </span>
                  </div>
               </div>
            </div>
         </div>
       
      </div>
      <!-- end page-wrapper -->      
      <script src="<?php echo base_url()?>assets/back/plugins/dataTables/jquery.dataTables.js"></script>
      <script>
         $(document).ready(function () {
         
             $('#dataTables-example').dataTable();
         
         });
      </script>
      <!-- end page-wrapper -->
   </div>
   <!-- Core Scripts - Include with every page -->
   <?php $this->load->view('back/lib/footer.php');?>
</body>
</html>