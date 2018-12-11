<!DOCTYPE html>
<html>
<head>
	<title>Agregar Grupo</title>
	<?php require('../../librerias.php'); ?>
    <?php require('ctrl_group.php'); ?>
    <script type="" src="validate_city.js"></script>
</head>
<body>
	

<?php require('../menu.php'); ?>


	<h1>Generar GRPcon</h1>
	<br><br>
	<table id='panel' align="center" >

		<?php for($i=0;$i<8;$i++): ?>
			<tr>
				<td><input type="text" class="txt" style="width:155px;" id='<?php echo $i ?>' onchange=''>    <strong id='p<?php echo $i ?>'>OK</strong></td>
			</tr>
		<?php endfor; ?>

	</table>
	<table  align="center">
		<tr><td><input type="button" id="addItem" class="Btn" value="+ Item" onclick="AddItem();" align="Right"></td></tr>
		<tr><td><input type="button" id='addButton' class="Btn" value="Aceptar" onclick="Aceptar();" align="center"></td></tr>
	</table>
	</div>
</body>
<div id="div2" title="Proceso de Carga">
	<p>Desea hacer el proceso de carga ?</p>
</div>
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
 <script languaje="javascript">dataView();</script>
 <script language="javascript">function del_toast(tipo, mensaje){$().toastmessage(tipo, mensaje);}</script>
</html>