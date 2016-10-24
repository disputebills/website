<?php /* Template Name: Orginizations */ ?>
<?php add_action('db_disclosures', 'new_benefits_feed'); ?>
<?php get_header(); ?>


<style>
.arrow_box-top {
  left: 230px!important;
}
.gform_wrapper input:not([type=radio]):not([type=checkbox]):not([type=submit]):not([type=button]):not([type=image]):not([type=file]) {

   text-indent: 10px; 
   font-size: 18px;
}

button#gform_submit_button_14 {
  width: 200px;
  border-radius: 2px;
  color: #fff;
  background: #f18605;
  border-color: #f18605;
  padding: 10px;
  font-size: 20px;
  text-transform: capitalize;
  font-family: 'brandon-text-medium';
}

#gform_14 .gform_footer {
  text-align: center;
}

span.element {
  border-bottom: 3px solid #089de3;
}

.header-text .header-links {
  margin-top: 5rem;
}

.site-policy .modal-body p {
  font-size: 19px;
  line-height: 1.5;
  margin-top: 10px;
}

.site-policy .modal-body h3 {
  margin: 25px 0 10px;
}

.site-policy .modal-body .fa-info-circle, .site-policy .modal-body .fa-check {
  margin-right: 5px;
  font-size: 19px;
  color: #949494;
}

.site-policy .modal-body li {
  line-height: 1.4;
  font-size: 18px;
}

