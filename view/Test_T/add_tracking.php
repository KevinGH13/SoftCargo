<html>
<head>
	<title>Agregar_Guia</title>
	<?php require('../../librerias.php'); ?>
    <?php require('ctrl_tracking.php'); ?>
    <script type="text/javascript" src="code_postal.js"></script>
    <script type="text/javascript" src="validate_city.js"></script>
   
</head>
<body>
	<h1> <div class="icon-paper-plane-empty"> Creación de Guías</h1>
	<form name='formInsert' id="formInsert" onSubmit="exe_add();" >
	  <br>
      <table border="0" align="center">
	    <tr>
	      <td>
              <select name='txtCampo0' id='txtCampo0'>
                <?php foreach($listInfo2=sel2("1=1") as $listAge): ?>
                	<option value="<?php echo $listAge[0]; ?>"><?php echo $listAge[1]; ?></option>
                <?php endforeach; ?>
              </select>
              <br><br>
          </td>
	      <td>&nbsp;</td>
	      <td>&nbsp;</td>
        </tr>
	    <tr>
	      <td><div><h4>REMITENTE</h4><table class="tablasFondo" width="40%">
	        <tr>
	          <td colspan="4"></td>
            </tr>
	        <tr>
	          <td colspan="4"><input type="hidden" name="act" id="act" value="add"></td>
            </tr>
	        <tr>
	          <td>Nombre</td>
	          <td colspan="3"><input name='txtCampo1' type='text' id='txtCampo1' size='50' required /></td>
            </tr>
	        <tr>
	          <td>Direccion</td>
	          <td colspan="2"><input name='txtCampo3'  style="width:100%;" type='text' id='txtCampo3' size='50' required /></td>
	          <td colspan="1"><input name='txtCampoBarrio'  style="width:100%;" type='text' id='txtCampoBarrio' size='50' placeholder="Barrio" required /></td>
            </tr>
	        <tr>
	          <td>Ciudad</td>
	          <td colspan="3"><input style='width:137px;' name='txtCampo4' type='text' id='txtCampo4' size='50' required placeholder="Ciudad"/>
              <input class="ID" style='width:137px;' name='txtCampo5' type='text' id='txtCampo5' size='50' required readonly placeholder="Departamento"/>
              <input class="ID" style='width:137px;' name='txtCampo6'  type='text' id='txtCampo6' size='50' required readonly placeholder="Pais"/></td>
            </tr>
	        <tr>
	          <td>Telefono</td>
	          <td><input style='width:210px;' name='txtCampo8' type='text' id='txtCampo8' size='50' required /></td>
	          <td align="right">CodZip</td>
	          <td align="right"><input style='width:130px;' name='txtCampo7' type='text' id='txtCampo7' size='50' required /></td>
            </tr>
	        <tr>
	          <td>E-Mail</td>
	          <td colspan="3"><input name='txtCampo10' type='text' id='txtCampo10' size='50' required /></td>
            </tr>
	        <tr>
	          <td colspan="4"></td>
            </tr>
	        <tr>
	          <td colspan="4" align="center"></td>
            </tr>
          </table></td>
	      <td>&nbsp;</td>
	      <td><div><h4>DESTINATARIO</h4><table class="tablasFondo" width="40%">
	        <tr>
	          <td colspan="4"></td>
            </tr>
	        <tr>
	          <td colspan="4"><input type="hidden" name="act2" id="act2" value="add"></td>
            </tr>
	        <tr>
	          <td>Nombre</td>
	          <td colspan="3"><input name='txtCampo2' type='text' id='txtCampo2' size='50' required /></td>
            </tr>
	        <tr>
	          <td>Direccion</td>
	          <td colspan="3"><input name='txtCampo2' type='text' id='txtCampo9' size='50' required /></td>
            </tr>
	        <tr>
	          <td>Ciudad</td>
	          <td colspan="3"><input style='width:137px;' name='txtCampo2' type='text' id='txtCampo11' size='50' required placeholder="Ciudad"/>
	            <input class="ID" style='width:137px;' name='txtCampo2' type='text' id='txtCampo12' size='50' required readonly placeholder="Departamento"/>
	            <input class="ID" style='width:137px;' name='txtCampo2' type='text' id='txtCampo13' size='50' required readonly placeholder="Pais"/></td>
            </tr>
	        <tr>
	          <td>Telefono</td>
	          <td><input style='width:210px;' name='txtCampo2' type='text' id='txtCampo14' size='50' required /></td>
	          <td align="right">CodZip</td>
	          <td align="right"><input style='width:130px;' name='txtCampo2' type='text' id='txtCampo15' size='50' required /></td>
            </tr>
	        <tr>
	          <td>E-Mail</td>
	          <td colspan="3"><input name='txtCampo2' type='text' id='txtCampo16' size='50' required /></td>
            </tr>
	        <tr>
	          <td colspan="4"></td>
            </tr>
	        <tr>
	          <td colspan="4" align="center"></td>
            </tr>
          </table></td>
        </tr>
	    <tr>
	      <td colspan="3">&nbsp;</td>
        </tr>
	    <tr>
	      <td colspan="3"><h4 class="Envio" style="text-align:center">INFORMACIÓN DEL ENVO</h4>
	        <table class="tablasFondo" width="60%" align="center">
	        <tr>
	          <td><table align="center" width="96%">
	            <tr>
	              <td>Servicio</td>
	              <td colspan="3"><select name='txtCampo16' id='txtCampo33' style="width:240px">
	                <?php foreach($listInfo3=sel3("1=1") as $listServ): ?>
	                <option value="<?php echo $listServ[0]; ?>"><?php echo $listServ[1]; ?></option>
	                <?php endforeach; ?>
	                </select></td>
	              <td colspan="2">&nbsp;</td>
                </tr>
	            <tr>
	              <td>Volumen</td>
	              <td><input name='txtCampo12' type='text' id='txtCampo21' size='50' required style="width:70px" placeholder="largo" />
