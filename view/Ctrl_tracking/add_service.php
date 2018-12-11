<html>
<head>
	<title>Agregar_Servicio</title>
	<?php require('../../librerias.php'); ?>
</head>
<body>
	<h1>Servicios / Agregar Servicio /</h1>
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
                <td>Servicio</td>
                <td colspan="2">
                    <input name='txtCampo1' type='text' id='txtCampo1' size='50' required />
                </td>
            </tr>
            <tr>
                <td>Lunes</td>
                <td colspan="2">
                <select name='txtCampo2' id='txtCampo2'>
                	<option value="SI">SI</option>
					<option value="NO">NO</option>
				</select>
                </td>
            </tr>
            <tr>
                <td>Martes</td>
                <td colspan="2">
                <select name='txtCampo3' id='txtCampo3'>
                	<option value="SI">SI</option>
					<option value="NO">NO</option>
				</select>
                </td>
            </tr>
            <tr>
                <td>Miercoles</td>
                <td colspan="2">
                <select name='txtCampo4' id='txtCampo4'>
                	<option value="SI">SI</option>
					<option value="NO">NO</option>
				</select>
                </td>
            </tr>
            <tr>
                <td>Jueves</td>
                <td colspan="2">
                <select name='txtCampo5' id='txtCampo5'>
                	<option value="SI">SI</option>
					<option value="NO">NO</option>
				</select>
                </td>
            </tr>
             <tr>
                <td>Viernes</td>
                <td colspan="2">
                <select name='txtCampo6' id='txtCampo6'>
                	<option value="SI">SI</option>
					<option value="NO">NO</option>
				</select>
                </td>
            </tr>
             <tr>
                <td>Sabado</td>
                <td colspan="2">
                <select name='txtCampo7' id='txtCampo7'>
                	<option value="SI">SI</option>
					<option value="NO">NO</option>
				</select>
                </td>
            </tr>
             <tr>
                <td>Domingo</td>
                <td colspan="2">
                <select name='txtCampo8' id='txtCampo8'>
                	<option value="SI">SI</option>
					<option value="NO">NO</option>
				</select>
                </td>
            </tr>
            <tr>
                <td>Fecha Desde</td>
                <td colspan="2">
                    <input name='txtCampo9' type='date' id='txtCampo9' size='50' required />
                </td>
            </tr>
            <tr>
                <td>Fecha Hasta</td>
                <td colspan="2">
                    <input name='txtCampo10' type='date' id='txtCampo10' size='50' required />
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