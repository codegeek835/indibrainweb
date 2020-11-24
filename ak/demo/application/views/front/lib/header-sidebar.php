<div class="bottom_header dark_skin main_menu_uppercase border-top border-bottom">
        <div class="custom-container">
            <div class="row"> 
                <div class="col-lg-3 col-md-4 col-sm-6 col-3">
                    <div class="categories_wrap">
                        <button type="button" data-toggle="collapse" data-target="#navCatContent" aria-expanded="false" class="categories_btn">
                            <i class="linearicons-menu"></i><span>Top Categories </span>
                        </button>
                        <div id="navCatContent" class="nav_cat navbar collapse">
                            <ul> 
                                <?php 
                                $start = '0';
                                $end = '9';
                                $allCategores = getAllCategory($start,$end);
                                $all_sub_category = $this->CategoryModel->get_all_sub_category();
                                foreach ($allCategores as $allCategory) {
                                ?>
                                <li>
                                    <a href="#" class="nav-link" data-toggle="dropdown"><span><?php echo $allCategory->category_name;?></span></a>
                                </li>
                                <?php  } ?>
                                <li>
                                    <ul class="more_slide_open">
                                        <?php 
                                        $all_count = countCategory();
                                            $allCategores = getAllCategory($end,$all_count);
                                            
                                            foreach ($allCategores as $allCategory) {
                                        ?>
                                        <li>
                                            <a href="#" class="nav-link" data-toggle="dropdown"> <span><?php echo $allCategory->category_name;?></span></a>
                                        </li>
                                    <?php }?>
                                    </ul>
                                </li>
                            </ul>
                            <div class="more_categories">More Categories</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-8 col-sm-6 col-9">
                    <nav class="navbar navbar-expand-lg">
                        <button class="navbar-toggler side_navbar_toggler" type="button" data-toggle="collapse" data-target="#navbarSidetoggle" aria-expanded="false"> 
                            <span class="ion-android-menu"></span>
                        </button>
                        <div class="pr_search_icon">
                            <a href="#javascript:void(0);" class="nav-link pr_search_trigger"><i class="linearicons-magnifier"></i></a>
                        </div> 
                        <div class="collapse navbar-collapse mobile_side_menu" id="navbarSidetoggle">
                            <ul class="navbar-nav">
                                <li><a  class="nav-link active" href="<?php echo base_url();?>">Home</a></li>
                                <li><a class="nav-link" href="#" data-toggle="dropdown">About Us</a></li>
                                <li class="dropdown dropdown-mega-menu">
                                    <a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown">Disease</a>
                                    <div class="dropdown-menu">
                                        <ul class="mega-menu d-lg-flex">
                                            <li class="mega-menu-col col-lg-3">
                                                <ul> 
                                                    <li class="dropdown-header"><a href="<?php echo base_url('product/').md5('6').'cat6?subcat=';?>">Male Health Care</a></li>
                                                    <?php $subCat = subcategoryByCatId('6');if($subCat){foreach($subCat as $sub){?>
                                                    <li><a class="dropdown-item nav-link nav_item" href="#"><?php echo $sub->sub_category_name;?></a></li>
                                                    <?php }}?>
                                                </ul>
                                            </li>
                                            <li class="mega-menu-col col-lg-3">
                                                <ul>
                                                    <li class="dropdown-header"><a href="<?php echo base_url('product/').md5('2').'cat2?subcat=';?>">Women Health Care</a></li>
                                                    <?php $subCat = subcategoryByCatId('2');if($subCat){foreach($subCat as $sub){?>
                                                    <li><a class="dropdown-item nav-link nav_item" href="#"><?php echo $sub->sub_category_name;?></a></li>
                                                    <?php }}?>
                                                </ul>
                                            </li>
                                            <li class="mega-menu-col col-lg-3">
                                                <ul>
                                                    <li class="dropdown-header"><a href="<?php echo base_url('product/').md5('1').'cat1?subcat=';?>">Liver Care</a></li>
                                                    <?php $subCat = subcategoryByCatId('1');if($subCat){foreach($subCat as $sub){?>
                                                    <li><a class="dropdown-item nav-link nav_item" href="#"><?php echo $sub->sub_category_name;?></a></li>
                                                    <?php }}?>
                                                </ul>
                                            </li>
                                            <li class="mega-menu-col col-lg-3">
                                                <ul>
                                                    <li class="dropdown-header"><a href="<?php echo base_url('product/').md5('4').'cat4?subcat=';?>">Brain & Nerve Care</a></li>
                                                    <?php $subCat = subcategoryByCatId('4');if($subCat){foreach($subCat as $sub){?>
                                                    <li><a class="dropdown-item nav-link nav_item" href="#"><?php echo $sub->sub_category_name;?></a></li>
                                                    <?php }}?>
                                                </ul>
                                            </li>
                                        </ul>
                                        <div class="d-lg-flex menu_banners">
                                            <div class="col-lg-6">
                                                <div class="header-banner">
                                                    <div class="sale-banner">
                                                        <a class="hover_effect1">
                                                            <img src="<?php echo base_url()?>assets/images/desi_banner1.png" alt="shop_banner_img7">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="header-banner">
                                                    <div class="sale-banner">
                                                        <a class="hover_effect1">
                                                            <img src="<?php echo base_url()?>assets/images/desi_banner2.jpg" alt="shop_banner_img8">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="dropdown dropdown-mega-menu">
                                    <a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown">ramsons product</a>
                                    <div class="dropdown-menu">
                                        <ul class="mega-menu d-lg-flex">
                                            <li class="mega-menu-col col-lg-2">
                                                <ul> 
                                                    <li class="dropdown-header"><a href="<?php echo base_url('product/').md5('13').'cat13?subcat=';?>">Liver Tonic</a></li>
                                                    <?php $subCat = subcategoryByCatId('13');if($subCat){foreach($subCat as $sub){?>
                                                    <li><a class="dropdown-item nav-link nav_item" href="#"><?php echo $sub->sub_category_name;?></a></li>
                                                    <?php }}?>
                                                </ul>
                                            </li>
                                            <li class="mega-menu-col col-lg-4">
                                                <ul> 
                                                    <li class="dropdown-header"><a href="<?php echo base_url('product/').md5('14').'cat14?subcat=';?>">Nosefit</a></li>
                                                    <?php $subCat = subcategoryByCatId('14');if($subCat){foreach($subCat as $sub){?>
                                                    <li><a class="dropdown-item nav-link nav_item" href="#"><?php echo $sub->sub_category_name;?></a></li>
                                                    <?php }}?>
                                                </ul>
                                            </li>
                                            <li class="mega-menu-col col-lg-6">
                                               <div class="header-banner">
                                                    <div class="sale-banner">
                                                        <a class="hover_effect1" href="##">
                                                            <img src="<?php echo base_url()?>assets/images/liver_well.jpg" alt="shop_banner_img7">
                                                        </a>
                                                    </div>
                                                </div>
                                            </li>
                                           
                                        </ul>
                                    </div>
                                </li>
                                <li class="dropdown dropdown-mega-menu">
                                    <a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown">Personal Care</a>
                                    <div class="dropdown-menu">
                                        <ul class="mega-menu d-lg-flex">
                                            <li class="mega-menu-col col-lg-3">
                                                <ul> 
                                                    <li class="dropdown-header"><a href="<?php echo base_url('product/').md5('11').'cat11?subcat=';?>">Beautiful Me</a></li>
                                                    <?php $subCat = subcategoryByCatId('11');if($subCat){foreach($subCat as $sub){?>
                                                    <li><a class="dropdown-item nav-link nav_item" href="#"><?php echo $sub->sub_category_name;?></a></li>
                                                    <?php }}?>
                                                </ul>
                                            </li>
                                            <li class="mega-menu-col col-lg-3">
                                                <ul>
                                                    <li class="dropdown-header"><a href="<?php echo base_url('product/').md5('5').'cat5?subcat=';?>">Hand And Foot Care</a></li>
                                                    <?php $subCat = subcategoryByCatId('5');if($subCat){foreach($subCat as $sub){?>
                                                    <li><a class="dropdown-item nav-link nav_item" href="#"><?php echo $sub->sub_category_name;?></a></li>
                                                    <?php }}?>
                                                </ul>
                                            </li>
                                            <li class="mega-menu-col col-lg-3">
                                                <ul>
                                                    <li class="dropdown-header"><a href="<?php echo base_url('product/').md5('8').'cat8?subcat=';?>">Bath and Spa</a></li>
                                                    <?php $subCat = subcategoryByCatId('8');if($subCat){foreach($subCat as $sub){?>
                                                    <li><a class="dropdown-item nav-link nav_item" href="#"><?php echo $sub->sub_category_name;?></a></li>
                                                    <?php }}?>
                                                </ul>
                                            </li>
                                            <li class="mega-menu-col col-lg-3">
                                                <ul>
                                                    <li class="dropdown-header"><a href="<?php echo base_url('product/').md5('7').'cat7?subcat=';?>">Nail Care</a></li>
                                                    <?php $subCat = subcategoryByCatId('7');if($subCat){foreach($subCat as $sub){?>
                                                    <li><a class="dropdown-item nav-link nav_item" href="#"><?php echo $sub->sub_category_name;?></a></li>
                                                    <?php }}?>
                                                </ul>
                                            </li>
                                        </ul>
                                        <div class="d-lg-flex menu_banners">
                                            <div class="col-lg-6">
                                                <div class="header-banner">
                                                    <div class="sale-banner">
                                                        <a class="hover_effect1" href="##">
                                                            <img src="<?php echo base_url()?>assets/images/shop_banner_img7.jpg" alt="shop_banner_img7">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="header-banner">
                                                    <div class="sale-banner">
                                                        <a class="hover_effect1" href="##">
                                                            <img src="<?php echo base_url()?>assets/images/shop_banner_img8.jpg" alt="shop_banner_img8">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="dropdown dropdown-mega-menu">
                                    <a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown">Skin & Beauty</a>
                                    <div class="dropdown-menu">
                                        <ul class="mega-menu d-lg-flex">
                                            <li class="mega-menu-col col-lg-3">
                                                <ul> 
                                                    <li class="dropdown-header"><a href="<?php echo base_url('product/').md5('9').'cat9?subcat=';?>">BaBy Care</a></li>
                                                    <?php $subCat = subcategoryByCatId('9');if($subCat){foreach($subCat as $sub){?>
                                                    <li><a class="dropdown-item nav-link nav_item" href="#"><?php echo $sub->sub_category_name;?></a></li>
                                                    <?php }}?>
                                                </ul>
                                            </li>
                                            <li class="mega-menu-col col-lg-3">
                                                <ul>
                                                    <li class="dropdown-header"><a href="<?php echo base_url('product/').md5('10').'cat10?subcat=';?>">Wonder Herbs</a></li>
                                                    <?php $subCat = subcategoryByCatId('10');if($subCat){foreach($subCat as $sub){?>
                                                    <li><a class="dropdown-item nav-link nav_item" href="#"><?php echo $sub->sub_category_name;?></a></li>
                                                    <?php }}?>
                                                </ul>
                                            </li>
                                            <li class="mega-menu-col col-lg-3">
                                                <ul>
                                                    <li class="dropdown-header"><a href="<?php echo base_url('product/').md5('3').'cat3?subcat=';?>">Hair Care</a></li>
                                                    <?php $subCat = subcategoryByCatId('3');if($subCat){foreach($subCat as $sub){?>
                                                    <li><a class="dropdown-item nav-link nav_item" href="#"><?php echo $sub->sub_category_name;?></a></li>
                                                    <?php }}?>
                                                </ul>
                                            </li>
                                            <li class="mega-menu-col col-lg-3">
                                                <ul>
                                                    <li class="dropdown-header"><a href="<?php echo base_url('product/').md5('12').'cat12?subcat=';?>">Eye Lip Oral Care</a></li>
                                                   
                                                    <?php $subCat = subcategoryByCatId('12');if($subCat){foreach($subCat as $sub){?>
                                                    <li><a class="dropdown-item nav-link nav_item" href="#"><?php echo $sub->sub_category_name;?></a></li>
                                                    <?php }}?>
                                                </ul>
                                            </li>
                                        </ul>
                                        
                                    </div>
                                </li>
                                <li><a class="nav-link" href="##blog-standard-left-sidebar.html">online treatment</a></li>
                                <li><a class="nav-link nav_item" href="##contact.html">Contact Us</a></li> 
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>