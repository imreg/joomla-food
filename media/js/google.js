var Map = {
	contructor : Map,
	init : function(coordinates, options) {
		this.options = $.extend({}, this.options, options);

		if (typeof (coordinates) === "undefined") {
			this.coordinates.longitude = 51.5037447;
			this.coordinates.latitude = -0.4478787;
		} else {
			this.coordinates = coordinates;
		}

		this.latlong();
		this.mapCanvas();
	},
	map: {},
	options : {
		tag : '#map-canvas'
	},
	coordinates : {},
	optionsMap : {
		zoom : 8
	},
	optionsMarker : {
		position : '',
		map : '',
	},
	postcode : function(address, content) {
		geocoder = new google.maps.Geocoder();
		pcode = {'address' : address};
		geocoder.geocode(pcode , function(results, status) {
			if (status == google.maps.GeocoderStatus.OK) {
				Map.map.setCenter(results[0].geometry.location);
				Map.map.setZoom(15);
				Map.marker = new google.maps.Marker({
					map : Map.map,
					position : results[0].geometry.location,
					icon : '/media/com_foodbranches/images/flag.png',
				});
				if (typeof (content) !== "undefined") {
					Map.mapContent(content);
				}
			} else {
				alert('Geocode was not successful for the following reason: '
						+ status);
			}
		});
	},
	postcodeCheck : function(address) {
		geocoder = new google.maps.Geocoder();
		pcode = {'address' : address};
		geocoder.geocode(pcode , function(results, status) {
			if (status == google.maps.GeocoderStatus.OK) {
				var value = results[0].geometry.location;
				if(results[0].address_components.length == 5) {
					var address_components  = results[0].address_components[1];
					$('#jform_address_city').attr('value',address_components.long_name);
				}
				
				$('#jform_latitude').attr('value',value.k);
				$('#jform_longitude').attr('value',value.A);
				$('#jform_address_postcode').css({'background-color':'#D5EEFF'});
			} else {
				$('#jform_address_postcode').css({'background-color':'#FFD5E7'});
			}
		});
	},
	mapContent: function(contentStr) {
		var myOptions = this.mapInfoBox(contentStr);
        var infoBox = new InfoBox(myOptions);
        infoBox.open(Map.map,Map.marker);
	},
	mapInfoBox: function(contentStr) {
		var valid = document.getElementsByClassName('infobox');
		if(typeof(valid) !== 'undefined') {
			var index;
			for (index = 0; index < valid.length; index++) {
				var parent = valid[index].parentNode;
				parent.removeChild(valid[index]);
			}
		}
        var boxText = document.createElement("div");
        boxText.className = "infobox"
        boxText.innerHTML = "<div>"+contentStr+"</div>";
		
        var options = {
        		content: boxText,
        		disableAutoPan: false,
        		maxWidth: 0,
        		
        		pixelOffset: new google.maps.Size(-70, 0),
        		zIndex: null,
        		boxStyle: { 
        			background: "",//"url('http://google-maps-utility-library-v3.googlecode.com/svn/trunk/infobox/examples/tipbox.gif') no-repeat",
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
	latlong : function() {
		position = new google.maps.LatLng(this.coordinates.longitude,
				this.coordinates.latitude);
		Map.optionsMap.center = position;
		Map.optionsMarker.position = position;
	},
	mapCanvas : function() {
		Map.map = new Object();
		Map.map = new google.maps.Map($(this.options.tag).get(0), this.optionsMap);		
	},	
	checkPlace : function() {
		var value = $( "#jform_address_postcode" ).val();		
		var content = $('#jform_comment').val();
		this.postcode(value,content);
		
	},
	postcodeListener : function(){
		$( "#jform_address_postcode" ).keyup(function() {
			var value = $( "#jform_address_postcode" ).val();
			Map.postcodeCheck(value);
		});
	},
	setCoordinates : function(coordinates) {
		this.coordinates = coordinates;
	}, 
	getCoordinates : function() {		
		return this.coordinates;
	},
	getPlaces : function() {
		var locations = this.getCoordinates();
		var index;
		for (index = 0; index < locations.length; index++) {
			placePosition = new google.maps.LatLng(locations[index].latitude,
					locations[index].longitude);
			marker = new google.maps.Marker({
				map : Map.map,
				position : placePosition,
				title : locations[index].companyname,
				icon : '/media/com_foodbranches/images/flag.png',
			});
			if(typeof(locations[index].comment) !== 'undefined' && locations[index].is_comment == 1)
			{
				this.infoBox(Map.map,marker,locations[index].comment);
			}
		}
		Map.map.setZoom(7);
	},
	infoBox : function(map, marker, cotent) {		
		var myOptions = this.mapInfoBox(cotent);
        var infoBox = new InfoBox(myOptions);
		google.maps.event.addListener(marker, 'mouseover', function() {
			infoBox.open(map,marker);
			//infowindow.open(map,marker);
		});
		google.maps.event.addListener(marker, 'mouseout', function() {
			//infowindow.close();
			infoBox.close();
		});
	},
	geolocation : function() {
		if(navigator.geolocation) {
			navigator.geolocation.getCurrentPosition(function(position) {
			      var pos = new google.maps.LatLng(position.coords.latitude,
			                                       position.coords.longitude);

			      var infowindow = new google.maps.InfoWindow({
			        map: Map.map,
			        position: pos,
			        content: 'Your Location'
			      });

			      Map.map.setZoom(10);
			      Map.map.setCenter(pos);
			    }, function() {
			      handleNoGeolocation(true);
			    });

		}
	}
};


