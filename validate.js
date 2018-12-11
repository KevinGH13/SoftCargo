var dataCalcular = []; // 0:id Agente 1: Pais 2:largo 3:Ancho 4:Peso 5:Servicio
var dataIngresada = []; // valores de correcion
var data = [];	//Valores de la funciones 
var V_Tarifa ;
var V_Declarado ;
var V_Seguro ;
var V_Ad_Age ;
var V_Ad_Emp ;
var V_CC ;
var pesoManipular;
var Total ;
var Agente_ga = 0; // Gananciar Agente
var Empresa_ga = 0;
var toasts = [];
var CC_Emp = 0;
var CC_Age = 0;
var menor = 0 ;
var ga_Espe = [];
function abre_add(){

	varVentana = "add_tracking.php";
	window.open(varVentana,"_self");
}
function abre_upd(int_ID){

	varVentana = "details_tracking.php?nfactura="+int_ID;
	window.open(varVentana,"_self");
}
function abre_ftra(nfact){
	varVentana = "pdf_tracking.php?nfactura="+nfact;
	window.open(varVentana,"_blank");
}

function abre_label(nfact){
	varVentana = "pdf_label.php?nfactura="+nfact;
	window.open(varVentana,"_blank");
}


function exe_upd(){

	var xx = document.getElementById("txtcdd").value;


	$.post('ctrl_tracking.php', {act: 'upd',
	txtcdd:xx,txtc3:$('#txtc3').val(),
	txtc5:$('#txtc5').val(),txtc11:$('#txtc11').val(),txtc13:$('#txtc13').val()}, function(data, textStatus, xhr) {
		
	});
	upd_toast('showSuccessToast','registro actualizado');
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
		  if (xmlhttp.readyState==4 && xmlhttp.status==200){
			document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
		  }
	  }

	confirmar=confirm("Se eliminará el registro con ID = "+int_ID+", continuar?");
	if (confirmar){
		xmlhttp.open("POST","index.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("int_Guia="+int_ID+"&act=del");
		upd_toast('showSuccessToast','registro eliminado');
		varVentana = "index.php";
		setTimeout(function(){window.open(varVentana,"_self");},960);
	}
}
function exe_addT(){
	var gaEspe = "&int_TaEm="+ga_Espe[0][0]+"&int_TaAg="+ga_Espe[0][1]+"&int_ImEm="+ga_Espe[1][0]+"&int_ImAg="+ga_Espe[1][1]+"&int_SeEm="+ga_Espe[2][0]+"&int_SeAg="+ga_Espe[2][1];
	
	var send = ""+$('#formInsert').serialize()+"&decl="+V_Declarado+"&seg="+V_Seguro+"&peso="+pesoManipular+"&Tar="+V_Tarifa+"&Tot="+Total+"&GAgente="+Agente_ga+"&GEmpresa="+Empresa_ga+"&Add1="+$('#txtAdEmpresa').text()+"&Add2="+$('#txtAdAgencia').text()+"&ciudad1="+int_Ciudad1+"&CC1="+CC_Emp+"&CC2="+CC_Age+"&ciudad2="+int_Ciudad2+"&act=add"+gaEspe;
	$.ajax({
		url: 'ctrl_tracking.php',
		data: send,
	})
	.fail(function() {
			$().toastmessage('showToast', { text: 'Ha ocurrido un error al crear la factura', sticky: false, type: 'error' });
	})
	.done(function(res) {
		
		window.open('imprimirFactura.php?n='+res,'_self');
	});
	return false;
		
	
}

