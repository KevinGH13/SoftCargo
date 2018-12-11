	var int_Ciudad1 ;
	var int_Ciudad2 ;
	var int_Ciudad3 ;



$(document).ready(function() {
			 setTimeout(function(){$().toastmessage('showToast', {	text: 'Si al guardar la AWB no aparece, revise si su navegador bloquea ventanas emergentes', sticky: false, type: 'warning' });},1200);
			
			$('#txtCamp19').datepicker();
			$('#txtCamp19').datepicker("option", "dateFormat", "mm/dd/yy");
			$('#txtCamp20').datepicker();
			$('#txtCamp20').datepicker("option", "dateFormat", "mm/dd/yy");
		
			
		
			$('#txtCampoAero0').change(function(event) {
				texto = $(this).val();
			
				
			});

		});
function  abre_add(){
	varVentana = "listhwb.php";
	window.open(varVentana,"_self");
}

function abre_upd(id){
varVentana = "hwb.php?hwbid="+id;
	window.open(varVentana,"_blank");
}
function add_awb(){

	var url = "ctrl_awb.php"; 
	
	 	$.ajax({
	           type: 'POST',
	           url: url,
	           data: send, 

	           success: function(data)
	           {
	              
	              	
	               
	           }

	         });
	    return false; 
	
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
	 
	confirmar=confirm("Se eliminará este hwb, desea continuar?");
	if (confirmar){
		xmlhttp.open("POST","index.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("di="+int_ID+"&act=del");
		del_toast('showSuccessToast','registro eliminado');
		varVentana = "index.php";
		setTimeout(function(){window.open(varVentana,"_self");},960);
	}
}