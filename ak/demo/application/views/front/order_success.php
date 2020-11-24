<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta content="Anil z" name="author" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <?php $this->load->view('front/lib/header-css.php');?>
</head>
<body>

<!-- START HEADER -->
<header class="header_wrap fixed-top header_with_topbar">
	<?php $this->load->view('front/lib/header-top.php');?>
	<?php $this->load->view('front/lib/header-middle-menu.php');?>
</header>
<!-- END HEADER -->

<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_gray page-title-mini">
    <?php $this->load->view('front/lib/breadcrumb_section.php');?> 
</div>
<!-- END SECTION BREADCRUMB -->

<!-- START MAIN CONTENT -->
<div class="main_content">

<!-- START SECTION SHOP -->
<div class="section">
	<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="text-center order_complete">
                	<i class="fas fa-check-circle"></i>
                    <div class="heading_s1">
                      <h3>Dear <?php echo $this->session->userdata("cus_name");?></h3>
                  	<h3>Your order is completed!</h3>
                    </div>
                  	<p>Thanks for purchase. Recfeive your order successfully. We will contact you ASAP with delivery details. For more details please check your registration mail.</p>
                    <a href="<?php echo base_url();?>" class="btn btn-fill-out">Continue Shopping</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION SHOP -->

<!-- START SECTION SUBSCRIBE NEWSLETTER -->
<div class="section bg_default small_pt small_pb">
</div>
<!-- START SECTION SUBSCRIBE NEWSLETTER -->

</div>
<!-- END MAIN CONTENT -->

<!-- START FOOTER -->
<footer class="footer">
	<?php $this->load->view('front/lib/footer.php');?>
</footer>
<!-- END FOOTER -->
</body>
</html>