<!DOCTYPE html>
<html>
<head>
	<title>Log's</title>
	<?php require('../../librerias.php'); ?>
    <?php require('ctrl_Log.php'); ?>
</head>
<body>
<?php require('../menu.php'); ?>
	<h1>Log's</h1>
	<table id="listable" class="display">
	<thead>
		<td>ID</td>
		<td>Acción</td>
		<td>Modulo Afectado</td>
		<td>fecha</td>		
        <td>Usuario ID</td>  
	</thead>
	<tbody>
		<?php foreach ($listInfo=sel("1=1") as $listData) :?>
			<tr>
			<td><?php echo $listData[0] ?></td>
			<td><?php echo $listData[1] ?></td>
			<td><?php echo str_replace("tbl_", "", $listData[2]) ?></td>
			<td><?php echo $listData[3] ?></td>	
            <td><?php echo $listData[4] ?></td> 
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>

 <script languaje="javascript">nav();</script>
    <script languaje="javascript">dataView2();</script>
    <script language="javascript">function del_toast(tipo, mensaje){$().toastmessage(tipo, mensaje);}</script>
</body>

</html>