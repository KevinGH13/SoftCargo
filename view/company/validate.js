var	data1 = [];

$(function() {

		data1 = [];
		jQuery.getJSON('ctrl_company.php', {act: 'pais'}, function(json, textStatus) {
				json.forEach( function(element, index) {
				  		data1.push({value:element[1],id:element[0]});
				});
				$('#txtCampo3').autocomplete("option", { source: data1 });
				cargar_An(false);
		});

		$("#txtCampo3").autocomplete({
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
					$("#txtCampo4").val(valueSplit[1]);
					$("#txtCampo5").val(valueSplit[2]);
					int_Ciudad2 = ui.item.id;
				}
			});
	});

function abre_add(){
	
	varVentana = "add_company.php";
	window.open(varVentana,"_self");
}


function abre_upd(int_ID){
	
	varVentana = "upd_company.php?id="+int_ID;
	window.open(varVentana,"_self");
}

function exe_upd(){
	
	upd_toast('showSuccessToast','registro actualizado');
	actiontxt='index.php';
	document.getElementById('formUpdate').action = actiontxt;
}

