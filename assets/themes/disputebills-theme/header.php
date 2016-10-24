<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package some_like_it_neat
 */
?>
<!DOCTYPE html>
<?php tha_html_before(); ?>
<html class="no-js" prefix="og: http://ogp.me/ns#" <?php language_attributes(); ?>>
  <head itemscope itemtype="http://schema.org/WebSite">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <!--<meta http-equiv="Accept-CH" content="DPR, Viewport-Width, Width">-->

    <?php tha_head_top(); ?>
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/fonts/brandon/brandon.css">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/fonts/brandon-text/brandon-text.css">

    <!--<link href='https://fonts.googleapis.com/css?family=Noto+Sans:400,700' rel='stylesheet' type='text/css'>-->
    <?php tha_head_bottom(); ?>
    <?php wp_head(); ?>
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/header.css">

      <!-- Font Icons -->
    <link href='https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css' rel='stylesheet'>
    <link href='<?php echo get_stylesheet_directory_uri(); ?>/icons/linearicons.css' rel='stylesheet'>
    <link href='<?php echo get_stylesheet_directory_uri(); ?>/icons/iconfonts/style.css' rel='stylesheet'>


    <!-- Utility Classes -->
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/util-spacing.css">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/util-bs3-spacing.css">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/util-bs3-flexbox.css">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/util-bs3-extras.css">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/util-bs3-alignment.css">

    <link href="https://fonts.googleapis.com/css?family=Covered+By+Your+Grace" rel="stylesheet">
    <!--<link rel='stylesheet' href='https://rawgit.com/pguso/jquery-plugin-circliful/master/css/jquery.circliful.css'>-->


    <!-- Owl-carousel CSS -->
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/owl.carousel.css">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/owl.theme.css">
    <!--Magnific-popup CSS-->
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/magnific-popup.css">

    <!--[if lt IE 9]><script type="text/javascript">window.html5={shivCSS:!1};</script><script src="https://cdn.jsdelivr.net/g/html5shiv@3.7.3,respond@1.4.2"></script><![endif]-->

<style>
.container-fluid>.navbar-collapse, 
.container-fluid>.navbar-header, 
.container>.navbar-collapse, 
.navbar-autocollapse.collapsed .container-fluid> .navbar-collapse, 
.navbar-autocollapse.collapsed .container-fluid>.navbar-header, 
.navbar-autocollapse.collapsed .container>.navbar-collapse, 
.navbar-autocollapse.collapsed .container>.navbar-header,
.navbar-autocollapse.collapsed .navbar-nav,
.navbar-autocollapse.collapsed .container-fluid> .navbar-collapse.collapse.in {
   margin-right: 0px; 
   margin-left: 0px; 
}

.navbar-autocollapse.collapsed .navbar-nav {
  margin: 0!important;
}
.navbar-autocollapse.collapsed .navbar-nav>li>a {
  padding-top: 25px;
  padding-bottom: 25px;
}
.navbar-collapse {
  padding-right: 0px;
  padding-left: 0px;
}

.navbar-autocollapse.collapsed .navbar-nav,
.navbar-autocollapse.collapsed .navbar-nav>li,
.navbar-autocollapse.collapsed .navbar-nav>li>a {
  display: flex;
  align-items: center;
  justify-content: center;
  flex: 1;
}

.container-fluid>.navbar-collapse, 
.container-fluid>.navbar-header, 
.container>.navbar-collapse, 
.navbar-autocollapse.collapsed .container-fluid> .navbar-collapse, 
.navbar-autocollapse.collapsed .container-fluid>.navbar-header, 
.navbar-autocollapse.collapsed .container>.navbar-collapse, 
.navbar-autocollapse.collapsed .container>.navbar-header,
.navbar-autocollapse.collapsed .navbar-nav {
   margin-right: 0px; 
   margin-left: 0px; 
}

.navbar-autocollapse.collapsed .navbar-nav {
  margin: 0 0px;
}
.navbar-autocollapse.collapsed .navbar-nav>li>a {
  padding-top: 25px;
  padding-bottom: 25px;
}
.navbar-collapse {
  padding-right: 0px;
  padding-left: 0px;
}

.navbar-autocollapse.collapsed .container-fluid> .navbar-collapse.collapse.in {
  margin-left: 0px;
  margin-right: 0px;
}

