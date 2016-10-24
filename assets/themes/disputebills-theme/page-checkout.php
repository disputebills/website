<?php
/**
 * Template Name: Checkout 
 * Description: Cleanbill Stripe Checkout Page 
 */
add_action('db_disclosures', 'newbenefits_checkout_text');


remove_filter("gform_submit_button", "form_submit_button");
add_filter("gform_submit_button", "form_submit_button_alt", 10, 2);
function form_submit_button_alt($button, $form){
    return "<button class='button btn btn-primary btn-lg btn-block' id='gform_submit_button_{$form["id"]}'><span>Submit</span></button>";
}




add_action('wp_head', 'add_css_gform_head', 999);
function add_css_gform_head() {
    ?>
    <style>
.credit-cards {
    position: absolute;
    width: 145px;
    padding: 0;
    right: 33px;
    border: none;
    margin-top: 34px;
}
.gfield_creditcard_warning_message {
display: none;
}
.gform_card_icon_container {
    display: none;
}
</style>

    <style>

    .ginput_container_creditcard {
        display: flex;
        flex-flow: column;
        margin-top: 20px;
    }
    .ginput_container_creditcard span:nth-child(1) {
        order: 2;
    }
    .ginput_container_creditcard span:nth-child(2) {
        order: 3;
    }
    .ginput_container_creditcard span:nth-child(3){
        order: 1;
    }
    .db-checkout-cc-info {
        margin-bottom: 10px!IMPORTANT;
    }
.gform_wrapper .chosen-container.chosen-container-single .chosen-single {
    display: block;
    width: 100%;
    height: 34px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.428571429;
    color: #555;
    vertical-align: middle;
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,0.075);
    box-shadow: inset 0 1px 1px rgba(0,0,0,0.075);
    -webkit-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    background-image:none;
}

.gform_wrapper .chosen-container.chosen-container-single .chosen-single div {
    top:4px;
    color:#000;
}

.gform_wrapper .chosen-container .chosen-drop {
    background-color: #FFF;
    border: 1px solid #CCC;
    border: 1px solid rgba(0, 0, 0, 0.15);
    border-radius: 4px;
    -webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, 0.175);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.175);
    background-clip: padding-box;
    margin: 2px 0 0;
}

.gform_wrapper .chosen-container .chosen-search input[type=text] {
    display: block;
    width: 100%;
    height: 34px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.428571429;
    color: #555;
    vertical-align: middle;
    background-color: #FFF;
    border: 1px solid #CCC;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
    -webkit-transition: border-color ease-in-out 0.15s, box-shadow ease-in-out 0.15s;
    transition: border-color ease-in-out 0.15s, box-shadow ease-in-out 0.15s;
    background-image:none;
}

.gform_wrapper .chosen-container .chosen-results {
    margin: 2px 0 0;
    padding: 5px 0;
    font-size: 14px;
    list-style: none;
    background-color: #fff;
    margin-bottom: 5px;
}

.gform_wrapper .chosen-container .chosen-results li , 
.gform_wrapper .chosen-container .chosen-results li.active-result {
    display: block;
    padding: 3px 20px;
    clear: both;
    font-weight: normal;
    line-height: 1.428571429;
    color: #333;
    white-space: nowrap;
    background-image:none;
}
.gform_wrapper .chosen-container .chosen-results li:hover, 
.gform_wrapper .chosen-container .chosen-results li.active-result:hover,
.gform_wrapper .chosen-container .chosen-results li.highlighted
{
    color: #FFF;
    text-decoration: none;
    background-color: #428BCA;
    background-image:none;
}

.gform_wrapper .chosen-container-multi .chosen-choices {
    display: block;
    width: 100%;
    min-height: 34px;
    padding: 6px;
    font-size: 14px;
    line-height: 1.428571429;
    color: #555;
    vertical-align: middle;
    background-color: #FFF;
    border: 1px solid #CCC;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
    -webkit-transition: border-color ease-in-out 0.15s, box-shadow ease-in-out 0.15s;
    transition: border-color ease-in-out 0.15s, box-shadow ease-in-out 0.15s;
    background-image:none;
}

.gform_wrapper .chosen-container-multi .chosen-choices li.search-field input[type="text"] {
    height:auto;
    padding:5px 0;
}

.gform_wrapper .chosen-container-multi .chosen-choices li.search-choice {
    background-image: none;
    padding: 3px 24px 3px 5px;
    margin: 0 6px 0 0;
    font-size: 14px;
    font-weight: normal;
    line-height: 1.428571429;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    cursor: pointer;
    border: 1px solid #ccc;
    border-radius: 4px;
    color: #333;
    background-color: #FFF;
    border-color: #CCC;
}

.gform_wrapper .chosen-container-multi .chosen-choices li.search-choice .search-choice-close {
    top:8px;
    right:6px;
}

.gform_wrapper .chosen-container-multi.chosen-container-active .chosen-choices,
.gform_wrapper .chosen-container.chosen-container-single.chosen-container-active .chosen-single,
.gform_wrapper .chosen-container .chosen-search input[type=text]:focus{
    border-color: #66AFE9;
    outline: 0;
    -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075),0 0 8px rgba(102, 175, 233, 0.6);
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075),0 0 8px rgba(102, 175, 233, 0.6);
}

.gform_wrapper .chosen-container-multi .chosen-results li.result-selected {
    display: list-item;
    color: #ccc;
    cursor: default;
    background-color: white;
}


.gform_wrapper .chosen-container-single .chosen-single div b:after {
    position: relative;
    top: 0px;
    display: inline-block;
    font-family: 'Glyphicons Halflings';
    font-style: normal;
    font-weight: 400;
    line-height: 1;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    right: 5px;
    font-size: 10px;
    content: "\e114";
    color: #BDBDBD;
}

.gform_wrapper .chosen-container-single.chosen-with-drop .chosen-single div b:after {
    content: "\e113";
}

