
/* Theme Name: Dispute Biills
   Author:Bryan Willis
   Author e-mail: bryanwillis1@gmail.com
   Version: 3.0.0
   Created:July 2016
   File Description:Main JS file of the template
*/


/* ------------------------------------------------------------------------------
 Map Location Popup
 ------------------------------------------------------------------------------ */
var mapLocation = new google.maps.LatLng(41.8894038, -87.6582336);
var marker;
var map;

function initialize() {
    var mapOptions = {
        zoom: 11,
        center: mapLocation,
        scrollwheel: false,
        styles: [{
            "featureType": "administrative",
            "elementType": "labels.text.fill",
            "stylers": [{
                "color": "#444444"
            }]
        }, {
            "featureType": "landscape",
            "elementType": "all",
            "stylers": [{
                "color": "#f2f2f2"
            }]
        }, {
            "featureType": "poi",
            "elementType": "all",
            "stylers": [{
                "visibility": "off"
            }]
        }, {
            "featureType": "poi",
            "elementType": "labels.text",
            "stylers": [{
                "visibility": "off"
            }]
        }, {
            "featureType": "road",
            "elementType": "all",
            "stylers": [{
                "saturation": -100
            }, {
                "lightness": 45
            }]
        }, {
            "featureType": "road.highway",
            "elementType": "all",
            "stylers": [{
                "visibility": "simplified"
            }]
        }, {
            "featureType": "road.arterial",
            "elementType": "labels.icon",
            "stylers": [{
                "visibility": "off"
            }]
        }, {
            "featureType": "transit",
            "elementType": "all",
            "stylers": [{
                "visibility": "off"
            }]
        }, {
            "featureType": "water",
            "elementType": "all",
            "stylers": [{
                "color": "#dbdbdb"
            }, {
                "visibility": "on"
            }]
        }]

    };

    map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
    var contentString = '<div class="map-info-box">' + '<div class="map-head">' + '<h3><img class="gmap-logo" src="http://cdn.disputebills.com/assets/themes/disputebills-theme/assets/images/dispute-bills-logo.png" width="181"></h3></div>' + '<p class="map-address"><i class="fa fa-map-marker"></i> 410 N May St, Chicago, IL 60642 <br><i class="fa fa-phone"></i> (888) 622-2809<br><span class="map-email"><i class="fa fa-envelope"></i> info@disputebills.com</span></p>' + '<a href="https://www.google.com/maps/place/DisputeBills.com/@41.8894038,-87.6582336,17z/data=!3m1!4b1!4m5!3m4!1s0x880e2cd658cd02db:0x402a0d561b675562!8m2!3d41.8893998!4d-87.6560396" target="_blank">Open on Google Maps</a></div>';

    var infowindow = new google.maps.InfoWindow({
        content: contentString,
    });

    var image = 'http://disputebils16.staging.wpengine.com/flag.svg';
    marker = new google.maps.Marker({
        map: map,
        draggable: false,
        title: 'Dispute Bills',
        icon: image,
        //animation: google.maps.Animation.DROP,
        position: mapLocation
    });

    google.maps.event.addListener(marker, 'click', function() {
        infowindow.open(map, marker);
    });
    infowindow.open(map,marker);

    google.maps.event.addListener(map, "click", function(event) {
        infowindow.close();
    });

    google.maps.event.addDomListener(window, "resize", function() {
        var center = map.getCenter();
        google.maps.event.trigger(map, "resize");
        map.setCenter(center);
    });
}

google.maps.event.addDomListener(window, 'load', initialize);

$('#modal-google-map').on('shown.bs.modal', function() {
    initialize();
});



/* ------------------------------------------------------------------------------
 App Configurations
 ------------------------------------------------------------------------------ */
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

// Magnific Popup with video
$('.btn-play').magnificPopup({
    type: 'iframe' // this is default type
});

//Typed Module
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
    $(".mg-top-120").sticky({topSpacing: 150, center: true, bottomSpacing: 1110});
});





jQuery(document).ready(function($) {


  // OWL Carasouel 
  $("#owl-demo").owlCarousel({
      navigation : false, // Show next and prev buttons
      slideSpeed : 300,
      paginationSpeed : 400,
      singleItem:true
  });


  var owl = $("#owl-demo-2");
  owl.owlCarousel({
      items : 3, 
      itemsDesktop : [992,2],
      itemsDesktopSmall : [768,1], 
      itemsTablet: [480,1], 
      itemsMobile : [320,1],
      pagination : false
  });
  $(".next").click(function(){ owl.trigger('owl.next'); })
  $(".prev").click(function(){ owl.trigger('owl.prev'); })
  //$('.item').matchHeight();



var stickyNav= $('.navbar-fixed-top').outerHeight(true);
$('.service-tabs .nav a').click(function (e) {
  e.preventDefault();
  $(this).tab('show');
});
$('.service-tabs a.scroll').on('click', function (e) {
        var href = $(this).attr('href');
        $('html, body').animate({
            scrollTop: $(href).offset().top - stickyNav + 25
        }, 1000, 'easeInOutExpo');
        e.preventDefault();
});

//$('.owl-item').equalize({children: '.thumbnail'});



/*
    $(function(){
        equalize('.owl-item','.thumbnail');
    });
    window.onresize=function(){
        equalize('.owl-item','.thumbnail');
    };
*/



/*
    $('a.scroll').bind('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        }, 1500, 'easeInOutExpo');
        event.preventDefault();
    });
*/




        $("#mySkill1").circliful({
            animation: 1,
            animationStep: 6,
            foregroundBorderWidth: 5,
            backgroundBorderWidth: 0,
            percent: 63,
            foregroundColor: '#009cde',
            backgroundColor: '#fff'
        });
        $("#mySkill2").circliful({
            animation: 1,
            animationStep: 6,
            foregroundBorderWidth: 5,
            backgroundBorderWidth: 0,
            percent: 90,
            foregroundColor: '#009cde',
            backgroundColor: '#fff'
        });
        $("#mySkill3").circliful({
            animation: 1,
            animationStep: 6,
            foregroundBorderWidth: 5,
            backgroundBorderWidth: 0,
            percent: 40,
            foregroundColor: '#009cde',
            backgroundColor: '#fff'
        });


$("#input_15_32_copy_values_activated").click( function(){
  if( $(this).is(':checked') ) {
     $("#input_15_32_1").val($('#input_15_31_1').val());
     $("#input_15_32_2").val($('#input_15_31_2').val());
     $("#input_15_32_3").val($('#input_15_31_3').val());
     $("#input_15_32_4").val($('#input_15_31_4').val());
     $("#input_15_32_5").val($('#input_15_31_5').val());
  } else {
     $("#input_15_32_1, #input_15_32_2, #input_15_32_3, #input_15_32_4, #input_15_32_5").val("");
  }
});


});




function autocollapse() {
    var navbar = $('.navbar-autocollapse');
    navbar.removeClass('collapsed'); 
    var navbarHeight = $(navbar).outerHeight();
    // cssHeight = $(navbar).css({"height": navbarHeight});
    if(navbarHeight > 100) 
        navbar.addClass('collapsed');
}
jQuery(document).on('ready', autocollapse);
jQuery(window).on('resize', autocollapse);



// var nlform = new NLForm( document.getElementById( 'nl-form' ) );