.navbar-default .navbar-toggle {
  margin: 0;
  padding: 0;
}
.navbar-default .navbar-toggle:focus, 
.navbar-default .navbar-toggle:hover {
  background-color: transparent;
}

.navbar-autocollapse .navbar-collapse {
  padding-right: 0px;
  padding-left: 0px;
}

@media only screen and (max-width: 767px) {
.navbar-nav {
  margin: 0!important;
} 
}

.navbar-default .navbar-toggle {
  margin: 0!important;
  padding: 0;
}
.navbar-default .navbar-toggle:focus, 
.navbar-default .navbar-toggle:hover {
  background-color: transparent;
}

@media (max-width: 935px) {
  .navbar-autocollapse .navbar-toggle {
    float: left!important;
    margin-right: 25px!important;
    margin-left: 25px!important;
  }
  .navbar-autocollapse .navbar-toggle {
    display: flex!important;
    flex-direction: column;
    height: 90px;
    margin-top: 0;
    margin-bottom: 0;
    justify-content: center;
    padding: 0;
    border: none;
    margin: 0px 0px 0px 0;
  }
}

.navbar-autocollapse .navbar-collapse.collapse.in .hidden-xs {
  display: none
}

.hideonbig {
  float: right;
}

.hideonsm {
  display: none;
}

@media (min-width: 935px) { 
  .hideonbig {
    display: none!important;
  }
  .hideonsm {
  display: block!important;
  }
}
@media (max-width: 935px) { 
  .hideonsm {
  display: none!important;
  }
}
@media (max-width: 767px) { 
  .navbar-autocollapse .navbar-toggle,
  .navbar-brand,
  .navbar-btn {
    height: 60px!important;
  }
  .navbar-btn .btn-callout {
    padding: 6px 12px;
  }
  .navbar-autocollapse .navbar-toggle {

    margin-right: 15px!important;
    margin-left: 15px!important;
  }
  .navbar-autocollapse .navbar-btn {
    margin-right: 15px;
  }
}
@media (max-width: 480px) { 
  .hidden-xxs {
    display: none!important;
  }
  .navbar-brand {
    width: 100%;
    text-align: center;
    position: absolute;
  }
  .navbar-brand svg {
    margin: 0 auto!important;
  }
  #masthead {
    border-top: 2px solid #0097db;
  }
  .navbar-toggle {
    z-index: 99999;
  }
  .navbar-autocollapse.collapsed .navbar-nav>li {
    display: block!important;
  }
}

.navbar-autocollapse.collapsed .navbar-default .nav>li,
.navbar-collapse.collapse.in .navbar-nav>li {
  float: left;
  width: 50%;
  border-bottom: 1px solid #eee;
  border-left: 1px solid #eee;
  border-width: 1px;
  border-bottom: 1px solid #eee;
}
.jumbotron .subheader {
  min-height: 60px;
}
.navbar-autocollapse.collapsed .navbar-toggle {
  cursor: pointer;
}
.bg-white {
  background-color:  #fff;
}

@media (max-width: 481px) {
  .header-links li {
    margin-top: 15px
  }
}
.navbar-brand {
  padding-left: 15px;
}
.hideonsm {
  padding-right: 15px;
}
.header-links li {
  margin-bottom: 15px;
}

@media (max-width: 767px) {
.navbar-autocollapse .navbar-toggle {
  display: -webkit-box!important;
  display: -ms-flexbox!important;
  display: flex!important;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -ms-flex-direction: column;
  flex-direction: column;
  -webkit-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
}
.navbar-autocollapse .navbar-toggle {
  height: 60px!important;
}
}

