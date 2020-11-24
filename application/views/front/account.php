<?php $this->load->view('front/lib/header.php');?>
<section style="padding-bottom: 0px;padding-top: 0px;margin-top: 50px;">
   <!-- about-us-1 start -->
   <div style="background: url(<?php echo base_url('assets/front/images/bg.jpg')?>) no-repeat fixed center; background-size: cover; width:100%;height: 300px;">
   <div class="container">
      <div class="row">
         <div class="col-md-8 col-sm-12 centerize-col m-t-110 mt-15">
            <div class="text-center white-color">
               <h1 class="font-400 play-font font-italic font-style">Account Details</h1>
            </div>
         </div>
      </div>
   </div>
   <!-- about-us end-->
</section>
<!--== Hero Slider End ==-->      
<!--== What We Offer Start ==-->
<section style="background-color: #f1f2f2;">
   <div class="cont-m">
      <div class="row">
         <div class="col-sm-3 p-a-0 m-b-20">
            <nav class="nav-sidebar border bg-col-t dt">
               <ul class="nav tabs">
                  <li class="active side-left"><a href="#tab1" data-toggle="tab"><i class="fa fa-user-circle-o dis-block"></i> &nbsp&nbsp Profile</a>
                  </li>
                  <li class="side-left"><a href="#tab2" data-toggle="tab"><i class="fa fa-shopping-cart dis-block"></i> Your Order</a></li>
                  <li class="side-left"><a href="#tab3" data-toggle="tab"><i class="fa fa-shopping-cart dis-block"></i> Payment List</a></li>
                  <li class="side-left"><a href="#tab4" data-toggle="tab"><i class="fa fa-eye dis-block"></i>&nbsp&nbsp Change Password </a></li>
                  <li class="side-left"><a href="<?php echo base_url('logout')?>" class="text-danger"><i class="fa fa-sign-out dis-block"></i> &nbsp&nbsp Logout</a></li>
               </ul>
            </nav>
         </div>
         <!-- tab content -->
         <div class="col-sm-9 tab-content border hig bg-col-t mt">
            <div class="tab-pane active text-style" id="tab1">
               <div class="row">
                  <div class="col-sm-12">
                      <?php if($this->session->flashdata('flash_msg')){ ?>
                        <div class="alert alert-success" role="alert">
                        <?php echo $this->session->flashdata('flash_msg'); ?>
                        </div>
                        <?php }?>
                        
                        
                        
                     <div class="tab-content">
                        <div class="tab-pane active">
                            <div class="myaccount-content">
                            <h3>Dashboard</h3>
                        </div>
                           <form class="form" action="<?php echo base_url()?>profile-setting" method="post" enctype="multipart/form-data">
                              <input type="hidden" value="<?php echo $user->user_id;?>" name="user_id">
                              <div class="col-md-6 m-l-0">
                              <div class="form-group">
                                 <div class="col-md-12">
                                    <label for="first_name">
                                       <h4>Full Name</h4>
                                    </label>
                                    <input type="text" class="form-control" placeholder="first name" name="username" value="<?php echo $user->username;?>">
                                 </div>
                                 <div class="col-md-12">
                                    <label for="email">
                                       <h4>Email</h4>
                                    </label>
                                    <input type="email" class="form-control" name="user_email" value="<?php echo $user->user_email;?>" readonly>
                                 </div>
                              </div>
                              </div>
                              <div class="col-md-6">
                              <div class="form-group">
                                 <div class="col-md-12">
                                    <div class="text-center">
                                        <?php 
                                        if($user->image){
                                            $img = $user->image;
                                        }else{
                                            $img = 'user.png';
                                        }
                                        ?>
                                        
                                       <img src="<?php echo base_url().'assets/front/profile/'.$img;?>" class="avatar img-circle img-thumbnail" alt="avatar" style="width: 100px; height: 100px;">
                                       <h6>Upload a different photo...</h6>
                                       <input type="file" name="profile_image" class="text-center center-block file-upload">
                                       <input type="hidden" name="old_image" value="<?php echo $img;?>">
                                    </div>
                                 </div>
                              </div>
                              </div>
                              <div class="col-md-12 m-l-0">
                              <div class="form-group">
                                 <div class="col-md-12">
                                    <label for="mobile">
                                       <h4>Mobile</h4>
                                    </label>
                                    <input type="number" class="form-control" placeholder="enter mobile number" name="user_phone" value="<?php echo $user->user_phone;?>">
                                 </div>
                              </div>
                              </div>
                              <div class="col-md-12 m-l-0">
                              <div class="form-group">
                                 <div class="col-md-12">
                                    <label>
                                       <h4>Address</h4>
                                    </label>
                                    <input type="text" class="form-control" placeholder="Address" name="address" value="<?php echo $user->address;?>">
                                 </div>
                              </div>
                              </div>
                              <div class="col-md-12 m-l-0">
                              <div class="form-group">
                                 <div class="col-md-6">
                                    <label>
                                       <h4>City</h4>
                                    </label>
                                    <input type="text" class="form-control" placeholder="City" name="city" value="<?php echo $user->city;?>">
                                 </div>
                              
                                 <div class="col-md-6">
                                    <label>
                                       <h4>State</h4>
                                    </label>
                                    <input type="text" class="form-control" placeholder="State" name="state" value="<?php echo $user->state;?>">
                                 </div>
                              </div>
                              </div>
                              <div class="col-md-12 m-l-0">
                              <div class="form-group">
                                 <div class="col-md-6">
                                    <label>
                                       <h4>Country</h4>
                                    </label>
                                    <input type="text" class="form-control" placeholder="Country" name="country" value="<?php echo $user->country;?>">
                                 </div>
                              
                                 <div class="col-md-6">
                                    <label>
                                       <h4>Pin Code</h4>
                                    </label>
                                    <input type="text" class="form-control" placeholder="Pin Code" name="pincode" value="<?php echo $user->pincode;?>">
                                 </div>
                              </div>
                              </div>
                              <div class="col-md-12 m-l-0">
                              <div class="form-group  text-center">
                                 <div class="col-xs-12 pb-f">
                                    <br>
                                    <button class="btn theme-btn--dark1 btn--md" type="submit"><i class="fa fa-floppy-o"></i> Save Changes</button>
                                    <br>
                                 </div>
                              </div>
                            </div>
                           </form>
                        </div>
                     </div>
                     <!--/tab-pane-->
                  </div>
                  <!--/tab-content-->
               </div>
            </div>
            <div class="tab-pane" id="tab2">
                <div class="myaccount-content">
                            <h3> Your Order</h3>

                            <div class="myaccount-table table-responsive text-center">
                                <table class="table table-bordered table-hover">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Order No</th>
                                            <th>Customer Name</th>
                                            <th>Phone</th>
                                            <th>Total</th>
                                            <th>Order Status</th>
                                            <th>Payment Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                         <?php if($orders){ $i= 1;foreach($orders as $value){
                         
                         ?>
                        <tr class="table-d">
                           <td>#<?php echo $value->order_id;?></td>
                                    <td><?php echo $value->username;?></td>
                                    <td><?php echo $value->user_phone;?></td>
                                    <td>$<?php echo number_format($value->order_total,2);?></td>
                                    <td><?php echo $value->order_status;?></td>
                                    <td><?php echo $value->payment_status;?></td>
                                    <td>
                                        <a class="btn-details" href="<?php echo base_url()?>order-details/<?php echo getEncrypt($value->order_id)?>"><i class="fa fa-eye"></i></a>
                                        <a class="btn-download" href=""><i class="fa fa-download"></i></a>
                                    <!--    <a class="btn-delete" onclick="alert('Are Your Sure to Delete')" href="<?php echo base_url()?>delete-order/<?php echo getEncrypt($value->order_id);?>"><i class="fa fa-trash-o"></i></a>-->
                                    
                                    </td>
                        </tr>
                        <?php }}else{?>
                        <tr class="table-d">
                           <td colspan="5" style="color:red; text-align:center"> Sorry no orders.</td>
                        </tr>
                        <?php }?>
                     </tbody>
                                </table>
                            </div>
                        </div>
            </div>
            <div class="tab-pane" id="tab3">
                <div class="myaccount-content">
                            <h3> Your Order</h3>

                            <div class="myaccount-table table-responsive text-center">
                                <table class="table table-bordered table-hover">
                                    <thead class="thead-light">
                                        <tr class="table-h">
                            <th>Transaction Id</th>
                            <th>Customer Name</th>
                            <th>Phone</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Date</th>
                        </tr>
                                    </thead>
