<!DOCTYPE html>
<html>
<head>
	<title>Registro por Consolidado</title>	
	<?php require('../../librerias.php'); ?>
	<?php require('ctrl_state.php'); ?>
</head>
<body>
<?php require('../menu.php'); ?>

	<h1>Registro por GRPcon</h1>
	<center><div class="tablasFondo" style="width:45%;">
	<form >
		<table class="display">
			<tr>
			<td># GRPcon </td>
			<td><input type="text" class="GrupoV" id="txtcampo1" name="txtcampo1" required><p id="cantidad"></p></td>
			</tr>
			<tr>
				<td>Registro </td>
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
				<td>Fecha</td>
				<td><input type="text" class="datepicker" id="txtcampo3" name="txtcampo3" required ></td>
			</tr>
			<tr>
				<td>Comentario</td>
				<td><textarea name="txtcampo4" id="txtcampo4" cols="30" rows="10" required></textarea></td>
			</tr>
			<tr ><td colspan="2"><center><input type="button" class="Btn" value="Aceptar" onclick="add_GRPcon();"></center></td></tr>
		</table>
		</form>
	</div>
	</center>
	<script>nav();</script>
	
	

</body>
</html>