function capturaData(){
	dataCalcular = [];
	var textoPrerequisitos = ["","Pais","","largo","Alto","Ancho","Peso"]
	var preRequisitos = [0,13,33,21,31,32,17]; // numero de los campos de los cuales se requiere
	var respuesta = 1;
	preRequisitos.forEach(function(element, index){
		if(element == 0){ //condiciones de valor cero para los combobox
			if (element == 0) {
				var value = $('#txtCampo'+element).val();
			}else{
				var value = $('#txtCampo'+element +' option:selected').text();
			}
			
			if( value == 0){
				if(element == 0){
					$().toastmessage('showToast', { text: 'Falta seleccionar el agente que tramita la factura', sticky: false, type: 'error' });
					respuesta = 0;
				}else{
					$().toastmessage('showToast', { text: 'Falta seleccionar el servicio', sticky: false, type: 'error' });
					respuesta = 0;
				}
			}else{
				dataCalcular.push(value);
			}
		}else{
			var value = $('#txtCampo'+element).val();
			if(value == ""){
				if (element == 21 || element == 31 || element == 32 ) {
					value = 0;
					dataCalcular.push(value);
				}else{
				$().toastmessage('showToast', { text: 'Falta seleccionar el campo '+textoPrerequisitos[index], sticky: false, type: 'error' });
				respuesta = 0;}
			}else{
				dataCalcular.push(value);
			}
		}
		
	});

	return respuesta;
	
}
function pesoMayor(){
	var pesoVolumetrico = (dataCalcular[3]*dataCalcular[4]*dataCalcular[5])/166;
	var pesoNormal = parseFloat(dataCalcular[6]);
	if(pesoVolumetrico > pesoNormal){
		return pesoVolumetrico;
	}else{
		return pesoNormal;
	}
}
function color(object,numero){
	if(numero == 1 ){
		object.css('backgroundColor', '#19A15C');
	}else if(numero == 2){
		object.css('backgroundColor', '#FFCE44');
	}else{
		object.css('backgroundColor', '#DD5044');
	}
}
function Verificar_Capturar(){
	dataIngresada = [];
	for(var i = 18 ; i<= 25  ;i++ ){
		if(i != 21 && i != 23){
			var value = $('#txtCampo'+i).val();
			if(value == ""){
				$('#txtCampo'+i).val('0');
				value = 0;
				dataIngresada.push(value);
			}else {

				var punto = value.indexOf(".");
				if(punto > 0){
					value = parseFloat(value.substring(0,punto+3));
				}else{
					value = parseFloat(parseFloat(value).toFixed(2));
				}
				
				
				dataIngresada.push(value);
			}
		}
	}

}
function calcularFAC(){
	toasts.forEach(function(element, index){
		$().toastmessage('removeToast', element);
	});

	
	//Se llamara a la función capturarData para tomar lo valor basicos para calcular la factura
	var prerequisitosR = capturaData();
	pesoManipular = 0;
	if(prerequisitosR == 1){
		 pesoManipular = pesoMayor();
		 $('#peso').text('Peso Mayor es '+ (pesoManipular).toFixed(2));
		 cargar_An(true);
		$.getJSON('ctrl_tracking.php', {peso: pesoManipular,pais:dataCalcular[1],servicio:dataCalcular[2],agente:dataCalcular[0],act:'query_rate'}, function(json, textStatus) {
				data = [];
				ga_Espe = [];
				menor = 0 ;
				Agente_ga = 0;
				Empresa_ga=0;
				if(json[0] == ""){
					$().toastmessage('showToast', { text: 'No se a configurado tarifas para dichas condiciones', sticky: false, type: 'error' });
					cargar_An(false);
				}else{
					Verificar_Capturar();
					// condiciones para manipular la precio tarifa
					if(pesoManipular<=parseFloat(json[0][0])){
						data.push(parseFloat(json[0][3])+parseFloat(json[0][4]));
						menor = 1;
						Agente_ga = parseFloat(parseFloat((json[0][3])).toFixed(2));
						Empresa_ga = parseFloat(parseFloat((json[0][4])).toFixed(2));
						ga_Espe.push([[Empresa_ga],[Agente_ga]]);
					}else{
						data.push(parseFloat(json[0][5])+parseFloat(json[0][6]));
						Agente_ga = parseFloat((pesoManipular * json[0][5]).toFixed(2));
						Empresa_ga = parseFloat((pesoManipular * json[0][6]).toFixed(2));
						ga_Espe.push([[Empresa_ga],[Agente_ga]]);
					}

					if(dataIngresada[0]<=data[0]){
						$().toastmessage('showToast', { text: 'Ha ingresado un valor de tarifa menor al acordado (se rellenara el campo con el valor minimo)', sticky: false, type: 'error' });
						$('#txtCampo18').val(data[0]);
						color($('#txtCampo18'),2);
						if (menor == 1) {
							$('#txtTarifa').text((data[0]).toFixed(2));
						}else{
						$('#txtTarifa').text((data[0]*pesoManipular).toFixed(2));
						}
					}else{
						color($('#txtCampo18'),1);
						var gananciaXencima = dataIngresada[0] - (parseFloat(json[0][6]));
						Agente_ga = parseFloat((pesoManipular * gananciaXencima).toFixed(2));
						ga_Espe[0][1] = gananciaXencima;
						$('#txtTarifa').text((dataIngresada[0]*pesoManipular).toFixed(2));
					}
					//====================================================//
					//Condiciones de Valor Declarado
					if(json[0][8] == "SI"){
						if(json[1] != ""){
							var aux_Min = parseFloat(json[1][0]);
							if(aux_Min>dataIngresada[1]){
								$().toastmessage('showToast', { text: 'Ha ingresado un valor de Impueto menor al acordado (se rellenara el campo con el valor minimo)', sticky: false, type: 'error' });
								$('#txtCampo19').val(json[1][0]);
								color($('#txtCampo19'),2);
								var ganancia_Empresa = parseFloat(((parseFloat(json[1][1])/100)*parseFloat(json[1][0])).toFixed(2));
								var ganancia_Agente  = parseFloat(((parseFloat(json[1][2])/100)*parseFloat(json[1][0])).toFixed(2));
								Agente_ga += parseFloat(ganancia_Agente);
								Empresa_ga += parseFloat(ganancia_Empresa);	
								ga_Espe.push([[ganancia_Empresa],[ganancia_Agente]]);
								var resultado = parseFloat((ganancia_Empresa+ganancia_Agente).toFixed(2));
								$('#txtDeclarado').text(resultado);
							}else{
								color($('#txtCampo19'),1);
								var ganancia_Empresa = parseFloat(((parseFloat(json[1][1])/100)*parseFloat(dataIngresada[1])).toFixed(2));
								var ganancia_Agente  = parseFloat(((parseFloat(json[1][2])/100)*parseFloat(dataIngresada[1])).toFixed(2));
								Agente_ga += parseFloat(ganancia_Agente);
								Empresa_ga += parseFloat(ganancia_Empresa);
								ga_Espe.push([[ganancia_Empresa],[ganancia_Agente]]);
								var resultado = parseFloat(parseFloat(ganancia_Empresa+ganancia_Agente).toFixed(2));
								$('#txtDeclarado').text(resultado);
							}
						}else{
							var a = $().toastmessage('showToast', { text: 'Dicha tarifa requiere de una declarar impuesto y dicha configuracion no existe', sticky: true, type: 'error' });
							toasts.push(a);
						}
					}
					else{
						var a = $().toastmessage('showToast', { text: 'En la  configuracion de la tarifa que se esta efecutando, no se pide que se DECLARE UN VALOR por lo que no se cobrara un declarado', sticky: true, type: 'warning' });
						toasts.push(a);
						color($('#txtCampo19'),3);
						$('#txtDeclarado').text(0.00);
						//?
					}
					//===================================================//
					//Condiciones para Seguros
					if(json[0][7] == "SI"){
						if(json[2] != ""){
							if(dataIngresada[2]<json[2][0]){
								var a = $().toastmessage('showToast', { text: 'La cantidad asegurada es menor a la acordada (se rellenara el campo con el valor minimo) Todo valor por debajo de este se cobre como el minimo', sticky: true, type: 'error' });
								toasts.push(a);
								$('#txtCampo20').val(json[2][0]);
								color($('#txtCampo20'),2);
								var ganancia_Empresa = (json[2][2]/100)*json[2][0];
								var ganancia_Agente  = (json[2][3]/100)*json[2][0];
								Agente_ga += ganancia_Agente;
								Empresa_ga += ganancia_Empresa;
								ga_Espe.push([[ganancia_Empresa],[ganancia_Agente]]);
								$('#txtSeguro').text((ganancia_Empresa+ganancia_Agente).toFixed(2));
							}else if (dataIngresada[2]>json[2][1]){
								color($('#txtCampo20'),2);
								var a = $().toastmessage('showToast', { text: 'La cantidad asegurada es mayor a la acordada (se rellenara el campo con el valor minimo)  ', sticky: true, type: 'error' });
								toasts.push(a);
								$('#txtCampo20').val(json[2][1]);
								var ganancia_Empresa = (json[2][2]/100)*json[2][1];
								var ganancia_Agente  = (json[2][3]/100)*json[2][1];
								Agente_ga += ganancia_Agente;
								Empresa_ga += ganancia_Empresa;
								ga_Espe.push([[ganancia_Empresa],[ganancia_Agente]]);
								$('#txtSeguro').text((ganancia_Empresa+ganancia_Agente).toFixed(2));
							}else{
								color($('#txtCampo20'),1);
								var ganancia_Empresa = (json[2][2]/100)*dataIngresada[2];
								var ganancia_Agente  = (json[2][3]/100)*dataIngresada[2];
								Agente_ga += ganancia_Agente;
								Empresa_ga += ganancia_Empresa;
								ga_Espe.push([[ganancia_Empresa],[ganancia_Agente]]);
								$('#txtSeguro').text((ganancia_Empresa+ganancia_Agente).toFixed(2));
							}
						}else{
							var a = $().toastmessage('showToast', { text: 'Dicha tarifa requiere de un Seguro y dicha configuracion no existe', sticky: true, type: 'error' });
							toasts.push(a);
						}
					}else{
						color($('#txtCampo20'),3);
						var a = $().toastmessage('showToast', { text: 'En la  configuracion de la tarifa que se esta efecutando, no se pide que se ASEGURE UN VALOR por lo que no se cobrara un V.Asegurado', sticky: true, type: 'warning' });
						toasts.push(a);
						$('#txtSeguro').text(0.00);
					}
					//======================================================//
					var Ad_Agencia = dataIngresada[3]; if(Ad_Agencia == 0 || Ad_Agencia == ""  ){$('#txtAdAgencia').text(json[0][9]);   var a = parseFloat(json[0][9]) ; Agente_ga += a; }else{ $('#txtAdAgencia').text(dataIngresada[3]); var a = parseFloat(dataIngresada[3]); Agente_ga += a;}
					var Ad_Empresa = dataIngresada[4]; if(Ad_Empresa == 0 || Ad_Empresa == ""  ){$('#txtAdEmpresa').text(json[0][10]);  var b = parseFloat(json[0][9]) ; Empresa_ga += b;} else{ $('#txtAdEmpresa').text(dataIngresada[4]); var b = parseFloat(dataIngresada[4]); Empresa_ga += b;}

					CC_Emp = parseFloat(json[0][11]);
				    CC_Age = parseFloat(json[0][12]);
					Agente_ga+= CC_Age;
					Empresa_ga+= CC_Emp;
					$('#Convenio').text((CC_Emp+CC_Age).toFixed(2));
					Total = total();
					
					if(dataIngresada[5]>Agente_ga){
						var a = $().toastmessage('showToast', { text: 'Se ha ingresado una cantidad de descuento mayor a su ganancia (se rellenara el campo con el valor maximo permitido)', sticky: true, type: 'error' });
						toasts.push(a);
						color($('#txtCampo25'),3);
						$('#txtCampo25').val(Agente_ga);
						$('#txtDescuento').text(Agente_ga);
						$('#txtTotal').text(Total-Agente_ga);
						Total = Total-Agente_ga;
					}else{
						color($('#txtCampo25'),1);
						$('#txtDescuento').text(dataIngresada[5]);
						$('#txtTotal').text(Total-dataIngresada[5]);
						Total = Total-dataIngresada[5];
					}
					$('#btnAcep').css('visibility', 'visible');
					cargar_An(false);
				}
		});
	}
}