<tbody>
                        <?php if($payments){ foreach($payments as $payment){ ?>
                        <tr class="table-d">
                            <td>#<?php echo $payment->transaction_id;?></td>
                            <td><?php echo $payment->username;?></td>
                            <td><?php echo $payment->user_phone;?></td>
                            <td>$<?php echo number_format($payment->order_total,2);?></td>
                            <td><?php echo $payment->payment_status;?></td>
                            <td><?php $date=  $payment->order_date; echo date('m-d-y',strtotime($date)); ?></td> 
                        </tr>
                        <?php }}else{?>
                        <tr class="table-d">
                           <td colspan="5" style="color:red; text-align:center"> Sorry no payment.</td>
                        </tr>
                        <?php }?>
                    </tbody>
                                    
                                </table>
                            </div>
                        </div>
                        
               
            </div>
            <div class="tab-pane text-style" id="tab4">
                <div class="myaccount-content">
                            <h3>   Change Password </h3>
                
                <?php echo form_open('change-password'); ?>
                    <input type="hidden" value="<?php echo $user->user_id;?>" name="user_id">
                    <div class="form-group">
                        <div class="col-md-12 m-l-0">
                             <label>Current Password</label>
                             <div class="form-group pass_show"> 
                                <input type="password" class="form-control" name="current_password" placeholder="Current Password" required> 
                             </div>
                        </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-6 m-l-0">
                         <label>New Password</label>
                         <div class="form-group pass_show"> 
                            <input type="password" class="form-control" name="new_password" placeholder="New Password" required> 
                         </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-6">
                         <label>Confirm Password</label>
                         <div class="form-group pass_show"> 
                            <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" required> 
                         </div>
                      </div>
                    </div>
                    
                    <div class="form-group text-center">
                      <div class="col-xs-12 pb-f">
                          <br>
                         <button class="btn theme-btn--dark1 btn--md" type="submit"><i class="fa fa-floppy-o"></i> Save Changes</button>
                      </div>
                    </div>
                </form>
            </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!--== Footer Start ==-->
<footer class="footer">
   <?php $this->load->view('front/lib/footer.php');?>
</footer>
<!--== Footer End ==-->
</div>
<!--== Wrapper End ==-->
<?php $this->load->view('front/lib/footer-js.php');?>
</body>
</html>
<!--== What We Offer End ==-->
<script type="text/javascript">
   $(document).ready(function() {
   
     
     var readURL = function(input) {
         if (input.files && input.files[0]) {
             var reader = new FileReader();
   
             reader.onload = function (e) {
                 $('.avatar').attr('src', e.target.result);
             }
     
             reader.readAsDataURL(input.files[0]);
         }
     }
     
   
     $(".file-upload").on('change', function(){
         readURL(this);
     });
   });
   
   $(document).ready(function(){
   $('.pass_show').append('<span class="ptxt">Show</span>');  
   });   
   
   $(document).on('click','.pass_show .ptxt', function(){ 
   
   $(this).text($(this).text() == "Show" ? "Hide" : "Show"); 
   
   $(this).prev().attr('type', function(index, attr){return attr == 'password' ? 'text' : 'password'; }); 
   
   });  
</script>