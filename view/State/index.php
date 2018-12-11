<!DOCTYPE html>
<html>
<head>
	<title>Busqueda de Registro</title>
	<?php require('../../librerias.php'); ?>
	<?php require('ctrl_state.php'); ?>
</head>
<body>
	<?php require('../menu.php'); ?>
	<?php $state = state("1=1"); ?>
	<h1>Busqueda de Registros</h1>
	<table id="listable" class="display">
		<thead>
			<th>int_Guia</th>
			<th>Registro</th>
			<th>Fecha</th>
			<th>Opciones</th>
		</thead>
		<tbody>
		<?php foreach ($listRes=sel("1=1") as  $value): ?>
			<tr>
				<td><?php echo $value[0] ?></td>
				<td><?php echo $state[$value[1]-1][1];?></td>
				<td><?php echo $value[2] ?></td>
				<td>Working it</td>
			</tr>
		<?php endforeach ?>
			
		</tbody>
	</table>
	<script>nav();</script>
	<script>dataView();</script>
</body>
</html>