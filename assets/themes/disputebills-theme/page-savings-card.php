<?php /* Template Name: Savings Card */ ?>
<?php add_action('db_disclosures', 'new_benefits_feed'); ?>
<?php get_header(); ?>


<style>
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
<?php if ( get_field( 'cleanbill_banner_background_image') ): ?>
  background: url(<?php the_field( 'cleanbill_banner_background_image' ); ?>);
<?php endif; ?>
  no-repeat center;
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
  text-align: left;
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
.jumbotron .btn-callout {
  justify-content: center;
  display: flex;
}
.jumbotron {
  height: calc(100vh - 126px);
}
.jumbotron {
  background-size: contain;
  background-repeat: no-repeat;
  background-position-x: calc(100% - 30px);
}
.jumbotron:after {
  display: none;
}
.jumbotron .h1, .jumbotron h1, .jumbotron .subheader {
  color: #0097db;
  text-shadow: none;
}
section#bgfbox-clean-bill-features,
section#faq,
.faq .panel-default>.panel-heading,
.panel-default>.panel-heading+.panel-collapse>.panel-body {
  background-color: #f7f7f7!important;
}
.jumbotron,
section {
  position: relative;
}
.jumbotron:after,
section:after {
  top: 100%;
  left: 50%;
  border: solid transparent;
  content: " ";
  height: 0;
  width: 0;
  position: absolute;
  pointer-events: none;
  border-color: rgba(104, 144, 213, 0);
  border-width: 15px;
  margin-left: -30px;
  margin-top: -1px;
  z-index: 999;
}
.benefits-cta {
  background: #fff!important;
}

.jumbotron, .benefits-cta:after {
  border-top-color: #fff;
}
.faq:after, 
.bgfbox:after {
  border-top-color: #f7f7f7;
}




</style>
<main id="main" class="site-main wrap">



<header class="jumbotron" itemscope="" itemtype="http://schema.org/WPHeader">
<div class="header-text">
<div class="container">
<div class="col-sm-9">
<h1 itemprop="headline"><?php the_field( 'cleanbill_header_banner_text' ); ?></h1>
<p class="subheader text-left fw-7" itemprop="description"><?php the_field( 'cleanbill_subheader_banner_text' ); ?></p>
<?php if ( have_rows( 'cleanbill_banner_call_to_action_buttons' ) ) : ?>
<ul class="header-links list-unstyled text-left">
  <?php while ( have_rows( 'cleanbill_banner_call_to_action_buttons' ) ) : the_row(); ?>
  <li>
    <a href="<?php the_sub_field( 'cleanbill_banner_cta_link' ); ?>" class="btn btn-callout btn-<?php the_sub_field( 'cta_banner_button_style' ); ?> btn-lg">
      <?php the_sub_field( 'cleanbill_banner_cta_text' ); ?>
    </a>
  </li>
  <?php endwhile; ?>
</ul>
<?php endif; ?>
</div>
</div>
</div>
</header>



<!-- Cleanbill Card Services : Bordered Icon Flex Boxes -->
<?php get_template_part( 'templates/parts/features', 'bgfb' ); ?>


<!-- Benefits : Two Column Lists [ Check Icons / H4 / Textbox ] -->
<?php get_template_part( 'templates/parts/features', '2col_icon_checklist_textbox' ); ?>


<!-- FAQ's : Accordian Q/A Style Toggles -->
<?php get_template_part( 'templates/parts/faqs', 'toggles' ); ?>


<!-- CTA (Clean Bill Checkout) : Fancy Arrow Icon to Button -->
<?php get_template_part( 'templates/parts/cta', 'arrow_button' ); ?>


<?php tha_content_bottom(); ?>
</main><!-- #main -->
<?php tha_content_after(); ?>
<?php get_footer(); ?>