		$(document).ready(function() {


			
			$('#txtCampo2').change(function(event) {
				pasw1 = $(this).val();
				 valid();
			});
			$('#txtCampo23').change(function(event) {
				pasw2 = $(this).val();
			valid();
			});
			$('#txtCampo7 , #txtCampo8').keyup(function () {
   			 if (this.value != this.value.replace(/[^0-9\.]/g, '')) {
       			this.value = this.value.replace(/[^0-9\.]/g, '');
       				$().toastmessage('showToast', {	text: 'Sólo son permitidos, Numeros', sticky: true, type: 'notice' });
    			}
			});
			$('#txtCampo10').change(function(event) {
    		// Expresion regular para validar el correo
    		var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;

    		// Se utiliza la funcion test() nativa de JavaScript
    		if (regex.test($('#txtCampo10').val().trim())) {
    			add_toast('showSuccessToast','Email valido');
        		
    		} else {
        		$().toastmessage('showToast', {	text: 'Email no valido', sticky: true, type: 'notice' });
    		}
		});
			

		});



function abre_add(int_ID){
	
	varVentana = "add_agent.php?id="+int_ID;
	window.open(varVentana,"_self");
}
function abre_rate(int_ID,int_IDAgente){
	varVentana = "../age_rate/index.php?id="+int_ID+"&id_Age="+int_IDAgente;
	window.open(varVentana,"_self");
	
}

function abre_tax(int_ID,int_IDAgente){
	varVentana = "../age_tax/index.php?id="+int_ID+"&id_Age="+int_IDAgente;
	window.open(varVentana,"_self");
	
}
function abre_insurance(int_ID,int_IDAgente){
	varVentana = "../age_insurance/index.php?id="+int_ID+"&id_Age="+int_IDAgente;
	window.open(varVentana,"_self");
	
}


function exe_add(int_ID){
	
	add_toast('showSuccessToast','registro agregado');
	document.getElementById('formInsert').method = "post";

	
}

function abre_upd(int_ID){
	
	varVentana = "upd_agent.php?id="+int_ID;
	window.open(varVentana,"_self");
}

function exe_upd(){
	
	upd_toast('showSuccessToast','registro actualizado');
	actiontxt='index.php?t='+$('#txtCampo12').val();
	document.getElementById('formUpdate').action = actiontxt;
}

function abre_del(int_ID,int_IDAgente)
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
	
	confirmar=confirm("Se eliminará el Agente con ID="+int_IDAgente+" , continuar?");
	if (confirmar){
		xmlhttp.open("POST","index.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("id="+int_IDAgente+"&act=del");
		del_toast('showSuccessToast','registro eliminado');
		varVentana = "index.php?t="+int_ID;
		setTimeout(function(){window.open(varVentana,"_self");},960);
	}
}
