<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package some_like_it_neat
 */

get_header(); 

$the_query = new WP_Query([
    'posts_per_page' => -1,
    'meta_query' => [
    'relation' => 'AND',
    [
        'key'     => '_thumbnail_id',
        'compare' => 'EXISTS',
    ]
    ],
    'post_status'    => 'publish',
    'orderby'        => 'date'
]);
?>
 
 <style>
@media (min-width: 768px) {
  .container.container-mixed {
    width: 98%;
    max-width: 1150px;
  }
}
@media (min-width: 640px) and (max-width: 767px) {
  .container.container-mixed {
    padding-left: 60px;
    padding-right: 60px;
  }
}
@media (min-width: 481px) and (max-width: 640px) {
  .container.container-mixed {
    padding-left: 30px;
    padding-right: 30px;
    width: 100%;
  }
}
@media (min-width: 1200px) {
  .container.container-mixed {
    width: 1170px;
  }
}
 .thumbnail {
  display: block;
  margin-bottom: 20px;
  line-height: 1.42857143;
  background-color: #fff;
  border: none;
  border-radius: 0px;
  -webkit-transition: border .2s ease-in-out;
  transition: border .2s ease-in-out;
}
.text-black {
  color: #000;
}
.cats {
  padding: 10px 0;
  display: block;
  font-weight: 500;
  color: #089de3;
}
.author-name {
  color: #089de3;
}
.thumbnail .caption {
  padding: 0;
}
div#primary {
  padding-top: 10px;
}
a.blog-thumb-img img {
	width: 100%;
	-webkit-transition: -webkit-transform 300ms;
	transition: -webkit-transform 300ms;
	transition: transform 300ms;
	transition: transform 300ms, -webkit-transform 300ms;
	-webkit-transform-origin: 50% 50%;
	transform-origin: 50% 50%;
	-webkit-backface-visibility: hidden;
	backface-visibility: hidden;
	height: auto;
}

a.blog-thumb-img:hover img, a.blog-thumb-img:focus img {
	-webkit-transform: scale(1.02);
	transform: scale(1.02);
}
</style>
<header class="main-header pt60 pb60 mb30 text-center" style="position: relative; background-color: #ddecf2;">
<div class="container">
<div class="flex_grid">
<div class="flex_col-8_md-10_xs-12" data-push-left="off-2_md-1_xs-0">
    <h2 style="font-size: 42px;margin-bottom: 20px;font-family: 'brandon-text-bold';">The CleanBill Blog</h2>
    <p style="color: #6b6b6b; font-size: 23px;">Expert advice to help you understand your medical bills.</p>
<?php if ( is_active_sidebar( 'jumbotron' ) ) : ?>
  <div>
    <?php dynamic_sidebar( 'jumbotron' ); ?>
  </div>
<?php endif; ?>
</div>
</div>
</div>
</header>



	<div id="primary" class="content-area">
		<div id="content" class="site-content">

			<div class="post-index-container container container-mixed">



<div class="grid">
<div class="cell-12_md-9">
<?php if ( $the_query->have_posts() ) : ?>
  <div class="grid-equalHeight">
  <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
            <?php if ( is_sticky() ) : ?>
              <div id="post-<?php the_ID(); ?>" class="cell-12 mb20">
                <article class="thumbnail item pr1-sm pr2-md" itemscope="" itemtype="http://schema.org/CreativeWork">
                    <a class="blog-thumb-img" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                        <?php the_post_thumbnail( 'blog-thumbnail-sticky' ); ?>
                    </a>
                    <span class="cats"><?php 
                      $categories = get_the_category();
                      if ( ! empty( $categories ) ) {
                        echo esc_html( $categories[0]->name );   
                      }
                    ?></span>
                    <div class="caption">
                        <h4 itemprop="headline"><a class="text-black" href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h4>
                        <p itemprop="text" class="flex-text text-muted"><?php echo excerpt(200); ?></p> 
                        <p class="post-date text-muted"> By <span class="author-name"><?php the_author(); ?></span> • <?php echo get_the_date(); ?> • <?php comments_number( '0 comments', '1 comment', '% comments' ); ?></p> 
                    </div>
                    <!-- /.caption -->
                </article>
              </div>
            <?php else: ?>
              <div id="post-<?php the_ID(); ?>" class="cell-6 mb20">
                <article class="thumbnail item pr1-sm pr2-md" itemscope="" itemtype="http://schema.org/CreativeWork">
                    <a class="blog-thumb-img" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                        <?php the_post_thumbnail( 'blog-thumbnail' ); ?>
                    </a>
                    <span class="cats"><?php 
                      $categories = get_the_category();
                      if ( ! empty( $categories ) ) {
                        echo esc_html( $categories[0]->name );   
                      }
                    ?></span>
                    <div class="caption">
                        <h4 itemprop="headline"><a class="text-black" href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h4>
                        <p style=" font-size: 14px;" class="post-date text-muted"> By <span class="author-name"><?php the_author(); ?></span> • <?php echo get_the_date(); ?> • <?php comments_number( '0 comments', '1 comment', '% comments' ); ?></p> 
                    </div>
                    <!-- /.caption -->
                </article>
              </div>
            <?php endif; ?>
               
  <?php endwhile; ?>
  </div>
  <?php wp_reset_postdata(); ?>
<?php endif; ?>
				</div>
				<div class="cell-12_md-3 hidden-xs">
					<?php get_sidebar(); ?>
				</div>
			</div>
			</div>
		</div><!-- #content -->
	</section><!-- #primary -->

<?php get_footer(); ?>