<?php /* Template Name: Home */ ?>

<?php add_action('db_disclosures', 'new_benefits_feed'); ?>
<?php get_header(); ?>
<?php wp_enqueue_style( 'page-home', get_stylesheet_directory_uri() . '/assets/css/page_css/home.css', array(), false, 'all' ); ?>


<!-- Banner -->
<style>
.jumbotron {
    background: -webkit-linear-gradient(left, rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0)), url(<?php the_field( 'banner_background' ); ?>) no-repeat center;
    background: linear-gradient(to right, rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0)), url(<?php the_field( 'banner_background' ); ?>) no-repeat center;
    background-size: cover;
    background-position: top right;
}
.desktop .jumbotron {
  height: calc(100vh - 126px);
}
@media (max-width: 480px) {
.desktop .jumbotron {
  height: calc(100vh - 62px);
}
.jumbotron .btn-play {
  display: none;
}
}
@media(min-width: 481px) {
.mt0-xxs {
  margin-top: 0px;
}
}

a.category-item:focus, a.category-item:hover {
	text-decoration: none;
}
.btn-outline-cta {
	font-weight: 600;
	border: 2px solid #e0e0e0;
	color: #0f92cd;
	border-radius: 2px;
	text-align: center;
}
.btn-outline-cta:hover,
.btn-outline-cta:active,
.btn-outline-cta:focus {
	border-color: #0f92cd;
	color: #0f92cd;
}
</style>
<header class="jumbotron" itemscope itemtype="http://schema.org/WPHeader">
   <div class="header-text">
      <div class="container">
         <div class="flex_grid">
            <div class="flex_col-12">
               <div class="scrollme text-center-not-md">
                  <h1 itemprop="headline" class="headline intro-title animateme " data-when="exit" data-from="0" data-to="0.4" data-opacity="0" data-translatey="-30"><?php the_field( 'banner_header' ); ?></h1>
                  <?php if ( have_rows( 'banner_subheader' ) ) : ?>
                  <p itemprop="description" class="subheader intro-text animateme" data-when="exit" data-from="0" data-to="0.5" data-opacity="0" data-translatey="-30">We help people
                     <span class="element" data-elements="<?php while ( have_rows( 'banner_subheader' ) ) : the_row(); ?><?php the_sub_field( 'subheader_typed_text' ); ?> ., <?php endwhile; ?>"></span>
                  </p>
                  <?php endif; ?>
                  <div class="header-links list-unstyled btn-bar animateme" data-when="exit" data-from="0" data-to="0.8" data-opacity="0">
                     <a href="https://www.youtube.com/watch?v=RW5HPtOHSYs" class="btn btn-link-dark-bg btn-lg btn-play btn btn-lg">
                     <span class="btn-icon btn-icon-adj-text btn-icon-text-right btn-icon-stroke border-radius-50"><i class="fa fa-play" aria-hidden="true"></i></span> <span class="btn-icon-display-text">Play Video</span>
                     </a>
                     <a href="<?php the_field( 'banner_cta_button_url' ); ?>" class="btn btn-callout btn-lg"><?php the_field( 'banner_cta_text' ); ?></a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <?php if ( get_field( 'banner_featured_logo_image') ) { ?>
   <div class="featured-on-logos">
      <img src="<?php the_field( 'banner_featured_logo_image' ); ?>" />
   </div>
   <?php } ?>
</header>


<!-- Mission -->
<section class="container pt50 pb50 ">
  <h4 class="text-center" style=" font-size: 28px; margin: 0;">Our mission is to end medical debt by positively impacting the lives of <span class="text-primary">10,000 patients</span> every year.</h4>
</section>         


