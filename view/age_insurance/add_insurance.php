<html>
<head>
  <title>Agregar_Seguro</title>
  <?php require('../../librerias.php'); ?>
  <?php require('ctrl_insurance.php'); ?>
 </head>
<body>
<h1>Crear Seguro / <?php foreach($listInfo=sel7($intID_Agente) as $listData2): echo $listData2[0]; endforeach?></h1>
  <table id="listable" class="display" align="center">
        <thead>
            <tr>        
                <th>#</th>
                <th>Pais</th>
                <th>Servicio</th>
                <th>%_Empresa</th>
                <th>%_Agente</th>
                <th>V_Min</th>
                <th>V_Max</th>
                <th>Acciones</th>
            </tr>
        </thead>
       <tbody>
            <?php $aum = 1 ;foreach($listInfo=sel("1=1 AND int_IDAgente=".$intID_Agente) as $listData): ?>
            <tr class="trTax">    
                <td class="tdTax"><?php echo $aum ?></td>
                <td class="tdTax"><?php echo $listData[1] ?></td>
                <td class="tdTax"><?php echo $listData[2] ?></td>
                <td class="tdTax"><?php echo $listData[3] ?></td>
                <td class="tdTax"><?php echo $listData[4] ?></td>
                <td class="tdTax"><?php echo $listData[5] ?></td>
                <td class="tdTax"><?php echo $listData[6] ?></td>            
                <td>
                   <input type="button" class="del" value="Borrar" onClick="abre_del(<?php echo $intID ?>,<?php echo $intID_Agente ?>,<?php  echo $listData["0"]?>)" />
                </td>
            </tr>
            <?php $aum++;endforeach; ?>
        </tbody>
    </table>

  
  
  <form name='formInsert' id="formInsert" onSubmit="exe_add(<? echo $intID ?>,<? echo $intID_Agente ?>);">
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
                <td>Agente : <?php foreach($listInfo=sel7($intID_Agente) as $listData2): echo $listData2[0]; endforeach?> </td>
                <td colspan="2">
                    <input class="ID" name='txtCampo1' type='text' id='txtCampo1' size='50' value="<?php echo $intID_Agente  ?>" hidden />
                </td>
            </tr>
            
            <tr>
                <td>Servicio</td>
                <td colspan="2">
                    <select name='txtCampo2' id='txtCampo2' style="width:240px">      
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
            <?php foreach($listInfo3=sel3("1=1") as $listServ): ?>
                      <option value="<?php echo $listServ[0]; ?>"><?php echo $listServ[0]; ?></option>
                      <?php endforeach; ?>
                  </select>
                </td>
            </tr>
       <tr>
          <td>Porcentaje (%)</td>
          <td colspan="2"><input name='txtCampo4' type='text' id='txtCampo4' size='50' style="width:110px" placeholder="Empresa" requerid/> 
            -                 
              <input name='txtCampo5' type='text' id='txtCampo5' size='50' style="width:110px" placeholder="Agente" requerid /></td>
        </tr>
            <tr>
                <td>Valor</td>
                <td colspan="2">
                    <input name='txtCampo6' type='text' id='txtCampo6' size='50' style="width:110px" placeholder="Minimo"  requerid/>
                    -
                    <input name='txtCampo7' type='text' id='txtCampo7' size='50' style="width:110px" placeholder="Maximo" requerid />
                </td>
            </tr>
            <tr>
              <td>Es Opcional?</td>
              <td><input type="checkbox" id="txtCampo8" name="txtCampo8"></td>
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