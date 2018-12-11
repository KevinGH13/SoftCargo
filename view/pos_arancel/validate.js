function abre_add(int_ID){
	
	varVentana = "add_pos_arancel.php?id="+int_ID;
	window.open(varVentana,"_self");
}
/*function abre_rate(int_ID,int_IDAgente){
	varVentana = "../age_rate/index.php?id="+int_ID+"&id_Age="+int_IDAgente;
	window.open(varVentana,"_self");
	
}*/

function exe_add(int_ID){
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
	
	confirmar=confirm("Se creara un registro nuevo, continuar?");
	if (confirmar){
		xmlhttp.open("POST","index.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("act=add");
		add_toast('showSuccessToast','registro agregado');
		varVentana = "http://www.easycargopro.com/ECP/view/pos_arancel/index.php?id="+int_ID;
		document.getElementById('formInsert').method = "post";
		document.getElementById('formInsert').action = varVentana;
		
	}
	
	
	
}

function abre_upd(int_ID){
	
	varVentana = "upd_agent.php?id="+int_ID;
	window.open(varVentana,"_self");
}

function exe_upd(){
	
	upd_toast('showSuccessToast','registro actualizado');
	actiontxt='http://www.kdigital.com.co/ECP/view/agents/';
	document.getElementById('formUpdate').action = actiontxt;
}

function abre_del(int_ID,int_IDPos_Arancel)
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
	
	confirmar=confirm("Se eliminará el registro con ID = "+int_IDPos_Arancel+", continuar?");
	if (confirmar){
		xmlhttp.open("POST","index.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("id="+int_IDPos_Arancel+"&act=del");
		del_toast('showSuccessToast','registro eliminado');
		varVentana = "http://www.easycargopro.com/ECP/view/pos_arancel/index.php?id="+int_ID;
		setTimeout(function(){window.open(varVentana,"_self");},960);
	}
}
