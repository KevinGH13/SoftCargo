<html>
<head>
	<title>Crear  Awb</title>
	<?php require('../../librerias.php'); ?>
   <?php require('ctrl_awb.php'); $contru;?>
    <script src = "validate_city.js"></script>
</head>
<body>
<?php require('../menu.php'); ?>
	<h1>AWB CREACION</h1>
	<?php foreach($listInfo=seluser("1=1 AND int_ID=".$int_ID) as $listSu): $contru=$listSu[1];  endforeach; ?>
	<form name='formInsert' id="formInsert" method='post' onSubmit="add_awb()" >
        
    <tr>
        <!--                        Primer 1                                     -->
          <td><table class="tablasFondo" align="center" style="height:20%;">

            
            <tr>
              <td colspan="4"></td>
            </tr>

             <tr>
             <td>Tipo </td>
                <td >
                   <select style="width:200px">
                    <option value="1">MASTER AWB</option>
                  
                  </select> 
                </td>
                                <td><input type="submit" value="Crear AWB" /></td>
            </tr>
            <tr>
                <td>Awb-Reservacion </td>
                <td >
                       <input  style="width:200px" name='txtCampo0' type='text' id='txtCampo0' size='50' placeholder="ID AWB"  required />
                </td>
                  <td><input type="button" value="Cancelar" class="Btn" onClick="javascript:window.history.back();" /></td>
            </tr>
            <tr>
                <td colspan="3">
                  <input type="hidden" name="act" id="act" value="add"> 
                  <input type="hidden" name="txtCmp1" id="txtCmp1" value="<?php echo $contru ?>">                 
                </td>
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





         <table width="60%" align="Left" style="height:40%;">
            <tr>
                 <td colspan="2">
                <h2>Remitente</h2>
                </td>
                <td colspan="2">
                <h2>Destinatario</h2> </td>
                   
                  


    
            </tr>
            <tr>
                 <td colspan="2">
                            <input style="width:200px" name='txtCampoR0' type='text' id='txtCampoR0' size='50' placeholder="Nombre Remitente"  required />
               
                </td>
                <td colspan="2">
                        <input  style="width:200px"name='txtCampoD0' type='text' id='txtCampoD0' size='50' placeholder="Nombre Destinatario"  required />
                </td>
                
            </tr>
            <tr>
                 <td colspan="2">
                            <input style="width:200px; background-color:#C9C9C9;" name='txtCampoR1' type='text' id='txtCampoR1' size='50' placeholder="Estado Remitente"  required />
               
                </td>
                <td colspan="2">
                        <input style="width:200px; background-color:#C9C9C9;" name='txtCampoD1' type='text' id='txtCampoD1' size='50' placeholder="Ciudad Destinatario"  required />
                </td>
                
            </tr>
            <tr>
                 <td colspan="2">
                  <select name='CampoPais3' style="width: 137px;" id="CampoPais3"  >
                <option value=""></option>
                <?php foreach ($list = sel8("1=1") as  $value): ?>
                  <option value="<?php echo $value[1] ?>"><?php echo $value[0] ?></option>
                <?php endforeach ?>
              </select>
                </td>
                <td colspan="2">
              <select name='CampoPais' style="width: 137px;" id="CampoPais"  >
                <option value=""></option>
                <?php foreach ($list = sel8("1=1") as  $value): ?>
                  <option value="<?php echo $value[1] ?>"><?php echo $value[0] ?></option>
                <?php endforeach ?>
              </select>
                </td>
                <td colspan="2">
                        <input  style="width:200px" style="width:200px"  name='txtCampoD3' type='text' id='txtCampoD3' size='50' placeholder="Zip code Destinatario"  required />
                </td>
                
            </tr>
                 <td colspan="2">
             
            <tr>
            </table>
                      </td>
          <td>&nbsp;</td>
              <tr>
          <td colspan="3">&nbsp;</td>
        </tr>
        </tr>


            <table  width="60%" align="Left" style="height:40%;">
                <tr>
                
                <td style="border:10px;">Transportador: </td>
                
                <td>Tipo de Carga </td>
                
                <td>Por el primer portador </td>
                
           
            </tr>
            <tr>
                <td >
                 <select style="width:200px" name='txtCampoT0' id="txtCampoT0">
              	
                <?php foreach($listInfo1=sel1("1=1") as $listtrans): ?>
                	<option value="<?php echo $listtrans[0]; ?>"><?php echo $listtrans[1]; ?></option>
                <?php endforeach; ?>
              </select>
                </td>
                <td >
                       <input  style="width:200px" name='txtCampoTipoCarga' type='text' id='txtCampoTipoCarga' size='50'  required  />
                </td>
                <td >
                      <input  style="width:200px" name='txtCampoByfirstCarrier' type='text' id='txtCampoByfirstCarrier' size='50' placeholder="for by Carrier" required  /> 
                </td>
                
               
           
            </tr>

            <tr>
            
                <td>Fecha vuelo: </td>
                <td>Aeropuerto de partida:</td>
                
              
           
            </tr>
            <tr>
                 <td >
                       <input  style="width:200px" name='txtCampoAero0' type='text' id='txtCampoAero0' size='50' placeholder="Fecha de vuelo"  required />
                </td>
                
                <td >
                       <input  style="width:200px" name='txtCampoAero1' type='text' id='txtCampoAero1' size='50' placeholder="Aeropuerto Salida"  required />
                </td>
                
            </tr>
            <tr>
            
                   <td>Aeropuerto de llegada:</td>
                 <td>Ciudad de llegada:</td>
                 <td>Pais Destinatario </td>
            
              
           
            </tr>
            <tr>
                <td >
                       <input  style="width:200px" name='txtCampoAero2' type='text' id='txtCampoAero2' size='50' placeholder="Aeropuerto  llegada"  required />
                </td>
                <td >
                       <input  style="width:200px; background-color:#C9C9C9;" name='txtCampoAero3' type='text' id='txtCampoAero3' size='50' placeholder="  "  required />
                </td>
                <td>
              <select name='CampoPais2' style="width: 137px;" id="CampoPais2"  >
                <option value=""></option>
                <?php foreach ($list = sel8("1=1") as  $value): ?>
                  <option value="<?php echo $value[1] ?>"><?php echo $value[0] ?></option>
                <?php endforeach ?>
              </select>
                </td>

            </tr>
            <tr>
                <td>Numero de vuelo</td>
               
                 <td>Tipo de moneda</td>
                
                
            </tr>
            <tr>
             <td >
                       <input  style="width:200px" name='txtCampoAeronvuelo' type='text' id='txtCampoAeronvuelo' size='50' placeholder="# vuelo"  required />
                </td>
               
                <td >
                       <input  style="width:200px" name='txtCampoAeroTipomoneda' type='text' id='txtCampoAeroTipomoneda' size='50' placeholder="Tipo de moneda"  required />
                </td>
               
            </tr>
            	
            <tr>
                <td>Valor carga declarado: </td>
                <td>Valor declarado aduanas:</td>
                <td>Valor asegurado:</td>
                
              
           
            </tr>
            <tr>
                 <td >
                       <input  style="width:200px" name='txtCampovlrCdcl' type='text' id='txtCampovlrCdcl' size='50' placeholder=" Valor carga declarado "  required />
                </td>
                
                <td >
                       <input  style="width:200px" name='txtCampovlrdclAd' type='text' id='txtCampovlrdclAd' size='50' placeholder="Valor declarado aduanas "  required />
                </td>
                
                <td >
                       <input  style="width:200px" name='txtCampovlrAsg' type='text' id='txtCampovlrAsg' size='50' placeholder=" Valor asegurado "  required />
                </td>
            </tr>
             <tr>
                <td>Cuenta:</td>
                <td>Informacion de cuenta:</td>
             
                
              
           
            </tr>
            <tr>
                 <td >
                       <input  style="width:200px" name='txtCampoCuenta' type='text' id='txtCampoCuenta' size='50' placeholder=" cuenta "   />
                </td>
                
                <td >
                       <input  style="width:200px" name='txtCampoInfoCuenta' type='text' id='txtCampoInfoCuenta' size='50' placeholder="Informacion de cuenta"   />
                </td>
                
               
            </tr>
                <tr>
              <td colspan="4"></td>
            </tr>
            <tr>
              <td colspan="4" align="center"></td>
            </tr>
            </table>
             <td>&nbsp;</td>
              <tr>
          <td colspan="3">&nbsp;</td>
        </tr>
