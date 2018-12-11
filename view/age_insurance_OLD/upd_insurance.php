<html>
<head>
	<title>Actualizar_Seguro</title>
	<?php require('../../librerias.php'); ?>
    <?php require('ctrl_insurance.php'); ?>
</head>
<body>
	<h1>Seguros / Actualizar Seguro/</h1>
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
                <td>Agente</td>
                <td colspan="2">
                    <input name='txtCampo1' type='text' id='txtCampo1' size='50' required value='<?php echo $listData[1]; ?>' />
                </td>
            </tr>
            <tr>
                <td>SubAgente</td>
                <td colspan="2">
                    <input name='txtCampo2' type='text' id='txtCampo2' size='50' required value='<?php echo $listData[2]; ?>' />
                </td>
            </tr>
            <tr>
                <td>Pais</td>
                <td colspan="2">
                    <input name='txtCampo3' type='text' id='txtCampo3' size='50' required value='<?php echo $listData[3]; ?>' />
                </td>
            </tr>
            <tr>
                <td>Producto</td>
                <td colspan="2">
                    <input name='txtCampo4' type='text' id='txtCampo4' size='50' required value='<?php echo $listData[4]; ?>' />
                </td>
            </tr>
            <tr>
                <td>% Empresa</td>
                <td colspan="2">
                    <input name='txtCampo5' type='text' id='txtCampo5' size='50' required value='<?php echo $listData[5]; ?>' />
                </td>
            </tr>
            <tr>
                <td>% Agente</td>
                <td colspan="2">
                    <input name='txtCampo6' type='text' id='txtCampo6' size='50' required value='<?php echo $listData[6]; ?>' />
                </td>
            </tr>
            <tr>
                <td>% SubAgente</td>
                <td colspan="2">
                    <input name='txtCampo7' type='text' id='txtCampo7' size='50' required value='<?php echo $listData[7]; ?>' />
                </td>
            </tr>
            <tr>
                <td>Valor Minimo</td>
                <td colspan="2">
                    <input name='txtCampo8' type='text' id='txtCampo8' size='50' required value='<?php echo $listData[8]; ?>' />
                </td>
            </tr>
            <tr>
                <td>Valor Maximo</td>
                <td colspan="2">
                    <input name='txtCampo9' type='text' id='txtCampo9' size='50' required value='<?php echo $listData[9]; ?>' />
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