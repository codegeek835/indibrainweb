<?php $this->load->view('front/lib/header.php'); ?>
<link rel="stylesheet" href="../assets/front/css/jquery.flex-images.css">
<section>
    <div class="container-margin">
        <div class="row bg-light p-a-10 m-top-50">
            <div class="col-md-1">
                <h4 class="h4-margin font-weight-normal">Sort By:</h4>
            </div>
            <div class="col-md-2 border-right">
                <select id="selectBy" onchange="handle_change()" name="sby">
                    <option value="all" <?php if ($_GET['sby'] == 'all') {
                                            echo "selected";
                                        } ?>>All Assets</option>
                    <option value="free" <?php if ($_GET['sby'] == 'free') {
                                                echo "selected";
                                            } ?>>Free Assets</option>
                    <option value="prime" <?php if ($_GET['sby'] == 'prime') {
                                                echo "selected";
                                            } ?>>Prime Assets</option>
                </select>
            </div>
            <div class="col-md-1">
                <h4 class="h4-margin font-weight-normal">License:</h4>
            </div>
            <div class="col-md-2 mx-auto my-5 blue pb-4 white-text">
                <select id="licenseType" onchange="handle_change()" name="ltyp">
                    <option value="all" <?php if ($_GET['ltyp'] == 'all') {
                                            echo "selected";
                                        } ?>>All Assets</option>
                    <option value="standard" <?php if ($_GET['ltyp'] == 'standard') {
                                                    echo "selected";
                                                } ?>>Standard</option>
                    <option value="editorial" <?php if ($_GET['ltyp'] == 'editorial') {
                                                    echo "selected";
                                                } ?>>Editorial</option>
                </select>
            </div>
            <div class="col-md-2 mx-auto my-5 blue pb-4 white-text">
                <select id="selectColor" onchange="handle_change()" name="cby">
                    <option value="">Select Color</option>
                    <?php if (getColor()) {
                        foreach (getColor() as $color) {  ?>
                            <option value="<?php echo $color->name; ?>" <?php if ($color->name == $_GET['cby']) {
                                                                            echo "selected";
                                                                        } ?>><?php echo $color->name; ?></option>
                    <?php }
                    } ?>
                </select>
            </div>
            <div class="col-md-2 mx-auto my-5 blue pb-4 white-text">
                <select id="selectOrientation" onchange="handle_change()" name="ornt">
                    <option>Select Orientation</option>
                    <option value="Horizontal" <?php if ($_GET['ornt'] == 'Horizontal') {
                                                    echo "selected";
                                                } ?>>Horizontal</option>
                    <option value="Vertical" <?php if ($_GET['ornt'] == 'Vertical') {
                                                    echo "selected";
                                                } ?>>Vertical</option>
                    <option value="Square" <?php if ($_GET['ornt'] == 'Square') {
                                                echo "selected";
                                            } ?>>Square</option>
                    <option value="Panoramic" <?php if ($_GET['ornt'] == 'editorial') {
                                                    echo "selected";
                                                } ?>>Panoramic</option>
                </select>
            </div>

            <div class="col-md-2 mx-auto my-5 blue pb-4 white-text">
                <select id="selectPeople" onchange="handle_change()" name="people">
                    <option>Select People</option>
                    <?php
                    for ($i = 1; $i <= 20; $i++) { ?>
                        <option value="<?php echo $i; ?>" <?php if ($i == $_GET['people']) {
                                                                echo "selected";
                                                            } ?>><?php echo $i; ?>
                        </option>
                    <?php }  ?>
                </select>
            </div>
        </div>
        <br>

        <div class="row">
            <?php if ($most_categorys) {
                foreach ($most_categorys as $most_category) { ?>
                    <div class="md-width-200">
                        <div class="geeks">
                            <a href="<?php echo base_url('category/photos') . '?s=&cat=' . getcatIdName($most_category->pro_cat) . '&sby=all&ltyp=all&cby=&ornt=&people='; ?>">
                                <img src="<?php echo base_url('uploads/') . getSingalImage($most_category->product_id); ?>" alt="">
                                <h5 class="find-h"><?php echo getcatIdName($most_category->pro_cat); ?></h5>
                            </a>
                        </div>
                    </div>
            <?php }
            } ?>
        </div>
        <br>
        <div class="row">
            <!-- <div id="newGallery" class="flex-images">
                <div class="item" data-w="225" data-h="150">
                    <img src="https://us.123rf.com/450wm/ogichobanov/ogichobanov1812/ogichobanov181200153/115014701-magnifying-glass-focusing-on-history-word-business-concept.jpg?ver=6" class="imgSrcClass">
                </div>
                <div class="item" data-w="203" data-h="260">
                    <img src="https://us.123rf.com/450wm/kamenuka/kamenuka1908/kamenuka190800008/129245706-hourglass-decorated-with-flowers-watercolor-painting.jpg?ver=6" class="imgSrcClass">
                </div>
                <div class="item" data-w="260" data-h="206">
                    <img src="https://us.123rf.com/450wm/rawpixel/rawpixel1903/rawpixel190304876/118992912-vintage-premium-frame-mockup-design.jpg?ver=6" class="imgSrcClass">
                </div>
                <div class="item" data-w="216" data-h="260">
                    <img src="https://us.123rf.com/450wm/bashta/bashta1906/bashta190600057/125108446-modern-conceptual-art-poster-with-blue-purple-colorful-antique-venus-bust-contemporary-art-collage-.jpg?ver=6" class="imgSrcClass">
                </div>
                <div class="item" data-w="225" data-h="150">
                    <img src="https://us.123rf.com/450wm/ogichobanov/ogichobanov1812/ogichobanov181200153/115014701-magnifying-glass-focusing-on-history-word-business-concept.jpg?ver=6" class="imgSrcClass">
                </div>
                <div class="item" data-w="203" data-h="260">
                    <img src="https://us.123rf.com/450wm/kamenuka/kamenuka1908/kamenuka190800008/129245706-hourglass-decorated-with-flowers-watercolor-painting.jpg?ver=6" class="imgSrcClass">
                </div>
                <div class="item" data-w="260" data-h="206">
                    <img src="https://us.123rf.com/450wm/rawpixel/rawpixel1903/rawpixel190304876/118992912-vintage-premium-frame-mockup-design.jpg?ver=6" class="imgSrcClass">
                </div>
                <div class="item" data-w="216" data-h="260">
                    <img src="https://us.123rf.com/450wm/bashta/bashta1906/bashta190600057/125108446-modern-conceptual-art-poster-with-blue-purple-colorful-antique-venus-bust-contemporary-art-collage-.jpg?ver=6" class="imgSrcClass">
                </div>
            </div> -->
            <div id="newGallery" class="flex-images">
                <?php if ($products) {
                    foreach ($products as $product) { ?>
                        <div class="item" data-w="543.324" data-h="300">
                            <a href="<?php echo base_url('view-details/') . getEncrypt($product->pro_id); ?>">
                                <img style="width: inherit;" src="<?php echo base_url('uploads/') . $product->pro_image; ?>" data-src="<?php echo base_url('uploads/') . $product->pro_image; ?>" />
                                <!-- <div class="img"></div>
                                <div class="bottom"><?php echo $product->verticals; ?></div> -->
                            </a>
                        </div>
                    <?php }
                } else { ?>
                    <div class="col-md-4 text-center">
                        <img src="<?php echo base_url() ?>assets/front/images/no.jpg">
                    </div>
                <?php } ?>
            </div>
        </div>

        <!--  <div class="row">
            <?php if ($products) {
                foreach ($products as $product) { ?>
                    <div class="col-md-4">
                        <div class="geeks">
                            <a href="<?php echo base_url('view-details/') . getEncrypt($product->pro_id); ?>">
                                <div class="box portfolio-item">
                                    <img src="<?php echo base_url('uploads/') . $product->pro_image; ?>" alt="" class="h-w rounded" />
                                </div>
                            </a>
                        </div>
                    </div>
                <?php }
            } else { ?>
                <div class="col-md-4 text-center">
                    <img src="<?php echo base_url() ?>assets/front/images/no.jpg">
                </div>
            <?php } ?>
        </div> -->
        <!--<div class="row text-center">-->
        <!--   <nav aria-label="Page navigation example">-->
        <!--      <ul class="pagination">-->
        <!--         <li class="page-item">-->
        <!--            <a class="page-link" href="#" aria-label="Previous">-->
        <!--            <span aria-hidden="true">&laquo;</span>-->
        <!--            <span class="sr-only">Previous</span>-->
        <!--            </a>-->
        <!--         </li>-->
        <!--         <li class="page-item"><a class="page-link" href="#">1</a></li>-->
        <!--         <li class="page-item"><a class="page-link" href="#">2</a></li>-->
        <!--         <li class="page-item"><a class="page-link" href="#">3</a></li>-->
        <!--         <li class="page-item">-->
        <!--            <a class="page-link" href="#" aria-label="Next">-->
        <!--            <span aria-hidden="true">&raquo;</span>-->
        <!--            <span class="sr-only">Next</span>-->
        <!--            </a>-->
        <!--         </li>-->
        <!--      </ul>-->
        <!--   </nav>-->
        <!--</div>-->
    </div>
