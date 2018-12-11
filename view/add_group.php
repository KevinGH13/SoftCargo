<!DOCTYPE html>
<html>
<head>
	<title>Agregar Grupo</title>
	<?php require('../../librerias.php'); ?>
    <?php require('ctrl_group.php'); ?>
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
	<table  align="Right">
		<tr><td><input type="button" id="addItem" class="Btn" value="+ Item" onclick="AddItem();" align="Right"></td></tr>
		<tr><td><input type="button" id='addButton' class="Btn" value="Aceptar" onclick="Aceptar();" align="center"></td></tr>
	</table>
	</div>
</body>
 <script languaje="javascript">nav();</script>
 <script languaje="javascript">dataView();</script>
 <script language="javascript">function del_toast(tipo, mensaje){$().toastmessage(tipo, mensaje);}</script>
</html>