function clubContent(i, contactVenueStr) {
    var content = '<div class="c-card c-col c-col--12"> <div class="c-card__body">' +
        '<h4>' + clubs[i].name + '</h4>' +
        '<p class="c-meta"> </p>';
    if ("phone" in clubs[i])
        content = content + '<span>' + clubs[i].phone + ' </span>';
    content = content + '</div> <div class="c-card__footer">' +
        '<a class="c-card__link" href="/find-venue/contact/?club_id=' + clubs[i].id + '">' +
        contactVenueStr + ' </a> </div> </div> ';
    return content;
}

function fillMap(opt) {

    var myLatLng = {
        lat: opt.lat,
        lng: opt.lng
    };
    var markers = [];

    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: opt.zoom,
        center: myLatLng,
        mapTypeControl: false,
        streetViewControl: false

    });
    var infowindow = new google.maps.InfoWindow({

    });
    var arrayLength = clubs.length;
    for (var i = 0; i < arrayLength; i++) {

        var marker = new google.maps.Marker({
            position: {
                lat: clubs[i].lat,
                lng: clubs[i].lng
            },
            icon: opt.icon + 'marker.svg',
            title: clubs[i].name,
            club_index: i

        });


        google.maps.event.addListener(marker, 'click', (function(marker, infowindow, contactVenueStr) {
            return function() {
                infowindow.setContent(clubContent(marker.club_index, contactVenueStr));
                infowindow.open(map, marker);
            };
        })(marker, infowindow, opt.contactVenue));

        markers.push(marker);
    }
    var cluster_styles = [{
        width: 40,
        height: 40,
        url: opt.icon + 'm1.svg',
        textColor: 'white',
        textSize: 12
    }];


    var markerCluster = new MarkerClusterer(map, markers, {
        styles: cluster_styles,
        maxZoom: 9
    });
}