
<html>
<head>
	<title>Imprimir Facturas</title>
</head>
<?php $n = $_REQUEST['n']; ?>
<body>
	<iframe width="55%" height="80%" src="pdf_tracking.php?nfactura=<?php echo $n ?>">
  <p>Your browser does not support iframes.</p>
</iframe>
	<iframe width="40%" height="80%"  src="pdf_label.php?nfactura=<?php echo $n ?>">
  <p>Your browser does not support iframes.</p>
</iframe>
<div>
	<input type="button" value="Nueva Factura" onclick="document.location = 'add_tracking.php';">

</div>

</body>
</html>