<tr>
       <td > 
       	<fieldset style="width: 370px;">
                            <legend style="color: #FB667A;">Cobros</legend>
            	<table align="left"  >
            	 <tr>
           
                <td>Terminos de pago:</td>
                <td><select id="txtCampoAeroTermino" name="txtCampoAeroTermino" style="width:200px">
 						 <option value="prepaid">Prepago</option>
 						 <option value="COD">COD</option>
 						
						</select> 
				</td>
               </tr>
            	<tr>
           
                <td>Peso Cobrado </td>
                <td>
                 <input  style="width:200px" name='txtcampoCobros1' type='text' id='txtcampoCobros1' size='50' placeholder="Fecha de vuelo"  required /></td>
               
           </tr>
            <tr>
            <td >Cargo minimo</td>                
                <td ><input  style="width:200px" name='txtcampoCobros2' type='text' id='txtcampoCobros2' size='50' placeholder="Aeropuerto Salida"  required />
                </td>      
            </tr>
            	<tr>           
                <td>total Otros Cargos- Agente</td>
                <td><input  style="width:200px" name='txtcampoCobros3' type='text' id='txtcampoCobros3' size='50' placeholder="Fecha de vuelo"  required /></td>
               </tr>
               <tr>           
                <td>total Otros Cargos- Transportador</td>
                <td><input  style="width:200px" name='txtcampoCobros4' type='text' id='txtcampoCobros4' size='50' placeholder="Fecha de vuelo"  required /></td>
               </tr>
               <tr>           
                <td>Total</td>
                <td><input  style="width:200px" name='txtcampoCobros5' type='text' id='txtcampoCobros5' size='50' placeholder="Fecha de vuelo"  required /></td>
               </tr>
               <tr>           
                <td>Valor Adicional</td>
                <td><input  style="width:200px" name='txtcampoCobros6' type='text' id='txtcampoCobros6' size='50' placeholder="Fecha de vuelo"  required /></td>
               </tr>
          
            <tr>
              <td colspan="4"></td>
            </tr>
            <tr>
              <td colspan="4" align="center"></td>
            </tr>
         </table>
  </fieldset>


       <table class="tablasFondo" align="left" width="60%" style="height:20%;">
