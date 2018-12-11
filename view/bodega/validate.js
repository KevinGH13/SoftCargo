var facturas = [];
$(function() {
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
			$.post('ctrl_ingCarga.php', {atc: 'verificar',value:$(this).val(),ciudad:int_Ciudad1}, function(data, textStatus, xhr) {
				if ($.trim(data) == "0") {
					objectoactual.css('backgroundColor', '#19A15E');
					$('#cantidad').text('aceptado');
				}else if($.trim(data)=="2"){
					objectoactual.css('backgroundColor', '#DD5044');
					$().toastmessage('showToast', { text: 'Factura Ya esta ingresada a esta bodega, Nr.'+objectoactual.val() , sticky: false, type: 'error' });
					$('#cantidad').text("Ya esta ingresada a Bodega");
				}else{
					objectoactual.css('backgroundColor', '#DD5044');
					$().toastmessage('showToast', { text: 'Factura No Existe Nr.'+objectoactual.val() , sticky: false, type: 'error' });
					$('#cantidad').text("No existe dicha factura");
				}
			});
		}
	});
	
});

function verPais(){
	if ($('#txtcampo3').val()=="") {
		int_Ciudad1 =0;
	}
	if (int_Ciudad1 == 0) {
		$().toastmessage('showToast', { text: 'Seleccione Pais y Ciudad Primero' , sticky: false, type: 'error' });
		if ($('#CampoPais').val() == "") {
			$('#CampoPais').css('backgroundColor', '#DD5044');
		}else{
			$('#txtcampo3').css('backgroundColor', '#DD5044');
			$('#txtcampo3').focus();
		}
		
		
	}else{
		$('#CampoPais').css('backgroundColor', '#19A15E');
		$('#txtcampo3').css('backgroundColor', '#19A15E');
	}
}
function vericarExistencia(factura){
  var bandera = 0;
  facturas.forEach( function(element, index) {
  	if(element[0] == factura){
  		bandera = 1;
  	}
  });
  return bandera ;
}
function add(){
	if ($('#cantidad').text() == "aceptado") {
		if ($('#txtcampo2').val() != "" ) {
			if($('#CampoPais').val() != ""){
			if($('#txtcampo3').val() != ""){
			var factura = $('#txtcampo1').val();
			var peso  = $('#txtcampo2').val();
			var bandera = vericarExistencia(factura);
			if (bandera == 0) {
				var table = $('#listable').DataTable();
				var button = '<input type="button" class="Btn" value="Borrar" onclick="delect('+"'"+factura+"'"+')" />';
				table.row.add([factura,peso,button]).draw(false);
				facturas.push([factura,peso]);
				$('#txtcampo1').val('');
				$('#txtcampo1').css('backgroundColor', '#fff');
				$('#txtcampo1').focus();
				$('#txtcampo2').val('');
				$('#button').show(1000,'');
			}else{
				$().toastmessage('showToast', { text: 'Ya se ingreso dicha factura', sticky: false, type: 'error' });
			}
			}else{
				$().toastmessage('showToast', { text: 'No ha ingresado una Ciudad', sticky: false, type: 'error' });
			}
			}else{
				$().toastmessage('showToast', { text: 'No ha ingresado un Pais', sticky: false, type: 'error' });
			}
		}else{
			$().toastmessage('showToast', { text: 'No ha ingresado un peso', sticky: false, type: 'error' });
		}

		
	}else{
			$().toastmessage('showToast', { text: 'Factura No Existe Nr.'+factura, sticky: false, type: 'error' });
	}
	

}
function delect(factura){
	var table = $('#listable').DataTable();
	var data = table.rows().data();
	for(var i=0;i<data.length;i++){
		if(data[i][0] == factura){
			data.row(i).remove().draw();
			borrarfactura(factura);
		}
	}
	
			
}
function borrarfactura(factura){
	facturas.forEach( function(element, index) {
		if(element[0]==factura){
			facturas[index] = "";
		}
	});
}
function add_ingBode(){
	var facturasTer = JSON.stringify(facturas);
	$.post('ctrl_ingCarga.php', {atc: 'add',data:facturasTer,int_ciudad:int_Ciudad1}, function(data, textStatus, xhr) {
		if ($.trim(data) == 1) {
			$().toastmessage('showToast', { text: 'Se ha ingresado la carga a bodega', sticky: false, type: 'success' });
			setTimeout('location.reload();', 800);
			
		}else{
			$().toastmessage('showToast', { text: 'ERROR : Ingreso a bodega', sticky: false, type: 'error' });
		}
	});
}