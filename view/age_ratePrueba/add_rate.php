<html>
<head>
	<title>Agregar_Tarifa</title>
	<?php require('../../librerias.php'); ?>
    <?php require('ctrl_rate.php'); ?>
    <?php if(isset($_GET['id'])){$intID=$_GET['id']; }else{echo "<script language='javascript'>  window.location.href = 'http://www.easycargopro.com/ECP/index.php' ;</script>"; }?>
</head>
<body>
	<h1>Crear Tarifa</h1>
	<form name='formInsert' id="formInsert" onSubmit="exe_add(<? echo $intID ?>,<? echo $intID_Agente ?>);" >
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
                <td>Agente</td>
                <td colspan="2">
                    <input class="ID" name='txtCampo1' type='text' id='txtCampo1' size='50' value="<?php echo $intID_Agente?>" required readonly />
                </td>
            </tr>
            <tr>
                <td>Servicio</td><?php if(isset($_GET['id'])){$intID=$_GET['id']; }else{echo "<script language='javascript'>  window.location.href = 'http://www.easycargopro.com/ECP/index.php' ;</script>"; }?>
                <td colspan="2">
                    <select name='txtCampo2' id='txtCampo2' style="width:240px">
                      <?php foreach($listInfo2=sel2("1=1") as $listServ): ?>
                      <option value="<?php echo $listServ[1]; ?>"><?php echo $listServ[1]; ?></option>
                      <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Pais</td>
                <td colspan="2">
                    <select name='txtCampo3' id='txtCampo3' style="width:240px">
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
                <td colspan="2"><input name='txtCampo7' type='text' id='txtCampo7' size='50' value="0" style="width:110px" /></td>
            </tr>
            <tr>
                <td>Peso</td>
                <td colspan="2"><input name='txtCampo8' type='text' id='txtCampo8' size='50' style="width:110px" placeholder="P.Desde" /> 
                  -                 
                    <input name='txtCampo9' type='text' id='txtCampo9' size='50' style="width:110px" placeholder="P.Hasta" /></td>
            </tr>
            <tr>
                <td>Valor Inicial</td>
                <td colspan="2">
                    <input name='txtCampo10' type='text' id='txtCampo10' size='50' style="width:110px" placeholder="VI.Agente" />
                    -
                    <input name='txtCampo11' type='text' id='txtCampo11' size='50' style="width:110px" placeholder="VI.Empresa" />
                </td>
            </tr>
            <tr>
              <td>Valor Adicional</td>
              <td colspan="2"><input name='txtCampo12' type='text' id='txtCampo12' size='50' style="width:110px" placeholder="VA.Agente" />
                -
                  <input name='txtCampo13' type='text' id='txtCampo13' size='50' style="width:110px" placeholder="VA.Empresa" /></td>
            </tr>
            <tr>
              <td>Valor Fijo</td>
              <td colspan="2"><input name='txtCampo14' type='text' id='txtCampo14' size='50' style="width:110px"  placeholder="VF.Agente" />
                -
                  <input name='txtCampo15' type='text' id='txtCampo15' size='50' style="width:110px" placeholder="VF.Empresa" /></td>
            </tr>
            <tr>
              <td>Valor Fijo</td>
              <td>
                  <input name='txtCampo16' type='text' id='txtCampo16' size='50' value="0" style="width:110px" />
              </td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td><input type="checkbox" name="txtCampo17" id="txtCampo17" />
                <label for="txtCampo17">Seguro</label>
                <input type="checkbox" name="txtCampo18" id="txtCampo18" />
                <label for="txtCampo18">Declarado</label>
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
                	<input type="submit" value="Agregar" />
                    <input type="button" value="Cancelar" class="Btn" onClick="javascript:window.history.back();" />
                </td>
            </tr>
	</table>
    </form>
    <script language="javascript">function add_toast(tipo, mensaje){$().toastmessage(tipo, mensaje);}</script>
</body>
</html>
