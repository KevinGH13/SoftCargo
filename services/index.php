<html>
<head>
	<title>Servicios</title>
    <?php require('../../librerias.php'); ?>
    <?php require('ctrl_service.php'); ?>
</head>
<body>
<?php require('../menu.php'); ?>
    <h1> <div class="icon-magic">Servicios</div> </h1>
    
    <div align="right"><input type="button" class="add" value="Agregar Nuevo" onClick="abre_add()" /></div>
    <table id="listable" class="display">
    	<thead>
            <tr>		
                <th>ID</th>
                <th>Servicio</th>
                <th>Lu</th>
                <th>Ma</th>
                <th>Mi</th>
                <th>Ju</th>
                <th>Vi</th>
                <th>Sa</th>
                <th>Do</th>
                <th>Desde</th>
                <th>Hasta</th>
                <th>Acciones</th>
            </tr>
        </thead>
		<tbody>
			<?php foreach($listInfo=sel("1=1") as $listData): ?>
            <tr>	
                <td><?php echo $listData[0] ?></td>
                <td><?php echo $listData[1] ?></td>
                <td><?php echo $listData[2] ?></td>
                <td><?php echo $listData[3] ?></td>
                <td><?php echo $listData[4] ?></td>
                <td><?php echo $listData[5] ?></td>
                <td><?php echo $listData[6] ?></td>
                <td><?php echo $listData[7] ?></td>
                <td><?php echo $listData[8] ?></td>
                <td><?php echo $listData[9] ?></td>
                <td><?php echo $listData[10] ?></td>
                <td>
                    <input type="button" class="edit" value="Editar" onClick="abre_upd(<?php echo $listData["0"]?>)" />
                    <input type="button" class="del" value="Borrar" onClick="abre_del(<?php echo $listData["0"]?>)" />
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