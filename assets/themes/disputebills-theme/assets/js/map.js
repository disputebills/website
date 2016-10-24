var mapLocation = new google.maps.LatLng(41.8894038, -87.6582336);
var marker;
var map;

function initialize() {
    var mapOptions = {
        zoom: 11, //change zoom here
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

    //change address details here
    var contentString = '<div class="map-info-box">' + '<div class="map-head">' + '<h3><img class="gmap-logo" src="http://cdn.disputebills.com/assets/themes/disputebills-theme/assets/images/dispute-bills-logo.png" width="181"></h3></div>' + '<p class="map-address"><i class="fa fa-map-marker"></i> 410 N May St, Chicago, IL 60642 <br><i class="fa fa-phone"></i> (888) 622-2809<br><span class="map-email"><i class="fa fa-envelope"></i> info@disputebills.com</span></p>' + '<a href="https://www.google.com/maps/place/DisputeBills.com/@41.8894038,-87.6582336,17z/data=!3m1!4b1!4m5!3m4!1s0x880e2cd658cd02db:0x402a0d561b675562!8m2!3d41.8893998!4d-87.6560396" target="_blank">Open on Google Maps</a></div>';


    var infowindow = new google.maps.InfoWindow({
        content: contentString,
    });


    var image = 'img/flag.svg';
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