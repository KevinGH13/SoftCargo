<html>
<head>
	<title>Actualizar_Impuesto</title>
	<?php require('../../librerias.php'); ?>
    <?php require('ctrl_tax.php'); ?>
        <?php if(isset($_GET['id_tax'])){$int_IDTax=$_GET['id_tax']; }?> 
  
</head>
<body>
	<h1>Actualizar Impuesto</h1>
	<form name='formUpdate' id="formUpdate" method='post' onSubmit="exe_upd(<? echo $intID ?>,<? echo $intID_Agente ?>,<? echo $int_IDTax ?>)" >
	<table width="40%" align="center">
    	<?php $intID=$_GET['id']; ?>
		<?php foreach($listInfo=sel("int_ID=".$int_IDTax) as $listData): ?>
            <tr>
              <td colspan="3">&nbsp;</td>
            </tr>
            <tr>
                
                <td colspan="2">
                	
                    <input class="ID" name='id' type='Text' id='id' size='50' readonly value='<?php echo $listData[0]; ?>' />
                    <input type="hidden" name="act" id="act" value="upd">
                </td>
            </tr>
            <tr>
                
                <td colspan="2">
                    <input class="ID" name='txtCampo1' type='hidden' id='txtCampo1' size='50' readonly value='<?php echo $listData[9]; ?>' />
                </td>
            </tr>
            <tr>
                <td>Servicio</td>
                <td colspan="2">
                    <select name='txtCampo2' id='txtCampo2' style="width:240px">
                       
                    <?php $serviciot=sel2("int_ID = $listData[2]"); ?>
                   <option value="<?php echo $serviciot[0][0] ?>"><?php echo $serviciot[0][1] ?></option>
                   <option value="">---------------</option>
                    <?php foreach ($sercio = sel2("1=1") as  $value): ?>
                            <option value="<?php echo $value[0] ?>"><?php echo $value[1] ?></option>
                    <?php endforeach ?>
                    
               
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
          <td>Porcentaje (%)</td>
          <td colspan="2"><input name='txtCampo4' type='text' id='txtCampo4' size='50' style="width:110px" placeholder="P.Desde" value='<?php echo $listData[3]; ?>' /> 
            -                 
              <input name='txtCampo5' type='text' id='txtCampo5' size='50' style="width:110px" placeholder="P.Hasta" value='<?php echo $listData[4]; ?>' /></td>
        </tr>
            <tr>
                <td>Peso(Min - Max )</td>
                <td colspan="2">
                    <input name='txtCampo6' type='text' id='txtCampo6' size='50' style="width:110px" placeholder="VI.Agente" value='<?php echo $listData[5]; ?>' />
                    -
                    <input name='txtCampo7' type='text' id='txtCampo7' size='50' style="width:110px" placeholder="VI.Empresa" value='<?php echo $listData[6]; ?>' />
                </td>
            </tr>
            <tr>
              <td>V. Min Declarado</td>
              <td colspan="2"><input name='txtCampo8' type='text' id='txtCampo8' size='50' style="width:110px" placeholder="VA.Agente" value='<?php echo $listData[7]; ?>' /></td>
            </tr>
           <tr>
              <td>Es Opcional ? </td>
              <td><input type="checkbox" id="txtCampo9" name="txtCampo9" <?php if ($listData[10]==1){echo "checked";} ?> ></td>
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