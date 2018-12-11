<!DOCTYPE html>
<html>
<head>
	<title>Registro PDE</title>	
	<?php require('../../librerias.php'); ?>
	<?php require('ctrl_state.php'); ?>
</head>
<body>
<?php require('../menu.php'); ?>

	<h1>Registro de Prueba de entrega</h1>
	<center><div class="tablasFondo" style="width:45%;">
	<form >
		<table class="display">
			<tr>
			<td># Factura </td>
			<td><input type="text" class="factura" id="txtcampo1" name="txtcampo1" required><p id="cantidad"></p></td>
			</tr>
			<tr>
				<td>Resivido por </td>
				<td>
					<input type="text" id="txtcampo2" name="txtcampo2" required>
				</td>
			</tr>
			<tr>
				<td>Fecha</td>
				<td><input type="text" class="datepicker" id="txtcampo3" name="txtcampo3" required ></td>
			</tr>
			
			<tr ><td colspan="2"><center><input type="button" class="Btn" value="Aceptar" onclick="add_PDE();"></center></td></tr>
		</table>
		</form>
	</div>
	</center>
	<script>nav();</script>
	
	

</body>
</html>