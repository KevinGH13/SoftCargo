<html>

<head>
	<title>Boxes delivery</title>
	<?php require('../../librerias.php'); ?>
	<?php require('ctrl_delivery.php'); ?>
	<link rel="stylesheet" type="text/css" href="windowstyle.css">
	<script src="validate_city.js"></script>
</head>

<body>
	<?php require('../menu.php'); ?>

	<h1>
		<div class="icon-paper-plane-empty"> Boxes delivery
	</h1>

	<form name='formInsert' id="formInsert">
		<?php include('alert_window.php'); ?>
		<br>
		<table border="0" align="center">

			<!-- BoxInfo -->
			
			<td>
				<div>
					<h4>Box info</h4>
					<table class="tablasFondo" width="100%">
						<tr>
							
						</tr>
						<tr>
							<!--<td colspan="4"><input type="hidden" name="act" id="act" value="add" place></td>-->
						</tr>
						</tr>
							<td>Nombre</td>
							<td><input  name='txtName' type='text' id="txtCampo1" size='50' required /></td>
						<tr>
						<tr>
							
						</tr>
						<tr>
							<td>Direccion</td>
							<td colspan="3"><input name='txtAddress' type='text' id="txtAddress" required /></td>
						</tr>
						
						<!--<tr>
							<td>Pais </td>
							<td colspan="3">
								<input class="ID" style='width:137px;' name='txtCampo6' type='text' id="txtCampo6" size='50' placeholder="Pais"
								 hidden required readonly />
								<select name='CampoPais' style="width: 137px;" id="CampoPais">
									<option value="">Seleccione Pais</option>
									<option value="" disabled>------------</option>
									<?php// foreach ($list = sel8("1=1") as  $value): ?>
									<option value="<?php //echo $value[1] ?>">
										<?php// echo $value[0] ?>
									</option>
									<?php //endforeach ?>
								</select>
								<input style='width:137px;' name='txtCampo4' type='text' id="txtCampo4" size='50' placeholder="Ciudad" required />
								<input class="ID" style='width:137px;' name='txtCampo5' type='text' id="txtCampo5" size='50' placeholder="Estado"
								 required />

							</td>
						</tr>-->
						<tr>
							<td>Codigo Postal</td>
							<td colspan="2"><input style='width:137px;' name='txtPostalCode' type='text' id="txtPostalCode" size='50' required /></td>
							<td>Telefono </td>
							<td colspan="2"><input style='width:130px;' name='txtTelephone' type='text' min="0" id="txtTelephone" size='50' required /></td>
						</tr>
						<tr>
							<td>E-Mail</td>
							<td colspan="3"><input style='width:137px;' name='txtEmail' type='email' id="txtEmail" size='50' required /></td>
						</tr>
						<tr>
							<td>Caja recibida por</td>
							<td colspan="3"><input name='txtBoxReceiver' id='txtBoxReceiver' type='text' required /></td>
						</tr>
						<tr>
							<td>Caja entregada por</td>
							<td colspan="3"><input name='txtBoxDispatcher' id='txtBoxDispatcher' type='text' require /></td>
						</tr>
						<tr>
							<td>Fecha</td>
							<td><input type="date" class="datepicker" id="Date" name="Date" required></td>
						</tr>
						<tr>
							<td>Notas</td>
							<td>
								<textarea name='txtNotes' id='txtNotes'>
							</textarea></td>
						</tr>
						<br>
						<tr><td><input  type="button" value="Button" class="Btn" onclick=""/></td></tr>
					</table>
			</td>
			<td>&nbsp;</td>
			</tr>
		</table>
	</form>
	<script languaje="javascript">nav();</script>
	<script languaje="javascript">dataView();</script>
	<script language="javascript">function add_toast(tipo, mensaje) { $().toastmessage(tipo, mensaje); }</script>
</body>
<script type="text/javascript">
	$('form')[0].reset();

	function openVentana() {
		$(".ventana").slideDown(1000);

	}
	function closeVentana() {
		$(".ventana").slideUp("fast");
	}
</script>

</html>