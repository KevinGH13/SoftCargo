<?php

require('ctrl_report.php');

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Impresion</title>
	<script src="http://code.jquery.com/jquery-1.9.0.js"></script>
    <script type="" src="validate.js"></script>
    <link rel="stylesheet" type="text/css" href="style_report.css">
    <link rel="stylesheet" type="text/css" href="style_print.css" media="print">
    <style type="text/css">
    	th, td {
   width: 10% !important;}
    </style>
  </head>
  <body onload="getf();">
  <?php
  $ctry = 0; $agt = 0; $qr ="";
  if(isset($_REQUEST['p']) ) {$ctry = $_REQUEST['p']; }
  if(isset($_REQUEST['q']) ) {$agt = $_REQUEST['q']; }
           $ddf = $_REQUEST['ddf'];
           $ddh = $_REQUEST['ddh'];
           $fecha = " $ddf AND $ddh";
        if($agt != 0){
          $qr = " AND G.var_Agente = $agt";
        }


  ?>
<div>
<strong><p id="f"> PAGO DE FACTURAS POR AGENT </p><p><?php  if($ctry !=0){ foreach($listInfo=seliata("int_Pais=".$ctry) as $listD): echo "Pais: ".$listD[0]; endforeach; } ?></p></strong>
 <input type="button"  class="btn" name="imprimir" value="Imprimir" onclick="window.print();" />
</div>
      <div style="">

          <table  border="1" cellspacing="0" cellpadding="2"  style="width:100% text-align: center; " >
            <thead>
            <tr>        
                <th>#</th>
                <th>Numero de Guia</th>
                <th>numero alterno</th>
                    
                
                <th>Cobros</th>
                 <th>Servicio</th>
                <th>Tipo de Pago</th>
                <th>Agente</th>
                <th>Fecha Creacion</th>
               
     
            </tr>
            </thead>
             <tbody>
            <?php $cont=1;foreach($listInfo=sel($fecha." ".$qr,$ctry," ") as $listData): ?>
            <tr>    
                <td><?php echo $cont ?></td>
                <td><?php echo $listData[1] ?></td>
                <td><?php echo $listData[2] ?></td>
                <td class="tbl-total" ><?php  foreach($listInfo=selcobe("int_ID=".$listData[0]) as $listc): echo number_format($listc[1],2,",","."); endforeach; ?></td>
                <td><?php  foreach($listInfo=selserv($listData[27]) as $lists): echo $lists[0]; endforeach; ?></td>
                <td><?php echo $listData[5] ?></td>
                <td><?php  foreach($listInfo=selagent("int_ID=".$listData[3]) as $listD): echo $listD[1]; endforeach; ?></td>
                <td class="date"><?php echo $listData[4]; $cont=$cont +1 ; ?></td>
                

                                         

            </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
          <tr>
                <th></th>
                <th></th>
                <th></th>
                <th ><?php foreach($listInfo=selcobet($fecha." ".$qr,$ctry) as $listData): echo $listData[1]; endforeach; ?></th>
                <th></th>
                <th></th>
                <th></th>
                   <th></th>
          </tr>
        </tfoot>
          </table>
    </div>

  </body>
</html>
