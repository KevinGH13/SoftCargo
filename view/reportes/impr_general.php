<?php

require('ctrl_report.php');

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Imprecion de facturas</title>

    <script type="" src="validate.js"></script>
    <style media="print">
      *{
        margin: 0px !important;
        padding: 0px !important;
        border-spacing: 0px !important;
      }
      td{
        border-spacing: 0px !important;
        text-align: center;
        min-height: 20px;
      }
    </style>
  </head>
  <body onload="getf()">
<div>
  <h1 id="f"> <h1>
</div>
      <div style="">

          <table  border="1" style="width:100%">
            <thead>
            <tr>        
                <th>#</th>
                <th>Numeor de Guia</th>
                <th>numero alterno</th>
                <th>Agente</th>
                <th>Fecha Creacion</th>
                <th>Peso</th>
                <th>Asegurado</th>
                <th>Declarado</th>
                <th>Cobradas</th>  
     
            </tr>
            </thead>
             <tbody>
            <?php $cont=1;foreach($listInfo=sel(" ") as $listData): ?>
            <tr>    
                <td><?php echo $cont ?></td>
                <td><?php echo $listData[1] ?></td>
                <td><?php echo $listData[2] ?></td>
                <td><?php  foreach($listInfo=selagent("int_ID=".$listData[3]) as $listD): echo $listD[1]; endforeach; ?></td>
                <td><?php echo $listData[4] ?></td>
                <td><?php echo $listData[6] ?></td>
                <td><?php echo $listData[23] ?></td>
                <td><?php echo $listData[25];$cont=$cont +1 ; ?></td>
                                         
                <td>
                 <input type="checkbox" name="" id="" />
                 
               
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
          <tr>
                <th>#</th>
                <th>Numeor de Guia</th>
                <th>numero alterno</th>
                <th>Agente</th>
                <th>Fecha Creacion</th>
                <th>Peso</th>
                <th>Asegurado</th>
                <th>Declarado</th>
                <th>Cobradas</th> 
          </tr>
        </tfoot>
          </table>
    </div>

  </body>
</html>
