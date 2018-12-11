var ncorto ;
var empaque;
var emque2 = 0;
var can_fac;
var Fac=0;
var conso;
var NO = false;



function abre_fact (id_con) {
	varVentana = "Empaque.php?id_con="+id_con;
	window.open(varVentana,"_self");
}

function exe_fact (id_factura,id_Conso,index){
	$.ajax({
		url: 'ctrl_Empaque.php',
		data: {atc: 'aEmp',id_factura:id_factura,empaque:empaque,id_C:id_Conso},
	})
	.done(function(res) {
		switch($.trim(res)){
			case "0":
				$().toastmessage('showToast', { text: 'Supera limite de duplicados para el destinatario', sticky: true, type: 'error' });
				break;
			case "1":
				$().toastmessage('showToast', { text: 'Supera limite del Valor declarado para el destinatario', sticky: true, type: 'error' });
				break;
			case "2":
				$().toastmessage('showToast', { text: 'Supera limite del peso aceptado para un destinatario ', sticky: true, type: 'error' });
				break;
			case "3":
				$().toastmessage('showToast', { text: 'Factura agregada a Empaque', sticky: false, type: 'success' });
				var table = $('#listable').DataTable();
				var data = table.rows( index ).data();
				table.row('.'+id_factura ).remove().draw();
				/*tabla = $('#tbl_fac').DataTable();
				tabla.row.add([data[0][0],data[0][1],"<input type='Button' class='del' onclick='EliminarTa("+'"'+""+data[0][0]+""+'"'+","+index+")'>"]).draw(false);*/
				act_table_2(empaque);
				break;
			
		}
	})
	
	
}
function EliminarTa(idTa,index){
	var r  = confirm("¿Esta seguro que sea eliminar la tarifa No."+idTa+" ?");
	if (r==true) {
		var table = $('#tbl_fac').DataTable();
		var data = table.row( '.'+idTa ).remove().draw();
		$.post('Empaque.php', {atc: 'delta',idTa:idTa}, function(data, textStatus, xhr) {
			$().toastmessage('showToast', { text: 'Factura Eliminada', sticky: false, type: 'success' });
			act_tab();
		});
	}
	

}

function addEmpa(Id){
	 var Tipo = $('#Tipo').val();  
	 var numero = $('#Numero').val();
	 if (Tipo != '0') {
	 		if (numero != '') {
	 				
	 				 numero = parseInt(numero);
	 				 if (isNaN(numero)) {
	 				 	$('#t').text("No ingresar letras en numero de bolsa");
	 				 }else{
						$.ajax({
							url: 'ctrl_Empaque.php',
							data: {atc:'C_Empa',Id:Id,Tipo:Tipo,numero:numero},
						}).done(function(res) {
							if ($.trim(res)=='1') {
								$().toastmessage('showToast', { text: 'Ya existe este Empaque', sticky: true, type: 'error' });
							}else{
							location.reload();
						}
						});
	 				}
	 		}else {
	 			$('#t').text("Ingresar un numero de bolsa");
	 		}
	 }else {
	   $('#t').text("Elegir un tipo de empaque");
	 }

}

function addFact(id_empaque,empaqueN){
	empaque = 0;
	$('#modal').dialog('open');
	empaque = id_empaque;
	$('#txtBolsa').text('Ingresar Factura a Empaque : # '+empaqueN);
	$('#GenerarTa').empty();
	
	act_table_2(id_empaque);

}

function act_table_2(id_empaque){
	var tabla = $('#tbl_fac').DataTable();
	$.ajax({
		url: 'ctrl_Empaque.php',
		data: {atc: 'Q_Empa',id:id_empaque},
	})
	.done(function(res) {
		tabla.clear().draw(false);
		var resp = JSON.parse(res);
		
		resp.forEach(function(element, index){
			var button = "<input type='Button' class='del' onclick='EliminarTa("+'"'+""+element[0]+""+'"'+","+index+")'>";
			if(NO){
			button = "NO modificar";
			}
			var row = tabla.row.add([element[0],element[1],button]).draw(false).nodes().to$().addClass( ''+element[0]);
		});
		
	});
}
function trasladarEm(){
	empaque = 0;
	$('#tbltrasl').css('visibility', 'visible');
	$('#origenEmp').text('');
	$('#cambiar').dialog('open');

}

