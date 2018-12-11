<html>
<head>
    <title>Impuestos</title>
    <?php require('../../librerias.php'); ?>
    <?php require('ctrl_tax.php'); ?>
</head>
<body>
<?php require('../menu.php'); ?>
    <h1> <div class="icon-cube"> Impuestos / <?php foreach($listInfo=sel7($intID_Agente) as $listData2): echo $listData2[0]; endforeach?> </div> </h1>
    
    
    <table >
    <tr>
                <td>Servicio</td>
                <td colspan="2">
                    <select name='txtCampo2' id='txtCampo2' style="width:240px" >
                      <?php foreach($listInfo2=sel2("1=1") as $listServ): ?>
                      <option value="<?php var_servicio=echo $listServ[1]; ?>"><?php echo $listServ[1]; ?></option>
                      <?php endforeach; ?>
                    </select>
                </td>
        
            
                <td>Pais</td>
                <td colspan="2">
                    <select name='txtCampo3' id='txtCampo3' style="width:240px">
                                <?php foreach($listInfo3=sel3("1=1") as $listServ): ?>
                      <option value="<?php echo $listServ[0]; ?>"><?php echo $listServ[0]; ?></option>
                      <?php endforeach; ?>
                    </select>
                </td>

                <td>
                <input type="button" class="add" value="Nuevo Impuesto" onClick="abre_add(<?echo $intID;?>,<?echo $intID_Agente;?>)" />
                </td>
    </tr>
    </table>
    <table id="listable" class="display">
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
            <?php foreach($listInfo=sel("1=1 AND int_IDAgente=".$intID_Agente) as $listData): ?>
            <tr>    
                <td><?php echo $listData[0] ?></td>
                <td><?php echo $listData[1] ?></td>
                <td><?php echo $listData[2] ?></td>
                <td><?php echo $listData[3] ?></td>
                <td><?php echo $listData[4] ?></td>
                <td><?php echo $listData[5] ?></td>
                <td><?php echo $listData[6] ?></td>      
                <td>
                    <input type="button" class="edit" value="Editar" onClick="abre_upd(<?php echo $intID ?>,<?php echo $intID_Agente ?>,<?php  echo $listData["0"]?>)"  />
                    <input type="button" class="del" value=" " onClick="abre_del(<?echo $intID;?>,<?php echo $listData["0"]?>)" />
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
    
    <script languaje="javascript">nav();</script>
    <script languaje="javascript">dataView();</script>
    <script language="javascript">function del_toast(tipo, mensaje){$().toastmessage(tipo, mensaje);}</script>
</body>
</html>