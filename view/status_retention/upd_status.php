<html>
<head>
	<title>Actualizar_EstadoRetencion</title>
	<?php require('../../librerias.php'); ?>
    <?php require('ctrl_status.php'); ?>
</head>
<body>
	<h1>EstadosRetencion / Actualizar EstadoRetencion /</h1>
	<form name='formUpdate' id="formUpdate" method='post' onSubmit="exe_upd()" >
	<table width="40%">
    	<?php $intID=$_GET['id']; ?>
		<?php foreach($listInfo=sel("int_ID=".$intID) as $listData): ?>
            <tr>
              <td colspan="3">&nbsp;</td>
            </tr>
            <tr>
                <td>ID</td>
                <td colspan="2">
                    <input class="ID" name='id' type='text' id='id' size='50' readonly value='<?php echo $listData[0]; ?>' />
                    <input type="hidden" name="act" id="act" value="upd">
                </td>
            </tr>
            <tr>
                <td>Estado</td>
                <td colspan="2">
                    <input name='txtCampo1' type='text' id='txtCampo1' size='50' required value='<?php echo $listData[1]; ?>' />
                </td>
            </tr>
            <tr>
                <td>Abreviatura</td>
                <td colspan="2">
                    <input name='txtCampo2' type='text' id='txtCampo2' size='50' required value='<?php echo $listData[2]; ?>' />
                </td>
            </tr>
            <tr>
                <td>Agencia</td>
                <td colspan="2">
                <select name='txtCampo3' id='txtCampo3'>
                	<option value="<?php echo $listData[3]; ?>"><?php echo $listData[3]; ?></option>
                    <option value="0">--</option>
                	<option value="1">Agencia 1</option>
					<option value="2">Agencia 2</option>
					<option value="3">Agencia 3</option>
					<option value="4">Agencia 4</option>
					<option value="5">Agencia 5</option>
				</select>
                </td>
            </tr>
            <tr>
               <td>Enviado central?</td>
                <td colspan="2">
                <select name='txtCampo4' id='txtCampo4'>
                	<option value="<?php echo $listData[4]; ?>"><?php echo $listData[4]; ?></option>
                    <option value="#" disabled>--</option>
                	<option value="SI">SI</option>
					<option value="NO">NO</option>
				</select>
                </td>
            </tr>
            <tr>
                <td>Detalles</td>
                <td colspan="2">
                	<textarea name='txtCampo5' id='txtCampo5' ><?php echo $listData[5]; ?></textarea>
                </td>
            </tr>
            <tr>
              <td colspan="3"></td>
            </tr>
            <tr>
            	<td colspan="3" align="center">
                	<input type="submit" value="Actualizar" />
                    <input type="button" value="Cancelar" class="Btn" onClick="javascript:window.history.back();" />
                </td>
            </tr>
        <?php endforeach; ?>
	</table>
    </form>
    <script language="javascript">function upd_toast(tipo, mensaje){$().toastmessage(tipo, mensaje);}</script>
</body>
</html>