.site-policy .modal-body {
  position: relative;
  padding: 30px 45px;
}
.site-policy .modal-body ul.list-unstyled {
  font-size: 19px;
  margin-top: 10px;
  padding-left: 10px;
}
 .landing-categories {
    margin-top: .90909rem;
    border-top: 1px solid #e0e0e0;
    border-right: 1px solid #e0e0e0;
    }
    .landing-categories>li {
    float: left;
    width: 25%;
    display: flex;
    flex-direction: column;
    }
    .category-item {
    font-size: .63636rem;
    display: block;
    min-height: 7.36364rem;
    padding-top: 1.04545rem;
    text-align: center;
    border-bottom: 1px solid #e0e0e0;
    border-left: 1px solid #e0e0e0;
    background-color: #fff;
    }
    .category-item {
      font-size: 14px;
      min-height: 190px;
      padding-top: 0;
      position: relative;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    
      .category-item .back, 
      .category-item .front {
         -moz-transition: opacity .4s ease-in-out;
         -o-transition: opacity .4s ease-in-out;
         -webkit-transition: opacity .4s ease-in-out;
         transition: opacity .4s ease-in-out;
      }

    .category-item .front {
      filter: progid:DXImageTransform.Microsoft.Alpha(enabled=false);
      opacity: 1;
    } 
  
    .category-icon {
    display: inline-block;
    }
    .category-item .category-icon {
    position: relative;
    margin-bottom: 25px;
    color: #0f92cd;
    font-size: 60px;
    }
    .category-item .category-icon:after {
      position: absolute;
      top: 100%;
      right: -16px;
      left: -16px;
      display: inline-block;
      margin-top: 12px;
      content: "";
      border-bottom: 2px solid #e0e0e0;
    }
    .category-item .category-title {
      font-weight: normal;
      font-size: .59091rem;
      display: block;
      text-transform: uppercase;
      color: #494949;
    }
    @media (min-width: 768px) {
      .category-item .category-title {
        font-size: 15px;
        font-weight: 600;
      } 
    }
.no-touch .category-item .back {
  opacity: 0;
  display: none;
}

.category-item:hover .back {
    display: flex;
    align-items: center;  
}

  .no-touch .category-item:hover .back {
    line-height: 1.4;
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    padding-top: 26px;
    color: #0f92cd;
    border: 2px solid #0f92cd;
    background-color: #fff;
    filter: alpha(opacity=0);
    opacity: 1;
    padding: 20px;
    font-size: 19px;
  }

.category-item .back em {
    font-weight: 400;
    display: block;
    margin-top: 19px;
}
.flex-row .single-testimonial {
  justify-content: center;
}


@media (max-width: 991px) {
  .testimonials .owl-controls {
    display: none!important;
  }
  .landing-categories>li {
    width: 50% !important;
  }
}


@media (max-width: 991px) {
.features-container .subheader {
  max-width: 600px;
  margin: 0 auto;
}
}

.service-tabs .service-intro h2.smallerh2 {
  font-size: 48px;
}
.latest-blog-posts h4 {
  color: #5cc74a;
}
h1 a:hover, h2 a:hover, h3 a:hover, h4 a:hover, h5 a:hover, h6 a:hover {
  /* border-bottom: 2px solid #0c6793; */
  text-decoration: none!important;
}
.latest-blog-posts h4 {
  color: #0C6793;
}
.latest-blog-posts h4 {
  color: #009cde;
}

.latest-blog-posts {
  position: relative;
}
.latest-blog-posts .container-fluid {
  padding-left: 60px;
  padding-right: 60px;
  position: relative;
  max-width: 1230px;
}
.latest-blog-posts .thumbnail {
  margin: 0 15px;
}
.latest-blog-posts .customNavigation {
  -webkit-transform: translateY(-50%);
          transform: translateY(-50%);
  top: calc(50%);
  position: absolute;
  width: 100%;
  left: 0;
}
.latest-blog-posts .customNavigation > span {
  -webkit-transform: translateY(-50%);
          transform: translateY(-50%);
  top: calc(0% - 27px);
  position: absolute;
}
.latest-blog-posts .pager-left {
  left: calc(0% + 15px);
}
.latest-blog-posts .pager-right {
  right: calc(0% + 15px);
}
.latest-blog-posts .next, .latest-blog-posts .prev {
  font-size: 28px;
  color: #ccc;
}

.callout h3 em:after {
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
.callout h3 em {
  border-bottom: none!important;
  position: relative;
}
.owl-carousel .owl-wrapper {
    display: flex!important;
  }
  .owl-carousel .owl-item {
      display: flex;
  }
  .owl-carousel .caption {
    display: flex;
    flex: 1 0 auto;
    flex-direction: column;
  }
  .owl-carousel .flex-text {
    flex-grow: 1
  }
  .owl-carousel .thumbnail {
    display: flex;
    flex-direction: column;
    margin: 0 15px;
  }

.callout h3 {
  font-size: 36px;
  color: #fff;
}
.callout h3 em {
  border-bottom: 3px solid #fff;
}
.callout-footer-btn {
  margin-left: 30px;
}


.jumbotron {
  background: url(http://disputebills.com/assets/uploads/clean-bill-savings-card.jpg) no-repeat center;
  background-size: cover;
  height: 515px;
}
@media screen and (min-width: 33em)
.header-text {
	padding-bottom: 75px!important;
}

p {
  font-size: 18px;
  line-height: 1.5;
}
.brandon-text-medium {
    font-family: 'brandon-text-medium', sans-serif;
}
.brandon-text-bold {
  font-family: 'brandon-text-bold', sans-serif;
}
@media screen and (min-width: 768px) {
  .jumbotron .h1, 
  .jumbotron h1 {
    font-size: 80px;
    font-family: 'brandon-text-bold';
    text-align: center;
    }
  .jumbotron .btn-callout {
    width: 200px;
  }
}
.btn-white-outline {
  background: transparent!important;
  border-color: #fff!important;
  box-shadow: none!important;
}
@media screen and (min-width: 33em) {
.header-text {
  padding-bottom: 38px!important;
}
}
.jumbotron {
    height: 570px!important;
}

@media screen and (min-width: 768px) {
.jumbotron p {
  margin-bottom: 0;
}
}


.header-text i.lnr.lnr-chevron-down {
  position: absolute;
  bottom: 0;
  margin: 0 auto;
  left: 0;
  right: 0;
  margin-bottom: 45px;
  color: #fff;
  font-weight: 900;
  font-size: 36px;
}

<?php if ( get_field( 'org_banner_background') ) { ?>
  .jumbotron {
    background: url(<?php the_field( 'org_banner_background' ); ?>) no-repeat center;
    background-size: cover;
  }
<?php } ?>
</style>
<main id="main" class="site-main wrap">


<header class="jumbotron" itemscope="" itemtype="http://schema.org/WPHeader">
<div class="header-text">

<div class="container">
<div class="col-sm-10 col-sm-offset-1">
  
  <h1 itemprop="headline" class="text-center"><?php the_field( 'org_banner_header' ); ?></h1>
  <p class="subheader text-center" itemprop="description"><?php the_field( 'org_banner_subheader' ); ?></p>

</div>

</div>
<a href="#callout-form"><i class="lnr lnr-chevron-down"></i></a>
</div>

</header>


<!--How it works-->
<style>
.how-it-works .flex-row .col-sm-4 {
  margin-bottom: 20px;
}
</style>



<style>
.icon-box-left {
  position: absolute;
  line-height: 2;
}
.icon-box-right {
  padding-left: 25px;
}
.reasons-check-boxes.flex-row.row > [class*='col-'] {
  margin-bottom: 25px;
}
.reasons-check-boxes h4 {
  color: #000;
  font-size: 23px;
  text-transform: capitalize;
}
.reasons-check-boxes p {
  font-size: 19px;
}


.works-icon-box-left {
  position: absolute;
  line-height: 2;
  display: flex;
  align-items: center;
  justify-content: center;
  width: 60px;
  height: 60px;
  background: #0097db;
  color: #fff;
  border-radius: 50%;
  font-size: 28px;
}

.works-icon-box-right {
  padding-left: 85px;
}



.large-p  {
  font-size: 21px;
}
.small_left_blue {
  max-width: 200px;
  text-align: left;
  margin-left: 0;
  border-top: 1px solid #0097db;
}

.org-features-h3 {
  font-size: 42.75px;
  color: #000;
  font-family: 'brandon-text-light';
}
.org-img-responsive {
  width: 85%;
  display: block;
  margin: 0 auto;
}
</style>
<!--features end--> 

<!--Benefits cta-->


<?php if ( have_rows( 'org_features' ) ): ?>
<?php while ( have_rows( 'org_features' ) ) : the_row(); ?>
  <?php if ( get_row_layout() == 'org_features_text_left' ) : ?>
  <section class="how-it-works pt100 pb100" style="background-color: <?php the_sub_field( 'org_features_background_color' ); ?>">
    <div class="container">
      <div class="row">
        <div class="col-sm-6">
          <h3 class="org-features-h3"><?php the_sub_field( 'org_features_text_left_th' ); ?></h3>
          <hr class="small_left_blue" />
          <p class="large-p"><?php the_sub_field( 'org_features_text_left_tc' ); ?></p>
        </div>
        <div class="col-sm-6">
          <?php if ( get_sub_field( 'org_features_text_left_img') ) { ?>
            <img class="org-img-responsive" src="<?php the_sub_field( 'org_features_text_left_img' ); ?>" />
          <?php } ?>
        </div>
      </div>
    </div>
  </section>
<?php elseif ( get_row_layout() == 'org_features_img_left' ) : ?>
<section class="how-it-works pt100 pb100" style="background-color: <?php the_sub_field( 'org_features_background_color_img_left' ); ?>">
  <div class="container">
    <div class="row">
      <div class="col-sm-6">
        <?php if ( get_sub_field( 'org_features_img_left_img') ) { ?>
          <img class="org-img-responsive" src="<?php the_sub_field( 'org_features_img_left_img' ); ?>" />
        <?php } ?>
      </div>
      <div class="col-sm-6">
        <h3 class="org-features-h3"><?php the_sub_field( 'org_features_img_left_th' ); ?></h3>
        <hr class="small_left_blue" />
        <p class="large-p"><?php the_sub_field( 'org_features_img_left_tc' ); ?></p>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>
<?php endwhile; ?>
<?php else: ?>
<?php // no layouts found ?>
<?php endif; ?>






<!--CTA footer-->
<style>
.callout h3 {
  font-size: 36px;
  color: #fff;
}
.callout h3 em {
  border-bottom: 3px solid #fff;
}
.callout-footer-btn {
  margin-left: 30px;
}
</style>
<?php if ( is_active_sidebar( 'b2b-form-area' ) ) : ?>
<section class="callout-wrapper" id="callout-form">
  <div class="callout">
    <div class="callout-container container-fluid-max pt80 pb80">
<div class="row">
<header class="text-center col-sm-8 col-sm-offset-2">
<h4 class="text-white mb30 fs-28-r fw-7"><?php the_field( 'org_form_header' ); ?></h4>
<h5 class="text-white mb40 fs-16-r fw-4"><?php the_field( 'org_form_subheader' ); ?></h5>
</header>
</div>
      <div class="callout-text row text-center">
        <div class="col-sm-8 col-sm-offset-2">
          <?php dynamic_sidebar( 'b2b-form-area' ); ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>
<!--CTA footer end--> 


<!--
<section class="callout-wrapper">
  <div class="callout">
    <div class="callout-container container-fluid-max pt50 pb50">
      <div class="callout-text row text-center">
        <div class="col-sm-12">
          <h2>Do you have <strong>5 minutes</strong>?</h2>
          <p class="subheader">If so, you can dispute a bill today–it's that easy.</p>
          <a href="https://app.disputebills.com/clients/sign_up" class="btn btn-callout btn-lg">Start My Dispute</a>
        </div>
      </div>
    </div>
  </div>
</section>
-->


<?php tha_content_bottom(); ?>
</main><!-- #main -->
<?php tha_content_after(); ?>
<?php get_footer(); ?>

