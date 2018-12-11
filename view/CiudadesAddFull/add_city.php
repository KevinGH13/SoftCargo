<html>
<head>
	<title>Agregar_Ciudad</title>
	<?php require('../../librerias.php'); ?>
    <?php require('ctrl_city.php'); ?>
</head>
<body>
	<h1>Ciudades / Agregar Ciudad /</h1>
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
                <td>Ciudad</td>
                <td colspan="2">
                    <input name='txtCampo2' type='text' id='txtCampo2' size='50' required />
                </td>
            </tr>
                <td>Estado</td>
                <td colspan="2">
                    <input name='txtCampo4' type='text' id='txtCampo4' size='50' required />
                </td>
            </tr>
            <tr>
                <td>Pais</td>
                <td colspan="2">
               <select name="txtCampo5" id="txtCampo5">
                   <option value=""> Seleccione Pais </option>
                   <option value="" disabled>--------------</option>
                   <?php foreach ($list = selPais() as  $value): ?>
                            <option value="<?php echo $value[1] ?>"><?php echo $value[0] ?></option>
                   <?php endforeach ?>
               </select>
                </td>
            </tr>
            <tr>
                <td>Zona</td>
                <td colspan="2">
                    <input name='txtCampo6' type='text' id='txtCampo6' size='50'  />
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