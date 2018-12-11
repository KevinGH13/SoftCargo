<!DOCTYPE HTML>
<html >
<head>
	<title>Reportes Generales</title>
    <?php require('../../librerias.php'); ?>
    <?php require('ctrl_report.php'); ?>
 
</head>
<body onload="date()">
<?php require('../menu.php'); ?>
   <h1>Reportes Generales</h1>
    <form   >

    <table width="50%" class="tablasFondo">
            <tr>
              <td colspan="3">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="3">
                               
                </td>
            </tr>
            <tr>
                <td><strong>Agente</strong></td>
                <td >
                   
                <?php if ($tp_user == 1): ?>
               <select style = "width:150px;" name='txtCampo0' id="txtCampo0">
                    <option value="0">Elegir agente</option>
                    <?php foreach($listInfo2=selagent("1=1") as $listAge): ?>
                        <option value="<?php echo $listAge[0]; ?>"><?php echo $listAge[1]; ?></option>
                    <?php endforeach; ?>
              </select>
              <?php else : ?>
              <input  style = "width:150px;" type="text" name='txtCampo0' id="txtCampo0" value="<?php echo $int_IDagente ?>" hidden >   
              <h2>Agente <?php $Agente = selagent("int_ID = $int_IDagente"); echo $Agente[0][1]; ?></h2>
              <?php endif ?>
                
                </td>
            </tr>
            <tr>
                <td><strong>Pais</strong></td>
                <td >
                   
                
               <select style = "width:150px;" name='txtCampo1' id="txtCampo1">
                    <option value="0">Elegir Pais</option>
                    <?php foreach($listInfo2=seliata("1=1") as $listAge): ?>
                        <option value="<?php echo $listAge[1]; ?>"><?php echo $listAge[0]; ?></option>
                    <?php endforeach; ?>
              </select>

                
                </td>
            </tr>
           <tr>
                <td><strong>Fecha Desde</strong></td>
                <td colspan="2">
                    <input style = "width:136px;"name='txtCampo2' type='text' id='txtCampo2' size='50' required  /> <td>
                    
                </td>
            </tr>
            <tr>
                <td><strong>Fecha Hasta</strong></td>
                <td colspan="2">
                    <input style = "width:136px;"name='txtCampo3' type='text' id='txtCampo3' size='50' required  /><td>
                      
                </td>
            </tr>
            <tr>
               
                <td colspan="2">
                   <span id="resultado"></span>
                </td>
            </tr>
                        <tr>
            	<td><hr size="2px" color="#607D8B" width="100%" /></td>
            	<td><hr size="2px" color="#607D8B" width="100%" /></td>
            	<td><hr size="2px" color="#607D8B" width="100%" /></td>
            </tr>
            <tr>
              <td colspan="3"></td>
            </tr>
            <tr>
                <td >
                    <p><strong>Cierre de Caja</strong></p>
                </td>
                <td>
                     <input type="button" class="Btn" value="Abrir" onclick= "exe_rpc(0)" style=" width:143px; " />
                    
                </td>
                <td>
                   
                    <a onclick= "exe_xlsrpc()" ><span class="icon-download"></span>Descargar</a>
                </td>
            </tr>
            

            	<tr>
                <td>
                   <p><strong>Factura pagas</strong></p> 
                </td>
                <td>
                      <input type="button" class="Btn" value="Abrir" onclick= "exe_pay(0)" style=" width:143px; " />
                </td>
                <td>
                   
                    <a onclick= "exe_payxls(0)" ><span class="icon-download"></span>Descargar</a>
                </td>
            </tr>
            <tr>
                <td>
                   <p><strong>Pago de Factura por agente</strong></p> 
                </td>
                <td>
                      <input type="button" class="Btn" value="Abrir" onclick= "exe_agn()" style=" width:143px; " />
                </td>
                <td>
                   
                    <a onclick= "exe_xlsagn()" ><span class="icon-download"></span>Descargar</a>
                </td>
            </tr>
            <tr>
                <td>
                   <p><strong>Factura COD Pendientes</strong></p> 
                </td>
                <td>
                      <input type="button" class="Btn" value="abrir" onclick= "exe_rpc(1)" style=" width:143px; " />
                </td>
                <td>
                   
                   
                </td>
            </tr>
                        <tr>
                <td>
                   <p><strong>Factura COD pagas</strong></p> 
                </td>
                <td>
                      <input type="button" class="Btn" value="abrir" onclick= "exe_pay(1)" style=" width:143px; " />
                </td>
                <td>
                   
                    <a onclick= "exe_payxls(1)" ><span class="icon-download"></span>Descargar</a>
                </td>
                <td>
                   
                   
                </td>
            </tr>
    </table>

    </form>
   <script language="javascript">
        $().toastmessage('showToast', { text: 'testiando', sticky: true, type: 'warning' });</script>
    <script languaje="javascript">nav();</script>
	<script languaje="javascript">dataView();</script>
    <script language="javascript">function del_toast(tipo, mensaje){$().toastmessage(tipo, mensaje);}</script>

</body>
</html>
