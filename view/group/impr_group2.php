<?php
require('../../modelo.php');
require('ctrl_group.php');
$id_group = $_REQUEST['id_group'];
?>
<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8">
    <title>Imprecion de facturas</title>
    <link rel="stylesheet" href="../../css/formato_imprecion.css" media="screen">
    <link rel="stylesheet" href="../../css/imprecion.css" media="print">
    <script src="http://code.jquery.com/jquery-1.9.0.js"></script>
    <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script src="validate_imprecion.js"></script>
  </head>
  <body>
    <?php foreach ($listInfo=selEmpresa() as $value2): ?>
      <h1><?php echo $value2[1] ?></h1>
      <?php $listGroup = sel("int_ID=".$id_group); ?>
      <table width="100%">
        <tr style="background-color:#FFFF00;"><td>CREADO</td><td><?php echo $listGroup[0][1] ?></td><td># de GRPcon </td><td><?php echo $id_group ?></td></tr>
        <tr><td style="background-color:#E8E8E8;">ORIGEN</td>
        <td><?php echo $listInfo[0][1] ?><br><?php echo $listInfo[0][2] ?><br>
        <?php echo $listInfo[0][6] ?><br><?php echo $listInfo[0][3] ?>,<?php echo $listInfo[0][5] ?>
        <?php $agenteDe = sel4('int_ID = '.$listGroup[0][4]); ?>
        <script>array.push(<?php echo $id_group ?>)</script>
        <script>idGru = <?php echo $id_group ?></script>
        </td><td style="background-color:#E8E8E8;">DESTINO</td><td><?php echo $agenteDe[0][0] ?><br><?php echo $agenteDe[0][2] ?><br><?php echo $agenteDe[0][3] ?>,<?php echo $agenteDe[0][4] ?></td></tr>
        <tr><td></td><td></td><td style="background-color:#E8E8E8;">PAIS DESTINO</td><td><?php echo $agenteDe[0][4] ?></td></tr>
        <tr id="ocultar" class="nov" colspan="4"><td><input type="button" value="Imprimir" onclick="imprimir(<?php echo $id_group ?>)"></td><td><input type="button" value="imprimir Guias Hijas" onclick="imprimirHijas('<?php echo $id_group ?>');" ></td><td><input type="button" value="XLS"></td></tr>
        <tr id="visible" class="visi" ><td><input type="button" value="Guardar X" onclick="guardar();"><input type="button" value="Imprimir X" onclick="imprimirHijas(<?php echo $id_group."".rand(0,100) ?>);">
		<input type="button" value="Seleccionar Repetidos" onclick="sel_rep();">
        <input type="button" value="Cambiar Repetidos" onclick="changeX();"></td></tr>
      </table>
    
    <?php endforeach; ?>
    <br>
   
    <table id="impre" width="100%">
        <tr>
          <th># GUIA</th>
          <th>REMITENTE</th>
          <th>DESTINATARIO</th>
          <th>DEC.</th>
          <th>PESO</th>
          <th>PIEZAS</th>
          <th>ADUANAS US</th>
        </tr>
        <tbody>
        <?php $i = 0; $peso = 0;?>
        <?php foreach ($listInfo = selimpre($id_group) as $value) : ?>
          <tr>
            <td><qa id="e<?php echo $i ?>0"><?php echo $value[0] ?><qa></td>
            <td>
            <?php echo $value[2] ?><br>
            <?php echo $value[3] ?><?php echo $value[4] ?><br>
            <?php echo $value[5] ?>, <?php echo $value[6] ?>, <?php echo $value[7] ?></td>
            <td>
            <input value="<?php echo $value[8] ?>" class="ed" id="e<?php echo $i ?>1" type="text"><br>
            <input value="<?php echo $value[9] ?>" class="ed"id="e<?php echo $i ?>2" type="text"><input class="ed" value="<?php echo $value[10] ?>" id="e<?php echo $i ?>3" type="text"><br>
            <?php echo $value[11] ?>, <?php echo $value[12] ?>, <?php echo $value[13] ?></td>
            <td><center><input value="<?php echo $value[14] ?>" style="width: 40px;" id="e<?php echo $i ?>4" type="text" class="ed"></center></td>
            <td><input class="ed" value='<?php  $pesoL = $value[15]; echo $value[15]; ?>' style="width: 45px;" id="e<?php echo $i ?>5" onchange="change2(<?php echo $i ?>);" type="text"> LB[ <input type="text" style="width:30px" id="e<?php echo $i ?>6" onchange="change3(<?php echo $i ?>);" value = '<?php  $S = $pesoL*0.453592 ; echo round($S,2); ?>'> Kg]</td>
            
            <td>1</td>
            <td><b>3055H</b></td>
          </tr>
          <tr style=""><td> Descripción : <?php echo $value[16] ?> </td></tr>
          <tr><td colspan="8"><hr></td></tr>
          <?php $i++;  $peso += $pesoL ;?>
          <script>numero = <?php echo $i; ?>;</script>
          <?php endforeach ?>
        </tbody>

      </table>
      <script>TotalPeso = <?php echo round($peso,2); ?></script>
      <table width="40%">
        <tr><td>TOTAL BOLSAS</td><td><input type="text" style="width: 25px;" onfocus="$(this).css('border-color', 'transparent !important');" value="<?php $Cbolsas = selBolsas($id_group);  echo $Cbolsas[0][0]."";?>">  </td></tr>
        <tr><td>TOTAL GUIAS</td><td><input type="text" style="width: 25px;" value="<?php echo $i ?>"> </td></tr>
        <tr><td onclick='change();'>TOTAL PIEZAS</td><td><input type="text" style="width: 25px;" value="<?php echo $i ?>"> </td></tr>
        <?php if ($listGroup[0][6]== 0 and $listGroup[0][7]== 0): ?>
          <tr><td>TOTAL PESO</td><td><input type="text" style="width: 80px;" id="LB" value="<?php echo round($peso,2) ?>">LB [<input id="KG" type="text" style="width: 80px;" value=" <?php echo round($peso*0.453592,2) ?>">KG]</td></tr>
        <?php else:  ?>
          <tr><td>TOTAL PESO</td><td><input type="text" style="width: 80px;" id="LB" value="<?php echo $listGroup[0][6] ?>">LB [<input id="KG" type="text" style="width: 80px;" value=" <?php echo $listGroup[0][7] ?>">KG]</td></tr>
        <?php endif; ?>
        <tr class="visi"><td>TOTAL Veridico :</td><td><p id="PV"></p></td></tr>
      </table>
      
    
  </body>

</html>
