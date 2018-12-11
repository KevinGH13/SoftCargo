<html>
<head>
	<title>Novedades</title>
    <?php require('../../librerias.php'); ?>
    <?php require('ctrl_news.php'); ?>
</head>
<body>
<?php require('../menu.php'); ?>
	<h1> <div class="icon-magic">Novedades</div> </h1>
    
    <div align="right"><input type="button" class="add" value="Agregar Nuevo" onClick="abre_add()" /></div>
    <table id="listable" class="display">
    	<thead>
            <tr>		
                <th>ID</th>
                <th>Título</th>
                <th>Novedad</th>
                <th>Agencia</th>
                <th>Publicada</th>
                <th>Acciones</th>
            </tr>
        </thead>
		<tbody>
			<?php foreach($listInfo=sel("1=1") as $listData): ?>
            <tr>	
                <td><?php echo $listData[0] ?></td>
                <td><?php echo $listData[1] ?></td>
                <td><?php echo substr($listData[2],0,80)."..."; ?></td>
                <td><?php echo $listData[3] ?></td>
                <td><?php echo $listData[4] ?></td>
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