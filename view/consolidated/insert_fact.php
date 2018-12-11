<html>
<head>
	<title>Insertar Factura</title>
	<?php require('../../librerias.php'); ?>
    <?php require('ctrl_con.php'); ?>
</head>
<body>
<?php require('../menu.php'); ?>
<?php $intID=$_GET['id']; ?>
        <?php $intidcon=$_GET['idcon']; ?>
<h1> <div class="icon-cube"> Insertar Factura / Consolodidado # : <? echo $intidcon ?></div> </h1>
    
    <div align="right">  <input style='width:137px;' placeholder="Dijite # bolsa"  name='txtCampo1' type='date' id='txtCampo1' size='50' required />
    <select style='width:137px;' name='txtCampo2' id='txtCampo2'>
                    <option value="EMPAQUE">EMPAQUE</option>
                    <option value="ESTIVA">ESTIVA</option>
                    <option value="TULA">TULA</option>
                    <option value="PAQUETE">PAQUETE</option>
                </select><input type="button" class="del" value="Atras" onClick=" abre_info(<? echo $intID ?>, <? echo "'".$intidcon."'";?>);" /></div>
    <table id="listable" class="display">
        <thead>
            <tr>        
                 <th># Factura</th>
                <th>Remitente</th>
                <th>Destinatario</th>
                <th>Peso Lbs</th>
                <th>valor decl</th>
                <th>valor seg</th>
                <th>Unidades</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($listInfo=sel("int_ID=".$intidcon) as $listDat): $valorD=$listDat[8];endforeach;  ?>  
            <?php foreach($listInfo=sel8("int_NConsolidado <>".$intidcon." AND int_ValorDeclarado <=".$valorD ) as $listData): ?>
              
            <tr>    
                <td><?php echo $listData[1] ?></td>
                <td><?php echo $listData[2] ?></td>
                <td><?php echo $listData[3] ?></td>
                <td><?php echo $listData[4] ?></td>
                <td><?php echo $listData[5] ?></td>
                <td><?php echo $listData[5] ?></td>
                <td><? if($listData[1]!=null){echo"1/1";} ?></td>               
                <td>
                <? if($listData[1]!=null){ ?>
                    <input type="button" class="add" value=""  style="width:40px; margin-top:2px;" onClick="exe_fact(<?php echo $listData["0"]?>,<?php echo $intidcon ?>,$('#txtCampo1').val(),$('select#txtCampo2').val())" />
                    <? }?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
       
    <script languaje="javascript">nav();</script>
    <script languaje="javascript">dataView();</script>
    <script language="javascript">function upd_toast(tipo, mensaje){$().toastmessage(tipo, mensaje);}</script>
</body>
</html>