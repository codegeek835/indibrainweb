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
	    <div class="row">
	      <div class="col-12">
	        <div class="table-responsive shop_cart_table">
	        	<table class="table">
	          	<thead>
	            	<tr>
									<th class="product-thumbnail">&nbsp;</th>
									<th class="product-name">Product</th>
									<th class="product-price">Price</th>
									<th class="product-quantity">Quantity</th>
									<th class="product-subtotal">Total</th>
									<th class="product-remove">Remove</th>
	              </tr>
	            </thead>
	            <tbody>

	            	<?php 

	            		$cart_content = $this->cart->contents();
									foreach ($cart_content as $items){ 
								?>
	            	<tr>
	              	<td class="product-thumbnail">
	              		<img  width="100" src="<?php echo $items['options']['pro_image']?>" alt="product">
	              	</td>
	                <td class="product-name" data-title="Product">
	                	<a href="#"><?php echo $items['name']?></a>
	                </td>
	                <td class="product-price" data-title="Price"><i class="fa fa-rupee"></i><?php echo number_format($items['price'],2);?></td>
	                <td class="product-quantity" data-title="Quantity">
	                	<form action="<?php echo base_url()?>update-cart-qty" method="post">
	                	<div class="quantity">
	                  	<input type="button" value="-" class="minus">
	                  	<input type="text" name="qty" value="<?php echo $items['qty']?>" title="Qty" class="qty" size="4">
	                  	<input type="button" value="+" class="plus">
	              		</div>
	              	</td>
	              	<input  type="hidden" name="rowid" value="<?php echo $items['rowid']?>">
	              	<td class="product-subtotal" data-title="Total"><i class="fa fa-rupee"></i><?php echo number_format($items['subtotal'],2);?></td>
	                <td class="product-remove" data-title="Remove">
	                	<a href="<?php echo base_url()?>delete-to-cart/<?php echo $items['rowid']?>"><i class="ti-close"></i></a>
	                </td>
	              </tr>
	            <?php }?>
	            </tbody>
	            <tfoot>
	            	<tr>
	              	<td colspan="6" class="px-0">
	                	<div class="row no-gutters align-items-center">
	                  	<div class="col-lg-4 col-md-6 mb-3 mb-md-0">
	                      <div class="coupon field_form input-group">
	                        <input type="text" value="" class="form-control form-control-sm" placeholder="Enter Coupon Code..">
	                        <div class="input-group-append">
	                        	<button class="btn btn-fill-out btn-sm" type="submit">Apply Coupon</button>
	                        </div>
	                      </div>
	                  	</div>
	                    <div class="col-lg-8 col-md-6 text-left text-md-right">
	                      <button class="btn btn-line-fill btn-sm" type="submit">Update Cart</button>
	                    </div>
	                  </div>
	                </td>
	              </tr>
	            </tfoot>
	            <form>
	          </table>
	        </div>
	      </div>
	    </div>
	    <div class="row">
	      <div class="col-12">
	      	<div class="medium_divider"></div>
	      	<div class="divider center_icon"><i class="ti-shopping-cart-full"></i></div>
	      	<div class="medium_divider"></div>
	      </div>
	    </div>
	    <div class="row">
	    	<div class="col-md-6">
	      	<div class="heading_s1 mb-3">
	      		<h6>Calculate Shipping</h6>
	        </div>
          <div class="form-row">
            <div class="form-group col-lg-6">
              <input placeholder="State / City" class="form-control" name="state" type="text">
            </div>
            <div class="form-group col-lg-6">
              <input placeholder="PostCode / ZIP" class="form-control" name="post_code" type="text">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-lg-12">
              <button class="btn btn-fill-line" type="submit">Update Totals</button>
            </div>
          </div>
	      </div>
	      <div class="col-md-6">
	      	<div class="border p-3 p-md-4">
            <div class="heading_s1 mb-3">
              <h6>Cart Totals</h6>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <tbody>
												<?php 
                    $cart_total = $this->cart->total();

                    ?>
                        <tr>
                            <td class="cart_total_label">Cart Subtotal</td>
                            <td class="cart_total_amount"><i class="fa fa-rupee"></i><?php echo number_format($cart_total,2);?></td>
                        </tr>
                        <tr>
                            <td class="cart_total_label">Shipping</td>
                            <td class="cart_total_amount">Free Shipping</td>
                        </tr>
                        <tr>
                            <td class="cart_total_label">Total</td>
                            <td class="cart_total_amount"><strong><i class="fa fa-rupee"></i><?php echo number_format($cart_total,2);?></strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
						
						<a class="btn btn-fill-out" href="<?php echo base_url()?>checkout">Check Out</a>
						
          </div>
	      </div>
	    </div>
	  </div>
	</div>
	<!-- END SECTION SHOP -->

	<!-- START SECTION SUBSCRIBE NEWSLETTER -->
	<div class="section bg_default small_pt small_pb">
		<?php $this->load->view('front/lib/newsletter.php');?>
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