.gform_wrapper .chosen-container-single .chosen-single div b {
    background: none!important;
}

/* Extra CSS */


    h2.gsection_title {
        font-size: 32px;
    }

    input[type="color"], input[type="date"], input[type="datetime"], input[type="datetime-local"], input[type="email"], input[type="month"], input[type="number"], input[type="password"], input[type="search"], input[type="tel"], input[type="text"], input[type="time"], input[type="url"], input[type="week"], input:not([type]), textarea, select, textarea {
        padding: 18px 9px!important;
        font-size: 16px!important;
        margin-top: 5px!important;
        height: 38px!important;
        border-radius: 3px!important;
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075)!important;
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075)!important;
        -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s!important;
        -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s!important;
        transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s!important;
        line-height: 1.42857143!important;
    }

    .form-control {
        border-radius: 3px!important;
        height: 38px!important;
        border: 1px solid #dedede!important;
        font-size: 16px!important;
        padding: 8px 9px!important;;
    }

    select {
        padding: 0px 9px!important;
    }


    .bg-primary-alt {
        background-color: #084f70;
        color: #fff;
    }
    .bg-primary-alt *,
    .bg-primary-alt * > a {
        color: #fff!important;
    }
    .signup-package-box {
        padding: 20px;
        border-radius: 5px;
    }
    .fs-60p {
        font-size: 60%;
    }
    .before-price-box,
    .gsection_title {
        font-size: 16px!important;
        font-weight: 700;
        margin-bottom: 10px;
        display: block;
    }
    span.gfield_required {
        opacity: 0;
    }
    label.gfield_label {
        color: #545454!important;
    }
.gsection {
    padding-top: 25px;
    border-bottom: 1px solid #eee;
    padding-left: 0px!important;
    margin-top: 19px;
    padding-top: 25px!important;
    border-right: none!important;
    border-left: none!important;
}

.gsection + .gfield {
    padding-top: 22px;
}
/*
.gfield {
    border-right: 1px solid #eee;
    border-left: 1px solid #eee;
    margin-bottom: 0px;
    padding: 0px 22px 20px 22px;
}
*/
.gform_fields>.gsection:first-of-type {
    margin-top: 0!important;
    padding-top: 0!important;
}
.gfield + .gsection {
    border-top: 1px solid #eee;
    margin-top: 0;
}






/*
----------------------------------------------------------------

Gravity Forms Date Picker Styles
http: //www.gravityforms.com
updated: January 31, 2014 3:32 PM

Customized styles for the jQuery UI Datepicker 1.9.2
copyright 2012 jQuery Foundation and other contributors
Released under the MIT license.
http://jquery.org/license
some styles courtesty of http://www.hongkiat.com/

Gravity Forms is a Rocketgenius project
copyright 2008 - 2014 Rocketgenius Inc.
http: //www.rocketgenius.com

NOTE: DO NOT EDIT THIS FILE! MAKE ANY MODIFICATIONS IN YOUR
THEME STYLESHEET. THIS FILE IS REPLACED DURING AUTO-UPDATES
AND ANY CHANGES MADE HERE WILL BE OVERWRITTEN.

If you need to make extensive customizations,
copy the contents of this file to your theme
style sheet for editing. Then, go to the form
settings page & set the 'output CSS' option
to no.

----------------------------------------------------------------
*/

.ui-datepicker {
    width: 17em;
    padding: .2em .2em 0;
    display: none;
    background-color: #e6e6e6;
}

.ui-datepicker a {
    text-decoration: none;
}

.ui-datepicker table {
    width: 100%;
    font-size: .9em;
    border-collapse: collapse;
    margin: 0 0 .4em;
}

