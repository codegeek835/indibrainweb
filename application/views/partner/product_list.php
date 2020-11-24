<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <?php $this->load->view('partner/lib/header.php');?>
   </head>
  <body class="body-bg">
    <?php $this->load->view('partner/lib/top_navigation.php');?>
    <div class="dashboard-wrapper">
      <?php $this->load->view('partner/lib/side_navigation.php');?>
      <div class="dashboard-content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-xl-9 col-lg-8 col-md-8 col-sm-12 col-12">
              <div class="dashboard-page-header">
                <h3 class="dashboard-page-title">My Photo</h3>
              </div>
            </div>
               <div class="col-xl-3 col-lg-4 col-md-4 col-sm-12 col-12 text-right mb20">
               <?php echo anchor('add-my-product', 'add new Product', 'class="btn btn-default btn-sm"') ?>
               </div>
          </div>
          <div class="dashboard-vendor-list">
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

            <ul class="list-unstyled">
              <?php if($product_list){
               foreach($product_list as $product){
              ?>
              <li>
                <div class="dashboard-list-block">
                  <div class="row">
                    <div class="col-xl-2 col-lg-4 col-md-12 col-sm-12 col-12">
                        <div class="dashboard-list-img">
                          <a >
                            <img src="<?php echo base_url('uploads/').getSingalImage($product->pro_id);?>" class="img-fluid">
                          </a>
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-4 col-md-5 col-sm-12 col-12 ">
                        <div class="dashboard-list-content">
                            <h3 class="mb0"><a class="title"><?php echo $product->pro_title;?></a></h3>
                            <div class="vendor-meta m-0">
                                <div class="vendor-meta-item vendor-dash vendor-meta-item-bordered">
                                    <span class="vendor-price"> Rs <?php echo $product->pro_price;?> </span>
                                    <span class="vendor-text">Price</span></div>
                                <div class="vendor-meta-item vendor-dash vendor-meta-item-bordered">
                                    <span class="vendor-guest"><?php echo getcatIdName($product->pro_cat);?> </span>
                                    <span class="vendor-text">Category</span>
                                </div>
                                <div class="vendor-meta-item vendor-dash vendor-meta-item-bordered">
                                    <span class="vendor-guest"> 
                                       <?php if($product->pro_availability==1){
                                       echo "In Stock";
                                       
                                       }elseif($product->pro_availability==2){
                                       
                                        echo "Out Of Stock";
                                       
                                       }else{
                                       
                                       echo "Up Coming";
                                    }
                                       ?></span>
                                    <span class="vendor-text">Status</span>
                                </div>

                                 <div class="vendor-meta-item vendor-dash vendor-meta-item-bordered">
                                    <span class="vendor-guest"> 
                                        <?php if($product->pro_status==1){
                                       echo "Enable";
                                       
                                       }else{
                                       
                                        echo "Disable";
                                       
                                       }?>
                                          
                                       </span>
                                    <span class="vendor-text">Availability</span>
                                </div>                                
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-4 col-sm-12 col-12">
                        <div class="dashboard-list-btn">
                            <?php echo anchor('edit-my-product/'.$product->pro_id, '<i class="fas fa-pencil-alt"></i>', array('title' => 'Click to Edit','class' => 'btn btn-outline-violate btn-xs mr10'))?>
                  
                            <?php echo anchor('delete-my-product/'.$product->pro_id, '<i class="fas fa-trash-alt"></i>', array('title' => 'Click to Delete','class' => 'btn btn-outline-pink btn-xs'))?>
                        </div>
                    </div>
                  </div>
                </div>
              </li>
              <?php }}else{ ?>
                 <li style="color: red;">Record not found..</li>
               <?php } ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <?php $this->load->view('partner/lib/footer.php');?>
  </body>
</html>