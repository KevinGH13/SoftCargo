<html>
<head>
	<title>Agregar_Tarifa </title>
	<?php require('../../librerias.php'); ?>
    <?php require('ctrl_rate.php'); ?>
    <?php $intID_Agente = $_REQUEST['id_Age']; ?>
    
    <script>agente = <?php echo $intID_Agente; ?>;</script>
</head>
<body>
	<h1>Crear Tarifa / <?php foreach($listInfo=sel7($intID_Agente) as $listData2): echo $listData2[0]; endforeach?></h1>
	<form name='formInsert' id="formInsert"  onSubmit="exe_add('',<? echo $intID_Agente ?>);" >
	<table width="40%" align="center">
            <tr>
              <td colspan="3">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="3">
                  <input type="hidden" name="act" id="act" value="add">
                </td>
            </tr>
            <tr>
                
                <td colspan="2">
                    <input class="ID" name='txtCampo1' type='text' id='txtCampo1' size='50' value="<?php echo $intID_Agente?>" hidden />
                </td>
            </tr>
            <tr>
                <td>Servicio</td>
                <td colspan="2">
                    <select name='txtCampo2' id='txtCampo2' style="width:240px" onchange="servicio = this.value; ">
                    <option value="" >Seleccione Servicio</option>
                    <option value="" disabled>-----------</option>
                      <?php foreach($listInfo2=sel2("1=1") as $listServ): ?>
                      <option value="<?php echo $listServ[0]; ?>"><?php echo $listServ[1]; ?></option>
                      <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Pais</td>
                <td colspan="2">
                    <select name='txtCampo3' id='txtCampo3' style="width:240px" onchange="pais = this.value; ">
                     <option value="" >Seleccione Pais</option>
                    <option value="" disabled>-----------</option>
					  <?php foreach($listInfo3=sel3("1=1") as $listServ): ?>
                      <option value="<?php echo $listServ[0]; ?>"><?php echo $listServ[0]; ?></option>
                      <?php endforeach; ?>
                	</select>
                </td>
            </tr>
            <tr>
                <td>Zona</td>
                <td colspan="2">
                    <select name='txtCampo4' id='txtCampo4' style="width:240px">
                      <?php foreach($listInfo4=sel4("1=1") as $listServ): ?>
                      <option value="<?php echo $listServ[0]; ?>"><?php echo $listServ[0]; ?></option>
                      <?php endforeach; ?>
                    </select>
                </td>
            </tr>
      <tr>
              <td>Moneda</td>
              <td colspan="2"><select name='txtCampo5' id='txtCampo5' style="width:240px">
                <?php foreach($listInfo5=sel5("1=1") as $listServ): ?>
                <option value="<?php echo $listServ[0]; ?>"><?php echo $listServ[0]; ?></option>
                <?php endforeach; ?>
        </select></td>
            </tr>
            <tr>
              <td>Medida</td>
              <td colspan="2"><select name='txtCampo6' id='txtCampo6' style="width:240px">
                <?php foreach($listInfo6=sel6("1=1") as $listServ): ?>
                <option value="<?php echo $listServ[0]; ?>"><?php echo $listServ[0]; ?></option>
                <?php endforeach; ?>
              </select></td>
            </tr>
             <tr>
                <td>Peso inicial</td>
                <td colspan="2"><input name='txtCampo7' type='text' onfocus="PreVerificar();" id='txtCampo7' size='50' value="0" style="width:110px" required onchange="$('#but').hide(1000,'');"  /></td>
            </tr>
            <tr>
                <td>Rango peso </td>
                <td colspan="2"><input name='txtCampo8' type='text' onfocus="PreVerificar();" id='txtCampo8' size='50' style="width:110px" placeholder="P.Desde" required onchange="$('#but').hide(1000,'');" /> 
                  -                 
                    <input name='txtCampo9' type='text' id='txtCampo9' onfocus="PreVerificar();" size='50' style="width:110px" placeholder="P.Hasta" required onblur="vericar_Rango();" onchange="vericar_Rango();" /></td>
            </tr>
            <tr>
                <td>Cobro Inicial</td>
                <td colspan="2">
                    <input name='txtCampo11' type='text' id='txtCampo11' size='50' style="width:110px" required placeholder="VI.Empresa" />
                    -
                    <input name='txtCampo10' type='text' id='txtCampo10' size='50' style="width:110px" required placeholder="VI.Agente" />
                </td>
            </tr>
            <tr>
              <td>Cobro R.Peso</td>
              <td colspan="2">
                  <input name='txtCampo13' type='text' id='txtCampo13' size='50' style="width:110px" required placeholder="VA.Empresa" />
                -
                  <input name='txtCampo12' type='text' id='txtCampo12' size='50' style="width:110px" required placeholder="VA.Agente" />
              </td>
            </tr>
            <tr>
              <td>Val. Adicional</td>
              <td colspan="2">
                  <input name='txtCampo15' type='text' id='txtCampo15' size='50' style="width:110px" required placeholder="VF.Empresa" />
                -
                  <input name='txtCampo14' type='text' id='txtCampo14' size='50' style="width:110px" required  placeholder="VF.Agente" />
              </td>
            </tr>
                     
			   <tr class="CC">
              <td>Convenio de carga</td>
              <td colspan="2">
                  <input name='txtCampo20' type='text' id='txtCampo20' size='50' style="width:110px" required placeholder="CC.Empresa" />
                -
                  <input name='txtCampo19' type='text' id='txtCampo19' size='50' style="width:110px" required placeholder="CC.Agente" />
              </td>
            </tr>
            <tr class="CC">
              <td>Concepto de CC</td>
              <td colspan="2">
                  <input name='txtCampo22' type='text' id='txtCampo22' size='50' style="width:110px"  placeholder="Con.Empresa" />
                  -
                  <input name='txtCampo21' type='text' id='txtCampo21' size='50' style="width:110px"  placeholder="Con.Agente" />
              </td>
            </tr>
			
            
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td><input type="checkbox" name="txtCampo17" id="txtCampo17" />
                <label for="txtCampo17">Seguro</label>
                <input type="checkbox" name="txtCampo18" id="txtCampo18" />
                <label for="txtCampo18">Declarado</label>
                <input type="checkbox" id="Check" name ="Check" onclick="check();">
                <label for="Check">C. Carga</label>
              </td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td></td>
            </tr>            
            <tr>
              <td colspan="3"></td>
            </tr>
            <tr>
            	<td colspan="3" align="center">
                	<input type="submit" value="Agregar" id="but" hidden/>
                    <input type="button" value="Cancelar" class="Btn" onClick="javascript:window.history.back();" />
                </td>
            </tr>
	</table>
    </form>
    <script language="javascript">function add_toast(tipo, mensaje){$().toastmessage(tipo, mensaje);}</script>
</body>
</html>
