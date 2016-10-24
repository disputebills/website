<?php
/**
 * some_like_it_neat functions and definitions
 *
 * @package some_like_it_neat
 */



define('BW_CONTENT_ASSETS_DIR', trailingslashit(trailingslashit(content_url()) . 'assets'));
define('BW_STYLE_DIR', get_stylesheet_directory());
define('BW_STYLE_URL', get_stylesheet_directory_uri());
define('BW_LIB_DIR', BW_STYLE_DIR . '/library');

include_once (BW_LIB_DIR . '/gf-merge-tags.php');

add_action( 'widgets_init', 'db_widgets_init' );
function db_widgets_init() {

$args = array(
	'name'          => __( 'Banner Widget', 'disputebills' ),
	'id'            => 'jumbotron',
	'description'   => 'Shows in the Blog Main Banner',
    'class'         => '',
	'before_widget' => '',
	'after_widget'  => '',
	'before_title'  => '<h2 class="widgettitle">',
	'after_title'   => '</h2>' ); 
register_sidebar( $args );

}




function new_benefits_feed() {
	echo '<hr><div class="new-benefits-disclosures">';
	echo do_post("http://content.newbenefits.com/Feednocss.aspx", "hash=gwYrwgakvgVDUPpzwgPMQ&Section=website");
	echo '<p class="mb10 mt10" style="font-size: 16px;">Not available to UT, KS, VT or WA residents. Telehealth operates subject to state regulation and may not be available in certain states. Consults are not available outside of the U.S. Lab benefit not available to HI, MA, MD, ND, NJ, NY, RI or SD residents.</p>';
	echo '</div>';
}


function new_benefits_checkout_feed() {
	echo '<hr><div class="new-benefits-disclosures">';
	echo do_post("http://content.newbenefits.com/Feednocss.aspx", "hash=j3yIAiq02ocYNCZWTvg&section=summary");
	echo do_post("http://content.newbenefits.com/Feednocss.aspx", "hash=2uv1b9NcHG8GiMLehg5r2g&section=disclaimers");
	echo do_post("http://content.newbenefits.com/Feednocss.aspx", "hash=k9zYCMep5KkjogHYJ7ZZDw&section=disclosures");
	echo do_post("http://content.newbenefits.com/Feednocss.aspx", "hash=d9xghGhlrqt3noPSEZs5tg&section=disclosures");
	echo 'Not available to UT, KS, VT or WA residents.';
}



function newbenefits_checkout_text() {
	echo '<div class="mb10 mt10">';
?>
<hr> 
<p class="mb10" style="font-size: 16px;">Your membership is effective upon receipt of membership materials.</p>

<p class="mb10" style="font-size: 18.66px;"><strong>This is NOT insurance nor is it intended to replace insurance.</strong> <span style="font-size: 16px;"><strong>This discount card program contains a 30 day cancellation period.</strong> The plan is not insurance coverage and does not meet the minimum creditable coverage requirements under the Affordable Care Act or Massachusetts M.G.L. c. 111M and 956 CMR 5.00. This plan provides discounts at certain healthcare providers for medical services. This plan does not make payments directly to the providers of medical services. The plan member is obligated to pay for all healthcare services but will receive a discount from those healthcare providers who have contracted with the discount plan organization. <!-- DISCLOSURE LIST -->For a full list of disclosures, please <a href="http://content.newbenefits.com/feed.aspx?hash=1nCjynVyHgD3qMTJC7SQg" target="_blank" title="Disclosures">click here</a>.<!-- DISCLOSURE LIST --> | <a href="http://content.newbenefits.com/Feed.aspx?hash=6519gRcOdLk4PKnqDA" target="_blank" title="Terms and Conditions">Terms and Conditions</a> | Discount Medical Plan Organization: New Benefits, Ltd., Attn: Compliance Department, PO Box 671309, Dallas, TX 75367-1309.</span></p>

<p class="mb10" style="font-size: 16px;"><span style="font-style: italic;">© 2016&nbsp;Teladoc, Inc. All rights reserved. Teladoc and the Teladoc logo are registered trademarks of Teladoc, Inc. and may not be used without written permission. Teladoc does not replace the primary care physician. Teladoc does not guarantee that a prescription will be written. Teladoc operates subject to state regulation; phone and/or video consultations may not be available in certain states.&nbsp;Consults are not available outside of the U.S. Teladoc does not prescribe DEA controlled substances, non-therapeutic drugs and certain other drugs which may be harmful because of their potential for abuse. Teladoc physicians reserve the right to deny care for potential misuse of services. Teladoc phone consultations are available 24 hours, 7 days a week while video consultations are available during the hours of 7am to 9pm, 7 days a week. Teladoc operates subject to state regulation. <a href="http://cdn.newbenefits.com/documents/Teladoc_AccessTypeMap.pdf" target="_blank">Click here to view a Teladoc Access Map</a></span>
</p>

<p class="mb10" style="font-size: 16px;"><span style="font-style: italic;">Dental Benefit is not available to VT residents.</span></p>

<p class="mb10" style="font-size: 16px;"><span style="font-style: italic;">The  discount program provides access to the Aetna Dental Access<sup>®</sup> network.   This network is administered by Aetna Life Insurance Company (ALIC).   Neither ALIC nor any of its affiliates offers or administers the  discount program.  Neither ALIC nor any of its affiliates is an  affiliate, agent, representative or employee of discount program.   Dental providers are independent contractors and not employees or agents  of ALIC or its affiliates.  ALIC does not provide dental care or  treatment and is not responsible for outcomes.</span></p>


<p class="mb10" style="font-size: 16px;">Lab benefit not available to HI, MA, MD, ND, NJ, NY, RI or SD residents.</p> 
<p style="font-size: 16px;">Not available to UT, KS, VT or WA residents. AR and TN residents: A refund of all fees will be issued if membership is cancelled within the first 30 days.</p>

<?php
	echo '</div>';
}











