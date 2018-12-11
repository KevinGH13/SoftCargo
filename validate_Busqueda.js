var id ;
$(document).ready(function() {
	
	$('.factura').keyup(function(event) {
		var n = 20;
		var nr = $(this).val().length;
		objectoactual = $(this);
		if (nr<n && nr != 0) {
			$('#search').show();
		}else if (nr>n) {
			$('#search').show();
		}else if (nr == 0){
			$('#search').hide();
		}else{
			$('#search').hide();
			$('#cantidad').text("Aceptado");
			id=$(this).val();
			$.post('ctrl_Busqueda.php', {atc: 'verificar',value:id}, function(data, textStatus, xhr) {
				if ($.trim(data) == "0") {
					objectoactual.css('backgroundColor', '#19A15E');
					$('#cantidad').text('aceptado');
					jQuery.getJSON('ctrl_Busqueda.php', {atc: 'estados',id:id}, function(json, textStatus) {
						
						$('#tbody').empty();
						json.forEach( function(element, index) {
							var fecha = new Date(element[1]);
							var add = draw('#DD5044',element[0],element[1],element[2],element[3]);
							if (index==json.length-1) {
							$('#tbody').append('<tr class="ultimo"><td>'+element[0]+'</td><td>'+fecha.toLocaleDateString("en-US")+'</td><td>'+element[2]+'</td></tr>');
							}else{
							$('#tbody').append('<tr><td>'+element[0]+'</td><td class="fecha">'+fecha.toLocaleDateString("en-US")+'</td><td>'+element[2]+'</td></tr>');
								}			
						});
						;
						
					});
					
				}else{
					objectoactual.css('backgroundColor', '#DD5044');
					$().toastmessage('showToast', { text: 'Factura No Existe Nr.'+objectoactual.val() , sticky: false, type: 'error' });
					$('#cantidad').text("No existe dicha factura");
				}
			});
		}
	});

	

});


function search(){
		var id = $("#txt_factura").val();
		jQuery.getJSON('ctrl_Busqueda.php', {atc: 'search',value:id}, function(json, textStatus) {
						
						$('#tbody').empty();
						json.forEach( function(element, index) {
							
							var add = draw('#DD5044',element[0],element[1],element[2],element[3]);
							if (index==json.length-1) {
							$('#tbody').append('<tr class="ultimo"><td>'+element[0]+'</td><td>'+element[1]+'</td><td>'+element[2]+'</td></tr>');
							}else{
							$('#tbody').append('<tr><td>'+element[0]+'</td><td>'+element[1]+'</td><td>'+element[2]+'</td></tr>');
								}
											
						});

						
					});
}
function draw(color,id,title,comentario,fecha){
		var colorLineas = '#000000';
		var div = '<div id ="'+id+'" class="c'+id+'" style="width: 95%;height: 65px;margin-top:5px;margin-bottom:5px;border:'+colorLineas+';'+
		 'border-style: solid;border-radius: 10px;padding: 10px;background-color: black;opacity:0.65">'+
		 '<table style="width:100%"><tr><td>'+title+'</td><td>'+comentario+'</td><td>'+fecha+'</td></tr></table> </div>';
		return  div;
}
