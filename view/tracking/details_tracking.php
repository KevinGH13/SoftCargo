 <html>
<head>
  <title>Info Factura</title>
    <?php require('../../librerias.php'); ?>
    <?php require('ctrl_tracking.php'); ?>
    <script src = "validate_city.js"></script>
  <link rel="stylesheet" href="windowstyle.css">

</head>
<body>
<?php $nftra=$_GET['nfactura']; ?>
<?php require('../menu.php'); ?>
    <h1> <div class="icon-magic">Info Factura</div> </h1>
    <tr> 

  <?php include('alert_window.php'); ?>
        <!--                        Primer 1                                     -->
          <td><div><table class="tablasFondo" width="60%" align="center" style="height:50%;">
          <?php $glob; foreach($listInfo=sel("int_Guia=".$nftra,'',"1=1") as $listData): $glob = $listData[0]; ?>
              <?php  foreach($listInfo=sel2("int_ID=".$listData[34]) as $listAgent): ?>

            
            <tr>
              <td colspan="4"></td>
            </tr>
            <tr>
              <td colspan="4"><input type="hidden" name="act" id="act" value="upd"><input type="hidden" name="vrcD" id="vrcD" value="<?php echo $listData[0]; ?>">
               <input type="checkbox" id="chekc" name="chekc" hidden <?php echo $listData[50] ?> ></td>
            </tr>
             <tr>
              <td style="color: aqua;font-size: 20px;">Agente</td>
              <td colspan="3">  </td>
            </tr>
            
          <tr>
              <td><?php echo $listAgent[1]; ?></td>
              <td colspan="3" align="center" style="color: aqua;font-size: 20px;" >Cajero: </td>
              <td> <?php $cajero = seluser("int_ID =".$listData[38]); echo $cajero[0][0]; ?></td>
            </tr>
            <tr>
              <td><?php echo $listAgent[2]; ?></td>
              
              <td colspan="3" align="center"  style="color: aqua;font-size: 20px;" >Fecha:</td><td>
              <?php $date = ($listData[35]); echo $date ?></td>
            </tr>
            
            <tr>
              <td><?php echo $listAgent[3]."&nbsp;".$listAgent[4]." / ".$listAgent[5]; ?></td>
              <td colspan="3"></td>
            </tr>
              <?php endforeach; ?>
             <tr>
              <td style="color: aqua;font-size: 20px;">Numero De Factura</td>
              <td colspan="3" align="right" style="color: aqua;font-size: 20px;" >Tipo de Pago:  </td>
              <td><?php echo $listData[18]; ?></td>
              <td colspan="3"></td>
            </tr>
            <tr>
              <td><input style='width:210px;' name='txtfactura' type='text' id='txtfactura' readonly value='<?php echo $listData[1]; ?>'  /></td>
              <td colspan="3"></td>
             
            </tr>
            
            <tr>
              <td  style="color: aqua;font-size: 20px;">Numero Tracking :</td>
              <td  style="color: aqua;font-size: 20px;">Numero Consolidado:</td>
              <td colspan="2"></td>
             
            </tr>
             <tr>
              <td><input style='width:140px;' name='txtAlter' type='text' id='txtAlter' size='50' value='<?php echo $listData[48]; ?>'   placeholder="Numero Alterno" /></td>
              <?php $con = selcon($listData[49]); ?>
              <td><a href="http://<?php echo $_SERVER["HTTP_HOST"]; ?>/view/consolidated/details_con.php?id_con=<?php echo $con[0][0] ?>" ><?php echo $con[0][0] ?></a></td>
              <td colspan="2"></td>
             
            </tr>
        
            <tr>
              <td style="color: aqua;font-size: 20px;">Servicio </td>
              <td colspan="3" style="color: aqua;font-size: 20px;"> Pais:</td><td style="color: aqua;font-size: 20px;" > Ciudad</td>
             
            </tr>
            <tr>
              <td><?php $serv = selser("int_ID =".$listData[47]);?>
                
                <select name='cmbserv' style="width: 230px;" id="cmbserv"  >
                  <option value="<?php echo $serv[0][1]; ?>"><?php echo $serv[0][0]; ?></option>
                <option value="" disabled>------------</option>
              <?php foreach($listInfo=selser("1=1") as $serv):?> 
                  <option value="<?php echo $serv[1] ?>"><?php echo $serv[0] ?></option>
                <?php endforeach ?>
                </select>

              </td>
              <td colspan="3"><?php echo $listData[14]; ?></td> <td> <?php echo $listData[12]; ?></td>
            </tr>
            <tr>
              <td colspan="4"></td>
            </tr>
            <tr>
              <td colspan="4" align="center"></td>
            </tr>
            
          </table>
         
          

          </td>
          <td>&nbsp;</td>
              <tr>
          <td colspan="3">&nbsp;</td>
        </tr>
        </tr>

    <tr>
        <!--                       2 par                                    -->
          <td><div><table class="tablasFondo" width="60%" align="center" style="height:50%;">
          <form name='formUpdate' id="formUpdate" method='post'  >
            <tr>
              <td colspan="4"></td>
            </tr>
       
            <tr>
              <td  colspan="2"> <h4>Remitente </h4></td>
              <td colspan="3" style=" padding-left: 4%; width:285px; "><h4>Destinatario </h4></td>
              <input name='txtcdd'  id='txtcdd' size='50' value='<?php echo $listData[0];?>'  hidden />
            </tr>
            
            <tr>
              <td  colspan="2"><input style='width:280px;' name='txtc2' type='text' id='txtc2'  value='<?php echo $listData[2]; ?>'  placeholder="Nombre" /></td>
              <td colspan="3" style=" padding-left: 4%;"><input style='width:280px;' name='txtc3' type='text' id='txtc3'  value='<?php echo $listData[10]; ?>'  placeholder="Nombre" /></td>
               
            </tr>
             <tr>
              <td colspan="2"><input style='width:280px;' name='txtc4' type='text' id='txtc4' value='<?php echo $listData[3]; ?>'  placeholder="Direccion" /></td>
              <td colspan="3"style=" padding-left: 4%;"><input style='width:280px;' name='txtc5' type='text' id='txtc5' value='<?php echo $listData[11]; ?>'  placeholder="Direccion" /></td>
               
            </tr>
  <?php if($tp_user == 1){ ?>
            <tr>
	          <td colspan="2">
	          <input class="ID" style='width:137px;' name='txtCampo6' type='text' id="txtCampo6" size='50' placeholder="Pais" hidden  readonly />
			  <select name='CampoPais' style="width: 280px;" id="CampoPais"  >
			  
             <?php $pais1 = sel8("int_ID=".$listData[37]); ?>
              <option value="<?php echo $pais1[0][1];?>"><?php echo$pais1[0][0]; ?></option>
              	<option value="" disabled>------------</option>
              	<?php foreach ($list = sel8("1=1 AND int_Pais != ".$pais1[0][1]) as  $value): ?>
              		<option value="<?php echo $value[1] ?>"><?php echo $value[0] ?></option>
              	<?php endforeach ?>
              </select>
             
             
              </td>
	          <td colspan="3" style=" padding-left: 4%;">
	          <input class="ID" style='width:280px;' name='txtCampo13' type='text' id='txtCampo13' hidden placeholder="Pais" onchange="pais(this.value);alert(this.value);" size='50'  readonly />
            	<select name='CampoPais2' style="width: 280px;" id="CampoPais2"  >
            	
             <?php $pais2 = sel8("int_ID=".$listData[36]); ?>
              <option value="<?php echo $pais2[0][1];?>"><?php echo$pais2[0][0]; ?></option>
              	<option value="" disabled>------------</option>
              	<?php foreach ($list = sel8("1=1 AND int_Pais != ".$pais2[0][1]) as  $value): ?>
              		<option value="<?php echo $value[1] ?>"><?php echo $value[0] ?></option>
              	<?php endforeach ?>
              </select>
               
              </td>
              </tr>
             <tr>
             <td colspan="2"> <input style='width:280px;' name='txtCampo4' type='text' id="txtCampo4" size='50' placeholder="Ciudad"
             value="<?php   echo $listData[4];  ?> " required />
             <input  style='width:137px;' hidden name='txtrcity' type='text' id='txtrcity'  value="<?php echo $listData[37];  ?> "  />
             </td>
             <td colspan="3" style=" padding-left: 4%;">
             <input  style='width:280px;' name='txtCampo11' type='text' id='txtCampo11' size='50' placeholder="ciudad" 
             value="<?php  $city = seliata("int_ID=".$listData[36]); echo $city[0][1];  ?> " required  />
             <input  style='width:137px;' hidden name='txtdcity' type='text' id='txtdcity' value="<?php echo $listData[36];  ?> "   /></td>
	         
             </tr>
             <tr>
             <td colspan="2"> <input class="ID" style='width:280px;' name='txtCampo5' type='text' id="txtCampo5" size='50' placeholder="Estado"  value="<?php  echo $listData[5];  ?> "   /></td>
             <td colspan="3" style=" padding-left: 4%;"><input class="ID" style='width:280px;' name='txtCampo12' type='text' id='txtCampo12' size='50' placeholder="Estado"  value="<?php  $city = seliata("int_ID=".$listData[36]); echo $city[0][2];  ?> " readonly  /></td>
	         
             </tr>

          <?php } else{?>
               <tr><?php  foreach($listInfo=seliata("int_ID=".$listData[37]) as $listcc): ?>
              <td colspan="2"><?php echo $listcc[1]; ?>--
              <?php echo $listcc[2]; ?></td>
            <?php endforeach; ?>
            <?php  foreach($listInfo=seliata("int_ID=".$listData[36]) as $listc): ?>
              <td colspan="3" style="padding-left: 4%;">
              <?php echo $listc[1]; ?>--
               <?php echo $listc[2]; ?>
              
              <?php endforeach ?>

              </td>
              
            </tr>
            <?php }?>
            <tr>
              <td colspan="2"><input style='width:280px;' name='txtcRe' type='text' id='txtcRe' value='<?php echo $listData[9]; ?>'  placeholder="E-Mail" /></td>
              <td colspan="3"style=" padding-left: 4%;"><input style='width:280px;' name='txtcDe' type='text' id='txtcDe' value='<?php echo $listData[17]; ?>'  placeholder="E-Mail" /></td>
               
            </tr>
             <tr>
              <td colspan="2">
              <input style='width:140px;' name='txtc10' type='text' id='txtc10' size='50' value='<?php echo $listData[7]; ?>'   placeholder="ZipCode" />
              <input style='width:140px;' name='txtc12' type='text' id='txtc12' size='50' value='<?php echo $listData[8]; ?>'   placeholder="Telefono" />
              </td>
              <td colspan="3" style="padding-left: 4%;">
              <input style='width:140px;' name='txtc11' type='text' id='txtc11' size='50' value='<?php echo $listData[15]; ?>'  placeholder="ZipCode" />
              <input style='width:140px;' name='txtc13' type='text' id='txtc13' size='50' value='<?php echo $listData[16]; ?>'  placeholder="Telefono" /></td>

               
                <input type="button" class="add" value="NUEVA ALERTA" onClick="openVentana()" style="position: absolute; left:80%; top:205px;" />
                <input type="button" class="add" value=" IMPRIMIR FTRA " onClick="abre_ftra(<?php echo "'".$listData["1"]."'";?>)"style="position: absolute; left:80%; top:245px;" />
                <input type="button" class="add" value=" VISTA PREVIA LABEL " onClick="abre_label(<?php echo "'".$listData["1"]."'";?>)"style="position: absolute; left:80%; top:285px;" />
                <input type="button" class="add" value=" IMPRIMIR LABEL " onClick="window.open('http://demo.easycargopro.com/view/tracking/impr_direc.php?date=<?php echo $listData["1"] ?>','_blank')" style="position: absolute; left:80%; top:325px;" />
                <input type="button" class="add" value=" DECLARACION VLR " onClick="abre_dclr(<?php echo "'".$listData["1"]."'";?>)"style="position: absolute; left:80%; top:365px;" />
                <?php  if($tp_user == 1){ ?><input type="button" class="add" value=" REGISTROS CARGA " onClick="$('#modal').dialog('open');"style="position: absolute; left:80%; top:405px;" /><?php  } ?>
                <input type="button" class="del" value=" ANULAR" onClick="abre_del(<?php echo "'".$listData["0"]."'";?>)" style="position: absolute; left:80%; top:425;" />
                </tr>
            <tr>
              <td colspan="4"></td>
            </tr>
            <tr>
              <td colspan="4" align="center"></td>
            </tr>
            <tr>
              <td colspan="4" align="center"><h4>Contenido 
              	 <input style='width:550px;' name='txtcCont' type='text' id='txtcCont'  value='<?php echo $listData[32]; ?>'  placeholder="Contenido" /></h4>
              </td>
            </tr>
              <tr>
             
              	          
          
            </tr>
               <tr>
              <td colspan="4" align="center"><?php if($tp_user == 1){ ?><input type="submit"  onClick=" return exe_upd();" value="Guardar" /> <?php }?>
              </td>
            </tr>
          </table>
          <div style=" margin-left: 417px; display: flex; ">
          
           </div>
               </form>
            
         


          </td>
          <td>&nbsp;</td>
              <tr>
          <td colspan="3">&nbsp;</td>
        </tr>
        </tr>

         <h1> Informacion Contable: </h1>
          <?php if($tp_user != 1){ ?>
    <tr>
        <!--                   3 par                                    -->
          <td><div><table class="tablasFondo" width="60%" align="center" style="height:50%;">
          
            <tr>
              <td colspan="4"></td>
            </tr>
            
             <tr>
              <td>Peso: </td>
              <td colspan="2"> <?php echo $listData[23]; ?>LBS  </td>
              <td>Flete: </td>
              <td colspan="3"> $ <?php echo $listData[33]; ?>  </td>
            </tr>
          
            <tr>
               <td>Asegurado : </td>
              <td colspan="2"> $ <?php echo $listData[27]; ?> </td>
              <td>Seguro : </td>
              <td colspan="3"> $ <?php echo $listData[26]; ?> </td>
               
            </tr>
             <tr>
               <td>Declarado: </td>
              <td colspan="2"> $ <?php echo $listData[25]; ?>  </td>
              <td>Impuestos: </td>
              <td colspan="3"> $ <?php echo $listData[24]; ?> </td>
            </tr>
             <tr>
              <td></td>
              <td colspan="2">   </td>
              <td>Vlr Ad Agent: </td>
              <td colspan="3"> $ <?php echo $listData[28]; ?>  </td>
            </tr>
             <tr>
              <td></td>
              <td colspan="2">   </td>
              <td>Vlr Ad Empr: </td>
              <td colspan="3"> $ <?php echo $listData[29]; ?> </td>
            </tr>
             <tr>
              <td></td>
              <td colspan="2">   </td>
              <td>Cc Agente: </td>
              <td colspan="3"> $ <?php echo $listData[40]*$listData[23]; ?> </td>
            </tr>
            <tr>
              <td></td>
              <td colspan="2">   </td>
              <td>Cc Empresa: </td>
              <td colspan="3"> $ <?php echo $listData[39]*$listData[23]; ?> </td>
            </tr>
            <tr>
              <td></td>
              <td colspan="2">   </td>
              <td>Descuento: </td>
              <td colspan="3"> $<?php echo $listData[30]; ?></td>
            </tr>
            <tr>
            <td></td>
              <td colspan="2"> <strong> Total Pagado </strong>  </td>
              <td> </td>
              <td colspan="3"> <strong>$ <?php echo $listData[31]; ?> </strong> </td>
              </tr>
            <tr>
              <td colspan="4"></td>
            </tr>
            <tr>
              <td colspan="4" align="center"></td>
            </tr>
            
          </table>
         
          

          </td>
          <td>&nbsp;</td>
              <tr>
          <td colspan="3">&nbsp;</td>
        </tr>
        </tr>
       <?php }else if ($tp_user == 1){ ?>
			 <tr>
        <!--                   3 par                                    -->
        <form id="savCobros" name="savCobros" action="">
          <td><table class="tablasFondo" width="60%" align="center" style="height:50%;">
          
            <tr>
              <td colspan="4"></td>
            </tr>
            
             <tr>
              <td>Peso: </td>
              <td colspan="2"> <input style='width:120px;' name='txtp' type='text' id='txtp'value='<?php echo $listData[23]; ?>' />LBS  </td>
              <td>Flete: </td>
              <td colspan="3"> <input style='width:120px;' name='txtf1' type='text' id='txtf1'value='<?php echo $listData[41]; ?>' placeholder="Emp" />
               <input style='width:120px;' name='txtf2' type='text' id='txtf2' value='<?php echo $listData[42]; ?>' placeholder="Agente"/>
               <h2 style="display: inline-block;"id="fresult">$ <?php echo $listData[33]; ?> </h2> </td>
            </tr>
          
            <tr>
               <td>Asegurado : </td>
              <td colspan="2"><input style='width:120px;' name='txta0' type='text' id='txta0'value='<?php echo $listData[27]; ?>' /> </td>
              <td>Seguro : </td>
              <td colspan="3"> <input style='width:120px;' name='txta1' type='text' id='txta1'value='<?php echo $listData[43]; ?>' placeholder="Emps" />
               <input style='width:120px;' name='txta2' type='text' id='txta2'value='<?php echo $listData[44]; ?>' placeholder="Agente" /> 
               <h2 style="display: inline-block;"id="aresult">$ <?php echo $listData[26]; ?></h2> </td> 
               
            </tr>
             <tr>
               <td>Declarado: </td>
              <td colspan="2"><input style='width:120px;' name='txtd0' type='text' id='txtd0'value='<?php echo $listData[25]; ?>' />  </td>
              <td>Impuestos: </td>
              <td colspan="3"> <input style='width:120px;' name='txtd1' type='text' id='txtd1'value='<?php echo $listData[45]; ?>' placeholder="Emp" />
               <input style='width:120px;' name='txtd2' type='text' id='txtd2'value='<?php echo $listData[46]; ?>' placeholder="Agente" /> 
               <h2 style="display: inline-block;"id="dresult">$ <?php echo $listData[24]; ?> </h2> </td>
            </tr>
             <tr>
              <td></td>
              <td colspan="2">   </td>
              <td>Vlr Ad Agent: </td>
              <td colspan="3"><input style='width:120px;' name='txtaa' type='text' id='txtaa'value='<?php echo $listData[28]; ?>' /> </td>
            </tr>
             <tr>
              <td></td>
              <td colspan="2">   </td>
              <td>Vlr Ad Empr: </td>
              <td colspan="3"><input style='width:120px;' name='txtae' type='text' id='txtae'value='<?php echo $listData[29]; ?>' />  </td>
            </tr>
             <tr>
              <td></td>
              <td colspan="2">   </td>
              <td>Cc Agente: </td>
              <td colspan="3"><input style='width:120px;' name='txtca' type='text' id='txtca'value='<?php echo $listData[40];?>' />
              <h2 id="cca" style="display: inline-block;">$<?php echo ($listData[40]*$listData[23]); ?> </h2> </td>
            </tr>
            <tr>
              <td></td>
              <td colspan="2">   </td>
              <td>Cc Empresa: </td>
              <td colspan="3"><input style='width:120px;' name='txtcd' type='text' id='txtcd'value='<?php echo $listData[39]; ?>' /> 
              <h2 id="cce" style="display: inline-block;">$<?php echo ($listData[39]*$listData[23]); ?> </h2> </td>
            </tr>
            <tr>
              <td></td>
              <td colspan="2">   </td>
              <td>Descuento: </td>
              <td colspan="3"><input style='width:120px;' name='txtdes' type='text' id='txtdes'value='<?php echo $listData[30]; ?>' /> </td>
            </tr>
            <tr>
            <td></td>
              <td colspan="2"> <strong>Total Pagado </strong>  </td>
              <td> </td>
              <td colspan="3"> <strong> <h2 id="resultado" style="cursor: pointer;" onclick="Showresult();">$ <?php echo $listData[31]; ?> </h2>  </strong> </td>
              </tr>
          <tr>
              <td></td>
              <td colspan="2">   </td>
              <td> </td>
              <td colspan="3"> <input id="btn_Cobr" name="btn_Cobr" type="submit" value="Guardar"></td>
            </tr>
            <tr>
              <td colspan="4"></td>
            </tr>
            <tr>
              <td colspan="4" align="center"></td>
            </tr>
            
          </table>
         
          </form>

          </td>
          <td>&nbsp;</td>
              <tr>
          <td colspan="3">&nbsp;</td>
        </tr>
        </tr>
        <?php } ?>
   
     <?php endforeach; ?>

   
