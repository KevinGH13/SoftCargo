var facturas = [];
$(function() {

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
			$.post('ctrl_share.php', {atc: 'verificar2',value:$(this).val()}, function(data, textStatus, xhr) {
				if ($.trim(data) == "0") {
					objectoactual.css('backgroundColor', '#19A15E');
					$('#cantidad').text('aceptado');
					

				}else{
					objectoactual.css('backgroundColor', '#DD5044');
					$().toastmessage('showToast', { text: 'Factura No Existe Nr.'+objectoactual.val() , sticky: false, type: 'error' });
					$('#cantidad').text("No existe dicho consolidado");
				}
			});
		}
	});

	$('#tabla').dataTable({
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

	 $( "#modal" ).dialog({
      autoOpen: false,
      show: {
        effect: "blind",
        duration: 1000
      },
      hide: {
        effect: "explode",
        duration: 1000
      }
    });
 
	
});

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
		
			
			$('#cantidad').text('');
			var consolidado = $('#txtcampo1').val();
			//var bandera = vericarExistencia(factura);
			//if (bandera == 0) {
			$.getJSON('ctrl_share.php', {atc:'add_Fac',con:consolidado}, function(data, textStatus) {
				var table = $('#listable').DataTable();
				data.forEach( function(element, index) {
					table.row.add([element[0],'<h1></h1>']).draw(false);
					facturas.push(element[0]);
				});
				$('#button').show(300);

			});
					
				
			}else{
				$().toastmessage('showToast', { text: 'Error en el # consolidado. Verificar si el campo no esta vacio o el consolidado si existe', sticky: false, type: 'error' });
			}
			
			
		
}
	
function add_share(){
	var consolidado = $('#txtcampo1').val();
	$.post('ctrl_share.php', {atc:'add_share',Nconso:consolidado}, function(data, textStatus, xhr) {
		if ($.trim(data) == "0") {
			$().toastmessage('showToast', { text: 'Error en el # consolidado ya se ha compartido antes', sticky: false, type: 'error' });
		}else{ 
		 $('#numeroCon').text(consolidado);
		 $('#numeroSeg').text(data);
		 $('#modal').dialog('open');
		}
	});
}

function cap_share(){
	var Empresa = $('#txtcampo1').val();
	var Codigo = $('#txtcampo2').val();
	$.getJSON('ctrl_share.php', {atc: 'cap',emp:Empresa,cod:Codigo}, function(data, textStatus, xhr) {
		if (data[0]=='0') {
			$().toastmessage('showToast', { text: 'El consolidado el cual quiere capturar ya fue capturado o ya caduco su tiempo de espera', sticky: true, type: 'error' });
		}
		else{
		tabla = $('#tabla').DataTable();
		data.forEach( function(element, index) {
				tabla.row.add([element[1],element[21],element[20]]).draw(false);
			});	
		$().toastmessage('showToast', { text: 'Consolidado Capturado con exito, la conexion quedara ANULADA', sticky: false, type: 'success' });
	}
	});
}
