<html>
<head>
	<title>Info Con</title>
    <?php require('../../librerias.php'); ?>
    <?php require('ctrl_con.php'); ?>
     <?php if(isset($_GET['id_con'])){$intID_Con=$_GET['id_con']; }else{echo "<script language='javascript'>  window.location.href = 'http://www.easycargopro.com/ECP/index.php' ;</script>"; }?>
      <?php $intID=$_GET['id']; ?>
</head>
<body>
<?php require('../menu.php'); ?>
    <h1> <div class="icon-magic">Info Consolidados</div> </h1>
    <tr>
        <!--                        Consolidado                                     -->
          <td><div><table class="tablasFondo" width="60%" align="center" style="height:50%;">
          <?php foreach($listInfo=sel("int_IDConsolidado=".$intID_Con) as $listData): ?>
            <tr>
              <td colspan="4"></td>
            </tr>
            <tr>
              <td colspan="4"><input type="hidden" name="act" id="act" value="add"></td>
            </tr>
            <tr>
              
              <td style="width:137px;" align="right" >ORIGEN : </td>
              <td > <?php echo $listData[1]; ?> </td>
               <td style="width:137px;" align="right" >DESTINO :</td>
               <td > <?php echo $listData[3]; ?> </td>
            
             </tr>
            <tr>
                <td></td>
              <td style="width:400px;" align="left" ><?php foreach($listInfo=sel3("1=1 AND var_Empresa=".$listData[1]) as $listData2): if($listData2[2] == ""){echo "no hay datos";}else{echo $listData2[2];} endforeach?>  </td>
               <td></td>
               <td style="width:400px;" align="left" >kr 46 # 79-65, poblado</td>
             
            
            </tr>
            <tr>
                <td></td>
                <td style="width:400px;" align="left" > Estados unidos</td>
                 <td></td>
               <td style="width:400px;" align="left" > Antioquia, Collombia</td>
               <!--<td >  EASY CARGO MEDELLIN </td>-->
            
            </tr>
            
            <tr>
            <td></td>
             <td colspan="3">Numero de consolidado<br><input name="txtCampo3" id="txtCampo3" size="50" style="width:200px" value="<?php echo $listData[0]; ?> " readonly type="text">
              </td>
            </tr>
            <tr>
              <td colspan="4"></td>
            </tr>
            <tr>
              <td colspan="4" align="center"></td>
            </tr>
             <?php endforeach; ?>
          </table>
         
          

          </td>
          <td>&nbsp;</td>
              <tr>
          <td colspan="3">&nbsp;</td>
        </tr>
        </tr>
        <!-- <div align="right"><input type="button" class="add" value="Agregar Nuevo"style="position: absolute; left:10%;" onClick="abre_add()" /></div>
       <div align="right"><input type="button" class="add" value="Agregar Nuevo"style="position: absolute; left:20%;" onClick="abre_add()" /></div>-->

         <input type="button" class="add" value="TSA"style="position: absolute; left:80%; top:45%;" onClick="abre_add()" />
    <div >
    <table><tr>
    <th><input type="button" class="add" value=" insertar factura " onClick="abre_fact(<? echo $intID;?>,<? echo $intID_Con;?>)" />
       
        <input type="button" class="add" value="Editar" onClick="#" />
         <!--<input type="button" class="add" value="XLS" onClick="abre_add()" />-->
        <input type="button" class="add" value="PDF" onClick="abre_add()" />
         <input type="button" class="add" value="Imprimir" onClick="abre_add()" />
          <input type="button" class="add" value="Imprimir facturas" onClick="abre_add()" />
    </th>
    </tr>
    <tr><td><input type="text" class="ID" placeholder="Dijite # bolsa" size='25'style="width:180px"  /></td></tr>
    <tr> <td><input type="text" class="ID" placeholder="Tip empaque"  size='50'  style="width:180px" /></td>   </tr>
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
                <th>Unidades</th>
                
             
            </tr>
        </thead>
		<tbody>
			<?php $contador =0 $libras= 0 ; ;foreach($listInfo=sel8("int_NConsolidado=".$intID_Con) as $listData): ?>
            <tr>	
                <td><?php echo $listData[1] ?></td>
                <td><?php echo $listData[2] ?></td>
                <td><?php echo $listData[3] ?></td>
                <td><?php echo $listData[4] ?></td>
                <td><?php echo $listData[5]; $libras= $listData[5]+ $libras; ?></td>
                <td><?php echo $listData[6]; $contador = $contador +1 ;   ?></td>
                <td>1/1</td>    
              
            </tr>
		
        </tbody>
	</table>
    <table style="margin-bottom: 47px;   border-style: solid;
    border-color: #FF6B6B;">
  
  <tr>
    <td>TOTAL DE FACTURAS</td>
    <td><?echo $contador ; ?></td>
  </tr>
  <tr>
    <td>NUMERO DE PAQUETES</td>
    <td>1</td>
  </tr>
  <tr>
    <td>LIBRAS</td>
    <td><?echo $libras ?>LB</td>
  </tr>
  <tr>
    <td>KILOS</td>
    <td>100 Klg</td>
  </tr>
  <?php endforeach; ?>
</table>
    </div>
    
    <script languaje="javascript">nav();</script>
    <script languaje="javascript">dataView();</script>
    <script language="javascript">function del_toast(tipo, mensaje){$().toastmessage(tipo, mensaje);}</script>
</body>
</html>