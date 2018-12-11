/* jQuery Autocompletar Ciudades */
	var int_Ciudad1 = 1 ;
	var int_Ciudad2 ;

	var data  = [];
	var data2 = [] ;
	var data3 = [];
	var data4 = [];
		$(function() {
			$(".search-btn").bind("click", function(){
				
				var val = $('#txtCampo8').val();
				var val2 = $('#txtCampo0').val();
				var val3 = $('#txtCampo1').val();
				if(val2 != 0){

					if ($('#txtCampo8').val()!= ""  && $('#txtCampo1').val()!= "" ) {
						src_rem("Nombre y telefono",val3,val2,val);
					}
					if ($('#txtCampo8').val()!= ""  && $('#txtCampo1').val()== "" ) {
						src_rem("Telefono",val,val2,"1");
					}else if ($('#txtCampo8').val()== ""  && $('#txtCampo1').val()!= "" ) {
						src_rem("Nombre",val3,val2,"2");
					}else if ($('#txtCampo8').val()== ""  && $('#txtCampo1').val()== "" ){
					setTimeout(function(){$().toastmessage('showToast', {	text: 'Porfavor ingrese un dato en telefono o Nombre', sticky: false, type: 'warning' });},960);	
					}


				}else{
					setTimeout(function(){$().toastmessage('showToast', {	text: 'Falta Agente por selccionar', sticky: false, type: 'warning' });},960);
				}
				
					function src_rem(varmsn,vardt,varag,varstat){
						setTimeout(function(){add_toast('showSuccessToast','Buscando Datos de Remitente, por '+varmsn);},960);
						data3 = [];
						data4 = [];
						datainit = [];
						jQuery.getJSON('ctrl_tracking.php', {act: 'rem',p:vardt,ag:varag,nv:varstat}, function(json, textStatus) {
				  				json.forEach( function(element, index) {
				  					data3.push({value:element[0]});
				  					
				  				});
				  		$('#txtCampo2').autocomplete("option", { source: data3 });
				  	 		fill_field(data3);			  	
						});

						jQuery.getJSON('ctrl_tracking.php', {act: 'rem2',p:vardt,ag:varag,nv:varstat}, function(json, textStatus) {
				  				json.forEach( function(element, index) {
				  					data4.push({value:element[0]});
				  					var valueSplit = element[0].split(',');
					$('#txtCampo8').val(valueSplit[3]);
					$("#txtCampo1").val(valueSplit[0]);
					$("#txtCampo3").val(valueSplit[1]);
					$("#txtCampo7").val(valueSplit[2]);
					$("#txtCampo10").val(valueSplit[4]);

					$("#txtCampo5").val(valueSplit[6]);
					$("#txtCampo4").val(valueSplit[5]);
					 $('#CampoPais > option').each(function(){
 					if($(this).text()==valueSplit[7]) $(this).parent('select').val($(this).val())
 						});
					 $("#txtCampo6").val(valueSplit[7]);

					int_Ciudad1 = valueSplit[8];

				  				});
				  	
				  		$('#txtCampo1').autocomplete("option", { source: data4 });
				  		
				  		if(data4.length == 0){		  	
				    	setTimeout(function(){$().toastmessage('showToast', {	text: 'Ups.. No se encontraron Dato', sticky: false, type: 'error' });},2000);
				    		}else{
				    			setTimeout(function(){$().toastmessage('showToast', {	text: 'Registro cargados,listo para Autocompletar', sticky: false, type: 'success' });},960);
				    		}
						});

					}


				
				

				});
			$('#CampoPais').change(function(event) {
				
				var val = $(this).val();
				cargar_An(true);
				if (val != "") {
					data = [];
					jQuery.getJSON('ctrl_tracking.php', {act: 'pais',p:val}, function(json, textStatus) {
				  	json.forEach( function(element, index) {
				  		data.push({value:element[1],id:element[0]});
				  	});
				   	$('#txtCampo4').autocomplete("option", { source: data });
				  	cargar_An(false);
				});
				}
				 
				
			});
			$('#CampoPais2').change(function(event) {
				
				var val = $(this).val();
				cargar_An(true);
				if (val != "") {
					data2 = [];
					jQuery.getJSON('ctrl_tracking.php', {act: 'pais',p:val}, function(json, textStatus) {
				  	json.forEach( function(element, index) {
				  		data2.push({value:element[1],id:element[0]});
				  	});
				  	$('#txtCampo11').autocomplete("option", { source: data2 });

				  	cargar_An(false);
				});
				}
				
				
			});

			$('#txtCampo8').change(function(event) {
				
				
			});
			$('#txtCampo10').change(function(event) {
				
				var val = $(this).val();
				var val2 = $('#txtCampo0').val();
				
				if ($('#txtCampo10').val()!= "" && $('#txtCampo8').val()=="" ) {
					add_toast('showSuccessToast','Buscando Datos de Remitente, Por Email ');
					data3 = [];
					data4 = [];
					jQuery.getJSON('ctrl_tracking.php', {act: 'rem',pc:val,ag:val2}, function(json, textStatus) {
				  	json.forEach( function(element, index) {
				  		data3.push({value:element[0]});
				  		
				  	});
				  	$('#txtCampo2').autocomplete("option", { source: data3 });
				  	
				  	
				  	
				});
					jQuery.getJSON('ctrl_tracking.php', {act: 'rem2',pc:val,ag:val2}, function(json, textStatus) {
				  	json.forEach( function(element, index) {
				  		data4.push({value:element[0]});
				  	});
				  	
				  	$('#txtCampo1').autocomplete("option", { source: data4 });
				  $().toastmessage('showToast', {	text: 'Registro cargados,listo para Autocompletar', sticky: true, type: 'success' });
				  
				});
				}else {
					
					cargar_An(false);
				}
				
				
			});

		});

	function fill_field(element){
		
	}



		$(function() {
			$("#txtCampo11").autocomplete({
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
					$("#txtCampo12").val(valueSplit[1]);
					$("#txtCampo13").val(valueSplit[2]);
					$("input[id=txtdcity]").val(ui.item.id);
					int_Ciudad2 = ui.item.id;
					console.log(valueSplit);
					debugger;
					if(valueSplit[3] != "A"){
					$().toastmessage('showToast', {	text: 'Cuenta como redespacho, sale de la zona A', sticky: true, type: 'warning' });	
					} 
				}
			});

			
		});

		$(function() {
			$("#txtCampo4").autocomplete({
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
					$("#txtCampo5").val(valueSplit[1]);
					$("#txtCampo6").val(valueSplit[2]);
					$("input[id=txtrcity]").val(ui.item.id);
					int_Ciudad1 = ui.item.id;
				}
			});
		});

		$(function() {
			$("#txtCampo2").autocomplete({
			    minLength:1,
				source:data3,
				focus: function(event, ui) {
					event.preventDefault();
					$(this).val(ui.item.value);

				},
				select: function(event, ui) {
					event.preventDefault();
					var valueSplit = ui.item.value.split(',');
					$(this).val(valueSplit[0]);
					$("#txtCampo9").val(valueSplit[1]);
					$("#txtCampo15").val(valueSplit[2]);
					$("#txtCampo14").val(valueSplit[3]);
					$("#txtCampo16").val(valueSplit[4]);
					
					$("#txtCampo11").val(valueSplit[5]);
					$("#txtCampo12").val(valueSplit[6]);
					 $('#CampoPais2 > option').each(function(){
 						if($(this).text()==valueSplit[7]) $(this).parent('select').val($(this).val())
 						});
					 $("#txtCampo13").val(valueSplit[7]);
					int_Ciudad2 = valueSplit[8];
					
				},
				open: function(event, ui){
                $(this).autocomplete("widget").css({
                "width": "600px",
                "overflow":"hidden"
               
            		});
                 $(".ui-menu .ui-menu-item a").css({
               		"text-overflow": "ellipsis",
   					"overflow": "hidden"
            		});
            	}

			});
		});
		$(function() {
			$("#txtCampo1").autocomplete({
				
			    minLength:0,
				source:data,
				focus: function(event, ui) {
					event.preventDefault();
					var valueSplit = ui.item.value.split(' ,');
					
				},
				select: function(event, ui) {
					event.preventDefault();
					var valueSplit = ui.item.value.split(',');
					$('#txtCampo8').val(valueSplit[3]);
					$("#txtCampo1").val(valueSplit[0]);
					$("#txtCampo3").val(valueSplit[1]);
					$("#txtCampo7").val(valueSplit[2]);
					$("#txtCampo10").val(valueSplit[4]);

					$("#txtCampo5").val(valueSplit[6]);
					$("#txtCampo4").val(valueSplit[5]);
					 $('#CampoPais > option').each(function(){
 					if($(this).text()==valueSplit[7]) $(this).parent('select').val($(this).val())
 						});
					 $("#txtCampo6").val(valueSplit[7]);

					int_Ciudad1 = valueSplit[8];
				
					
				},
				open: function(event, ui){
                $(this).autocomplete("widget").css({
                "width": "600px",
                "overflow":"hidden"
               
            		});
                 $(".ui-menu .ui-menu-item a").css({
               		"text-overflow": "ellipsis",
   					"overflow": "hidden","text-aling" : "inherit"
            		});
            	}

			});
		});