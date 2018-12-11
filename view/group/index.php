<!DOCTYPE html>
<html>
<head>
	<title>Grpcon</title>
	<?php require('../../librerias.php'); ?>
    <?php require('ctrl_group.php'); ?>
    <script type="" src="validate_city.js"></script>

</head>
<body>
	
<?php require('../menu.php'); ?>

<h1>GRPcon</h1>
<table id="listable" class="display">
	<thead>
		<td>Fecha de GRPcon</td>
		<td>Numero Consolidado</td>
		<td>Numero GRPcon</td>
	
		<td>Opciones</td>
	</thead>
	<tbody>
		<?php foreach ($listInfo=sel("1=1") as $listData) :?>
			<tr>
			<td><?php echo $listData[1] ?></td>
			<td><input type="Button" class="info" style="width:150px;" value="   IDs Consolidados" onclick='Cargar(<?php echo $listData[3] ?>);'></td>
			<td> <a href="upd_group.php?id_g=<?php echo $listData[3] ?>"><?php echo $listData[3] ?></a></td>
			
			<td><?php if($listData[2]!='PC' AND $listData[4]!='PC'){ echo('<input type="submin" class="Btn" value="Imprimir" onclick="imprimir('.$listData[3].')"> <input type="button" id="impriLabel" class="Btn" style="width:150px" value="Imprimir Labels" onclick="window.open('."'".'impreLabel.php?date=' .$listData[3]."'".','."'".'_blanck'."'".');" align="center"> ');}else{echo('<input type="submin" class="Btn" value="P. Carga" onclick="'."$('#div4').dialog('open'); id_cons_n = $listData[3] ".'">');} ?><input type="submin" class="Btn" value="Editar" onclick="upd_data(<?php echo $listData[3] ?>);">
			<input type="button" hidden class="dell" onclick="del_all(<?php echo $listData[3] ?>);"></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>

<div id="dialog" style="width:500px;" title="Consolidado Agrupados" >
	<table  id="listable" class="display" >
		

	</table>
</div>

</div>
</body>
<div id="div4" title="Proceso de Carga">
<table>	
	<tr><td>Ciudad Destino : <input type="text" style="width:240px;" id="Ciudad"  value="<?php echo  $listData2[2] ?>"></td></tr>
	<tr><td>Agente Desaduanante : <select id="agente" class="agente" style="width:240px;">
				<option value="<?php echo $listData2[4] ?>" >
				<?php if($listData2[4] == "PC"){echo "Elegir un Agente Desaduanante";}else{
					foreach ($listInfo4=sel4("int_ID = $listData2[4]") as $value2) {
						echo "$value2[0]";
					}
					} ?></option>
				<option value="PC">------------------------</option>
				<?php foreach ($listInfo3 = sel4("1=1") as $value): ?>
					<option value="<?php echo $value[1] ?>"><?php echo $value[0] ?></option>
				<?php endforeach ?>
		</select>
		</td>
	</tr>
	<tr><td><input type="button" onclick="PCupd();" value="Aceptar"><input type="button" onclick="PCcan();" value="Cancelar"></td></tr>
</table>
</div>

 <script languaje="javascript">nav();</script>
    <script languaje="javascript">dataView2();</script>
    <script language="javascript">function del_toast(tipo, mensaje){$().toastmessage(tipo, mensaje);}</script>

</html>