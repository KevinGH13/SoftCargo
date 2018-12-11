<html>
<head>
	<title>Agregar_Consolidado</title>
	<?php require('../../librerias.php'); ?>
    <?php require('ctrl_con.php'); ?>
</head>
<body>
<?php require('../menu.php'); $contru;?>

<?php foreach($listInfo=seluser("1=1 AND int_ID=".$int_ID) as $listSu): $contru=$listSu[1];  endforeach; ?>
	<h1>Consolidado / Crear Consolidado /</h1>
	<form name='formInsert' id="formInsert"  >
	<table width="40%">
            <tr>
              <td colspan="3">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="3">
                    
                </td>
            </tr>
            <tr>
                <td>Empresa</td>
                <td colspan="2">
                         <select name='txtCampo1' id='txtCampo1' style="width:240px">
                      <?php foreach($listInfo3=sel3("1=1 AND int_ID=".$contru) as $listServ): ?>
                      <option value="<?php echo $listServ[0]; ?>"><?php echo $listServ[1]; ?></option>
                      <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Transportadora</td>
                <td colspan="2">
                  <select name='txtCampo2' id='txtCampo2' style="width:240px">
                      <?php foreach($listInfo2=sel2("1=1 AND int_ID_Empresa=".$contru) as $listServ): ?>
                      <option value="<?php echo $listServ[1]; ?>"><?php echo $listServ[1]; ?></option>
                      <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Empresa  Destino</td>
                <td colspan="2">
               <select name='txtCampo3' id='txtCampo3' style="width:240px">
                      <?php foreach($listInfo3=sel3("1=1") as $listServ): ?>
                      <option value="<?php echo $listServ[0]; ?>"><?php echo $listServ[1]; ?></option>
                      <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Pais</td>
                <td colspan="2">
                <select name='txtCampo4' id='txtCampo4' style="width:240px">
                	<?php foreach($listInfo4=sel4("1=1") as $listServ): ?>
                      <option value="<?php echo $listServ[1]; ?>"><?php echo $listServ[0]; ?></option>
                      <?php endforeach; ?>
				</select>
                </td>
            </tr>
            <tr>
                <td>Servicios</td>
                <td colspan="2">
                <input type="button" style="width: 235px;" class="Btn" value="Seleccionar Servicio" onclick="$('#modalServicio').dialog('open')"> 
               <!-- <select name='txtCampo5' id='txtCampo5' style="width:240px">
                    <?php foreach($listInfo5=sel5("1=1") as $listServ): ?>
                      <option value="<?php echo $listServ[0]; ?>"><?php echo $listServ[1]; ?></option>
                      <?php endforeach; ?>
                </select> -->
                <input type="text" hidden id="txtCampo5" name='txtCampo5' value="0"> 
                </td>
				</select>
                </td>
            </tr>
             <tr>
                <td>Destinatarios duplicados</td>
                <td colspan="2">
               <input  name='txtCampo6' type='text' id='txtCampo6' size='50' placeholder="Ingrese Destinatario..."  required />
				</select>
                </td>
            </tr>
             <tr>
                <td>Maximo Peso / Destinatario</td>
                <td colspan="2">
              
                	 <input name='txtCampo7' type='text' id='txtCampo7' size='50' placeholder="Ingrese Peso Max Destinatario...." required />
				</select>
                </td>
            </tr>
             <tr>
                <td>Max Declarado x  Destinatario</td>
                <td colspan="2">
                <input name='txtCampo8' type='text' id='txtCampo8' size='50' placeholder="Ingrese Max declarado " required />
				</select>
                </td>
            </tr>
           
            <tr>
              <td colspan="3"></td>
            </tr>
            <tr>
            	<td colspan="3" align="center">
                	<input type="button" class="Btn" value="Crear con" onclick="exe_add(<? echo $intID ?>);" />
                    <input type="button" value="Cancelar" class="Btn" onClick="javascript:window.history.back();" />
                </td>
            </tr>
	</table>
    </form>
    <script languaje="javascript">nav();</script>
    <script languaje="javascript">dataView();</script>
    <script language="javascript">function add_toast(tipo, mensaje){$().toastmessage(tipo, mensaje);}</script>
    <div title="Seleccionar Servicio" id="modalServicio">
        <table id="tableServicio" class="display">
            <thead>
            <th>Id</th>
            <th>Servicio</th>
            </thead>
            <tbody>
              <?php foreach ($listServicio= sel5("1=1") as  $value): ?>
                  <tr>
                    <td><?php echo $value[0] ?></td>
                    <td><?php echo $value[1] ?></td>
                  </tr>
              <?php endforeach ?>
            </tbody>
        </table>
    </div>
</body>
</html>