.ui-datepicker-header {
    background-color: #666;
    /* set the header background color */
    color: #e0e0e0;
    font-weight: bold;
    -webkit-box-shadow: inset 0px 1px 1px 0px rgba(250, 250, 250, .2);
    -moz-box-shadow: inset 0px 1px 1px 0px rgba(250, 250, 250, .2);
    box-shadow: inset 0px 1px 1px 0px rgba(250, 250, 250, .2);
    text-shadow: 1px -1px 0px #000;
    filter: dropshadow(color=#000, offx=1, offy=-1);
    line-height: 30px;
    min-height: 30px ;
    border-width: 1px 0 0 0;
    border-style: solid;
    border-color: #666;
}

.ui-datepicker-title {
    text-align: center;
}

.ui-datepicker-title select {
    margin-top: 2.5%;
}

.ui-datepicker-prev, .ui-datepicker-next {
    display: inline-block;
    width: 30px;
    height: 30px;
    text-align: center;
    cursor: pointer;
    background-image: url('../images/datepicker/arrow.png');
    background-repeat: no-repeat;
    line-height: 600%;
    overflow: hidden;
}

.ui-datepicker-prev {
    float: left;
    background-position: center -30px;
}

.ui-datepicker-next {
    float: right;
    background-position: center 0px;
}

.ui-datepicker thead {
    background: linear-gradient(to bottom,  #f7f7f7 0%,#f1f1f1 100%);
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f7f7f7', endColorstr='#f1f1f1',GradientType=0 );
    border-bottom: 1px solid #bbb;
}

.ui-datepicker th {
    font-weight: bold;
    color: gray;
}

.ui-datepicker tbody td {
    padding: 0;
    border-top: 1px solid #bbb;
    border-right: 1px solid #bbb;
}

.ui-datepicker tbody td:last-child {
    border-right: 0px;
}

.ui-datepicker tbody tr {
    border-bottom: 1px solid #bbb;
}

.ui-datepicker tbody tr:last-child {
    border-bottom: 0px;
}

.ui-datepicker td span, .ui-datepicker td a {
    display: inline-block;
    font-weight: bold;
    text-align: center;
    width: 30px;
    height: 30px;
    line-height: 30px;
    color: #666666;
    text-shadow: 1px 1px 0px #fff;
    filter: dropshadow(color=#fff, offx=1, offy=1);
}

.ui-datepicker-calendar .ui-state-default {
    background: linear-gradient(to bottom,  #ededed 0%,#dedede 100%);
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ededed', endColorstr='#dedede',GradientType=0 );
    -webkit-box-shadow: inset 1px 1px 0px 0px rgba(250, 250, 250, .5);
    -moz-box-shadow: inset 1px 1px 0px 0px rgba(250, 250, 250, .5);
    box-shadow: inset 1px 1px 0px 0px rgba(250, 250, 250, .5);
}

.ui-datepicker-calendar .ui-state-hover {
    background: #f7f7f7;
}

.ui-datepicker-calendar .ui-state-active {
    background: #FFF2AA;
    /* set the active date background color */
    border: 1px solid #c19163;
    /* set the active date border color */
    color: #666;
    /* set the active date font color */
    -webkit-box-shadow: inset 0px 0px 10px 0px rgba(0, 0, 0, .1);
    -moz-box-shadow: inset 0px 0px 10px 0px rgba(0, 0, 0, .1);
    box-shadow: inset 0px 0px 10px 0px rgba(0, 0, 0, .1);
    text-shadow: 0px 1px 0px #FFF;
    filter: dropshadow(color=#FFF, offx=0, offy=1);
    position: relative;
    margin: -1px;
}

.ui-datepicker-unselectable .ui-state-default {
    background: #f4f4f4;
    color: #b4b3b3;
}

.ui-datepicker-calendar td:first-child .ui-state-active {
    width: 29px;
    margin-left: 0;
}

.ui-datepicker-calendar td:last-child .ui-state-active {
    width: 29px;
    margin-right: 0;
}

.ui-datepicker-calendar tr:last-child .ui-state-active {
    height: 29px;
    margin-bottom: 0;
}

td.ui-datepicker-unselectable.ui-state-disabled {
    background-color: #d7d7d7;
}

table.ui-datepicker-calendar {
    margin: 0 0 0 0 ;
}

body div#ui-datepicker-div[style] {
    z-index: 9999 ;
}

/*new css*/

.ui-datepicker .ui-datepicker-header {
    position: relative;
    padding: 4px 0;
    border: 0px;
    font-weight: bold;
    width: 100%;
    background-color: #fff;
    color: #333;
}

.ui-datepicker .ui-datepicker-prev,.ui-datepicker .ui-datepicker-next {
    position: absolute;
    top: 2px;
    width: 1.8em;
    height: 1.8em;
}

.ui-datepicker .ui-datepicker-prev {
    left: 2px;
}

.ui-datepicker .ui-datepicker-next {
    right: 2px;
}

.ui-datepicker .ui-datepicker-prev span,.ui-datepicker .ui-datepicker-next span {
    display: block;
    font-size: 11px;
    margin-top: -7px;
    position: absolute;
    top: 50%;
}

.ui-datepicker .ui-datepicker-prev span:hover,.ui-datepicker .ui-datepicker-next span:hover {
    cursor: pointer;
}

.ui-datepicker .ui-datepicker-title {
    margin: 0 2.3em;
    line-height: 1.8em;
    text-align: center;
}

.ui-datepicker .ui-datepicker-title select {
    font-size: 1em;
    margin: 1px 0;
}

.ui-datepicker select.ui-datepicker-month-year {
    width: 100%;
}

.ui-datepicker select.ui-datepicker-month,.ui-datepicker select.ui-datepicker-year {
    width: 49%;
}

.ui-datepicker td {
    border: 0;
    padding: 1px;
}

.ui-datepicker td span,.ui-datepicker td a {
    display: block;
    padding: .2em;
    text-align: right;
    text-decoration: none;
}

.ui-datepicker .ui-datepicker-buttonpane {
    background-image: none;
    margin: .7em 0 0 0;
    padding: 0 .2em;
    border-left: 0;
    border-right: 0;
    border-bottom: 0;
}

.ui-datepicker .ui-datepicker-buttonpane button {
    float: right;
    margin: .5em .2em .4em;
    cursor: pointer;
    padding: .2em .6em .3em .6em;
    width: auto;
    overflow: visible;
}

.ui-datepicker .ui-datepicker-buttonpane button .ui-datepicker-current {
    float: left;
}

.ui-datepicker.ui-datepicker-multi {
    width: auto;
}

.ui-datepicker-multi .ui-datepicker-group {
    float: left;
}

.ui-datepicker-multi .ui-datepicker-group table {
    width: 95%;
    margin: 0 auto .4em;
}

.ui-datepicker-multi-2 .ui-datepicker-group {
    width: 50%;
}

.ui-datepicker-multi-3 .ui-datepicker-group {
    width: 33.3%;
}

.ui-datepicker-multi-4 .ui-datepicker-group {
    width: 25%;
}

.ui-datepicker-multi .ui-datepicker-group-last .ui-datepicker-header {
    border-left-width: 0;
}

.ui-datepicker-multi .ui-datepicker-group-middle .ui-datepicker-header {
    border-left-width: 0;
}

.ui-datepicker-multi .ui-datepicker-buttonpane {
    clear: left;
}

.ui-datepicker-row-break {
    clear: both;
    width: 100%;
    font-size: 0em;
}

.ui-datepicker-rtl {
    direction: rtl;
}

.ui-datepicker-rtl .ui-datepicker-prev {
    right: 2px;
    left: auto;
}

.ui-datepicker-rtl .ui-datepicker-prev:hover {
    right: 1px;
    left: auto;
}

.ui-datepicker-rtl .ui-datepicker-next {
    left: 2px;
    right: auto;
}

.ui-datepicker-rtl .ui-datepicker-next:hover {
    left: 1px;
    right: auto;
}

.ui-datepicker-rtl .ui-datepicker-buttonpane {
    clear: right;
}

.ui-datepicker-rtl .ui-datepicker-buttonpane button {
    float: left;
}

.ui-datepicker-rtl .ui-datepicker-buttonpane button .ui-datepicker-current {
    float: right;
}

.ui-datepicker-rtl .ui-datepicker-group {
    float: right;
}

.ui-datepicker-rtl .ui-datepicker-group-last .ui-datepicker-header {
    border-right-width: 0;
    border-left-width: 1px;
}

.ui-datepicker-rtl .ui-datepicker-group-middle .ui-datepicker-header {
    border-right-width: 0;
    border-left-width: 1px;
}

.ui-datepicker-cover {
    display: none;
    position: absolute;
    z-index: -1;
    filter: mask();
    top: -4px;
    left: -4px;
    width: 200px;
    height: 200px;
}

.ui-datepicker-today a {
    background-color: #337ab7;
    cursor: pointer;
    padding: 0 4px;
    margin-bottom: 0px;
}

.ui-datepicker-today a:hover {
    background-color: #555;
    color: #eee;
}

.ui-datepicker td a {
    margin-bottom: 0px;
    border: 0px;
}

.ui-datepicker td:hover {
    color: #eee;
}

.ui-datepicker td .ui-state-default {
    border: 0;
    background: none;
    margin-bottom: 0;
    padding: 5px;
    color: gray;
    text-align: center;
    filter: none;
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
}
.ui-datepicker th {
    text-align: center;
}

.ui-datepicker td .ui-state-default:hover {
    background: #337ab7;
    color: #eee;
    border-radius: 4px;
}

.ui-datepicker td .ui-state-highlight {
    color: #404040;
    background: #eedc94;
    background-image: linear-gradient(to bottom, #fceec1 0%, #eedc94 100%);
    background-repeat: repeat-x;
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#fffceec1', endColorstr='#ffeedc94', GradientType=0);
    text-shadow: 0 -1px 0 rgba(0,0,0,0.25);
    border-color: rgba(0,0,0,0.1) rgba(0,0,0,0.1) rgba(0,0,0,0.25);
    border-radius: 4px;
}

.ui-datepicker td .ui-state-active {
    background: #777;
    margin-bottom: 0px;
    font-size: normal;
    text-shadow: 0px;
    color: #eee;
    border-radius: 4px;
}









.gform_wrapper ul {
  padding-left: 0;
  list-style: none;
}
.gform_wrapper li {
  margin-bottom: 15px;
}
.gform_wrapper form {
  margin-bottom: 0;
}

.gform_wrapper .top_label .gfield_label {
  font-weight: bold;
}
.gform_wrapper .gsection {
  border-bottom: 1px dotted #CCCCCC;
  margin: 16px 0;
  padding: 0 0 8px;
}
.gform_wrapper .gsection:before,
.gform_wrapper .gsection:after {
  content: " ";
  /* 1 */
  display: table;
  /* 2 */
}
.gform_wrapper .gsection:after {
  clear: both;
}
.gform_wrapper .gsection:before,
.gform_wrapper .gsection:after {
  content: " ";
  /* 1 */
  display: table;
  /* 2 */
}
.gform_wrapper .gsection:after {
  clear: both;
}
.gform_wrapper ul.gfield_radio li,
.gform_wrapper ul.gfield_checkbox li {
  margin-bottom: 0;
}
.gform_wrapper .gfield_required {
  padding-left: 1px;
  color: #b94a48;
}
.gform_wrapper .field_name_first input,
.gform_wrapper .ginput_complex .ginput_left input {
  width: 100%;
}
.gform_wrapper .ginput_complex .ginput_right input {
  width: 100%;
}
.gform_wrapper .datepicker.datepicker_with_icon.hasDatepicker {
  display: inline-block;
  margin-right: 2%;
  width: 90%;
}
.gform_wrapper .ginput_complex label,
.gform_wrapper .gfield_time_hour label,
.gform_wrapper .gfield_time_minute label,
.gform_wrapper .gfield_date_month label,
.gform_wrapper .gfield_date_day label,
.gform_wrapper .gfield_date_year label,
.gform_wrapper .instruction {
  display: block;
  font-size: 12px;
  margin: 3px;
}
.gform_wrapper li.gfield.gf_left_half,
.gform_wrapper li.gfield.gf_right_half,
.gform_wrapper .ginput_complex .ginput_left,
.gform_wrapper .ginput_complex .ginput_right {
  position: relative;
  min-height: 1px;
}
@media (min-width: 992px) {
  .gform_wrapper li.gfield.gf_left_half,
  .gform_wrapper li.gfield.gf_right_half,
  .gform_wrapper .ginput_complex .ginput_left,
  .gform_wrapper .ginput_complex .ginput_right {
    float: left;
    width: 50%;
  }
}
.gform_wrapper li.gfield.gf_one_quarter {
  position: relative;
  min-height: 1px;
  padding-left: 15px;
  padding-right: 15px;
}
@media (min-width: 992px) {
  .gform_wrapper li.gfield.gf_one_quarter {
    float: left;
    width: 25%;
  }
}
.gform_wrapper li.gfield.gf_three_quarter {
  position: relative;
  min-height: 1px;
  padding-left: 15px;
  padding-right: 15px;
}
@media (min-width: 992px) {
  .gform_wrapper li.gfield.gf_three_quarter {
    float: left;
    width: 75%;
  }
}
.gform_wrapper li.gfield.gf_left_third,
.gform_wrapper li.gfield.gf_middle_third,
.gform_wrapper li.gfield.gf_right_third {
  position: relative;
  min-height: 1px;
  padding-left: 15px;
  padding-right: 15px;
}
@media (min-width: 992px) {
  .gform_wrapper li.gfield.gf_left_third,
  .gform_wrapper li.gfield.gf_middle_third,
  .gform_wrapper li.gfield.gf_right_third {
    float: left;
    width: 33.33333333333333%;
  }
}
.gform_wrapper li.gfield.gf_list_2col ul.gfield_checkbox li,
.gform_wrapper li.gfield.gf_list_2col ul.gfield_radio li {
  margin: 0;
  min-height: 1.8em;
  position: relative;
  min-height: 1px;
  padding-left: 15px;
  padding-right: 15px;
}
@media (min-width: 992px) {
  .gform_wrapper li.gfield.gf_list_2col ul.gfield_checkbox li,
  .gform_wrapper li.gfield.gf_list_2col ul.gfield_radio li {
    float: left;
    width: 50%;
  }
}
@media (max-width: 992px) {
  .gform_wrapper li.gfield.gf_list_2col ul.gfield_checkbox li,
  .gform_wrapper li.gfield.gf_list_2col ul.gfield_radio li {
    display: inline-block;
  }
}
.gform_wrapper li.gfield.gf_list_3col ul.gfield_checkbox li,
.gform_wrapper li.gfield.gf_list_3col ul.gfield_radio li {
  margin: 0;
  min-height: 1.8em;
  position: relative;
  min-height: 1px;
  padding-left: 15px;
  padding-right: 15px;
}
@media (min-width: 992px) {
  .gform_wrapper li.gfield.gf_list_3col ul.gfield_checkbox li,
  .gform_wrapper li.gfield.gf_list_3col ul.gfield_radio li {
    float: left;
    width: 33.33333333333333%;
  }
}
@media (max-width: 992px) {
  .gform_wrapper li.gfield.gf_list_3col ul.gfield_checkbox li,
  .gform_wrapper li.gfield.gf_list_3col ul.gfield_radio li {
    display: inline-block;
  }
}
.gform_wrapper li.gfield.gf_list_4col ul.gfield_checkbox li,
.gform_wrapper li.gfield.gf_list_4col ul.gfield_radio li {
  margin: 0;
  min-height: 1.8em;
  position: relative;
  min-height: 1px;
  padding-left: 15px;
  padding-right: 15px;
}
@media (min-width: 992px) {
  .gform_wrapper li.gfield.gf_list_4col ul.gfield_checkbox li,
  .gform_wrapper li.gfield.gf_list_4col ul.gfield_radio li {
    float: left;
    width: 25%;
  }
}
@media (max-width: 992px) {
  .gform_wrapper li.gfield.gf_list_4col ul.gfield_checkbox li,
  .gform_wrapper li.gfield.gf_list_4col ul.gfield_radio li {
    display: inline-block;
  }
}
.gform_wrapper .ginput_complex .ginput_left {
  padding-left: 0;
}
.gform_wrapper .ginput_complex .ginput_right {
  padding-right: 0;
}
.gform_wrapper li.gfield.gf_inline {
  display: inline-block;
  float: none;
  vertical-align: top;
  width: auto;
}
.gform_wrapper li.gf_list_inline ul.gfield_checkbox li,
.gform_wrapper li.gf_list_inline ul.gfield_radio li {
  display: inline-block;
  margin: 0 10px 10px 0;
}
.gform_wrapper .gform_button {
  color: #ffffff;
  background-color: #428bca;
  border-color: #357ebd;
  display: inline-block;
  padding: 6px 12px;
  margin-bottom: 0;
  font-size: 14px;
  font-weight: 400;
  line-height: 1.42857143;
  text-align: center;
  white-space: nowrap;
  vertical-align: middle;
  -ms-touch-action: manipulation;
  touch-action: manipulation;
  cursor: pointer;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  -o-user-select: none;
  user-select: none;
  background-image: none;
  border: 1px solid transparent;
  border-radius: 4px;
}
.gform_wrapper .gform_button:focus {
  outline: thin dotted #333;
  outline: 5px auto -webkit-focus-ring-color;
  outline-offset: -2px;
}
.gform_wrapper .gform_button:hover,
.gform_wrapper .gform_button:focus {
  color: #333333;
  text-decoration: none;
}
.gform_wrapper .gform_button:active,
.gform_wrapper .gform_button.active {
  outline: 0;
  background-image: none;
  -webkit-box-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
  box-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
}
.gform_wrapper .gform_button.disabled,
.gform_wrapper .gform_button[disabled],
fieldset[disabled] .gform_wrapper .gform_button {
  cursor: not-allowed;
  pointer-events: none;
  opacity: 0.65;
  filter: alpha(opacity=65);
  -webkit-box-shadow: none;
  box-shadow: none;
}
.gform_wrapper .gform_button:hover,
.gform_wrapper .gform_button:focus,
.gform_wrapper .gform_button:active,
.gform_wrapper .gform_button.active,
.open .dropdown-toggle.gform_wrapper .gform_button {
  color: #ffffff;
  background-color: #3276b1;
  border-color: #285e8e;
}
.gform_wrapper .gform_button:active,
.gform_wrapper .gform_button.active,
.open .dropdown-toggle.gform_wrapper .gform_button {
  background-image: none;
}
.gform_wrapper .gform_button.disabled,
.gform_wrapper .gform_button[disabled],
fieldset[disabled] .gform_wrapper .gform_button,
.gform_wrapper .gform_button.disabled:hover,
.gform_wrapper .gform_button[disabled]:hover,
fieldset[disabled] .gform_wrapper .gform_button:hover,
.gform_wrapper .gform_button.disabled:focus,
.gform_wrapper .gform_button[disabled]:focus,
fieldset[disabled] .gform_wrapper .gform_button:focus,
.gform_wrapper .gform_button.disabled:active,
.gform_wrapper .gform_button[disabled]:active,
fieldset[disabled] .gform_wrapper .gform_button:active,
.gform_wrapper .gform_button.disabled.active,
.gform_wrapper .gform_button[disabled].active,
fieldset[disabled] .gform_wrapper .gform_button.active {
  background-color: #428bca;
  border-color: #357ebd;
}
.gform_wrapper .gform_wrapper .gfield_error .gfield_label {
  color: #b94a48;
}
.gform_wrapper .gform_wrapper .gfield_error input,
.gform_wrapper .gform_wrapper .gfield_error select,
.gform_wrapper .gform_wrapper .gfield_error textarea {
  border-color: #ebccd1;
  background-color: #f2dede;
  color: #b94a48;
}
.gform_wrapper .gform_wrapper .gfield_error input:focus,
.gform_wrapper .gform_wrapper .gfield_error select:focus,
.gform_wrapper .gform_wrapper .gfield_error textarea:focus {
  border-color: #b94a48;
  outline: 0;
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(185, 74, 72, 0.6);
  box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(185, 74, 72, 0.6);
}
.gform_wrapper .gfield_error,
.gform_wrapper .validation_error {
  padding: 15px;
  margin-bottom: 20px;
  border: 1px solid transparent;
  border-radius: 4px;
  background-color: #f2dede;
  border-color: #ebccd1;
  color: #b94a48;
}
.gform_wrapper .gfield_error h4,
.gform_wrapper .validation_error h4 {
  margin-top: 0;
  color: inherit;
}
.gform_wrapper .gfield_error .alert-link,
.gform_wrapper .validation_error .alert-link {
  font-weight: bold;
}
.gform_wrapper .gfield_error > p,
.gform_wrapper .validation_error > p,
.gform_wrapper .gfield_error > ul,
.gform_wrapper .validation_error > ul {
  margin-bottom: 0;
}
.gform_wrapper .gfield_error > p + p,
.gform_wrapper .validation_error > p + p {
  margin-top: 5px;
}
.gform_wrapper .gfield_error hr,
.gform_wrapper .validation_error hr {
  border-top-color: #e4b9c0;
}
.gform_wrapper .gfield_error .alert-link,
.gform_wrapper .validation_error .alert-link {
  color: #953b39;
}
.gform_wrapper #gforms_confirmation_message {
  padding: 15px;
  margin-bottom: 20px;
  border: 1px solid transparent;
  border-radius: 4px;
}
.gform_wrapper #gforms_confirmation_message h4 {
  margin-top: 0;
  color: inherit;
}
.gform_wrapper #gforms_confirmation_message .alert-link {
  font-weight: bold;
}
.gform_wrapper #gforms_confirmation_message > p,
.gform_wrapper #gforms_confirmation_message > ul {
  margin-bottom: 0;
}
.gform_wrapper #gforms_confirmation_message > p + p {
  margin-top: 5px;
}
.gform_wrapper .gf_scroll_text {
  overflow: auto;
  height: 180px;
}
.gform_wrapper .ginput_container input,
.gform_wrapper .ginput_container select,
.gform_wrapper .ginput_container textarea {
  display: block;
  width: 100%;
  height: 34px;
  padding: 6px 12px;
  font-size: 14px;
  line-height: 1.42857143;
  color: #555;
  background-color: #fff;
  background-image: none;
  border: 1px solid #ccc;
  border-radius: 4px;
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
  box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
  -webkit-transition: border-color ease-in-out 0.15s, -webkit-box-shadow ease-in-out 0.15s;
  -o-transition: border-color ease-in-out 0.15s, box-shadow ease-in-out 0.15s;
  transition: border-color ease-in-out 0.15s, box-shadow ease-in-out 0.15s;
}
.gform_wrapper .ginput_container input[type='checkbox'],
.gform_wrapper .ginput_container input[type='radio'] {
  width: auto;
}
.gform_wrapper .ginput_container textarea {
  height: auto;
}
.gform_wrapper .ginput_container .ui-datepicker-trigger {
  width: auto;
}
.gform_wrapper .gform_body > ul {
  padding-top: 15px;
  display: block;
}
.gform_footer.top_label {
  padding-left: 15px;
  padding-right: 15px;
}
@media (min-width: 992px) {
  .gform_wrapper li.gfield.gf_right_half,
  .gform_wrapper .ginput_complex .ginput_right {
    position: relative;
    min-height: 1px;
    padding-left: 10px;
  }
  .gform_wrapper li.gfield.gf_left_half,
  .gform_wrapper .ginput_complex .ginput_left {
    position: relative;
    min-height: 1px;
    padding-right: 10px;
  }
}
.gform_wrapper {
  padding-bottom: 15px;
}
.gform_wrapper ul.gfield_radio li input[type="radio"]:checked + label,
.gform_wrapper ul.gfield_radio li input[type="checkbox"]:checked + label,
.gform_wrapper ul.gfield_checkbox li input[type="radio"]:checked + label,
.gform_wrapper ul.gfield_checkbox li input[type="checkbox"]:checked + label {
  font-weight: bold;
}
.gform_wrapper .gfield_checkbox li input[type="checkbox"],
.gform_wrapper .gfield_radio li input[type="radio"],
.gform_wrapper .gfield_checkbox li input {
  float: left;
  margin-top: 7px;
  height: 20px;
}
.gform_wrapper .gfield_checkbox li input[type="checkbox"]:hover,
.gform_wrapper .gfield_radio li input[type="radio"]:hover,
.gform_wrapper .gfield_checkbox li input:hover {
  cursor: pointer;
}
.gform_wrapper .gfield_checkbox li label,
.gform_wrapper .gfield_radio li label {
  display: inline-block;
  line-height: 1.5;
  margin: 2px 0 0 10px;
  padding: 0;
  vertical-align: top;
  width: auto;
}
.gform_wrapper .gfield_checkbox li label:hover,
.gform_wrapper .gfield_radio li label:hover {
  cursor: pointer;
}
.gform_wrapper .ginput_container input[type='checkbox'],
.gform_wrapper .ginput_container input[type='radio'] {
  width: auto;
}
.gform_wrapper .ginput_container textarea {
  height: auto;
}
.gform_wrapper .ginput_container .ui-datepicker-trigger {
  width: auto;
}
.gform_wrapper .ginput_complex label,
.gform_wrapper .gfield_time_hour label,
.gform_wrapper .gfield_time_minute label,
.gform_wrapper .gfield_date_month label,
.gform_wrapper .gfield_date_day label,
.gform_wrapper .gfield_date_year label,
.gform_wrapper .instruction {
  color: #737373;
}





