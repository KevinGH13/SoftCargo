<html>
<head>
	<title>Agentes</title>
    <?php require('../../librerias.php'); ?>
    <?php require('ctrl_agent.php'); ?>
</head>
<body>
<?php require('../menu.php'); ?>
    <h1> <div class="icon-cube"> Agentes <?php echo $tipoAg; ?></div> </h1>
    <?php $inttp=$_GET['t']; ?>
    <div align="right"><input type="button" class="add" value="Agregar Nuevo" onClick="abre_add()" /></div>
    <table id="listable" class="display">
    	<thead>
            <tr>		
                <th>ID</th>
                <th>Agente</th>
                <th>Direccion</th>
                <th>Ciudad</th>
                <th>Pais</th>
                <th>CodZip</th>
                <th>Telefono</th>
                <th>Acciones</th>          
            </tr>
        </thead>
		<tbody>
			<?php foreach($listInfo=sel("1=1 AND int_TipoAgente = $tipo") as $listData): ?>
            <tr>	
                <td><?php echo $listData[0] ?></td>
                <td><?php echo $listData[1] ?></td>
                <td><?php echo $listData[2] ?></td>
                <td><?php echo $listData[3] ?></td>
                <td><?php echo $listData[5] ?></td>
                <td><?php echo $listData[6] ?></td>
                <td><?php echo $listData[7] ?></td>
                                                      
                <td>
                <?php if ($tipo == 1): ?>
                    <input type="button" class="rate" value="Tarifas" onClick="abre_rate(<?php echo $int_ID;?>,<?php echo $listData["0"];?>)" />
                    <input type="button" class="rate" value="Impuestos" onClick="abre_tax(<?php echo $int_ID;?>,<?php echo $listData["0"];?>)" />
                    <input type="button" class="rate" value="Seguros" onClick="abre_insurance(<?php echo $int_ID;?>,<?php echo $listData["0"];?>)" />
                    <input type="button" class="edit" value="Editar" onClick="abre_upd(<?php echo $listData["0"]?>)" />
                    <input type="button" class="dell" value=" " onClick="abre_del(<?php echo $int_ID;?>,<?php echo $listData["0"]?>)" />
                <?php else: ?>
                    <input type="button" class="edit" value="Editar" onClick="abre_upd(<?php echo $listData["0"]?>)" />
                    <input type="button" class="dell" value=" " onClick="abre_del(<?php echo $inttp;?>,<?php echo $listData["0"]?>)" />
                <?php endif; ?>
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
