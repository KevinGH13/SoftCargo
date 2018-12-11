<html>
<head>
	<title>Info Con</title>
    <?php require('../../librerias.php'); ?>
    <?php require('ctrl_con.php'); ?>
     <?php if(isset($_GET['id_con'])){$intID_Con=$_GET['id_con']; }else{echo "<script language='javascript'>  window.location.href = 'http://www.easycargopro.com/ECP/index.php' ;</script>"; }?>
      <?php $intID=$_REQUEST['id']; ?>
</head>
<body>
<?php require('../menu.php'); ?>
    <h1> <div class="icon-magic">Info Consolidados</div> </h1>
    <tr>
        <!--                        Consolidado                                     -->
          <td><div><div class="tablasFondo" style="height: 55%"> <table  width="80%" align="center" style="height:50%;">
          <?php foreach($listInfo=sel("int_ID=".$intID_Con) as $listData): ?>
            <tr>
              <td colspan="4"></td>
            </tr>
            <tr>
              <td colspan="4"><input type="hidden" name="act" id="act" value="add"></td>
            </tr>
            <tr>

              <td style="width:107px;" align="right" ><h1 style="font-size: 25px;">ORIGEN:</h1> </td>
              <td > <?php foreach($listInfo=sel3("1=1 AND int_ID=".$listData[1]) as $listData1): if($listData1[2] == ""){echo "no hay datos";}else{echo $listData1[1];} endforeach?> </td>

              <?php
              $DestinoN= $listData[3];
              $DestinoDirCity = "";
              $Country = "";
              try {

                foreach($listInfo=sel2("1=1 AND int_ID=".$listData[3]) as $listData2){ 
                  $DestinoN =  $listData2[1]; 
                  $DestinoDirCity = $listData2[2]." / ".$listData2[3];
                   $Country = strtoupper($listData2[4]." - ".$listData2[5]); }
        
                
              } catch (Exception $e) {
            foreach($listInfo=sel3("1=1 AND int_ID=".$listData[3]) as $listData2){ $DestinoN =  $listData2[1]; }
              foreach($listInfo=sel3("1=1 AND int_ID=".$listData[3]) as $listData2){ $DestinoDirCity = $listData2[2]." / ".$listData2[3]; } 
              foreach($listInfo=sel4(" int_Pais=".$listData[4]) as $listData2){ $Country = $listData2[0]; }
              }

              
              ?>
               <td style="width:137px;" align="right" ><h1 style="font-size: 25px;">DESTINO:</h1></td>
               <td > <?php echo $DestinoN;?> </td>

             </tr>
            <tr>
                <td></td>
              <td style="width:400px;" align="left" ><?php foreach($listInfo=sel3("1=1 AND int_ID=".$listData[1]) as $listData2): if($listData2[2] == ""){echo "no hay datos";}else{echo $listData2[2]." / ".$listData2[3];} endforeach?>  </td>
               <td></td>
               <td style="width:400px;" align="left" ><?php echo $DestinoDirCity; ?> </td>


            </tr>
            <tr>
                <td></td>
                <td style="width:400px;" align="left" ><?php foreach($listInfo=sel3("1=1 AND int_ID=".$listData[1]) as $listData2): if($listData2[2] == ""){echo "no hay datos";}else{echo $listData2[4]." - ".$listData2[5];} endforeach?> </td>
                 <td></td>
               <td style="width:400px;" align="left" ><?php echo $Country; ?> </td>
               <!--<td >  EASY CARGO MEDELLIN </td>-->

            </tr>

            <tr>
            <td></td>
             <td><p> <?php echo $listData[0]; ?> </p>
              </td>
            </tr>
            <tr>
            
            </tr>
            <tr>
              <td colspan="4"></td>
            </tr>
            <tr>
              <td colspan="4" align="center"></td>
            </tr>
             </table>
                        <div style="display: flex;">
             <h3 style="    font-size: 1.25em;text-align: center;color: #3DBCFA;  ">Numero de consolidado:</h3>
             <p> <?php echo $listData[0]; ?> </div>
              <div style="display: flex;">
             <h3 style="    font-size: 1.25em;text-align: center;color: #3DBCFA;  ">Pais destino:</h3>
             <p> <?php foreach($listInfo=sel4(" int_Pais=".$listData[4]) as $listData2): echo $listData2[0]; endforeach?>  </div>
             <div style="display: flex;">
              <h3 style="    font-size: 1.25em;text-align: center;color: #3DBCFA; ">Fecha de creacion:</h3>
                   <p class="date"><?php echo $listData[9] ?></p>
            </div> 
             <?php endforeach; ?>
          </div>



          </td>
          <td>&nbsp;</td>
              <tr>
          <td colspan="3">&nbsp;</td>
        </tr>
        </tr>
        <!-- <div align="right"><input type="button" class="add" value="Agregar Nuevo"style="position: absolute; left:10%;" onClick="abre_add()" /></div>
       <div align="right"><input type="button" class="add" value="Agregar Nuevo"style="position: absolute; left:20%;" onClick="abre_add()" /></div>-->

         
    <div >
    <table><tr>
    <th><input type="button" class="add" value=" insertar factura " onClick="abre_fact(<? echo $intID_Con;?>)" />

        
         <!--<input type="button" class="add" value="XLS" onClick="abre_add()" />-->
        
    <input type="button" class="add" value="XLS" onClick="abre_xlsCon(<? echo $intID_Con;?>)" />
    <input type="button" class="add" value="Imprimir facturas" onClick="abre_facthijas(<? echo $intID_Con;?>)" />
    <a type="button" class="edit" shape="padding: 7px 31px;" href="edit_con.php?idcon=<? echo $intID_Con;?>" >editar </a>
    
    </th>
    </tr>
    <tr><td></td></tr>
    <tr> <td></td>   </tr>
    </table>

    </div>

    <table id="listable" class="display">
    	<thead>
            <tr>
                <th># Factura</th>
                <th>Remitente</th>
                <th>Destinatario</th>
                <th>Peso Lbs</th>
                <th>valor decl</th>
                <th>valor seg</th>
                <th>Agente</th>
                <th>IATA</th>
                <th>Fecha Creacion </th>

            </tr>
        </thead>
		<tbody>
			<?php foreach($listInfo=sel8($intID_Con) as $listData):
              ?>
          <tr>
                <td> <a href='../tracking/details_tracking.php?nfactura=<?php echo $listData[1]; ?>'><?php echo $listData[1] ?></a></td>
                <td><?php echo $listData[2] ?></td>
                <td><?php echo $listData[3] ?></td>
                <td><?php echo $listData[4] ?></td>
                <td><?php echo $listData[5] ?></td>
                <td><?php echo $listData[6] ?></td>
                <td><?php foreach($listInfo=selagent("int_ID=".$listData[11]) as $listD): echo $listD[1]; endforeach; ?></td>
                 <td><?php echo $listData[12] ?></td>
                <td><p class="date"><?php echo $listData[8] ?></p></td>

            </tr>
			<?php endforeach; ?>
        </tbody>
	</table>
    <table style="margin-bottom: 47px;   border-style: solid;
    border-color: #FF6B6B;">

  <tr>
  <?php foreach($listInfo=sel10($intID_Con) as $listData): ?>
    <td>TOTAL DE FACTURAS</td>
    <td><?php echo $listData[0] ?></td>
  </tr>
  <tr>
    <td>NUMERO DE PAQUETES</td>
    <td><?php echo $listData[3] ?></td>
  </tr>
  <tr>
    <td>LIBRAS</td>
    <td><?php echo $listData[2] ?> LB</td>
  </tr>
  <tr>
    <td>KILOS</td>
    <td><?php echo round($listData[2]/2.2046,2 )."Klg"?> </td>
  </tr>
        <?php endforeach; ?>

</table>
    </div>

		<div id="addFac">
				<table>
					
				</table>
		</div>

    <script languaje="javascript">nav();</script>
    <script languaje="javascript">dataView();</script>
    <script language="javascript">function del_toast(tipo, mensaje){$().toastmessage(tipo, mensaje);}</script>
</body>
</html>
