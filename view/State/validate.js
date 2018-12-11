var objectoactual;
var state = [];
$(function() {
	$('#lista').DataTable({
			"columnDefs": [{ "orderable": false, "targets": [ -1 ] }],
			ordering: true,
			"orderClasses": false,
			"autoWidth": true,
			"lengthChange": false,
			"lengthMenu": [ 10 ],
			"language": {
				"search": "",
				searchPlaceholder: "Digite el dato que desea buscar...",
				"info": "Pagina _PAGE_ de _PAGES_ - _MAX_ registros",
				"emptyTable": "No se encontraron datos",
				"infoEmpty": "No se encontraron datos",
				"infoFiltered": " - (Filtro aplicado)",
				"paginate": {"previous": "Anterior", "next": "Siguiente"}
			}
		});
	$('.datepicker2').datepicker();
	$('.datepicker').datepicker();
	$('.datepicker2').datepicker("option", "dateFormat","yy/mm/dd");
	$('.datepicker').datepicker("option", "dateFormat","yy/mm/dd");
	$('.factura').keyup(function(event) {
		var n = 20;
		var nr = $(this).val().length;
		objectoactual = $(this);
		if (nr<n) {
			$('#cantidad').text("Faltan "+ (n-nr)+" numeros");
		}else if (nr>n) {
			$('#cantidad').text("Sobran "+ (n-nr)+" numeros");
		}else{
			$('#cantidad').text("Aceptado");
			$.post('ctrl_state.php', {atc: 'verificar',value:$(this).val()}, function(data, textStatus, xhr) {
				if ($.trim(data) == "0") {
					objectoactual.css('backgroundColor', '#19A15E');
					$('#cantidad').text('aceptado');
				}else{
					objectoactual.css('backgroundColor', '#DD5044');
					$().toastmessage('showToast', { text: 'Factura No Existe Nr.'+objectoactual.val() , sticky: false, type: 'error' });
					$('#cantidad').text("No existe dicha factura");
				}
			});
		}
	});

	$('.consolidadV').keyup(function(event) {
		var n = 11;
		var nr = $(this).val().length;
		objectoactual = $(this);
		if (nr<n) {
			$('#cantidad').text("Faltan "+ (n-nr)+" numeros");
		}else if (nr>n) {
			$('#cantidad').text("Sobran "+ (n-nr)+" numeros");
		}else{
			$('#cantidad').text("Aceptado");
			$.post('ctrl_state.php', {atc: 'verificar2',value:$(this).val()}, function(data, textStatus, xhr) {
				if ($.trim(data) == "0") {
					objectoactual.css('backgroundColor', '#19A15E');
					$('#cantidad').text('aceptado');
				}else{
					objectoactual.css('backgroundColor', '#DD5044');
					$().toastmessage('showToast', { text: 'Factura No Existe Nr.'+objectoactual.val() , sticky: false, type: 'error' });
					$('#cantidad').text("No existe dicha factura");
				}
			});
		}
	});

	$('.GrupoV').keyup(function(event) {
		var n = 13;
		var nr = $(this).val().length;
		objectoactual = $(this);
		if (nr<n) {
			$('#cantidad').text("Faltan "+ (n-nr)+" numeros");
		}else if (nr>n) {
			$('#cantidad').text("Sobran "+ (n-nr)+" numeros");
		}else{
			$('#cantidad').text("Aceptado");
			$.post('ctrl_state.php', {atc: 'verificar3',value:$(this).val()}, function(data, textStatus, xhr) {
				if ($.trim(data) == "0") {
					objectoactual.css('backgroundColor', '#19A15E');
					$('#cantidad').text('aceptado');
				}else{
					objectoactual.css('backgroundColor', '#DD5044');
					$().toastmessage('showToast', { text: 'Factura No Existe Nr.'+objectoactual.val() , sticky: false, type: 'error' });
					$('#cantidad').text("No existe dicha factura");
				}
			});
		}
	});

});



