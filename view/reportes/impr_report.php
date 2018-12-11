<?php

require('ctrl_report.php');

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Imprecion de facturas</title>
    <script src="http://code.jquery.com/jquery-1.9.0.js"></script>
    <script type="" src="validate.js"></script>
    <link rel="stylesheet" type="text/css" href="style_report.css">
    <link rel="stylesheet" type="text/css" href="style_print.css" media="print">
    </head>
  <body onload="getf()">
  <?php
  $ctry = 0; $agt = 0; $qr ="";$sv = 0;
  if(isset($_REQUEST['sv']) ) {$sv = $_REQUEST['sv']; }
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
 <strong><p>Reporte de Cierre de caja <?php  if($ctry !=0){ foreach($listInfo=seliata("int_Pais=".$ctry) as $listD): echo "Pais: ".$listD[0]; endforeach; } ?></p> <p id="f">   </p> </strong>
</div>
      <div style="">
      <form name='formInsert' id="formInsert" >
        <input type="hidden" name="act" id="act" value="updP">
          <table  border="1" cellspacing="0" cellpadding="2" style="width:100%; text-align: center; " id="tblimpr"><input class="btn" type="button" name="imprimir" value="Imprimir" onclick="window.print();" >
            <thead>
            <tr>        
                <th style="    width: 150px;">#</th>
                <th>Numero de Guia</th>
                <th>Numero alterno</th>
                <th>Agente</th>
                <th>Fecha Creacion</th>
                <th>Peso</th>
                <th>Asegurado</th>
                <th>Declarado</th>
                 <th>Tipo de Pago</th>
                <th>Cobradas</th>  
     
            </tr>
            </thead>
             <tbody>
            <?php $cont=1;foreach($listInfo=sel("".$fecha." ".$qr,$ctry," AND srv.int_cod = ".$sv) as $listData): ?>
            <tr align="center">    
                <td  style="    width: 150px; padding-right: 1%;   padding-left: 1%;"><?php echo $cont ?></td>
                <td><?php echo $listData[1] ?></td>
                <td><?php echo $listData[2] ?></td>
                <td ><?php  foreach($listInfo=selagent("int_ID=".$listData[3]) as $listD): echo $listD[1]; endforeach; ?></td>
                <td><?php echo $listData[4] ?></td>
                <td class="tbl-wght"  ><?php echo $listData[6] ?></td>
                <td class="tbl-seg" ><?php echo $listData[23] ?></td>
                <td class="tbl-imp" ><?php echo $listData[25];$cont=$cont +1 ; ?></td>
                 <td><?php echo $listData[5] ?></td>
                                         
                <td>
                 <input type="checkbox" name="cbr[]" onclick="cheked(<?php echo $listData[0]; ?>,<?php echo $cont-2; ?> )" <?php echo ($listData[28]==1 ? 'checked' : '');?>>
                 <input type="checkbox" name="cbrf[]" hidden <?php echo ($listData[28]==1 ? 'checked' : '');?>>
               
                </td>
            </tr>
            <?php endforeach; ?>
            </tbody>
              <tfoot>
                <tr>
                <th  style="    width: 150px;"></th>
                <th></th>
                <th> </th>
                <th></th>
                <th>Total: </th>
                <th ><?php  foreach($listInfo=selcobros("G.decimal_PesoCobrado","".$fecha." ".$qr,$ctry," AND srv.int_cod = ".$sv) as $listc): echo number_format($listc[0],2,",","."); endforeach; ?></th>
                <th ><?php  foreach($listInfo=selcobros("G.int_SegEmpresa","".$fecha." ".$qr,$ctry," AND srv.int_cod = ".$sv) as $listc): echo number_format($listc[0],2,",","."); endforeach; ?></th>
                <th ><?php  foreach($listInfo=selcobros("G.int_ImpEmpresa","".$fecha." ".$qr,$ctry," AND srv.int_cod = ".$sv) as $listc): echo number_format($listc[0],2,",","."); endforeach; ?></th>
                <th></th> 
                <th></th> 
                </tr>
              </tfoot>
            </table>
      </form>
    </div>
<script type="text/javascript">

$(document).ready(function() {

var sum1 = 0;var sum2 = 0;var sum = 0;

$('.tbl-wght').each(function (i) {

    sum += parseInt($('.tbl-wght')[i].innerHTML);
     sum1 += parseInt($('.tbl-seg')[i].innerHTML);
      sum2 += parseInt($('.tbl-imp')[i].innerHTML);
  $('.t-wght').html( sum.toFixed(2) );
  $('.t-seg').html(  sum1.toFixed(2) );
  $('.t-imp').html(  sum2.toFixed(2) );
});


});

</script>
  </body>
</html>
