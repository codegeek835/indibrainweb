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
            <!--  page header -->
            <div class="col-lg-12">
               <h1 class="page-header">Photo List</h1>
            </div>
            <!-- end  page header -->
         </div>
         <div class="row">
            <div class="col-lg-12">
               <!-- Advanced Tables -->
               <div class="panel panel-default">
                  <div class="panel-heading">
                     <div class="row">
                        <div class="col-sm-6">
                           <div class="dataTables_info">Photo Tables</div>
                        </div>
                        <div class="col-sm-6">
                           <div class="dataTables_paginate paging_simple_numbers">
                              <a href="<?php echo base_url();?>add-product" class="btn btn-primary"> Add New Photo</a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <?php if(isset($success_message)){?>
                  <p class="text-success"> <?php echo $success_message;?>
                  <?php }?>
                  </p>
                  <?php if ($this->session->flashdata('flsh_msg')) 
                     {
                     
                     echo "<div class='alert alert-success'>";
                     
                     echo $this->session->flashdata('flsh_msg');
                     
                     echo "</div>";
                     
                     }?> 

                     <?php if ($this->session->flashdata('product_delete')) 
                     {
                     
                     echo "<div class='alert alert-success'><h4 class='success'>";
                     
                     echo $this->session->flashdata('product_delete');
                     
                     echo "</h4></div>";
                     
                     }?> 

                 
                  <div class="panel-body">
                     <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                           <thead>
                              <tr>
                                 <th>S No</th>
                                 <th>Image</th>
                                 <th>Title</th>
                                 <th>Category</th>
                                 <th>Price</th>
                                 <th>Availability</th>
                                 <th>Status</th>
                                 <th>Action</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php
                                 $i = 0;
                                 
                                 if(isset($all_product)){
                                 
                                   foreach ($all_product as $value){
                                 
                                     $i++;
                                 
                                 
                                
                                 ?>
                              <tr class="gradeC">
                                 <td><?php echo $i;?></td>
                                 <td><img src="<?php echo base_url('uploads/'). getSingalImage($value->pro_id);?>" width="80px" height="80px"/></td>
                                 <td width="30%"><?php echo $value->pro_title;?></td>
                                 <td><?php echo getcatIdName($value->pro_cat);?></td>
                                 <td><?php echo $value->pro_price;?></td>
                                 <td>
                                    <?php if($value->pro_status==1){
                                       echo "Enable";
                                       
                                       }else{
                                       
                                        echo "Disable";
                                       
                                       }?>
                                 </td>
                                 <td>
                                    <?php if($value->pro_availability==1){
                                       echo "In Stock";
                                       
                                       }elseif($value->pro_availability==2){
                                       
                                        echo "Out Of Stock";
                                       
                                       }else{
                                       
                                       echo "Up Coming";
                                       
                                       }?>
                                 </td>
                                 <td>
                                    <a class="btn btn-info" href="<?php echo base_url()?>edit-product/<?php echo $value->pro_id?>">Edit</a>
                                    <a class="btn btn-danger" href="<?php echo base_url()?>delete-product/<?php echo $value->pro_id?>">Delete</a>
                                 </td>
                              </tr>
                              <?php }} ?>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
               <!--End Advanced Tables -->
            </div>
         </div>
      </div>
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