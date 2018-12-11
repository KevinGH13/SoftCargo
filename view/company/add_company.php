<html>
<head>
	<title>Agregar_Empresa</title>
	<?php require('../../librerias.php'); ?>
</head>
<body>
	<h1>Empresa / Agregar Empresa /</h1>
	<form name='formInsert' id="formInsert" method='post' onSubmit="exe_add()" >
	<table width="40%">
            <tr>
              <td colspan="3">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="3">
                  <input type="hidden" name="act" id="act" value="add">                </td>
            </tr>
            <tr>
                <td>Empresa</td>
                <td colspan="2">
                    <input name='txtCampo1' type='text' id='txtCampo1' size='50' required />
                </td>
            </tr>
            <tr>
                <td>Direccion</td>
                <td colspan="2">
                    <input name='txtCampo2' type='text' id='txtCampo2' size='50' required />
                </td>
            </tr>
            <tr>
                <td>Ciudad</td>
                <td colspan="2">
                    <input name='txtCampo3' type='text' id='txtCampo3' size='50' required />
                </td>
            </tr>
            <tr>
                <td>Estado</td>
                <td colspan="2">
                    <input name='txtCampo4' type='text' id='txtCampo4' size='50' required />
                </td>
            </tr>
            <tr>
                <td>Pais</td>
                <td colspan="2">
                    <input name='txtCampo5' type='text' id='txtCampo5' size='50' required />
                </td>
            </tr>
            <tr>
                <td>ZipCode</td>
                <td colspan="2">
                    <input name='txtCampo6' type='text' id='txtCampo6' size='50' />
                </td>
            </tr>
            <tr>
                <td>Telefono</td>
                <td colspan="2">
                    <input name='txtCampo7' type='text' id='txtCampo7' size='50' required />
                </td>
            </tr>
            <tr>
                <td>Fax</td>
                <td colspan="2">
                    <input name='txtCampo8' type='text' id='txtCampo8' size='50' required />
                </td>
            </tr>
            <tr>
                <td>Email</td>
                <td colspan="2">
                    <input name='txtCampo9' type='text' id='txtCampo9' size='50' required />
                </td>
            </tr>
            <tr>
                <td>Terminos</td>
                <td colspan="2">
					<textarea name='txtCampo10' id='txtCampo10' cols="56" rows="6"
					placeholder="Los terminos se imprimen en cada envio." required ></textarea>
                </td>
            </tr>
            <tr>
                <td>Consecutivo</td>
                <td colspan="2">
                    <input name='txtCampo11' type='text' id='txtCampo11' size='50' />
                </td>
            </tr>
            <tr>
                <td>Guia Aerea</td>
                <td colspan="2">
                	<input name='txtCampo12' type='text' id='txtCampo12' size='50' />
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