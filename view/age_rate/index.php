<html>
<head>
	<title>Tarifas</title>
    <?php require('../../librerias.php'); ?>
    <?php require('ctrl_rate.php'); ?>
   
   
<body>
<?php require('../menu.php'); ?>
<?php $intID_Agente=$_GET['id_Age']; ?>
    <script>agente = <?php echo $intID_Agente; ?>;</script>
    <h1> <div class="icon-cube"> Tarifas <?php foreach($listInfo=sel7($intID_Agente) as $listData2): echo $listData2[0]; endforeach?> </div> </h1>
    
    <div align="right"><input type="button" class="add" value="Agregar Nuevo" onClick="abre_add(<?php echo $intID_Agente ?>)" />
                       <input type="button" class="agent" value="Agente" onClick="abre_agentes(<?echo $intID_Agente;?>)"/>
    </div>
    <table id="listable" class="display">
    	<thead>
            <tr>		
                <th>#</th>
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
			<?php $aum = 1 ; foreach($listInfo=sel("1=1 AND int_IDAgente=".$intID_Agente) as $listData): ?>
            <tr>	
                <td><?php echo $aum ?></td>
                <td><input type="text" value="<?php echo $listData[1] ?>" class="tdEditable" style="width:130px !important" onchange="pre_Q('var_Pais',this.value,<?php echo $listData[0];?>,'0');"></td>
                <td>
                <select class="tdEditable" style="width:110px !important"onchange="pre_Q('var_Servicio',this.value,<?php echo $listData[0];?>,'0');">
                    <?php $serviciot=sel2("int_ID = $listData[2]"); ?>
                   <option value="<?php echo $serviciot[0][0] ?>"><?php echo $serviciot[0][1] ?></option>
                   <option value="">---------------</option>
                    <?php foreach ($sercio = sel2("1=1") as  $value): ?>
                            <option value="<?php echo $value[0] ?>"><?php echo $value[1] ?></option>
                    <?php endforeach ?>
                    
                </select>
                </td>
               
                <td><input type="text" value="<?php echo $listData[3] ?>" class="tdEditable" style="width:50px !important" onchange="pre_Q('var_Zona',this.value,<?php echo $listData[0];?>,'0');"></td>
                <td><input type="text" value="<?php echo $listData[4] ?>" class="tdEditable" style="width:50px !important" onchange="pre_Q('int_PesoDesde',this.value,<?php echo $listData[0];?>,'0');"></td>
                <td><input type="text" value="<?php echo $listData[5] ?>" class="tdEditable" style="width:50px !important" onchange="pre_Q('int_PesoHasta',this.value,<?php echo $listData[0];?>,'0');"></td>
                <td><input type="text" value="<?php echo $listData[6] ?>" class="tdEditable" style="width:50px !important" onchange="pre_Q('int_PesoInicial',this.value,<?php echo $listData[0];?>,'0');"></td>
                <td><input type="text" value="<?php echo $listData[7] ?>" class="tdEditable" style="width:50px !important" onchange="pre_Q('int_LibraInicialAgente',this.value,<?php echo $listData[0];?>,'0');"></td>  
                <td><input type="text" value="<?php echo $listData[8] ?>" class="tdEditable" style="width:50px !important" onchange="pre_Q('int_LibraInicial',this.value,<?php echo $listData[0];?>,'0');"></td>
                <td><input type="text" value="<?php echo $listData[9] ?>" class="tdEditable" style="width:50px !important" onchange="pre_Q('int_LibraAdicionalAgente',this.value,<?php echo $listData[0];?>,'0');"></td>
                <td><input type="text" value="<?php echo $listData[10]?>" class="tdEditable" style="width:50px !important" onchange="pre_Q('int_LibraAdicional',this.value,<?php echo $listData[0];?>,'0');"></td>
                <td><input type="text" value="<?php echo $listData[11]?>" class="tdEditable" style="width:50px !important" onchange="pre_Q('int_ValorFijoAgente',this.value,<?php echo $listData[0];?>,'0');"></td>
                <td><input type="text" value="<?php echo $listData[12]?>" class="tdEditable" style="width:50px !important" onchange="pre_Q('int_ValorFijoEmpresa',this.value,<?php echo $listData[0];?>,'0');"></td>
                <td><input type="text" value="<?php echo $listData[13]?>" class="tdEditable" style="width:50px !important" onchange="pre_Q('int_ValorFijo',this.value,<?php echo $listData[0];?>,'0');"></td>             
                <td>
                    <input type="button" class="edit" value="Editar" onClick="abre_upd(<?php echo $int_ID ?>,<?php echo $intID_Agente ?>,<?php  echo $listData["0"]?>)" />
                    <input type="button" class="del" value="Borrar" onClick="abre_del(<?php echo $int_ID ?>,<?php echo $intID_Agente ?>,<?php  echo $listData["0"]?>)" />
                </td>
            </tr>
			<?php $aum++; endforeach; ?>
        </tbody>
	</table>

    </div>
    <input type="button" style="position: absolute; margin-top: 10px;margin-left: 43%;width:190px;" class ="save" Value="Guardar Todos los Cambios" onclick="pre_Q('0','0','0','1',<?php echo $int_ID ?>,<?php echo $intID_Agente ?>)";>
    <script languaje="javascript">nav();</script>
	<script languaje="javascript">dataView();</script>
    <script language="javascript">function del_toast(tipo, mensaje){$().toastmessage(tipo, mensaje);}</script>
</body>
</html>