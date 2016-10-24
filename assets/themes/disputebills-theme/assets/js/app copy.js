
/* Theme Name: Dispute Biills
   Author:Bryan Willis
   Author e-mail: bryanwillis1@gmail.com
   Version: 3.0.0
   Created:July 2016
   File Description:Main JS file of the template
*/


/* ------------------------------------------------------------------------------
 This is jquery module for main app
 ------------------------------------------------------------------------------ */
//var $ = jQuery.noConflict(); //Relinquish jQuery's control of the $ variable. 

jQuery(function ($) {
    'use strict';
    var App = {
        $options: {},
        $backToTop: $(".back-to-top"),
        $animationload: $(".animationload"),
        $navbarLink: $('.navbar-nav a'),

        bindEvents: function () {
            //binding events
            $(window).on('scroll', this.scroll.bind(this));
            $(document).on('ready', this.docReady.bind(this));
        },
        //window scroll event
        scroll: function (event) {
            if ($(window).scrollTop() > 100) {
                this.$backToTop.fadeIn();
            } else {
                this.$backToTop.fadeOut();
            }
        },
        //document ready event
        docReady: function () {

            this.$animationload.delay(600).fadeOut("slow");

            this.$backToTop.click(function(){
                $("html, body").animate({ scrollTop: 0 }, 1000);
                return false;
            }); 

            this.$navbarLink.click(function(event) {
                var $anchor = $(this);
                $('html, body').stop().animate({
                    scrollTop: $($anchor.attr('href')).offset().top - 50
                }, 1500, 'easeInOutExpo');
                event.preventDefault();
            });

        },
        init: function (_options) {
            $.extend(this.$options, _options);
            this.bindEvents();
        }
    };

    App.init({});
});


//Magnific Popup
$('.show-image').magnificPopup({type: 'image'});


// Example with multiple objects
$('.play-btn').magnificPopup({
    items: [
      {
        src: 'https://www.youtube.com/watch?v=RW5HPtOHSYs',
        type: 'iframe' 
      }
    ],
    type: 'image' // this is default type
});




//Typed
$(".element").each(function(){
    var $this = $(this);
    $this.typed({
    strings: $this.attr('data-elements').split(','),
    typeSpeed: 100, // typing speed
    backDelay: 3000 // pause before backspacing
    });
});


//sticky header on scroll
$(window).load(function() {
    $(".sticky").sticky({topSpacing: 0});
    $(".mg-top-120").sticky({topSpacing: 150, center: true, bottomSpacing: 1100});

    
});
