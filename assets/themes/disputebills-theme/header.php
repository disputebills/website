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
<html <?php language_attributes(); ?>>

<head>
   <?php tha_head_top(); ?>
<meta charset="UTF-8">
<meta http-equiv="Accept-CH" content="DPR, Viewport-Width, Width">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link href='https://fonts.googleapis.com/css?family=Noto+Sans:400,700' rel='stylesheet' type='text/css'>
	<?php if ( 'no' === get_theme_mod( 'some-like-it-neat_post_format_support' ) ): ?>
	<style type="text/css">
		h1.entry-title:before {
		    display: none;
		}
	</style>
	<?php endif; ?>
<?php tha_head_bottom(); ?>
<link rel="dns-prefetch" href="//res.cloudinary.com">
<link rel="dns-prefetch" href="//netdna-cdn.com">
<link rel="dns-prefetch" href="//pixel-geo.prfct.co">
<link rel="dns-prefetch" href="//kxcdn.com">
<link rel="dns-prefetch" href="//adnxs.com">
<link rel="dns-prefetch" href="//connect.facebook.net">
<link rel="prefetch" href="//disputebils16.wpengine.netdna-cdn.com/assets/themes/disputebills-theme/assets/images/dispute-bills-logo.png	
">
<style>
@font-face {
    font-family: 'Font-Awesome';
    src: url('<?php echo get_stylesheet_directory_uri(); ?>/assets/fonts/Font-Awesome/fonts/Font-Awesome.eot?psyw1f');
    src: url('<?php echo get_stylesheet_directory_uri(); ?>/assets/fonts/Font-Awesome/fonts/Font-Awesome.eot?psyw1f#iefix') format('embedded-opentype'),
         url('<?php echo get_stylesheet_directory_uri(); ?>/assets/fonts/Font-Awesome/fonts/Font-Awesome.ttf?psyw1f') format('truetype'),
         url('<?php echo get_stylesheet_directory_uri(); ?>/assets/fonts/Font-Awesome/fonts/Font-Awesome.woff?psyw1f') format('woff'),
         url('<?php echo get_stylesheet_directory_uri(); ?>/assets/fonts/Font-Awesome/fonts/Font-Awesome.svg?psyw1f#Font-Awesome') format('svg');
    font-weight: normal;
    font-style: normal;
}
.fa{font-family:Font-Awesome!important;speak:none;font-style:normal;font-weight:400;font-variant:normal;text-transform:none;line-height:1;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.fa-credit-card:before{content:"\e907"}.fa-search:before{content:"\e900"}.fa-clock-o:before{content:"\e901"}.fa-user:before{content:"\e902"}.fa-linkedin:before{content:"\e903"}.fa-google-plus:before{content:"\e904"}.fa-twitter:before{content:"\e905"}.fa-facebook:before{content:"\e906"}
.features-list i.fa {
	font-size: 28px;
	width: auto;
	color: #0f92cd;
	text-align: center;
	position: absolute;
}
.features-container .features-list li .feature-text {
	margin-left: 50px;
}
img.grayscale{
	-webkit-filter: grayscale(1);
	-webkit-filter: grayscale(100%);
	filter: gray;
	filter: grayscale(100%);
	filter: url(desaturate.svg#greyscale);
}
img.whiteout {
	-webkit-filter: brightness(0) invert(1);	
	filter: brightness(0) invert(1);
}
.sr-only {
	position: absolute;
	width: 1px;
	height: 1px;
	padding: 0;
	margin: -1px;
	overflow: hidden;
	clip: rect(0,0,0,0);
	border: 0;
}

.social-media li {
	display: inline-block;
	padding: 0 4px;
	padding: 0 3px;
	transition: all .3s ease-in-out;
	margin: 0;
}

.social-media li {
	padding: 0 5px;
}

.social-media li a {
	width: 41px;
}

.social-media li a {
	display: inline-block;
	opacity: .3;
	color: #fff;
	font-weight: 700;
}

.social-media i {
	width: 45px;
	height: 45px;
	line-height: 45px;
	color: #474747;
	background-color: #E8E8E8;
	font-size: 22px;
	text-align: center;
	border-radius: 50%;
	-moz-border-radius: 50%;
	-webkit-border-radius: 50%;
	-o-border-radius: 50%;
	transition: all ease .3s;
	-moz-transition: all ease .3s;
	-webkit-transition: all ease .3s;
	-o-transition: all ease .3s;
	-ms-transition: all ease .3s;
}

.social-media a i {
	display: block;
	width: 41px;
	height: 41px;
	line-height: 41px;
}
</style>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php tha_body_top(); ?>
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-TQN7FH"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-TQN7FH');</script>
<div id="page" class="hfeed site">

		<?php tha_header_before(); ?>
		<header id="masthead" class="site-header wrap" itemscope="itemscope" itemtype="http://schema.org/WPHeader">

		<?php tha_header_top(); ?>


				<div class="site-title">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">

<?php
/*
<img
sizes="(max-width: 400px) 100vw, 400px"
srcset="
http://res.cloudinary.com/lonesome-highway/image/upload/f_auto,q_70,c_scale,w_200/v1460642309/medical-billing-software.png 200w,
http://res.cloudinary.com/lonesome-highway/image/upload/f_auto,q_70,c_scale,w_400/v1460642309/medical-billing-software.png 400w"
src="http://res.cloudinary.com/lonesome-highway/image/upload/f_auto,c_scale,w_200/v1460642309/medical-billing-software.png"
alt="Medical Bill Web Application">
// */ 
?>

						<img width="200" height="32" src="<?php echo get_template_directory_uri(); ?>/assets/images/dispute-bills-logo.png" alt='Dispute Bills, Chicago, IL' />
					</a>
				</div>

				<div class="sliding-panel-button">
				  <span class="icon-bar"></span>
				  <span class="icon-bar"></span>
                                  <span class="icon-bar"></span>
				</div>

				<div class="sliding-panel-content">
					<nav id="primary-nav" role="navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">

				        <?php
							wp_nav_menu(
								array(
									'theme_location' => 'primary-navigation',
									'menu_class' => 'flexnav', //Adding the class for FlexNav
									'items_wrap' => '<ul data-breakpoint=" '. esc_attr( get_theme_mod( 'some_like_it_neat_mobile_min_width', '768' ) ) .' " id="%1$s" class="%2$s">%3$s</ul>', // Adding data-breakpoint for FlexNav
								)
							);
						?>

					</nav><!-- #site-navigation -->

					<div class="app-links">
						<ul>
							<li class="sign-in"><a href="https://app.disputebills.com" class="link-blue-base">Sign In</a></li>
							<li><a href="https://app.disputebills.com/pricing/" class="button-blue-base">Start My Dispute</a></li>
						</ul>
					</div>
				</div>

<div class="sliding-panel-fade-screen"></div>

			<?php tha_header_bottom(); ?>

		</header><!-- #masthead -->
		<?php tha_header_after(); ?>

		<?php tha_content_before(); ?>

		<main id="main" class="site-main wrap" role="main">
			<?php tha_content_top(); ?>