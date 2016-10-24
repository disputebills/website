<style>
.works-icon-box-right {
  padding-left: 85px;
}
.icon-box-left {
  position: absolute;
  line-height: 2;
}
.icon-box-right {
  padding-left: 25px;
}
.reasons-check-boxes.flex-row.row > [class*='col-'] {
  margin-bottom: 25px;
}
.reasons-check-boxes h4 {
  color: #000;
  font-size: 23px;
  text-transform: capitalize;
}
.reasons-check-boxes p {
  font-size: 19px;
}
</style>
<!--features end--> 

<section class="benefits-cta pt70 pb70">
   <div class="container">
      <header class="section-header text-center mb60" <?php if(function_exists("live_edit")){ live_edit('more_benefits_section_title, more_benefits_section_subtitle'); }?>>
         <h2 ><?php the_field( 'more_benefits_section_title' ); ?></h2>
         <h3><?php the_field( 'more_benefits_section_subtitle' ); ?></h3>
      </header>
      <div class="flex-row row reasons-check-boxes">
         <?php if ( have_rows( 'more_benefits_section_items' ) ) : ?>
         <?php while ( have_rows( 'more_benefits_section_items' ) ) : the_row(); ?>
         <div class="col-sm-6">
            <span class="icon-box-left">
            <i class="fa fa-check" aria-hidden="true"></i>
            </span>
            <span class="icon-box-right">
               <h4><?php the_sub_field( 'more_benefits_section_feature_title' ); ?></h4>
               <p><?php the_sub_field( 'more_benefits_section_feature_detail' ); ?></p>
            </span>
         </div>
         <?php endwhile; ?>
         <?php endif; ?>
      </div>
   </div>
</section>