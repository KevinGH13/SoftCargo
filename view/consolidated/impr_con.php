<!DOCTYPE html>
<html>
<head>
	<title>Impreción</title>
	<?php require('../../librerias.php'); ?>
    <?php require('ctrl_con.php'); require('phpbarcode/php-barcode.php');?>

    <?php $id_C =  $_REQUEST['id_C']; ?>

	<meta>

</head>
<body onLoad="javascript:window.print();" style="background-color:#FFF; color:#000;" >
	<h1 align="right" style="color:#000;">Consolidado de carga</h1>
	<?php foreach ($listInfo = sel11("$id_C AND 1=1") as $listData) : ?>
	<table width="100%">
		<tr>
			<td>
				<p>Origen:</p>
				<p>Desde </p>
				<p>Destino:</p>
				<p>Hasta </p>
			</td>
			<td>
				<h3 style="color:#000;">Modo de Impresion</h3>
			</td>
			<td>
				<p>Creado <?php echo($listData[0]) ?></p>
				<input type="button" class="Btn" value="Excel (XLS)">
				<input type="button" class="Btn" value="Facturas">
			</td>
		</tr>
	</table>
	<h2 align="center" style="color:#000;">Consolidado # <?php echo $id_C; ?></h2>
	<?php endforeach ;?>
	<table width="100%" >
		
			<tr>
			<td> </td>
			<td> <strong>Remitentes </strong></td>
			<td> <strong>Destinatarios </strong></td>
			<td> <strong>Declarado</strong></td>
			<td> <strong>Peso / Volumetrico </strong></td>
			<td> <strong>Unidades</strong></td>
			</tr>
		
		
			<?php foreach($lisInfo2 = sel12("$id_C AND 1=1") as $listData2): ?>
				<tr>
					<td>
		
			<img width='150' height='50' src='http://barcode.tec-it.com/barcode.ashx?data=<?  echo($listData2[0]) ?>&code=Code128&dpi=96' alt='Barcode Generator TEC-IT'/>
		
					
					</td>
					<td>
						<p><?php echo $listData2[1] ?></p>
						<p><?php echo $listData2[2] ?></p>
						<p><?php echo $listData2[3] ?></p>
					</td>
					<td>
						<p><?php echo $listData2[4] ?></p>
						<p><?php echo $listData2[5] ?></p>
						<p><?php echo $listData2[6] ?></p>
						<p><?php echo $listData2[7] ?></p>
						<p><?php echo $listData2[8] ?></p>
					</td>
					<td>
						<p><?php echo $listData2[9] ?></p>
					</td>
					<td>
						<p><?php echo $listData2[10] ?></p>
					</td>
					<td>
						<p>1</p>
					</td>
				</tr>
				<?php endforeach; ?>
		
	</table>
</body>
</html>