.gfield.gf_left_half {
    border-right: none!important;
}
.gfield.gf_right_half {
    border-left: none!important;
}
.main-header:after {
    top: 100%;
    left: 50%;
    border: solid transparent;
    content: " ";
    height: 0;
    width: 0;
    position: absolute;
    pointer-events: none;
    border-color: rgba(104, 144, 213, 0);
    border-top-color: #ddecf2;
    border-width: 15px;
    margin-left: -30px;
}
/*
@media(max-width: 768px) {
.gfield.gf_right_half,
.gfield.gf_left_half {
    border-right: 1px solid #b3bec8 !important;
    border-left: 1px solid #b3bec8!important;
}
*/
.cleanbill-checkout-form_wrapper  {
    width: 100%!important;
}
}



blockquote .small:before, blockquote footer:before, blockquote small:before {
    content: '';
    display: none;
}



.gform_fieldset {
    border: 1px solid #b3bec8;
    padding-right: 22px;
    padding-left: 22px;
    margin-bottom: 80px;
    border-radius: 4px;
    margin-top: 32px;
}

li:empty {
    display: none!important;
}

.gfield:empty {
    display: none;
}

.gfieldset legend {
    position: absolute;
    margin-top: -32px;
    margin-left: -22px;
    border-bottom: none;
    font-size: 16px!important;
    font-weight: 700;
    display: block;
}

