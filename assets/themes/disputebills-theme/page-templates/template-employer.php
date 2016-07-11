<?php
/**
 * Template Name: Employer Page
 *
 *
 * @package disputebills
 */


function scroll_to_employer_form() {
?>
<script>
  (function($) {
    $( "#scroll-to-request-form" ).on( "click", function() {
      $("html, body").animate({scrollTop: $("#request-demo").offset().top -65 }, "slow");
    });
  })(jQuery);
</script>
<?php
}
add_action('wp_footer', 'scroll_to_employer_form', 9999999);

add_action("gform_enqueue_scripts", "deregister_scripts");

function deregister_scripts(){
      
    //if(is_front_page()) { 
                        
         wp_deregister_style("gforms_formsmain_css");   
         //wp_deregister_style("gforms_reset_css");
         wp_deregister_style("gforms_ready_class_css");
         //wp_deregister_style("gforms_browsers_css");
         //wp_deregister_script("gforms_conditional_logic_lib");
         //wp_deregister_script("gforms_ui_datepicker");
         //wp_deregister_script("gforms_gravityforms");
         //wp_deregister_script("gforms_character_counter");
         //wp_deregister_script("gforms_json");
         //wp_deregister_script("jquery");
    // }
}

function gravity_form_enqueue_scripts_template_employer() {
  gravity_form_enqueue_scripts( 8, true );
  wp_enqueue_style( 'gform-custom', 'https://cdn.rawgit.com/bryanwillis/a4fbcb7fea6ff616dabb8110fe6525a7/raw/2f2eac25188f8410f9eace21b28e0544ab8a9cc4/custom-forms.css', array('gforms_reset_css'), null, 'all');
}
add_action('wp_enqueue_scripts', 'gravity_form_enqueue_scripts_template_employer');


get_header(); 

?>
<style>
h1 {
  margin-left: auto;
  margin-right: auto;
  width: 100%;
  max-width: 1024px;
  font-size: 52px;
}
@media screen and (min-width: 45em) {
.page-header .subheader {
  width: 100%;
  max-width: 1024px;
  font-size: 1.3rem;
}
}
@media screen and (min-width: 45em) {
 .features h2 {
  font-size: 45px;
  margin-top: -5px;
 }
}


.image-content-blocks.contrast {
   background-color: transparent;
}

<?php if(get_field('employer_feature_use_full_width_background')) : ?>
@media screen and (min-width: 45em) {
 .image-content-blocks.contrast .image-block {
   width: 100%;
   z-index: -1;
 }
}
.image-content-blocks.contrast * {
   color: #fff!important;
}
<?php endif; ?>

@media screen and (max-width: 63.9em) and (min-width: 45em) {
 .features h2 {
  text-align: center;
 }
 .features-container .subheader {
  text-align: center;
  max-width: 580px;
  margin: 0 auto;
  left: 0;
  right: 0;
 }
}
.callout-text-center {
  text-align: center;
}

#request-demo .gform_wrapper {
  max-width: 650px;
  margin: 0 auto;
  margin-top: 46px;
}

#request-demo .gform_button {
  margin: 0 auto;
  display: block;
  color: #0f92cd;
  background: #fff;
}

.contrast .gfield_label {
  color: #fff;
}
input[type="color"], input[type="date"], input[type="datetime"], input[type="datetime-local"], input[type="email"], input[type="month"], input[type="number"], input[type="password"], input[type="search"], input[type="tel"], input[type="text"], input[type="time"], input[type="url"], input[type="week"], input:not([type]), textarea, select, textarea {
  margin-top: 0;
}

</style>
  <div id="primary" class="content-area">

    <header class="page-header" style="background: url(<?php the_field('employer_banner_background_image'); ?>) no-repeat center; background-size: cover;">
        <div class="header-text">
        <h1><?php the_field('employer_header') ?></h1>
        <p class="subheader"><?php the_field('employer_sub_header'); ?></p>
        <?php if( get_field('employer_button_text') ) : ?>
          <ul class="header-links">
            <li><a href="#request-demo" id="scroll-to-request-form" class="button-white-base"><?php the_field('employer_button_text'); ?></a></li>
          </ul>
        <?php endif; ?>
      </div>
    </header>

    <section class="facts-container" style="border-bottom: 1px solid #eee;">
      <ul>
        <?php if( get_field('employer_stats_repeater') ): ?>
          <?php while( has_sub_field('employer_stats_repeater') ): ?>
          <li>
              <p class="stat"><?php the_sub_field('employer_stat'); ?></p>
              <p><?php the_sub_field('employer_stat_description'); ?></p>
          </li>
          <?php endwhile; ?>
        <?php endif; ?>
    </ul>
    </section><!-- .facts-container -->

<section class="text-image-container">
<div class="image-block" style="margin-left:0px; margin-top:0px;">
  <img style="width: 475px;" class="alignnone" src="http://2.bp.blogspot.com/-B4qO7WEJNOQ/UCxVt_7v0DI/AAAAAAAAAHo/9DogipChUTY/s1600/family_wize_drug_card.png">
