<?php /* Template Name: Choose Savings */ ?>
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
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/magnific-popup.css">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/hover.css">

    <!--[if lt IE 9]><script type="text/javascript">window.html5={shivCSS:!1};</script><script src="https://cdn.jsdelivr.net/g/html5shiv@3.7.3,respond@1.4.2"></script><![endif]-->
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
<style>

html {
  background: #2e9fff!important;
  margin-top: 0px!important;
}
body {
  background: #2e9fff;
  height: 100vh;  
}
.chose-service-box {
  height: 200px;
  background-color: #fff;
  border: 1px solid #ddd;
  border-radius: 3px;
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  width: 100%;
  -webkit-box-pack: center;
  -webkit-justify-content: center;
      -ms-flex-pack: center;
          justify-content: center;
  -webkit-box-align: center;
  -webkit-align-items: center;
      -ms-flex-align: center;
          align-items: center;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -webkit-flex-direction: column;
      -ms-flex-direction: column;
          flex-direction: column;
  max-width: 350px;
  padding: 6px;
}
h4 {
  font-weight: 700;
  color: #2e9fff;
}
i.dispute-eye2.service-icon.category-icon {
  color: #2e9fff;
  margin-bottom: 20px;
  font-size: 60px;
}
h3 {
  color: #fff;
}
a:active, a:focus {
  outline: 0;
  text-decoration: none;
  border-bottom: none;
}
.choose-service-box a {
  width: 100%;
  text-align: center;
  height: 100%;
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -webkit-flex-direction: column;
      -ms-flex-direction: column;
          flex-direction: column;
  -webkit-box-pack: center;
  -webkit-justify-content: center;
      -ms-flex-pack: center;
          justify-content: center;
}
.headline-cell {
  text-align: center; 
  -webkit-box-pack: center; 
  -webkit-justify-content: center; 
      -ms-flex-pack: center; 
          justify-content: center;
}
.headline-cell h3 {
  font-size: 36px; 
  text-align: center; 
  -webkit-box-pack: center; 
  -webkit-justify-content: center; 
      -ms-flex-pack: center; 
          justify-content: center; 
  font-weight: 600; 
  margin-bottom: 20px;
}
.service-box-cell {
  -webkit-box-pack: center;
  -webkit-justify-content: center;
      -ms-flex-pack: center;
          justify-content: center;
}
.category-icon {
  color: #2e9fff;
  margin-bottom: 20px;
  font-size: 60px;
}
.navbar-brand {
  display: block;
  text-align: center;
  margin: 0 auto;
  width: 100%; 
  margin: 0 auto;
  margin-top: 20px;
}
.navbar-brand > img {
  margin: 0 auto;
}
</style>
<div class="container mt-70">
    <div class="grid-center-middle-equalHeight">
        <div class="cell-12 headline-cell hvr-g">
            <h3>How can we help you today?</h3>
        </div>
    </div>
    <div class="grid-center-middle-equalHeight">
        <div class="cell-12_xs-10_sm-8_md-6_lg-4_xl-4 mb-20 service-box-cell">
            <div class="chose-service-box hvr-grow">
                <a class="text-center" href="https://disputebills.com/checkout/">
                    <div>
                        <i class="lnr lnr-profile service-icon category-icon"></i>
                    </div>
                    <h4>I want a health care savings card</h4>
                </a>
            </div>
        </div>
    </div>
    <div class="grid-noBottom-center-middle-equalHeight text-center">
        <div class="cell-12_xs-10_sm-8_md-6_lg-4_xl-4 service-box-cell">
            <div class="chose-service-box hvr-grow">
                <a class="text-center" href="https://app.disputebills.com/clients/sign_up">
                    <div>
                        <i class="dispute-i-medical-library service-icon category-icon"></i>
                    </div>
                    <h4>I want to dispute an existing bill</h4>
                </a>
            </div>
        </div>
    </div>
    <div class="grid-noBottom-center-middle text-center">
        <div class="cell-12_sm-4">
            <a itemprop="url" title="Dispute Bills, Chicago" href="https://disputebills.com/" rel="home" class="navbar-brand">
                <img alt="Dispute Bills Logo" class="logo" src="https://disputebills.com/assets/uploads/dispute-bills-logo-1.png">
            </a>
        </div>
    </div>
</div>
<?php wp_footer(); ?>
</body>