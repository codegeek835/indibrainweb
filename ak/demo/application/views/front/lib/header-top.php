<div class="top-header">
        <div class="custom-container">
            <div class="row">
                <div class="col-md-6">
                	<div class="d-flex align-items-center justify-content-center justify-content-md-start">
                        
                            <ul class="contact_detail text-center text-lg-left">
                            <li><i class="ti-email"></i><span>info@ramsonsayurveda.com</span></li>
                            <li><i class="ti-mobile"></i><span>123-456-7890</span></li>
                        </ul>
                        
                    </div>
                </div>
                <div class="col-md-6">
                	<div class="text-center text-md-right">
                       	<ul class="header_list">
                          <li><a href="<?php echo base_url()?>my-account"><i class="fa fa-user"></i><span>My Account</span></a></li>
                          <li><a href="#"><i class="ti-heart"></i><span>Wishlist</span></a></li>
                                <?php if($this->session->userdata('cus_id')){?>
                                <li>
                                    <a href="<?php echo base_url()?>logout"><i class="fa fa-lock"></i> Logout</a>
                                </li>
                                <?php }else{ ?>
                                <li><a href="<?php echo base_url()?>login"><i class="ti-user"></i><span>Login</span></a></li>
                                <?php } ?>
                          
						</ul>
                    </div>
                </div>
            </div>
        </div>
    </div>