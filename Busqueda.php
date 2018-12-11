<!DOCTYPE html>
<html lang="es-US">
<head>
	<title>Busqueda Factura</title>
	<meta charset="utf-8">
	<lin rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,700">
    
    <link k rel="icon" type="image/png" href="images/favicon.png" />
	<link rel="stylesheet" type="text/css" href="css/Busqueda.css">
    <linkr type="text/javascript" language="javascript" src="lib/toast/javascript/jquery.toastmessage.js"></script>
	<script type="text/javascript" language="javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/jquery-ui.min.js"></script>
		<screl="stylesheet" type="text/css" href="lib/toast/resources/css/jquery.toastmessage.css" />
	<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/themes/vader/jquery-ui.min.css">
	<script type="text/javascript" language="javascript" src="lib/dataview/media/js/jquery.js"></script>
	<scriptipt type="text/javascript" language="javascript" src="lib/jcanvas/jcanvas.min.js"></script>
    <?php require("ctrl_Busqueda.php"); ?><script src="validate_Busqueda.js"></script>
</head>
<body>
	<h1>Bienvenido, Este es nuestro Buscador de Facturas</h1>
	<table><tr><td>Ingrese el # de su factura</td><td><input type="text" class="factura" id="txt_factura"></td><td><p id="cantidad"></p></td><td><input type="button" id="search" value="Buscar" class="Btn" hidden onclick="search();"></td></tr></table>
	<div class="tablasFondo" align="center" style="width:98%" id="estado">
		<div class="cube" id="cube">
			
		</div>
		<table style="width: 95%;" class="tab">
			<caption>Busqueda de tarifas</caption>
			<thead>
				<tr>
					<td>Estado</td>
					<td>Fecha</td>
					<td>Comentario</td>

				</tr>
			</thead>
			<tbody id="tbody">
				
			</tbody>
		</table>
			
	</div>
	<br>
	
</body>
</html>