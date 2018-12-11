
function cod_Postal (direccion,barrio,Ciudad,Departamento,Pais) {
	//$("#txtCampo7").val("DEMA");
	procesoJSON = 'https://maps.googleapis.com/maps/api/geocode/json?address='+direccion+',+'+barrio+',+'+Ciudad+',+'+Departamento+',+'+Pais+'&sensor=false';
	$.getJSON(procesoJSON, function(dataJSON) {
			for ( i = 0 ; i<dataJSON.results.length;i++){
			respuesta = dataJSON.results[i];
			
			$("#txtCampo7").val(respuesta.address_components[7].long_name);
				break;
		}
	});
		/*$("#txtCampo1").val("hola");
		$.getJSON('https://maps.googleapis.com/maps/api/geocode/json?address=Cl.66f+7,+Medellin,+Antioquia,+Colombia&sensor=false',function(dataJSON){
		for ( i = 0 ; i<dataJSON.results.length;i++){
			respuesta = dataJSON.results[0];
			$("#txtCampo1").html(respuesta.formatted_address);
			$("#txtCampo8").val(respuesta.address_components[1].long_name);
				
		}
	});*/
}

	
