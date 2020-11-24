<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Celyboom | Vendor Listed Item </title>
    <?php $this->load->view('vendor/include/header.php');?>
  </head>
  <body class="body-bg">
    <?php $this->load->view('vendor/include/top_navigation.php');?>
    <div class="dashboard-wrapper">
      <?php $this->load->view('vendor/include/side_navigation.php');?>
      <div class="dashboard-content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-xl-9 col-lg-8 col-md-8 col-sm-12 col-12">
              <div class="dashboard-page-header">
                <h3 class="dashboard-page-title">My Listing</h3>
              </div>
            </div>
					<div class="col-xl-3 col-lg-4 col-md-4 col-sm-12 col-12 text-right mb20">
					<?php echo anchor('vendor/add-listening', 'add new Listing', 'class="btn btn-default btn-sm"') ?>
					</div>
          </div>
          <div class="dashboard-vendor-list">
            <ul class="list-unstyled">
              <?php if($product_list){foreach($product_list as $product){
              if($product->image_gallery){
                $gallery = explode(",",$product->image_gallery);
              }else{
                $gallery = array();
              }
              ?>
              <li>
                <div class="dashboard-list-block">
                  <div class="row">
                    <div class="col-xl-2 col-lg-4 col-md-12 col-sm-12 col-12">
                        <div class="dashboard-list-img">
                          <a href="<?php echo base_url("vendor/view-listening/").$product->id;?>">
                            <img src="<?php if($gallery){echo base_url("assets/products/").$gallery[0];}else{echo base_url("assets/image/dashboard-list-img-1.jpg");}?>" class="img-fluid">
                          </a>
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-4 col-md-5 col-sm-12 col-12 ">
                        <div class="dashboard-list-content">
                            <h3 class="mb0"><a href="<?php echo base_url("vendor/view-listening/").$product->id;?>" class="title"><?php echo $product->title;?></a></h3>
                            <div class="vendor-meta m-0">
                                <div class="vendor-meta-item vendor-dash vendor-meta-item-bordered">
                                    <span class="vendor-price"> Rs <?php echo $product->price;?> </span>
                                    <span class="vendor-text">Start From</span></div>
                                <div class="vendor-meta-item vendor-dash vendor-meta-item-bordered">
                                    <span class="vendor-guest"> <?php echo $product->completed;?>  </span>
                                    <span class="vendor-text">Events Completed</span>
                                </div>
                                <div class="vendor-meta-item vendor-dash vendor-meta-item-bordered">
                                    <?php echo $product->address.' , '.$product->postcode;?>    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-4 col-sm-12 col-12">
                        <div class="dashboard-list-btn">
                            <?php echo anchor('vendor/edit-listening/'.$product->id, '<i class="fas fa-pencil-alt"></i>', array('title' => 'Click to Edit','class' => 'btn btn-outline-violate btn-xs mr10'))?>
                            <?php echo anchor('vendor/view-listening/'.$product->id, '<i class="fas fa-eye"></i>', array('title' => 'Click to View','class' => 'btn btn-outline-success btn-xs mr10'))?>
                            <?php echo anchor('vendor/product-delete/'.$product->id, '<i class="fas fa-trash-alt"></i>', array('title' => 'Click to Delete','class' => 'btn btn-outline-pink btn-xs'))?>
                        </div>
                    </div>
                  </div>
                </div>
              </li>
              <?php }}else{ ?>
                 <li style="color: red;">Record not found..</li>
               <?php } ?>
            </ul>
            <?php if (isset($product_list) && is_array($product_list)) echo $page_links; ?>
          </div>
        </div>
      </div>
    </div>
    <?php $this->load->view('vendor/include/footer.php');?>
  </body>
</html>