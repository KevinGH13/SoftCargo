<html>
<head>
	<title>Agregar_Novedad</title>
	<?php require('../../librerias.php'); ?>
    <?php require('ctrl_news.php'); ?>
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
                        <option value="0">SI</option>
                        <option value="1">NO</option>
                    </select>
                	</td>
           		</tr> 
                <tr>
                    <td>Tipo</td>
                    <td>
                        <select name="txtCampo5" id="txtCampo5">
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
                    	<input type="submit" value="Agregar" />
                        <input type="button" value="Cancelar" class="Btn" onClick="javascript:window.history.back();" />
                    </td>
                </tr>
    	</table>
        </form>
        
        <script language="javascript">function add_toast(tipo, mensaje){$().toastmessage(tipo, mensaje);}</script>
</body>
</html>