add_filter( 'get_the_archive_title', function ($title) {

    if ( is_category() ) {

            $title = single_cat_title( '', false );

        } elseif ( is_tag() ) {

            $title = single_tag_title( '', false );

        } elseif ( is_author() ) {

            $title = '<span class="vcard">' . get_the_author() . '</span>' ;

        }

    return $title;

});

if ( ! function_exists( 'some_like_it_neat_setup' ) ) :
	/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
	function some_like_it_neat_setup()
	{

	/**
	 * Set the content width based on the theme's design and stylesheet.
	 */
		if ( ! isset( $content_width ) ) {
			$content_width = 640; /* pixels */
		}

		/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on some_like_it_neat, use a find and replace
		* to change 'some-like-it-neat' to the name of your theme in all the template files
		*/
		load_theme_textdomain( 'some-like-it-neat', get_template_directory() . '/library/languages' );

		/**
		* Add default posts and comments RSS feed links to head.
		*/
		add_theme_support( 'automatic-feed-links' );

		/**
		 * Enable HTML5 markup
		 */
		add_theme_support( 'html5', array(
			'comment-list',
			'search-form',
			'comment-form',
			'gallery',
		) );

		/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
		*/
		add_theme_support( 'post-thumbnails' );

		/*
		* Enable title tag support for all posts.
		*
		* @link http://codex.wordpress.org/Title_Tag
		*/
		add_theme_support( 'title-tag' );

		/*
		* Add Editor Style for adequate styling in text editor.
		*
		* @link http://codex.wordpress.org/Function_Reference/add_editor_style
		*/
		add_editor_style( '/assets/css/editor-style.css' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menu( 'primary-navigation', __( 'Primary Menu', 'some-like-it-neat' ) );

		// Enable support for Post Formats.
		if ( 'yes' === get_theme_mod( 'some-like-it-neat_post_format_support' ) ) {
			add_theme_support( 'post-formats',
				array(
					'aside',
					'image',
					'video',
					'quote',
					'link',
					'status',
					'gallery',
					'chat',
					'audio'
				) );
		}

		// Enable Support for Jetpack Infinite Scroll
		if ( 'yes' === get_theme_mod( 'some-like-it-neat_infinite_scroll_support' ) ) {
			$scroll_type = get_theme_mod( 'some-like-it-neat_infinite_scroll_type' );
			add_theme_support( 'infinite-scroll', array(
				'type'				=> $scroll_type,
				'footer_widgets'	=> false,
				'container'			=> 'content',
				'wrapper'			=> true,
				'render'			=> false,
				'posts_per_page' 	=> false,
				'render'			=> 'some_like_it_neat_infinite_scroll_render',
			) );

			function some_like_it_neat_infinite_scroll_render() {
				if ( have_posts() ) : while ( have_posts() ) : the_post();
						get_template_part( 'page-templates/template-parts/content', get_post_format() );
				endwhile;
				endif;
			}
		}

		// Setup the WordPress core custom background feature.
		add_theme_support(
			'custom-background', apply_filters(
				'some_like_it_neat_custom_background_args', array(
				'default-color' => 'ffffff',
				'default-image' => '',
				)
			)
		);

		/**
		* Including Theme Hook Alliance (https://github.com/zamoose/themehookalliance).
		*/
		include get_template_directory() . '/library/vendors/theme-hook-alliance/tha-theme-hooks.php' ;

		/**
		* WP Customizer
		*/
		include get_template_directory() . '/library/vendors/customizer/customizer.php';

		/**
		* Implement the Custom Header feature.
		*/
		//require get_template_directory() . '/library/vendors/custom-header.php';

		/**
		* Custom template tags for this theme.
		*/
		include get_template_directory() . '/library/vendors/template-tags.php';

		/**
		* Custom functions that act independently of the theme templates.
		*/
		include get_template_directory() . '/library/vendors/extras.php';

		/**
		* Load Jetpack compatibility file.
		*/
		include get_template_directory() . '/library/vendors/jetpack.php';

		/**
		 * Including TGM Plugin Activation
		 */
		include_once get_template_directory() . '/library/vendors/tgm-plugin-activation/class-tgm-plugin-activation.php' ;

		include_once get_template_directory() . '/library/vendors/tgm-plugin-activation/tgm-plugin-activation.php' ;

	}
endif; // some_like_it_neat_setup
add_action( 'after_setup_theme', 'some_like_it_neat_setup' );

/**
 * Enqueue scripts and styles.
 */
if ( ! function_exists( 'some_like_it_neat_scripts' ) ) :
	function some_like_it_neat_scripts_styles()
	{
	
	    // Theme Stylesheet
	    //$suffix = defined('SCRIPT_DEBUG') && SCRIPT_DEBUG ? '' : '-min';
	    //wp_enqueue_style( 'some_like_it_neat-style', get_template_directory_uri() . "/assets/css/style{$suffix}.css", array(), '1.2', 'screen' );	
	    // Nav Scripts
		// wp_enqueue_script( 'mobile-nav', 'https://cdn.jsdelivr.net/g/jquery.flexnav@1.3.3,jquery.hoverintent@r7', array( 'jquery' ), '1.3.3', true );
	}
	add_action( 'wp_enqueue_scripts', 'some_like_it_neat_scripts_styles' );
endif; 






/**
 * Register widgetized area and update sidebar with default widgets.
 */
function some_like_it_neat_widgets_init()
{
	register_sidebar(
		array(
		'name'          => __( 'Sidebar', 'some-like-it-neat' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
		)
	);
	register_sidebar(
		array(
		'name'          => __( 'Call to action', 'some-like-it-neat' ),
		'id'            => 'cta-1',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
		)
	);
}
add_action( 'widgets_init', 'some_like_it_neat_widgets_init' );







/**
 * Add Singular Post Template Navigation
 */
if ( ! function_exists( 'some_like_it_neat_post_navigation' ) ) :
	function some_like_it_neat_post_navigation() {
		if ( function_exists( 'get_the_post_navigation' ) && is_singular() && !is_page_template( 'page-templates/template-landing-page.php' )  ) {
			echo get_the_post_navigation(
				array(
				'prev_text'    => __( '&larr; %title', 'some-like-it-neat' ),
				'next_text'    => __( '%title &rarr;', 'some-like-it-neat' ),
				'screen_reader_text' => __( 'Page navigation', 'some-like-it-neat' )
				)
			);
		} else {
			wp_link_pages(
				array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'some-like-it-neat' ),
				'after'  => '</div>',
				)
			);
		}
	}
