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
                <form action="<?php echo base_url()?>Checkout/saveOrder" method="post">
                    <input type="hidden" name="cus_id" value="<?php echo $cus_info->cus_id?>">
                    <div class="container">
                      <div class="row">                    
                        <div class="col-md-6">
                            <?php if(validation_errors()){ ?>
                        <div class="alert alert-danger" role="alert">
                          <?php echo validation_errors();?>
                        </div>
                        <?php }?>
                            <div class="heading_s1">
                                <h4>Billing Details</h4>
                            </div>
                           
                            <div class="form-group">
                                <input type="text"  class="form-control" name="cus_name" placeholder="Full name *" value="<?php echo $cus_info->cus_name?>"/>
                            </div>
                            <div class="form-group">
                                <input class="form-control"  type="text" name="cus_email" placeholder="Email address *" value="<?php echo $cus_info->cus_email;?>" readonly=""/>
                            </div>
                            <div class="form-group">
                                <input class="form-control"  type="text" name="cus_phone" placeholder="Phone *" value="<?php if($cus_info->cus_mobile){echo $cus_info->cus_mobile;}else{echo set_value('cus_phone');}?>"/>
                            </div>

                            <div class="form-group">
                                <input class="form-control"  type="text" name="cus_companys" placeholder="Company Name" value="<?php if($cus_info->cus_company){echo $cus_info->cus_company;}else{echo set_value('cus_companys');}?>"/>
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" name="cus_address" placeholder="Address *" value="<?php if($cus_info->cus_address){echo $cus_info->cus_address;}else{echo set_value('cus_address');}?>"/>
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" name="cus_state" placeholder="State *" value="<?php if($cus_info->cus_state){echo $cus_info->cus_state;}else{echo set_value('cus_state');}?>"/>
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" name="cus_city" placeholder="City / Town *" value="<?php if($cus_info->cus_city){echo $cus_info->cus_city;}else{echo set_value('cus_city');}?>"/>
                            </div>

                            <div class="form-group">
                                <input class="form-control" type="text" name="cus_zip" placeholder="Postcode / ZIP *" value="<?php if($cus_info->cus_zip){echo $cus_info->cus_zip;}else{echo set_value('cus_zipcode');}?>"/>
                            </div>

                            <div class="ship_detail">
                                <div class="form-group">
                                    <div class="chek-form">
                                        <div class="custome-checkbox">
                                            <input class="form-check-input" type="checkbox" name="checkbox" id="differentaddress" value="1" />
                                            <label class="form-check-label label_info" for="differentaddress"><span>Ship to a different address?</span></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="different_address">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="ship_name" placeholder="Full name *" value="<?php echo set_value('ship_name'); ?>"/>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="ship_email" placeholder="Email address *" value="<?php echo set_value('ship_email'); ?>"/>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="ship_phone" placeholder="Phone *" value="<?php echo set_value('ship_phone'); ?>"/>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control" name="ship_address" placeholder="Address *" value="<?php echo set_value('ship_address'); ?>"/>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="ship_state" placeholder="State *" value="<?php echo set_value('ship_state'); ?>"/>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="ship_city" placeholder="City / Town *" value="<?php echo set_value('ship_city'); ?>"/>
                                    </div>

                                    <div class="form-group">
                                        <input class="form-control" type="text" name="ship_zip" placeholder="Postcode / ZIP *" value="<?php echo set_value('ship_zip'); ?>"/>
                                    </div>
                                </div>
                            </div>
                            <div class="heading_s1">
                                <h4>Additional information</h4>
                            </div>
                            <div class="form-group mb-0">
                                <textarea rows="5" class="form-control" name="payment_message" placeholder="Order notes"><?php echo set_value('payment_message'); ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="order_review">
                                <div class="heading_s1">
                                    <h4>Your Orders</h4>
                                </div>
                                <div class="table-responsive order_table">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $cart_content = $this->cart->contents();
                                                foreach ($cart_content as $items){ 
                                            ?>
                                            <tr>
                                                <td><?php echo $items['name']?> <span class="product-qty">x <?php echo $items['qty']?></span></td>
                                                <td><i class="fa fa-rupee"></i><?php echo number_format($items['price'],2);?></td>
                                            </tr>
                                            <?php }?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>SubTotal</th>
                                                <?php $cart_total = $this->cart->total(); ?>
                                                <td class="product-subtotal"><i class="fa fa-rupee"></i><?php echo number_format($cart_total,2);?></td>
                                            </tr>
                                            <tr>
                                                <th>Shipping</th>
                                                <td>Free Shipping</td>
                                            </tr>
                                            <tr>
                                                <th>Total</th>
                                                <td class="product-subtotal"><i class="fa fa-rupee"></i><?php echo number_format($cart_total,2);?></td>
                                            </tr>
                                            <input type="hidden" name="order_total" value="<?php echo number_format($cart_total,2);?>">
                                        </tfoot>
                                    </table>
                                </div>
                                <div class="payment_method">
                                    <div class="heading_s1">
                                        <h4>Payment</h4>
                                    </div>
                                    <div class="payment_option">
                                        <div class="custome-radio">
                                            <input class="form-check-input" type="radio" name="payment_gateway" id="exampleRadios2" value="cash_on_delivery" checked/>
                                            <label class="form-check-label" for="exampleRadios2">Cash on delivery</label>
                                            <p data-method="option2" class="payment-text">Please send your cheque to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                                        </div>
                                        <div class="custome-radio">
                                            <input class="form-check-input" type="radio" name="payment_gateway" id="exampleRadios3" value="paypal" />
                                            <label class="form-check-label" for="exampleRadios3">Paypal</label>
                                            <p data-method="option3" class="payment-text">Pay via PayPal; you can pay with your credit card if you don't have a PayPal account.</p>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-fill-out btn-block" name="register">Place Order</button>
                            </div>
                        </div> 
                      </div>
                    </div>
                  </form>
            </div>
            <!-- END SECTION SHOP -->

            <!-- START SECTION SUBSCRIBE NEWSLETTER -->
            <div class="section bg_default small_pt small_pb">
                
            </div>
            <!-- START SECTION SUBSCRIBE NEWSLETTER -->
        </div>
        <!-- END MAIN CONTENT -->

        <!-- START FOOTER -->
        <footer class="footer"><?php $this->load->view('front/lib/footer.php');?></footer>
        <!-- END FOOTER -->
    </body>
</html>
