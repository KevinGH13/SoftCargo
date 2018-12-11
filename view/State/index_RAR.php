<!DOCTYPE html>
<html>
<head>
	<title>Reporte de RAR</title>	
	<?php require('../../librerias.php'); ?>
	<?php require('ctrl_state.php'); ?>
</head>
<body>
<?php require('../menu.php'); ?>

	<div class="tablasFondo" style="width: 43%;position: fixed;float: left;height: 55%;">
	<h1>Reporte de Admin Registro</h1>
	<form >
		<table class="display">
			<tr>
				<td>Registro inicial </td>
				<td>
					<select name="txtcampo1" id="txtcampo1" required>
					<option value=""></option>
					<?php foreach ($listState=state("1=1") as  $value): ?>
						<option value="<?php echo $value[0] ?>"><?php echo $value[1] ?></option>
					<?php endforeach ?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Registro Final </td>
				<td>
					<select name="txtcampo2" id="txtcampo2" required>
					<option value=""></option>
					<?php foreach ($listState=state("1=1") as  $value): ?>
						<option value="<?php echo $value[0] ?>"><?php echo $value[1] ?></option>
					<?php endforeach ?>
					</select>
				</td>
			</tr>
			<tr>
			<td># Consolidado </td>
			<td><input type="text" class="consolidadV" id="txtcampo3" name="txtcampo3" required><p id="cantidad"></p></td>
			</tr>
			
			<tr ><td colspan="2"><center><input type="button" class="Btn" value="Aceptar" onclick="exe_RAR();"></center></td></tr>
		</table>
		</form>
	</div>
	<div class="tablasFondo" id="panel" hidden style="width:40% ; float: right;">
		<table id="lista" >
		<thead>
			<tr>
			<td>ID_Factura</td>
			<td>Dias entre registros</td>
			</tr>
		</thead>
			
			<tbody>
				
			</tbody>
		</table>
	</div>
	<script>nav();</script>
	<script>dataView();</script>
	
	

</body>
</html>