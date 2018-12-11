<html>
<head>
    <title>Consolidado</title>
    <?php require('../../librerias.php'); ?>
    <?php require('ctrl_con.php'); ?>
    
</head>
<body>
<?php require('../menu.php'); ?>
    <h1> <div class="icon-magic">Consolidado</div> </h1>
    
    <div align="right"><input type="button" class="add" value="Agregar Nuevo" onClick="abre_add()" /></div>
    <table id="listable" class="display">
        <thead>
            <tr>        
                <th>#Consolidado</th>
                <th>Empresa Destino</th>                
                <th>Pais Desti</th>
                <th>Peso Lib</th>
                <th>Peso Kg</th>
                <th>Total Valor Dec</th>
                <th>Total Valor Aseg</th>
                <th>Fecha de creacion</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($listdata = sels("1=1") as $value) :?>
                <tr>
                    <td> <a href="details_con.php?id_con=<?php echo $value[0] ?>"><?php echo $value[0] ?></a></td>
                    <td><?php echo $value[1] ?></td>
                    <td><?php foreach($listInfo=sel4("int_Pais=".$value[2]) as $listDat){ echo $listDat[0]; }  ?></td>
                    <td><?php foreach($listInfo=sel10($value[0]) as $listDat){ echo $listDat[2]; } ?></td>
                    <td><?php foreach($listInfo=sel10($value[0]) as $listDat){ echo round($listDat[2]/2.2046,2 ); } ?></td>
                    <td><?php echo $value[3] ?></td>
                    <td><?php foreach($listInfo=sel10($value[0]) as $listDat){ echo $listDat[4]; } ?></td>
                    <td class="date"><?php echo $value[4] ?></td>
                    <td>
                    <input type="button" class="edit" value="inf Con" onClick="abre_info(<?php echo $value["0"]?>)" />
                    <input type="button" class="del" value="Borrar" onClick="abre_del(<?php echo $value["0"]?>)" />
                    </td>
                </tr> 
            <?php endforeach ?>
        </tbody>
    </table>
    </div>
    
    <script languaje="javascript">nav();</script>
    <script languaje="javascript">dataView();</script>
    <script language="javascript">function del_toast(tipo, mensaje){$().toastmessage(tipo, mensaje);}</script>
</body>
</html>