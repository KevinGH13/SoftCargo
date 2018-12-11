<html>
<head>
	<title>Actualizar_EstadoCarga</title>
	<?php require('../../librerias.php'); ?>
    <?php require('ctrl_status.php'); ?>
</head>
<body>
	<h1>EstadosCarga / Actualizar EstadoCarga /</h1>
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
                <td>EstadoCarga</td>
                <td colspan="2">
                    <input name='txtCampo1' type='text' id='txtCampo1' size='50' required value='<?php echo $listData[1]; ?>' />
                </td>
            </tr>
            <tr>
               <td>Es agente?</td>
                <td colspan="2">
                <select name='txtCampo3' id='txtCampo3'>
                	<option value="<?php echo $listData[3]; ?>"><?php echo $listData[3]; ?></option>
                    <option value="#" disabled>--</option>
                	<option value="SI">SI</option>
					<option value="NO">NO</option>
				</select>
                </td>
            </tr>
            <tr>
                <td>Es servicio web?</td>
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
                <td>Recibe notificacion?</td>
                <td colspan="2">
                <select name='txtCampo6' id='txtCampo6'>
                	<option value="<?php echo $listData[6]; ?>"><?php echo $listData[6]; ?></option>
                    <option value="#" disabled>--</option>
                	<option value="SI">SI</option>
					<option value="NO">NO</option>
				</select>
                </td>
            </tr>
            <tr>
                <td>Comentario</td>
                <td><textarea name="txtCampo7" id="txtCampo7" maxlenght="255" ><?php echo $listData[7] ?></textarea></td>
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