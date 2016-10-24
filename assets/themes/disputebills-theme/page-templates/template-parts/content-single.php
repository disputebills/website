<?php
/**
 * @package some_like_it_neat
 */
?>
<?php tha_entry_before(); ?>
<style>
thead>tr>td {
	font-weight: 700;
}
[itemprop="articleBody"] a {
	color: #0f92cd;
}
p {
	line-height: 1.5
}
#custom-bg {
	height: auto!important;
}
#custom-bg .header-text {
	padding-bottom: 0!important;
}
h3, h4 {
	color: #4c4c4c;
	font-weight: 500;
}

.author-block {
	display: block;
	-webkit-box-shadow: 2px 2px 2px -1px rgba(236, 236, 236);
	-moz-box-shadow: 2px 2px 2px -1px rgba (236, 236, 236);
	box-shadow: 2px 2px 2px -1px rgb(236, 236, 236);
}
article p + p {
	margin-top: 10px;
}

article strong {
	color: #3e3e3e;
}

[itemprop="articleBody"] ol li:before {
	content: counter(step-counter);
	border-radius: 50%;
	border: 1px solid #ccc;
	left: -45px;
	position: absolute;
	top: 15px;
	top: 0px;
	font-size: 16px;
	height: 30px;
	width: 30px;
	padding: 0px;
	text-align: center;
	font-weight: 400;
	color: rgb(117, 117, 117);
	line-height: 1.74;
}
[itemprop="articleBody"] ol {
	padding-left: 30px;
}
[itemprop="articleBody"] ol li {
	display: inline-block;
	counter-increment: step-counter;
	padding: 0px 0;
	margin: 10px 0;
	line-height: 1.5;
	font-size: 18px;
	color: rgb(117, 117, 117);
	text-rendering: optimizeLegibility;
	-webkit-font-smoothing: antialiased;
	-moz-osx-font-smoothing: grayscale;
	width: 98%;
	position: relative;
}
[itemprop="articleBody"] img {
	padding-top: 20px;
	padding-bottom: 20px;
}
[itemprop="articleBody"] p img {
	padding-top: 20px;
	padding-bottom: 15px;
}
.entry-header p {
	font-weight: 500;
	margin-bottom: 10px;
}
[itemprop="articleBody"] p {
	color: #7b7b7b;
}
[itemprop="articleBody"] h2 {
	font-weight: 500;
	font-size: 26px;
}
@media screen and (min-width: 45em) {
[itemprop="articleBody"] h2 {
	font-size: 42px;
	margin-bottom: 20px;
}
}
.embed-responsive {
	margin-top: 10px;
	margin-bottom: 20px;
}


.alert-data-list {
	padding: 30px 27px;
}
.alert-data-list ul {
	margin-bottom: 0;
	padding-left: 0;
	list-style-type: none;
}
.alert-data-list ul > li {
	position: relative;
	line-height: 1.5;
	margin-bottom: 13px;
	font-size: 18px;
	padding-left: 22px;
	display: inline-block;
	color: #095175;
	font-weight: 500;
}
.alert-data-list ul > li:before {
	position: absolute;
	left: 0px;
	top: 11px;
	text-align: center;
	content: "\f111";
	display: inline-block;
	font: normal normal normal 14px/1 FontAwesome;
	text-rendering: auto;
	-webkit-font-smoothing: antialiased;
	-moz-osx-font-smoothing: grayscale;
	font-size: 11px;
	color: #70adcc;
}
.alert-data-list ul > li span {
	padding-left: 22px;
	display: inline-block;
	color: #095175;
	font-weight: 500;
}
thead tr td {
	vertical-align: middle!important;
}
.alert-data-list ul > li:last-of-type {
	margin-bottom: 0;
}
</style>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemType="http://schema.org/BlogPosting">
	<?php tha_entry_top(); ?>

	<?php if (has_post_thumbnail( $post->ID ) ): ?>
	<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>

	<?php endif; ?>
	<header class="entry-header page-header"  id="custom-bg" style="background: url('<?php echo $image[0]; ?>') no-repeat center; background-size: cover;">
<!--
		<div class="entry-meta">
			<span class="genericon genericon-time"></span> <?php some_like_it_neat_posted_on(); ?>
		</div>
-->
		<div class="header-text">
			<p><?php the_date(); ?></p>
			<h1 class="entry-title" itemprop="name" ><?php the_title(); ?></h1>
		</div>
	</header><!-- .entry-header -->

	<div class="container" itemprop="articleBody">
		<div class="grid">
			<div class="py-xs-30 py-sm-50 cell-12_sm-10_lg-8" data-push-left="off-0_sm-1_lg-2">

		<?php the_content(); ?>

		<div class="author-block">
			<div class="author-image">
				<?php echo get_avatar( get_the_author_email() ); ?>
			</div>
			<div class="author-text">
				<h6>About the Author</h6>
				<h5><?php the_author_meta('display_name'); ?></h5>
				<p><?php the_author_meta('description'); ?></p>
			</div>
		</div>
		</div>
		</div>
	</div><!-- .entry-content -->

	<?php tha_entry_bottom(); ?>
</article><!-- #post-## -->
<?php tha_entry_after(); ?>
