<html>
<head>
	<title>HWB</title>
    <?php require('../../librerias.php'); ?>
    <?php require('ctrl_awb.php'); ?>
</head>
<body>
<?php require('../menu.php'); ?>
    <h1>HWB</h1>
    
    <div align="right"><input type="button" class="add" value="Agregar Nuevo" onClick="abre_add()" /></div>
    <table id="listable" class="display">
    	<thead>
            <tr>		
                <th>Hwb-Reservacion</th>
                <th>Nombre Des</th>
                <th>Pais Destino</th>
                <th>Fecha de vuelo</th>
                <th># vuelo</th>
                <th></th>
            </tr>
        </thead>
		<tbody>
			<?php foreach($listInfo=sel2("1=1") as $listData): ?>
            <tr>	
                <td><?php echo $listData[0] ?></td>
                <td><?php echo $listData[1] ?></td>
                <td><?php echo $listData[2] ?></td>
                <td><?php echo $listData[3] ?></td>
                <td><?php echo $listData[4] ?></td>
                <td>
                    <input type="button"  style="width:27px" class="edit" value="" onClick="abre_upd(<?php echo $listData["5"]?>)" />
                    <input type="button" class="del" value="Borrar" onClick="abre_del(<?php echo $listData["5"]?>)" />
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