img {
	width: 100%;
	height: auto;
}
.page-template-page-advocate .jumbotron {
  background: -webkit-linear-gradient(left, rgba(0, 0, 0, 0.4), transparent), url(http://disputebills.com/assets/uploads/3-copy.png) no-repeat center;
  background: linear-gradient(to right, rgba(0, 0, 0, 0.4), transparent), url(http://disputebills.com/assets/uploads/3-copy.png) no-repeat center;
  background-size: cover;
  height: 500px;
  background-position: top right;
}
.page-template-page-advocate .jumbotron {
  background: url(https://disputebills.com/assets/uploads/2016/05/working_yk8yee.jpg) no-repeat center;
  height: auto !important;
}
@media screen and (min-width: 768px) {
  .page-template-page-advocate .jumbotron {
    padding-top: 100px;
    padding-bottom: 100px;
  }
}
.page-template-page-advocate .header-text {
  padding-bottom: 0px !important;
}
.page-template-page-advocate .header-text .header-links {
  margin-top: 5rem;
}
.page-template-page-advocate .callout h3 em:after {
  position: absolute;
  top: 43px;
  background-image: url(http://disputebils16.staging.wpengine.com/assets/uploads/2016/08/underline.png);
  background-size: 87%;
  display: inline-block;
  width: 168px;
  height: 22px;
  content: "";
  background-repeat: no-repeat;
  left: 0;
}
.page-template-page-advocate .callout h3 em {
  border-bottom: none !important;
  position: relative;
}
.page-template-page-advocate .callout h3 {
  font-size: 36px;
  color: #fff;
}
.page-template-page-advocate .callout h3 em {
  border-bottom: 3px solid #fff;
}
.page-template-page-advocate .callout-footer-btn {
  margin-left: 30px;
}
.page-template-page-advocate .callout h3 {
  font-size: 36px;
  color: #fff;
}
.page-template-page-advocate .callout h3 em {
  border-bottom: 3px solid #fff;
}
.page-template-page-advocate .callout-footer-btn {
  margin-left: 30px;
}
.page-template-page-advocate .callout .only-x-price {
  font-family: "Covered By Your Grace";
  font-style: normal;
  font-weight: normal;
  position: absolute;
  right: 69px;
  top: -54px;
  text-align: center;
  color: #FFF;
  -webkit-transform: rotate(15deg);
  transform: rotate(15deg);
  font-size: 38px;
}
.page-template-page-advocate .callout .only-x-price:after {
  content: '';
  position: absolute;
  max-width: 100%;
  top: 52px;
  right: 60px;
  width: 60px;
  height: 60px;
  background: url("https://www.clickdesk.com/assets/images/get-started-arrow.png") no-repeat;
  background-size: 60px 60px;
}
.page-template-page-advocate .how-it-works [class*='col-'] {
  -webkit-box-align: center;
  -ms-flex-align: center;
  -ms-grid-row-align: center;
  -webkit-box-align: center;
  -webkit-align-items: center;
      -ms-flex-align: center;
          align-items: center;
}
.page-template-page-advocate .how-it-works .icon-box-circle-bg-center {
  line-height: 2;
  display: -webkit-box;
  display: -ms-flexbox;
  display: -webkit-flex;
  display: flex;
  -webkit-box-align: center;
  -ms-flex-align: center;
  -webkit-align-items: center;
          align-items: center;
  -webkit-box-pack: center;
  -ms-flex-pack: center;
  -webkit-justify-content: center;
          justify-content: center;
  width: 100px;
  height: 100px;
  background: #0097db;
  color: #fff;
  border-radius: 50%;
  font-size: 32px;
  margin-bottom: 20px;
  text-align: center;
  margin: 0 auto;
  left: 0;
  right: 0;
  margin-bottom: 20px;
  background-color: #084f70;
}
.page-template-page-advocate .our-guarantee .image-block {
  background: url("http://disputebills.com/assets/uploads/2016/01/older-couple.jpg") no-repeat center;
  background: url(http://i.istockimg.com/image-zoom/77027747/3/380/253/stock-photo-77027747-architect-presenting-a-new-project-on-tablet-to-a-couple.jpg) no-repeat center;
  background-size: cover;
  background-position: top;
  height: 100%;
  position: absolute;
  width: 50%;
}
.page-template-page-advocate .our-guarantee .image-block-left {
  left: 0;
}
.page-template-page-advocate .our-guarantee .checkmark-list li {
  font-size: 24px;
}
</style>
<!-- Google Tag Manager -->
<?php if (!is_user_logged_in()): ?>
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-TQN7FH"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-TQN7FH');</script>
<?php endif ?>
<!-- / Google Tag Manager -->
</head>
  <body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">
    <link itemprop=isPartOf href="#WebSite">
    <?php tha_body_top(); ?>
    <div id="page" class="hfeed site">
    <?php tha_header_before(); ?>
    <header id="masthead" class="example3" itemscope="itemscope" itemtype="http://schema.org/WPHeader">
      <?php tha_header_top(); ?>
      <div class="tagline hidden-xs">
        <div class="container-fluid">
          <div class="pull-left">
            <ul class="target-audience-link list-inline">
              <li><a href="/">For Individuals</a></li>
              <div class="arrow_box-top"></div>
              <li><a href="/organizations/">For Businesses</a></li>
            </ul>
          </div>
          <div class="pull-right">
            <div class="email"><a href="javascript:void(0);">Office Hours: 9AM–5:30PM</a></div>
            <span class="link-seperator"> | </span>
            <div class="phone"><a href="tel:+18886222809">1 (888) 622-2809</a></div>
            <span class="link-seperator"> | </span>
            <div class="email"><a href="https://app.disputebills.com/users/sign_in"><span style="font-size: 90%;" class="lnr lnr-user"></span> Login</a></div>
          </div>
          <div class="clear"></div>
        </div>
      </div>

      <nav itemscope="" itemtype="http://schema.org/SiteNavigationElement" aria-label="Main navigation" class="navbar navbar-static-top navbar-default navbar-autocollapse">
        <div class="max-lg">
          <div class="navbar-header" itemscope="" itemtype="http://schema.org/Organization">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar3">
            <div>
              <span class="sr-only">Toggle navigation</span> 
              <span class="icon-bar"></span> 
              <span class="icon-bar"></span> 
              <span class="icon-bar"></span>
            </div>
            </button>
            <a itemprop="url" title="Dispute Bills, Chicago" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="navbar-brand">
            <!--<img itemprop="logo" alt="Dispute Bills, Chicago, IL" src="<?php // echo get_template_directory_uri(); ?>dispute-bills-logo.svg" width="240" height="64" />-->
 
<svg style="margin-top:4px; margin-right:20px;" role="img" aria-label="[title + description]" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="220.5" height="32" viewBox="0 0 882 128">
  <title>Dispute Bills</title>
  <desc>Medical Billing Advocates</desc>
  <g id="icomoon-ignore"></g>
  <path fill="#0097DB" d="M112.633 76.604h-17.302l-5.76-13.218h-15.026l-6.649-15.258h15.026l-5.76-13.218h17.301l5.76 13.218h15.026l6.649 15.258h-15.025l5.76 13.218zM152.991 75.293l-32.809-75.295h-99.781l49.215 112.942h99.781l-16.405-37.647z"/>
  <path fill="#0097DB" d="M257.206 54.483c0-11.109-2.739-19.52-8.212-25.233s-13.744-8.571-24.815-8.571h-14.334v68.502h11.884c23.65 0 35.476-11.565 35.476-34.699zM268.793 54.125c0 14.414-3.932 25.433-11.795 33.057s-19.142 11.437-33.834 11.437h-24.307v-87.316h26.876c13.577 0 24.148 3.733 31.712 11.198 7.566 7.465 11.348 18.007 11.348 31.624z"/>
  <path fill="#0097DB" d="M297.401 98.619h-10.751v-65.577h10.751v65.577zM285.814 15.305c0-2.389 0.606-4.122 1.821-5.196 1.216-1.075 2.718-1.613 4.511-1.613 1.673 0 3.134 0.538 4.389 1.613s1.882 2.807 1.882 5.196c0 2.35-0.628 4.082-1.882 5.195-1.255 1.114-2.716 1.673-4.389 1.673-1.792 0-3.295-0.558-4.511-1.673s-1.821-2.845-1.821-5.195z"/>
  <path fill="#0097DB" d="M360.886 80.522c0 6.13-2.292 10.879-6.868 14.245-4.578 3.365-11.012 5.046-19.291 5.046-8.64 0-15.508-1.373-20.606-4.121v-9.794c7.207 3.503 14.156 5.256 20.845 5.256 5.414 0 9.355-0.876 11.825-2.628 2.469-1.753 3.703-4.1 3.703-7.048 0-2.589-1.187-4.778-3.555-6.569s-6.578-3.844-12.63-6.151c-6.172-2.39-10.512-4.429-13.020-6.122s-4.352-3.593-5.524-5.703c-1.175-2.111-1.762-4.679-1.762-7.705 0-5.375 2.188-9.615 6.568-12.721 4.383-3.106 10.394-4.658 18.037-4.658 7.445 0 14.415 1.472 20.904 4.42l-3.642 8.541c-6.652-2.786-12.641-4.181-17.978-4.181-4.458 0-7.845 0.708-10.153 2.12s-3.465 3.353-3.465 5.823c0 2.389 0.995 4.369 2.987 5.943 1.99 1.574 6.629 3.754 13.916 6.539 5.455 2.031 9.486 3.922 12.092 5.674 2.608 1.753 4.531 3.724 5.765 5.913s1.852 4.817 1.852 7.884z"/>
  <path fill="#0097DB" d="M406.036 40.866c-6.489 0-11.177 1.831-14.065 5.495s-4.368 9.415-4.45 17.26v2.091c0 8.877 1.473 15.298 4.419 19.261 2.949 3.962 7.727 5.942 14.334 5.942 5.495 0 9.786-2.231 12.871-6.689 3.083-4.459 4.629-10.669 4.629-18.633 0-8.003-1.546-14.124-4.629-18.365-3.085-4.241-7.458-6.361-13.11-6.361zM407.829 99.813c-8.801 0-15.567-3.166-20.306-9.496h-0.716l0.239 2.449c0.318 3.106 0.478 5.874 0.478 8.302v26.934h-10.751v-94.96h8.84l1.433 8.959h0.478c2.547-3.584 5.493-6.172 8.84-7.764 3.344-1.592 7.205-2.389 11.585-2.389 8.52 0 15.141 2.956 19.857 8.869 4.719 5.913 7.078 14.244 7.078 24.994 0 10.712-2.367 19.072-7.107 25.084-4.739 6.011-11.387 9.018-19.947 9.018z"/>
  <path fill="#0097DB" d="M462.177 33.042v42.225c0 5.294 1.185 9.227 3.553 11.795s6.042 3.853 11.020 3.853c6.727 0 11.625-1.873 14.69-5.614 3.067-3.742 4.601-9.774 4.601-18.096v-34.162h10.81v65.577h-8.84l-1.552-8.66h-0.538c-1.949 3.145-4.719 5.575-8.302 7.286s-7.743 2.568-12.481 2.568c-7.884 0-13.826-1.89-17.827-5.674-4.003-3.783-6.003-9.832-6.003-18.155v-42.942h10.871z"/>
  <path fill="#0097DB" d="M549.55 91.034c1.395 0 3.026-0.141 4.898-0.418s3.285-0.597 4.24-0.956v8.242c-0.994 0.439-2.537 0.866-4.627 1.284s-4.211 0.627-6.362 0.627c-12.818 0-19.229-6.748-19.229-20.246v-38.163h-9.258v-5.136l9.376-4.3 4.301-13.976h6.391v15.050h18.932v8.362h-18.932v37.864c0 3.784 0.905 6.689 2.716 8.719 1.813 2.030 4.332 3.046 7.555 3.046z"/>
  <path fill="#0097DB" d="M596.972 40.628c-5.137 0-9.198 1.651-12.184 4.957s-4.758 7.905-5.314 13.797h33.383c-0.080-6.13-1.493-10.789-4.24-13.975s-6.629-4.778-11.646-4.778zM599.66 99.813c-9.833 0-17.55-2.978-23.142-8.928s-8.391-14.145-8.391-24.576c0-10.512 2.606-18.882 7.825-25.114 5.216-6.232 12.264-9.347 21.14-9.347 8.243 0 14.813 2.658 19.709 7.973 4.898 5.315 7.347 12.513 7.347 21.59v6.51h-44.913c0.2 7.444 2.090 13.1 5.675 16.961 3.583 3.861 8.658 5.793 15.229 5.793 3.504 0 6.829-0.308 9.973-0.926s6.829-1.822 11.048-3.614v9.436c-3.622 1.552-7.025 2.648-10.212 3.284-3.185 0.636-6.95 0.956-11.287 0.956z"/>
  <path fill="#0097DB" d="M659.86 60.575v22.754h12.063c5.098 0 8.86-0.977 11.287-2.927 2.429-1.95 3.644-4.937 3.644-8.958 0-7.247-5.175-10.869-15.528-10.869h-11.466zM659.86 45.883h10.749c5.019 0 8.652-0.777 10.9-2.33 2.249-1.553 3.375-4.121 3.375-7.704 0-3.345-1.223-5.743-3.673-7.197s-6.321-2.18-11.615-2.18h-9.735v19.41zM641.347 11.303h27.172c12.384 0 21.373 1.762 26.966 5.286s8.391 9.128 8.391 16.811c0 5.216-1.226 9.496-3.675 12.84-2.447 3.345-5.701 5.354-9.763 6.032v0.597c5.532 1.233 9.525 3.545 11.974 6.928s3.673 7.884 3.673 13.498c0 7.964-2.875 14.175-8.63 18.633s-13.564 6.689-23.44 6.689h-32.668v-87.316z"/>
  <path fill="#0097DB" d="M740.307 98.619h-18.216v-66.771h18.216v66.771zM721.316 14.588c0-5.933 3.305-8.899 9.912-8.899 6.609 0 9.914 2.966 9.914 8.899 0 2.828-0.826 5.026-2.478 6.599s-4.13 2.359-7.437 2.359c-6.607 0-9.912-2.986-9.912-8.958z"/>
  <path fill="#0097DB" d="M759.418 98.619h18.217v-92.929h-18.217v92.929z"/>
  <path fill="#0097DB" d="M796.745 98.619h18.217v-92.929h-18.217v92.929z"/>
  <path fill="#0097DB" d="M880.656 78.791c0 6.846-2.38 12.064-7.137 15.647-4.756 3.584-11.876 5.375-21.351 5.375-4.86 0-8.997-0.329-12.423-0.986s-6.629-1.622-9.614-2.896v-15.050c3.383 1.592 7.196 2.926 11.436 4.001 4.242 1.076 7.973 1.612 11.199 1.612 6.607 0 9.914-1.911 9.914-5.733 0-1.434-0.441-2.598-1.316-3.494s-2.388-1.912-4.54-3.046c-2.149-1.135-5.017-2.457-8.599-3.972-5.137-2.15-8.907-4.142-11.318-5.972s-4.16-3.933-5.255-6.301c-1.097-2.368-1.644-5.285-1.644-8.749 0-5.933 2.3-10.52 6.899-13.766s11.118-4.868 19.56-4.868c8.041 0 15.865 1.753 23.471 5.256l-5.495 13.138c-3.344-1.433-6.47-2.607-9.376-3.523-2.906-0.917-5.873-1.374-8.899-1.374-5.375 0-8.063 1.455-8.063 4.361 0 1.633 0.867 3.045 2.598 4.24 1.733 1.194 5.524 2.965 11.379 5.315 5.216 2.111 9.037 4.082 11.466 5.912 2.427 1.831 4.219 3.942 5.375 6.331s1.731 5.235 1.731 8.541z"/>
  <path fill="#0097DB" d="M25.024 30.993l-18.58 2.982 53.836 77.925-35.257-80.907z"/>
  <path fill="#0097DB" d="M16.264 62.511l-15.295 5.961 49.951 44.202-34.656-50.163z"/>
</svg>

            </a>

                <p class="navbar-btn hideonbig hidden-xxs">
                  <a href="/get-started/" class="btn btn-callout btn-lg">
                    <span class="" itemprop="name">Start Saving <span class="hidden-xs">Today</span></span>
                  </a>
                </p>

          </div>




          <div id="navbar3" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li>
                <a href="/medical-billing-advocate/" itemprop="url">
                  <span itemprop="name">Dispute My Medical Bill</span>
                </a>
              </li>
              <li>
                  <a itemprop="url" href="/savings-card/">
                    <span itemprop="name">CleanBill Savings Card</span>
                  </a>
                </li>
              <li class="navbar-right hideonsm">
                <p class="navbar-btn">
                  <a href="/get-started/" class="btn btn-callout btn-lg">
                    <span itemprop="name">Start Saving Today!</span>
                  </a>
                </p>
              </li>

            </ul>
          </div>






        </div>
        <?php tha_header_bottom(); ?>
      </nav>
    </header>
    <?php tha_header_after(); ?>
    <?php tha_content_before(); ?>
    <main id="main" class="site-main wrap" role="main">
    <?php tha_content_top(); ?>
