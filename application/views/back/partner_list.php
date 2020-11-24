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
               <h1 class="page-header">Partner List</h1>
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
                           <div class="dataTables_info">Partner Tables</div>
                        </div>
                        <div class="col-sm-6">
                           <div class="dataTables_paginate paging_simple_numbers">
                              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#userModal"> Add Partner</button>
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
                     <font class='error'><p style="margin-left: 10px;"><?php echo validation_errors();?></p></font>
                  <div class="panel-body">
                     <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                           <thead>
                              <tr>
                                 <th>Full Name</th>
                                 <th>Email</th>
                                 <th>Phone</th>
                                 <th>Address</th>
                                 <th>Status</th>
                                 <th>Action</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php if(isset($users)){ foreach ($users as $user){?>
                              <tr class="gradeC">
                                 <td><?php echo $user->username;?></td>
                                 <td><?php echo $user->user_email;?></td>
                                 <td><?php echo $user->user_phone;?></td>
                                 <td><?php echo $user->address;?></td>
                                 
                                 <td><?php if($user->user_status=='1'){?>
                                        <a class="btn btn-primary btn-xs" href="<?php  echo base_url();?>partner-status/<?php echo $user->user_id;?>" title="Click to Deactive">Active</a>
                                    <?php }else{?>
                                    <a class="btn btn-danger btn-xs" href="<?php  echo base_url();?>partner-status/<?php echo $user->user_id;?>" title="Click to Active">DeActive</a>
                                    <?php }?></td>
                                 <td>
                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#edituserModal" onclick="edituserModal('<?php echo $user->user_id;?>','<?php echo $user->username;?>','<?php echo $user->user_email;?>','<?php echo $user->user_phone;?>','<?php echo $user->user_password;?>','<?php echo $user->address;?>','<?php echo $user->country;?>','<?php echo $user->state;?>','<?php echo $user->city;?>','<?php echo $user->pincode;?>','<?php echo $user->image;?>');">Edit</button>
                                    <a class="btn btn-danger" href="<?php  echo base_url();?>delete-partner/<?php echo $user->user_id;?>">Delete</a>
                                 </td>
                              </tr>
                              <?php }} ?>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
               <!-- Modal -->
               <div class="modal fade" id="edituserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLabel">Edit Partner</h5>
                        </div>
                        
                        <?php echo form_open_multipart('update-partner','');?>
                        <input type="hidden" name="partner_id" id="partner_id">
                        <div class="modal-body">
                           <div class="container-fluid">
                              <div class="row">
                                 <div class="col-lg-6">
                                    <div class="form-group">
                                       <label> Full Name</label>
                                       <input type="text" class="form-control" name="username" id="username" required="">
                                    </div>
                                 </div>
                                 <div class="col-lg-6">
                                    <div class="form-group">
                                       <label> Email</label>
                                       <input type="email" class="form-control" name="user_email" id="user_email" required="">
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-lg-6">
                                    <div class="form-group">
                                       <label> Phone </label>
                                       <input type="number" class="form-control" name="user_phone" id="user_phone" required="">
                                    </div>
                                 </div>
                                 <div class="col-lg-6">
                                    <div class="form-group">
                                       <label> Password </label>
                                       <input type="password" class="form-control" name="user_password">
                                       <input type="hidden" id="hid_password" name="password">
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-lg-12">
                                    <div class="form-group">
                                       <label> Address </label>
                                       <input type="text" class="form-control" name="address" id="address" required="">
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-lg-6">
                                    <div class="form-group">
                                       <label> Country</label>
                                       <input type="text" class="form-control" name="country" id="country" required="">
                                    </div>
                                 </div>
                                 <div class="col-lg-6">
                                    <div class="form-group">
                                       <label> State </label>
                                       <input type="text" class="form-control" name="state" id="state" required="">
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-lg-6">
                                    <div class="form-group">
                                       <label> City</label>
                                       <input type="text" class="form-control" name="city" id="city" required="">
                                    </div>
                                 </div>
                                 <div class="col-lg-6">
                                    <div class="form-group">
                                       <label> Pin Code </label>
                                       <input type="number" class="form-control" name="pincode" id="pincode" required="">
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-lg-6">
                                    <div class="form-group">
                                       <label> Upload Partner Image</label>
                                       <input type="file" name="partner_image">
                                       <input type="hidden" name="old_image" id="old_image">
                                    </div>
                                 </div>

                                 <div class="col-lg-6">
                                    <div class="form-group" id="imageDiv">
                                       
                                    </div>
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
               <div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLabel">Add new Partner</h5>
                        </div>
                        <h5 style='color:red'> <?php echo validation_errors();?></h5>
                        <?php echo form_open_multipart('save-partner','');?>
                        <div class="modal-body">
                           <div class="container-fluid">
                              <div class="row">
                                 <div class="col-lg-6">
                                    <div class="form-group">
                                       <label> Full Name</label>
                                       <input type="text" class="form-control" name="username" required="">
                                    </div>
                                 </div>
                                 <div class="col-lg-6">
                                    <div class="form-group">
                                       <label> Email</label>
                                       <input type="email" class="form-control" name="user_email" required="">
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-lg-6">
                                    <div class="form-group">
                                       <label> Phone </label>
                                       <input type="number" class="form-control" name="user_phone" required="">
                                    </div>
                                 </div>
                                 <div class="col-lg-6">
                                    <div class="form-group">
                                       <label> Password </label>
                                       <input type="password" class="form-control" name="user_password" required="">
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-lg-12">
                                    <div class="form-group">
                                       <label> Address </label>
                                       <input type="text" class="form-control" name="address" required="">
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-lg-6">
                                    <div class="form-group">
                                       <label> Country</label>
                                       <input type="text" class="form-control" name="country" required="">
                                    </div>
                                 </div>
                                 <div class="col-lg-6">
                                    <div class="form-group">
                                       <label> State </label>
                                       <input type="text" class="form-control" name="state" required="">
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-lg-6">
                                    <div class="form-group">
                                       <label> City</label>
                                       <input type="text" class="form-control" name="city" required="">
                                    </div>
                                 </div>
                                 <div class="col-lg-6">
                                    <div class="form-group">
                                       <label> Pin Code </label>
                                       <input type="number" class="form-control" name="pincode" required="">
                                    </div>
                                 </div>
                              </div>

                              <div class="row">
                               <div class="col-lg-12">
                                  <div class="form-group">
                                     <label> Upload Partner Image</label>
                                     <input type="file" name="partner_image">
                                  </div>
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
                  function edituserModal(partner_id,username,user_email,user_phone,user_password,address,country,state,city,pincode,image)
                  {
                     document.getElementById("partner_id").value = partner_id;
                     document.getElementById("username").value = username;
                     document.getElementById("user_email").value = user_email;
                     document.getElementById("user_phone").value = user_phone;
                     document.getElementById("hid_password").value = user_password;
                     document.getElementById("address").value = address;
                     document.getElementById("country").value = country;
                     document.getElementById("state").value = state;
                     document.getElementById("city").value = city;
                     document.getElementById("pincode").value = pincode;

                     if(image){
                        document.getElementById("old_image").value = image;
                        var url = "<?php echo base_url('assets/partner/profile/');?>"+image;
                        document.getElementById('imageDiv').innerHTML = '<img width="60" height="60" src="'+url+'">';
                     }else{
                        document.getElementById("old_image").value = 'user.png';
                     }
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