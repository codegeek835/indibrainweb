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
         <h1 class="page-header">Tables</h1>
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
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#categoryModal"> Add Sub Category</button>
                        </div>
                    </div>
                </div>
            </div>
            <p class="text-success"> <?php if(isset($success_message)){
               echo $success_message;
               }?>
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
                                    <th>Sub Category Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                if(isset($all_sub_cats)){
                                  foreach ($all_sub_cats as $value){
                                    $i++;

                                ?>
                                <tr class="gradeC">
                                    <td><?php echo $i;?></td>
                                    <td><?php echo $value->sub_category_name;?></td>
                                   
                                   <td>
                                        <a class="btn btn-info" href="<?php  echo base_url();?>edit-sub-category/<?php echo $value->sub_cat_id;?>">Edit</a>
                                        <a class="btn btn-danger" href="<?php  echo base_url();?>delete-sub-category/<?php echo $value->sub_cat_id;?>">Delete</a>
                                    </td> 
                                    
                                </tr>
                                <?php }} ?>
                            </tbody>
                        </table>
                    </div>
                    
                </div>
         </div>
         
         
        <!-- Modal -->
        <div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add new Sub Category</h5>
                
              </div>
              <h5 style='color:red'> <?php echo validation_errors();?></h5>
              <?php echo form_open('save-sub-category','');?>
              <?php $cat = $this->CategoryModel->get_all_category();?>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-8">
                             <div class="form-group">
                                <label>Select Category</label>
                                <select class="form-control" name="category_sub_id">
                                        <option>Select One</option>
                                       
                                         <?php
                                         foreach ($cat as $category) {  ?>
                                        <option value="<?php echo $category->category_id;?>"><?php echo $category->category_name?></option>
                                        <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Add Sub Category</label>
                                <input type="text" class="form-control" value="<?php echo set_value('sub_category_name')?>" name="sub_category_name" required="">
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