<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package some_like_it_neat
 */
?>
<style>
#mc-email {
    text-indent: 24px;
}
/* POLICY */
.site-policy .modal-body p {
    font-size: 19px;
    line-height: 1.5;
    margin-top: 10px;
}
.site-policy .modal-body h3 {
    margin: 25px 0 10px;
}
.site-policy .modal-body .fa-info-circle,
.site-policy .modal-body .fa-check {
    margin-right: 5px;
    font-size: 19px;
    color: #949494;
}
.site-policy .modal-body li {
    line-height: 1.4;
    font-size: 18px;
}
.site-policy .modal-body {
    position: relative;
    padding: 30px 45px;
}
.site-policy .modal-body ul.list-unstyled {
    font-size: 19px;
    margin-top: 10px;
    padding-left: 10px;
}
</style>

 <?php tha_footer_before(); ?>







<footer class="site-footer page-footer footer-light pt60" itemscope="" itemtype="http://schema.org/WPFooter">


  <div class="container">
  <?php tha_footer_top(); ?>
    <div class="row footer-col-spacing">

           <div class="col-sm-2 col-md-2 mb2 mb0-md">

        <h3>Learn More</h3>
        <ul class="footer-nav list-unstyled">
          <li><a href="https://disputebills.com/organizations/">Business Savings</a></li>
          <li><a href="http://disputebills.com/about/">Bill Advocacy</a></li>
          <li><a href="https://www.google.com/search?q=DisputeBills.com,+410+N+May+St,+Chicago,+IL+60642&amp;ludocid=4623522630927340898#lrd=0x880e2cd658cd02db:0x402a0d561b675562,1">Reviews</a></li>
        </ul>
      </div>
      <div class="col-sm-2 col-md-2 mb2 mb0-md">
        <h3>Resources</h3>
        <ul class="footer-nav list-unstyled">
          <li><a href="https://disputebills.zendesk.com/hc/en-us">Support</a></li>
          <li><a href="https://app.disputebills.com/clients/sign_up">Register</a></li>
          <li><a href="http://disputebills.com/blog/">Blog</a></li>
        </ul>
      </div>
      <div class="col-sm-2 col-md-2 mb2 mb0-md">
        <h3>Contact Us</h3>
        <ul class="footer-nav list-unstyled">
          <li><a href="#" data-toggle="modal" data-target="#modal-google-map">410 N May St, Chicago</a></li>
          <li><a href="tel:+18886222809">(888) 622-2809</a></li>
          <li><a href="mailto:info@disputebills.com">info@disputebills.com</a></li>
        </ul>
      </div>

     <div class="col-sm-5 col-sm-offset-1 col-md-5 sub-form mb2 mb0-md">
        <h3>SUBSCRIBE</h3>
        <p style="
  font-size: 16px;
  margin-bottom: 9px;
  color: #000;
">Get news delivered directly to your inbox.</p>
        <form id="mc-form" novalidate="true">
          <div class="input-group"> 
            <i class="fa fa-envelope" style="
  position: absolute;
  z-index: 999;
  top: 15px;
  left: 15px;
  color: #b5b5b5;
"></i>
            <input type="email" class="form-control input-lg" placeholder="Email Address" required="" id="mc-email" name="EMAIL" style="margin-top: 0; border-radius: 4px 0px 0px 4px;">
            <span class="input-group-btn">
              <button type="submit" class="btn" style="background-color: #0f92cd; padding: 12px 18px;"><i class="fa fa-paper-plane" style="color: #fff;"></i></button>
            </span>
          </div>
        </form>
      </div>

    </div>
  </div>
</footer>

 


<footer class="page-footer" role="contentinfo" itemscope="itemscope" itemtype="http://schema.org/WPFooter">
<div class="container pt40 pb40 disclosures">
  <div class=row>
    <div class="col-sm-12">
    <style>
               img[src^="https://content.newbenefits.com"] {
                  display: none;
               }
               #page > footer > div > div:nth-child(1) > div > h2 {
                  font-size: 36px;
               }
               .disclosures h2 {
                  display: none;
               }
               #mc-email {
                text-indent: 25px;
               }

.site-policy .fa-circle-o {
  font-size: 12px;
  margin-top: -1px;
  margin-right: 5px;
}

            </style>

