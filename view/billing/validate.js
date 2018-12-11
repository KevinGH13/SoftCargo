var fechaDesde;
		var fechaHasta;
		var texto;
		$(document).ready(function() {
			$('#txtCampo2').datepicker();
			$('#txtCampo3').datepicker();
			$( "#txtCampo2" ).datepicker( "option", "yearRange", "-99:+0" );
   			$( "#txtCampo2" ).datepicker( "option", "maxDate", "+0m +0d" );
   			$( "#txtCampo3" ).datepicker( "option", "yearRange", "-99:+0" );
   			$( "#txtCampo3" ).datepicker( "option", "maxDate", "+0m +0d" );
				$('#txtCampo2').datepicker("option", "dateFormat", "mm-dd-yy");
				$('#txtCampo3').datepicker("option", "dateFormat", "mm-dd-yy");
				$( "#txtCampo2" ).keypress(function (evt) {  return false; });
				$( "#txtCampo3" ).keypress(function (evt) {  return false; });
			
		
			$('#txtCampo2').change(function(event) {
				texto = $(this).val();
				 fechaDesde=""+texto+"";
			});
			$('#txtCampo3').change(function(event) {
				texto = $(this).val();
				 fechaHasta=""+texto+"";
			});
			$('#txtTime').change(function(event) {
				
				
			});
			$('#txtTime2').change(function(event) {
				convertTime($(this).val());
				
			});

		});






function exe_con(){

 //lo activas con un OnClick
	if($('#txtCampo2').val() != "" && $('#txtCampo3').val()  != "" ){


	if($('#txtTime').val() != "" && $('#txtTime2').val() != "" ){

	var strUser = $('#txtCampo1').val();
			var f1 = $('#txtCampo2').val();
			var f2 = $('#txtCampo3').val();
			f1 = f1.substring(6,10)+"-"+f1.substring(0,2)+"-"+f1.substring(3,5);
			f2 = f2.substring(6,10)+"-"+f2.substring(0,2)+"-"+f2.substring(3,5);

	varVentana = "reporteA-E.php?age="+strUser+"&ddf='"+f1+" "+convertTime($('#txtTime').val())+"'&ddh='"+f2+" "+convertTime($('#txtTime2').val())+"' ";

		window.open(varVentana,"_blank");
	}else
	var strUser = $('#txtCampo1').val();
			var f1 = $('#txtCampo2').val();
			var f2 = $('#txtCampo3').val();
			f1 = f1.substring(6,10)+"-"+f1.substring(0,2)+"-"+f1.substring(3,5);
			f2 = f2.substring(6,10)+"-"+f2.substring(0,2)+"-"+f2.substring(3,5);

	varVentana = "reporteA-E.php?age="+strUser+"&ddf='"+f1+" 00:0'&ddh='"+f2+" 23:59' ";

		window.open(varVentana,"_blank");

	}
	else {
	$('#resultado').animate({'opacity': 0}, 1000, function () {
    $(this).text('Falta Seleccionar un rango de fecha');
    $(this).css("color", "#EF3232");
	}).animate({'opacity': 1}, 1000);
 
	}

}

function convertTime(time) {

    var hours = Number(time.match(/^(\d\d?)/)[1]);
    var minutes = Number(time.match(/:(\d\d?)/)[1]);
    var AMPM = time.match(/\s(am|pm)$/i)[1];

    if (AMPM == 'PM' || AMPM == 'pm' && hours<12) 
    {
        hours = hours+12;
    }
    else if (AMPM == 'AM' || AMPM == "am" && hours==12)
    {
        hours = hours-12;
    }

    var sHours = hours.toString();
    var sMinutes = minutes.toString();

    if(hours<10)
    {
        sHours = "0" + sHours;
    }
    else if(minutes<10) {
        sMinutes = "0" + sMinutes;
    }

    return sHours + ":" + sMinutes; 
   
}

