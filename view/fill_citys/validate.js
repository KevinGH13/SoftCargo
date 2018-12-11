var int_pais;
window.onload = exe_coounrty();
function exe_add(){
		$.ajax({
            type: 'post',
            url: 'ctrl_city.php',
            data: $('form').serialize()+"&NombrPais="+$("#txtCampo3 option:selected").text(),
            success: function (data) {
             
              $().toastmessage('showToast', { text: ' Se ha Agregado la ciudad', sticky: false, type: 'error' });
            }
        }).fail(function() {
			$().toastmessage('showToast', { text: 'Ups... No se ha podido Crear', sticky: false, type: 'error' });
		}).done(function(res) {
		$().toastmessage('showToast', { text: ' Se ha Agregado la ciudad', sticky: false, type: 'error' });
		location.reload(true);
	});
   return false;     
}
data2 = [];
function exe_coounrty(){

				
				
					
					jQuery.getJSON('ctrl_city.php', {act: 'src'}, function(json, textStatus) {
				  	json.forEach( function(element, index) {
				  		data2.push({value:element[1],id:element[0]});
				  	});
				  	$('#txtCampo3').autocomplete("option", { source: data2 });
				    setTimeout(function(){add_toast('showSuccessToast','Registros Cargados, Listo para Agregar Ciudades');},960);
				});

				  					
}
		$(function() {
			$("#txtCampo3").autocomplete({
			    minLength:0,
				source: data2,
				focus: function(event, ui) {
					event.preventDefault();
					$(this).val(ui.item.value);
				},
				select: function(event, ui) {
					event.preventDefault();
					var valueSplit = ui.item.value.split(',');
					$(this).val(valueSplit[0]);
					int_pais = valueSplit[1];
				}
			});

			
		});