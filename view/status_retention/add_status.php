<html>
<head>
	<title>Agregar_EstadoRetencion</title>
	<?php require('../../librerias.php'); ?>
</head>
<body>
	<h1>EstadosRetencion / Agregar EstadoRetencion /</h1>
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
                <td>Estado</td>
                <td colspan="2">
                    <input name='txtCampo1' type='text' id='txtCampo1' size='50' required />
                </td>
            </tr>
            <tr>
                <td>Abreviatura</td>
                <td colspan="2">
                    <input name='txtCampo2' type='text' id='txtCampo2' size='50' required />
                </td>
            </tr>
            <tr>
                <td>Agencia</td>
                <td colspan="2">
                <select name='txtCampo3' id='txtCampo3'>
                	<option value="#">Seleccione...</option>
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
                	<option value="SI">SI</option>
					<option value="NO">NO</option>
				</select>
                </td>
            </tr>
           <tr>
                <td>Detalles</td>
                <td colspan="2">
					<textarea name='txtCampo5' id='txtCampo5' cols="56" rows="6"
					placeholder="Detalles de la retencion." required ></textarea>
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