endif;
add_action( 'tha_entry_after', 'some_like_it_neat_post_navigation' );












/**
 * Custom Hooks and Filters
 */

if ( ! function_exists( 'some_like_it_neat_optional_scripts' ) ) :
	function some_like_it_neat_optional_scripts()
	{
		// Link Color
		if ( '' != get_theme_mod( 'some_like_it_neat_add_link_color' )  ) {
		} ?>
			<style type="text/css">
				a { color: <?php echo get_theme_mod( 'some_like_it_neat_add_link_color' ); ?>; }
			</style>
		<?php
	}
	add_action( 'wp_head', 'some_like_it_neat_optional_scripts' );
endif;




if ( ! function_exists( 'some_like_it_neat_add_footer_divs' ) ) :
	function some_like_it_neat_add_footer_divs()
	{
	?>
			<div class="footer-left">
				<?php echo esc_attr( get_theme_mod( 'some_like_it_neat_footer_left', __( '&copy; All Rights Reserved', 'some-like-it-neat' ) ) ); ?>
			</div>
			<div class="footer-right">
				<?php echo esc_attr( get_theme_mod( 'some_like_it_neat_footer_right', 'Footer Content Right' ) );  ?>
			</div>
		<?php
	}
	add_action( 'tha_footer_bottom', 'some_like_it_neat_add_footer_divs' );

endif;


function dispute_flexnav() {
 $handle = 'mobile-nav';
 $list = 'enqueued';
 if (wp_script_is( $handle, $list )) {
    ?>
       <script>jQuery(document).ready(function(e){e(".sliding-panel-button,.sliding-panel-fade-screen,.sliding-panel-close").on("click touchstart",function(n){e(".sliding-panel-content,.sliding-panel-fade-screen").toggleClass("is-visible"),n.preventDefault()}),e(".flexnav").flexNav({animationSpeed:250,transitionOpacity:!0,buttonSelector:".menu-button",hoverIntent:!0,hoverIntentTimeout:350,calcItemWidths:!1})});</script>
    <?php
 } 
}
// add_action('bw_after_wp_footer', 'dispute_flexnav');







