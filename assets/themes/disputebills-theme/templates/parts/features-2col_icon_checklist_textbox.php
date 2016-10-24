<style>
.flex-length.flex-1 {
  display: flex;
  flex-direction: row;
  flex: 1;
}
.benefits-cta {
  background: #f7f7f7;
}
.text-black {
  color: #000;
}
</style>
<section class="benefits-cta pt70 pb70">
<div class="container">
    <header class="section-header text-center mb60">
      <h2 class="brandon-text-medium"><?php the_field( 'more_benefits_section_title' ); ?></h2>
      <h3><?php the_field( 'more_benefits_section_subtitle' ); ?></h3>
    </header>
<div class="flex-row row reasons-check-boxes">
<?php if ( have_rows( 'more_benefits_section_items' ) ) : ?>
  <?php while ( have_rows( 'more_benefits_section_items' ) ) : the_row(); ?>
  <div class="col-sm-6">
    <div class="flex-length flex-1 mb2 mb3-sm">
      <span class="box-icon-left">
        <i class="fa fa-check" aria-hidden="true"></i>
      </span>
      <span class="box-text-right pl2 pl3-md">
        <h4 class="fw-5 fs-15-r text-black"><?php the_sub_field( 'more_benefits_section_feature_title' ); ?></h4>
        <p><?php the_sub_field( 'more_benefits_section_feature_detail' ); ?></p>
      </span>
    </div>
  </div>
  <?php endwhile; ?>
<?php else : ?>
  <?php // no rows found ?>
<?php endif; ?>
</div>
</div>
</section>