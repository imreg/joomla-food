var Class = function(methods) {
    var klass = function() {
        this.initialize.apply(this, arguments)
    };
    for (var property in methods) {
        klass.prototype[property] = methods[property]
    }
    if (!klass.prototype.initialize)
        klass.prototype.initialize = function() {
        };
    return klass
};
var GMap = Class({
    initialize: function(coordinates, options) {
        $.extend({}, this.options, options);
        if (typeof (coordinates) === "undefined") {
            this.coordinates.longitude = 51.5037447;
            this.coordinates.latitude = -0.4478787;
        } else {
            this.coordinates = coordinates;
        }
        this.setLatLong();
        this.setMapCanvas();
    },
    options: {
        tag: 'map-canvas',
    },
    coordinates: {},
    map: {
        gj: 'jfds'
    },
    optionsMap: {
        zoom: 8
    },
    optionsMarker: {
        position: '',
        map: '',
    },
    setLatLong: function() {
        position = new google.maps.LatLng(this.coordinates.longitude, this.coordinates.latitude);
        this.optionsMap.center = position;
        this.optionsMarker.position = position;
    },
    setMapCanvas: function() {
        var canvas = document.getElementById(this.options.tag);
        this.map = new google.maps.Map(canvas, this.optionsMap);
    },
    checkPlace: function() {
        var postcode = document.getElementById('jform_address_postcode').value;
        var content = document.getElementById('jform_comment').value;
        this.postcode(postcode, content);
    },
    postcode: function(address, content) {
        geocoder = new google.maps.Geocoder();
        postcode = {'address': address};
        this_local = this;
        geocoder.geocode(postcode, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                this_local.map.setCenter(results[0].geometry.location);
                this_local.map.setZoom(15);

                this_local.marker = new google.maps.Marker({
                    map: this_local.map,
                    position: results[0].geometry.location,
                    icon: '/media/com_foodbranches/images/flag.png',
                });
                if (typeof (content) !== "undefined") {
                    this_local.mapContent(content);
                }
            } else {
                alert('Geocode was not successful for the following reason: ' + status);
            }
        });
    },
    mapContent: function(content) {
        var options = this.mapInfoBox(content);
        var infoBox = new InfoBox(options);
        infoBox.open(this.map, this.marker);
    },
    /* Display info Box at each place*/
    mapInfoBox: function(contentStr) {
        var valid = document.getElementsByClassName('infobox');
        if (typeof (valid) !== 'undefined') {
            var index;
            for (index = 0; index < valid.length; index++) {
                var parent = valid[index].parentNode;
                parent.removeChild(valid[index]);
            }
        }
        var boxText = document.createElement("div");
        boxText.className = "infobox"
        boxText.innerHTML = "<div>" + contentStr + "</div>";

        var options = {
            content: boxText,
            disableAutoPan: false,
            maxWidth: 0,
            pixelOffset: new google.maps.Size(-70, 0),
            zIndex: null,
            boxStyle: {
                background: "",
                opacity: 0.75,
                width: "140px",
                bottom: "-30px"
            },
            closeBoxMargin: "10px 2px 2px 2px",
            closeBoxURL: "",
            infoBoxClearance: new google.maps.Size(10, 10),
            isHidden: false,
            pane: "floatPane",
            enableEventPropagation: false,
            position: 10,
        };
        return options;
    },
    /* Manage Public side where infoBox is displayed if mouse is moved over it */
    infoBox: function(map, marker, cotent) {
        var myOptions = this.mapInfoBox(cotent);
        var infoBox = new InfoBox(myOptions);
        google.maps.event.addListener(marker, 'mouseover', function() {
            infoBox.open(map, marker);
        });
        google.maps.event.addListener(marker, 'mouseout', function() {
            infoBox.close();
        });
    },
    getPlaces: function() {
        var locations = this.getCoordinates();
        var index;
        this_local = this;
        for (index = 0; index < locations.length; index++) {
            placePosition = new google.maps.LatLng(locations[index].latitude,
                    locations[index].longitude);
            marker = new google.maps.Marker({
                map: this_local.map,
                position: placePosition,
                title: locations[index].companyname,
                icon: '/media/com_foodbranches/images/flag.png',
            });
            if (typeof (locations[index].comment) !== 'undefined' && locations[index].is_comment == 1)
            {
                this.infoBox(this_local.map, marker, locations[index].comment);
            }
        }
        this_local.map.setZoom(7);
    },
    setCoordinates: function(coordinates) {
        this.coordinates = coordinates;
    },
    getCoordinates: function() {
        return this.coordinates;
    },
    /* =========================================================== */
    /* Admin side postcode listener if any postcode has been typed */
    postcodeListener: function() {
        this_local = this;
        var postcodefield = document.getElementById('jform_address_postcode');
        postcodefield.onkeyup = function() {
            var value = postcodefield.value;
            this_local.postcodeCheck(value);
        }
    },
    postcodeCheck: function(address) {
        geocoder = new google.maps.Geocoder();
        postcode = {'address': address};
        geocoder.geocode(postcode, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                var value = results[0].geometry.location;
                var city = document.getElementById('jform_address_city');
                var color_city = '#FFFFFF';
                var value_city = '';
                switch (results[0].address_components.length)
                {
                    case 3:
                    case 5:
                    case 6:
                        var address_components = results[0].address_components[1].long_name;
                        break;
                    case 4:
                        var address_components = results[0].address_components[3].long_name;
                        break;
                    default:
                        color_city = '#FFD5E7';
                        break;
                }
                city.value = value_city;
                city.style.background = color_city;
                document.getElementById('jform_latitude').value = value.k;
                document.getElementById('jform_longitude').value = value.A;
                document.getElementById('jform_address_postcode').style.background = '#D5EEFF';
            } else {
                document.getElementById('jform_address_postcode').style.background = '#FFD5E7';
            }
        });
    },
});


