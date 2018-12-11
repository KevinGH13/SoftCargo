var carFaltantes=0;
		var condicion= "";
		var fechaDesde;
		var fechaHasta;
		var texto;
		$(document).ready(function() {
			$('#txt11').datepicker();
			$('#txt12').datepicker();
				$('#txt11').datepicker("option", "dateFormat", "mm-dd-yy");
				$('#txt12').datepicker("option", "dateFormat", "mm-dd-yy");
				$('#txt1').keyup(function(event) {
				 	if ($('#txt1').val().length == "20") {
						$('#d').text("OK");
						search($('#txt1').val());
					}else if($('#txt1').val().length == "0"){
						$('#d').text("");
					}
					else{
						carFaltantes=20-parseInt($('#txt1').val().length);
						$('#d').text("Faltan "+carFaltantes+" Numeros");
					}
				});
			
		
			$('#txt11').change(function(event) {
				texto = $(this).val();
				 fechaDesde=""+texto+"";
			});
			$('#txt12').change(function(event) {
				texto = $(this).val();
				 fechaHasta=""+texto+"";
			});

		});
function searchBtn(){
	for (var i=2 ; i < 11; i++) {
					texto = $('#txt'+i).val();
					if (texto != "" ) {
					switch (i){
					case 2:
						condicion += "var_NombreRemit=" + "'"+texto+"'AND";
						break;
					case 3:
						condicion += "var_NombreRemit=" + "'"+texto+"'AND";
						break;
					case 5:
						condicion += "var_TelefonoRemit=" + "'"+texto+"'AND";
						break;
					case 6:
						condicion += "var_TelefonoDest=" + "'"+texto+"'AND";
						break;
					case 7:
						condicion += "var_EmailDest=" + "'"+texto+"'AND";
						break;
					case 8:
						condicion += "var_EmailDest=" + "'"+texto+"'AND";
						break;
					case 9:
						condicion += "var_Agente="+ texto+"AND";
						break;
					case 10:
						condicion += "var_PaisDest='"+ texto+"'AND";
						break;
												
				}
				}
					
				
			}
	var fechas="";

	if (fechaDesde != "" && fechaHasta != "" && fechaHasta != "undefined" && fechaDesde != "undefined") {
			var f1 = $('#txt11').val();
			var f2 = $('#txt12').val();
			f1 = f1.substring(6,10)+"-"+f1.substring(0,2)+"-"+f1.substring(3,5);
			f2 = f2.substring(6,10)+"-"+f2.substring(0,2)+"-"+f2.substring(3,5);
			if(f1 != "--" && f2 != "--"){
			fechas = "&fechaDesde='"+f1+" 00:0'&fechaHasta='"+f2+" 23:59'";
			}
			

	}
	if ($("#txt4").val() != "") {
		condicion = "int_Tracking='"+$("#txt4").val()+"' AND ";
		window.open("index.php?query="+condicion+"1=1"+fechas,"_self");
	}else{
	window.open("index.php?query="+condicion+"1=1"+fechas,"_self");
	}
}
		
//cr 31 #46-28 48360