fieldset.gfieldset {
    position: relative;
}

.gfieldset .gfield + .gfield {
    padding: 0; 
    border: 0;
}

.ui-datepicker td .ui-state-default:hover {
    text-shadow: none;
    border-radius: 0px;
}

a.ui-state-default {
    display: flex;
    flex-direction: column;
    justify-content: center;
    width: 100%;
}

a.ui-state-default.ui-state-highlight {
    background: #f18605;
    border-radius: 0;
}

.ui-datepicker td .ui-state-active {
    border-radius: 0px;
    margin: 0px;
}

.gform_wrapper .gform_body > ul {
    padding-top: 0px; 
}
.gform_fieldset {
    margin-bottom: 74px!important;
}
.testimonial-box {
    border-radius: 4px;
}
.gfieldset > .gfieldset-legend + ul {
    padding-top: 24px;
}
.ginput_container.ginput_container_date {
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    justify-content: space-between;
}

.ginput_container.ginput_container_select:after {
    position: absolute;top: calc(100%/2);
    right: 21px;content: "\f078";
    font-family: "FontAwesome";
    font-size: 10px;
    margin-top: 3px;
}
.ui-datepicker .ui-datepicker-title select {
    margin: 2px;
}
.ui-datepicker select.ui-datepicker-month, .ui-datepicker select.ui-datepicker-year {
    width: 42%;
}
.db-checkout-different-address-box {
    display: inline-block;
    margin-top: 0px;
    margin-bottom: 5px!important;
}
.db-checkout-different-address-box label {
    display: none;
}
.db-checkout-different-address-box input[type="checkbox"] {
    margin-top: 0!important;
}
#label_15_34_1 {
    margin-left: 20px;
}
.db-checkout-address-shipping {
    margin-top: 12px;
}
fieldset.gfieldset {
    padding-bottom: 20px;
}
.credit-cards {
    right: 0!important;
    margin-top: 10px!important;
}
.gform_wrapper .datepicker.datepicker_with_icon.hasDatepicker {
    width: 100%!important;
}
.db-checkout-address-shipping {
    margin-top: 12px;
}

