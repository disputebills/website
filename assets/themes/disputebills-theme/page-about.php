<?php /* Template Name: About */ ?>

<?php get_header(); ?>
<style>
/* JUMBOTRON */
.jumbotron {
    background: -webkit-linear-gradient(left, rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0)), url(http://disputebills.com/assets/uploads/3-copy.png) no-repeat center;
    background: linear-gradient(to right, rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0)), url(http://disputebills.com/assets/uploads/3-copy.png) no-repeat center;
    height: 500px;
    background-image: url(https://disputebills.com/assets/uploads/2016/05/advocate_upjubc.jpg);
    background-repeat: no-repeat;
    background-position: center;
    height: auto!important;
    background-size: cover;
}
@media screen and (min-width: 768px) {
    .jumbotron {
        padding-top: 100px;
        padding-bottom: 100px;
    }
}
.header-text {
    padding-bottom: 0px!important;
}
.header-text .header-links {
    margin-top: 5rem;
}


/* CALLOUT */
.callout h3 em:after {
    position: absolute;
    top: 43px;
    background-image: url(http://disputebils16.staging.wpengine.com/assets/uploads/2016/08/underline.png);
    background-size: 87%;
    display: inline-block;
    width: 168px;
    height: 22px;
    content: "";
    background-repeat: no-repeat;
    left: 0;
}
.callout h3 em {
    border-bottom: none!important;
    position: relative;
}
.callout h3 {
    font-size: 36px;
    color: #fff;
}
.callout h3 em {
    border-bottom: 3px solid #fff;
}
.callout-footer-btn {
    margin-left: 30px;
}
.callout h3 {
    font-size: 36px;
    color: #fff;
}
.callout h3 em {
    border-bottom: 3px solid #fff;
}
.callout-footer-btn {
    margin-left: 30px;
}
.callout .only-x-price {
    font-family: "Covered By Your Grace";
    font-style: normal;
    font-weight: normal;
    position: absolute;
    right: 69px;
    top: -54px;
    text-align: center;
    color: #FFF;
    -webkit-transform: rotate(15deg);
    transform: rotate(15deg);
    font-size: 38px;
}
.callout .only-x-price:after {
    content: '';
    position: absolute;
    max-width: 100%;
    top: 52px;
    right: 60px;
    width: 60px;
    height: 60px;
    background: url('https://www.clickdesk.com/assets/images/get-started-arrow.png') no-repeat;
    background-size: 60px 60px;
}



/* HOW IT WORKS */
.how-it-works [class*='col-'] {
    -webkit-box-align: center;
    -ms-flex-align: center;
    -ms-grid-row-align: center;
    align-items: center;
}
.how-it-works .icon-box-circle-bg-center {
    line-height: 2;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center;
    width: 100px;
    height: 100px;
    background: #0097db;
    color: #fff;
    border-radius: 50%;
    font-size: 32px;
    margin-bottom: 20px;
    text-align: center;
    margin: 0 auto;
    left: 0;
    right: 0;
    margin-bottom: 20px;
    background-color: #084f70;
}


/* GUARANTEE */
.our-guarantee .image-block {
    background: url('http://disputebills.com/assets/uploads/2016/01/older-couple.jpg') no-repeat center;
    background: url(http://i.istockimg.com/image-zoom/77027747/3/380/253/stock-photo-77027747-architect-presenting-a-new-project-on-tablet-to-a-couple.jpg) no-repeat center;
    background-size: cover;
    background-position: top;
    height: 100%;
    position: absolute;
    width: 50%;
}
.our-guarantee .image-block-left {
    left: 0;
}
.our-guarantee .checkmark-list li {
    font-size: 24px;
}
</style>

<main id="main" class="site-main wrap">


<!-- HEADER / BANNER -->
<header class="jumbotron text-center" itemscope="" itemtype="http://schema.org/WPHeader">
   <div class="container">
      <div class="header-text">
         <h1>About Us</h1>
         <p class="subheader">We’re a national provider of medical billing review and reduction services.</p>
         <ul class="header-links list-unstyled">
            <li><a href="https://app.disputebills.com/clients/sign_up" class="btn btn-lg btn-callout">Start My Dispute</a></li>
         </ul>
      </div>
   </div>
</header>


<!-- INTRO & VIDEO  -->
<section class="text-image-container pt100 pb100">
   <div class="container">
      <div class="row flex-row">
         <div class="col-sm-6">
            <h2 class="text-primary brandon-text-light fw-5 fs-26-r">Our Story</h2>
            <p class="fs-13-r lead fw-4">Co-Founder Matt Moulakelis faced the challenge of medical debt after his father suffered from a near-fatal heart attack in 2013. $156,000 in surprise bills prompted a question. What if these bills are incorrect? Over $100,000 in savings later and DisputeBills was born. Now, an advocate for patients nationwide, DisputeBills has become a leader in medical bill review and reduction services.</p>
         </div>
         <div class="col-sm-6">
            <img class="img-responsive" src="https://disputebills.com/assets/uploads/2016/01/medical-form.jpg" alt="DisputeBills Mission">
         </div>
      </div>
   </div>
</section>


<!-- GUARANTEE  -->
<section class="image-content-blocks our-guarantee">
   <div class="container-fluid">
   <div class="row flex-row ">
   <div class="image-block image-block-left" style="background-image: url( 'http://disputebills.com/assets/uploads/2016/06/medical-care-do-communities-give.jpg');"></div>
   <div class="col-md-6 col-md-offset-6 col-lg-5 col-lg-offset-6 bg-white" style="background: #f7f7f7;">
      <div class="text-block pt80 pb80 pl40 ">
         <h2 class="fw-5">Our Mission</h2>
         <h4 class="text-primary mb20 fw-3 fs-16-r">Our number one goal is preventing medical debt. Our mission is much larger.</h4>
            <p class="fs-13-r lead fw-4 mb10">Clarity. Medical billing and health insurance is a complex process, often leaving patients with an inaccurate bills, stress, and a lack of faith in the healthcare system.</p>
            <p class="fs-13-r lead fw-4 mb10">Transparency. No more confusion. Know exactly what you owe and why.</p>
            <p class="fs-13-r lead fw-4 mmb10">Peace of Mind. Not only will we reduce your medical debt, we will reduce any stress that comes along with it.</p>
      </div>
   </div>
</section>


<!-- START MY DISPUTE CTA -->
<section class="callout-wrapper">
   <div class="callout">
      <div class="callout-container container-fluid-max">
         <div class="callout-text row">
            <div class="col-xs-12 col-sm-8">
               <h2>Do you have <strong>5 minutes</strong>?</h2>
               <p class="subheader">If so, you can dispute a bill today–it's that easy.</p>
               <a href="https://app.disputebills.com/clients/sign_up" class="btn btn-callout btn-lg">Start My Dispute</a>
            </div>
            <div class="hidden-xs col-sm-3 col-sm-offset-1"><img alt="Start Dispute" src="http://disputebils16.staging.wpengine.com/assets/uploads/2016/08/dispute-mobile-app.png" width="283"></div>
         </div>
      </div>
   </div>
</section>


<?php tha_content_bottom(); ?>
</main><!-- #main -->
<?php tha_content_after(); ?>
<?php get_footer(); ?>