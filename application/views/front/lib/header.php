<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php if (isset($title)) { echo $title;} ?></title>
  <meta name="description" content="<?php if (isset($description)) { echo $description;} ?>" />
  <meta name="keywords" content="<?php if (isset($keywords)) { echo $keywords;} ?>" />
  <!-- Responsive Style Sheets -->
  <!--
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('revolution/css/settings.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('revolution/css/layers.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('revolution/css/navigation.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/front/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/front/css/responsive.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/front/css/custom-icons.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/front/css/cubeportfolio.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/front/css/bootsnav.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/front/css/bootsnav.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/front/css/animate.css') ?>">
    -->
  <!-- Revolution Style Sheets -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/front/css/master.css') ?>">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
  <!-- Loader Js -->
  <script type="text/javascript">
    $(window).load(function() {
      $('.preloader').fadeOut('slow');
      $('#navbar-menu').css("height", "0px");
    });

    $('ul.nav li.dropdown').hover(function() {
      $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
    }, function() {
      $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
    });
  </script>
  <style>
    .topsearch .search-container {
      float: right;
    }

    .padd-l-r {
      padding: 30px 10px;
    }

    .topsearch input[type=text] {
      padding: 6px;
      font-size: 17px;
      margin-top: 10px !important;
      float: left;
      background-color: #fff !important;
    }

    .topsearch .search-container button {
      float: right;
      padding: 6px 10px;
      margin-top: 10px;
      margin-right: 16px;
      background: #ddd0 !important;
      font-size: 17px;
      border: none;
      cursor: pointer;
    }

    .topsearch .search-container button:hover {
      background: #ccc;
    }

    @media screen and (max-width: 600px) {
      .topsearch .search-container {
        float: none;
      }

      .topsearch a,
      .topsearch input[type=text],
      .topsearch .search-container button {
        float: none;
        display: block;
        text-align: left;
        width: 100%;
        margin: 0;
        padding: 14px;
      }

      .topsearch input[type=text] {
        border: 1px solid #ccc;
      }
    }
  </style>
</head>
<body>
  <div class="preloader"></div>
  <!--== Wrapper Start ==-->
  <div class="wrapper">
    <!--== Header Start ==-->
    <nav class="navbar navbar-default navbar-fixed navbar-transparent white bootsnav on no-full brand-center bg-w">
      <div class="container-fluid">
        <!--== Start Atribute Navigation ==-->
        <div class="attr-nav hidden-xs sm-display-none">
          <ul>

            <div class="logo"> <a href="<?php echo base_url('/') ?>"><img class="logo logo-scrolled scroll" src="<?php echo base_url('assets/front/images/logo.png') ?>" alt="" style="display: block;"> </a></div>
          </ul>
        </div>
        <!--== End Atribute Navigation ==-->
        <!--== Start Header Navigation ==-->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu"><i class="fa fa-bars" aria-hidden="true"></i></button>
          <div class="logo">
            <a href="<?php echo base_url('/') ?>"> <img class="logo logo-display" src="<?php echo base_url() ?>assets/front/images/logo.png" alt=""> <img class="logo logo-scrolled" src="<?php echo base_url() ?>assets/front/images/logo.png" alt=""> </a>
            <!-- -->
            <div id="top_search" class="fix_s topsearch">
              <div class="search-container">
                <form method="GET" action="<?php echo base_url('category/photos'); ?>">
                  <input type="text" placeholder="Search free photos and more" name="s" value="<?php if (isset($_GET['s'])) {
                                                                                                  echo $_GET['s'];
                                                                                                } ?>" required>
                  <input type="hidden" name="cat" value="">
                  <input type="hidden" name="sby" value="all">
                  <input type="hidden" name="ltyp" value="all">
                  <input type="hidden" name="cby">
                  <input type="hidden" name="ornt">
                  <input type="hidden" name="people">
                  <button type="submit"><i class="fa fa-search"></i></button>
                </form>
              </div>
            </div>
          </div>
        </div>

        <!--== End Header Navigation ==-->
        <!--== Collect the nav links, forms, and other content for toggling ==-->
        <div class="collapse navbar-collapse bg-w" id="navbar-menu">
          <ul class="nav navbar-nav navbar-center">
            <li><a href="<?php echo base_url('vertical/photos'); ?>">Photos</a></li>
            <li><a href="<?php echo base_url('vertical/vector'); ?>">Vector</a></li>
            <li><a href="<?php echo base_url('vertical/arts'); ?>">Arts</a></li>
            <li><a href="<?php echo base_url('vertical/psds'); ?>">PNG</a></li>
            <!--<li><a href="<?php echo base_url('/') ?>">Business Solution</a></li>-->
            <?php if ($this->session->userdata('ptnr_id')) { ?>
              <li><a href="<?php echo base_url('partner-dashboard') ?>">Creative Dashboard</a></li>
            <?php } else { ?>
              <li><a href="<?php echo base_url('partner-login') ?>">Creative Partner</a></li>
            <?php } ?>
            <li><a href="<?php echo base_url('/') ?>">Pricing</a></li>
            <?php if ($this->session->userdata('user_id')) { ?>
              <li class="dropdown">
                <a href="#" class="" data-toggle="dropdown" style="font-size: 14px;"><i class="fa fa-user-circle-o dis-block"></i><?php echo substr($this->session->userdata('user_name'), 0, 8) ?><b class="caret"></b></a>
                <ul class="dropdown-menu drop">
                  <li><a href="<?php echo base_url('my-account/') . getEncrypt($this->session->userdata('user_id')) ?>"><i class="fa fa-user-circle-o dis-block"></i> My Account</a></li>
                  <li class="divider"></li>
                  <li><a href="<?php echo base_url('my-wishlist/') . getEncrypt($this->session->userdata('user_id')) ?>"><i class="fa fa-user-circle-o dis-block"></i> My wishlist</a></li>
                  <li class="divider"></li>
                  <li><a href="<?php echo base_url('logout') ?>"><i class="fa fa-sign-out dis-block"></i> Logout</a></li>
                </ul>
              </li>
            <?php } else { ?>
              <li><a href="<?php echo base_url('login') ?>">Sign In</a></li>
            <?php } ?>
          </ul>
        </div>
        <div style="right:4px;" class="attr-nav hidden-xs sm-display-none cart-icon">
          <ul>
            <li class="search1"><a href="<?php echo base_url('cart') ?>" id="search-button" class="head-slid"> Cart</a></li>
            <?php if ($this->session->userdata('user_id')) { ?>
              <li class="search1" class="dropdown">
                <a href="#" class="" data-toggle="dropdown" style="font-size: 14px;"><i class="fa fa-user-circle-o dis-block"></i><?php echo substr($this->session->userdata('user_name'), 0, 8) ?><b class="caret"></b></a>
                <ul class="dropdown-menu drop">
                  <li class="search1"><a href="<?php echo base_url('my-account/') . getEncrypt($this->session->userdata('user_id')) ?>"><i class="fa fa-user-circle-o dis-block"></i> My Account</a></li>
                  <li class="divider"></li>
                  <li class="search1"><a href="<?php echo base_url('my-wishlist/') . getEncrypt($this->session->userdata('user_id')) ?>"><i class="fa fa-user-circle-o dis-block"></i> My wishlist</a></li>
                  <li class="divider"></li>
                  <li class="search1"><a href="<?php echo base_url('logout') ?>"><i class="fa fa-sign-out dis-block"></i> Logout</a></li>
                </ul>
              </li>

            <?php } else { ?>
              <li class="search1"><a href="<?php echo base_url('login') ?>" class="head-slid"> Sign In</a></li>

            <?php } ?>
          </ul>
        </div>
        <!--== /.navbar-collapse ==-->
      </div>
    </nav>