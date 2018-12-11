<!DOCTYPE html>
<html>
<head>
	<title>Reporte Empaque</title>
	<?php// require('../../librerias.php'); ?>
    <?php require('ctrl_Empaque.php'); ?>
    <?php if (isset($_REQUEST['Conso'])) { $int_Conso = $_REQUEST['Conso'];} ?>
    <style>
    *{
    	text-transform: uppercase;
    	font-size: 12px;
    }
    #table>td,th {
    border-bottom: 1px solid #ddd;
    text-align: center;
	}
	#table{
		border: 1px solid  #ddd;
	}
	
    </style>
</head>
<body>
<div style="width:100%;height:100px;">
	<?php $InfoConso = sel('int_ID = '.$int_Conso);	 ?>
	
	<table style="border: 1px solid #ddd;text-align: center;">
		<tr>
			<td>Origen</td>
			<td><?php $Empresa = selEmpresa($InfoConso[0][1]); echo $Empresa[0][0];?><?php echo ",".$Empresa[0][3] ?></td>
			<td>Destino</td>
			<td>
			<table>
				<tr>
					<td><?php $Empresa = selEmpresa($InfoConso[0][3]); echo $Empresa[0][0];?></td>
				</tr>
				<tr>
					<td><?php echo $Empresa[0][1].",".$Empresa[0][2].",".$Empresa[0][3] ?></td>
				</tr>
			</table>
			</td>
		</tr>
		<tr>
			<td>Creado</td>
			<td><?php echo $InfoConso[0][9] ?></td>
		</tr>
	</table>
</div>
<div style="width:100%;">
	<table width="100%" id="table">
	<thead>
		<th></th>
		<th># Bolsa </th>
		<th># Factura</th>
		<th>Peso</th>
		<th>Dimeciones</th>
		<th>Peso Volumetrico</th>
		<th>Destinatario</th>
		<th>Peso Cobrado</th>
	</thead>
	<?php $i = 0 ; $pesoT=0;$pesoVolumetricoT=0;$pesoCobradoT=0;?>
	<?php foreach ($listInfo = Rep_Emp($int_Conso) as $ReporteBolsa): ?>
		<?php $numerobolsas = $ReporteBolsa[8] ?>
		<tr>
		<?php $pesoVolumetrico = $ReporteBolsa[3]*$ReporteBolsa[4]*$ReporteBolsa[5]/166;  $i++; ?>
			<td><?php echo $i ?></td>
			<td><?php echo $ReporteBolsa[0] ?></td>
			<td><?php echo $ReporteBolsa[1] ?></td>
			<td><?php echo $ReporteBolsa[2] ?></td>
			<td><?php echo $ReporteBolsa[3] ?>X<?php echo $ReporteBolsa[4] ?>X<?php echo $ReporteBolsa[5] ?></td>
			<td><?php echo $pesoVolumetrico ?></td>
			<td><?php echo $ReporteBolsa[6] ?></td>
			<td><?php echo $ReporteBolsa[7] ?></td>

		<?php $pesoT+=$ReporteBolsa[2]; $pesoVolumetricoT+=$pesoVolumetrico; $pesoCobradoT+= $ReporteBolsa[7]; ?>
		</tr>
	<?php endforeach ?>	
	</table>
</div>
	<table style="border: 1px solid #ddd;">
	<tr><td>Bolsas : </td><td><?php echo $numerobolsas;?></td></tr>
	<tr><td>Unidades : </td><td>   <?php echo $i ?></td></tr>
	<tr><td>Peso : </td><td>   <?php echo $pesoT ?></td></tr>
	<tr><td>Peso Volumetrico : </td><td>   <?php echo round($pesoVolumetricoT,2) ?></td></tr>
	<tr><td>Peso Cobrado : </td><td>   <?php echo $pesoCobradoT ?></td></tr>
	</table>
</body>
</html>