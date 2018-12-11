<html>
<head>
	<title>Tarifas</title>
    <?php require('../../librerias.php'); ?>
    <?php require('ctrl_rate.php'); ?>
    <script type="text/javascript">
    var valSql ="";
    function pre_Query(camp,val,id){
        valSql += "UPDATE tbl_Tarifas SET "+camp+"="+val+" WHERE int_ID = "+id+";";

    }

    </script>

   
<body>
<?php require('../menu.php'); ?>
    <h1> <div class="icon-cube"> Tarifas <?php foreach($listInfo=sel7($intID_Agente) as $listData2): echo $listData2[0]; endforeach?> </div> </h1>
    
    <div align="right"><input type="button" class="add" value="Agregar Nuevo" onClick="abre_add(<?echo $intID;?>,<?echo $intID_Agente;?>)" />
                       <input type="button" class="add" value="Agentes" onClick="abre_agentes(<?echo $intID;?>)">
    </div>
    <table id="listable" name="listable"class="display">
    	<thead>
            <tr>		
                <th>ID</th>
                <th>Pais</th>
                <th>Servicio</th>
                <th>Zona</th>
                <th>P_Desde</th>
                <th>P_Hasta</th>
                <th>P_Inicial</th>
                <th>Ini_Age</th>
                <th>Ini_Emp</th>
                <th>Add_Age</th>
                <th>Add_Emp</th>
                <th>Fijo_Age</th>
                <th>Fijo_Emp</th>
                <th>Fijo</th>
                <th>Acciones</th>
            </tr>
        </thead>
		<tbody>
			<?php foreach($listInfo=sel("1=1 AND int_IDAgente=".$intID_Agente) as $listData): ?>
            <tr>	
                <td><?php echo $listData[0] ?></td>
                <td>
                    <select name='txtCampo3'  class="tdEditable"  id='txtCampo3' style="width:140px !important"  onchange=' pre_Query(var_Pais,this.value,<?php echo $listData[0]?>)'>
					  <option value="<?php echo $listData[1]; ?>"><?php echo $listData[1]; ?></option>
                      <option value="#" disabled>-------------</option>
					  <?php foreach($listInfo3=sel3("1=1") as $listServ): ?>
                      <option value="<?php echo $listServ[0]; ?>"><?php echo $listServ[0]; ?></option>
                      <?php endforeach; ?>
                	</select>
                </td>
                <td><select name='txtCampo2' class="tdEditable" id='txtCampo2' style="width:100px !important "  onchange='pre_Query( var_Servicio,this.value,<?php echo $listData[0]?>);'>
                      <option value="<?php echo $listData[2]; ?>"><?php echo $listData[2]; ?></option>
                      <option value="#" disabled>-------------</option>
                      <?php foreach($listInfo2=sel2("1=1") as $listServ): ?>
                      <option value="<?php echo $listServ[1]; ?>"><?php echo $listServ[1]; ?></option>
                      <?php endforeach; ?></td>
                <td>
                    <select name='txtCampo4'  class="tdEditable" id='txtCampo4' style="width:50px !important"  onchange='pre_Query( var_Zona,this.value,<?php echo $listData[0]?>);'>
                      <option value="<?php echo $listData[3]; ?>"><?php echo $listData[3]; ?></option>
                      <option value="#" disabled>-------------</option>
					  <?php foreach($listInfo4=sel4("1=1") as $listServ): ?>
                      <option value="<?php echo $listServ[0]; ?>"><?php echo $listServ[0]; ?></option>
                      <?php endforeach; ?>
                    </select>
                </td>
                <td><input type="text" class="tdEditable" style="width:50px !important;" id = "edt4" value="<?php echo $listData[4] ?>" onchange=' pre_Query(int_PesoDesde,this.value,<?php echo $listData[0]?>);'></td>
                <td><input type="text" class="tdEditable" style="width:50px !important;" id = "edt5"value="<?php echo $listData[5] ?>" onchange=' pre_Query(int_PesoHasta,this.value,<?php echo $listData[0]?>);'></td>
                <td><input type="text" class="tdEditable" style="width:50px !important;" id = "edt6"value="<?php echo $listData[6] ?>" onchange=' pre_Query(int_PesoInicial,this.value,<?php echo $listData[0]?>);'></td>
                <td><input type="text" class="tdEditable" style="width:50px !important;" id = "edt7"value="<?php echo $listData[7] ?>" onchange=' pre_Query(int_LibraInicialAgente,this.value,<?php echo $listData[0]?>);'></td>  
                <td><input type="text" class="tdEditable" style="width:50px !important;" id = "edt8"value="<?php echo $listData[8] ?>"  onchange=' pre_Query(int_LibraInicial,this.value,<?php echo $listData[0]?>);'></td>
                <td><input type="text" class="tdEditable" style="width:50px !important;" id = "edt9"value="<?php echo $listData[9] ?>"  onchange=' pre_Query(int_LibraAdicionalAgente,this.value,<?php echo $listData[0]?>);'></td>
                <td><input type="text" class="tdEditable" style="width:50px !important;" id = "edt10"value="<?php echo $listData[10] ?>" onchange='pre_Query(int_LibraAdicional,this.value,<?php echo $listData[0]?>);'></td>
                <td><input type="text" class="tdEditable" style="width:50px !important;" id = "edt11"value="<?php echo $listData[11] ?>" onchange='pre_Query(int_ValorFijoAgente,this.value,<?php echo $listData[0]?>);'></td>
                <td><input type="text" class="tdEditable" style="width:50px !important;" id = "edt12"value="<?php echo $listData[12] ?>" onchange='pre_Query(int_ValorFijoEmpresa,this.value,<?php echo $listData[0]?>);'></td>
                <td><input type="text" class="tdEditable" style="width:50px !important;" id = "edt13"value="<?php echo $listData[13] ?>" onchange='pre_Query(int_ValorFijo,this.value,<?php echo $listData[0]?>);'></td>             
                <td>
                    <input type="button" class="edit" value="Editar" onClick="abre_upd(<?php echo $intID ?>,<?php echo $intID_Agente ?>,<?php  echo $listData["0"]?>)" />
                    <input type="button" class="del" value="Borrar" onClick="abre_del(<?php echo $intID ?>,<?php echo $intID_Agente ?>,<?php  echo $listData["0"]?>)" />
                </td>
            </tr>
			<?php endforeach; ?>
        </tbody>
	</table>
	<input type="submit" onclick="upd_exe(valSql,<?php echo $intID ?>,<?php echo $intID_Agente ?>);">	
    </div>
    
    <script languaje="javascript">nav();</script>
	<script languaje="javascript">dataView();</script>
    <script language="javascript">function del_toast(tipo, mensaje){$().toastmessage(tipo, mensaje);}</script>
</body>
</html>