fieldset.gfieldset {
    padding-bottom: 20px;
}

.ginput_cardinfo_left select {
    width: 48%!important;
    float: left;
}

.ginput_cardinfo_right {
    width: 20%;
    float: left;
}

.ginput_card_expiration_month {
    margin-right: 4%;
}

span.ginput_card_security_code_icon {
    display: none;
}
.gform_fieldset:last-of-type {
    margin-bottom: 20px!important;
}
.gform_footer.top_label {
    padding-left: 0;
    padding-right: 0;
}
.btn-block {
    font-family: 'brandon-text-medium';
    text-transform: uppercase;
}
.hidden_label label.gfield_label {
    display: none;
}
#field_15_42 {
    margin-bottom: 20px!important;
}
#mc-email {
    text-indent: 25px;
    margin-top: 0!important;
    height: 46px!important;
}
img.ui-datepicker-trigger {
    position: absolute;
    width: 17px!important;
    right: 16px;
    margin-top: 3px;
}


    .ginput_container_creditcard {
    	display: flex;
    	flex-flow: column;
    	margin-top: 20px;
    }
    .ginput_container_creditcard span:nth-child(1) {
    	order: 2;
    }
    .ginput_container_creditcard span:nth-child(2) {
    	order: 3;
    }
    .ginput_container_creditcard span:nth-child(3){
    	order: 1;
    }
    .db-checkout-cc-info {
        margin-bottom: 10px!IMPORTANT;
    }