<!-- Service Tabs -->
<section class="learn-more section-spacing">
   <div class="service-tabs">
      <!-- Tab Header -->
      <div class="service-tabs-header blue-bright-bg pt80 pb80">
         <div class="container" style="max-width: 970px;">
            <span class="service-intro text-center" style="position: relative; display: block;">
               <h2 style="color: #fff;">DisputeBills.com is your one-stop shop for medical savings.</h2>
               <p class="lead" style="color: #fff; max-width: 800px; margin: 0 auto;">DisputeBills provides customized healthcare savings programs designed to save you time and money.</p>
            </span>
            <ul class="nav nav-pills row flex-row" role="tablist">
               <li style="" role="presentation" class="service-nav-li col-xs-12 col-sm-6 arrow_box active text-center">
                  <a href="#cleanbill-savings-card" aria-controls="home" role="tab" data-toggle="tab" class="scroll">
                     <strong>CleanBill Savings Card</strong>
                     <p>A revolutionary healthcare advocacy membership bundled to save you money.</p>
                  </a>
               </li>
               <li role="presentation" class="service-nav-li col-xs-12 col-sm-6 arrow_box text-center">
                  <a href="#medical-billing-negotiation" aria-controls="profile" role="tab" data-toggle="tab" class="scroll">
                     <strong>Medical Billing Negotiation</strong>
                     <p>Upload your bills, receive real-time updates, and reduce debt by signing up today!</p>
                  </a>
               </li>
            </ul>
         </div>
      </div>


      <!-- Tab Panes -->
      <div class="tab-content" data-spy="scroll" data-target=".navbar">
         <div role="tabpanel" class="tab-pane active" id="cleanbill-savings-card">
            <div class="container pt80 pb80">
               <span class="service-intro text-center mb40" style="position: relative; display: block;">
                  <h2 class="smallerh2"><?php the_field( 'cleanbill_header' ); ?></h2>
                  <p class="lead" style="max-width: 800px; margin: 0 auto;"><?php the_field( 'cleanbill_subheader' ); ?></p>
               </span>
               <ul class="landing-categories list-unstyled grid-noGutter-noBottom">
                  <li class="cell-12_sm-6_md-3">
                    <a class="category-item" href="javascript:void(0)">
                      <span class="front">
                       <i class="dispute-i-hearing-assistance service-icon category-icon"></i>
                        <!--<i class="lnr lnr-hearing service-icon category-icon"></i>-->
                        <span class="category-title">Hearing Aids</span>
                      </span>
                      <span class="back">Want to save big on hearing aids? You'll save 35% at retail locations nationwide.</span>
                    </a>
                  </li>
                  <li class="cell-12_sm-6_md-3">
                    <a class="category-item" href="javascript:void(0)">
                      <span class="front">
                        <i class="dispute-eye2 service-icon category-icon"></i>
                         <!--<i class="lnr lnr-eye service-icon category-icon" style="line-height: 0.9;"></i> -->
                        <span class="category-title">Vision</span>
                      </span>
                      <span class="back">Save 10% to 60% on glasses, contacts, laser surgery, exams, and more.</span>
                    </a>
                  </li>
                  <li class="cell-12_sm-6_md-3">
                    <a class="category-item" href="javascript:void(0)">
                      <span class="front">
                        <i class="dispute-i-dental service-icon category-icon"></i> 
                        <span class="category-title">Dental</span>
                      </span>
                      <span class="back">Save 15% to 50% per visit* at over 195,000** available dental practice locations nationwide</span>
                    </a>
                  </li>
                  <li class="cell-12_sm-6_md-3">
                     <a class="category-item" href="javascript:void(0)">
                     <span class="front">
                     <i class="dispute-i-laboratory service-icon category-icon"></i>
                      <!--<i class="lnr lnr-microscope service-icon category-icon"></i> -->
                     <span class="category-title">Lab Testing</span>
                     </span>
                     <span class="back">
                     Monitor your health with 10% to 80% off typical costs of routine lab work.
                     </span>
                     </a>
                  </li>
                  <li class="cell-12_sm-6_md-3">
                     <a class="category-item" href="javascript:void(0)">
                     <span class="front">
                     <i class="dispute-i-pharmacy service-icon category-icon"></i>                   
                      <!--<i class="lnr lnr-pills service-icon category-icon"></i> -->
                     <span class="category-title">Pharmacy Discounts</span>
                     </span>
                     <span class="back">
                     Save 10% to 85% on most prescriptions at over 60,000 pharmacies.
                     </span>
                     </a>
                  </li>
                  <li class="cell-12_sm-6_md-3">
                     <a class="category-item" href="javascript:void(0)">
                     <span class="front">
                     <i class="dispute-i-text-telephone service-icon category-icon"></i>
                     <!-- <i class="fa fa-stethoscope service-icon category-icon fw-5" style="font-size: 43px;"></i> -->
                     <span class="category-title">Telehealth</span>
                     </span>
                     <span class="back">
                        24/7 access to a doctor is only a call or click away with no consult fee!
                     </span>
                     </a>
                  </li>
                  <li class="cell-12_sm-6_md-3">
                     <a class="category-item" href="javascript:void(0)">
                     <span class="front">
                     <i class="dispute-i-imaging-root-category service-icon category-icon"></i>
                     <!-- <i class="lnr lnr-pills service-icon category-icon"></i> -->
                     <span class="category-title">MRI and CT Scans</span>
                     </span>
                     <span class="back">
                        Save 40% to 75% on MRI, CT scans, and more at thousands of radiology centers nationwide.
                     </span>
                     </a>
                  </li>
                  <li class="cell-12_sm-6_md-3">
                     <a class="category-item" href="javascript:void(0)">
                     <span class="front">
                      <i class="dispute-i-physical-therapy service-icon category-icon"></i>
                     <!-- <i class="lnr lnr-pills service-icon category-icon"></i> -->
                     <span class="category-title">Chiropractic</span>
                     </span>
                     <span class="back">
                     Save 30% to 50% on X-rays, diagnostic services, and treatments at 3,000+ chiropractors nationwide.
                     </span>
                     </a>
                  </li>
               </ul>
               <div class="flex_grid-center">
               	<div class="flex_col text-center">
               		<a href="https://disputebills.com/checkout/" class="btn btn-lg btn-outline-cta mt4">Start Saving Today</a>
               	</div>
               </div>
               <div class="text-muted mt30">
               <h6>Notes and references</h6>
               <p>* Actual costs and savings vary by provider, service, and geographical area. ** As of May 2016.</p>
               </div>
            </div>
         </div>


         <div role="tabpanel" class="tab-pane" id="medical-billing-negotiation">
            <div class="features-container container-fluid-max text-center text-left-md">
               <div class="row">
                  <div class="col-sm-12 col-md-8">
                     <span class="service-intro">
                        <h2 class="smallerh2">Your case is important to us.</h2>
                        <p class="subheader lead" style="max-width: 800px; margin: 0 auto;">Upload your bills, receive real-time updates, and reduce debt by signing-up today!</p>
                     </span>
                     <div class="features-list nav row">
                        <div class="col-sm-6 service">
                           <i class="fa fa-clock-o service-icon"></i>
                           <div class="desc">
                              <h5>Short Case Timeline</h5>
                              <p>On average, our cases only take two weeks from start to finish.</p>
                           </div>
                        </div>
                        <div class="col-sm-6 service">
                           <i class="fa fa-credit-card service-icon"></i>
                           <div class="desc">
                              <h5>Flexible Pricing</h5>
                              <p>Flexible pricing designed to reduce your costs and save you time.</p>
                           </div>
                        </div>
                        <div class="col-sm-6 service">
                           <i class="fa fa-search service-icon"></i>
                           <div class="desc">
                              <h5>We Do All the Research</h5>
                              <p>Sit back and save. Your advocate conducts all bill review and negotiations on your behalf and updates you in real-time.</p>
                           </div>
                        </div>
                        <div class="col-sm-6 service">
                           <i class="fa fa-user service-icon"></i>
                           <div class="desc">
                              <h5>Experienced Advocates</h5>
                              <p>Our advocates represent over 200 years of combined patient billing, customer service, and insurance verification experience.</p>
                           </div>
                        </div>
                        <div class="col-sm-12 text-left">
               				<a href="https://app.disputebills.com/clients/sign_up" class="btn btn-lg btn-outline-cta mt4">Dispute a Medical Bill</a>
                        </div>
                     </div>
                  </div>
                  <div class="col-xs-12 col-sm-10 col-sm-push-1 col-md-4 col-md-push-0 dispute-desktop-app-img"><img alt="Risk Free Pricing for Bill Dispute" src="http://res.cloudinary.com/candidbusiness/image/upload/c_scale,h_341/v1455406304/dispute-desktop-app.png" width="554" height="341"></div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>



