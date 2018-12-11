function abre_add(int_ID,int_IDAgente){
	
	varVentana = "add_tax.php?id="+int_ID+"&id_Age="+int_IDAgente;
	window.open(varVentana,"_self");
}

function exe_add(int_ID,int_IDAgente){
	

		if(return validar){
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
    actiontxt="http://www.easycargopro.com/ECP/view/age_tax/index.php?id="+int_ID+"&id_Age="+int_IDAgente;
	document.getElementById('formInsert').method = "post";
	document.getElementById('formInsert').action = actiontxt;
	}
}
else{
	alert('Campo');
}
		
}
function Validar(){
					var PorEmp = document.getElementById('txtCampo4').value;
					var PorAg = document.getElementById('txtCampo5').value;
					var PorcMin = document.getElementById('txtCampo6').value;
					var PorMAx = document.getElementById('txtCampo7').value;
					var ValMmin = document.getElementById('txtCampo8').value;


					if(PorEmp =="" || isNaN(PorEmp)){
						$('#alert').html('Solo es permitido numero, o el campo esta vacio').slideDown(500);;
						$('#txtCampo4').focus();
						document.getElementById('Agregar').disabled=false; 
						return false;
					}
					else{
						$('#alert').html('').slideUp(300);
						document.getElementById('Agregar').disabled=true; 
					}
					if(PorAg =="" || isNaN(PorAg)){
						$('#alert').html('Solo es permitido numero, o el campo esta vacio').slideDown(500);;
						$('#txtCampo5').focus();
						return false;
					}
					else{
						$('#alert').html('').slideUp(300);
					}
					if(PorcMin =="" || isNaN(PorcMin)){
						$('#alert').html('Solo es permitido numero, o el campo esta vacio').slideDown(500);;
						$('#txtCampo6').focus();
						return false;
					}
					else{
						$('#alert').html('').slideUp(300);
					}
					if(PorMAx =="" || isNaN(PorMAx)){
						$('#alert').html('Solo es permitido numero, o el campo esta vacio').slideDown(500);;
						$('#txtCampo7').focus();
						return false;
					}
					else{
						$('#alert').html('').slideUp(300);
					}
					if(ValMmin =="" || isNaN(ValMmin)){
						$('#alert').html('Solo es permitido numero, o el campo esta vacio').slideDown(500);;
						$('#txtCampo8').focus();
						return false;
					}
					else{
						$('#alert').html('').slideUp(300);
					}
				}


function abre_upd(int_ID,int_IDAgente,int_IDTarifa){
	
	varVentana = "upd_tax.php?id="+int_ID+"&id_Age="+int_IDAgente+"&id_Rate="+int_IDTarifa;
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
	actiontxt="http://www.easycargopro.com/ECP/view/age_tax/index.php?id="+int_ID+"&id_Age="+int_IDAgente;
    document.getElementById('formUpdate').method = "post";
	document.getElementById('formUpdate').action = actiontxt;
    }
	
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
		varVentana = "http://www.easycargopro.com/ECP/view/age_tax/index.php?id="+int_ID+"&id_Age="+int_IDAgente;
		setTimeout(function(){window.open(varVentana,"_self");},960);
	}
}
function selectInCombo(combo,val)
{
    for(var indice=0 ;indice<document.getElementById(combo).length;indice++)
    {
        if (document.getElementById(combo).options[indice].text==val )
            document.getElementById(combo).selectedIndex =indice;
        	alert(val);
    }       
}