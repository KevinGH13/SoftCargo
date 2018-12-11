var toastActual = 
function abre_add(){
	
	varVentana = "add_panel.php";
	window.open(varVentana,"_self");
}

function exe_add(){
	
	add_toast('showSuccessToast','registro agregado');
	actiontxt='http://www.kdigital.com.co/ECP/view/panel/';
	document.getElementById('formInsert').method = "post";
	document.getElementById('formInsert').action = actiontxt;
}

function abre_upd(int_ID){
	
	varVentana = "upd_panel.php?id="+int_ID;
	window.open(varVentana,"_self");
}

function exe_upd(){
	
	upd_toast('showSuccessToast','registro actualizado');
	actiontxt='http://www.kdigital.com.co/ECP/view/panel/';
	document.getElementById('formUpdate').action = actiontxt;
}
	var pasw1;
		var pasw2;
var correct = 1 ; 
var validuser = 1 ;

function valid(){

	var x = document.getElementById("txtCampo2");
	var x2 = document.getElementById("txtCampo23");
	if( x.value == x2.value ){
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
function exe_use(){
	if( correct == 1 ) {
	upd_toast('showSuccessToast','registro actualizado');
	actiontxt='index.php';
	document.getElementById('formUpdate').action = actiontxt;
		return false;}else{
	$().toastmessage('showToast', { text: 'Verifique Campos', sticky: true, type: 'warning' });
		return false;}

}
function eliminar(id){
	$.post('index.php', {act: 'del-N',id:id}, function(data, textStatus, xhr) {
		var obj = $('#'+id);
		obj.animate({opacity: '0'}, 600, function()
			{
				obj.parent().animate({height: '0px'}, 300, function()
				{
					obj.parent().remove();
				});
			});
	});
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
	
	confirmar=confirm("Se eliminará el registro con ID = "+int_ID+", continuar?");
	if (confirmar){
		xmlhttp.open("POST","index.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("id="+int_ID+"&act=del");
		del_toast('showSuccessToast','registro eliminado');
		varVentana = "http://www.kdigital.com.co/ECP/view/panel/";
		setTimeout(function(){window.open(varVentana,"_self");},960);
	}
}