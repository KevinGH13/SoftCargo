<html>
<head>
	<title>Agregar_Impuesto</title>
	<?php require('../../librerias.php'); ?>
    <?php require('ctrl_tax.php'); ?>
</head>
<body>
  
	<h1>Crear Impuesto</h1>
	<form name='formInsert' id="formInsert" onSubmit="exe_add();" >
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
                <td>ID Agente</td>
                <td colspan="2">
                    <input class="ID" name='txtCampo1' type='text' id='txtCampo1' size='50' required />
                </td>
            </tr>
             <tr>
                <td>Agente</td>
                <td colspan="2">
                   <select name='txtCampo9' id='txtCampo9' style="width:240px">
                      <?php foreach($listInfo7=sel7("1=1") as $listServ): ?>
                      <option value="<?php echo $listServ[1]; ?>"><?php echo $listServ[1]; ?></option>
                      <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Servicio</td>
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
          <td>Porcentaje (%)</td>
          <td colspan="2"><input name='txtCampo4' type='text' id='txtCampo4' size='50' style="width:110px" placeholder="Empresa" required/> 
            -                 
              <input name='txtCampo5' type='text' id='txtCampo5' size='50' style="width:110px" placeholder="Agente" required/></td>
        </tr>
            <tr>
                <td>Peso</td>
                <td colspan="2">
                    <input name='txtCampo6' type="number"step="any" id='txtCampo6' size='50' style="width:110px" placeholder="Minimo" required />
                    
                    <input name='txtCampo7' type="number" step="any"id='txtCampo7' size='50' style="width:110px" placeholder="Maximo" required />
                </td>
            </tr>
            <tr>
              <td>V. Min Declarado</td>
              <td colspan="2"><input name='txtCampo8' type='text' id='txtCampo8' size='50' style="width:110px" required/></td>
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
            <input type="hidden" name= "xaxd" id="xaxd" value="<? echo $intID ?>"  >
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