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
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-5">
              <p style="text-align:center;"><?php echo anchor('add-my-product', '  Upload New', 'class="btn btn-green btn-sm fa fa-upload text-uppercase" ') ?></p>
            </div>
            <ul class="nav nav-tabs nav-justified md-tabs indigo int-background" id="myTabJust" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link int-btn active fs" id="sel-tab-just" data-toggle="tab" href="#sel-just" role="tab" aria-controls="sel-just"
                      aria-selected="true">ASSETS SELECTED</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link int-btn fs" id="under-tab-just" data-toggle="tab" href="#under-just" role="tab" aria-controls="under-just"
                      aria-selected="false" style="width: 220px;">ASSETS UNDER REVIEW</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link int-btn fs" id="reject-tab-just" data-toggle="tab" href="#reject-just" role="tab" aria-controls="reject-just"
                      aria-selected="false" style="width: 220px;">ASSETS REJECTED</a>
                  </li>
                </ul>
                <div class="tab-content card pt-3" id="myTabContentJust" style="width: 100%;min-height: 300px;max-height: 100%;">
                    <div class="tab-pane fade show active" id="sel-just" role="tabpanel" aria-labelledby="sel-tab-just">
                        <div class="container-fluid">
                            <div class="row">
                                <?php if($product_select){ foreach($product_select as $product){  ?>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                                    <div class="card">
                                        <img src="<?php echo base_url('uploads/').getSingalImage($product->pro_id);?>" class="img-fluid">
                                    </div>
                                </div>
                                <?php }}else{ ?>
                                <div class="col-md-12 text-center">
            <img src="<?php echo base_url('assets/front/images/no.jpg')?>">
         </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="under-just" role="tabpanel" aria-labelledby="under-tab-just">
                        <div class="container-fluid">
                            <div class="row">
                                <?php if($product_review){ foreach($product_review as $product){ ?>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                                    <div class="card">
                                        <img src="<?php echo base_url('uploads/').getSingalImage($product->pro_id);?>" class="img-fluid">
                                    </div>
                                </div>
                                <?php }}else{ ?>
                                <div class="col-md-12 text-center">
            <img src="<?php echo base_url('assets/front/images/no.jpg')?>">
         </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="reject-just" role="tabpanel" aria-labelledby="reject-tab-just">
                        <div class="container-fluid">
                            <?php if($product_reject){ foreach($product_reject as $product){ ?>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                                    <div class="card">
                                        <img src="<?php echo base_url('uploads/').getSingalImage($product->pro_id);?>" class="img-fluid">
                                    </div>
                                </div>
                                <?php }}else{ ?>
                                <div class="col-md-12 text-center">
            <img src="<?php echo base_url('assets/front/images/no.jpg')?>">
         </div>
                                <?php } ?>
                        </div>
                  </div>
                </div>
          </div>
        </div>
      </div>
      <?php $this->load->view('partner/lib/footer-side.php');?>
    </div>
    <?php $this->load->view('partner/lib/footer.php');?>
  </body>
</html>