<!DOCTYPE html>
<html>
<head>
	<title>Busqueda de factura</title>
	<?php require('../../librerias.php'); ?>
  <?php require('ctrl_tracking.php'); ?>
	<script src="search.js"></script>
</head>

<body>
<?php require('../menu.php'); ?>
<h1 >Busqueda de Factura</h1>
<table class="tablasFondo"  width="80%" border="0" align="center"  style="height:19%">
	<tr colspan="4">
		<td># De Factura</td>
		<td>Rastreo Alterno</td>
		<td>Nombre Remitente</td>
		<td>Nombre Destinatario</td>
	</tr>
	<tr colspan="4">
		<td><input style="width:150px !important; " type="text" id="txt1" name="1" /><p id="d" style="margin:0px;"></p></td>
		<td><input style="width:150px !important; " type="text" id="txt4" name="4" /></td>
		<td><input style="width:150px !important; " type="text" id="txt2" name="2" /></td>
		<td><input style="width:150px !important; " type="text" id="txt3" name="3" /></td>
	</tr>
	<tr>
		<td>Telefono Remitente</td>
		<td>Telefono Destinatario</td>
		<td>Email Remitente</td>
		<td>Email Destinatario</td>
	</tr>
	<tr colspan="4">
		<td><input style="width:150px !important; " type="text" id="txt5" name="5" /></td>
		<td><input style="width:150px !important; " type="text" id="txt6" name="6" /></td>
		<td><input style="width:150px !important; " type="text" id="txt7" name="7" /></td>
		<td><input style="width:150px !important; " type="text" id="txt8" name="8" /></td>
	</tr>
</table>
<br>
<table class="tablasFondo"  width="40%" border="0" align="center" style=" height:19%">
	<tr colspan="4">
		<td></td>
		<td>Seleccione Agente</td>
		<td>Seleccione Pais</td>
		<td></td>
	</tr>
	<tr colspan="4">
		<td>&nbsp;</td>
		<td>
		<?php if ($tp_user == 1): ?>
         <select style="width:150px;" name='txt9' id="txt9">
              <option value=""></option>
              <?php foreach($listInfo2=sel2("1=1") as $listAge): ?>
                  <option value="<?php echo $listAge[0]; ?>"><?php echo $listAge[1]; ?></option>
              <?php endforeach; ?>
        </select>
        <?php else : ?>
        <input  style = "width:180px;" type="text" name='txt9' id="txt9" value="<?php echo $int_IDagente ?>" hidden >   
        <h2>Agente <?php $Agente = sel2("int_ID = $int_IDagente"); echo $Agente[0][1]; ?></h2>
        <?php endif ?>

		</td>
		<td>
			<select style="width:150px;" id="txt10">
			<option value=""></option>
				<?php foreach($listInfo8=sel8("1=1") as $listServ): ?>
                      <option value="<?php echo $listServ[0]; ?>"><?php echo $listServ[0]; ?></option>
                      <?php endforeach; ?>
			</select>
		</td>
		<td>&nbsp;</td>
	</tr>
</table>
<br>
<h2 style="text-align:center;">Rango Fecha</h2>
<table class="tablasFondo" width="40%" border="0" align="center"  style="height:19%">
	<tr colspan="4">
	    <td>&nbsp;</td>
		<td>Desde</td>
		<td>Hasta</td>
		<td>&nbsp;</td>
	</tr>
	<tr colspan="4">
		<td>&nbsp;</td>
		<td><input style="width:150px !important; " type="text" id="txt11" /></td>
		<td><input style="width:150px !important; " type="text" id="txt12" /></td>
		<td>&nbsp;</td>
	</tr>
</table>

<input type="button" class="Btn" onclick="searchBtn()" value="Buscar">
<script languaje="javascript">nav();</script>
<script languaje="javascript">dataView();</script>
</body>
</html>
