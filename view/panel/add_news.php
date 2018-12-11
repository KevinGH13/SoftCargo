<html>
<head>
	<title>Agregar_Novedad</title>
	<?php require('../../librerias.php'); ?>
</head>
<body>
		<h1>Novedades / Agregar Novedad /</h1>
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
                    <td>Título</td>
                    <td colspan="2">
                        <input name='txtCampo1' type='text' id='txtCampo1' size='50' required />
                    </td>
                </tr>
                <tr>
                    <td>Novedad</td>
                    <td colspan="2">
                        <textarea name='txtCampo2' id='txtCampo2' cols="56" rows="6" maxlength="255"
						placeholder="Por favor describa la novedad en max 255 caracteres." required ></textarea>
                    </td>
                </tr>
                <tr>
                	<td>Agencias</td>
                	<td colspan="2">
                    <select name='txtCampo3' id='txtCampo3'>
                        <option value="1">TODAS</option>
                        <option value="2">Agencia1</option>
                        <option value="3">Agencia2</option>
                        <option value="4">Agencia3</option>
                    </select>
                	</td>
           		</tr> 
                <tr>
                	<td>Publicada</td>
                	<td colspan="2">
                    <select name='txtCampo4' id='txtCampo4'>
                        <option value="SI">SI</option>
                        <option value="NO">NO</option>
                    </select>
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