function del_Empaque(id,bol){
	empaque = id;
	ncorto = bol;
	$('#tbltrasl').css('visibility', 'hidden');
	$('#txtEmpaque').text(bol);
	$( "#comfirmar" ).dialog('open'); 

	
}
function exe_del_Emp(id,op,ids){
	if (op == 1) {
		$.ajax({
			url: 'Empaque.php',
			data: {atc: 'delEmp',id:id},
		})
		.always(function() {
			location.reload();
		});
		
	}else if(op == 2){
		$.ajax({
			url: 'ctrl_Empaque.php',
			data: {atc: 'delEmp2',id:id,ids:ids},
		})
		.always(function(reso) {
		switch($.trim(reso)){
			case "3" :
				$().toastmessage('showToast', { text: 'una de las Facturas  agregadas a Empaque ', sticky: false, type: 'success' });
				location.reload();
				break;
			case "2" :
				$().toastmessage('showToast', { text: 'una de las Facturas Supera el peso maximo para un Destinatario ', sticky: true, type: 'error' });
				break;
			case "1" :
				$().toastmessage('showToast', { text: 'una de las Facturas Supera el valor maximo declarado para un Destinatario ', sticky: true, type: 'error' });
				break;	
			case "0" :
				$().toastmessage('showToast', { text: 'una de las Facturas Supera el maximo facturas al mismo Destinatario ', sticky: true, type: 'error' });
				break;	
			}
		});
		
	}else if(op == 3){
		$.ajax({
			url: 'ctrl_Empaque.php',
			data: {atc: 'tras',Fac:Fac,ids:ids},
		})
		.done(function(resp) {
			switch($.trim(resp)){
			case "5" : 
				$().toastmessage('showToast', { text: 'Factura NO existe \n N. Factura : '+Fac+' ', sticky: true, type: 'error' });
				break;
			case "4" :
				$().toastmessage('showToast', { text: 'Factura ya pertenece a un consolidado \n N. Factura : '+Fac+' ', sticky: true, type: 'error' });
				break;
			case "3" :
				$().toastmessage('showToast', { text: 'Factura agregada a Empaque \n N. Factura : '+Fac+'', sticky: false, type: 'success' });
				break;
			case "2" :
				$().toastmessage('showToast', { text: 'Factura Supera el peso maximo para un Destinatario \n N. Factura : '+Fac+'', sticky: true, type: 'error' });
				break;
			case "1" :
				$().toastmessage('showToast', { text: 'Factura Supera el valor maximo declarado para un Destinatario \n N. Factura : '+Fac+'', sticky: true, type: 'error' });
				break;	
			case "0" :
				$().toastmessage('showToast', { text: 'Factura Supera el maximo facturas al mismo Destinatario \n N. Factura : '+Fac+'', sticky: true, type: 'error' });
				break;	
			case "10" :
				$().toastmessage('showToast', { text: 'Empaque Destino ya ha culminado el proceso de carga por lo tanto no se permite modificarlo \n N. Factura : '+Fac+'', sticky: true, type: 'error' });
				break;	
		}
		});
		
	}
}
function cColor(id){
	$('#'+id).css({
		borderstyle: 'solid',
		borderradius: '10px',
		bordercolor:'#18A15F'
	});
}


