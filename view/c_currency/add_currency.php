<html>
<head>
	<title>Agregar_Divisa</title>
	<?php require('../../librerias.php'); ?>
</head>
<body>
		<h1>Divisas / Agregar Divisa /</h1>
        <form name='formInsert' id="formInsert" onSubmit="exe_add();" >
    	<table width="40%" style="margin-left: 20px;">
                <tr>
                  <td colspan="3">&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="3">
                      <input type="hidden" name="act" id="act" value="add">
                    </td>
                </tr>
                <tr>
                    <td>Abreviatura</td>
                    <td colspan="2">
                        <input name='txtCampo1' type='text' id='txtCampo1' size='50' required />
                    </td>
                </tr>
                <tr>
                    <td>Valor Moneda</td>
                    <td colspan="2">
                        <input name='txtCampo2' type='text' id='txtCampo2' size='50' required />
                    </td>
                </tr>
                <tr>
                    <td>Fecha</td>
                    <td colspan="2">
                        <input name='txtCampo3' type='date' id='txtCampo3' size='50' required />
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