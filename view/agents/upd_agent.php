<html>
<head>
	<title>Actualizar_Agente</title>
	<?php require('../../librerias.php'); ?>
    <?php require('ctrl_agent.php'); ?>
</head>
<body>
	<h1>Agentes / Actualizar Agente /</h1>
	<form name='formUpdate' id="formUpdate" method='post' onSubmit="exe_upd();" >
	<table width="40%" align="left">
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
                <td>Agente</td>
                <td colspan="2">
                    <input name='txtCampo1' type='text' id='txtCampo1' size='50' required value='<?php echo $listData[1]; ?>' />
                </td>
            </tr>
            <tr>
              <td>Empresa</td>
              <?php $empresa = sel3($listData[11]); ?>
              <td colspan="2"><input name='txtCampo2' type='text' id='txtCampo2' size='50' readonly value='<?php echo $empresa[0][1]; ?>' /></td>
            </tr>
            <tr>
                <td>Direccion</td>
                <td colspan="2">
                    <input name='txtCampo3' type='text' id='txtCampo3' size='50' required value='<?php echo $listData[2]; ?>' />
                </td>
            </tr>
            <tr>
                <td>Ciudad</td>
                <td colspan="2">
                    <input name='txtCampo4' type='text' id='txtCampo4' size='50' required value='<?php echo $listData[3]; ?>' />
                </td>
            </tr>
            <tr>
                <td>Estado</td>
                <td colspan="2">
                    <input name='txtCampo5' type='text' id='txtCampo5' size='50' required value='<?php echo $listData[4]; ?>' />
                </td>
            </tr>
            <tr>
                <td>Pais</td>
                <td colspan="2">
                    <input name='txtCampo6' type='text' id='txtCampo6' size='50' required value='<?php echo $listData[5]; ?>' />
                </td>
            </tr>
            <tr>
                <td>CodZip</td>
                <td colspan="2">
                    <input name='txtCampo7' type='text' id='txtCampo7' size='50' required value='<?php echo $listData[6]; ?>' />
                </td>
            </tr>
            <tr>
                <td>Telefono</td>
                <td colspan="2">
                    <input name='txtCampo8' type='text' id='txtCampo8' size='50' required value='<?php echo $listData[7]; ?>' />
                </td>
            </tr>
            <tr>
                <td>Fax</td>
                <td colspan="2">
                    <input name='txtCampo9' type='text' id='txtCampo9' size='50'  value='<?php echo $listData[8]; ?>' />
                </td>
            </tr>
            <tr>
                <td>eMail</td>
                <td colspan="2">
                    <input name='txtCampo10' type='text' id='txtCampo10' size='50' required value='<?php echo $listData[9]; ?>' />
                </td>
            </tr>
            <tr>
                <td>Tipo Agente</td>
                <td colspan="2">
                    <select name="txtCampo12" id="txtCampo12">
                        <option value="<?php echo $listData[11]; ?>"> 
                        <?php if ($listData[11] == '1' ): ?>
                            <?php echo "Carga"; ?>
                        <?php else: ?>
                            <?php echo "Aduana"; ?>
                        </option>
                        <?php endif; ?>
                        <option value="1">Carga</option>
                        <option value="2">Aduana</option>
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