$(document).ready(function() {

	$('#crear').dialog({
	      autoOpen: false,
	       modal: true,
	      show: {
	        effect: "blind",
	        duration: 700
	      },
	      hide: {
	        effect: "explode",
	        duration: 700
	      }
	    });
	$( "#crear" ).dialog( "option", "width", 470 );
	$('#modal').dialog({
	      autoOpen: false,
	       modal: true,
	      show: {
	        effect: "blind",
	        duration: 700
	      },
	      hide: {
	        effect: "explode",
	        duration: 700
	      }
	    });
	$('#cambiar').dialog({
	      autoOpen: false,
	       modal: true,
	       buttons: {
       			"Aceptar": function() {
       			if (emque2 != 0 && empaque != 0) {
       				exe_del_Emp(empaque,2,emque2);
       			
       			}else if(empaque == 0){
       				// Condicion con el aceptar de traslado Empaque
       				exe_del_Emp('',3,emque2);
       			}
       			else{
       				 $().toastmessage('showToast', { text: 'NO has seleccionado empaque destino', sticky: true, type: 'warning' });
       			}
        		}
     	   },
	      show: {
	        effect: "blind",
	        duration: 700
	      },
	      hide: {
	        effect: "explode",
	        duration: 700
	      }
	    });
	$( "#cambiar" ).dialog( "option", "width", 470 );
	$('#add_escanner').dialog({
	      autoOpen: false,
	       modal: true,
	       buttons: {
       			"Salir": function() {
       			$(this).dialog('close');
        		}
     	   },
	      show: {
	        effect: "blind",
	        duration: 700
	      },
	      hide: {
	        effect: "explode",
	        duration: 700
	      }
	    });
	$('#add_escanner').dialog('option','width',420);
	var wid = $(window).width();
	var hei = $(window).height();
	$('#modal').dialog('option','width',wid-20);
	$('#modal').dialog('option','height',hei);
	$('#tbl_fac').DataTable({
			"columnDefs": [{ "orderable": false, "targets": [ -1 ] }],
			ordering: true,
			"orderClasses": false,
			"autoWidth": true,
			"lengthChange": false,
			"lengthMenu": [ 10 ],
			"scrollY":        "300px",
        	"scrollCollapse": true,
        	"paging":         false,
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
	$('#tbltrasl').css('visibility', 'hidden');
	$('#EmpaBusq').DataTable({
			"columnDefs": [{ "orderable": false, "targets": [ -1 ] }],
			ordering: true,
			"orderClasses": false,
			"autoWidth": true,
			"lengthChange": false,
			"lengthMenu": [ 10 ],
			"scrollY":        "300px",
        	"scrollCollapse": true,
        	"paging":         false,
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
	    var table2 = $('#EmpaBusq').DataTable();
 
   		$('#EmpaBusq tbody').on( 'click', 'tr', function () {
   		    if ( $(this).hasClass('selected') ) {
   		        $(this).removeClass('selected');
   		    }
   		    else {
   		        table2.$('tr.selected').removeClass('selected');
   		        $(this).addClass('selected');
   		    }
   		    var row = table2.rows('.selected').data();
   		    emque2 =  row[0][3];

   		} );

	  $( "#comfirmar" ).dialog({
	  autoOpen: false,
      modal: true,
      buttons: {
        "Dejar disponible para otros empaque": function() {
        	exe_del_Emp(empaque,1);
        },
        "Empaquetarlas en otro Empaque":function(){
        	 $( this ).dialog( "close" );
 	       	 $('#origenEmp').text("Empaque origen :" + ncorto);
 	       	 $('#cambiar').dialog('open');

        },
        Cancel: function() {
          $( this ).dialog( "close" );
        }
      }
    });
	  $( "#traslado" ).dialog({
	  autoOpen: false,
      modal: true,
      buttons: {
        "Aceptar": function() {
        	exe_del_Emp(empaque,1);
        },
        "Cancelar":function(){
        	 $( this ).dialog( "close" );
 	    }
      }
    });
	$('#OK').keyup(function(event) {
		var idTxt = 'OK';
		if($(this).val().length == 20){
			$(this).css('backgroundColor', '#FFCE43');
			$('#p'+idTxt).text('OKAY');
			verificar_add($(this).val(),idTxt);
		}else if ($(this).val().length == 0){
			$(this).css('backgroundColor', '#FFFFFF');
			$('#p'+idTxt).text('Ingresar # Factura');
		}else{
			var faltantes = 20-($(this).val().length);
			$('#p'+idTxt).text('Faltan '+faltantes+' numeros');
		}
	});
	$('#OK2').keyup(function(event) {
		var idTxt = 'OK2';
		if($(this).val().length == 20){
			$(this).css('backgroundColor', '#FFCE43');
			$('#p'+idTxt).text('OKAY');
			verificar($(this).val(),idTxt);
		}else if ($(this).val().length == 0){
			$(this).css('backgroundColor', '#FFFFFF');
			$('#p'+idTxt).text('Ingresar # Factura');
		}else{
			var faltantes = 20-($(this).val().length);
			$('#p'+idTxt).text('Faltan '+faltantes+' numeros');
		}
	});
	

});
function  verificar(valor,idTxt){
	
	
	$.ajax({
		url: 'ctrl_Empaque.php',
		data: {atc:'verificar3',valor:valor},
	})
	.done(function(resp) {
		if(resp == 1){
			$('#'+idTxt).css('backgroundColor', '#8EC461');
			$('#p'+idTxt).text('Aceptado');
			Fac =valor;
		}else{
			$('#'+idTxt).css('backgroundColor', '#EA4335');
			$('#p'+idTxt).text('No existe ');
		}
	});
	


}
function  verificar_add(valor,idTxt){
	$.ajax({
		url: 'ctrl_Empaque.php',
		data: {atc:'verificar',valor:valor,emp:empaque},
	})
	.done(function(resp) {

		switch($.trim(resp)){
			case "5" : 
				$('#'+idTxt).css('backgroundColor', '#EA4335');
				$('#p'+idTxt).text('Factura NO existe ');
				$().toastmessage('showToast', { text: 'Factura NO existe \n N. Factura : '+valor+' ', sticky: true, type: 'error' });
				break;
			case "4" :
				$('#'+idTxt).css('backgroundColor', '#EA4335');
				$('#p'+idTxt).text('Factura ya pertenece a un consolidado ');
				$().toastmessage('showToast', { text: 'Factura ya pertenece a un consolidado \n N. Factura : '+valor+' ', sticky: true, type: 'error' });
				break;
			case "3" :
				$('#'+idTxt).css('backgroundColor', '#8EC461');
				$('#p'+idTxt).text('Aceptado');
				$().toastmessage('showToast', { text: 'Factura agregada a Empaque \n N. Factura : '+valor+'', sticky: false, type: 'success' });
				tabla = $('#tbl_fac').DataTable();
				var n = tabla.context.length; 
				$.post('ctrl_Empaque.php', {atc: 'act_tabl2',valor:valor}, function(data, textStatus, xhr) {
					var data = JSON.parse(data);
				tabla.row.add([data[0][0],data[0][1],"<input type='Button' class='del' onclick='EliminarTa("+'"'+""+data[0][0]+""+'"'+","+n+")'>"]).draw(false);	
				act_tab();
				});

				break;
			case "2" :
				$('#'+idTxt).css('backgroundColor', '#EA4335');
				$('#p'+idTxt).text('Factura Supera el peso maximo para un Destinatario');
				$().toastmessage('showToast', { text: 'Factura Supera el peso maximo para un Destinatario \n N. Factura : '+valor+'', sticky: true, type: 'error' });
				break;
			case "1" :
				$('#'+idTxt).css('backgroundColor', '#EA4335');
				$('#p'+idTxt).text('Factura Supera el valor maximo declarado para un Destinatario');
				$().toastmessage('showToast', { text: 'Factura Supera el valor maximo declarado para un Destinatario \n N. Factura : '+valor+'', sticky: true, type: 'error' });
				break;	
			case "0" :
				$('#'+idTxt).css('backgroundColor', '#EA4335');
				$('#p'+idTxt).text('Factura Supera el maximo facturas al mismo Destinatario');
				$().toastmessage('showToast', { text: 'Factura Supera el maximo facturas al mismo Destinatario \n N. Factura : '+valor+'', sticky: true, type: 'error' });
				break;	
			case "10" :
				$('#'+idTxt).css('backgroundColor', '#EA4335');
				$('#p'+idTxt).text('Factura Supera el maximo facturas al mismo Destinatario');
				$().toastmessage('showToast', { text: 'Empaque Destino ya ha culminado el proceso de carga por lo tanto no se permite modificarlo \n N. Factura : '+valor+'', sticky: true, type: 'error' });
				break;	
			case "11":
				$('#'+idTxt).css('backgroundColor', '#EA4335');
				$('#p'+idTxt).text('Factura esta destinada a un pais distinto');
				$().toastmessage('showToast', { text: 'Factura esta destinada a un pais distinto \n N. Factura : '+valor+'', sticky: true, type: 'error' });
				break;
			case "12":
			$('#'+idTxt).css('backgroundColor', '#EA4335');
			$('#p'+idTxt).text('Factura es de un servicio diferente a los configurados por este consolidado');
			$().toastmessage('showToast', { text: 'Factura es de un servicio diferente a los configurados por este consolidado \n N. Factura : '+valor+'', sticky: true, type: 'error' });
			break;
		}

	});

}
function cantidad_fac(empaque,empaquedes){
	$.post('ctrl_Empaque.php', {atc: 'cant',empaque:empaque,empaquedes:empaquedes}, function(data, textStatus, xhr) {
		jQuery.parseJSON(data);
	});
}
function act_tab(){
	tabla = $('#listable').DataTable();
	tabla.clear().draw(false);
	$.post('ctrl_Empaque.php', {atc: 'act_tabl',intIdconsolidad:conso}, function(data, textStatus, xhr) {
		var resp = JSON.parse(data);
		var contador = 0 ;
		resp.forEach(function(element, index){
		tabla.row.add([element[1],element[2],element[3],element[4],element[5],element[6],'1/1','<input type="button" class="add" value=""  style="width:40px; margin-top:2px;" onClick="exe_fact('+"'"+element[1]+"'"+','+"'"+conso+"'"+','+"'"+contador+"'"+');" />']).draw(false).nodes().to$().addClass(''+element[1]);
		contador++;
		});
	});
	
}