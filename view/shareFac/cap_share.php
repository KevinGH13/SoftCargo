<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Captura de Consolidado</title>
	<?php require('../../librerias.php'); ?>
	<?php require('ctrl_share.php'); ?>
</head>
<body>
<h1>Captura de Consolidados Compartidos</h1>
<h3>* Tener en cuenta que una vez se halla establecido la conexion no se podra repetir</h3>
<h3>* El tiempo maximo para poder hacer una conexion es de 7 dias </h3>
<div>
	<div style="float: left;">
	<form onsubmit="cap_share(); return false;" action="">
	<table class="tablasFondo">
		<tr> <td>Nombre de la empresa : </td>
		<td><input type="text" id="txtcampo1" required name="txtcampo1" placeholder="Empresa que compartio la carga (nombre exacto)"></td>
		</tr>
		<tr> 
			<td>Codigo de seguridad : </td>
			<td><input type="text" id="txtcampo2" required name="txtcampo2" placeholder="Codigo de Seguridad (15 caracteres)"></td>
		</tr>
		<tr ><td colspan="2"><center><input  style="width: 150px" type="submit" value="Capturar Carga" ></center></td></tr>
	</table>
	</form>
	</div>
	<div style="width: 50%;float: right;">
		
	<table id="tabla" class="display">
		<thead>
			<td>Numero de factura</td>
			<td>Peso</td>
			<td>Declarado</td>
		</thead>
	</table>
	</div>
</div>
</body>
</html>