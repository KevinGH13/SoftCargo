<html>
<head>
	<title>Crear  Awb</title>
	<?php require('../../librerias.php'); ?>
   
</head>
<body>
	<h1>Consolidado / Crear Consolidado /</h1>
	<form name='formInsert' id="formInsert" method='post' onSubmit="exe_add(<? echo $intID ?>)" >
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
             <td>Tipo </td>
                <td colspan="2">
                   <select style="width:200px">
                    <option value="1">MASTER AWB</option>
                    <option value="2">house awb</option>
                    
                  </select> 
                </td>
               
            </tr>
            <tr>
                <td>Awb-Reservacion </td>
                <td colspan="2">
                       <input  name='txtCampo6' type='text' id='txtCampo6' size='50' placeholder="Ingrese Destinatario..."  required />
                </td>
                <td colspan="3">&nbsp; </td>
                <td>Awb-Reservacion </td>
                <td colspan="2">
                       <input  name='txtCampo6' type='text' id='txtCampo6' size='50' placeholder="Ingrese Destinatario..."  required />
                </td>
            </tr>
            <tr>
                
                <td colspan="2">
                       <h2>Remitente</h2>
                </td>
                <td colspan="2"><h2>Remitente</h2> </td>
                
            </tr>
    
            <tr>
              <td colspan="3"></td>
            </tr>
            <tr>
            	<td colspan="3" align="center">
                	<input type="submit" value="Crear con" />
                    <input type="button" value="Cancelar" class="Btn" onClick="javascript:window.history.back();" />
                </td>
            </tr>
	</table>
    </form>
    <script language="javascript">function add_toast(tipo, mensaje){$().toastmessage(tipo, mensaje);}</script>
</body>
</html>