//*
add_action( 'gform_enqueue_scripts', 'dequeue_gf_stylesheets', 11 );
add_action( 'wp_enqueue_scripts', 'dequeue_gf_stylesheets', 9999 );
add_action( 'wp_head', 'dequeue_gf_stylesheets', 9999 );
add_action( 'gform_enqueue_scripts', 'dequeue_gf_stylesheets', 9999 );
function dequeue_gf_stylesheets() {
    wp_dequeue_style('gforms_css');
    wp_dequeue_style( 'gforms_reset_css' );
    wp_dequeue_style( 'gforms_datepicker_css' );
    wp_dequeue_style( 'gforms_formsmain_css' );
    wp_dequeue_style( 'gforms_ready_class_css' );
    wp_dequeue_style( 'gforms_browsers_css' );
    
    wp_deregister_style('gforms_css');
    wp_deregister_style( 'gforms_reset_css' );
    wp_deregister_style( 'gforms_datepicker_css' );
    wp_deregister_style( 'gforms_formsmain_css' );
    wp_deregister_style( 'gforms_ready_class_css' );
    wp_deregister_style( 'gforms_browsers_css' );
}
// */

/*
add_action( 'gform_enqueue_scripts', 'gform_dequeue_script_list' );
function gform_dequeue_script_list() { 
    global $wp_styles; 
    if( isset($wp_styles->registered['gforms_formsmain_css']) ) {
        unset( $wp_styles->registered['gforms_formsmain_css'] );
	    unset( $wp_styles->registered['gforms_css'] );
	    unset( $wp_styles->registered['gforms_reset_css'] );
	    unset( $wp_styles->registered['gforms_browsers_css'] );
} 
}
// */







/*

add_action('get_header', function() {
	if ( is_page_template( 'savings-card-alt.php' ) ) {
		add_action('wp_head', 'contact_form_temp_fix');
	}
});
		
*/



function wp_trim_all_excerpt($text) {
global $post;
  $raw_excerpt = $text;
  if ( '' == $text ) {
    $text = get_the_content('');
    $text = strip_shortcodes( $text );
    $text = apply_filters('the_content', $text);
    $text = str_replace(']]>', ']]&gt;', $text);
  }
 
$text = strip_tags($text);
$excerpt_length = apply_filters('excerpt_length', 30);
$excerpt_more = apply_filters('excerpt_more', ' ' . '...');
$text = wp_trim_words( $text, $excerpt_length, $excerpt_more ); 
/*$words = explode(' ', $text, $excerpt_length + 1);
  if (count($words)> $excerpt_length) {
    array_pop($words);
    $text = implode(' ', $words);
    $text = $text . $excerpt_more;
  } else {
    $text = implode(' ', $words);
  }
return $text;*/
return apply_filters('wp_trim_excerpt', $text, $raw_excerpt);
}
 
remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'wp_trim_all_excerpt');






//add_image_size( 'home-blog-thumbs', 220, 180, true );
add_image_size( 'home-blog-thumbs', 400, 340, FALSE );
add_image_size( 'blog-thumbnail', 800, 350, array( 'center', 'center' ) );
add_image_size( 'blog-thumbnail-sticky', 1400, 600, array( 'center', 'center' ) );



add_filter( 'gform_enable_field_label_visibility_settings', '__return_true' );


function regiser_b2b_page_sidebar() {
 
    register_sidebar(
        array(
            'id' => 'b2b-form-area',
            'name' => __( 'B2b Page Form Area', 'textdomain' ),
            'description' => __( 'A section on the b2b page to display forms and such.', 'disputebills' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>'
        )
    );
}
add_action( 'widgets_init', 'regiser_b2b_page_sidebar' );


    function excerpt($limit) {
      $excerpt = explode(' ', get_the_excerpt(), $limit);
      if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).'...';
      } else {
        $excerpt = implode(" ",$excerpt);
      } 
      $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
      return $excerpt;
    }

    function content($limit) {
      $content = explode(' ', get_the_content(), $limit);
      if (count($content)>=$limit) {
        array_pop($content);
        $content = implode(" ",$content).'...';
      } else {
        $content = implode(" ",$content);
      } 
      $content = preg_replace('/\[.+\]/','', $content);
      $content = apply_filters('the_content', $content); 
      $content = str_replace(']]>', ']]&gt;', $content);
      return $content;
    }


function removeEmptyLists($content) {
    $content = str_replace("<li></li>","",$content);
    return $content;
   }
// add_filter('the_content', 'removeEmptyLists');
