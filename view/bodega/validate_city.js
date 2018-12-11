/* jQuery Autocompletar Ciudades */
	var int_Ciudad1=0 ;


	var data  = [];
	
		$(function() {
			$('#CampoPais').change(function(event) {
				
				var val = $(this).val();
				cargar_An(true);
				if (val != "") {
					int_Ciudad1 = 0;
					data = [];
					jQuery.getJSON('ctrl_ingCarga.php', {act: 'pais',p:val}, function(json, textStatus) {
				  	json.forEach( function(element, index) {
				  		data.push({value:element[1],id:element[0]});
				  	});
				  	$('#txtcampo3').prop("disabled", false);
				   	$('#txtcampo3').autocomplete("option", { source: data });
				  	cargar_An(false);
				});
				}
				
				
			});
			
		});



		$(function() {
			$("#txtcampo3").autocomplete({
			    minLength:3,
				source: data,
				focus: function(event, ui) {
					event.preventDefault();
					$(this).val(ui.item.value);
				},
				select: function(event, ui) {
					event.preventDefault();
					var valueSplit = ui.item.value.split(',');
					$(this).val(valueSplit[0]+", "+valueSplit[1]+", "+valueSplit[2]);
					
					int_Ciudad1 = ui.item.id;
				}
			});
		});