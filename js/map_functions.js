var geocoder;
var map;

function initializeMap(mapId) {
	
	geocoder = new google.maps.Geocoder();
	var latlng = new google.maps.LatLng(-34.397, 150.644);
	
	var myOptions = {
		zoom : 16,
		center : latlng,
		mapTypeId : google.maps.MapTypeId.ROADMAP
	}
	map = new google.maps.Map(document.getElementById(mapId), myOptions);
}

function codeAddress(address) {
	//var address = document.getElementById("address").value;
	if (geocoder) {
		geocoder.geocode( {
			'address' : address
		}, function(results, status) {
			if (status == google.maps.GeocoderStatus.OK) {
				map.setCenter(results[0].geometry.location);
				var marker = new google.maps.Marker( {
					map : map,
					position : results[0].geometry.location
				});
			} else {
				dialog("Geocode não teve sucesso pela seguinte razão: "	+ status);
			}
		});
	}
}
