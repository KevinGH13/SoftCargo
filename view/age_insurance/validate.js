function abre_add(int_ID,int_IDAgente){
	
	varVentana = "add_insurance.php?id="+int_ID+"&id_Age="+int_IDAgente;
	window.open(varVentana,"_self");
}
function abre_agentes(){
	varVentana = "../agents/index.php?t=1";
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
	
	confirmar=confirm("Se creara un Seguro nuevo, continuar?");
	if(confirmar){
	xmlhttp.open("POST","index.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("act=add");
	add_toast('showSuccessToast','registro agregado');
    actiontxt="index.php?id="+int_ID+"&id_Age="+int_IDAgente;
	document.getElementById('formInsert').method = "post";
	document.getElementById('formInsert').action = actiontxt;
	}
}

function abre_upd(int_ID,int_IDAgente,int_IDInsurance){
	
	varVentana = "upd_insurance.php?id="+int_ID+"&id_Age="+int_IDAgente+"&id_insurance="+int_IDInsurance;
	window.open(varVentana,"_self");
}

function exe_upd(int_ID,int_IDAgente,int_IDInsurance){
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
	
	confirmar=confirm("Se actualizar el registro con ID = "+int_IDInsurance+", continuar?");
	if(confirmar){
	xmlhttp.open("POST","index.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("id="+int_IDInsurance+"&act=upd");
	upd_toast('showSuccessToast','registro actualizado');
	actiontxt= "../age_insurance/index.php?id="+int_ID+"&id_Age="+int_IDAgente;
    document.getElementById('formUpdate').method = "post";
	document.getElementById('formUpdate').action = actiontxt;
    }
	
}

function abre_del(int_ID,int_IDAgente,int_IDInsurance)
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
	
	confirmar=confirm("Se eliminará el registro con ID = "+int_IDInsurance+", continuar?");
	if (confirmar){
		xmlhttp.open("POST","index.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("id="+int_IDInsurance+"&act=del");
		del_toast('showSuccessToast','registro eliminado');
		varVentana = "index.php?id="+int_ID+"&id_Age="+int_IDAgente;
		setTimeout(function(){window.open(varVentana,"_self");},960);
	}
}

var vec = [];
function pre_Q(tab,val,id,bol,int_ID,int_IDAgente){
		
	if (bol == '0') {
		vec.push([[tab],[val],[id]]);
	};
	
	if (bol == 1) {
		for (var i = 0; i < vec.length ; i++) {
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
	 	
		
		xmlhttp.open("POST","index.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			xmlhttp.send("id="+vec[i][2][0]+"&tab="+vec[i][0][0]+"&val="+vec[i][1]+"&act=preq");
		};
	
		del_toast('showSuccessToast','registro actualizado');
		varVentana = "index.php?id="+int_ID+"&id_Age="+int_IDAgente;
		setTimeout(function(){window.open(varVentana,"_self");},960);
		vec.length = 0;
	}};