</div>
<div class="text-block" style="
  -webkit-transform: translateY(0%);
  transform: translateY(0%);
  position: relative;
">
  <h3 style="font-size: 42px;"><span style="position: relative; margin-right: 10px; ">CleanBill<span style="
  font-size: 16px;
  position: absolute;
  right: 0;
  margin-right: -14px;
  margin-top: 2px;
">™</span></span> Savings Card</h3>
  <h4 style="
  font-size: 18px;
  font-size: 1.3rem;
  line-height: 28.5px;
  line-height: 1.9rem;
  margin-bottom: .8rem;
">A revolutionary healthcare advocacy program bundled to save you money.</h4>
  <ul class="checkmark" style="
  position: relative;
">
    <li><i class="fa fa-check" aria-hidden="true"></i>Medical Billing Advocate</li>
    <li><i class="fa fa-check" aria-hidden="true"></i>24/7 Telemedicine</li>
    <li><i class="fa fa-check" aria-hidden="true"></i>National Perscription Drug Network</li>
  </ul><a href="#" style="
  font-size: 20px;
  position: relative;
  top: 20px;
  right: 0;
  /* left: 100%; */
    margin-left: 350px;
">And More</a>
</div>
</section>





<section class="features">
  <div class="features-container">
    <h2><?php the_field('employer_product_feature_header') ?></h2>
    <p class="subheader"><?php the_field('employer_product_feature_subheader') ?></p>
    <ul class="features-list">
       <?php
        if( get_field('employer_product_features') ): ?>
         <?php while( has_sub_field('employer_product_features') ): ?>
          <li class="feature-li-<?php echo ($xyz++%2); ?>">
    <?php $image = get_sub_field('employer_feature_image');
    if( !empty($image) ): ?>
    <img width="30" height="25" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
    <?php endif; ?>
            <div class="feature-text">
              <h5><?php the_sub_field('employer_feature_name'); ?></h5>
              <p><?php the_sub_field('employer_feature_description'); ?></p>
            </div>
          </li>
         <?php endwhile; ?>
      <?php endif; ?>
    </ul>
    
<img
sizes="(max-width: 554px) 100vw, 554px"
srcset="
http://res.cloudinary.com/lonesome-highway/image/upload/c_scale,w_200/v1460642309/medical-billing-software.png 200w,
http://res.cloudinary.com/lonesome-highway/image/upload/c_scale,w_360/v1460642309/medical-billing-software.png 360w,
http://res.cloudinary.com/lonesome-highway/image/upload/c_scale,w_483/v1460642309/medical-billing-software.png 483w,
http://res.cloudinary.com/lonesome-highway/image/upload/c_scale,w_554/v1460642309/medical-billing-software.png 554w"
src="http://res.cloudinary.com/lonesome-highway/image/upload/v1460642309/medical-billing-software.png"
alt="Medical Bill Web Application" 
class="ui-shot" />
  </div>
</section>


<section class="image-content-blocks contrast">
<div class="image-block" style="background: url(<?php the_field('employer_features_two_background_image'); ?>) no-repeat center; background-size: cover;"></div>
<div class="text-block">
<h2><?php the_field('employer_product_feature_header_two'); ?></h2>
<h4><?php the_field('employer_product_feature_subheader_two'); ?></h4>
<p style="margin-top:14px;"><?php the_field('product_features_two_list_header'); ?></p>
<ul class="bullet-list">
       <?php
        if( get_field('employer_product_features_two') ): ?>
         <?php while( has_sub_field('employer_product_features_two') ): ?>
          <li style="margin-top: 1.2rem;">  <?php the_sub_field('employer_feature_two_bullet_point'); ?>
          </li>
         <?php endwhile; ?>
      <?php endif; ?>
</ul>
</div>
</section>


<div id="request-demo" class="widget widget_text contrast">      
<div class="textwidget">
<section class="callout">
  <div class="callout-container">
    <div class="callout-text-center">
      <h2><?php the_field('employer_cta_header'); ?></h2>
      <p class="subheader"><?php the_field('employer_cta_subheader'); ?></p>
<?php
/**
 * Display a Gravity Form
 * 
 * @param int $id the form ID
 * @param bool $display_title, default is true
 * @param bool $display_description, default is true
 * @param bool $display_inactive, default is false
 * @param array $field_values, default is null
 * @param bool $ajax, default is false
 * @param int $tabindex, default is 1
 * @param bool $echo, default is false
 * gravity_form( $id, $display_title, $display_description, $display_inactive, $field_values, $ajax, $tabindex, $echo );
 */
 gravity_form( 8, false, false, false, '', false ); 
 ?>
    </div>
  </div>
</section>
</div>
</div>

</div><!-- #primary -->



<?php get_footer(); ?>