#field_15_45 a {
    color: #337ab7;
}
.d-block {
    display: block;
}
</style>
<!-- Start of LiveChat (www.livechatinc.com) code -->
<script type="text/javascript">
window.__lc = window.__lc || {};
window.__lc.license = 7945231;
(function() {
  var lc = document.createElement('script'); lc.type = 'text/javascript'; lc.async = true;
  lc.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'cdn.livechatinc.com/tracking.js';
  var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(lc, s);
})();
</script>
<!-- End of LiveChat code -->
    <?php
} 





get_header(); ?>


<header class="main-header pt60 pb60 mb30 text-center" style="
    position: relative;
    background-color: #ddecf2;
">
    <h2 style="font-size: 42px;margin-bottom: 20px;font-family: 'brandon-text-bold';">Sign Up for a CleanBill<span class="tm" style="
    font-size: 38px;
">™</span> Card in Just a Minute</h2>
    <p style="
    color: #6b6b6b;
    font-size: 23px;
">Your membership to thousands in potential savings starts now.</p>
</header>

<div class="container pt60 pb60">

<div class="row">
<div class="col-sm-6">
<div class="visible-xs mb80">
<span class="before-price-box">You are Purchasing</span>
<div class="bg-primary-alt signup-package-box">
    <h4>CleanBill™ Discount Savings Card</h4>
    <h5 class="mt15 mb15" style="font-size: 36px;"><strong style="font-family: 'brandon-text-bold';">$12.95 </strong><span class="fs-60p">+ $5 one-time application fee</span></h5>
    <p>Your membership includes a 30-day money-back guarantee. In the event you cancel within the first 30 days, your membership will be fully refunded, minus the application fee.</p>
    <h6 class="text-white mt20">Benefits Included:</h6>
    <div class="row">
    <div class="col-xs-6">
    	<ul class="list-unstyled bgfbox-plan-checks">
      		<li><i class="fa fa-check"></i> Medical Bill Review</li>
      		<li><i class="fa fa-check"></i> Hearing</li>
      		<li><i class="fa fa-check"></i> Chiropractic</li>
      		<li><i class="fa fa-check"></i> Teladoc</li>
      		<li><i class="fa fa-check"></i> Vision</li>
    	</ul>
    </div>
    <div class="col-xs-6">
    	<ul class="list-unstyled bgfbox-plan-checks">
     		<li><i class="fa fa-check"></i> Dental powered by AetnaDentalAccess®</li>
      		<li><i class="fa fa-check"></i> MRI & CT Scans</li>
      		<li><i class="fa fa-check"></i> Lab Testing</li>
      		<li><i class="fa fa-check"></i> Pharmacy</li>
    	</ul>
    </div>
    </div>
