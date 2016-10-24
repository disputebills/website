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
    <?php tha_head_top(); ?>
    <meta charset="UTF-8">
    <meta http-equiv=X-UA-Compatible content="IE=edge"/>
    <meta http-equiv="Accept-CH" content="DPR, Viewport-Width, Width">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href='https://fonts.googleapis.com/css?family=Noto+Sans:400,700' rel='stylesheet' type='text/css'>
    <?php tha_head_bottom(); ?>
    <?php wp_head(); ?>
  

<link rel='stylesheet' href='http://bootstraptheme.me/bs336/css/bootstrap.min.css'>
<link href='https://fonts.googleapis.com/css?family=Noto+Sans:400,400italic,700,700italic' rel='stylesheet'>
<link href='https://rawgit.com/bryanwillis/cecf3c8e841154c9915819bcb891f6e2/raw/8bc61843bc498b6e51f3de414cff58658302d31d/main.css' rel='stylesheet'>
<link href='https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css' rel='stylesheet' type='text/css'>
<style>
.button-white-base,.button-blue-base,.button-white-outline,a,body,h1,h2,h3,h4,h5,h6,li{ font-family: "Noto Sans",sans-serif;}
@media screen and (min-width:768px){
  .jumbotron .h1,.jumbotron h1{font-size:70px}
}
.jumbotron {
  background: url(http://disputebills.com/assets/uploads/clean-bill-savings-card.jpg) no-repeat center;
  background-size: cover;
}
.fa {
  font-family: FontAwesome!important;
 
}
.jumbotron:after {
  background: linear-gradient(to right, rgba(0, 0, 0, 0.68),rgba(0, 0, 0, 0));
  content: "";
  display: block;
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  opacity: .4;
  z-index: -1;
}
.how-it-works img {
  max-width: 100%;
  height: auto;
  width: 160px;
  display: flex;
  margin-left: auto;
  margin-right: auto;
}
</style> 




    <link rel='stylesheet' href='<?php echo get_stylesheet_directory_uri(); ?>/theme.css'>
    <link rel='stylesheet' href='https://rawgit.com/pguso/jquery-plugin-circliful/master/css/jquery.circliful.css'>
    <link href='https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/spacing.css">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/flexbox.css">
    <!-- Owl-carousel CSS -->
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/owl.carousel.css">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/owl.theme.css">
    <!--Magnific-popup CSS-->
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/magnific-popup.css">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/fonts/brandon-text/style.css">

    <style>

      @font-face {
          font-family: brandon_grotesqueregular;
          src: url(http://bootstraptheme.me/fonts/brandon-grotesque/brandon-grotesque-regular-webfont.eot);
          src: url(http://bootstraptheme.me/fonts/brandon-grotesque/brandon-grotesque-regular-webfont.eot?#iefix) format('embedded-opentype'), url(http://bootstraptheme.me/fonts/brandon-grotesque/brandon-grotesque-regular-webfont.woff2) format('woff2'), url(http://bootstraptheme.me/fonts/brandon-grotesque/brandon-grotesque-regular-webfont.woff) format('woff'), url(http://bootstraptheme.me/fonts/brandon-grotesque/brandon-grotesque-regular-webfont.ttf) format('truetype'), url(http://bootstraptheme.me/fonts/brandon-grotesque/brandon-grotesque-regular-webfont.svg#brandon_grotesqueregular) format('svg');
          font-weight: 400;
          font-style: normal
      }
      .button-white-base,
      .button-blue-base,
      .button-white-outline,
      a,
      body,
      h1,
      h2,
      h3,
      h4,
      h5,
      h6,
      li {
          font-family: brandon_grotesqueregular
      }
      @media screen and (min-width: 768px) {
          .jumbotron .h1,
          .jumbotron h1 {
              font-size: 70px
          }
      }
      .button-white-base,
      .button-blue-base,
      .button-white-outline,
      a,
      body,
      h1,
      h2,
      h3,
      h4,
      h5,
      h6,
      li {
          font-family: "brandon_grotesqueregular" !important;
      }
      .featured-on-logos {
          display: none;
      }
      @media screen and (min-width: 33em) {
          .page-header {
              height: 607px!important;
          }
          .header-text {
              padding-bottom: 115px!important;
          }
          .featured-on-logos {
              display: block;
              width: 100%;
              position: absolute;
              bottom: 0;
              z-index: 999;
              background-color: rgba(179, 179, 179, 0.37);
              vertical-align: middle;
              display: table;
              padding: 25px 0;
              left: 0;
              right: 0;
              background-color: rgba(65, 64, 66, 0.5);
          }
          .featured-on-logos > img {
              display: table-cell;
              vertical-align: middle;
              -webkit-filter: grayscale(1);
              filter: grayscale(1);
              opacity: 0.6;
              max-width: 68em;
              margin: 0 auto;
              padding: 0 1.33333rem;
          }
      }
      .jumbotron {
          height: 575px;
      }
      @media screen and (min-width: 768px) {
          .jumbotron .h1,
          .jumbotron h1 {
              font-size: 80px;
          }
          .jumbotron p {
              margin-bottom: 46px;
              font-size: 30px;
              font-weight: 200;
          }
      }
      .fa {
          font-family: FontAwesome!important;
      }
      .checkmark li {
          margin-bottom: 19px;
      }
      .checkmark i.fa.fa-check {
          margin-right: 14px;
          color: #53b500;
      }
      .learn-more-link {
          font-size: .9rem;
          letter-spacing: 1px;
          font-weight: 700;
          padding-top: 7px;
          display: block;
      }
      .navbar-default {
          background-color: #ffffff;
          border-color: #e7e7e7;
      }
      .features-container {
          padding-top: 70px;
          padding-bottom: 70px;
      }
      @media screen and (min-width: 45em) {
          h2 {
              font-size: 54px;
          }
      }
      .facts-container {
          padding-top: 40px;
          padding-bottom: 40px;
      }
      .image-content-blocks .text-block {
          padding-top: 50px;
          padding-bottom: 60px;
      }
      /* Flexbox Equal Height Bootstrap Columns (fully responsive) */
      
      @media only screen and (min-width: 481px) {
          .flex-row.row {
              display: flex;
              flex-wrap: wrap;
          }
          .flex-row.row > [class*='col-'] {
              display: flex;
              flex-direction: column;
              flex-grow: 1;
          }
          .flex-row.row:after,
          .flex-row.row:before {
              display: flex;
          }
      }
      /* Grow thumbnails to fill columns height */
      
      .flex-row .thumbnail,
      .flex-row .caption {
          display: flex;
          flex: 1 0 auto;
          flex-direction: column;
      }
      /* Flex Grow Text Container */
      
      .flex-row .caption p.flex-text {
          flex-grow: 1;
      }
      /* Flex Responsive Image */
      
      .flex-row img {
          width: 100%;
          height: auto;
      }
      .btn-callout {
          color: #fff;
          background: #ff8400;
          border-color: #ff8400;
          font-size: 16px;
          border-radius: 3px;
          text-transform: capitalize;
          letter-spacing: 1px;
          font-size: 18px;
          font-weight: 700;
      }
      .navbar-default .navbar-nav>li>a {
          color: #0082c9 !important;
      }
      a {
          color: inherit;
          -webkit-transition: all .5s ease-out;
          -moz-transition: all .5s ease-out;
          transition: all .5s ease-out;
      }
      .arrow_box-top {
          position: relative;
          background: #fff;
          border: 2px solid #fff;
          position: absolute;
          left: 100px;
      }
      .arrow_box-top:after,
      .arrow_box-top:before {
          bottom: 100%;
          left: 50%;
          border: solid transparent;
          content: " ";
          height: 0;
          width: 0;
          position: absolute;
          pointer-events: none;
      }
      .arrow_box-top:after {
          border-color: rgba(255, 255, 255, 0);
          border-bottom-color: #fff;
          border-width: 7px;
          margin-left: -7px;
      }
      .arrow_box-top:before {
          border-color: rgba(255, 255, 255, 0);
          border-bottom-color: #fff;
          border-width: 8px;
          margin-left: -8px;
      }
      .tagline {
          background: #f6f6f6;
          font-size: 13px;
          color: #2d2e2e;
      }
      .email,
      .phone {
          display: inline-block;
          vertical-align: top;
          margin-right: 20px;
          padding: 11px 0;
          font-size: 15px;
      }
      .tagline .pull-left i {
          font-weight: 400;
          display: inline-block;
          margin-right: 5px;
      }
      .email a {
          transition: all 300ms;
          -webkit-transition: all 300ms;
      }
      .email a:hover {
          color: #1dc6df;
      }
      .top_socials {
          margin: 0 12px;
      }
      .top_socials li {
          width: 30px;
          display: inline-block;
          vertical-align: top;
          margin-right: 0;
          padding: 0;
      }
      .top_socials a {
          display: block;
          line-height: 40px;
          transition: all 300ms;
          -webkit-transition: all 300ms;
          text-align: center;
          background-color: transparent;
          font-size: 16px;
          font-weight: 400;
      }
      .tagline {
          background: #0f92cd;
          color: #fff;
      }
      .target-audience-link.list-inline {
          margin-bottom: 0;
      }
      .target-audience-link.list-inline li > a {
          padding-top: 6px;
          padding-bottom: 6px;
          display: inline-block;
          text-transform: uppercase;
          font-size: 13px;
          text-transform: uppercase;
          font-weight: 700;
          letter-spacing: 2px;
          color: #fff;
      }
      .email,
      .phone {
          padding: 6px 0;
          font-size: 15px;
          font-weight: bold;
          margin-right: 0;
      }
      span.link-seperator {
          line-height: 32px;
      }
      .navbar-default {
          margin-top: 34px;
      }
      .modal {
          padding-right: 0 !important;
      }
      #modal-google-map .modal-dialog {
          width: 90%;
      }
      @media (min-width: 768px) {
          #modal-google-map .modal-dialog {
              width: 90%;
          }
      }
      .modal .modal-dialog {
          margin: 70px auto;
      }
      .modal .modal-content {
          border-radius: 3px;
      }
      @media (min-width: 768px) {
          .modal button.close {
              right: 0;
          }
      }
      .modal button.close {
          position: absolute;
          top: -33px;
          right: 15px;
          font-size: 30px;
          color: #fff;
          opacity: .9;
          text-shadow: none;
          transition: all 0.3s ease-in-out;
          font-weight: 800;
      }
      #modal-google-map .modal-body {
          padding: 0;
      }
      #map-canvas {
          width: 100%;
          margin: 0px;
          padding: 0px;
          height: 640px;
          height: 80vh;
      }
      .map-address,
      .map-address ~ a {
          margin-left: 20px;
      }
      /*
      .navbar-autocollapse.collapsed .navbar-header {
          float: none;
      }
      .navbar-autocollapse.collapsed .navbar-left,
      .navbar-right {
          float: none !important;
      }
      .navbar-autocollapse.collapsed .navbar-toggle {
          display: block;
      }
      .navbar-autocollapse.collapsed .navbar-fixed-top {
          top: 0;
          border-width: 0 0 1px;
      }
      .navbar-autocollapse.collapsed .navbar-collapse.collapse {
          display: none!important;
      }
      .navbar-autocollapse.collapsed .navbar-nav {
          float: none!important;
          margin-top: 7.5px;
      }
      .navbar-autocollapse.collapsed .navbar-nav>li {
          float: none;
      }
      .navbar-autocollapse.collapsed .navbar-nav>li>a {
          padding-top: 10px;
          padding-bottom: 10px;
      }
      .navbar-autocollapse.collapsed .collapse.in {
          display: block !important;
      }
      */
      .circle {
          margin: 0 auto;
          display: inline-block;
      }
      @media only screen and (min-width: 768px) {
          /*
          .flex-row.row {
              align-items: center;
          }
          */
      }
      .facts-container p {
          color: #505050;
      }
      @media only screen and (min-width: 1200px) {
          .facts-container li p {
              font-size: 19px;
          }
      }
      .facts-container {
          padding-top: 20px;
      }
      .facts-container li p {
          color: #4a4a4a;
      }
      .site-footer .footer-nav a {
          color: #1d1d1d;
      }
      .site-footer .footer-nav li {
          line-height: 1.6;
          font-size: 16px;
      }
      .jumbotron {
          height: 550px;
      }
      .arrow_box {
          position: relative;
          z-index: 99;
      }
      .arrow_box:after,
      .arrow_box:before {
          top: 100%;
          left: 50%;
          border: solid transparent;
          content: " ";
          height: 0;
          width: 0;
          position: absolute;
          pointer-events: none;
          z-index: 99999;
          margin-top: -3px;
      }
      .arrow_box:after {
          border-color: rgba(255, 255, 255, 0);
          border-top-color: rgba(15, 146, 205, 0);
          border-width: 14px;
          margin-left: -14px;
      }
      .arrow_box:before {
          border-color: rgba(255, 255, 255, 0);
          border-top-color: rgba(255, 255, 255, 0);
          border-width: 18px;
          margin-left: -18px;
      }
      .arrow_box.active:before {
          border-color: rgba(255, 255, 255, 0);
          border-top-color: #ffffff;
      }
      .arrow_box.active:after {
          border-color: rgba(255, 255, 255, 0);
          border-top-color: #ffffff;
      }
      .nav-pills>li>a {
          padding: 24px 34px;
      }
      .service-tabs .nav.nav-pills {
          display: flex;
          justify-content: center;
          z-index: 99999999999;
          padding: 60px 0;
      }
      .service-tabs .nav-pills>li>a {
          font-size: 26px;
          padding: 30px 30px;
          background: rgba(255, 255, 255, 0);
          color: #fff;
          border: 3px solid #fff;
      }
      .services-intro-header {
          background-color: #0f92cd;
          position: relative;
          display: block;
          text-align: center;
          padding-top: 60px;
      }
      .service-tabs .nav-pills>li.active>a,
      .nav-pills>li.active>a:focus,
      .nav-pills>li.active>a:hover {
          background: #fff;
          color: #337ab7;
      }
      .navbar-default .navbar-nav>li>a {
          color: #0082c9;
      }
      .button-blue-base {
          background: #009cde;
          color: #fff;
          text-transform: capitalize;
          width: 180px;
          font-size: 16px;
          border-radius: 3px;
      }
      .navbar-btn {
          margin-top: 10px;
      }
      .button-white-base {
          background: #fff;
          border: 1px solid #fff;
          color: #0f92cd;
          border-radius: 3px;
          font-size: 1.2rem;
          width: 200px;
          text-transform: capitalize;
      }
      .button-white-outline {
          border-radius: 3px;
          font-size: 1.2rem;
          letter-spacing: 1px;
          width: 200px;
          text-transform: capitalize;
      }
      .testimonials {
          background-color: #f7f9fa;
      }
      .example3 .nav >li >a {
          padding: 10px 12px;
          padding-top: 24px;
          padding-bottom: 20px;
      }
      .service-nav-li a strong {
          margin-bottom: 10px;
          display: block;
      }
      .flex-row.nav-pills>li+li {
          margin: 0px !important;
      }
      .service-nav-li>a p {
          color: #fff;
          font-size: 22px;
      }
      .service-tabs .nav-pills>li>a p {
          color: #fff;
      }
      .service-tabs .nav-pills>li.active>a,
      .service-tabs .nav-pills>li.active>a p,
      .nav-pills>li.active>a:focus,
      .nav-pills>li.active>a:focus p,
      .nav-pills>li.active>a:hover,
      .nav-pills>li.active>a:hover p {
          color: #337ab7;
      }
      .service-tabs .service-intro h2 {
          font-size: 62px
      }
      .navbar-default .navbar-nav>li>a {
          color: #0c6793;
      }
      /*gradient*/
      
      .button-blue-base {
          color: #fff;
          background-color: #3093c7;
          background-image: -webkit-gradient(linear, left top, left bottom, from(#3093c7), to(#1c5a85));
          background-image: -webkit-linear-gradient(top, #3093c7, #1c5a85);
          background-image: -moz-linear-gradient(top, #3093c7, #1c5a85);
          background-image: -ms-linear-gradient(top, #3093c7, #1c5a85);
          background-image: -o-linear-gradient(top, #3093c7, #1c5a85);
          background-image: linear-gradient(to bottom, #1e93cb, #1576a5);
          filter: progid: DXImageTransform.Microsoft.gradient(GradientType=0, startColorstr=#3093c7, endColorstr=#1c5a85);
      }
      .service-tabs .nav.nav-pills {
          display: block;
      }
      @media only screen and (max-width: 767px) {
          .flex-row li:first-child {
              margin-bottom: 20px;
          }
          .flex-row li.arrow_box.active:before,
          .flex-row li.arrow_box.active:after {
              display: none;
          }
      }
      @media only screen and (max-width: 480px) {
          .flex-row li {
              width: 100%;
          }
      }
      .owl-theme .owl-controls {
          margin-top: 10px;
          text-align: center;
          position: absolute;
          left: 0;
          top: 40%;
      }
      .owl-page {
          display: block;
      }
      .owl-theme .owl-controls .owl-page span {
          display: block;
          width: 20px;
          height: 20px;
          background: #0f92cd;
      }
      .owl-theme .owl-controls .owl-page.active span {
          background: #0f92cd;
      }
      .owl-theme .owl-controls .owl-page {
          display: block;
      }
      #home {
          z-index: 0;
      }
      .testimonials {
          padding: 0;
          background: #f0f7fd;
      }
      .owl-carousel .owl-wrapper-outer {
          left: 0;
          right: 0;
          margin: 0 auto;
      }
      .no-pad {
          padding: 0!important;
      }
      .text-left {
          text-align: left;
          -moz-text-align-last: left;
          text-align-last: left;
      }
      .bg-primary {
          background-color: #1E93CB
      }
      .text-primary {
          color: #1E93CB
      }
      .bg-primary-soft {
          background-color: #f0f7fd
      }
      .text-primary-soft {
          color: #f0f7fd
      }
      .bg-primary-hard {
          background-color: #0C6793
      }
      .text-primary-hard {
          color: #0C6793
      }
      .bg-primary-dark {
          background-color: #4C637b;
      }
      .text-primary-dark {
          color: #4C637b;
      }
      .bg-gray-soft {
          background-color: #F2F6FA;
      }
      .text-gray-soft {
          color: #F2F6FA;
      }
      .bg-gray-hard {
          background-color: #9B9B9B;
      }
      .text-gray-hard {
          color: #9B9B9B;
      }
      .text-info {
          color: #58B419;
      }
      .single-testimonial p {
          font-size: 18px;
          line-height: 32px;
          color: #000;
      }
      .single-testimonial h3,
      .single-testimonial .h3 {
          font-weight: 300;
      }
      footer.site-footer h3 {
          font-size: 15px;
          text-transform: uppercase;
          font-weight: 700;
      }
      .featured-on-logos {} .example3 .nav >li >a {
          padding: 29px 12px;
          padding-top: 38px;
          padding-bottom: 33px;
          font-size: 16px;
          color: #089de3 !important;
      }
      .navbar-brand>img {
          width: auto;
          height: 90px;
          padding: 30px 29px 26px 29px;
      }
      .navbar-default {
          margin-top: 0px;
      }
      main#main {
          margin-top: 0px;
      }
      p.navbar-btn.hidden-xs {
          margin-top: 25px;
      }
      .tagline {
          background: #089de3;
          color: #fff;
      }
      .email,
      .phone {
          padding: 6px 0;
          font-size: 15px;
          font-weight: bold;
          margin-right: 0;
          font-weight: 700;
          font-family: brandon_grotesqueregular;
      }
      .email a,
      .phone a {
          transition: all 300ms;
          -webkit-transition: all 300ms;
          font-weight: 700;
          font-family: brandon_grotesqueregular;
      }
      span.link-seperator {
          line-height: 32px;
          font-weight: 700;
          font-family: brandon_grotesqueregular;
          margin-left: 10px;
          margin-right: 10px;
      }
      .blue-bright-bg {
          background-color: #089de3;
          /* background-image: radial-gradient(circle farthest-side at center bottom, #1e93cb, #0c6793 125%); */
      }
      .callout {
          background-color: #009cde;
          /* background-image: radial-gradient(circle farthest-side at left bottom, #1e93cb, #0c6793 116%); */
      }
      .testimonials {
          background: #ecf6fb;
      }
      h5 {
          font-size: 22px;
      }
      .image-block {
          right: 0;
      }
      .btn-callout:hover {
          color: #fff;
      }
      .service-tabs .nav-pills>li.active>a,
      .service-tabs .nav-pills>li.active>a p,
      .nav-pills>li.active>a:focus,
      .nav-pills>li.active>a:focus p,
      .nav-pills>li.active>a:hover,
      .nav-pills>li.active>a:hover p {
          color: #089de3;
      }
      h2 {
          color: #4c4c4c;
      }
      .features-container .subheader {
          font-size: 22px;
      }
      #medical-billing-negotiation {
          overflow-x: hidden;
      }
      .jumbotron {
          height: 500px;
      }
      .tagline a:hover {
          color: #fff;
      }
      .jumbotron {
          height: 570px;
      }
      .featured-in {
          border-top: 1px solid #eee;
          background: #eee;
          background: url(https://static.ehealthmedicareplans.com/muse/v2/apps/images/census_pattern_1.png) repeat scroll 0 0 #eee;
      }
      .thumbnail {
        margin-bottom: 0;
      }
      @media screen and (min-width: 768px) {
      .jumbotron p {
        margin-bottom: 46px;
        font-size: 36px!important;
        font-weight: 200;
      }
.jumbotron .h1, .jumbotron h1 {
  font-size: 86px;
}

      }

      section#bgfbox-clean-bill-features {
  background: #fbfbfb;
}
      </style>






      
    <!--[if lt IE 9]><script type="text/javascript">window.html5={shivCSS:!1};</script><script src="https://cdn.jsdelivr.net/g/html5shiv@3.7.3,respond@1.4.2"></script><![endif]-->


</head>

<body itemscope="" itemtype="http://schema.org/WebPage"><link itemprop="isPartOf" href="#WebSite"><div id="page" class="hfeed site">


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
              <li><a href="javascript:void(0);">For Individuals</a></li>
              <div class="arrow_box-top"></div>
              <li><a href="javascript:void(0);">For Businesses</a></li>
            </ul>
          </div>
          <div class="pull-right">
            <div class="email"><a href="javascript:void(0);">Office Hours: 9AM–5:30PM</a></div>
            <span class="link-seperator"> | </span>
            <div class="phone"><a href="tel:+18886222809">1 (888) 622-2809</a></div>
          </div>
          <div class="clear"></div>
        </div>
      </div>
      <nav itemscope="" itemtype="http://schema.org/SiteNavigationElement" aria-label="Main navigation" class="navbar navbar-static-top navbar-default navbar-autocollapse">
        <div class="container-fluid max-lg">
          <div class="navbar-header" itemscope="" itemtype="http://schema.org/Organization">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar3">
            <span class="sr-only">Toggle navigation</span> 
            <span class="icon-bar"></span> 
            <span class="icon-bar"></span> 
            <span class="icon-bar"></span>
            </button>
            <a itemprop="url" title="Dispute Bills, Chicago" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="navbar-brand">
            <img itemprop="logo" alt="Dispute Bills, Chicago, IL" src="<?php echo get_template_directory_uri(); ?>/assets/images/dispute-bills-logo.png" width="240" height="64" />
            </a>
          </div>
          <div id="navbar3" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-left">
              <li>
                <a href="http://disputebils16.staging.wpengine.com/home-alt-2/" itemprop="url">Alternate</a>

              </li>
              <li><a href="http://disputebills.com/how-it-works/" itemprop="url"><span itemprop="name">How it Works</span></a></li>
              <li class="hide-collapse"><a href="http://disputebills.com/about/" itemprop="url"><span itemprop="name">Medical Bill Advocate</span></a></li>
              <li><a itemprop="url" href="/savings-card/"><span itemprop="name">CleanBill Savings Card</span></a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li>
                <a class="visible-xs-block" href="https://app.disputebills.com/clients/sign_up/" itemprop="url">Start Saving Today!</a>
                <p class="navbar-btn hidden-xs"><a href="http://disputebills.com/how-it-works/" class=" btn btn-callout btn-lg">Start Saving Today!</a></p>
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