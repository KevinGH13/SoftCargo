function abre_add(){
	
	varVentana = "add_currency.php";
	window.open(varVentana,"_self");
}

function exe_add(){
	
	add_toast('showSuccessToast','registro agregado');
	actiontxt='http://www.kdigital.com.co/ECP/view/c_currency/';
	document.getElementById('formInsert').method = "post";
	document.getElementById('formInsert').action = actiontxt;
}

function abre_upd(int_ID){
	
	varVentana = "upd_currency.php?id="+int_ID;
	window.open(varVentana,"_self");
}

function exe_upd(){
	
	upd_toast('showSuccessToast','registro actualizado');
	actiontxt='http://www.kdigital.com.co/ECP/view/c_currency/';
	document.getElementById('formUpdate').action = actiontxt;
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
		varVentana = "http://www.kdigital.com.co/ECP/view/c_currency/";
		setTimeout(function(){window.open(varVentana,"_self");},960);
	}
}