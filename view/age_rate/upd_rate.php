<html>
<head>
	<title>Actualizar_Tarifa</title>
	<?php require('../../librerias.php'); ?>
    <?php require('ctrl_rate.php'); ?>
    
   
</head>
<body>
  <?php $intID_Rate = $_REQUEST['id_Rate']; ?>
	<h1>Tarifas / Actualizar Tarifa/</h1>
	<form name='formUpdate' id="formUpdate" method='post' onSubmit="exe_upd(<? echo $int_ID ?>,<? echo $intID_Agente ?>,<? echo $intID_Rate ?>)" >
	<table width="40%" align="center">
    	
		<?php foreach($listInfo=sel("int_ID=".$intID_Rate) as $listData): ?>
            <tr>
              <td colspan="3">&nbsp;</td>
            </tr>
            <tr>
                <td>ID</td>
                <td colspan="2">
                	
                    <input class="ID" name='id' type='text' id='id' size='50' readonly value='<?php echo $listData[0]; ?>' />
                    <input type="hidden" name="act" id="act" value="upd">
                </td>
            </tr>
            <tr>
                <td>Agente</td>
                <td colspan="2">
                    <input class="ID" name='txtCampo1' type='text' id='txtCampo1' size='50' readonly value='<?php echo $listData[18];?>' />
                </td>
            </tr>
            <tr>
                <td>Servicio</td>
                <td colspan="2">
                    <select name='txtCampo2' id='txtCampo2' style="width:240px">
                     <?php $serviciot=sel2("int_ID = $listData[2]"); ?>
                    <option value="<?php echo $serviciot[0][0] ?>"><?php echo $serviciot[0][1] ?></option>
                    <option value="#" disabled>-------------</option>
                      <?php foreach($listInfo2=sel2("1=1") as $listServ): ?>
                      <option value="<?php echo $listServ[0]; ?>"><?php echo $listServ[1]; ?></option>
                      <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Pais</td>
                <td colspan="2">
                    <select name='txtCampo3' id='txtCampo3' style="width:240px">
					  <option value="<?php echo $listData[1]; ?>"><?php echo $listData[1]; ?></option>
                      <option value="#" disabled>-------------</option>
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
                      <option value="<?php echo $listData[3]; ?>"><?php echo $listData[3]; ?></option>
                      <option value="#" disabled>-------------</option>
					  <?php foreach($listInfo4=sel4("1=1") as $listServ): ?>
                      <option value="<?php echo $listServ[0]; ?>"><?php echo $listServ[0]; ?></option>
                      <?php endforeach; ?>
                    </select>
                </td>
            </tr>
      <tr>
              <td>Moneda</td>
              <td colspan="2"><select name='txtCampo5' id='txtCampo5' style="width:240px">
                	  <option value="<?php echo $listData[16]; ?>"><?php echo $listData[16]; ?></option>
                      <option value="#" disabled>-------------</option>
				<?php foreach($listInfo5=sel5("1=1") as $listServ): ?>
                <option value="<?php echo $listServ[0]; ?>"><?php echo $listServ[0]; ?></option>
                <?php endforeach; ?>
        </select></td>
            </tr>
            <tr>
              <td>Medida</td>
              <td colspan="2"><select name='txtCampo6' id='txtCampo6' style="width:240px">
              		  <option value="<?php echo $listData[17]; ?>"><?php echo $listData[17]; ?></option>
                      <option value="#" disabled>-------------</option>
                <?php foreach($listInfo6=sel6("1=1") as $listServ): ?>
                <option value="<?php echo $listServ[0]; ?>"><?php echo $listServ[0]; ?></option>
                <?php endforeach; ?>
              </select></td>
            </tr>
             <tr>
                <td>Peso inicial</td>
                <td colspan="2"><input name='txtCampo7' type='text' id='txtCampo7' size='50' style="width:110px" value='<?php echo $listData[6]; ?>' /></td>
            </tr>
            <tr>
                <td>Rango de Peso</td>
                <td colspan="2"><input name='txtCampo8' type='text' id='txtCampo8' size='50' style="width:110px" placeholder="P.Desde" value='<?php echo $listData[4]; ?>' /> 
                  -                 
                    <input name='txtCampo9' type='text' id='txtCampo9' size='50' style="width:110px" placeholder="P.Hasta" value='<?php echo $listData[5]; ?>' /></td>
            </tr>
            <tr>
                <td>Cobro Inicial</td>
                <td colspan="2">
                    <input name='txtCampo11' type='text' id='txtCampo11' size='50' style="width:110px" placeholder="VI.Empresa" value='<?php echo $listData[8]; ?>' />
                    -
                    <input name='txtCampo10' type='text' id='txtCampo10' size='50' style="width:110px" placeholder="VI.Agente" value='<?php echo $listData[7]; ?>' />
                </td>
            </tr>
            <tr>
              <td>Cobro R.Peso</td>
              <td colspan="2">
              <input name='txtCampo13' type='text' id='txtCampo13' size='50' style="width:110px" placeholder="VA.Empresa" value='<?php echo $listData[10]; ?>' />
                -
              <input name='txtCampo12' type='text' id='txtCampo12' size='50' style="width:110px" placeholder="VA.Agente" value='<?php echo $listData[9]; ?>' />
              </td>
            </tr>
            <tr>
              <td>Val. Adicional</td>
              <td colspan="2">
              <input name='txtCampo15' type='text' id='txtCampo15' size='50' style="width:110px" placeholder="VF.Empresa" value='<?php echo $listData[12]; ?>' />
                -
              <input name='txtCampo14' type='text' id='txtCampo14' size='50' style="width:110px"  placeholder="VF.Agente" value='<?php echo $listData[11]; ?>' />
              </td>
            </tr>
            <tr class="CC">
              <td>Convenio de carga</td>
              <td colspan="2">
              <input name='txtCampo20' type='text' id='txtCampo20' size='50' style="width:110px" placeholder="CC.Empresa" value="<?php echo $listData[20]?>" />
                -
              <input name='txtCampo19' type='text' id='txtCampo19' size='50' style="width:110px" placeholder="CC.Agente" value="<?php echo $listData[19]?>" />
              </td>
            </tr>
            <tr class="CC">
              <td>Concepto de CC</td>
              <td colspan="2">
              <input name='txtCampo22' type='text' id='txtCampo22' size='50' style="width:110px" placeholder="Con.Empresa" value="<?php echo $listData[22]?>" />
                -
              <input name='txtCampo21' type='text' id='txtCampo21' size='50' style="width:110px"  placeholder="Con.Agente" value="<?php echo $listData[21]?>" />
              </td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td><input type="checkbox" name="txtCampo17" id="txtCampo17" <?php if($listData[14]=='SI'){echo 'checked';} ?> />
                <label for="txtCampo17">Seguro</label>
                <input type="checkbox" name="txtCampo18" id="txtCampo18" <?php if($listData[15]=='SI'){echo 'checked';} ?> />
                <label for="txtCampo18">Declarado</label>
               
                 <input type="checkbox" id="Check" name ="Check" onclick="check();" <?php if(($listData[19] != 0)){echo 'checked ';} ?> />
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
                	<input type="submit" value="Actualizar" />
                    <input type="button" value="Cancelar" class="Btn" onClick="javascript:window.history.back();" />
                </td>
            </tr>
        <?php endforeach; ?>

	</table>
    </form>
   
    <script language="javascript">function upd_toast(tipo, mensaje){$().toastmessage(tipo, mensaje);}</script>
</body>
</html>
