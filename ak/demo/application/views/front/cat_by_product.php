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
	<div class="breadcrumb_section bg_gray page-title-mini"><?php $this->load->view('front/lib/breadcrumb_section.php');?></div>
	<!-- END SECTION BREADCRUMB -->

<!-- START MAIN CONTENT -->
<div class="main_content">
	<!-- START SECTION SHOP -->
	<div class="section">
		<div class="container">
	    <div class="row">
				<div class="col-lg-9">
	      	<div class="row align-items-center mb-4 pb-1">
	              <div class="col-12">
	                  <div class="product_header">
	                      <div class="product_header_left">
	                          <div class="custom_select">
	                              <select class="form-control form-control-sm">
	                                  <option value="order">Default sorting</option>
	                                  <option value="popularity">Sort by popularity</option>
	                                  <option value="date">Sort by newness</option>
	                                  <option value="price">Sort by price: low to high</option>
	                                  <option value="price-desc">Sort by price: high to low</option>
	                              </select>
	                          </div>
	                      </div>
	                      <div class="product_header_right">
	                      	<div class="products_view">
	                              <a href="javascript:Void(0);" class="shorting_icon grid active"><i class="ti-view-grid"></i></a>
	                              <a href="javascript:Void(0);" class="shorting_icon list"><i class="ti-layout-list-thumb"></i></a>
	                          </div>
	                          <div class="custom_select">
	                              <select class="form-control form-control-sm">
	                                  <option value="">Showing</option>
	                                  <option value="9">9</option>
	                                  <option value="12">12</option>
	                                  <option value="18">18</option>
	                              </select>
	                          </div>
	                      </div>
	                  </div>
	              </div>
	        </div> 
	        <form id="form_id" action="<?php echo base_url()?>add-to-cart"  method="post">
	      		<input type="hidden" value="1" name="qty"/>
						<input type="hidden" id="pro_id" name="pro_id"/>
	          <div class="row shop_container">
	          	<?php if($products){foreach ($products as $product) { ?>
	              <div class="col-md-4 col-6">
	                  <div class="product">
	                      <div class="product_img">
	                          <a href="<?php echo base_url().'product-details/'.$product->pro_id;?>">
	                              <img src="<?php echo base_url().$product->pro_image;?>" width="268px" height="249px" alt="product_img1">
	                          </a>
	                          <div class="product_action_box">
	                              <ul class="list_none pr_action_btn">
	                                  <li class="add-to-cart"><a title="Add To Cart" onclick="formSubmit('<?php echo $product->pro_id?>')"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
	                                  <li><a title="Add to compare"><i class="icon-shuffle"></i></a></li>
	                                  <li><a title="Add to wishlist"><i class="icon-heart"></i></a></li>
	                                  <li><a href="<?php echo base_url().'product-details/'.$product->pro_id;?>" title="Details"><i class="icon-info"></i></a></li>
	                              </ul>
	                          </div>
	                      </div>
	                      <div class="product_info">
	                          <h6 class="product_title"><a href="<?php echo base_url().'product-details/'.$product->pro_id;?>"><?php echo $product->pro_title?></a></h6>
	                          <div class="product_price">
	                              <span class="price"><i class="fa fa-rupee"></i><?php echo number_format($product->pro_price,2);?></span>
	                              <del><i class="fa fa-rupee"></i>55.25</del>
	                              <div class="on_sale">
	                                  <span>35% Off</span>
	                              </div>
	                          </div>
	                          <div class="rating_wrap">
	                              <div class="rating">
	                                  <div class="product_rate" style="width:80%"></div>
	                              </div>
	                              <span class="rating_num">(21)</span>
	                          </div>
	                         
	                          <div class="pr_switch_wrap">
	                              <div class="product_color_switch">
	                                  <span class="active" data-color="#87554B"></span>
	                                  <span data-color="#333333"></span>
	                                  <span data-color="#DA323F"></span>
	                              </div>
	                          </div>
	                          <div class="list_product_action_box">
	                              <ul class="list_none pr_action_btn">
	                                  <li class="add-to-cart"><a title="Add To Cart" onclick="formSubmit('<?php echo $product->pro_id?>')"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
	                                  <li><a title="Add to compare"><i class="icon-shuffle"></i></a></li>
	                                  <li><a title="Add to wishlist"><i class="icon-heart"></i></a></li>
	                                  <li><a href="<?php echo base_url().'product-details/'.$product->pro_id;?>" title="Details"><i class="icon-info"></i></a></li>
	                              </ul>
	                          </div>
	                      </div>
	                  </div>
	              </div>
	            <?php }}?>
	          </div>
	      	</form>
	    		<div class="row">
            <div class="col-12">
							<?php if($product!=NUll){?>
							<?php echo $this->pagination->create_links();?>
							<?php }else{?>
							<p>There are no product available......please check other category or brand</p>
							<?php }?>
							
            </div>
	        </div>
	        <script type="text/javascript">
					 	function formSubmit($id)
					 	{
					 		document.getElementById("pro_id").value = $id;
					 		document.getElementById("form_id").submit();
					 	}
					</script>
	  		</div>
	      <div class="col-lg-3 order-lg-first mt-4 pt-2 mt-lg-0 pt-lg-0">
	      	<div class="sidebar">
	          	<div class="widget">
	                  <h5 class="widget_title">Categories</h5>
	                  <ul class="widget_categories">
	                      <li><a href="#"><span class="categories_name">Women</span><span class="categories_num">(9)</span></a></li>
	                      <li><a href="#"><span class="categories_name">Top</span><span class="categories_num">(6)</span></a></li>
	                      <li><a href="#"><span class="categories_name">T-Shirts</span><span class="categories_num">(4)</span></a></li>
	                      <li><a href="#"><span class="categories_name">Men</span><span class="categories_num">(7)</span></a></li>
	                      <li><a href="#"><span class="categories_name">Shoes</span><span class="categories_num">(12)</span></a></li>
	                  </ul>
	              </div>
	              <div class="widget">
	              	<h5 class="widget_title">Filter</h5>
	                  <div class="filter_price">
	                       <div id="price_filter" data-min="0" data-max="500" data-min-value="50" data-max-value="300" data-price-sign="$"></div>
	                       <div class="price_range">
	                           <span>Price: <span id="flt_price"></span></span>
	                           <input type="hidden" id="price_first">
	                           <input type="hidden" id="price_second">
	                       </div>
	                   </div>
	              </div>
	              <div class="widget">
	              	<h5 class="widget_title">Brand</h5>	
	                  <ul class="list_brand">
	                      <li>
	                          <div class="custome-checkbox">
	                              <input class="form-check-input" type="checkbox" name="checkbox" id="Arrivals" value="">
	                              <label class="form-check-label" for="Arrivals"><span>New Arrivals</span></label>
	                          </div>
	                      </li>
	                      <li>
	                          <div class="custome-checkbox">
	                              <input class="form-check-input" type="checkbox" name="checkbox" id="Lighting" value="">
	                              <label class="form-check-label" for="Lighting"><span>Lighting</span></label>
	                          </div>
	                      </li>
	                      <li>
	                          <div class="custome-checkbox">
	                              <input class="form-check-input" type="checkbox" name="checkbox" id="Tables" value="">
	                              <label class="form-check-label" for="Tables"><span>Tables</span></label>
	                          </div>
	                      </li>
	                      <li>
	                          <div class="custome-checkbox">
	                              <input class="form-check-input" type="checkbox" name="checkbox" id="Chairs" value="">
	                              <label class="form-check-label" for="Chairs"><span>Chairs</span></label>
	                          </div>
	                      </li>
	                      <li>
	                          <div class="custome-checkbox">
	                              <input class="form-check-input" type="checkbox" name="checkbox" id="Accessories" value="">
	                              <label class="form-check-label" for="Accessories"><span>Accessories</span></label>
	                          </div>
	                      </li>
	                  </ul>
	              </div>
	              <div class="widget">
	              	<h5 class="widget_title">Size</h5>
	                  <div class="product_size_switch">
	                      <span>xs</span>
	                      <span>s</span>
	                      <span>m</span>
	                      <span>l</span>
	                      <span>xl</span>
	                      <span>2xl</span>
	                      <span>3xl</span>
	                  </div>
	              </div>
	              <div class="widget">
	              	<h5 class="widget_title">Color</h5>
	                  <div class="product_color_switch">
	                      <span data-color="#87554B"></span>
	                      <span data-color="#333333"></span>
	                      <span data-color="#DA323F"></span>
	                      <span data-color="#2F366C"></span>
	                      <span data-color="#B5B6BB"></span>
	                      <span data-color="#B9C2DF"></span>
	                      <span data-color="#5FB7D4"></span>
	                      <span data-color="#2F366C"></span>
	                  </div>
	              </div>
	              <div class="widget">
	                  <div class="shop_banner">
	                      <div class="banner_img overlay_bg_20">
	                          <img src="<?php echo base_url();?>assets/images/sidebar_banner_img.jpg" alt="sidebar_banner_img">
	                      </div> 
	                      <div class="shop_bn_content2 text_white">
	                          <h5 class="text-uppercase shop_subtitle">New Collection</h5>
	                          <h3 class="text-uppercase shop_title">Sale 30% Off</h3>
	                          <a href="#" class="btn btn-white rounded-0 btn-sm text-uppercase">Shop Now</a>
	                      </div>
	                  </div>
	              </div>
	          </div>
	      </div>
	    </div>
	  </div>
	</div>
	<!-- END SECTION SHOP -->

	<!-- START SECTION SUBSCRIBE NEWSLETTER -->
	<div class="section bg_default small_pt small_pb"><?php $this->load->view('front/lib/newsletter.php');?></div>
	<!-- START SECTION SUBSCRIBE NEWSLETTER -->
</div>
<!-- END MAIN CONTENT -->

<!-- START FOOTER -->
<footer class="footer"><?php $this->load->view('front/lib/footer.php');?></footer>
<!-- END FOOTER -->
</body>
</html>
