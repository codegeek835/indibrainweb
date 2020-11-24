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
               <h1 class="page-header">Category List</h1>
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
                           <div class="dataTables_info">Category Tables</div>
                        </div>
                        <div class="col-sm-6">
                           <div class="dataTables_paginate paging_simple_numbers">
                              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#categoryModal"> Add Category</button>
                           </div>
                        </div>
                     </div>
                  </div>
                  <p class="text-success"> 
                     <?php 
                        if(isset($success_message)){
                        
                        echo $success_message;
                        
                        }
                        
                        ?>
                  </p>
                  <?php if ($this->session->flashdata('flsh_msg')) 
                     {
                     
                     echo "<div class='alert alert-success'>";
                     
                     echo $this->session->flashdata('flsh_msg');
                     
                     echo "</div>";
                     
                     }?> 
                  <div class="panel-body">
                     <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                           <thead>
                              <tr>
                                 <th>Serial No</th>
                                 <th>Category Name</th>
                                 <th>Category Status</th>
                                 <th>Action</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php
                                 $i = 0;
                                 
                                 if(isset($all_cats)){
                                 
                                   foreach ($all_cats as $value){
                                 
                                     $i++;
                                 
                                 ?>
                              <tr class="gradeC">
                                 <td><?php echo $i;?></td>
                                 <td><?php echo $value->category_name;?></td>
                                 <td><?php if($value->category_status=='1'){echo "Active";}else{echo "Deactive";}?></td>
                                 <td>
                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#editCategoryModal" onclick="editCategoryModal('<?php echo $value->category_id;?>','<?php echo $value->category_name;?>');">Edit</button>
                                    <a class="btn btn-danger" href="<?php  echo base_url();?>delete-category/<?php echo $value->category_id;?>">Delete</a>
                                 </td>
                              </tr>
                              <?php }} ?>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
               <!-- Modal -->
               <div class="modal fade" id="editCategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                        </div>
                        <h5 style='color:red'> <?php echo validation_errors();?></h5>
                        <?php echo form_open('update-category','');?>
                        <input type="hidden" name="category_id" id="set_category_id">
                        <div class="modal-body">
                           <div class="row">
                              <div class="col-lg-8">
                                 <div class="form-group">
                                    <label>Category Name</label>
                                    <input type="text" class="form-control" value="<?php echo set_value('category_name')?>" id="set_category_val" name="category_name" required>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                           <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                        <?php echo form_close();?>
                     </div>
                  </div>
               </div>
               <!--End Advanced Tables -->
               <!-- Modal -->
               <div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLabel">Add new Category</h5>
                        </div>
                        <h5 style='color:red'> <?php echo validation_errors();?></h5>
                        <?php echo form_open('save-category','');?>
                        <div class="modal-body">
                           <div class="row">
                              <div class="col-lg-8">
                                 <div class="form-group">
                                    <label> Category Name</label>
                                    <input type="text" class="form-control" value="<?php echo set_value('category_name')?>" name="category_name" required="">
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                           <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                        <?php echo form_close();?>
                     </div>
                  </div>
               </div>
               <!--End Advanced Tables -->
               <script>
                  function editCategoryModal(id,category_name){
                  
                      document.getElementById("set_category_id").value = id;
                  
                      document.getElementById("set_category_val").value = category_name;
                  
                  }
                  
               </script>
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