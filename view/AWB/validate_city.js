/* jQuery Autocompletar Ciudades */

	var data  = [];
	var data2 = [] ;
	var data3 = [] ;

		$(function() {
			$('#CampoPais').change(function(event) {
				
				var val = $(this).val();
				if (val != "") {
					data = [];
					jQuery.getJSON('ctrl_awb.php', {act: 'pais',p:val}, function(json, textStatus) {
				  	json.forEach( function(element, index) {
				  		data.push({value:element[1],id:element[0]});
				  	});
				   	$('#txtCampoD1').autocomplete("option", { source: data });
				  	$("#txtCampoD1").css("background-color", "green");
				});
				}
				
				
			});
			$('#CampoPais2').change(function(event) {
				
				var val = $(this).val();
				if (val != "") {
					data2 = [];
					jQuery.getJSON('ctrl_awb.php', {act: 'pais',p:val}, function(json, textStatus) {
				  	json.forEach( function(element, index) {
				  		data2.push({value:element[1],id:element[0]});
				  	});
				  	$('#txtCampoAero3').autocomplete("option", { source: data2 });
				  	$("#txtCampoAero3").css("background-color", "green");
				});
				}
				
				
			});
			$('#CampoPais3').change(function(event) {
				
				var val = $(this).val();
				if (val != "") {
					data3 = [];
					jQuery.getJSON('ctrl_awb.php', {act: 'pais',p:val}, function(json, textStatus) {
				  	json.forEach( function(element, index) {
				  		data3.push({value:element[1],id:element[0]});
				  	});
				  	$('#txtCampoR1').autocomplete("option", { source: data3 });
				  	$("#txtCampoR1").css("background-color", "green");
				});
				}
				
				
			});
		});



		$(function() {
			$("#txtCampoAero3").autocomplete({
			    minLength:3,
				source: data,
				focus: function(event, ui) {
					event.preventDefault();
					$(this).val(ui.item.value);
				},
				select: function(event, ui) {
					event.preventDefault();
					var valueSplit = ui.item.value.split(',');
					$(this).val(valueSplit[0]);
					int_Ciudad2 = ui.item.id;
				}
			});
		});

		$(function() {
			$("#txtCampoD1").autocomplete({
			    minLength:3,
				source: data,
				focus: function(event, ui) {
					event.preventDefault();
					$(this).val(ui.item.value);
				},
				select: function(event, ui) {
					event.preventDefault();
					var valueSplit = ui.item.value.split(',');
					$(this).val(valueSplit[0]);
					int_Ciudad1 = ui.item.id;
					alert(int_Ciudad1);
				}
			});
		});

		$(function() {
			$("#txtCampoR1").autocomplete({
			    minLength:3,
				source: data,
				focus: function(event, ui) {
					event.preventDefault();
					$(this).val(ui.item.value);
				},
				select: function(event, ui) {
					event.preventDefault();
					var valueSplit = ui.item.value.split(',');
					$(this).val(valueSplit[0]);
					int_Ciudad3 = ui.item.id;
				}
			});
		});