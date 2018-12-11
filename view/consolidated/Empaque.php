<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Empaque</title>
    <?php if(isset($_GET['id_con'])){$intID_Con=$_GET['id_con']; }else{echo ""; }?>
    <?php require('../../librerias.php'); ?>
    <?php require('ctrl_Empaque.php'); ?>
  </head>
  <?php require('../menu.php'); ?>
  <?php $array = array() ; ?>
  <?php $arrayTypo = array(); ?>
  <body>
    <div title="Crear Empaque" id="crear" >
      <table>
        <tr>
          <td>Numero Empaque : </td><td><input type="text" id="Numero" placeholder="# Empaque" style="width:150px"></td>
        </tr>
        <tr>
          <td>Tipo Empaque : </td>
          <td>
          <script type="text/javascript"> var tEm = [];</script>
          <select id="Tipo" style="width:150px" onchange="C_T(this.value);">
              <option value="0">Elegir Tipo</option>
              <?php foreach($listInfo=selTipo() as $listData): ?>
              <option value="<?php echo $listData[0]?>"><?php echo $listData[1]?></option>
              <?php array_push($arrayTypo, [$listData[0], $listData[1]]); ?>
              <?php endforeach;?>
          </select>
        </td>
        </tr>
        <tr>
          <td>  <input type="button" class="Btn" value="Crear Empaque" style="width:190px;" onclick="addEmpa(<?php echo $intID_Con; ?>);"></td>

        </tr>
        <tr><td><p id="t"></p></td></tr>
      </table>
    </div>
    <h1>Empaques Consolidado # <?php echo $intID_Con; ?></h1>
   
       <center>
       <input type="button" style="width:180px" value="Crear Nueva Bolsa" class="Btn" onclick="$('#crear').dialog('open');">
       <input type="button" value="Translado de paquete" class="Btn" style="width:200px;" onclick="">
       <input type="button" value="Reporte Empaques" class="Btn" style="width:200px" onclick="window.open('http://www.easycargopro.com/ECP/view/Empaque/Rep_Emp.php?Conso=<?php echo $intID_Con ?>','_blanck')">
       <input type="button" value="Atras "  class="Btn" onclick="window.open('../consolidated/details_con.php?id_con=<?php echo $intID_Con ?>','_blanck')">
       </center>
       <br>
    <div id="divBolsas">
    <?php $i=0; ?>
    <?php foreach ($listInfo=selEmp("$intID_Con") as $listData2) :?>
          <?php $Ncorto =  substr($listData2[2],-4); ?>
          <div id="<?php echo $listData2[2];?>" style="width:200px;height:200px;background-color:#323C50;margin: 10px;display: inline-block;">
            <center><p>Numero de bolsa : <?php echo $Ncorto;?></p></center>
            <?php foreach ($arrayTypo as $Tipo): ?>
              <?php if ($listData2[3] == $Tipo[0]): ?>
                <center><p>Tipo Empaque : <?php echo $Tipo[1];?></p></center>
                <?php array_push($array, [$Ncorto,$listData2[2],$Tipo[1]]); ?>
                <script>cColor(<?php echo $listData2[2]; ?>);</script>
              <?php endif ?>
            <?php endforeach ?>
            <center><input type="button" value="Abrir Bolsa" class="Btn" onclick="addFact('<?php echo $listData2[2] ?>','<?php echo $Ncorto;?>');"><input type="Button" style="width:35px" class="del" onclick="del_Empaque('<?php echo $listData2[2] ?>','<?php echo $Ncorto;?>');"></center>
          </div>
          
    <?php $i++; ?>
    <?php endforeach;
    echo "<script > divs =".$i."  </script>";
    ?>
    
    </div>
    <div id="modal">
      <h2 id="txtBolsa"></h2>
      <table>
      	<tr>
      		<td>
      		<table width="100%" class="display" id="tbl_fac">
      		  <thead>
      		    	<tr>
      		    		<th># Factura</th>
      		    		<th>Destino</th>
     			    	  <th>Opciones</th>
     			    </tr>
      		    </thead>
      		    <tbody id="GenerarTa" style="width:370px;height:600;overflow:auto">
      		    	
      		    </tbody>
      		</table>
      		</td>
      		<td>
        <table id="listable" class="display">
      	  <thead>
            <tr>        
                 <th># Factura</th>
                <th>Remitente</th>
                <th>Destinatario</th>
                <th>Peso Lbs</th>
                <th>valor decl</th>
                <th>valor seg</th>
                <th>Unidades</th>
                <th></th>
            </tr>
      	  </thead>
      	  <tbody>
      	  <?php foreach($listInfo=sel("int_ID=".$intID_Con) as $listDat): $valorD=$listDat[8];endforeach;  ?>  
            <?php foreach($listInfo=sel8("1=1 AND int_NEmpaque = 0") as $listData): ?>
              
            <tr>    
                <td><?php echo $listData[1] ?></td>
                <td><?php echo $listData[2] ?></td>
                <td><?php echo $listData[3] ?></td>
                <td><?php echo $listData[4] ?></td>
                <td><?php echo $listData[5] ?></td>
                <td><?php echo $listData[5] ?></td>
                <td><? if($listData[1]!=null){echo"1/1";} ?></td>               
                <td>
                <? if($listData[1]!=null){ ?>
                    <input type="button" class="add" value=""  style="width:40px; margin-top:2px;" onClick="exe_fact('<?php echo $listData[1] ?>');" />
                    <? }?>
                </td>
            </tr>
            <?php endforeach; ?>
      	  </tbody>
    	  </table>	
      		</td>
      	</tr>
      </table>
      	
     
    </div>
    <div id="comfirmar" title="Eliminar Empaque">
      <p>Que desea Hacer con las facturas las cuales pertenecen al Empaque #</p>
      <p id="txtEmpaque"></p>
    </div>
    <div id="cambiar" title="Trasladar Facturas ">
      <p id="origenEmp"></p>
      <p id="origenCon"></p>
      <p>Selecciones Empaque : </p>
      <table id="EmpaBusq" class="display">
        <thead>
          <th># Consolidado</th>
          <th># Empaque</th>
          <th>Tipo</th>
          <th></th>
        </thead>
        <tbody>
          <?php foreach ($array as $value): ?>
           <tr>
             <td style="Color:#21A464">Actual</td>
             <td><?php echo $value[0]; ?></td>
             <td><?php echo $value[2]; ?></td>
             <td hidden > <?php echo $value[1]; ?></td>
           </tr> 
           <?php endforeach ?>
          <?php foreach ($listInfo =selEmp2($intID_Con)  as $value2): ?>
            <tr>
              <td><?php echo $value2[0] ;?></td>
              <td><?php echo substr($value2[1],-4);?></td>
              <?php foreach ($arrayTypo as $Tipo): ?>
              <?php if ($value2[2] == $Tipo[0]): ?>
                <td><?php echo $Tipo[1];?></td>
              <?php endif ?>
              <?php endforeach ?>
              <td hidden><?php echo $value2[1]; ?></td>
             </tr>
          <?php endforeach ?>
        </tbody>
     </table>
     
      
     

    </div>
  </body>
  </div>
  <script languaje="javascript">nav();</script>
  <script languaje="javascript">dataView();</script>
  <script language="javascript">function del_toast(tipo, mensaje){$().toastmessage(tipo, mensaje);}</script>

</html>
