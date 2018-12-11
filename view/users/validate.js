
		var pasw1;
		var pasw2;
		$(document).ready(function() {


			
			$('#txtCampo2').change(function(event) {
				pasw1 = $(this).val();
				 valid();
			});
			$('#txtCampo23').change(function(event) {
				pasw2 = $(this).val();
			valid();
			});
			

		});
var correct = 1 ; 
var validuser = 1 ;
var boluser = 1 ;
function verif(valor,num){

	$.post('ctrl_user.php', {user: valor,act: 'verif'}, function(data, textStatus, xhr) {
		validuser = data;
		if(num==0){
		if(validuser == 0){
			add_toast('showSuccessToast','Usuario valido');
			$('#txtCampo1').css("background-color", "#8EC461");
			if (/\s/.test($('#txtCampo1').val())) {
					$().toastmessage('showToast', { text: 'Usuario Contiene Espacios', sticky: true, type: 'warning' });
					boluser=0;
					$('#txtCampo1').css("background-color", "rgb(249, 124, 3)");
				}else{
					boluser=1;
					$('#txtCampo1').css("background-color", "#8EC461");
				}
		}else{
			add_toast('showErrorToast','Usuario invalido');
			$('#txtCampo1').css("background-color", "#EA4335");
			boluser=0;
		}
	}
		
		if(num ==1){
			if(validuser == 0 || $('#txtnombre').val() == $('#txtCampo1').val()){
			add_toast('showSuccessToast','Usuario Disponible');
			$('#txtCampo1').css("background-color", "#8EC461");
			if (/\s/.test($('#txtCampo1').val())) {
					$().toastmessage('showToast', { text: 'Usuario Contiene Espacios', sticky: true, type: 'warning' });
					boluser=0;
					$('#txtCampo1').css("background-color", "rgb(249, 124, 3)");
				}else{
					boluser=1;
					$('#txtCampo1').css("background-color", "#8EC461");
				}
		}else if(validuser != 0 && $('#txtnombre').val() != $('#txtCampo1').val()){
			add_toast('showErrorToast','Usuario No Disponible');
			$('#txtCampo1').css("background-color", "#EA4335");
			boluser=0;
		}
		}
		});


}

function valid(){
	var x = document.getElementById("txtCampo2");
	var x2 = document.getElementById("txtCampo23");
	if(pasw1 == pasw2){
		add_toast('showSuccessToast','Contraseñas Coinciden');
		x.style.background='#8EC461';
		x2.style.background='#8EC461';
		correct=1;
	}else {
		add_toast('showErrorToast','Contraseñas No Coinciden');
		x.style.background='#EA4335';
		x2.style.background='#EA4335';
		correct=0;
		
	}
}


function abre_add(){
	
	varVentana = "add_user.php";
	window.open(varVentana,"_self");
}
function exe_add(){
	if(correct == 1 && validuser== 0 && boluser==1){

	var txt = document.getElementById("txtCampo1").value;
	var txt1 = document.getElementById("txtCampo2").value;
	var txt2 = document.getElementById("txtCampo3").value;
	var txt3 = document.getElementById("txtCampoExt4").value;
	var txt4 = document.getElementById("txtCampo24").value;
	var txt5 = document.getElementById("txtCampo25").value;
	if(txt4== 1 || txt4== 3){txt3= 0; }
	txtCampo = txtCampo+"&txtCampo1="+txt+"&txtCampo2="+txt1+"&txtCampo3="+txt2+"&txtCampoExt4="+txt3+"&txtCampo24="+txt4+"&txtCampo25="+txt5;

		var url = "ctrl_user.php"; 
	 	var send =  txtCampo+"&act=add";
	    $.ajax({
	           type: "POST",
	           url: url,
	           data: send, 
	           success: function(data)
	           {
	           	
	               add_toast('showSuccessToast','registro agregado');
	              window.open('index.php','_self');
	               
	           },complete: function(){
   					window.open('index.php','_self');
   }

	         });
	    return true;
	    }else {
		add_toast('showErrorToast','Verifique campos');
		return false;
	}
	
}


function abre_upd(int_ID){
	
	varVentana = "upd_user.php?id="+int_ID;
	window.open(varVentana,"_self");
	
}

function exe_upd(){
	if(boluser==1 && correct == 1) {
	upd_toast('showSuccessToast','registro actualizado');
	actiontxt='index.php';
	document.getElementById('formUpdate').action = actiontxt;
}else{
	$().toastmessage('showToast', { text: 'Verifique Campos', sticky: true, type: 'warning' });
return false;}
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
		  if (xmlhttp.readyState==4 && xmlhttp.users==200){
			document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
		  }
	  }
	
	confirmar=confirm("Se eliminará el registro , continuar?");
	if (confirmar){
		xmlhttp.open("POST","index.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("id="+int_ID+"&act=del");
		del_toast('showSuccessToast','registro eliminado');
		varVentana = "index.php";
		setTimeout(function(){window.open(varVentana,"_self");},960);
	}
}