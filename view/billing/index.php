<!DOCTYPE HTML>
<html >
<head>
	<title>Facturacion</title>
    <?php require('../../librerias.php'); ?>
    <?php require('ctrl_tracking.php'); ?>
 
</head>
<body>
<?php require('../menu.php'); ?>
   <h1>Facturacion</h1>
    <form   >
    <table width="40%">
            <tr>
              <td colspan="3">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="3">
                               
                </td>
            </tr>
            
            <tr>
                <td>Agente</td>
                <td >
                   
                <?php if ($tp_user == 1): ?>
               <select style = "width:180px;" name='txtCampo1' id="txtCampo1">
                    <option value="0">Elegir agente</option>
                    <?php foreach($listInfo2=sel2("1=1") as $listAge): ?>
                        <option value="<?php echo $listAge[0]; ?>"><?php echo $listAge[1]; ?></option>
                    <?php endforeach; ?>
              </select>
              <?php else : ?>
              <input  style = "width:180px;" type="text" name='txtCampo1' id="txtCampo1" value="<?php echo $int_IDagente ?>" hidden >   
              <h2>Agente <?php $Agente = sel2("int_ID = $int_IDagente"); echo $Agente[0][1]; ?></h2>
              <?php endif ?>
                
                </td>
            </tr>
           <tr>
                <td>Fecha Desde</td>
                <td colspan="2">
                    <input style = "width:180px;"name='txtCampo2' type='text' id='txtCampo2' size='50' required  /> <td>
                     Hora: </td><td><input  type="text" id="txtTime" value=""></td>
                </td>
            </tr>
            <tr>
                <td>Fecha Hasta</td>
                <td colspan="2">
                    <input style = "width:180px;"name='txtCampo3' type='text' id='txtCampo3' size='50' required  /><td>
                      Hora:</td><td><input  type="text" id="txtTime2" value=""></td>
                </td>
            </tr>
            <tr>
               
                <td colspan="2">
                   <span id="resultado"></span>
                </td>
            </tr>
            <tr>
              <td colspan="3"></td>
            </tr>
            <tr>
                <td colspan="3" align="center">
                    <input type="button" class="Btn"value="Consultar" onclick= "exe_con()" />
                  
                </td>
            </tr>
    </table>
    </form>
   <script language="javascript">
        $().toastmessage('showToast', { text: 'Seleccione un rango de fecha, o fecha y hora', sticky: true, type: 'warning' });</script>
    <script languaje="javascript">nav();</script>
	<script languaje="javascript">dataView();</script>
    <script language="javascript">function del_toast(tipo, mensaje){$().toastmessage(tipo, mensaje);}</script>
    <script type="text/javascript" src="1.2.2/ng_all.js"></script>
    <script type="text/javascript" src="1.2.2/ng_ui.js"></script>
    <script type="text/javascript" src="1.2.2/components/timepicker.js"></script>
    <script language="javascript"  src="timejs.js"></script>
</body>
</html>
