<html>
<head>
	<title>Facturas</title>
    <?php require('../../librerias.php'); ?>
    <?php require('ctrl_tracking.php'); ?>
    <?php if (isset($_REQUEST['nfactura'])) {
        $con = "int_Guia = ".$_REQUEST['nfactura']."";
    }else if(isset($_REQUEST['query'])){
        $con = $_REQUEST['query'];
        $con = str_replace("AND", " AND ", $con);
       //  $con = str_replace("OR", " OR ", $con);
        echo "<script>alert(".$con.")</script>";
    } 
    else{
        $con = "1=1";
        } 
        if (isset($_REQUEST['fechaDesde']) AND isset($_REQUEST['fechaHasta'])){
        $date1 =$_REQUEST['fechaDesde'];
        $date2 =$_REQUEST['fechaHasta'];
        $date = "$date1 AND $date2";
        $con = $con." AND (date_FechaEnvio BETWEEN $date )";
        }
    ?>

</head>
<body>

<?php require('../menu.php'); ?>
    <h1> <div class="icon-cube"> Facturas</div> </h1>

    <div align="right"><input type="button" class="add" value="Agregar Nuevo" onClick="abre_add()" /></div>

    <table id="listable" class="display">
    	<thead>
            <tr>
                <th># factura</th>
                <th>Alterno</th>
                <th>Fecha</th>
                <th>Peso</th>
                <th>Remitente</th>
                <th>Tel/Remit</th>
                <th>Destinatario</th>
               
                <th>Tel/Dest</th>
                <th>Iata</th>
                <th>Ult. Registro</th>
                <th></th>
            </tr>
        </thead>
		<tbody>
            <?php $SIAgente = '1=1'  ; if ($int_IDagente != '0') {$SIAgente = "var_Agente = ".$int_IDagente;}?>
			<?php foreach($listInfo=selindex($con,$SIAgente) as $listData): 
             ?>
            <tr>
                <td ><a <?php if( $listData[10] == 1){  ?>  style="color:#8ac149 !important;"  <?php } ?> href="details_tracking.php?nfactura=<?php echo $listData[1]; ?>">  <?php echo $listData[1]  ?> </a></td>
                
                <td><?php echo $listData[2] ?></td>
               
                 <td ><p class="date"><?php echo $listData[3] ?></p></td>
                <td ><?php echo $listData[4] ?></td>
                <td><?php echo $listData[5] ?></td>
                <td><?php echo $listData[6] ?></td>
                <td><?php echo $listData[7] ?></td>
                <td><?php echo $listData[8] ?></td>
                <td><?php  foreach($listInfo=seliata("int_ID=".$listData[9]) as $listD): echo $listD[4]; endforeach; ?></td>
                 <td><?php  foreach($listEstados=selstatu($listData[1]) as $listest): echo $listest[0]; endforeach; ?></td>
                <td>
                    <input type="button" class="edit" value="Detalles" onClick="abre_upd(<?php echo "'".$listData["1"]."'";?>)" />
                   
                </td>
            </tr>
			<?php endforeach; ?>
        </tbody>
	</table>
    </div>

    <script languaje="javascript">nav();</script>
	<script languaje="javascript">dataView();</script>
    <script language="javascript">function del_toast(tipo, mensaje){$().toastmessage(tipo, mensaje);}</script>
    <script type="text/javascript">
        pcss(s){
            alert("sa");
        }
    </script>
</body>
</html>