<div>
  

  <table id="listable" class="TablTax"> <h4><div align="Center" >Historico de Factura</div></h4>
      <thead>
            <tr>    
                <td>Fecha</td>
                <td>Estado de carga</td>
                <td>Comentario</td>
                <td>Opciones</td>
              
               
             
            </tr>
        </thead>
    <tbody>
      <?php foreach($listInfo=selEstados($nftra) as $status): ?>
            <tr>  
                <td><p class="date"><?php echo $status[0] ?></p></td>
                <td><?php echo $status[1] ?></td>
                <td><?php echo $status[2] ?></td>
                <td>
                <?php  if($tp_user == 1){ ?>
                <input type="button" onclick="eliminarEstado('<?php echo $status[3] ?>')" value="Eliminar" class="Btn" ><input type="button" onclick="RChange = <?php echo $status[3] ?>;$('#modal2').dialog('open'); " class="Btn" value="Editar">
                <?php  } ?>
                </td>
                
                
              
                
            </tr>
      <?php endforeach; ?>
        </tbody>
  </table>

  <table id="listable" class="TablTax"> <h4><div align="Center" >Historico de Los Pesos Ingresados a  Bodegas</div></h4>
      <thead>
            <tr>    
                <th>Fecha</th>
                <th>Estado</th>
                <th>Libra</th>
                <th>Operador</th>
              
               
             
            </tr>
        </thead>
    <tbody>
      <?php foreach($listInfo=sel("1=1",4) as $status): ?>
            <tr>  
                <td><?php echo $status[0] ?></td>
                <td><?php echo $status[1] ?></td>
                <td><?php echo $status[2] ?></td>
                <td><?php echo $status[3] ?></td>
                
                
              
                
            </tr>
      <?php endforeach; ?>
        </tbody>
  </table>
   <table id="listable" class="TablTax"> <h4><div align="Center" >Alertas</div></h4>
      <thead>
            <tr>    
                <th>Fecha</th>
                <th>Servicio</th>
                <th>Nota</th>
                <th>victimario</th>
                
               
             
            </tr>
        </thead>
    <tbody>
      <?php foreach($listInfo=sel("1=1", 4) as $status): ?>
            <tr>  
                <td><?php echo $status[0] ?></td>
                <td><?php echo $status[1] ?></td>
                <td><?php echo $status[2] ?></td>
                <td><?php echo $status[3] ?></td>
                
                
              
                
            </tr>
      <?php endforeach; ?>
        </tbody>
  </table>

   </div>
  
  
    </div>
    
    <div id="modal">
      <table>
        <tr><td><h2>ID : </h2></td> <td> <?php echo $nftra ?> </td></tr>
        <tr><td>Registro de Carga</td><td>
        <select name="registro" id="registro">
          <option value="">Seleccionar registro</option>
          <option value="" disabled>--------------------</option>  
          <?php foreach ($list = selregistro("1=1") as $value): ?>
            <option value="<?php echo $value[0] ?>"><?php echo $value[1] ?></option>
          <?php endforeach ?>
        </select></td></tr>
        <tr><td>Comentario</td><td><textarea name="comentario" id="comentario" cols="30" rows="10"></textarea></td></tr>
        <tr><td colspan="2"><input type="button" class="Btn" value="Aceptar" onclick="registro('<?php echo $nftra ?>');" ></td></tr>
      </table>
    </div>

    <div id="modal2">
      <table  class="display">
			<tr>
			<td># Factura </td>
			<td><?php echo $nftra ?></td>
			</tr>
			<tr>
				<td>Registro </td>
				<td>
					<select name="txtcampo2" id="RC_txt1" required>
					<option value=""></option>
					<?php foreach ($listState=selRegistro("1=1") as  $value): ?>
						<option value="<?php echo $value[0] ?>"><?php echo $value[1] ?></option>
					<?php endforeach ?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Fecha</td>
				<td><input type="text" class="datepicker" id="RC_txt3" name="txtcampo3" required ></td>
			</tr>
			<tr>
				<td>Comentario</td>
				<td><textarea name="txtcampo4" id="RC_txt2" cols="30" rows="10" required></textarea></td>
			</tr>
			<tr ><td colspan="2"><center><input type="button" class="Btn" value="Aceptar" onclick="edt_Registro()"></center></td></tr>
		</table>
    </div>
     <script >
         $(function() {
       $('#bar-actions').
        append($('<button>').
            attr("class", "add").
            attr("type", "button").
            attr("id", "enviar_alert").
            text("Agregar")
        );
        
        $('#windModal').html("<form id='hola'> ");
         $('#bar-actions').prepend("</form>");
        $('#bar-actions').on('click', '#enviar_alert', function(){
          var url = "ctrl_tracking.php";
          var datastring  = $("#formwindow").serialize()+"&txtcdd="+$("#txtcdd").val();
          $.ajax({
                   type: "POST",
                   url: url,
                   data: datastring, 
                   success: function(data)
                   {
                       upd_toast('showSuccessToast','registro actualizado');
                       alert(data);
                       //setTimeout(function(){window.open('index.php','_self');},960);
                       
                   },
                    error: function() {
                      alert('error handing here');
                  }

                 });
            return false; 
        });
      });
    <?php $condition = "int_visible = 0 AND int_IDGuia = $glob "; if($tp_user != 1){$condition = "int_visible = 0 AND int_IDGuia = $glob  AND int_Agencias = ".$int_IDagente;} ?>
    <?php foreach($listInfo=selNovedades($condition) as $listData): ?>
   
        $().toastmessage('showToast', {
            text     : '<?php echo $listData[1].": ".$listData[2]; ?>',
            sticky   : true,
            type     : '<?php echo $listData[5]; ?>'
        },1,<?php echo $listData[0]; ?>);
    
    <?php endforeach; ?>

    function openVentana(){
      $(".ventana").slideDown(1000);

    }
    function closeVentana(){
      $(".ventana").slideUp("fast");
    }

</script>
    <script languaje="javascript">nav();</script>
    <script languaje="javascript">dataView();</script>
    <script language="javascript">function upd_toast(tipo, mensaje){$().toastmessage(tipo, mensaje);}</script>
</body>
</html>