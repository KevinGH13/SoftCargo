<html>
<head>
	<title>Agregar_EstadoCarga</title>
	<?php require('../../librerias.php'); ?>
</head>
<body>
	<h1>EstadosCarga / Agregar EstadoCarga /</h1>
	<form name='formInsert' id="formInsert" method='post' onSubmit="exe_add()" >
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
                <td>EstadoCarga</td>
                <td colspan="2">
                    <input name='txtCampo1' type='text' id='txtCampo1' size='50' required />
                </td>
            </tr>
            <tr>
                <td>Es agente?</td>
                <td colspan="2">
                <select name='txtCampo3' id='txtCampo3'>
                	<option value="SI">SI</option>
					<option value="NO">NO</option>
				</select>
                </td>
            </tr>
            <tr>
                <td>Es servicio web?</td>
                <td colspan="2">
                <select name='txtCampo4' id='txtCampo4'>
                	<option value="SI">SI</option>
					<option value="NO">NO</option>
				</select>
                </td>
            </tr>
            <tr>
                <td>Recibe notificacion?</td>
                <td colspan="2">
                <select name='txtCampo6' id='txtCampo6'>
                	<option value="SI">SI</option>
					<option value="NO">NO</option>
				</select>
                </td>
            </tr>
            <tr>
                <td>Comentario</td>
                <td><textarea name="txtCampo7" id="txtCampo7" cols="30" rows="10" maxlength="255" placeholder="Ingresar un comentario de maximo 255 letras"></textarea></td>
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