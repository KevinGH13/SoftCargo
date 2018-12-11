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

	<?php $listData2=sel("int_ID = $id_group AND 1=1")  ?>
	<?php if ($listData2[0][5	] == 1): ?>
		<?php $NO = true; ?>
		<script> NO = true;</script>
	<?php endif ?>

	<h1>Generar GRPcon</h1>
	<?php if ($NO): ?>
		<h3>Nota : El GRPCon en el que se encuentra ya culmino proceso de carga por lo tanto no se puede modificar ninguna clase de información que a este convenga</h3>
	<?php endif ?>
	<br><br>

	<div  style="width: 31%;display: inline-block;margin-right: 70px;">
		<table id='panel2'  class="display"  style="width:50%;">
		<thead>
			<th>#Consolidado</th>
			<th>Opciones</th>
		</thead>
		<?php $i=0; foreach ($listInfo=sel3($id_group) as $listData) : ?>
			<tr>
				<td><h2><?php echo $listData[0] ?></h2>  </td>
				<td><?php 	if(!$NO){echo '<input type="button" class="Btn" value="Eliminar" onclick="del_con( '.$listData[0].','.$i.' );">';}else{echo "NO modificar";} ?></td>
			</tr>
			<?php $i++; ?>
		<?php endforeach; ?>
		

	</table>
	</div>

	<table  width="40%" style="border-color: #FF6B5B;border-style: solid;border-radius: 10px;padding: 22px;display: inline-block;position: fixed;">
	
		<tr><td>Fecha de GRPcon: <?php echo  $listData2[0][1] ?></td></tr>
		<tr><td>Numero GRPcon: <h2>	<?php echo  $listData2[0][0] ?></h2></td></tr>
		
		

		<tr>
		<td><input type="button" id="addItem"  class="Btn" value="+ Item"  <?php if($NO){echo 'style="background-color:#5F5F5F;';} ?> onclick='$("#div3").dialog("open");' align="Right">
		<input type="button" id='addButton' class="Btn" value="Cancelar" onclick="window.open('index.php','_self');" align="center">
		<!--<input type="button" id='addButton' class="Btn" value="Actualizar" onclick="udpData(<?php echo $id_group; ?>);" align="center"></td>-->
		</tr>
	</table>

	

	</div>
</body>
<div id="div3" title="Agregar Consolidado" style="width:500px;">
<table>
	<tr><td><input type="text" class="txt" style="width:155px;" id='<?php echo $i ?>' onchange=''></td><td><strong id='p<?php echo $i ?>'>Aceptado</strong></td></tr>
	<tr><td><input type="Button" class="Btn" value="Agregar" onclick="addItem2(<?php echo $i ;?>,<?php echo $id_group; ?>);"><input type="Button" class="Btn" value="Cancelar" onclick="$('#div3').dialog('close');"></td></tr>
</table>
	<div id="divC" title="Confirmar" ><p id="pC"></p></div>
</div>
 <script languaje="javascript">nav();</script>
 <script languaje="javascript">dataView();</script>
 <script language="javascript">function del_toast(tipo, mensaje){$().toastmessage(tipo, mensaje);}</script>
</html>