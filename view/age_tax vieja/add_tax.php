<html>
<head>
	<title>Agregar_Impuesto</title>
  
	<?php require('../../librerias.php'); ?>
    <?php require('ctrl_tax.php'); ?>
 <?php if(isset($_GET['pais'])){$var_Pais=$_GET['pais']; }else{echo "<script language='javascript'>  window.location.href = 'http://www.easycargopro.com/ECP/index.php'</script>"; }?>

 <?php if(isset($_GET['serc'])){$var_servi=$_GET['serc']; }else{echo "<script language='javascript'>  window.location.href = 'http://www.easycargopro.com/ECP/index.php'</script>"; }?>
</head>
<body>
  <script>
  var int_rango = [];
  var int_contador = 0;
  $(document).ready(function() {
      $('#txtCampo6').change(function(event) {
        var int_menor = $('#txtCampo6').val();
        
        for (var i = 0; i < int_rango.length-1; i++) {
            if ((int_menor >= int_rango[i][0])&(int_menor <= int_rango[i][1])) {
              alert("Precio Minimo esta incluido ya en otro intervalo");
              $('#txtCampo6').css('backgroundColor', 'RED');
              break;
              }else{
              $('#txtCampo6').css('backgroundColor', 'GREEN');
              
              
            }
        }
      });
      $('#txtCampo7').change(function(event) {
        var int_mayor = $('#txtCampo7').val();
      
        for (var i = 0; i < int_rango.length-1; i++) {
            if ((int_mayor>=int_rango[i][0])&&(int_mayor<=int_rango[i][1])) {
              alert("Precio Maximo esta incluido ya en otro intervalo");
          
              $('#txtCampo7').css('backgroundColor', 'RED');
              break;
            }else{
             
              $('#txtCampo7').css('backgroundColor', 'GREEN');
            }
        }
      });
  });

  </script>
	<h1>Crear Impuesto /  <?php foreach($listInfo=sel7($intID_Agente) as $listData2): echo $listData2[0]; endforeach?></h1>
  <table id="listable" class="TablTax">
        <thead>
            <tr>        
               
                <th>Pais</th>
                <th>Servicio</th>
                <th>%_Empresa</th>
                <th>%_Agente</th>
                <th>P_Min</th>
                <th>P_Max</th>
             
            </tr>
        </thead>
        <tbody>
            <?php foreach($listInfo=sel9("1=1 AND int_IDAgente=".$intID_Agente." AND var_Servicio = '$var_servi' AND var_Pais = '$var_Pais' ") as $listData): ?>
                
                <tr Class="trTax">    
               
                <td Class="tdTax"><?php echo $listData[1] ?></td>
                <td Class="tdTax"><?php echo $listData[2] ?></td>
                <td Class="tdTax"><?php echo $listData[3] ?></td>
                <td Class="tdTax"><?php echo $listData[5] ?></td>
                <td Class="tdTax"><?php echo $listData[4] ?></td>
                <td Class="tdTax"><?php echo $listData[6] ?></td>
                <script> int_rango.push([[<?php echo $listData[4] ?>],[<?php echo $listData[6] ?>]]);</script>         
                <td>
                    
                    <input type="button" class="dell" value=" " onClick="abre_del(<?php echo $intID ?>,<?php echo $intID_Agente ?>,<?php  echo $listData["0"]?>,0)" />
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
	<form name='formInsert' id="formInsert" onSubmit="exe_add(<? echo $intID ?>,<? echo $intID_Agente ?>); ">
  
	<table width="40%" align="center">
            <tr>
              <td colspan="3">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="3">
                  <input type="hidden" name="act" id="act" value="add">
                </td>
            </tr>
            <tr>
                
                <td colspan="2">
                   <input class="ID" name='txtCampo1' type='text' id='txtCampo1' size='50' value="<?php echo $intID_Agente?>" hidden />
                </td>
            </tr>
            
            
            <tr>
                <td>Servicio</td>
                <td colspan="2">
                    <select name='txtCampo2' id='txtCampo2' style="width:240px">
                      <?php foreach($listInfo2=sel2("1=1") as $listServ): ?>
                      <option value="<?php echo $listServ[1]; ?>"><?php echo $listServ[1]; ?></option>
                      <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Pais</td>
                <td colspan="2">
                    <select name='txtCampo3' id='txtCampo3' style="width:240px">
					            <?php foreach($listInfo3=sel3("1=1") as $listServ): ?>
                      <option value="<?php echo $listServ[0]; ?>"><?php echo $listServ[0]; ?></option>
                      <?php endforeach; ?>
                	</select>
                </td>
            </tr>
      <tr>
          <td>Porcentaje (%)</td>
          <td colspan="2"><input name='txtCampo4' type='text'  id='txtCampo4' size='50' style="width:110px" placeholder="Empresa"required /> 
            -                 
              <input name='txtCampo5' type='text' id='txtCampo5'  size='50' style="width:110px" placeholder="Agente"required /></td>

        </tr>
            <tr>
                <td>Peso</td>
                <td colspan="2">
                    <input name='txtCampo6' type='text' id='txtCampo6' size='50' style="width:110px" placeholder="Minimo" required />
                    -
                    <input name='txtCampo7' type='text'  id='txtCampo7' size='50' style="width:110px" placeholder="Maximo" required/>
                </td>
            </tr>
            <tr>
              <td>V. Min Declarado</td>
              <td colspan="2"><input name='txtCampo8' type='text' id='txtCampo8' size='50' style="width:110px" required/></td>
            </tr>
           <input type="text" name= "Intid" id="Intid" value="<? echo $intID ?>" hidden >
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td></td>
            </tr>            
            <tr>
              <td colspan="3"></td>
            </tr>
            <tr>
            	<td colspan="3" align="center">
                	<input type="submit" value="Agregar" />
                    <input type="button" value="Cancelar" class="Btn" onClick="javascript:window.history.back();" />
                    <input type="button" value="Agregar más " class="Btn" onclick="exe_plus()"  hidden/>
                </td>
            </tr>
	</table>
    </form>
    
   
    <script language="javascript">function add_toast(tipo, mensaje){$().toastmessage(tipo, mensaje);}</script>
</body>
  
</html>
