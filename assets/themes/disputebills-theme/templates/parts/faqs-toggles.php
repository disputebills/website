<style>
.faq .panel-group .panel {
  margin-bottom: 0;
  border-radius: 0px;
  border: none;
  box-shadow: none;
  border-bottom: 1px solid #ddd;
  margin-top: 0px;
}
.panel-default>.panel-heading+.panel-collapse>.panel-body {
  border-top: none;
}
.faq .panel-default>.panel-heading {
  color: #333;
  background-color: transparent;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
  padding: 0;
  border: none;
}
.faq-icon-chevron {
  display: flex;
  align-items: r;
  margin-left: auto;
  font-size: 20px;
  margin-right: 15px;
  color: #0c6793;
  font-weight: 600;
}
.faq .panel-title > a  {
  justify-content: left;
  align-items: center;
  display: flex;
  width: 100%;
  padding: 30px 0;
  margin-bottom: 0;
  text-decoration: none!important;
  border: none!important;
}
.faq h4 a:hover, h5 a:hover, h6 a:hover {
  border-bottom: none;
}
.faq h4 {
  font-size: 24px;
}
.faq .panel-title > a[aria-expanded="true"] .faq-icon-chevron.lnr-chevron-down:before {
  content: "\e939"!important;
}
.faq .panel-title > a[aria-expanded="false"].collapsed .faq-icon-chevron.lnr-chevron-down:before {
  content: "\e93a"!important;
}
</style>
<?php $collapse_href = 1; ?>
<?php $collapse_id = 1; ?>
<section class="faq pt70 pb70" id="faq">
  <div class="container">
    <header class="section-header text-center mb50">
      <h2 class="brandon-text-medium"><?php the_field( 'top_questions_section_header' ); ?></h2>
    </header>
    <div class="row">
      <div class="col-sm-10 col-sm-offset-1">
        <div class="panel-group" id="accordion">

          <?php if ( have_rows( 'top_questions_question_answer_fields' ) ) : ?>
          <?php while ( have_rows( 'top_questions_question_answer_fields' ) ) : the_row(); ?>
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse-<?php echo ($collapse_href++); ?>"><?php the_sub_field( 'top_questions_question' ); ?> <span class="faq-icon-chevron lnr lnr-chevron-down"></span></a>
              </h4>
            </div>
            <div id="collapse-<?php echo ($collapse_id++); ?>" class="panel-collapse collapse">
              <div class="panel-body">
                <p><?php the_sub_field( 'top_questions_answer' ); ?></p>
              </div>
            </div>
          </div>
          <?php endwhile; ?>
          <?php endif; ?>
<div class="mt80 text-center">
<h4>Don’t see your question? <a style="color: #009cde" href="https://disputebills.zendesk.com/hc/en-us">Visit our Help Center</a></h4>
<p>Have a question you’d like answered? Email us at <strong><a style="color: #009cde" href="mailto:info@disputebills.com">info@disputebills.com</a></strong> or submit a request <strong><a style="color: #009cde" href="https://disputebills.zendesk.com/hc/en-us/requests/new">here</a></strong>.</p>
</div>
        </div><!-- / .panel-group -->
      </div><!-- / .col-sm-10.col-sm-offset-1 -->
    </div><!-- / .row -->
  </div><!-- / .container -->
</section>