function total(){
	V_Tarifa = parseFloat($('#txtTarifa').text());
	V_Declarado = parseFloat($('#txtDeclarado').text());
	V_Seguro = parseFloat($('#txtSeguro').text());
	V_Ad_Age = parseFloat($('#txtAdAgencia').text());
	V_Ad_Emp = parseFloat($('#txtAdEmpresa').text());
	V_CC  	 = parseFloat($('#Convenio').text());

	var tatal = V_Tarifa+V_Declarado+V_Seguro+V_Ad_Age+V_Ad_Emp+V_CC;
	return tatal.toFixed(2);
}



function exe_ciud(){


	var xx = document.getElementById("txtcdd").value;

	$.post('ctrl_tracking.php', {act: 'addxx',ciudad1:int_Ciudad1,vrcciudad:xx}, function(data, textStatus, xhr) {
		
	});
	
}
function abre_dclr(nfact){
	varVentana = "Declr_valor.php?nfactura="+nfact;
	window.open(varVentana,"_blank");
}



function registro(nfact){
	var reg = $('#registro').val();
	var comentario  = $('#comentario').val();
	if (reg == "" || comentario == "") {
		$().toastmessage('showToast', { text: 'Ingresar Registro y Comentario para completar', sticky: true, type: 'error' });
	}else{
		$.post('ctrl_tracking.php', {act: 'reg',id:nfact,reg:reg,comentario:comentario}, function(data, textStatus, xhr) {
				if ($.trim(data) == "0") {
					$().toastmessage('showToast', { text: 'Factura ya estuvo en dicho registro', sticky: true, type: 'error' });
				}else{
				location.reload();
				}
		});
	}
}



$(document).ready(function() {
	$('#btnAcep').css('visibility', 'hidden');
	$('form').submit(function(event) {
		exe_addT();
		return false;
	});
	$('#modal').dialog({
      autoOpen: false,
      show: {
        effect: "blind",
        duration: 1000
      },
      hide: {
        effect: "explode",
        duration: 1000
      }
    });
    $('#modal').dialog('option','width',590);

});

function search(conditions){
	$.ajax({
		url: 'ctrl_tracking.php',
		type: 'POST',
		data: {act:'query',query:conditions}
	})
	.done(function(res) {
		console.log("success");
		if (res == 1) {
			window.open('index.php?nfactura='+conditions,'_self');
		}else if (res == 0) {
			alert('registro no encontrado');
			$('#txt1').val("");
		}
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		console.log("complete");
	});


}
