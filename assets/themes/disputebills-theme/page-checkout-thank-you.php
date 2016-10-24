<?php
/**
 * Template Name: Checkout Thank You
 * Description: Cleanbill Checkout Thank You Page 
 */
?>
<?php get_header(); ?>
<style>
/*
body {
    height: 100vh;
}
*/

/*
main, body, #page, .main-container {
    display: flex;
    flex-direction: column;
    flex-grow: 1;
}
*/
.thank-you-box {
    border-radius: 4px;
    border: 1px solid #ddd;
    background: #fbfbfb;
    background: #f4f9fb;
    border-color: rgba(186, 106, 27, 0);
    box-shadow: 0px 2px 0px 0px #d6dde0;
}
.p-a-30 {
    padding: 30px;
}
a {
    color: #0f92cd;
}
</style>
<div class="container main-container">
<div class="flex_grid-middle-noGutter">
<div class="flex_col-8_sm-10" data-push-left="off-2_sm-1">
<div class="thank-you-box mt30 mb30 p-a-30">
<?php the_content(); ?>
</div>
</div>
</div>
</div>
<?php get_footer(); ?>