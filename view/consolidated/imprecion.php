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
				<p class="p">Origen:</p>
				<p class="p">Desde </p>
				<p class="p">Destino:</p>
				<p class="p">Hasta </p>
			</td>
			<td>
				<h3 style="color:#000;">Modo de Impresion</h3>
			</td>
			<td>
				<p class="p">Creado <?php echo($listData[0]) ?></p>
				<input type="button" class="Btn" value="Excel (XLS)">
				<input type="button" class="Btn" value="Facturas">
			</td>
		</tr>
	</table>
	<h2 align="center">Consolidado # <?php echo $id_C; ?></h2>
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
		
			<?php $pesototal= 0;$pesototalVol= 0; $totalFacturas = 0 ; $totalEmpaques = 0;?>
			<?php foreach($lisInfo2 = sel12("$id_C AND 1=1") as $listData2): ?>
				<tr class="tr_d">
					<td>
		
					<img src='http://barcode.tec-it.com/barcode.ashx?data=<?  echo($listData2[0]) ?>&code=Code128&dpi=96' alt='Barcode Generator TEC-IT'/>
					
					
					</td>
					<td>
						<p class="p"><?php echo $listData2[1] ?></p>
						<p class="p"><?php echo $listData2[2] ?></p>
						<p class="p"><?php echo $listData2[3] ?></p>
					</td>
					<td>
						<p class="p"><?php echo $listData2[4] ?></p>
						<p class="p"><?php echo $listData2[5] ?></p>
						<p class="p"><?php echo $listData2[6] ?></p>
						<p class="p"><?php echo $listData2[7] ?></p>
						<p class="p"><?php echo $listData2[8] ?></p>
					</td>
					<td>
						<p class="p"><?php echo $listData2[9] ?></p>
					</td>
					<td>
						<p class="p"><?php echo $listData2[10] ; $pesototal+= $listData2[10] ;?> / <?php $pesoVol = round((($listData2[13]*$listData2[14]*$listData2[15])/166),2); echo "$pesoVol"; $pesototalVol+=$pesoVol; ?> </p>
					</td>
					<td>
						<p class="p">1</p>
					</td>
				</tr>
				<tr>
					<td><strong  > Contiene : <?php echo $listData2[11] ?></strong></td>
					<td><p><?php echo $listData2[12] ?></p></td>
				</tr>
				<?php $totalFacturas++; ?>
				<?php endforeach; ?>
		
	</table>
	<table>
		<tr>
			<td><strong>Total Empaques: <?php echo $totalFacturas; ?></strong></td>
		</tr>
		<tr>
			<td><strong>Total Facturas: <?php echo $totalFacturas; ?></strong></td>
		</tr>
		<tr>
			<td><strong>Total Peso/Vol: </strong><?php echo $pesototal; ?><strong> Lbs / </strong><?php echo $pesototalVol ?></td>
		</tr>
	</table>
</body>
</html>