<?php for ($i=0; $i <4 ; $i++):?>
            
            <tr>
              <td colspan="4"></td>
            </tr>

             <tr>
             <td>Piezas: </td>
             <td>Peso: </td>
            <td>Articulo: </td>
            <td>Peso cobrado: </td>
            <td>Tarifa: </td>
            <td>Total: </td>
            <td>Contenido: </td>
            </tr>
            <tr>
               
                <td >
                       <input  style="width:100%" name='txtCamponP<?php echo $i; ?>' type='text' id='txtCamponP<?php echo $i; ?>' size='50' placeholder="# pieces"   />
                </td>
                <td >
                    <input  style="width:100%" name='txtCampoPweight<?php echo $i; ?>' type='text' id='txtCampoPweight<?php echo $i; ?>' size='50' placeholder="weight"   />
                
                </td>
                 <td >
                       <input  style="width:100%" name='txtCampoParticle<?php echo $i; ?>' type='text' id='txtCampoParticle<?php echo $i; ?>' size='50' placeholder="Article"   />
                </td>
                <td >
                       <input  style="width:100%" name='txtCampoPweightch<?php echo $i; ?>' type='text' id='txtCampoPweightch<?php echo $i; ?>' size='50' placeholder="Charged weight"   />
                </td>
                <td >
                       <input  style="width:100%" name='txtCampoPrate<?php echo $i; ?>' type='text' id='txtCampoPrate<?php echo $i; ?>' size='50' placeholder="Rate"   />
                </td>
                    <td >
                       <input  style="width:100%" name='txtCampoPtotal<?php echo $i; ?>' type='text' id='txtCampoPtotal<?php echo $i; ?>' size='50' placeholder="Total"   />
                </td>
                    <td >
                       <textarea style="width:100% !important; height: auto !important ;" name='txtCampoPContent<?php echo $i; ?>' type='text' id='txtCampoPContent<?php echo $i; ?>' size='50' placeholder="Content"   ></textarea>  
                
                </td>
                <td>&nbsp;</td>
            </tr>
             <?php endfor;?> 
 				<tr>
              <td colspan="4"> </br></td>
            </tr>

            <tr>
              <td colspan="4" align="center"></td>
            </tr>
            
</table>

<br>
 

                  <td>&nbsp;</td>
              <tr>
          <td colspan="3">&nbsp;</td>
        </tr>


    </form>
       <script languaje="javascript">nav();</script>
    <script languaje="javascript">dataView();</script>
    <script language="javascript">function add_toast(tipo, mensaje){$().toastmessage(tipo, mensaje);}</script>
</body>
</html>