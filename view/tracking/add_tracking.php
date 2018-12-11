<html>
<head>
	<title>Agregar Factura</title>
	<?php require('../../librerias.php'); ?>
    <?php require('ctrl_tracking.php'); ?>
    <link rel="stylesheet" type="text/css" href="windowstyle.css">
    <script src = "validate_city.js"></script>
</head>
<body>
<?php require('../menu.php'); ?>

	<h1> <div class="icon-paper-plane-empty"> Creación de Factura</h1>
	<form name='formInsert' id="formInsert"  >
  	<?php include('alert_window.php'); ?>
	  <br>
      <table border="0" align="center">
	    <tr>
	      <td colspan="4">
	      	  <?php if ($tp_user == 1): ?>
	      	  <?php $query_S = "1=1" ?>
	      	   <select name='txtCampo0' id="txtCampo0">
              		<option value="0">Elegir agente</option>
                	<?php foreach($listInfo2=sel2("1=1") as $listAge): ?>
                		<option value="<?php echo $listAge[0]; ?>"><?php echo $listAge[1]; ?></option>
                	<?php endforeach; ?>
              </select>
               <div style="float: right;"> Rastreo Alterno :  <input type="text" name="txtCampo30" style="width: 50%" id="txtCampo30"></div>
          	  <?php else : ?>
          	  <?php $query_S = "int_IDAgente = $int_IDagente" ?>
	      	  <input type="text" name='txtCampo0' id="txtCampo0" value="<?php echo $int_IDagente ?>" hidden >
			  <h2>Agente <?php $Agente = sel2("int_ID = $int_IDagente"); echo $Agente[0][1]; ?></h2>
			  <div style="float: right;"> <h3>Codigo Tracking : </h3> <input type="text" name="txtCampo30" style="width: 50%" id="txtCampo30"></div>
	      	  <?php endif ?>

              <br><br>
          </td>

	      <td>&nbsp;</td>
	      <td>&nbsp;</td>
        </tr>
        <tr>
        	<td><input style="margin-left: 147px;
    				margin-top: -13px;" type="button" value="Buscar" class="search-btn"   /></td>
        </tr>
	    <tr>

	    <!--                         REMITENTE                                        -->
	      <td><div><h4>REMITENTE</h4>  <table class="tablasFondo" width="40%">
	        <tr>
	          <td colspan="4"></td>
            </tr>
	        <tr>
	          <!--<td colspan="4"><input type="hidden" name="act" id="act" value="add" place></td>-->
            </tr>
	        <tr>
	        	<td align="right"><p>Telefono</p></td>
	          <td align="right"><input style='width:130px;' name='txtCampo8' type='text' min="0"  id="txtCampo8"  size='50'  required /></td>
	          <td>Nombre</td>
	          <td><input style='width:210px;' name='txtCampo1' type='text' id="txtCampo1" size='50'  required /></td>


            </tr>



           	<tr>
	          <td>Direccion</td>
	          <td colspan="3"><input name='txtCampo3' type='text' id="txtCampo3"  required /></td>
            </tr>
            	        <tr>
	        <td>Pais </td>
	          <td colspan="3">
	        	<input class="ID" style='width:137px;' name='txtCampo6' type='text' id="txtCampo6" size='50' placeholder="Pais" hidden required readonly />
			  <select name='CampoPais' style="width: 137px;" id="CampoPais"  >
			  <option value="">Seleccione Pais</option>
              	<option value="" disabled>------------</option>
              	<?php foreach ($list = sel8("1=1") as  $value): ?>
              		<option value="<?php echo $value[1] ?>"><?php echo $value[0] ?></option>
              	<?php endforeach ?>
              </select>
              <input style='width:137px;' name='txtCampo4' type='text' id="txtCampo4" size='50' placeholder="Ciudad" required />
              <input class="ID" style='width:137px;' name='txtCampo5' type='text' id="txtCampo5" size='50' placeholder="Estado" required  />

	         </td>


            </tr>
             <tr>
	        	 <td>Codigo Postal</td>
	          <td colspan="3"><input  style='width:137px;' name='txtCampo7' type='text' id="txtCampo7" size='50' required /></td>


            </tr>
	        <tr>
	          <td>E-Mail</td>
	          <td colspan="3"><input name='txtCampo10' type='email' id="txtCampo10" size='50'   /></td>
            </tr>
	        <tr>
	          <td colspan="4"></td>
            </tr>
	        <tr>
	          <td colspan="4" align="center"></td>
            </tr>
          </table></td>
	      <td>&nbsp;</td>

	      <!--  DESTINATARIO                                                              -->
	      <td><div><h4>DESTINATARIO</h4><table class="tablasFondo" width="40%">
	        <tr>
	          <td colspan="4"></td>
            </tr>
	        <tr>
	        </tr>
	        <tr>
	          <td>Nombre</td>
	          <td colspan="3"><input name='txtCampo2' type='text' id='txtCampo2' autocomplete="off"  required /></td>
            </tr>
	        <tr>
	          <td>Direccion</td>
	          <td colspan="3"><input name='txtCampo9' type='text' id='txtCampo9'   required /></td>
            </tr>
	        <tr>
	          <td>Pais</td>
	          <td colspan="3">
	          <input class="ID" style='width:137px;' name='txtCampo13' type='text' id='txtCampo13' hidden placeholder="Pais" onchange="pais(this.value);alert(this.value);" size='50' required readonly />
            	<select name='CampoPais2' style="width: 137px;" id="CampoPais2"  >
            	<option value="">Seleccione Pais</option>
              	<option value="" disabled>------------</option>
              	<?php foreach ($list = sel8("1=1") as  $value): ?>
              		<option value="<?php echo $value[1] ?>"><?php echo $value[0] ?></option>
              	<?php endforeach ?>
              </select>
               	<input style='width:137px;' name='txtCampo11' type='text' id='txtCampo11' placeholder="Ciudad" autocomplete="off" size='50' required />
              <input class="ID" style='width:137px;' name='txtCampo12' type='text' id='txtCampo12' size='50' placeholder="Estado" required readonly />

              </td>



            </tr>
	        <tr>
	          <td>Telefono</td>
	          <td><input style='width:210px;' name='txtCampo14' type='text' id='txtCampo14' size='50'  required /></td>
	          <td align="right">Codigo Postal</td>
	          <td align="right"><input style='width:130px;' name='txtCampo15' type='text' min="0"  id='txtCampo15'   /></td>
            </tr>
	        <tr>
	          <td>E-Mail</td>
	          <td colspan="3"><input name='txtCampo16' type='email' id='txtCampo16' size='50'  /></td>
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



	      <td colspan="3"><h4 class="Envio" style="text-align:center">INFORMACIÓN DEL ENVÍO</h4>
	        <table class="tablasFondo" width="65%" align="center">
	        <tr>
	          <td><table align="center" width="96%">
	            <tr>
	              <td>Servicio</td>

	              <td colspan="3"><select name='txtCampo33' id='txtCampo33' style="width:240px" placeholder="Service" >
	               <option value="0">Elegir</option>
	                <?php foreach($listInfo3=sel3("$query_S") as $listServ): ?>
	                <option value="<?php echo $listServ[1]; ?>"><?php echo $listServ[0]; ?></option>
	                <?php endforeach; ?>
	                </select></td>
	              <td colspan="2">&nbsp;</td>
                </tr>
	            <tr>
	              <td>Volumen</td>
	              <td style="display: flex;"><input name='txtCampo21' type='text' min="0"  pattern="[0-9]+([\.,][0-9]+)?" step="0.01"  id='txtCampo21' size='50'  style="width:70px" placeholder="largo" />
					x
 					 <input name='txtCampo31' type='text' min="0"  pattern="[0-9]+([\.,][0-9]+)?" step="0.01" id='txtCampo31' size='50'  style="width:70px" placeholder="alto" />
					x
					<input name='txtCampo32' type='text' min="0"  pattern="[0-9]+([\.,][0-9]+)?" step="0.01" id='txtCampo32' size='50'  style="width:70px" placeholder="ancho"/>
					<p id="peso" style="margin-top: 0px !important;"></p></td>
	              <td align="right">Peso</td>
	              <td colspan="3"><input name='txtCampo17' type='text' min="0"  pattern="[0-9]+([\.,][0-9]+)?" step="0.01"  id='txtCampo17' size='50'  style="width:120px"/></td>
                </tr>
	            <tr>
	              <td>Descripción</td>
	              <td colspan="5"><input name='txtCampo23' type='text' required id='txtCampo23' style="width:442px" size='50' /></td>
                </tr>
	            <tr>
	              <td>Tarifa</td>
	              <td colspan="3"><input name='txtCampo18' type='text' min="0"   pattern="[0-9]+([\.,][0-9]+)?" step="0.01" id='txtCampo18' size='50'  required style="width:100px" /></td>
	               <td>&nbsp;</td>
	               <td><strong name='txtTarifa' id="txtTarifa">0.0</strong></td>
                </tr>
	            <tr>
	              <td>Val Declarado</td>
	              <td colspan="3">
	              <input name='txtCampo19' type='text' min="0"  pattern="[0-9]+([\.,][0-9]+)?" step="0.01" id='txtCampo19'
	               size='50' required style="width:100px" />
	              </td>
	              <td>&nbsp;</td>
	              <td><strong name='txtDeclarado' id="txtDeclarado">0.0</strong></td>
                </tr>
	            <tr>
	              <td>Val Seguro</td>
	              <td colspan="3"><input name='txtCampo20' type='text' min="0"  pattern="[0-9]+([\.,][0-9]+)?" step="0.01" id='txtCampo20'  size='50' required style="width:100px" /></td>
	              <td>&nbsp;</td>
                  <td><strong name='txtSeguro' id='txtSeguro'>0.0</strong></td>
                </tr>
	            <tr>
	              <td>Ad Agente</td>
	              <td colspan="3"><input name='txtCampo22' type='text' min="0"  pattern="[0-9]+([\.,][0-9]+)?" step="0.01" id='txtCampo22' size='50' style="width:100px" onchange="concAg(this.value);"/><input type="text" id="conceptoAgente" placeholder="Concepto" style="width:130px;visibility:hidden;"  ></td>
	              <td>&nbsp;</td>
	              <td><strong name='txtAdAgencia' id="txtAdAgencia">0.0</strong></td>
                </tr>
	            <tr>
	              <td>Ad Empresa</td>
	              <td colspan="3"><input name='txtCampo24' type='text' min="0"  pattern="[0-9]+([\.,][0-9]+)?" step="0.01"  id='txtCampo24' size='50'  style="width:100px" onchange="concEm(this.value);"/><input type="text" id="conceptoEmpresa" placeholder="Concepto" style="width:130px;visibility:hidden;" ></td>
	              <td>&nbsp;</p></td>
	              <td><strong name='txtAdEmpresa' id="txtAdEmpresa">0.0</strong></td>
                </tr>
                <tr>
                	<td>Convenio de Carga </td>
                	<td>&nbsp;</td>
                	<td>&nbsp;</td>
                	<td>&nbsp;</td>
                	<td>&nbsp;</td>
                	<td><strong id='Convenio'>0.0</strong></td>
                </tr>
	            <tr>
	              <td>Descuentos</td>
	              <td colspan="3"><input name='txtCampo25' type='text' min="0"  pattern="[0-9]+([\.,][0-9]+)?" step="0.01" id='txtCampo25' size='50'   place style="width:100px"  /></td>
	              <td>&nbsp;</td>
	              <td><strong name='txtDescuento' id="txtDescuento">0.0</strong></td>
                </tr>
	            <tr>
	              <td>Tipo Pago</td>
	              <td colspan="3">
                      <select name='txtCampo27' id='txtCampo27' style="width:190px">
                        <option value="EFECTIVO">EFECTIVO</option>
                        <option value="CHEQUE">CHEQUE</option>
                        <option value="VISA">VISA</option>
                        <option value="MASTERCARD">MASTERCARD</option>
                        <option value="AMERICAN EXPRESS">AMERICAN EXPRESS</option>
                      </select>
                  </td>
	              <td>Total</td>
	              <td><strong name='txtTotal' id = "txtTotal">0.0</strong></td>

                </tr>
                <tr>
                <td colspan=""></td>
                	<td> <input type="submit"  value="Aceptar"  id="btnAcep" class="Btn" /></td>
	            	<td><input type="button" value="Calcular" class="Btn"    onclick="calcularFAC(0);"/></td>
                <td><input type="button" value="Comentario" class="add" style="margin-right: 0px; margin-top: 0px;"   onclick="openVentana();"/></td>
                </tr>
	            <tr>
	              <td>&nbsp;</td>
	              <td colspan="3">&nbsp;</td>
	              <td colspan="2">&nbsp;</td>
                </tr>
                <tr>

                </tr>

              </table></td>
            </tr>

          </table></td>
        </tr>
      </table>
</form>
 <script languaje="javascript">nav();</script>
    <script languaje="javascript">dataView();</script>
    <script language="javascript">function add_toast(tipo, mensaje){$().toastmessage(tipo, mensaje);}</script>
</body>
	<script type="text/javascript">
		$('form')[0].reset();

    function openVentana(){
      $(".ventana").slideDown(1000);

    }
    function closeVentana(){
      $(".ventana").slideUp("fast");
    }
  </script>
</html>
