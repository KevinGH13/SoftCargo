<html>
<head>
    <title>Impuestos</title>
    <?php require('../../librerias.php'); ?>
    <?php require('ctrl_tax.php'); ?>
   
</head>
<body>
<?php require('../menu.php'); ?>
<?php $intAge=$_GET['id_Age']; ?>
    <h1> <div class="icon-cube"> Impuestos / <?php foreach($listInfo=sel7($intID_Agente) as $listData2): echo $listData2[0]; endforeach?> </div> </h1>
    <div align="right"><input type="button" class="add" value="Nuevo Impuesto" onClick="pre_car(<?php echo $intID ?>,<?php echo $intID_Agente ?>)" />
    <input type="button" class="agent" value="Agentes" onclick="abre_age(<?echo $intAge;?>)"></div>
   <select  class="tdEditable" style="width:180px !important;" id="pais" onchange="pre_Q('var_Pais',this.value,<?php echo $listData[0]?>,'0')" >
                      <option value="Seleccione un Pais">Seleccione un Pais</option>
                      <option value="#" disabled>-------------</option>
                      <?php foreach($listInfo3=sel3("1=1") as $listServ): ?>
                      <option value="<?php echo $listServ[0]; ?>"><?php echo $listServ[0]; ?></option>
                      <?php endforeach; ?>
    </select>
      <select class="tdEditable" id="servicio" style="width:180px !important" >
                    
                   
                  <option value="Seleccione un Pais">Seleccione un Servicio</option>
                   <option value="">---------------</option>
                    <?php foreach ($sercio = sel2("1=1") as  $value): ?>
                            <option value="<?php echo $value[0] ?>"><?php echo $value[1] ?></option>
                    <?php endforeach ?>
                    
      </select>

    <table id="listable" class="display" >
        <thead>
            <tr>        
                <th>#</th>
                <th>Pais</th>
                <th>Servicio</th>
                <th>%_Empresa</th>
                <th>%_Agente</th>
                <th>P_Min</th>
                <th>P_Max</th>
                <th>V. Declarado Min</th>
            </tr>
        </thead>
        <tbody>
            <?php $aum=1; foreach($listInfo=sel("1=1 AND int_IDAgente=".$intID_Agente) as $listData): ?>
            <tr>    
                <td><?php echo $aum ?></td>
                <td>
                    
                    <select name='txtCampo3' class="tdEditable" style="width:110px !important;" id='txtCampo3'onchange="pre_Q('var_Pais',this.value,<?php echo $listData[0]?>,'0')" >
                      <option value="<?php echo $listData[1]; ?>"><?php echo $listData[1]; ?></option>
                      <option value="#" disabled>-------------</option>
                      <?php foreach($listInfo3=sel3("1=1") as $listServ): ?>
                      <option value="<?php echo $listServ[0]; ?>"><?php echo $listServ[0]; ?></option>pais
                      <?php endforeach; ?>
                    </select>
                </td>
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
                <td><input type ="text" class="tdEditable" style="width:59px !important;" value="<?php echo $listData[3]?>" onblur="pre_Q('int_porcEmpresa',this.value,<?php echo $listData[0]?>,'0')"></td>
                <td><input type ="text" class="tdEditable" style="width:59px !important;" value="<?php echo $listData[4]?>" onblur="pre_Q('int_porcAgente',this.value,<?php echo $listData[0]?>,'0')"></td>
                <td><input type ="text" class="tdEditable" style="width:59px !important;" value="<?php echo $listData[5]?>" onblur="pre_Q('int_PesoMin',this.value,<?php echo $listData[0]?>,'0')"></td>
                <td><input type ="text" class="tdEditable" style="width:59px !important;" value="<?php echo $listData[6]?>" onblur="pre_Q('int_PesoMax',this.value,<?php echo $listData[0]?>,'0')"></td>    
                <td><input type ="text" class="tdEditable" style="width:59px !important;" value="<?php echo $listData[7]?>" onblur="pre_Q('int_ValorDeclaradoMin',this.value,<?php echo $listData[0]?>,'0')"></td>    
                <td>
                    <input type="button" class="edit" value="Editar" onClick="abre_upd(<?php echo $intID ?>,<?php echo $intID_Agente ?>,<?php  echo $listData["0"]?>)" />
                    <input type="button" class="del" value="Borrar" onClick="abre_del(<?php echo $intID ?>,<?php echo $intID_Agente ?>,<?php  echo $listData["0"]?>)" />
                    
                </td>
            </tr>
            <?php $aum++; endforeach; ?>
        </tbody>
    </table> 
    
    </div>
<input type="button" class="save" value="Guardar todos los cambios" style="position: absolute; margin-top: 10px;margin-left: 43%;width:190px;" onclick="pre_Q('0','0','0','1',<?php echo $intID ?>,<?php echo $intID_Agente ?>)">

    
    <script languaje="javascript">nav();</script>
    <script languaje="javascript">dataView();</script>
    <script language="javascript">function del_toast(tipo, mensaje){$().toastmessage(tipo, mensaje);}</script>
</body>
</html>