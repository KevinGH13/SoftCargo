<html>
<head>
	<title>Actualizar_Novedad</title>
	<?php require('../../librerias.php'); ?>
    <?php require('ctrl_news.php'); ?>
</head>
<body>
	<h1>Novedades / Actualizar Novedad /</h1>
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
                <td>Título</td>
                <td colspan="2">
                    <input name='txtCampo1' type='text' id='txtCampo1' size='50' required value='<?php echo $listData[1]; ?>' />
                </td>
            </tr>
            <tr>
                <td>Novedad</td>
                <td colspan="2">
                    <textarea name='txtCampo2' id='txtCampo2' ><?php echo $listData[2]; ?></textarea>
                </td>
            </tr>
            <tr>
                <td>Agencias</td>
                <td colspan="2">
                <select name='txtCampo3' id='txtCampo3'>
                        <?php $agente = selAgente("int_ID = ".$listData[3]) ?>
                        <option value="<?php echo $agente[0][0]; ?>"><?php echo $agente[0][1]; ?></option>
                        <option value="" disabled>-----------------------</option>
                        <option value="0">TODAS</option>
                       <?php foreach ($listAgente = selAgente("1=1") as  $value): ?>
                           <option value="<?php echo $value[0] ;?>"><?php echo $value[1]; ?></option>
                       <?php endforeach ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Publicada</td>
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
                <td>Tipo</td>
                <td>
                    <select name="txtCampo5" id="txtCampo5">
                        <option value="<?php echo $listData[5] ?>"><?php echo $listData[5] ?></option>
                        <option value="" disabled>---------------</option>
                        <option value="notice">Noticia</option>
                        <option value="success">Suceso</option>
                        <option value="warning">Peligro</option>
                        <option value="error">Error</option>
                    </select>
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