<!--
<p style="font-size: 15px; line-height: 1.5;" class="pt10"><strong>This discount card program is NOT insurance</strong><span>, not intended to replace insurance, and does not meet the minimum creditable coverage requirements under the Affordable Care Act or Massachusetts M.G.L. c. 111M and 956 CRM 5.00. <strong>It contains a 30 day cancellation period,</strong> provides discounts only at the offices of contracted health care providers, and each member is obligated to pay the discounted medical charges in full at the point of service. For a complete list of disclosures, please <a title="Disclosures" target="_blank" href="http://content.newbenefits.com/feed.aspx?hash=1nCjynVyHgD3qMTJC7SQg">click here</a>. | <a title="Terms and Conditions" target="_blank" href="http://content.newbenefits.com/feed.aspx?hash=6519gRcOdLk4PKnqDA">Terms and Conditions</a> | Discount Medical Plan Organization: New Benefits, Ltd., Attn: Compliance Department, PO Box 671309, Dallas, TX 75367-1309.</span><strong></strong></p> -->




<?php do_action('db_disclosures'); ?> 






            </div>
            </div>
</div>



    
  </footer>



<footer class="copyright-terms pt10 pb10">
  <div class="container">
    <div class="grid-noGutter-middle text-center-not-sm">
      <div class="cell-12_md-7 mb1 mb0-sm"> <small class="copyright">©2016 Dispute Bills. All Rights Reserved. | <a href="#" data-toggle="modal" data-target="#modal-terms">Terms of Use</a>
</small> </div>
      <div class="cell-12_md-5">
        <div class="terms-privacy">
        <ul class="social list-inline social-media text-right-sm">
          <li class="hidden-xs hidden-sm">
            <a href="http://www.bbb.org/chicago/business-reviews/medical-billing-services/disputebills-com-in-chicago-il-90002872/" alt="Better Business Bureau" style="width: 115px; opacity: .8;">
              <img src="https://disputebills.com/assets/uploads/2016/05/bbb-horizontal-ab-seal.png" style="width: 115px;">
            </a>
          </li>
          <li><a href="https://www.facebook.com/disputebills" class="a-facebook"><i class="fa fa-facebook"></i></a></li>
          <li><a href="https://twitter.com/disputebills" class="a-twitter"><i class="fa fa-twitter"></i></a></li>
          <li><a href="https://plus.google.com/103378801284776045769" class="a-google-plus"><i class="fa fa-google-plus"></i></a></li>
          <li><a href="https://www.linkedin.com/company/dispute" class="a-google-linkedin"><i class="fa fa-linkedin"></i></a></li>
        </ul>
        </div>
      </div>
    </div>
  </div>
</footer>


<!-- MAP -->
<div class="modal fade" id="modal-google-map" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <div class="modal-body">
        <div class="map">
          <div id="map-canvas"></div>
        </div>
      </div>
    </div>
  </div>
</div>




