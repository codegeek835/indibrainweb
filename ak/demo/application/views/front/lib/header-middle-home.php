<div class="middle-header dark_skin">
        <div class="custom-container">
            <div class="nav_block">
                <a class="navbar-brand" href="<?php echo base_url();?>">
                    <img  calss="logo" src="<?php echo base_url()?>assets/images/logo.png" width="50%" alt="logo" />
                </a>
                <div class="product_search_form rounded_input">
                    <form>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="custom_select">
                                    <select class="first_null">
                                        <option value="">All Category</option>
                                        <option value="Dresses">Dresses</option>
                                        <option value="Shirt-Tops">Shirt & Tops</option>
                                        <option value="T-Shirt">T-Shirt</option>
                                        <option value="Pents">Pents</option>
                                        <option value="Jeans">Jeans</option>
                                    </select>
                                </div>
                            </div>
                            <input class="form-control" placeholder="Search Product..." required=""  type="text">
                            <button type="submit" class="search_btn2"><i class="fa fa-search"></i></button>
                        </div>
                    </form>
                </div>
                <ul class="navbar-nav attr-nav align-items-center">
                    <?php 
                    $cart_total = $this->cart->total();
                        $cart_items =  $this->cart->total_items();
                        if($cart_items>0){
                            $cart_items = $cart_items;
                        }else{
                            $cart_items = '0';
                        }
                    ?>
                    <li class="dropdown cart_dropdown">
                        <a class="nav-link cart_trigger" href="#" data-toggle="dropdown">
                            <i class="linearicons-bag2"></i>
                            <span class="cart_count"><?php echo $cart_items;?></span>
                            <span class="amount">
                                <span class="currency_symbol">
                                    <i class="fa fa-rupee"></i>
                                </span>
                                <?php echo number_format($cart_total,2);?>
                            </span>
                        </a>
                        <div class="cart_box cart_right dropdown-menu dropdown-menu-right">
                            <ul class="cart_list">
                            <?php 
                                $cart_data = $this->cart->contents();
                                foreach ($cart_data as $cart){ 
                            ?>
                            <li>
                                <a href="<?php echo base_url()?>delete-to-cart/<?php echo $cart['rowid']?>" class="item_remove"><i class="ion-close"></i></a>
                                <a href="#"><img src="<?php echo $cart['options']['pro_image']?>" alt="cart_thumb1"><?php echo $cart['name']?></a>
                                <span class="cart_quantity"> <?php echo $cart['qty'];?> x <span class="cart_amount"> <span class="price_symbole"><i class="fa fa-rupee"></i></span></span><?php echo number_format($cart['price'],2);?></span>
                            </li>
                            <?php } ?>
                            </ul>
                            <?php  $cart_total = $this->cart->total(); ?>
                            <div class="cart_footer">
                                <p class="cart_total"><strong>Subtotal:</strong> <span class="cart_price"> <span class="price_symbole"><i class="fa fa-rupee"></i> </span></span><?php echo number_format($cart_total,2);?></p>
                                <p class="cart_buttons"><a href="<?php echo base_url().'show-cart';?>" class="btn btn-fill-line view-cart">View Cart</a></p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>