<?php 
/*
<section class="testimonials">
   <div>
      <div id="owl-demo" class="owl-carousel">
         <div class="item container flex-container flex-justify-center">
            <div class="row flex-row">
               <div class="hidden-xs hidden-sm col-md-5">
                  <div style="position: absolute;bottom: 0;height: 100%;top: 0;left: 0;right: 0;">
                     <img class="img-responsive" style="position: absolute; bottom: 0; width: auto; max-height: 100%; height: auto; margin-top: 20px;" src="img/owl3.png">
                  </div>
               </div>
               <div class="col-sm-12 col-md-7 text-center text-left-md single-testimonial pt80 pb80">
                  <div>
                     <h3 class="fw-5" style="font-size: 28px;">Mary Lynn</h3>
                     <h4 class="text-primary mt10 mb30 h3 fw-3" style=";font-size: 30px;">Saved over $3,000 in medical bills in only three weeks</h4>
                     <p>
                        <!--I recently found myself being in the unfortunate and uncomfortable position of being on the verge of a local hospital sending me collection for a $3,100 balance they said I owed from an ER visit a few months ago. I was taken by ambulance and didn't understand why it wasn't being covered.-->

                        After speaking with both the hospital and my insurance without any results, I read about this new company DisputeBills.com in the Tribune recently and gave them a call. Within 2-3 weeks, I had major results. NO balance and instead, I am now putting new counter tops in my kitchen.
                     </p>
                  </div>
               </div>
            </div>
         </div>
         <div class="item container flex-container flex-justify-center">
            <div class="row flex-row">
               <div class="hidden-xs hidden-sm col-md-5">
                  <div style="position: absolute;bottom: 0;height: 100%;top: 0;left: 0;right: 0;">
                     <img class="img-responsive" style="position: absolute; bottom: 0; width: auto; max-height: 100%; height: auto; margin-top: 20px;" src="img/owl5.png">
                  </div>
               </div>
               <div class="col-sm-12 col-md-7 text-center text-left-md single-testimonial pt80 pb80">
                  <div>
                     <h3 class="fw-5" style="font-size: 28px;">Brandon & Melissa</h3>
                     <h4 class="text-primary mt10 mb30 h3 fw3" style="font-size: 30px;">Over $1,200 saved in two weeks!</h4>
                     <p>
                        DisputeBills helped us with medical bills from our daughter's birth and re-hospitalization for jaundice. At a time when we were struggling with returning to work with a new baby, they saved us hours of making phone calls to billing departments when the bills kept coming. They were not only successful with disputing amounts due but discovered that the hospital had billed us multiple times for a single service . We saved thousands! Not to mention headaches of frustration. We are so grateful for their service and would definitely use them again!-->
                     </p>
                  </div>
               </div>
            </div>
         </div>
         <div class="item container flex-container flex-justify-center">
            <div class="row flex-row">
               <div class="hidden-xs hidden-sm col-md-5">
                  <div style="position: absolute;bottom: 0;height: 100%;top: 0;left: 0;right: 0;">
                     <img class="img-responsive" style="position: absolute; bottom: 0; width: auto; max-height: 100%; height: auto;  margin-top: 20px;" src="img/owl1.png">
                  </div>
               </div>
               <div class="col-sm-12 col-md-7 text-center text-left-md single-testimonial pt80 pb80">
                  <div>
                     <h3 class="fw-5" style="font-size: 28px;">Mary Lynn</h3>
                     <h4 class="text-primary mt10 mb30 h3 fw3" style="font-size: 30px;">Boston, MA</h4>
                     <p>I wanted to thank you so much for your diligent service on my behalf (against the "hardheaded" insurance co. & hospital). I have been blown away with your dedication and attention to detail in regards to this assignment; it is always so nice to see such pure professionalism on display. I would not hesitate for a second to heartily recommend your company to anyone who would be in need of such services! I wish you the best of luck with your business and your future endeavors!</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
// */ 
?>




