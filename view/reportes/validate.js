var arrayPayment = new Array();
var objDatos = {data:[]};
var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1; //January is 0!
var yyyy = today.getFullYear();

if(dd<10) {
    dd='0'+dd
} 

if(mm<10) {
    mm='0'+mm
} 

today = mm+'/'+dd+'/'+yyyy;

   function pop() {
    $( "#dialog" ).dialog();
  }

function cheked(gid,pst){
	chk=document.getElementsByName('cbr[]');
	vchk=document.getElementsByName('cbrf[]');

	if(chk[pst].value=='on' && chk[pst].checked){

	 	var url = "ctrl_report.php"; 
	 	var send = "id="+gid+"&act=updP&in=1";
	    $.ajax({
	           type: "POST",
	           url: url,
	           data: send, 
	           success: function(data)
	           {
	               if(data==0){
	               alert("Save");
	               }else{
	              
	               }
	               
	           }

	         });
		}
		else {
			if(vchk[pst].checked && vchk[pst].value=='on')

	 		var url = "ctrl_report.php"; 
	 		var send = "id="+gid+"&act=updP&in=0";
	    	$.ajax({
	           type: "POST",
	           url: url,
	           data: send, 
	           success: function(data)
	           {
	               alert("Save");
	               
	           }

	         });
		}
}


function getf(){
	document.getElementById('f').innerHTML+='<p> Fecha Realizada: '+today+'</p>';  
}
var fechaDesde;
		var fechaHasta;
		var texto;
		function date() {
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

		}

function exe_cod(){
				var f1 = $('#txtCampo2').val();
			var f2 = $('#txtCampo3').val();
			f1 = f1.substring(6,10)+"-"+f1.substring(0,2)+"-"+f1.substring(3,5);
			f2 = f2.substring(6,10)+"-"+f2.substring(0,2)+"-"+f2.substring(3,5);

	varVentana = "impr_cod.php?ddf='"+f1+" 00:0'&ddh='"+f2+" 23:59'&p="+$('#txtCampo1').val()+"&q="+$('#txtCampo0').val();

		window.open(varVentana,"_blank");
}
function exe_pay(sv){
				var f1 = $('#txtCampo2').val();
			var f2 = $('#txtCampo3').val();
			f1 = f1.substring(6,10)+"-"+f1.substring(0,2)+"-"+f1.substring(3,5);
			f2 = f2.substring(6,10)+"-"+f2.substring(0,2)+"-"+f2.substring(3,5);

	varVentana = "impr_pay.php?ddf='"+f1+" 00:0'&ddh='"+f2+" 23:59'&p="+$('#txtCampo1').val()+"&q="+$('#txtCampo0').val()+"&sv="+sv;

		window.open(varVentana,"_blank");
}
function exe_payxls(sv){
				var f1 = $('#txtCampo2').val();
			var f2 = $('#txtCampo3').val();
			f1 = f1.substring(6,10)+"-"+f1.substring(0,2)+"-"+f1.substring(3,5);
			f2 = f2.substring(6,10)+"-"+f2.substring(0,2)+"-"+f2.substring(3,5);

	varVentana = "pay_xls.php?ddf='"+f1+" 00:0'&ddh='"+f2+" 23:59'&p="+$('#txtCampo1').val()+"&q="+$('#txtCampo0').val()+"&sv="+sv;

		window.open(varVentana,"_blank");
}
function exe_agn(){
				var f1 = $('#txtCampo2').val();
			var f2 = $('#txtCampo3').val();
			f1 = f1.substring(6,10)+"-"+f1.substring(0,2)+"-"+f1.substring(3,5);
			f2 = f2.substring(6,10)+"-"+f2.substring(0,2)+"-"+f2.substring(3,5);

	varVentana = "impr_factAgent.php?ddf='"+f1+" 00:0'&ddh='"+f2+" 23:59'&p="+$('#txtCampo1').val()+"&q="+$('#txtCampo0').val();

		window.open(varVentana,"_blank");
}
function exe_xlsagn(){
				var f1 = $('#txtCampo2').val();
			var f2 = $('#txtCampo3').val();
			f1 = f1.substring(6,10)+"-"+f1.substring(0,2)+"-"+f1.substring(3,5);
			f2 = f2.substring(6,10)+"-"+f2.substring(0,2)+"-"+f2.substring(3,5);

	varVentana = "agent_xls.php?ddf='"+f1+" 00:0'&ddh='"+f2+" 23:59'&p="+$('#txtCampo1').val()+"&q="+$('#txtCampo0').val();

		window.open(varVentana,"_blank");
}

function exe_rpc(sv){
	
			var f1 = $('#txtCampo2').val();
			var f2 = $('#txtCampo3').val();
			f1 = f1.substring(6,10)+"-"+f1.substring(0,2)+"-"+f1.substring(3,5);
			f2 = f2.substring(6,10)+"-"+f2.substring(0,2)+"-"+f2.substring(3,5);

	varVentana = "impr_report.php?ddf='"+f1+" 00:0'&ddh='"+f2+" 23:59'&p="+$('#txtCampo1').val()+"&q="+$('#txtCampo0').val()+"&sv="+sv;

		window.open(varVentana,"_blank");
	
}
function exe_xlsrpc(){
	
			var f1 = $('#txtCampo2').val();
			var f2 = $('#txtCampo3').val();
			f1 = f1.substring(6,10)+"-"+f1.substring(0,2)+"-"+f1.substring(3,5);
			f2 = f2.substring(6,10)+"-"+f2.substring(0,2)+"-"+f2.substring(3,5);

	varVentana = "con_xls.php?ddf='"+f1+" 00:0'&ddh='"+f2+" 23:59'&p="+$('#txtCampo1').val()+"&q="+$('#txtCampo0').val();

		window.open(varVentana,"_blank");
	
}




function abre_del(intIDtransport)
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
	
	confirmar=confirm("Se eliminará el registro con ID = "+intIDtransport+", continuar?");
	if (confirmar){
		xmlhttp.open("POST","index.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("id="+intIDtransport+"&act=del");
		del_toast('showSuccessToast','registro eliminado');
		varVentana = "index.php";
		setTimeout(function(){window.open(varVentana,"_self");},960);
	}
}
var opciones = {hour:'numeric',minute:'numeric'};
function change_date () {
	$('input[class="date"]').each(function(index, el) {
		var datechange = new Date($(this).val());	
		$(this).val(datechange.toLocaleDateString("en-US"));
	});

}

function change_date2 () {
	$('.date').each(function(index, el) {
		var datechange = new Date($(this).text());	
		$(this).text(datechange.toLocaleDateString("en-US"));
	});
		
}
	




$(function() {
	change_date();
	change_date2();
});