<html>
<head>
    <title>Agregar_Guia</title>
    <?php require('../../librerias.php'); ?>
    <?php require('ctrl_track.php'); ?>
    <!--<script src = "validate_city.js"></script>-->
</head>
<script>


</script>
<body>
    <h1> <div class="icon-paper-plane-empty">Informe Guia : "Nombre guia"</h1>
    <form name='formInsert' id="formInsert" onSubmit="exe_add();" >
      <br>
      <table border="0" align="left">
        <tr>
          <td>
                <td>Numero / Guia</td>
                <input name='txtCampo0' type='text' id='txtCampo0' size='50' style="width:110px" placeholder="P.Hasta" value='09201510000001' />
                      <!--<option value=" <?php echo $listData[2]; ?>"><?php echo $listData[2]; ?></option>-->
             
            </td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
        <!--                         REMITENTE                                        -->
          <td><div><h4>Reporte Guia</h4><table class="tablasFondo" width="60%" align="center">
            <tr>
              <td colspan="4"></td>
            </tr>
            <tr>
              <td colspan="4"><input type="hidden" name="act" id="act" value="add"></td>
            </tr>
            <tr>
              <td>Agente</td>
              <td colspan="3"><input name='txtCampo1' type='text' id='txtCampo1' size='50' required readonly value="Pepito travel" /></td>
            </tr>
                        <tr>
              <td>Obtenido por: </td>
              <td colspan="3"><input style='width:137px;' name='txtCampo4' type='text' id='txtCampo4' size='50' value='Pepito perez'  required readonly/>
               Fecha Obtenido
              <input class="ID" style='width:137px;' name='txtCampo6' type='text' id='txtCampo6' size='50' value='24/01/2015'  required readonly /></td>
            </tr>
            <tr>
              <td>Descripcion</td>
              <td><input style='width:210px;' name='txtCampo8' type='text' id='txtCampo8' size='50' required value="Ropa osea gauw" /></td>
              <td align="right">ZipCode</td>
              <td align="right"><input style='width:130px;' name='txtCampo7' type='text' id='txtCampo7' size='50' required value="502520" /></td>
            </tr>
            
            <tr>
              <td>Servicio</td>
              <td colspan="3"><input name='txtCampo3' type='text' id='txtCampo3' size='50' required value="COD" /></td>
            </tr>
            <tr>
              <td colspan="4"></td>
            </tr>
            <tr>
              <td colspan="4" align="center"></td>
            </tr>
          </table></td>
          <td>&nbsp;</td>
              <tr>
          <td colspan="3">&nbsp;</td>
        </tr>
        </tr>
        <tr>

          <!--  DESTINATARIO                                                              -->
          <td><div><h4>Datos Envio</h4><table class="tablasFondo" width="60%" align="center">
              <tr>
              <td colspan="4"></td>
            </tr>
            <tr>
              <td colspan="4"><input type="hidden" name="act" id="act" value="add"></td>
            </tr>
         
            <tr>
              <td>Remitente </td>
              <td colspan="3"><input style='width:137px;' name='txtCampo4' type='text' id='txtCampo4' size='50' value='Pepitotravel'  required readonly/></td>
              <td align="center"> Destinatario  </td>
              <td colspan="3"> <input class="ID" style='width:137px;' name='txtCampo6' type='text' id='txtCampo6' size='50' value='PepitoCriollo'  required readonly /></td>
            </tr>
            <tr>
              <td>Direccion</td>
              <td colspan="3"><input style='width:137px;' name='txtCampo4' type='text' id='txtCampo4' size='50' value='Casa William'  required readonly/></td>
               <td align="center">Direccion </td>
              <td colspan="3"> <input class="ID" style='width:137px;' name='txtCampo6' type='text' id='txtCampo6' size='50' value='Villa hermosa kr 30 n 30-2'  required readonly /></td>
            </tr>
             <tr>
              <td>Localidad Remitente</td>
              <td colspan="3"><input style='width:137px;' name='txtCampo4' type='text' id='txtCampo4' size='50' required value="Medellin" /></td>
               <td colspan="3"> <input class="ID" style='width:137px;' name='txtCampo5' type='text' id='txtCampo5' size='50' required readonly value="Antioquia" /></td>
               <td colspan="3"> <input class="ID" style='width:137px;' name='txtCampo6' type='text' id='txtCampo6' size='50' required readonly value="Colombia" /></td>
            </tr>
             <tr>
              <td>Localidad Destinatario</td>
              <td colspan="3"><input style='width:137px;' name='txtCampo4' type='text' id='txtCampo4' size='50' required value="Villa hermosa" /></td>
              <td colspan="3">  <input class="ID" style='width:137px;' name='txtCampo5' type='text' id='txtCampo5' size='50' required readonly value="Somalia" /></td>
               <td colspan="3"> <input class="ID" style='width:137px;' name='txtCampo6' type='text' id='txtCampo6' size='50' required readonly value=" Africa" /></td>
            </tr>
            <tr>
              <td>Telefono </td>
              <td colspan="3"><input style='width:137px;' name='txtCampo4' type='text' id='txtCampo4' size='50' value='+57 30520021'  required readonly/> </td>
               <td align="center">Telefono   </td>
               <td colspan="3"> <input class="ID" style='width:137px;' name='txtCampo6' type='text' id='txtCampo6' size='50' value='3215420'  required readonly /></td>
            </tr>
            <tr>
              <td>E-mail</td>
              <td colspan="3"><input style='width:137px;' name='txtCampo4' type='text' id='txtCampo4' size='50' value='remite@'  required readonly/> </td>
               <td align="center">E-mail</td>
               <td colspan="3"> <input class="ID" style='width:137px;' name='txtCampo6' type='text' id='txtCampo6' size='50' value='Destini@'  required readonly /></td>
            </tr>
            <tr>
              <td colspan="4"></td>
            </tr>
            <tr>
              <td colspan="4" align="center"></td>
            </tr>
          </table></td>
          <td>&nbsp;</td>
              <tr>
          <td colspan="3">&nbsp;</td>
        </tr>
    
        <tr>



          <td colspan="3"><h4 class="Envio" style="text-align:center">INFORMACION CONTABLE</h4>
            <table class="tablasFondo" width="60%" align="center">
            <tr>
                   <tr>
              <td colspan="4"></td>
            </tr>
            <tr>
              <td colspan="4"><input type="hidden" name="act" id="act" value="add"></td>
            </tr>
         
            <tr>
              <td>PESO ASEGURADO </td>
              <td colspan="3"><input style='width:137px;' name='txtCampo4' type='text' id='txtCampo4' size='50' value='Pepitotravel'  required readonly/></td>
              <td align="center"> FLETE  </td>
              <td colspan="3"> <input class="ID" style='width:137px;' name='txtCampo6' type='text' id='txtCampo6' size='50' value='PepitoCriollo'  required readonly /></td>
            </tr>
            <tr>
              <td>VALOR  DECLARADO</td>
              <td colspan="3"><input style='width:137px;' name='txtCampo4' type='text' id='txtCampo4' size='50' value='Casa William'  required readonly/></td>
               <td align="center">VALOR ASEGURADO </td>
              <td colspan="3"> <input class="ID" style='width:137px;' name='txtCampo6' type='text' id='txtCampo6' size='50' value='Villa hermosa kr 30 n 30-2'  required readonly /></td>
            </tr>
             <tr>
              <td>IMPUESTO</td>
              <td colspan="3"><input style='width:137px;' name='txtCampo4' type='text' id='txtCampo4' size='50' value='Casa William'  required readonly/></td>
               <td align="center"> SEGURO </td>
              <td colspan="3"> <input class="ID" style='width:137px;' name='txtCampo6' type='text' id='txtCampo6' size='50' value='Villa hermosa kr 30 n 30-2'  required readonly /></td>
            </tr>
             <tr>
              <td>OTROS CARGO</td>
              <td colspan="3"><input style='width:137px;' name='txtCampo4' type='text' id='txtCampo4' size='50' value='Casa William'  required readonly/></td>
               <td align="center">DESCUENTOS </td>
              <td colspan="3"> <input class="ID" style='width:137px;' name='txtCampo6' type='text' id='txtCampo6' size='50' value='Villa hermosa kr 30 n 30-2'  required readonly /></td>
            </tr>
            <tr>
             <td>TOTAL</td>
              <td colspan="3"><input name='txtCampo3' type='text' id='txtCampo3' size='50' value="1000$" readonly /></td> 
              </tr>
            
            <tr>
              <td colspan="4"></td>
            </tr>
            <tr>
              <td colspan="4" align="center"></td>
            </tr>
          </table></td>
          <td>&nbsp;</td>
              <tr>
          <td colspan="3">&nbsp;</td>
        </tr>
      </table>
</form>
    <script language="javascript">function add_toast(tipo, mensaje){$().toastmessage(tipo, mensaje);}</script>
</body>
</html>