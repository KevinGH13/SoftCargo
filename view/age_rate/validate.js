var pais = "";
var servicio = 0;
var agente = 0;

function abre_add(int_Agente){
	
	varVentana = "add_rate.php?id_Age="+int_Agente;
	window.open(varVentana,"_self");
}
function abre_agentes(int_ID){
	varVentana = "../agents/index.php?t=1";
	window.open(varVentana,"_self");
}

function exe_add(int_ID,int_IDAgente){
	
	
	confirmar=confirm("Se creara una tarifa nueva, continuar?");
	if(confirmar){
	var sent =  $( "form" ).serialize()+"act=add";
	$.post('index.php', {sent}, function(data, textStatus, xhr) {
		
	});
	
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
	xmlhttp.send("id="+int_IDTarifa+"&act=upd"+"&id_Age="+int_IDAgente);
	upd_toast('showSuccessToast','registro actualizado');
	actiontxt="index.php?id_Age="+int_IDAgente;
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
		varVentana = "index.php?id_Age="+int_IDAgente;
		setTimeout(function(){window.open(varVentana,"_self");},960);
		vec.length = 0;
	}};

var CC = 0;
$(document).ready(function() {
	if(($('#txtCampo19').val() != 0 )&&($('#txtCampo21').val() != 0 )){ CC = 1; }

});

function check(){
	if(CC == 1){
		for (var i = 19;  i<23; i++) {
			$('#txtCampo'+i).attr('disabled', true);
			$('#txtCampo'+i).val(0);
				
		};
		CC=0;
	}else{
		for (var i = 19;  i<23; i++) {
			$('#txtCampo'+i).removeAttr("disabled");
			switch(i){
				case 19:
					$('#txtCampo'+i).val("");
					$('#txtCampo'+i).attr("placeholder",'CC.Agente');
					break;
				case 20:
				    $('#txtCampo'+i).val("");
					$('#txtCampo'+i).attr("placeholder",'CC.Empresa');
					break;
				case 21:
					$('#txtCampo'+i).val("");
					$('#txtCampo'+i).attr("placeholder",'Con.Agente');
					break;
				case 22:
					$('#txtCampo'+i).val("");
					$('#txtCampo'+i).attr("placeholder", "Con.Empresa");
					break;
				default:
					break;
			}
		};
		CC=1;
	}

}
var rangos =[];

function PreVerificar(){
	if ($('#txtCampo2').val()!="") {
		if ($('#txtCampo3').val()!="") {
			
		}else{
			$().toastmessage('showToast', { text: 'Seleccionar Pais', sticky: false, type: 'error' });
		}
	}else{
			$().toastmessage('showToast', { text: 'Seleccionar Servicio', sticky: false, type: 'error' });
	}
		
}

function vericar_Rango(){
	cargar_An(true);
	var verificacion = 0;
	$.post('ctrl_rate.php', {act:'verificar',agente:agente,pais:pais,s:servicio}, function(json, textStatus) {
	   	var pesoInicial = parseFloat($('#txtCampo7').val()); var bandera1 = 0;
	   	var pesoR1 =  parseFloat($('#txtCampo8').val()); var bandera2 = 0;
	   	var pesoR2 =  parseFloat($('#txtCampo9').val()); var bandera3 = 0;
	   json.forEach( function(element, index) {
	   		if ((pesoInicial>=parseFloat(element[1]) && pesoInicial<=parseFloat(element[2])) && bandera1 == 0) {
	   				$('#txtCampo7').css('backgroundColor', '#EA4335');
	   				bandera1 = 1;
	   				verificacion++;
	   				$().toastmessage('showToast', { text: 'Peso Inicial pertenece a un intervalo guardado', sticky: false, type: 'error' });
	   			}else{$('#txtCampo7').css('backgroundColor', '#8EC461');}
	   		if ((pesoR1 >=parseFloat(element[1]) && pesoR1 <= parseFloat(element[2]))&& bandera2 ==0) {
	   				$('#txtCampo8').css('backgroundColor', '#EA4335');
	   				bandera2 = 1;
	   				verificacion++;
	   				$().toastmessage('showToast', { text: 'Rango de peso inicial pertenece a un intervalo guardado', sticky: false, type: 'error' });
	   			}else{
	   				$('#txtCampo8').css('backgroundColor', '#8EC461');
	   			}
	   		if ((pesoR2 >=parseFloat(element[1]) && pesoR2 <= parseFloat(element[2]))&& bandera3 ==0) {
	   			$('#txtCampo9').css('backgroundColor', '#EA4335');
	   			bandera3 = 1;
	   			verificacion++;
	   			$().toastmessage('showToast', { text: 'Rango de peso final pertenece a un intervalo guardado', sticky: false, type: 'error' }); 
	   		}else{
	   			$('#txtCampo9').css('backgroundColor', '#8EC461');
	   		}
	   		if (pesoR1>pesoR2) {
	   			$('#txtCampo8').css('backgroundColor', '#EA4335');
	   			$('#txtCampo8').focus();
	   				bandera1 = 1;
	   				verificacion++;
	   				$().toastmessage('showToast', { text: 'Peso Rango Inicial mayor a el peso final', sticky: false, type: 'error' });
	   		}else if(pesoInicial > pesoR2){
	   			$('#txtCampo7').css('backgroundColor', '#EA4335');
	   				$('#txtCampo7').focus();
	   				bandera1 = 1;
	   				verificacion++;
	   				$().toastmessage('showToast', { text: 'Peso Inicial mayor a el peso final', sticky: false, type: 'error' });
	   		}
	   	 });
	 if(verificacion == 0){
	 	$('#but').show(3000,"");
	 }
	 cargar_An(false);
	},"json");
	
	return false;
}
function P_inicial(p_ini){
	var pinici = parseFloat(p_ini.value);
	for(var i =0 ; i< rangos.length;i++){
		if(pinici == rangos[i][2]){
			alert("Ya existe ese peso inicial");
			$(p_ini).css('backgroundColor','#EA4335');
		}else{
			$(p_ini).css('backgroundColor', '#8EC461');
		}
	}
	
	

}
function verRango(Rango){
	var pinici = parseFloat(Rango.value);
	rangos.forEach(function(element, index){
			if(pinici>=element[0] && pinici <= element[1]){
				alert("Rango ingresado hace parte de un rango ya existente");
				$(Rango).css('backgroundColor','#EA4335');
			}else{
				$(Rango).css('backgroundColor', '#8EC461');
			}
		});
	
}