function add_single(){

	var verificar = F_verificar();
	if (verificar) {
		var data=$("form").serialize()+"&atc=add_single";
		$.post('ctrl_state.php', data, function(data, textStatus, xhr) {
			if ($.trim(data)=="0") {
				$().toastmessage('showToast', { text: 'Esta factura ya estuvo en este Registro' , sticky: true, type: 'error' });
			}else{
				$().toastmessage('showToast', { text: 'Aceptado' , sticky: false, type: 'success' });
			}
		});
	}
}
function add_PDE(){

	var verificar = F_verificar();
	if (verificar) {
		var data=$("form").serialize()+"&atc=add_PDE";
		$.post('ctrl_state.php', data, function(data, textStatus, xhr) {
			if ($.trim(data)=="0") {
				$().toastmessage('showToast', { text: 'Esta factura no ha pasado por "Factura en Reparto" por lo tanto no puede ser actulizada con Entregado' , sticky: true, type: 'error' });
			}else{
				$().toastmessage('showToast', { text: 'Aceptado' , sticky: false, type: 'success' });
			}
		});
	}
}
function add_Consolidado(){

	var verificar = F_verificar();
	if (verificar) {
		var data=$("form").serialize()+"&atc=add_Consolidado";
		$.post('ctrl_state.php', data, function(data, textStatus, xhr) {
			if ($.trim(data)!="") {
				$().toastmessage('showToast', { text: 'Se han actualizado todas las facturas de dicho consolidado, a excepción de: '+$.trim(data)+' \n por que ya estuvieron en dicho registro' , sticky: true, type: 'error' });
			}else{
				$().toastmessage('showToast', { text: 'Aceptado' , sticky: false, type: 'success' });
			}
		});
	}
}

function add_GRPcon(){

	var verificar = F_verificar();
	if (verificar) {
		var data=$("form").serialize()+"&atc=add_GRPcon";
		$.post('ctrl_state.php', data, function(data, textStatus, xhr) {
			if ($.trim(data)!="") {
				$().toastmessage('showToast', { text: 'Se han actualizado todas las facturas de dicho consolidado, a excepción de: '+$.trim(data)+' \n por que ya estuvieron en dicho registro' , sticky: true, type: 'error' });
			}else{
				$().toastmessage('showToast', { text: 'Aceptado' , sticky: false, type: 'success' });
			}
		});
	}
}

function exe_report(){

	var verificar = F_verificar();
	if (verificar) {
		var data=$("form").serialize()+"&atc=exe_report";
		jQuery.getJSON('ctrl_state.php', data, function(json, textStatus) {
		  $(":hidden").show();
		  var  tabla = $('#lista').DataTable();
		  tabla.clear().draw(false);
		  json.forEach( function(element, index) {
		  	var estado = state[element[1]-1][1];
		  	tabla.row.add([element[0],estado]).draw(false);
		  });

		});
		
	}
}
function exe_RAR(){

	var verificar = F_verificar();
	if (verificar) {
		var data=$("form").serialize()+"&atc=exe_RAR";
		jQuery.getJSON('ctrl_state.php', data, function(json, textStatus) {
		  $(":hidden").show();
		  var  tabla = $('#lista').DataTable();
		  tabla.clear().draw(false);
		  json.forEach( function(element, index) {
		  	
		  	tabla.row.add([element[0],element[1]['d']]).draw(false);
		  });

		});
		
	}
}

function F_verificar(){
	var respuesta = true;
	var can = $('#cantidad').text() ;
	if (can != "aceptado") {
		respuesta = false;
		$().toastmessage('showToast', { text: "Corrregir el numero " , sticky: false, type: 'error' });
	}
	for (var i = 0; i <=4 ; i++) {
		if ($('#txtcampo'+i).val() == "") {
			$('#txtcampo'+i).css('backgroundColor', '#DD4F43');
			$().toastmessage('showToast', { text: "Campo obligatorio" , sticky: false, type: 'error' });
			respuesta = false;
			break;
		}else{
			$('#txtcampo'+i).css('backgroundColor', '#fff');
		}
	};
	return respuesta;

}
