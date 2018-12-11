var map;
var geocoder = new google.maps.Geocoder();
var marker;
var markerAgentes = [];


 function initMap() {
   map = new google.maps.Map(document.getElementById('map'), {
     center: new google.maps.LatLng(36.2421212,-113.7499198),
     zoom: 10
   });
 }

 function changeCenterMap (direccion) {
 	geocoder.geocode( {'address' : direccion}, function(results, status) {
    if (status == google.maps.GeocoderStatus.OK) {
        map.setCenter(results[0].geometry.location);
        marker = new google.maps.Marker({
            position: results[0].geometry.location,
            map: map,
            title:"Empresa Sede Principal",
            animation: google.maps.Animation.DROP
        }); 
    }
	});
 }

function Position(direccion){
	geocoder.geocode( {'address' : direccion}, function(results, status) {
    if (status == google.maps.GeocoderStatus.OK) {
       return results;
    }
	});
}

function AddressAgent(){
	$.post('ctrl_rutas.php', {act: 'dir_agent'}, function(data, textStatus, xhr) {
		data.forEach( function(element, index) {
			geocoder.geocode( {'address' : element[0]}, function(results, status) {
    			if (status == google.maps.GeocoderStatus.OK) {
    			   var marker2 = new google.maps.Marker({
            	   position: results[0].geometry.location,
            	   map: map,
            	   title:element[1],
            	   animation: google.maps.Animation.DROP
        		   }); 
    			}
			}); 
		});
	},'json');
}

$(function() {
	AddressAgent();
});

function Marker(position){
	 /*var pos = Position(position);
	  marker = new google.maps.Marker({
            position: pos[0].geometry.location,
            map: map,
            title:"Empresa Sede Principal",
            animation: google.maps.Animation.DROP
        }); 	*/
}