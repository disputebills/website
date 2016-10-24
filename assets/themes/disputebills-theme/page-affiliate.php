<?php /* Template Name: Affiliate */ ?>
<!DOCTYPE html>
<html>
<head>
  <title>DisputeBills</title>
  <link rel="stylesheet" media="all" href="https://app.disputebills.com/assets/application-4d35726f69e4d237a8b550a665efd035ca42eaf670c17d936cf80b59edb8b71e.css" />
  <link href='https://fonts.googleapis.com/css?family=Noto+Sans:400,700' rel='stylesheet' type='text/css'>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <script src="https://use.fontawesome.com/e52051a084.js"></script>
    <?php wp_head(); ?>
</head>
<body>
  <nav class="primary-navigation">
<a href="/cases">
<img alt="Dispute Bills Logo" class="logo" src="https://app.disputebills.com/assets/dispute-bills-logo-7dde33e120ecfec631a907e9e925056f306db2b638726e84e6c493cfcb940298.svg" />
</a>
  <div class="sliding-panel-button">
    <i class="sprite menu-small"></i>
  </div>

  <div class="sliding-panel-content">
    <div class="sliding-panel-close"><img alt="Dispute Bills Logo" class="logo" src="/assets/dispute-bills-logo-7dde33e120ecfec631a907e9e925056f306db2b638726e84e6c493cfcb940298.svg" /></div>
        <ul>
          <li class="nav-link hover-menu">
            <a class="hover-link" href="https://disputebills.com/savings-card/">The CleanBill Card</a>
          </li>
          <li class="nav-link hover-menu">
            <a class="hover-link" href="https://disputebills.com/dashboard/">Affiliate Dashboard</a>
          </li>
        </ul>
        <a class="button button-blue-base" href="<?php echo wp_logout_url( home_url() ); ?>">Logout</a>
    </div>
</nav>

<div class="sliding-panel-fade-screen"></div>
<section class="contact-info">
  <ul>
    <li><strong>Have a question?</strong></li>
    <li>
      <span class="shortened"><a href="tel:1-888-622-2809"><i class="sprite phone-xsmall"></i>Call Us</a></span>
      <a href="tel:1-888-622-2809">1-888-622-2809</a></li>
    <li>
      <span class="shortened"><a href="mailto:info@disputebills.com"><i class="sprite email-xsmall"></i>Email Us</a></span>
      <a href="mailto:info@disputebills.com">info@disputebills.com</a></li>
  </ul>
</section>
<section class="account-container">
<?php the_content(); ?>
</section>

<?php wp_footer(); ?>
</body>
</html>