<?php if( get_field('testimonials') ): ?>
<section class="testimonials pt4 pb4">
   <div class="testimonials-owl-wrapper">
      <div id="owl-demo" class="owl-carousel">
        <!-- Testimonial -->
        <?php while( has_sub_field('testimonials') ): ?>
         <div class="item container flex-justify-center">
            <div class="flex_grid testimonials_image-row">

               <div class="flex_col-12">
                 <div class="mb3">
                   <img class="img-responsive testimonial_image img-circle" width="60" height="60" src="<?php the_sub_field('testimonial_image'); ?>">
                  </div>
               </div>

               <div class="flex_col-12 text-center single-testimonial">
                  <div>
                     <h3 class="testimonial_name fw-5"><?php the_sub_field('testimonial_name'); ?></h3>
                     <h4 class="testimonial_description text-primary mt10 mb30 h3 fw-3"><?php the_sub_field('testimonial_description'); ?></h4>
                     <p class="textimonial_quote mb20 hidden-xs"><?php the_sub_field('testimonial_quote'); ?></p>
                  </div>
               </div>
            </div>
         </div>
        <?php endwhile; ?>
      </div>
   </div>
</section>
<?php endif; ?>



<section class="latest-blog-posts bg-white pt70 pb80">
   <div class="container-fluid">
      <h2 class="text-center mb50 fw-7" style="font-size: 48px;">Savings Tips</h2>
   </div>
   <div class="container-fluid">
      <div id="owl-demo-2" class="owl-carousel owl-theme">
         <?php
            /* Query Latest Posts and Show Sticky First */
            $args = new WP_Query([
                'posts_per_page' => 5,
                'post__in'       => get_option('sticky_posts'),
                'meta_query' => [
                'relation' => 'AND',
                 [
                    'key'     => '_thumbnail_id',
                    'compare' => 'EXISTS',
                 ]
                ],
                'post_status'    => 'publish',
                'orderby'        => 'post__in',
                'post_type'      => ['post'],
                'ignore_sticky_posts' => true,
                'cache_results'          => true,
                'update_post_meta_cache' => true,
                'update_post_term_cache' => true
            ]);
            $the_query = new WP_Query( $args ); 
            
            if ( $the_query->have_posts() ) {
            
              while ( $the_query->have_posts() ) {
                $the_query->the_post();
            
              $content = strip_shortcodes( get_post()->post_content );
              $content = str_word_count( strip_tags( $content ) );
            
              if( 0 !== $content && has_post_thumbnail() ): ?>
              <article class="thumbnail item" itemscope="" itemtype="http://schema.org/CreativeWork">
                <a class="blog-thumb-img" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                  <?php the_post_thumbnail( 'home-blog-thumbs' ); ?>
                </a>
                <div class="caption pt20">
                  <h4 itemprop="headline">
                    <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
                  </h4>
                  <p itemprop="text" class="flex-text text-muted"><?php echo excerpt(20);?></p>
                </div>
              </article>
         <?php endif;
            }
            wp_reset_postdata();
            }
            ?>
      </div>
      <div class="customNavigation">
         <span class="pager-left"><a class="btn btn-link prev"><span class="glyphicon glyphicon-chevron-left"></span></a></span>
         <span class="pager-right"><a class="btn btn-link next"><span class="glyphicon glyphicon-chevron-right"></span></a></span>
      </div>
   </div>
   <!-- /.container  -->
