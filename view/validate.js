var id = 8 ;
function AddItem(){
	$('#panel').append('<tr><td><input type="text" class="txt" style="width:155px;" id="'+id+'" ">    <strong id="p'+id+'">OK</strong></td></tr>');
	$('#panel').on('keyup', '.txt', function(event) {
		event.preventDefault();
		var idTxt = $(this).attr('id');
		if($(this).val().length == 11){
			$(this).css('backgroundColor', '#FFCE43');
			$('#p'+idTxt).text('OKAY');
			verificar($(this).val(),idTxt);
		}else if ($(this).val().length == 0){
			$(this).css('backgroundColor', '#FFFFFF');
			$('#p'+idTxt).text('OK');
		}else{
			var faltantes = 11-($(this).val().length);
			$('#p'+idTxt).text('Faltan '+faltantes+' numeros');
		}
	});
	id++;

}

function  verificar(valor,idTxt){
	var pertenece = false;
	ids_existentes.forEach(function(element, index){
		if(valor == element){
			pertenece = true;
		}
	});
	if(!pertenece){
		$.ajax({
		url: 'ctrl_group.php',
		data: {atc:'verificar',valor:valor},
	})
	.done(function(resp) {
		if(resp == 1){
			$('#'+idTxt).css('backgroundColor', '#8EC461');
			$('#p'+idTxt).text('Aceptado');
		}else if(resp == 2){
			$('#'+idTxt).css('backgroundColor', '#EA4335');
			$('#p'+idTxt).text('Consolidado ya pertenece a un grupo ');
		}else{
			$('#'+idTxt).css('backgroundColor', '#EA4335');
			$('#p'+idTxt).text('No existe ');
		}
	})

	.always(function() {
		console.log("complete");
	});
	}else{
		$('#p'+idTxt).text('Ya pertenece al Grupo');
	}


}

function Aceptar(){
	var ids = capturar();
	$.ajax({
		url: 'ctrl_group.php',
		data: {atc: 'add',ids:ids},
	})
	.done(function(resp) {
		console.log("success  "+ resp);
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		del_toast('showSuccessToast','Se ha guardado una grupo');
		$( "#div2" ).dialog( "open" );
	});

}

function capturar(){
	var Ids_Conso = [];
	for( var a = 0;a<=id;a++){
		if($('#'+a).val() != ''){
			if($('#p'+a).text()=='Aceptado'){
				var si = true;
				Ids_Conso.forEach(function(element, index){
						if($('#'+a).val() == element){
						alert('Consolidado Repetido');
						$('#'+a).css('backgroundColor', '#EA4335');
						$('#p'+a).text('Repetido');
						si = false;

					}
				});
				if(si){
					Ids_Conso.push($('#'+a).val());
				}

			}
		}
	}
	return Ids_Conso;
}

function Cargar(id){
	$.ajax({
		url: 'ctrl_group.php',
		data: {atc:'busca',Id:id},
	})

	.always(function(resp) {
		var res = jQuery.parseJSON(resp);
		//$('#dialog').remove();
		$('#dialog').empty();
		$('#dialog').append('<tr><td>Id Consolidado</td><td>&nbsp;</td><td>Opciones</td></tr>');
		res.forEach(function(element, index){
			$('#dialog').append('<tr class="tbls"><td>'+element[0]+'</td><td>&nbsp;</td><td><input type="Button" class="Btn" value="X" style="width: 45px;" ></td></tr>');
			/*$('#dialog').on('complete', '.tbls', function(event) {
				event.preventDefault();
				$('#tbls').remove();
			});*/

		});

		$( "#dialog" ).dialog( "open" );
	});

}

function upd_data(id_group){
	varVentana = "upd_group.php";
	window.open(varVentana+'?id_g='+id_group,"_self");
}

function udpData(id_group){
	var idsapd = [];
	for(var i = 0;i<id+1;i++){
    	if($('#'+i).val() != ""){
    		if($("#p"+i).text() == "Aceptado"){
    			idsapd.push($('#'+i).val());
    		}

    	}
    }
    var a = $('#agente').val();
    var f = $('#Fecha').val();
    var d = $('#Ciudad').val();
	$.ajax({
		url: 'index.php',
		data: {atc: 'upd',vecupd:idsapd,id_group:id_group,d:d,a:a,f:f},
	})
	.done(function(resp) {
		console.log(resp);
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		location.reload();
	});

}
function addItem2(id,id_g){
	var value =  $('#'+id).val();
	if(value != ""){
		if($("#p"+id).text() == "Aceptado"){
			$.ajax({
				url: 'ctrl_group.php',
				data: {atc: "add2",idConso:value,idG:id_g},
			})
			.done(function(res) {
				console.log("success");
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});


		}
	}
}
var a = '0';
function imprimir(id){
	$.ajax({
		url: 'ctrl_group.php',
		data: {atc: 'query2',id:id},
	})
	.done(function(res) {
		 b = $.parseJSON(res);
		 var i =0;
		 b.forEach(function(element, index){
		 	a += '-'+b[i][0];
		 	i++;
		 });
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		window.open('impr_group.php?idsCon='+a,'_self');
	});

}

function PCupd(int_ID){
	var agente = $('#agente').val();
	var ciudad = $('#Ciudad').val();
	$.ajax({
		url: 'ctrl_group.php',
		data: {atc: 'PCupd',a:agente,c:ciudad,id:int_ID},
	})

	.always(function() {
		$('#div4').dialog("close");
		window.open('index.php','_self');
	});

}

var id_add= '';
var ids_existentes= [];
$(document).ready(function() {
	$('.txt').keyup(function(event) {
		var idTxt = $(this).attr('id');
		if($(this).val().length == 11){
			$(this).css('backgroundColor', '#FFCE43');
			$('#p'+idTxt).text('OKAY');
			verificar($(this).val(),idTxt);
		}else if ($(this).val().length == 0){
			$(this).css('backgroundColor', '#FFFFFF');
			$('#p'+idTxt).text('OK');
		}else{
			var faltantes = 11-($(this).val().length);
			$('#p'+idTxt).text('Faltan '+faltantes+' numeros');
		}
	});
	$( "#dialog" ).dialog({
      autoOpen: false,
       modal: true,
      show: {
        effect: "blind",
        duration: 1000
      },
      hide: {
        effect: "explode",
        duration: 1000
      }
    });
    $( "#div3" ).dialog({
      autoOpen: false,
       modal: true,
      show: {
        effect: "blind",
        duration: 1000
      },
      hide: {
        effect: "explode",
        duration: 1000
      }
    });
    $( "#div4" ).dialog({
      autoOpen: false,
       modal: true,
      show: {
        effect: "blind",
        duration: 1000
      },
      hide: {
        effect: "explode",
        duration: 1000
      }
    });
    $( "#div2" ).dialog({
      autoOpen: false,
       modal: true,
      show: {
        effect: "blind",
        duration: 1000
      },
      hide: {
        effect: "explode",
        duration: 1000
      },
     buttons: {
        "Si": function() {
          $("#div4").dialog("open");
          $( this ).dialog( "close" );
        },
        "No": function() {
          window.open("index.php","_self");
          $( this ).dialog( "close" );
        }
      }
    });
    for(var i = 0;i<id+1;i++){
    	if($('#'+i).val() != ""){
    		ids_existentes.push($('#'+i).val());
    	}
    }
		$('#tb').css('border-spacing','0px !important');
});
