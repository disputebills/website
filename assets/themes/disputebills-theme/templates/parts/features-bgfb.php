<?php 
/**
 * Template Part: Borderd Grid Flexbox 
 */
?>
<style>
/* Flexy Bootstrap */
@media only screen and (min-width: 481px) {
  .flex-row.row {
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    -webkit-flex-wrap: wrap;
        -ms-flex-wrap: wrap;
            flex-wrap: wrap;
  }
  .flex-row.row > [class*='col-'] {
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -webkit-flex-direction: column;
        -ms-flex-direction: column;
            flex-direction: column;
    -webkit-box-flex: 1;
    -webkit-flex-grow: 1;
        -ms-flex-positive: 1;
            flex-grow: 1;
  }
  .flex-row.row:after,
  .flex-row.row:before {
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
  }
}

/* Flexy Bootstrap addon for bordered grid flex boxes */
@media only screen and (min-width: 992px) {
  .bgfbox .flex-row .col-md-4:first-child > a,
  .bgfbox-first,
  .bgfbox-content {
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-flex: 1;
    -webkit-flex-grow: 1;
        -ms-flex-positive: 1;
            flex-grow: 1;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -webkit-flex-direction: column;
        -ms-flex-direction: column;
            flex-direction: column;
  }
}

/* Borders */
.bgfbox .flex-row {
  border: 1px solid #eee;
  border-width: 1px 0 0 1px;
}
.bgfbox .flex-row .col-md-4 .bgfbox-content {
  border: 1px solid #eee;
  border-width: 0 1px 1px 0;
}

/* No row margins */
.bgfbox .flex-row {
  margin-left: 0px;
  margin-right: 0px;
}
/* No column padding */
.bgfbox .col-md-4 {
  padding: 0;
}
/* Add padding to content */
.bgfbox .bgfbox-content {
  padding: 45px;
}

/* Colors */
.bgfbox .bgfbox-first a {
  color: #fff;
}
.bgfbox .bgfbox-first h2 {
  margin-bottom: 30px;
  margin-top: 10px;
  font-size: 22px;
}
.bg-white {
  background-color: #fff;
}
.bg-white.bg-hover-inverse:hover {
  background-color: #084f70;
}
.bg-white.bg-hover-inverse:hover * {
  color: #fff;
}

/* Icons */
.bgfbox-icon-wrap {
  margin-bottom: 10px;
  font-size: 36px;
}

/* BACKGROUND TRANSITIONS */
/* Fade */
.hvr-fade {
  display: inline-block;
  vertical-align: middle;
  -webkit-transform: translateZ(0);
  transform: translateZ(0);
  box-shadow: 0 0 1px rgba(0, 0, 0, 0);
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
  -moz-osx-font-smoothing: grayscale;
  overflow: hidden;
  -webkit-transition-duration: 0.3s;
  transition-duration: 0.3s;
  -webkit-transition-property: color, background-color;
  transition-property: color, background-color;
}
.hvr-fade:hover, .hvr-fade:focus, .hvr-fade:active {
  background-color: #2098d1;
  color: white;
}
.bgfbox-plan {
  color: #fff;
  font-family: 'brandon-text-light';
  border-bottom: 1px solid;
  display: inline-block;
  margin-bottom: 0;
  line-height: 1.5;
  font-size: 26px;
}
.bgfbox-price {
  font-size: 58px;
  font-family: 'brandon-text-bold';
  margin-top: 10px;
  display: block; 
}
.bgfbox-plan-checks {
   margin-top: 10px;
}
.bgfbox-plan-checks li {
  color: #fff;
  font-size: 18px;
}
.bgfbox-text-wrap h4 {
  font-size: 26px;
  color: #2f2f2f;
}
.bgfbox-text-wrap p {
  font-size: 19px;
}
.bgfbox-plan-checks li {
  color: #fff;
  font-size: 16px;
  font-weight: 500;
}
.bgfbox-price {
  line-height: 1;
  margin: 20px 0 4px 0;
}
.bgfbox .bgfbox-content {
  padding: 35px;
}
.bgfbox .bgfbox-first h2 {
  margin-bottom: 20px;
  margin-top: 20px;
}
</style>
<section class="bgfbox pt60 pb60" id="bgfbox-clean-bill-features">
	<div class="container">

    <?php
    $bgfbox_section_header = get_field( 'bgfbox_section_header' );
    $bgfbox_section_subheader = get_field( 'bgfbox_section_subheader' );
    
    if( $bgfbox_section_header || $bgfbox_section_subheader ) {
    ?>
    <header class="section-header text-center mb60">
        <h2 class="brandon-text-medium">
        <?php
        if( $bgfbox_section_header ) {
          echo $bgfbox_section_header;
        }
        ?>
        </h2>
        <h3>
        <?php
        if( $bgfbox_section_subheader ) {
          echo $bgfbox_section_subheader;
        }
        ?>
        </h3>
    </header>
    <?php
    }
    ?>
		<div class="row flex-row">

			<div class="col-md-4">
				<div class="bgfbox-first bg-primary">
					<div class="bgfbox-content">
						<div class="bgfbox-text-wrap">



