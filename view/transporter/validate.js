function abre_add(){
	
	varVentana = "add_transporter.php";
	window.open(varVentana,"_self");
	
}

$(function(){
	 $("#btn_enviar").click(function(){
	 	var url = "ctrl_transporter.php"; 
	 	var send =  $("#formInsert").serialize();
	    $.ajax({
	           type: "POST",
	           url: url,
	           data: send, 
	           success: function(data)
	           {
	               add_toast('showSuccessToast','registro agregado');
	               setTimeout(function(){window.open('index.php','_self');},960);
	               
	           }

	         });
	    return false; // Evitar ejecutar el submit del formulario.
	 });
	});
function exe_add(){
	
	add_toast('showSuccessToast','registro agregado');
    actiontxt="index.php";
	document.getElementById('formInsert').method = "post";
	document.getElementById('formInsert').action = actiontxt;
	
}

function abre_upd(intID){
	
	varVentana = "upd_transporter.php?id_transport="+intID;
	window.open(varVentana,"_self");
}

function exe_upd(){
	
	upd_toast('showSuccessToast','registro actualizado');
	 actiontxt="index.php";
	document.getElementById('formUpdate').action = actiontxt;
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