function abre_add(int_ID,int_IDAgente){
	
	varVentana = "add_rate.php?id="+int_ID+"&id_Age="+int_IDAgente;
	window.open(varVentana,"_self");
}
function abre_agentes(int_ID){
	varVentana = "../agents/index.php?id="+int_ID;
	window.open(varVentana,"_self");
}

function exe_add(int_ID,int_IDAgente){
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
	
	confirmar=confirm("Se creara una tarifa nueva, continuar?");
	if(confirmar){
	xmlhttp.open("POST","index.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("act=add");
	add_toast('showSuccessToast','registro agregado');
    actiontxt="http://www.easycargopro.com/ECP/view/age_rate/index.php?id="+int_ID+"&id_Age="+int_IDAgente;
	document.getElementById('formInsert').method = "post";
	document.getElementById('formInsert').action = actiontxt;
	}
}

function abre_upd(int_ID,int_IDAgente,int_IDTarifa){
	
	varVentana = "upd_rate.php?id="+int_ID+"&id_Age="+int_IDAgente+"&id_Rate="+int_IDTarifa;
	window.open(varVentana,"_self");
}

function exe_upd(int_ID,int_IDAgente,int_IDTarifa){
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
	
	confirmar=confirm("Se actualizar el registro con ID = "+int_IDTarifa+", continuar?");
	if(confirmar){
	xmlhttp.open("POST","index.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("id="+int_IDTarifa+"&act=upd");
	upd_toast('showSuccessToast','registro actualizado');
	actiontxt="http://www.easycargopro.com/ECP/view/age_rate/index.php?id="+int_ID+"&id_Age="+int_IDAgente;
    document.getElementById('formUpdate').method = "post";
	document.getElementById('formUpdate').action = actiontxt;
    }
	
}

function abre_del(int_ID,int_IDAgente,int_IDTarifa)
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
	
	confirmar=confirm("Se eliminará el registro con ID = "+int_IDTarifa+", continuar?");
	if (confirmar){
		xmlhttp.open("POST","index.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("id="+int_IDTarifa+"&act=del");
		del_toast('showSuccessToast','registro eliminado');
		varVentana = "http://www.easycargopro.com/ECP/view/age_rate/index.php?id="+int_ID+"&id_Age="+int_IDAgente;
		setTimeout(function(){window.open(varVentana,"_self");},960);
	}
}

function upd_exe(str,int_ID,int_IDAgente){
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
	
	confirmar=confirm("Se van guardar los cambios, continuar?");
	if (confirmar){
		xmlhttp.open("POST","index.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("str="+str+"&act=actu");
		del_toast('showSuccessToast','registro eliminado');
		varVentana = "http://www.easycargopro.com/ECP/view/age_ratePrueba/index.php?id="+int_ID+"&id_Age="+int_IDAgente;
		setTimeout(function(){window.open(varVentana,"_self");},960);
	}

}
