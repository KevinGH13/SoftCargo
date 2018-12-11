<html>
<head>
	<title>Rutas</title>
    <?php require('../../librerias.php'); ?>
    <?php require('ctrl_rutas.php'); ?>
</head>
<body>
<?php require('../menu.php'); ?>
    <h1> <div class="icon-magic">Rutas</div> </h1>
    
    <table id="listable" class="display">
    	<thead>
            <tr>		
                <th>ID</th>
                <th>Rutas</th>
                <th>Direccion</th>
                <th>Ciudad</th>
                <th>Estado</th>
                <th>Pais</th>
                <th>Telefono</th>
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
                <td><?php echo $listData[7] ?></td>
                <td>
                    <input type="button" class="edit" value="Editar" onClick="abre_upd(<?php echo $listData["0"]?>)" />
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