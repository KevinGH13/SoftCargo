var ncorto ;
var empaque;
var emque2 = 0;
var vec_Servicios = [];

function abre_add(int_ID){

	varVentana = "add_con.php?";
	window.open(varVentana,"_self");
}
function abre_fact (id_con) {
	varVentana = "../Empaque/Empaque.php?id_con="+id_con;
	window.open(varVentana,"_self");
}

function exe_fact (id_factura){
	$.ajax({
		url: 'Empaque.php',
		data: {atc: 'aEmp',id_factura:id_factura,empaque:empaque},
	})
	.done(function(res) {
		alert(res);
	})
	
	
}
function abre_xlsCon(int_con){
	varVentana = "con_xls.php?ncons="+int_con;
	window.open(varVentana,"_self");
}

function exe_add(int_ID){
	var val = $('#txtCampo5').val();
	if (val == "0" || val == "," || val == "") {
		alert("No ha seleccionado servicios");
	}else{
		var si = true;
		for (var i = 1; i <= 8; i++) {
			var aux = $('#txtCampo'+i).val();
			if ( aux== "") {
				 $('#txtCampo'+i).css('backgroundColor', '##D84F43');
				si=false;
				break;
			}
		}
		if (si) {
			add_toast('showSuccessToast','registro agregado');
			var send = ""+$('#formInsert').serialize()+"&act=add";
			$.ajax({
				url: 'ctrl_con.php',
				data: send,
			})
			.done(function(rep) {
				window.open('details_con.php?id_con='+rep,'_self');
			});
			
		}



	}

}
function exe_edit(int_ID){
	var val = $('#txtCampo5').val();
		
			add_toast('showSuccessToast','registro agregado');
			var send = ""+$('#formInsert').serialize()+"&act=updcon&id="+int_ID;
			$.ajax({
				url: 'ctrl_con.php',
				data: send,
			})
			.done(function(rep) {
				
			});


}

function abre_info(intID_Con){

	varVentana = "details_con.php?id_con="+intID_Con;
	window.open(varVentana,"_self");
}

function abre_facthijas(intID_Con){
	varVentana = "fac_con.php?ncons="+intID_Con;
	window.open(varVentana,"_blank");
}


function abre_del(int_ID)
{
	var xmlhttp;
	if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	}
	else{// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function(){
		  if (xmlhttp.readyState==4 && xmlhttp.status==200){
			document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
		  }
	  }

	confirmar=confirm("Se eliminará el registro ,desea continuar?");
	if (confirmar){
		xmlhttp.open("POST","index.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("id="+int_ID+"&act=del");
		del_toast('showSuccessToast','registro eliminado');
		varVentana = "index.php";
		setTimeout(function(){window.open(varVentana,"_self");},960);
	}
}
var Tipo= '';
function C_T(value){
	Tipo = value;
}
function addEmpa(Id){
	 var numero = $('#Numero').val();
	 if (Tipo != '0') {
	 		if (numero != '') {
	 				try {
	 				 numero = parseInt(numero);
						$.ajax({
							url: 'ctrl_Empaque.php',
							data: {atc:'C_Empa',Id:Id,Tipo:Tipo,numero:numero},
						}).done(function() {
							location.reload();
						});
	 				} catch (e) {
	 					$('#p').text("No ingresar letras en numero de bolsa")
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
	var tabla = $('#tbl_fac').DataTable();
	$.ajax({
		url: 'ctrl_Empaque.php',
		data: {atc: 'Q_Empa',id:id_empaque},
	})
	.done(function(res) {
		tabla.clear().draw(false);
		var resp = JSON.parse(res);
		resp.forEach(function(element, index){
			tabla.row.add([element[0],element[1],"<input type='Button' class='del' >"]).draw(false);
		});
		
	});
	
	
}


function del_Empaque(id,bol){
	empaque = id;
	ncorto = bol;
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
			url: 'Empaque.php',
			data: {atc: 'delEmp2',id:id,ids:ids},
		})
		.always(function() {
			location.reload();
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
 $('#listable tr').css('font-size', "0.8em");
	$('#crear').dialog({
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
	$( "#crear" ).dialog( "option", "width", 470 );
	$('#modal').dialog({
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
	$('#cambiar').dialog({
	      autoOpen: false,
	       modal: true,
	       buttons: {
       			"Aceptar": function() {
       			if (emque2 != 0) {
       				exe_del_Emp(empaque,2,emque2);
       				 $().toastmessage('showToast', { text: 'Empaque Eliminado', sticky: true, type: 'success' });
       			}else{
       				 $().toastmessage('showToast', { text: 'NO has seleccionado empaque destino', sticky: true, type: 'warning' });
       			}
        		}
     	   },
	      show: {
	        effect: "blind",
	        duration: 1000
	      },
	      hide: {
	        effect: "explode",
	        duration: 1000
	      }
	    });
	$( "#cambiar" ).dialog( "option", "width", 470 );
	var wid = screen.width;
	$('#modal').dialog('option','width',1400);
	$('#modal').dialog('option','height',650);
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
	 $("#modalServicio").dialog({
	 	autoOpen:false,
	 	modal:true,
	 	buttons:{
	 		"Aceptar": function(){
	 			$(this).dialog('close');
	 		}
	 	}
	 });
	 $('#tableServicio').DataTable({"columnDefs": [{ "orderable": false, "targets": [ -1 ] }],
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
			}}); 
	 var table2 = $('#tableServicio').DataTable();
 	 
   		$('#tableServicio tbody').on( 'click', 'tr', function () {
   		    $(this).toggleClass('selected');
   		    var row = table2.rows('.selected').data();
   		    $('#txtCampo5').val('');
   		    for (var i = 0; i < row.length; i++) {
   		    	var e = $('#txtCampo5').val();
   		    	$('#txtCampo5').val(e+","+row[i][0]);
   		    }
   		    	 
   		    

   		} );
});
function Type(id){
	window.open('Type.php?id='+id,'_self');
}
