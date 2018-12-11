<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Compartir Facturas</title>
	<?php require('../../librerias.php'); ?>
    <?php require('ctrl_share.php'); ?>
</head>
<body>
	<?php require('../menu.php'); ?>
	
	<h1>Crear registro para compartir carga</h1>
	
<div style="float:left;position:fixed;">
	<table >
		<tr>
			<td># Consolidao : </td>
			<td><input type="text" class="consolidadV" id="txtcampo1" name="txtcampo1" required><p id="cantidad"></p></td>
		</tr>

		<tr>
		<td><center><input type="button" class="Btn" onclick="add();" value="Aceptar" ></center></td>
		</tr>
		
		<tr>
		<td colspan="2"><center><input id="button" type="button" value="Terminar" class="Btn" onclick="add_share();" hidden></center></td></tr>
	</table>
</div>
<div style="float:right;width:55%;">
	<table id="listable" class="display" >
		<thead>
			<tr>
				<th>Factura</th>
				<th>Opcion</th>
			</tr>
		</thead>
		<tbody>
			
		</tbody>
	</table>
</div>

<div id="modal">
	<table>
		<tr>
		<td>Numero de Consolidado : </td>
		<td><h3 id="numeroCon"> </h3></td>
		</tr>
		<tr>
			<td>Codigo de Seguridad : </td>
			<td><h3 id="numeroSeg"></h3></td>
		</tr>
	</table>
</div>
	<script languaje="javascript">nav();</script>
	<script languaje="javascript">dataView();</script>
</body>
</html>