<!-- TERMS OF USE -->
<div class="modal fade site-policy" id="modal-terms" tabindex="-1" role="dialog" aria-labelledby="ModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
      <div class="modal-header">
        <h2 class="modal-title text-center" id="ModalLabel">Terms of Use</h2>
      </div>
      <div class="modal-body">
        <p>This privacy policy discloses the privacy practices for (website address). This privacy policy applies solely to information collected by this web site. It will notify you of the following: </p>
        <ul class="list-unstyled">
          <li><i class="fa fa-circle-o"></i> What personally identifiable information is collected from you through the web site.</li>
          <li><i class="fa fa-circle-o"></i> What choices are available to you regarding the use of your data.</li>
          <li><i class="fa fa-circle-o"></i> The security procedures in place to protect the misuse of your information.</li>
          <li><i class="fa fa-circle-o"></i> How you can correct any inaccuracies in the information.</li>
        </ul>
        <h3>Information Collection, Use, and Sharing </h3>
        <p>We are the sole owners of the information collected on this site. We only have access to/collect information that you voluntarily give us via email or other direct contact from you. We will not sell or rent this information to anyone.</p>
        <p>We will use your information to respond to you, regarding the reason you contacted us. We will not share your information with any third party outside of our organization, other than as necessary to fulfill your request, e.g. to ship an order.</p>
        <p>Unless you ask us not to, we may contact you via email in the future to tell you about specials, new products or services, or changes to this privacy policy.</p>
        <h3>Your Access to and Control Over Information </h3>
        <p>You may opt out of any future contacts from us at any time. You can do the following at any time by contacting us via the email address or phone number given on our website:</p>
        <ul class="list-unstyled">
          <li><i class="fa fa-circle-o"></i>See what data we have about you, if any.</li>
          <li><i class="fa fa-circle-o"></i>Change/correct any data we have about you.</li>
          <li><i class="fa fa-circle-o"></i>Have us delete any data we have about you.</li>
          <li><i class="fa fa-circle-o"></i>Express any concern you have about our use of your data.</li>
        </ul>
        <h3>Security </h3>
        <p>We take precautions to protect your information. When you submit sensitive information via the website, your information is protected both online and offline.</p>
        <p>Wherever we collect sensitive information (such as credit card data), that information is encrypted and transmitted to us in a secure way. You can verify this by looking for a closed lock icon at the bottom of your web browser, or looking for "https" at the beginning of the address of the web page.</p>
        <p>While we use encryption to protect sensitive information transmitted online, we also protect your information offline. Only employees who need the information to perform a specific job (for example, billing or customer service) are granted access to personally identifiable information. The computers/servers in which we store personally identifiable information are kept in a secure environment.</p>
        <h3>Registration </h3>
        <p>In order to use this website, a user must first complete the registration form. During registration a user is required to give certain information (such as name and email address). This information is used to contact you about the products/services on our site in which you have expressed interest. At your option, you may also provide demographic information (such as gender or age) about yourself, but it is not required.</p>
        <h3>Orders </h3>
        <p>We request information from you on our order form. To buy from us, you must provide contact information (like name and shipping address) and financial information (like credit card number, expiration date). This information is used for billing purposes and to fill your orders. If we have trouble processing an order, we'll use this information to contact you.</p>
        <h3>Cookies </h3>
        <p>We use "cookies" on this site. A cookie is a piece of data stored on a site visitor's hard drive to help us improve your access to our site and identify repeat visitors to our site. For instance, when we use a cookie to identify you, you would not have to log in a password more than once, thereby saving time while on our site. Cookies can also enable us to track and target the interests of our users to enhance the experience on our site. Usage of a cookie is in no way linked to any personally identifiable information on our site.</p>
        <h3>Updates</h3>
        <p>Our Privacy Policy may change from time to time and all updates will be posted on this page.</p>
        <p>If you feel that we are not abiding by this privacy policy, you should contact us immediately via telephone at <a href="tel:+18886222809">(888) 622-2809</a> or via email <a href="mailto:info@disputebills.com">info@disputebills.com</a></p>
      </div>
    </div>
  </div>
</div>






<?php tha_footer_after(); ?>

</div>
<?php wp_footer(); ?>
<?php do_action('bw_after_wp_footer'); ?>
<?php tha_body_bottom(); ?>


<!-- ============= JAVASCRIPT ============ -->
<script src='https://rawgit.com/pguso/jquery-plugin-circliful/master/js/jquery.circliful.js'></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/jquery.sticky.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/waypoints.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/jquery.magnific-popup.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/typed.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/owl.carousel.min.js"></script>
<!--<script src="https://cdn.rawgit.com/bryanwillis/ca0164c9f3832dcb871a4eec8da079de/raw/f7baa6d7530dd0a7f91ec78990e549af0c8f1090/scrollme.min.js"></script>-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCeiAqBN-Xwh-zUxrZTXWQIjgmaDiIPo28"></script>
<script src="https://cdn.jsdelivr.net/scrollreveal.js/3.3.1/scrollreveal.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/app.js"></script>
<script>
var fooReveal = {
  delay    : 200,
  distance : '90px',
  easing   : 'ease-in-out',
  rotate   : { z: 10 },
  scale    : 1.1
};
window.sr = ScrollReveal();
sr.reveal('.foo', fooReveal);
sr.reveal('.org-img-responsive, .org-features-h3, .large-p', { delay: 500, scale: 0.9 });
sr.reveal('.bgfbox .bfgbox-not-first', { duration: 2000 }, 50);
</script>

</body>
</html>