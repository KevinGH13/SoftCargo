<html>
<head>
	<title>Posiciones Arancelarias</title>
	<?php require('../../librerias.php'); ?>
    <?php require('ctrl_pos_arancel.php') ?>
</head>
<body>
	<h1>Posiciones Arancelarias / Agregar / </h1>
	<form name='formInsert' id="formInsert" onSubmit="exe_add(<?php echo $intID;?>);" >
	<table width="40%">
            <tr>
              <td colspan="3">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="3">
                  <input type="hidden" name="act" id="act" value="add">
                </td>
            </tr>
            <tr>
                <td>P.A</td>
                <td colspan="2">
                    <input name='txtCampo1' type='text' id='txtCampo1' size='50' required />
                </td>
            </tr>
            <tr>
              <td>CONCEPTO</td>
              <td colspan="2"><input name='txtCampo2' type='text' id='txtCampo2' size='50' value='<?php echo $listData[0]; ?>' required/></td>
            </tr>
            <tr>
                <td>ARANCEL %</td>
                <td colspan="2">
                    <input name='txtCampo3' type='text' id='txtCampo3' size='50' required />
                </td>
            </tr>
            <tr>
                <td>IVA %</td>
                <td colspan="2">
                    <input name='txtCampo4' type='text' id='txtCampo4' size='50' required />
                </td>
            </tr>
                       
            <tr>
              <td colspan="3"></td>
            </tr>
            <tr>
            	<td colspan="3" align="center">
                	<input type="submit" value="Agregar" />
                    <input type="button" value="Cancelar" class="Btn" onClick="javascript:window.history.back();" />
                </td>
            </tr>
	</table>
    </form>
    <script language="javascript">function add_toast(tipo, mensaje){$().toastmessage(tipo, mensaje);}</script>
</body>
</html>