<!DOCTYPE html>
<html>
<head>
	<title>Ingreso a Bogeda</title>
	<?php require('../../librerias.php'); ?>
	<?php require('ctrl_ingCarga.php'); ?>
	<script src="validate_city.js"></script>
</head>
<?php require('../menu.php'); ?>
<body>
<div style="float:left;position:fixed;">
	<h1>Ingreso a Bodega</h1>
	<table >
		<tr>
			<td>Localidad</td>
			<td><select name="CampoPais" id="CampoPais" style="width:25%">
				<option value="">Seleccione Pais</option>
				<option value="" disabled>---------------</option>
				<?php foreach ($list = selPais("1=1") as $value): ?>
					<option value="<?php echo $value[1] ?>"><?php echo $value[0] ?></option>
				<?php endforeach ?>
			</select><input type="text" id="txtcampo3"  style="width:70%" name="txtcampo3" disabled></td>
		</tr>
		<tr>
			<td>#Factura </td>
			<td><input type="text" class="factura" id="txtcampo1" name="txtcampo1" onfocus="verPais();" onclick="verPais();" required><p style="margin-top: 0px;margin-bottom: 0px;" id="cantidad"></p></td>
		</tr>
		<tr>
			<td>Peso </td>
			<td><input type="text" name="txtcampo2" id="txtcampo2" style="width:150px" ><input type="button" style="margin-left:5%;" class="Btn" value="Aceptar" onclick="add();"></td>
		</tr>
		<tr><td colspan="2"><center><input id="button" type="button" value="Terminar" class="Btn" onclick="add_ingBode();" hidden></center></td></tr>
	</table>
</div>
<div style="float:right;width:55%;">
	<table id="listable" class="display" >
		<thead>
			<tr>
				<th>Factura</th>
				<th>Peso</th>
				<th>Opcion</th>
			</tr>
		</thead>
		<tbody>
			
		</tbody>
	</table>
</div>
</body>
<script languaje="javascript">nav();</script>
<script languaje="javascript">dataView();</script>
  
</html>