<?php 
$bgfbox_intro_box_plan = get_field( 'bgfbox_intro_box_plan' ); 
if( $bgfbox_intro_box_plan ) : ?>            
  <h5 class="bgfbox-plan">
  <?php echo $bgfbox_intro_box_plan; ?>
  </h5>
<?php endif; ?>




<?php if ( have_rows( 'bgfbox_intro_box_plan_checks' ) ) : ?>
  <ul class="list-unstyled bgfbox-plan-checks">
  <?php while ( have_rows( 'bgfbox_intro_box_plan_checks' ) ) : the_row(); ?>
    <li><i class="fa <?php the_sub_field( 'bgfbox_intro_box_plan_checks_icon' ); ?>"></i> <?php the_sub_field( 'bgfbox_intro_box_plan_checks_title' ); ?></li>
  <?php endwhile; ?>
  </ul>
<?php endif; ?>


<span class="bgfbox-price">$<?php the_field( 'bgfbox_intro_box_plan_price' ); ?></span>
<span class="small text-white">+ $5 one-time application fee</span>


							<h2 class="h1"><?php the_field( 'bgfbox_intro_box' ); ?></h2>
							<a class="read-more btn btn-callout btn-lg" href="<?php the_field( 'bgfbox_intro_link' ); ?>"><?php the_field( 'bgfbox_button_text' ); ?><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> </a>
						</div><!-- / .bgfbox-text-wrap -->
					</div><!-- / .bgfbox-content -->
				</div><!-- / .bgfbox-first -->
			</div>


			<?php if ( have_rows( 'bgfbox_feature' ) ) : ?>
			<?php while ( have_rows( 'bgfbox_feature' ) ) : the_row(); ?>
			<div class="col-md-4 bfgbox-col-<?php echo ($xyz++%2); ?>">
				<div class="bgfbox-content bfgbox-not-first bg-white bg-hover-inverse hvr-fade">
					<div class="bgfbox-icon-wrap">
						<i class="text-primary fa <?php the_sub_field( 'feature_bgfbox_icon' ); ?>" aria-hidden="true"></i>
					</div><!-- / .bgfbox-icon-wrap -->
					<div class="bgfbox-text-wrap">
						<h4><?php the_sub_field( 'feature_bgfbox_text_header' ); ?></h4>
						<p><?php the_sub_field( 'feature_bgfbox_text_description' ); ?></p>
					</div><!-- / .bgfbox-text-wrap -->
				</div><!-- / .bgfbox-content -->
			</div>
			<?php endwhile; ?>
			<?php else : ?>
			<?php // no rows found ?>
			<?php endif; ?>

		</div><!-- / .flex-row -->
	</div><!-- / .container -->
</section><!-- / .bfgbox -->