</section>
<!-- section 2 end  -->
<!--== Footer Start ==-->
<footer class="footer">
    <?php $this->load->view('front/lib/footer.php'); ?>
</footer>
<!--== Footer End ==-->
</div>
<!--== Wrapper End ==-->
<?php $this->load->view('front/lib/footer-js.php'); ?>
<script src="../assets/front/js/jquery.flex-images.min.js"></script>
<script>
    var layout_height = 300;

    function submit_form() {
        var selected = $('#photos').val();
        document.getElementById("submitform").action = selected;
    }

    function handle_change(e) {
        let {
            value,
            name
        } = this.event.target
        let cur_url = "<?php echo get_current_url(); ?>";
        let href = new URL(cur_url);
        href.searchParams.set(name, value);
        window.location.href = href.toString();
    }

    function submit_button(id) {
        document.getElementById("submitform").action = id;
        document.getElementById("submitform").submit();
    }

    function initMostCont() {
        if (jQuery('#newGallery .item').length > 0) {
            jQuery.when(jQuery('#newGallery').flexImages({
                rowHeight: layout_height
            })).then(function() {
                jQuery('.flex-images .item').css('border', '1px solid #e5e5e5');
            });
            jQuery(window).trigger('resize');
        }
    }

    $(document).ready(function() {
        $(".filter-button").click(function() {
            var value = $(this).attr('data-filter');

            if (value == "all") {
                $('.filter').show('1000');
            } else {
                $(".filter").not('.' + value).hide('3000');
                $('.filter').filter('.' + value).show('3000');

            }
        });

        if ($(".filter-button").removeClass("active")) {
            $(this).removeClass("active");
        }
        $(this).addClass("active");
        initMostCont();
    });

    jQuery(window).resize(function() {
        setTimeout(function() {
            jQuery('#newGallery').flexImages({
                rowHeight: layout_height
            });
        }, 500);
    });
    $(function() {
        var selectedClass = "";
        $(".filter").click(function() {
            selectedClass = $(this).attr("data-rel");
            $("#gallery").fadeTo(100, 0.1);
            $("#gallery div").not("." + selectedClass).fadeOut().removeClass('animation');
            setTimeout(function() {
                $("." + selectedClass).fadeIn().addClass('animation');
                $("#gallery").fadeTo(300, 1);
            }, 300);
        });
    });

    // $(".column").sortable({
    //     connectWith: ".column",
    //     handle: ".portlet-header",
    //     cancel: ".portlet-toggle",
    //     placeholder: "drop-placeholder"
    // });

    $('.portlet-header').on('click', function(e) {
        if ($(e.target).children().last().hasClass('fa-caret-down')) {
            $(e.target).children().last().removeClass('fa-caret-down').addClass('fa-caret-up');
        } else if ($(e.target).children().last().hasClass('fa-caret-up')) {
            $(e.target).children().last().removeClass('fa-caret-up').addClass('fa-caret-down');
        }
    });
</script>
</body>

</html>