</section>



<!--
<section class="callout-wrapper">
  <div class="callout">
    <div class="callout-container container-fluid-max pt80 pb80">
      <div class="callout-text">
        <div class="flex_grid">
        <div class="flex_col-12 mod-block">
          <h3 class="mb0 mb2-sm text-left-not-xs">Signup and Start <em>SAVING</em> Today!</h3>
          <div>
            <a href="/checkout/" class="bbtn btn-callout btn-lg callout-footer-btn mt3 mt0-xxs mod-mt0-xs text-center">
          No risk 30-day money-back guarantee
            </a>
          </div>
        </div>
        </div>
      </div>
    </div>
  </div>
</section>
-->

<style>
.callout-wrapper .btn,
.flex-btn-wrap {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
}
</style>

<section class="callout-wrapper">
  <div class="callout">
    <div class="callout-container container-fluid-max pt80 pb80">
      <div class="callout-text">
        <div class="flex_grid-middle-spaceAround">
          <h3 class="flex_col-5_md-6_sm-5_xs-12 mb0 mb2-sm text-left text-left-not-xs">Signup and Start <em>SAVING</em> Today!</h3>
          <div class="flex_col-4_md-5_sm-5_xs-12">
          <div class="flex-btn-wrap flex_grid-spaceAround">
            <a href="/checkout/" class="bbtn btn-callout btn-lg callout-footer-btn mt3 mt0-xxs mod-mt0-xs text-center">
              No risk 30-day money-back guarantee
            </a>
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>



<?php tha_content_bottom(); ?>
</main><!-- #main -->
<?php tha_content_after(); ?>
<?php get_footer(); ?>