x
  <input name='txtCampo14' type='text' id='txtCampo31' size='50' required style="width:70px" placeholder="alto" />
x
<input name='txtCampo15' type='text' id='txtCampo32' size='50' required style="width:70px" placeholder="ancho" /></td>
	              <td align="right">Peso</td>
	              <td colspan="3"><input name='txtCampo11' type='text' id='txtCampo17' size='50' required style="width:120px" /></td>
                </tr>
	            <tr>
	              <td>Descripción</td>
	              <td colspan="5"><input name='txtCampo17' type='text' required id='txtCampo23' style="width:442px" size='50' /></td>
                </tr>
	            <tr>
	              <td>Tarifa</td>
	              <td colspan="3"><input name='txtCampo9' type='text' id='txtCampo18' size='50' required style="width:100px" /></td>
	               <td>&nbsp;</td>
	               <td><strong>0.0</strong></td>
                </tr>
	            <tr>
	              <td>Val Declarado</td>
	              <td colspan="3"><input name='txtCampo13' type='text' id='txtCampo19' size='50' required style="width:100px" /></td>
	              <td>&nbsp;</td>
	              <td><strong>0.0</strong></td>
                </tr>
	            <tr>
	              <td>Val Seguro</td>
	              <td colspan="3"><input name='txtCampo18' type='text' id='txtCampo20' size='50' required style="width:100px" /></td>
	              <td>&nbsp;</td>
                  <td><strong>0.0</strong></td>
                </tr>
	            <tr>
	              <td>Ad Agencia</td>
	              <td colspan="3"><input name='txtCampo19' type='text' id='txtCampo22' size='50' required style="width:100px" /></td>
	              <td>&nbsp;</td>
	              <td><strong>0.0</strong></td>
                </tr>
	            <tr>
	              <td>Ad Empresa</td>
	              <td colspan="3"><input name='txtCampo20' type='text' id='txtCampo24' size='50' required style="width:100px" /></td>
	              <td>&nbsp;</td>
	              <td><strong>0.0</strong></td>
                </tr>
	            <tr>
	              <td>Descuentos</td>
	              <td colspan="3"><input name='txtCampo21' type='text' id='txtCampo25' size='50' required style="width:100px" /></td>
	              <td>&nbsp;</td>
	              <td><strong>0.0</strong></td>
                </tr>
	            <tr>
	              <td>Tipo Pago</td>
	              <td colspan="3">
                      <select name='txtCampo23' id='txtCampo27' style="width:190px">
                        <option value="1">EFECTIVO</option>
                        <option value="1">CHEQUE</option>
                        <option value="1">VISA</option>
                        <option value="1">MASTERCARD</option>
                        <option value="1">AMERICAN EXPRESS</option>
                      </select>
                  </td>
	              <td>Total</td>
	              <td>0.0</td>
                </tr>
	            <tr>
	              <td>&nbsp;</td>
	              <td colspan="3">&nbsp;</td>
	              <td colspan="2">&nbsp;</td>
                </tr>
              </table></td>
            </tr>
          </table></td>
        </tr>
      </table>
</form>
    <script language="javascript">function add_toast(tipo, mensaje){$().toastmessage(tipo, mensaje);}</script>
</body>
</html>