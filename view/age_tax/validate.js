function abre_add(int_ID,int_IDAgente,serc,pais){
	
	varVentana = "add_tax.php?id="+int_ID+"&id_Age="+int_IDAgente+"&serc="+serc+"&pais="+pais;
	window.open(varVentana,"_self");
}
function abre_age(int_ID){
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
	
	confirmar=confirm("Se creara un Impuesto nuevo, continuar?");
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

function abre_upd(int_ID,int_IDAgente,int_IDTax){
	
	varVentana = "upd_tax.php?id="+int_ID+"&id_Age="+int_IDAgente+"&id_tax="+int_IDTax;
	window.open(varVentana,"_self");
}


function exe_upd(int_ID,int_IDAgente,int_IDTax){
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
	
	confirmar=confirm("Se actualizar el registro con ID = "+int_IDTax+", continuar?");
	if(confirmar){
	xmlhttp.open("POST","index.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("id="+int_IDTax+"&act=upd");
	upd_toast('showSuccessToast','registro actualizado');
	actiontxt="index.php?id="+int_ID+"&id_Age="+int_IDAgente;
    document.getElementById('formUpdate').method = "post";
	document.getElementById('formUpdate').action = actiontxt;
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
	};
	
	

}

function abre_del(int_ID,int_IDAgente,int_IDTax)
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
	
	confirmar=confirm("Se eliminará el registro con ID = "+int_IDTax+", continuar?");
	if (confirmar){
		xmlhttp.open("POST","index.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("id="+int_IDTax+"&act=del");
		del_toast('showSuccessToast','registro eliminado');
		varVentana = "index.php?id="+int_ID+"&id_Age="+int_IDAgente;
		setTimeout(function(){window.open(varVentana,"_self");},960);  window.setTimeout('location.reload()', 3000); 
	}
}

function exe_del(int_ID,int_IDAgente,int_IDTax){
	confirmar=confirm("Se eliminará el registro con ID = "+int_IDTax+", continuar?");
	if (confirmar){
		var url = "ctrl_tax.php"; 
	 	var send =  "id="+int_IDTax+"&act=del";
	    $.ajax({
	           type: "POST",
	           url: url,
	           data: send, 
	           success: function(data)
	           {
	           	
	               add_toast('showSuccessToast','registro eliminado');
	              window.open('index.php','_self');
	               
	           },complete: function(){
   					   window.location.reload(true);
   				}
   				 });

	}
	return false;
}

function pre_car(int_ID,int_IDAgente){
	var pais   =$( "#pais option:selected" ).text();
	var servicio = $( "#servicio " ).val();
	if ((pais == "Seleccione un Pais")||(servicio == "Seleccione un Servicio")) {
		alert("Seleccionar un pais y un servicio");
	} else{
	abre_add(int_ID,int_IDAgente,servicio,pais);	
	}
}

function exe_plus(int_ID,int_IDAgente,serc,pais){
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
	
	confirmar=confirm("Se creara un Impuesto nuevo, continuar?");
	if(confirmar){
			xmlhttp.open("POST","index.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("act=add");
		del_toast('showSuccessToast','registro Agregado');
		varVentana = "index.php?id="+int_ID+"&id_Age="+int_IDAgente+"&serc="+serc+"&pais="+pais;
		setTimeout(function(){window.open(varVentana,"_self");},960);


	
	}
}
