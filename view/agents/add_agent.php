<html>
<head>
	<title>Agregar_Agente</title>
	<?php require('../../librerias.php'); ?>
    <?php require('ctrl_agent.php'); ?>
    <script src = "validate_city.js"></script>
</head>
<body>
<?php require('../menu.php'); ?>
	<h1>Agentes / Agregar Agente/</h1>
	<form name='formInsert' id="formInsert" onSubmit="exe_add();" >
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
                <td>Agente</td>
                <td colspan="2">
                    <input name='txtCampo1' type='text' id='txtCampo1' size='50' required  />
                </td>
            </tr>
            <tr>

              <td>Empresa</td>
              <td colspan="2">
              <select name='txtCampo2' required  id='txtCampo2' > 
                <option value=""> </option>
                 <?php foreach($listInfo2=sel2("1=1") as $listEmpresas): ?>
                    <option value="<?php echo $listEmpresas[0] ?>"><?php echo $listEmpresas[1] ?></option>
                <?php endforeach ;?>
              </select> 
              </td>
            </tr>
            <tr>
                <td>Direccion</td>
                <td colspan="2">
                    <input name='txtCampo3' type='text' id='txtCampo3' size='50' required />
                </td>
            </tr>
            <tr>
                <td>Ciudad</td>
                <td colspan="2">
                    <input name='txtCampo4' type='text' id='txtCampo4' size='50' required />
                </td>
            </tr>
            <tr>
                <td>Estado</td>
                <td colspan="2">
                    <input name='txtCampo5' type='text' id='txtCampo5' size='50' required />
                </td>
            </tr>
            <tr>
                <td>Pais</td>
                <td colspan="2">
                    <input name='txtCampo6' type='text' id='txtCampo6' size='50' required />
                </td>
            </tr>
            <tr>
                <td>ZipCode</td>
                <td colspan="2">
                    <input name='txtCampo7' type='text' id='txtCampo7' size='50' required />
                </td>
            </tr>
            <tr>
                <td>Telefono</td>
                <td colspan="2">
                    <input name='txtCampo8' type='text' id='txtCampo8' size='50' required />
                </td>
            </tr>
            <tr>
                <td>Fax</td>
                <td colspan="2">
                    <input name='txtCampo9' type='text' id='txtCampo9' size='50'  />
                </td>
            </tr>
            <tr>
                <td>eMail</td>
                <td colspan="2">
                    <input name='txtCampo10' type='text' id='txtCampo10' size='50' required />
                </td>
            </tr>
          
            <tr>
                <td>Tipo Agente</td>
                <td colspan="2">
                    <select name="txtCampo12" id="txtCampo12">
                    	<option value="1">Carga</option>
                    	<option value="2">Aduana</option>
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
        <script languaje="javascript">nav();</script>
    <script languaje="javascript">dataView();</script>
    <script language="javascript">function add_toast(tipo, mensaje){$().toastmessage(tipo, mensaje);}</script>
</body>
</html>