</div>
</div>


<h4 style="position: absolute;
	margin-top: -32px;
	font-weight: 700;
	color: #0097db;">Discount Medical Plan Application</h4>
<?php 
/** 
 * Embed Gravity Form 
 * https://www.gravityhelp.com/documentation/article/embedding-a-form/
 */

/** Form Options */
// gravity_form( $id_or_title, $display_title = true, $display_description = true, $display_inactive = false, $field_values = null, $ajax = false, $tabindex, $echo = true );

/** Shortcode */
// echo do_shortcode('[gravityform id="10" title="false" description="false"]'); 

    //$gform = get_field('gravity_form_select');
    //gravity_form_enqueue_scripts($gform, true);
    //gravity_form($gform, false, false, false, '', true, 12); 

    gravity_form_enqueue_scripts(15, true);
    echo do_shortcode('[gravityform id="15" title="false" description="false"]'); 
    
?>
</div><!-- / .col-sm-6 -->
<div class="col-sm-6">
<div class="hidden-xs">
<span class="before-price-box">You are Purchasing</span>
<div class="bg-primary-alt signup-package-box">
    <h4>CleanBill™ Discount Savings Card</h4>
    <h5 class="mt15 mb15" style="font-size: 36px;"><strong style="font-family: 'brandon-text-bold';">$12.95 </strong><span class="fs-60p">+ $5 one-time application fee</span></h5>
    <p>
Your membership includes a 30-day money-back guarantee. In the event you cancel within the first 30 days, your membership will be fully refunded, minus the application fee.</p>
<h6 class="text-white mt20">Benefits Included:</h6>
    <div class="row">
    <div class="col-xs-6">
        <ul class="list-unstyled bgfbox-plan-checks">
            <li><i class="fa fa-check"></i> Medical Bill Review</li>
            <li><i class="fa fa-check"></i> Hearing</li>
            <li><i class="fa fa-check"></i> Chiropractic</li>
            <li><i class="fa fa-check"></i> Teladoc</li>
            <li><i class="fa fa-check"></i> Vision</li>
        </ul>
    </div>
    <div class="col-xs-6">
        <ul class="list-unstyled bgfbox-plan-checks">
            <li><i class="fa fa-check"></i> Dental powered by AetnaDentalAccess®</li>
            <li><i class="fa fa-check"></i> MRI & CT Scans</li>
            <li><i class="fa fa-check"></i> Lab Testing</li>
            <li><i class="fa fa-check"></i> Pharmacy</li>
        </ul>
    </div>
    </div>
</div>
</div>
<aside class="testimonial-box mt30 pt30 pr20 pb30 pl20" style="
    border: 1px solid #eee;
    /* border-radius: 6px; */
    border: 1px solid #b3bec8;
">
<img src="https://disputebills.com/assets/uploads/2016/08/matt.png" alt="image description" style="
    width: auto;
    margin: 0 auto;
    left: 0;
    right: 0;
    display: block;
    border-radius: 60%;
    height: auto;
    height: 100px;
">
<blockquote style="
    text-align: center;
    color: #737373;
    /* margin-bottom: 30px; */
    font-style: italic;
    margin-top: 18px;
    line-height: 1.7;
    border: none;
    /* margin-bottom: 14px; */
">
<q style="
    margin-bottom: 14px;
    display: block;
">
"The CleanBill Savings Card was created to provide our customers with access to critical discounts needed to reduce high-out-of pocket costs. Our mission is to end medical debt. Are you ready to join the club?"</q>
<cite style="
    display: block;
    margin-top: 10px;
             "><strong style="
    display: inline;
    color: #5f5e5e;
">Matt Moulakelis</strong> 
  <small style="
    /* display: inline; */
    /* margin-left: 9px; */
">Founder &amp; CEO of Disputebills.com</small>
</cite>
</blockquote>
</aside>
</div>
</div><!-- / .row -->
<div class="small text-left"><b>FORM #DBI001</b></div>
</div><!-- / .container -->

<?php get_footer(); ?>