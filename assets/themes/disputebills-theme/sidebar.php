<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package some_like_it_neat
 */
?>
	<?php tha_sidebars_before(); ?>


<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
    <?php dynamic_sidebar( 'sidebar-1' ); ?>
<?php endif; ?>


    <?php tha_sidebar_bottom(); ?>

	</div><!-- #secondary -->

    <?php tha_sidebars_after(); ?>
