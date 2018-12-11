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
	
	<h1>Compartir Carga</h1>
	<input type="button" value="Crear nuevo" style="float:right;" onclick="window.open('add_share.php','_self');" class="Btn">
	<br>
	<table id="listable" class="display">
		<tr>
			<th>ID</th>
			<th>Fecha de Creación</th>
			<th>Fecha de Captura</th>
			<th>Empresa Captura</th>
		</tr>
		
			
	</table>


	 <script languaje="javascript">nav();</script>
	<script languaje="javascript">dataView();</script>
</body>
</html>