<html><head>
    <title>Transportadora</title>
    <?php require('../../librerias.php'); ?>
    <?php require('ctrl_transporter.php'); ?>

</head>
<body>
<?php require('../menu.php'); ?>
    <h1> <div class="icon-truck"> Transportadora</div> </h1>
     <?php $emp; foreach($listInfo=sel2("int_ID=".$intID) as $listD){ $emp= $listD[0];} ?>
    <div align="right"><input type="button" class="add" value="Agregar Nuevo" onClick="abre_add()" /></div>
     <table id="listable" class="display">
        <thead>
            <tr>        
                <th>#</th>
                <th>Nombre</th>
                <th>Direccion</th>
                <th>Ciudad</th>
                <th>Estado</th>
                <th>Pais</th>
                <th>Zip</th>
                <th>Telefono</th>
                <th>Email</th>  
                <th>Contacto</th>   
                <th></th>          
            </tr>
        </thead>
        <tbody>
            <?php $cont=1;foreach($listInfo=sel("int_ID_Empresa=".$emp) as $listData): ?>
            <tr>    
                <td><?php echo $cont ?></td>
                <td><?php echo $listData[1] ?></td>
                <td><?php echo $listData[2] ?></td>
                <td><?php echo $listData[3] ?></td>
                <td><?php echo $listData[4] ?></td>
                <td><?php echo $listData[5] ?></td>
                <td><?php echo $listData[6] ?></td>
                <td><?php echo $listData[7] ?></td>   
                <td><?php echo $listData[8] ?></td>
                <td><?php echo $listData[9]; $cont=$cont +1 ; ?></td>                                            
                <td>
                 <input type="button" class="del" value="Editar" onClick="abre_upd(<?php  echo $listData["0"]?>)" />
                    <input type="button" class="del" value="Borrar" onClick="abre_del(<?php echo $listData["0"] ?>)" />
               
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