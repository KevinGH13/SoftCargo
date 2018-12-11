<?php

require('ctrl_report.php');

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Facturas Pagas</title>
    <script src="http://code.jquery.com/jquery-1.9.0.js"></script>
    <script type="" src="validate.js"></script>
    <link rel="stylesheet" type="text/css" href="style_report.css">
    <link rel="stylesheet" type="text/css" href="style_print.css" media="print">
    </head>
  <body onload="getf()">
  <?php
  $ctry = 0; $agt = 0; $qr ="";$sv = 1;
  if(isset($_REQUEST['p']) ) {$ctry = $_REQUEST['p']; }
  if(isset($_REQUEST['sv']) ) {$sv = $_REQUEST['sv']; }
  if(isset($_REQUEST['q']) ) {$agt = $_REQUEST['q']; }
   $ddf = $_REQUEST['ddf'];
           $ddh = $_REQUEST['ddh'];
        $fecha = " $ddf AND $ddh";
        if($agt != 0){
        $qr = " AND G.var_Agente = $agt";
        }


         ?>

<div>
 <strong>Facturas Pagas  <p><?php  if($ctry !=0){ foreach($listInfo=seliata("int_Pais=".$ctry) as $listD): echo " Pais: ".$listD[0]; endforeach; } ?></p> 
  <p id="f" style="display: table-cell;"></p> </strong>
</div>
      <div style="">
      <form name='formInsert' id="formInsert" >
        <input type="hidden" name="act" id="act" value="updP">
          <table  border="1" cellspacing="0" cellpadding="2" style="width:100%; text-align: center; " id="tblimpr"><input class="btn" type="button" name="imprimir" value="Imprimir" onclick="window.print();" >
            <thead>
            <tr>        
                <th>#</th>
                <th>Numero de Guia</th>
                <th>numero alterno</th>
                <th>Agente</th>
               
                <th>Fecha Pago</th>
                <th>Tipo de pago</th>
       
     
            </tr>
            </thead>
             <tbody>
            <?php $cont=1;foreach($listInfo=sel("".$fecha." ".$qr." AND G.int_Pago = 1",$ctry," AND srv.int_cod = ".$sv) as $listData): ?>
            <tr align="center">    
                <td><?php echo $cont ?></td>
                <td><?php echo $listData[1] ?></td>
                <td><?php echo $listData[2] ?></td>
                <td ><?php  foreach($listInfo=selagent("int_ID=".$listData[3]) as $listD): echo $listD[1]; endforeach; ?></td>
                <td class="date"><?php echo $listData[29] ?></td>
               
                <td ><?php echo $listData[5];$cont=$cont +1 ; ?></td>
                                         

            </tr>
            <?php endforeach; ?>
            </tbody>
            
            </table>
      </form>
    </div>

  </body>
</html>
