<html>
<head>
	<title>Agregar_Transportador</title>
	<?php require('../../librerias.php'); ?>
    <?php require('ctrl_transporter.php'); ?>
</head>
<body>
<?php require('../menu.php'); ?>
	<h1>Transportadores / Agregar Transportador /</h1>
	<form name='formInsert' id="formInsert"  method="post" >
	<table width="40%">
            <tr>
              <td colspan="3">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="3">
                
                  <input type="hidden" name="act" id="act" value="add">
                  <?php foreach($listInfo=sel2("int_ID=".$intID) as $listData): ?>
                  <input name='txtCampo0' type='text' id='txtCampo0' value='<?php echo $listData[0]; ?>'size='50' hidden />
                  <?php endforeach;  ?>
                </td>
            </tr>
            <tr>
                <td>Transpsortador</td>
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
                <td>Zip</td>
                <td colspan="2">
                    <input name='txtCampo6' type='text' id='txtCampo6' size='50' required />
                </td>
            </tr>
            <tr>
                <td>Contacto</td>
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
                <td>Email</td>
                <td colspan="2">
                    <input name='txtCampo9' type='text' id='txtCampo9' size='50' required />
                </td>
            </tr>
            
            <tr>
              <td colspan="3"></td>
            </tr>
            <tr>
            	<td colspan="3" align="center">
                	<input type="button" id="btn_enviar" class="Btn" value="Crear Transportador"  style="width:200px;"/>
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